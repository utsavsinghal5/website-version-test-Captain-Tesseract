<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

class EventbookingViewFullcalendarHtml extends RADViewHtml
{
	public function display()
	{
		$document = JFactory::getDocument();
		$rootUri  = JUri::root(true);
		$document->addScript($rootUri . '/media/com_eventbooking/fullcalendar/lib/moment.min.js');
		$document->addScript($rootUri . '/media/com_eventbooking/fullcalendar/fullcalendar.min.js');
		$document->addStyleSheet($rootUri . '/media/com_eventbooking/fullcalendar/fullcalendar.min.css');

		$this->params = $this->getParams();

		if ($this->params->get('menu_item_id') > 0)
		{
			$this->Itemid = $this->params->get('menu_item_id');
		}

		$this->setDocumentMetadata();

		parent::display();
	}

	/**
	 * Method to get full calendar options
	 *
	 * @return array
	 */
	protected function getCalendarOptions()
	{
		$config = EventbookingHelper::getConfig();
		$date   = new DateTime('now', new DateTimeZone(JFactory::getConfig()->get('offset')));
		$year   = $this->params->get('default_year') ?: $date->format('Y');
		$month  = $this->params->get('default_month') ?: $date->format('m');
		$month  = str_pad($month, 2, '0', STR_PAD_LEFT);

		$buttons = [];

		if ($this->params->get('show_month_button'))
		{
			$buttons[] = 'month';
		}

		if ($this->params->get('show_week_button'))
		{
			$buttons[] = 'agendaWeek';
		}

		if ($this->params->get('show_day_button'))
		{
			$buttons[] = 'agendaDay';
		}

		if (count($buttons) == 1)
		{
			$buttons = [];
		}

		$defaultView = $this->params->get('default_view', 'month');


		$options = [
			'header'           => [
				'left'   => 'prev,next today',
				'center' => 'title',
				'right'  => implode(',', $buttons),
			],
			'defaultView'      => $defaultView,
			'defaultDate'      => $year . '-' . $month . '-' . $date->format('d'),
			'navLinks'         => true,
			'editable'         => false,
			'eventLimit'       => false,
			'weekends'         => (bool) $this->params->get('show_weekend', 1),
			'eventSources'     => [
				JRoute::_('index.php?option=com_eventbooking&view=fullcalendar&format=raw&Itemid=' . $this->Itemid, false),
			],
			'monthNames'       => [
				JText::_('EB_JAN'),
				JText::_('EB_FEB'),
				JText::_('EB_MARCH'),
				JText::_('EB_APR'),
				JText::_('EB_MAY'),
				JText::_('EB_JUNE'),
				JText::_('EB_JUL'),
				JText::_('EB_AUG'),
				JText::_('EB_SEP'),
				JText::_('EB_OCT'),
				JText::_('EB_NOV'),
				JText::_('EB_DEC'),
			],
			'monthNamesShort'  => [
				JText::_('EB_JAN_SHORT'),
				JText::_('EB_FEB_SHORT'),
				JText::_('EB_MARCH_SHORT'),
				JText::_('EB_APR_SHORT'),
				JText::_('EB_MAY_SHORT'),
				JText::_('EB_JUNE_SHORT'),
				JText::_('EB_JULY_SHORT'),
				JText::_('EB_AUG_SHORT'),
				JText::_('EB_SEP_SHORT'),
				JText::_('EB_OCT_SHORT'),
				JText::_('EB_NOV_SHORT'),
				JText::_('EB_DEC_SHORT'),
			],
			'dayNames'         => [
				JText::_('EB_SUNDAY'),
				JText::_('EB_MONDAY'),
				JText::_('EB_TUESDAY'),
				JText::_('EB_WEDNESDAY'),
				JText::_('EB_THURSDAY'),
				JText::_('EB_FRIDAY'),
				JText::_('EB_SATURDAY'),
			],
			'dayNamesShort'    => [
				JText::_('EB_SUN'),
				JText::_('EB_MON'),
				JText::_('EB_TUE'),
				JText::_('EB_WED'),
				JText::_('EB_THUR'),
				JText::_('EB_FRI'),
				JText::_('EB_SAT'),
			],
			'displayEventTime' => (bool) $config->show_event_time,
			'dayOfMonthFormat' => $this->params->get('day_of_month_format', 'ddd D/M'),
			'slotLabelFormat'  => $this->params->get('slot_label_format', 'h(:mm)a'),
			'buttonText'       => [
				'today' => JText::_('EB_TODAY'),
				'month' => JText::_('EB_MONTH'),
				'week'  => JText::_('EB_WEEK'),
				'day'   => JText::_('EB_DAY'),
			],
			'firstDay'         => (int) $config->calendar_start_date,
			'views'            => [
				'month'      => [
					'titleFormat' => $this->params->get('title_format_month', 'MMMM YYYY'),
					'timeFormat'  => $this->params->get('time_format_month', 'h:mm a'),
					//'columnFormat' => 'ddd',
				],
				'agendaWeek' => [
					'titleFormat' => $this->params->get('title_format_week', 'MMM D YYYY'),
					'timeFormat'  => $this->params->get('time_format_week', 'h:mm a'),
					//'columnFormat' => 'ddd M/D',
				],
				'agendaDay'  => [
					'titleFormat' => $this->params->get('title_format_day', 'MMMM D YYYY'),
					'timeFormat'  => $this->params->get('time_format_day', 'h:mm a'),
					//'columnFormat' => 'dddd'
				],
			],
		];

		return $options;
	}
}
