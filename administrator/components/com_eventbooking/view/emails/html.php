<?php
/**
 * @package        Joomla
 * @subpackage     Membership Pro
 * @author         Tuan Pham Ngoc
 * @copyright      Copyright (C) 2012 - 2017 Ossolution Team
 * @license        GNU/GPL, see LICENSE.php
 */
// no direct access
defined('_JEXEC') or die;

/**
 * HTML View class for Membership Pro component
 *
 * @static
 * @package        Joomla
 * @subpackage     Membership Pro
 */
class EventbookingViewEmailsHtml extends RADViewList
{
	/**
	 * Method to instantiate the view.
	 *
	 * @param   array  $config  The configuration data for the view
	 *
	 * @since  1.0
	 */
	public function __construct($config = [])
	{
		$config['hide_buttons'] = ['add', 'edit', 'publish'];

		parent::__construct($config);
	}

	/**
	 * Build necessary data for the view before it is being displayed
	 *
	 */
	protected function prepareView()
	{
		parent::prepareView();

		$options   = [];
		$options[] = JHtml::_('select.option', '', JText::_('EB_EMAIL_TYPE'));
		$options[] = JHtml::_('select.option', 'new_registration_emails', JText::_('EB_NEW_REGISTRATION_EMAILS'));
		$options[] = JHtml::_('select.option', 'reminder_emails', JText::_('EB_REMINDER_EMAILS'));
		$options[] = JHtml::_('select.option', 'mass_mails', JText::_('EB_MASS_MAIL'));
		$options[] = JHtml::_('select.option', 'registration_approved_emails', JText::_('EB_REGISTRATION_APPROVED_EMAILS'));
		$options[] = JHtml::_('select.option', 'registration_cancel_emails', JText::_('EB_REGISTRATION_CANCEL_EMAILS'));
		$options[] = JHtml::_('select.option', 'new_event_notification_emails', JText::_('EB_NEW_EVENT_NOTIFICATION_EMAILS'));
		$options[] = JHtml::_('select.option', 'deposit_payment_reminder_emails', JText::_('EB_DEPOSIT_PAYMENT_REMINDER_EMAILS'));
		$options[] = JHtml::_('select.option', 'waiting_list_emails', JText::_('EB_WAITING_LIST_EMAILS'));
		$options[] = JHtml::_('select.option', 'event_approved_emails', JText::_('EB_EVENT_APPROVED_EMAILS'));
		$options[] = JHtml::_('select.option', 'event_update_emails', JText::_('EB_EVENT_UPDATE_EMAILS'));
		$options[] = JHtml::_('select.option', 'waiting_list_notification_emails', JText::_('EB_WAITING_LIST_NOTIFICATION_EMAILS'));
		$options[] = JHtml::_('select.option', 'request_payment_emails', JText::_('EB_REQUEST_PAYMENT_EMAILS'));


		$this->lists['filter_email_type'] = JHtml::_('select.genericlist', $options, 'filter_email_type', ' onchange="submit();" ', 'value', 'text', $this->state->filter_email_type);

		$options   = [];
		$options[] = JHtml::_('select.option', 0, JText::_('EB_SENT_TO'));
		$options[] = JHtml::_('select.option', 1, JText::_('EB_ADMIN'));
		$options[] = JHtml::_('select.option', 2, JText::_('EB_REGISTRANTS'));

		$this->lists['filter_sent_to'] = JHtml::_('select.genericlist', $options, 'filter_sent_to', ' onchange="submit();" ', 'value', 'text', $this->state->filter_sent_to);
	}

	/**
	 * Method to add toolbar buttons
	 */
	protected function addToolbar()
	{
		parent::addToolbar();

		JToolbarHelper::trash('delete_all', 'EB_DELETE_ALL', false);
	}
}
