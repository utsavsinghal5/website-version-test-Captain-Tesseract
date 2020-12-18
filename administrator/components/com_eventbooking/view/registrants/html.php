<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

use Joomla\Utilities\ArrayHelper;

class EventbookingViewRegistrantsHtml extends RADViewList
{
	protected function prepareView()
	{
		parent::prepareView();

		$config = EventbookingHelper::getConfig();
		$db     = JFactory::getDbo();
		$query  = $db->getQuery(true);

		$filters = [];

		if ($config->hide_disable_registration_events)
		{
			$filters[] = 'registration_type != 3';
		}

		$rows                           = EventbookingHelperDatabase::getAllEvents($config->sort_events_dropdown, $config->hide_past_events_from_events_dropdown, $filters);
		$this->lists['filter_event_id'] = EventbookingHelperHtml::getEventsDropdown($rows, 'filter_event_id', 'class="input-xlarge" onchange="submit();"', $this->state->filter_event_id);

		$options   = [];
		$options[] = JHtml::_('select.option', -1, JText::_('EB_REGISTRATION_STATUS'));
		$options[] = JHtml::_('select.option', 0, JText::_('EB_PENDING'));
		$options[] = JHtml::_('select.option', 1, JText::_('EB_PAID'));

		if ($config->activate_waitinglist_feature)
		{
			$options[] = JHtml::_('select.option', 3, JText::_('EB_WAITING_LIST'));
		}

		$options[] = JHtml::_('select.option', 2, JText::_('EB_CANCELLED'));

		$this->lists['filter_published'] = JHtml::_('select.genericlist', $options, 'filter_published', ' class="input-medium" onchange="submit()" ', 'value', 'text',
			$this->state->filter_published);

		if ($config->activate_checkin_registrants)
		{
			$options                          = [];
			$options[]                        = JHtml::_('select.option', -1, JText::_('EB_CHECKIN_STATUS'));
			$options[]                        = JHtml::_('select.option', 1, JText::_('EB_CHECKED_IN'));
			$options[]                        = JHtml::_('select.option', 0, JText::_('EB_NOT_CHECKED_IN'));
			$this->lists['filter_checked_in'] = JHtml::_('select.genericlist', $options, 'filter_checked_in', ' class="input-medium" onchange="submit()" ', 'value', 'text',
				$this->state->filter_checked_in);
		}

		$rowFields = EventbookingHelperRegistration::getAllEventFields($this->state->filter_event_id);
		$fields    = [];
		$filters   = [];

		$filterFieldsValues = $this->state->get('filter_fields', []);

		foreach ($rowFields as $rowField)
		{
			if ($rowField->filterable)
			{
				$fieldOptions = explode("\r\n", $rowField->values);

				$options   = [];
				$options[] = JHtml::_('select.option', '', $rowField->title);

				foreach ($fieldOptions as $option)
				{
					$options[] = JHtml::_('select.option', $option, $option);
				}

				$filters['field_' . $rowField->id] = JHtml::_('select.genericlist', $options, 'filter_fields[field_' . $rowField->id . ']', ' class="input-medium" onchange="submit();" ', 'value', 'text', ArrayHelper::getValue($filterFieldsValues, 'field_' . $rowField->id));
			}

			if ($rowField->show_on_registrants != 1 || in_array($rowField->name, ['first_name', 'last_name', 'email']))
			{
				continue;
			}

			$fields[$rowField->id] = $rowField;
		}

		if (count($fields))
		{
			$this->fieldsData = $this->model->getFieldsData(array_keys($fields));
		}

		list($ticketTypes, $tickets) = $this->model->getTicketsData();

		$query->select('COUNT(*)')
			->from('#__eb_payment_plugins')
			->where('published=1');
		$db->setQuery($query);
		$totalPlugins = (int) $db->loadResult();


		$this->config           = $config;
		$this->totalPlugins     = $totalPlugins;
		$this->coreFields       = EventbookingHelperRegistration::getPublishedCoreFields();
		$this->fields           = $fields;
		$this->ticketTypes      = $ticketTypes;
		$this->tickets          = $tickets;
		$this->datePickerFormat = $config->get('date_field_format', '%Y-%m-%d');
		$this->dateFormat       = str_replace('%', '', $this->datePickerFormat);
		$this->filters          = $filters;
		$this->message          = EventbookingHelper::getMessages();
	}

	/**
	 * Override addToolbar method to add custom csv export function
	 * @see RADViewList::addToolbar()
	 */
	protected function addToolbar()
	{
		parent::addToolbar();

		$config = EventbookingHelper::getConfig();

		JToolbarHelper::custom('cancel_registrations', 'cancel', 'cancel', 'EB_CANCEL_REGISTRATIONS', true);

		if ($config->activate_checkin_registrants)
		{
			JToolbarHelper::checkin('checkin_multiple_registrants');
			JToolbarHelper::unpublish('reset_check_in', JText::_('EB_CHECKOUT'), true);
		}

		// Instantiate a new JLayoutFile instance and render the batch button
		$layout = new JLayoutFile('joomla.toolbar.batch');

		$bar   = JToolbar::getInstance('toolbar');
		$dhtml = $layout->render(['title' => JText::_('EB_MASS_MAIL')]);
		$bar->appendButton('Custom', $dhtml, 'batch');

		JToolbarHelper::custom('resend_email', 'envelope', 'envelope', 'EB_RESEND_EMAIL', true);
		JToolbarHelper::custom('export', 'download', 'download', 'EB_EXPORT_REGISTRANTS', false);

		if ($config->activate_certificate_feature)
		{
			JToolbarHelper::custom('download_certificates', 'download', 'download', 'EB_DOWNLOAD_CERTIFICATES', true);
			JToolbarHelper::custom('send_certificates', 'envelope', 'envelope', 'EB_SEND_CERTIFICATES', true);
		}

		if ($config->activate_waitinglist_feature)
		{
			JToolbarHelper::custom('request_payment', 'envelope', 'envelope', 'EB_REQUEST_PAYMENT', true);
		}
	}
}
