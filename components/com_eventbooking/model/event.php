<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */
// no direct access
defined('_JEXEC') or die;

require_once JPATH_ADMINISTRATOR . '/components/com_eventbooking/model/common/event.php';

class EventbookingModelEvent extends EventbookingModelCommonEvent
{
	/**
	 * Instantiate the model.
	 *
	 * @param   array  $config  configuration data for the model
	 */
	public function __construct($config = [])
	{
		parent::__construct($config);

		$this->state->insert('catid', 'int', 0);
	}

	/**
	 * Get all necessary data of an event
	 *
	 * @return mixed
	 */
	public function getEventData()
	{
		$config      = EventbookingHelper::getConfig();
		$db          = $this->getDbo();
		$query       = $db->getQuery(true);
		$fieldSuffix = EventbookingHelper::getFieldSuffix();
		$currentDate = $db->quote(EventbookingHelper::getServerTimeFromGMTTime());
		$query->select('a.*')
			->select("DATEDIFF(event_date, $currentDate) AS number_event_dates")
			->select("TIMESTAMPDIFF(MINUTE, a.late_fee_date, $currentDate) AS late_fee_date_diff")
			->select("TIMESTAMPDIFF(MINUTE, a.event_date, $currentDate) AS event_start_minutes")
			->select("TIMESTAMPDIFF(SECOND, registration_start_date, $currentDate) AS registration_start_minutes")
			->select("TIMESTAMPDIFF(MINUTE, cut_off_date, $currentDate) AS cut_off_minutes")
			->select("TIMESTAMPDIFF(MINUTE, $currentDate, early_bird_discount_date) AS date_diff")
			->select('IFNULL(SUM(b.number_registrants), 0) AS total_registrants')
			->select($db->quoteName(['c.name' . $fieldSuffix, 'c.alias' . $fieldSuffix], ['location_name', 'location_alias']))
			->select('c.address AS location_address')
			->from('#__eb_events AS a')
			->leftJoin('#__eb_registrants AS b ON (a.id = b.event_id AND b.group_id=0 AND (b.published = 1 OR (b.payment_method LIKE "os_offline%" AND b.published NOT IN (2,3))))')
			->leftJoin('#__eb_locations AS c ON a.location_id = c.id ')
			->where('a.id = ' . $this->state->id)
			->group('a.id');

		if ($config->show_event_creator)
		{
			$query->select('u.name AS creator_name')
				->leftJoin('#__users as u ON a.created_by = u.id');
		}

		if ($fieldSuffix)
		{
			EventbookingHelperDatabase::getMultilingualFields($query, ['a.title', 'a.short_description', 'a.description', 'a.meta_keywords', 'a.meta_description', 'a.price_text', 'a.registration_handle_url', 'a.page_title', 'a.page_heading'], $fieldSuffix);
		}

		$db->setQuery($query);
		$row = $db->loadObject();

		// Get additional information about the event
		if ($row)
		{
			if (!EventbookingHelper::isValidMessage($row->description))
			{
				$row->description = $row->short_description;
			}

			EventbookingHelper::callOverridableHelperMethod('Data', 'preProcessEventData', [[$row], 'item']);
		}

		return $row;
	}

	/**
	 * Get all children events of this event
	 *
	 * @param   int  $parentEventId
	 *
	 * @return array
	 */
	public static function getAllChildrenEvents($parentEventId)
	{
		$config = EventbookingHelper::getConfig();
		$db     = JFactory::getDbo();
		$query  = $db->getQuery(true);

		$currentDate = $db->quote(EventbookingHelper::getServerTimeFromGMTTime());
		$query->select(EventbookingModelList::$fields)
			->select("TIMESTAMPDIFF(MINUTE, $currentDate, tbl.early_bird_discount_date) AS date_diff")
			->select("TIMESTAMPDIFF(MINUTE, tbl.late_fee_date, $currentDate) AS late_fee_date_diff")
			->select("DATEDIFF(tbl.event_date, $currentDate) AS number_event_dates")
			->select("TIMESTAMPDIFF(MINUTE, tbl.event_date, $currentDate) AS event_start_minutes")
			->select("TIMESTAMPDIFF(SECOND, tbl.registration_start_date, $currentDate) AS registration_start_minutes")
			->select("TIMESTAMPDIFF(MINUTE, tbl.cut_off_date, $currentDate) AS cut_off_minutes")
			->select('c.name AS location_name, c.address AS location_address')
			->select('IFNULL(SUM(b.number_registrants), 0) AS total_registrants')
			->from('#__eb_events AS tbl')
			->leftJoin('#__eb_registrants AS b ON (tbl.id = b.event_id AND b.group_id=0 AND (b.published = 1 OR (b.payment_method LIKE "os_offline%" AND b.published NOT IN (2,3))))')
			->leftJoin('#__eb_locations AS c ON tbl.location_id = c.id ')
			->where('tbl.published = 1')
			->where('tbl.hidden = 0')
			->where('(tbl.id = ' . $parentEventId . ' OR tbl.parent_id=' . $parentEventId . ')')
			->where('tbl.access IN (' . implode(',', JFactory::getUser()->getAuthorisedViewLevels()) . ')');

		if ($config->hide_past_events)
		{
			$currentDate = $db->quote(JHtml::_('date', 'Now', 'Y-m-d'));
			$query->where('(DATE(tbl.event_date) >= ' . $currentDate . ' OR DATE(tbl.cut_off_date) >= ' . $currentDate . ')');
		}

		$query->group('tbl.id')
			->order('tbl.event_date');

		$db->setQuery($query, 0, $config->get('max_number_of_children_events', 30));

		$rows = $db->loadObjectList();

		EventbookingHelperData::calculateDiscount($rows);

		if ($config->show_price_including_tax && !$config->get('setup_price'))
		{
			for ($i = 0, $n = count($rows); $i < $n; $i++)
			{
				$row                    = $rows[$i];
				$taxRate                = $row->tax_rate;
				$row->individual_price  = round($row->individual_price * (1 + $taxRate / 100), 2);
				$row->fixed_group_price = round($row->fixed_group_price * (1 + $taxRate / 100), 2);

				if ($config->show_discounted_price)
				{
					$row->discounted_price = round($row->discounted_price * (1 + $taxRate / 100), 2);
				}
			}
		}

		return $rows;
	}

	/**
	 * Update hits data for the given event
	 *
	 * @param   int  $eventId
	 *
	 * @return void
	 */
	public function updateHits($eventId)
	{
		$db    = $this->getDbo();
		$query = $db->getQuery(true);
		$query->update('#__eb_events')
			->set('hits = hits + 1')
			->where('id = ' . (int) $eventId);
		$db->setQuery($query);
		$db->execute();
	}
}
