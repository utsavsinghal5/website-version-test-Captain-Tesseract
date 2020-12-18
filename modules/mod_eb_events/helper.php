<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

class modEBEventsHelper
{
	/**
	 * Get list of events which will be displayed in the module
	 *
	 * @param   JRegistry  $params
	 *
	 * @throws Exception
	 */
	public static function getData($params)
	{
		$user   = JFactory::getUser();
		$db     = JFactory::getDbo();
		$query  = $db->getQuery(true);
		$config = EventbookingHelper::getConfig();

		$fieldSuffix = EventbookingHelper::getFieldSuffix();
		$currentDate = $db->quote(EventbookingHelper::getServerTimeFromGMTTime());
		$nullDate    = $db->quote($db->getNullDate());

		$displayEventType = $params->get('display_event_type', 'upcoming_events');
		$numberEvents     = $params->get('number_events', 6);
		$categoryIds      = trim($params->get('category_ids', ''));
		$filterDuration   = $params->get('duration_filter');
		$orderBy          = $params->get('order_by', 'a.event_date');
		$orderDirection   = $params->get('order_direction', 'ASC');
		$itemId           = (int) $params->get('item_id', 0);

		if (!$itemId)
		{
			$itemId = EventbookingHelper::getItemid();
		}

		$query->select('a.*, c.address AS location_address')
			->select($db->quoteName('c.name' . $fieldSuffix, 'location_name'))
			->select("DATEDIFF(a.early_bird_discount_date, $currentDate) AS date_diff")
			->select("DATEDIFF($currentDate, a.late_fee_date) AS late_fee_date_diff")
			->select("DATEDIFF(a.event_date, $currentDate) AS number_event_dates")
			->select("TIMESTAMPDIFF(SECOND, a.registration_start_date, $currentDate) AS registration_start_minutes")
			->select("TIMESTAMPDIFF(MINUTE, a.cut_off_date, $currentDate) AS cut_off_minutes")
			->select("TIMESTAMPDIFF(MINUTE, a.event_date, $currentDate) AS event_start_minutes")
			->select('IFNULL(SUM(b.number_registrants), 0) AS total_registrants')
			->from('#__eb_events AS a')
			->leftJoin('#__eb_registrants AS b ON (a.id = b.event_id AND b.group_id=0 AND (b.published = 1 OR (b.payment_method LIKE "os_offline%" AND b.published NOT IN (2,3))))')
			->leftJoin('#__eb_locations AS c ON a.location_id = c.id')
			->where('a.published = 1')
			->where('a.hidden = 0')
			->where('a.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ')')
			->where('(a.publish_up = ' . $nullDate . ' OR a.publish_up <= ' . $currentDate . ')')
			->where('(a.publish_down = ' . $nullDate . ' OR a.publish_down >= ' . $currentDate . ')');

		if ($displayEventType == 'upcoming_events')
		{
			EventbookingHelperDatabase::applyHidePastEventsFilter($query, 'a.');
		}
		elseif ($displayEventType == 'past_events')
		{
			$query->where('a.event_date < ' . $currentDate);
		}

		if ($params->get('only_show_featured_events', 0))
		{
			$query->where('a.featured = 1');
		}

		if (!$params->get('show_children_events', 1) || $config->show_children_events_under_parent_event)
		{
			$query->where('a.parent_id = 0');
		}

		if ($locationId = $params->get('location_id', 0))
		{
			$query->where('a.location_id = ' . $locationId);
		}

		if ($createdBy = $params->get('created_by'))
		{
			$query->where('a.created_by = ' . $createdBy);
		}

		if ($fieldSuffix)
		{
			EventbookingHelperDatabase::getMultilingualFields($query, ['title', 'short_description', 'price_text'], $fieldSuffix);

			$query->where('LENGTH(' . $db->quoteName('a.title' . $fieldSuffix) . ') > 0');
		}

		if ($categoryIds)
		{
			$query->where('a.id IN (SELECT event_id FROM #__eb_event_categories WHERE category_id IN (' . $categoryIds . '))');
		}

		if (JFactory::getApplication()->getLanguageFilter())
		{
			$query->where('a.language IN (' . $db->quote(JFactory::getLanguage()->getTag()) . ',' . $db->quote('*') . ', "")');
		}

		if ($filterDuration)
		{
			switch ($filterDuration)
			{
				case 'today':
					$date = JFactory::getDate('now', $config->get('offset'));
					$query->where('DATE(a.event_date) = ' . $db->quote($date->format('Y-m-d', true)));
					break;
				case 'tomorrow':
					$date = JFactory::getDate('tomorrow', $config->get('offset'));
					$query->where('DATE(a.event_date) = ' . $db->quote($date->format('Y-m-d', true)));
					break;
				case 'this_week':
					$date   = JFactory::getDate('now', $config->get('offset'));
					$monday = clone $date->modify(('Sunday' == $date->format('l')) ? 'Monday last week' : 'Monday this week');
					$monday->setTime(0, 0, 0);
					$fromDate = $monday->toSql(true);
					$sunday   = clone $date->modify('Sunday this week');
					$sunday->setTime(23, 59, 59);
					$toDate = $sunday->toSql(true);
					$query->where('a.event_date >= ' . $db->quote($fromDate))
						->where('a.event_date <= ' . $db->quote($toDate));
					break;
				case 'next_week':
					$date   = JFactory::getDate('now', $config->get('offset'));
					$monday = clone $date->modify(('Sunday' == $date->format('l')) ? 'Monday this week' : 'Monday next week');
					$monday->setTime(0, 0, 0);
					$fromDate = $monday->toSql(true);
					$sunday   = clone $date->modify('Sunday next week');
					$sunday->setTime(23, 59, 59);
					$toDate = $sunday->toSql(true);
					$query->where('a.event_date >= ' . $db->quote($fromDate))
						->where('a.event_date <= ' . $db->quote($toDate));
					break;
				case 'this_month':
					$date = JFactory::getDate('first day of this month', $config->get('offset'));
					$date->setTime(0, 0, 0);
					$fromDate = $date->toSql(true);
					$date     = JFactory::getDate('last day of this month', $config->get('offset'));
					$date->setTime(23, 59, 59);
					$toDate = $date->toSql(true);
					$query->where('a.event_date >= ' . $db->quote($fromDate))
						->where('a.event_date <= ' . $db->quote($toDate));
					break;
				case 'next_month':
					$date = JFactory::getDate('first day of next month', $config->get('offset'));
					$date->setTime(0, 0, 0);
					$fromDate = $date->toSql(true);
					$date     = JFactory::getDate('last day of next month', $config->get('offset'));
					$date->setTime(23, 59, 59);
					$toDate = $date->toSql(true);
					$query->where('a.event_date >= ' . $db->quote($fromDate))
						->where('a.event_date <= ' . $db->quote($toDate));
					break;
			}
		}

		$query->group('a.id');

		// Display featured events at the top if configured
		if ($config->display_featured_events_on_top)
		{
			$query->order('a.featured DESC');
		}

		if ($displayEventType == 'upcoming_events' && $orderBy == 'a.event_date' && $config->show_children_events_under_parent_event)
		{
			$query->select("CASE WHEN (a.event_type = 1 AND TIMESTAMPDIFF(MINUTE, a.event_date, $currentDate) > 0) THEN (SELECT MIN(event_date) AS next_event_date FROM #__eb_events WHERE event_date >= $currentDate AND (parent_id = a.id OR id = a.id)) ELSE a.event_date END AS next_event_date");
			$query->order('next_event_date');
		}
		else
		{
			$query->order($orderBy . ' ' . $orderDirection);
		}

		$db->setQuery($query, 0, $numberEvents);

		$rows = $db->loadObjectList();

		if ($config->show_children_events_under_parent_event)
		{
			foreach ($rows as $row)
			{
				if ($row->event_type != 1 || $row->event_start_minutes < 0)
				{
					continue;
				}

				$rowNextUpcomingEvent = EventbookingHelper::getNextChildEvent($row->id);

				if ($rowNextUpcomingEvent)
				{
					foreach (['event_date', 'event_end_date'] as $field)
					{
						$row->{$field} = $rowNextUpcomingEvent->{$field};
					}
				}
			}
		}

		EventbookingHelper::callOverridableHelperMethod('Data', 'preProcessEventData', [$rows]);

		for ($i = 0, $n = count($rows); $i < $n; $i++)
		{
			$row                    = $rows[$i];
			$categories             = $row->categories;
			$row->number_categories = count($categories);

			if (count($categories))
			{
				$itemCategories = [];

				foreach ($categories as $category)
				{
					$itemCategories[] = '<a href="' . EventbookingHelperRoute::getCategoryRoute($category->id, $itemId) . '" class="ebm-category-link">' . $category->name . '</a>';
				}

				$row->categories     = implode('&nbsp;|&nbsp;', $itemCategories);
				$row->itemCategories = $categories;
			}
		}

		return $rows;
	}
}