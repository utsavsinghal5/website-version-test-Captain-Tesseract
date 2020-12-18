<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

class EventbookingViewSponsorHtml extends RADViewItem
{
	protected function prepareView()
	{
		parent::prepareView();

		$config = EventbookingHelper::getConfig();

		$selectedEventIds = [];

		if ($this->item->id > 0)
		{
			$db    = JFactory::getDbo();
			$query = $db->getQuery(true)
				->select('event_id')
				->from('#__eb_event_sponsors')
				->where('sponsor_id = ' . $this->item->id);
			$db->setQuery($query);
			$selectedEventIds = $db->loadColumn();
		}

		$rows                    = EventbookingHelperDatabase::getAllEvents($config->sort_events_dropdown);
		$this->lists['event_id'] = EventbookingHelperHtml::getEventsDropdown($rows, 'event_id[]', 'class="input-xlarge" multiple', $selectedEventIds, false);
	}
}