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

class EventbookingViewCouponsHtml extends RADViewList
{
	protected function prepareView()
	{
		parent::prepareView();

		$config = EventbookingHelper::getConfig();

		$filters = [];

		if ($config->hide_disable_registration_events)
		{
			$filters[] = 'registration_type != 3';
		}

		$rows = EventbookingHelperDatabase::getAllEvents($config->sort_events_dropdown, $config->hide_past_events_from_events_dropdown, $filters);

		$this->lists['filter_event_id'] = EventbookingHelperHtml::getEventsDropdown($rows, 'filter_event_id', 'onchange="submit();"', $this->state->filter_event_id);

		$discountTypes       = [0 => '%', 1 => $config->get('currency_symbol', '$'), 2 => JText::_('EB_VOUCHER')];
		$this->discountTypes = $discountTypes;
		$this->nullDate      = JFactory::getDbo()->getNullDate();
		$this->dateFormat    = $config->get('date_format', 'Y-m-d');
		$this->config        = EventbookingHelper::getConfig();
	}
}
