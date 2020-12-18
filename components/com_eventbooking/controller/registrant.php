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

class EventbookingControllerRegistrant extends RADControllerAdmin
{
	use EventbookingControllerDisplay, RADControllerDownload;

	public function display($cachable = false, array $urlparams = [])
	{
		$this->loadAssets();

		parent::display($cachable, $urlparams);
	}

	/**
	 * Save the registration record and back to registration record list
	 */
	public function save()
	{
		parent::save();

		if ($return = $this->input->getBase64('return', ''))
		{
			$this->setRedirect(base64_decode($return));
		}
		else
		{
			$this->setRedirect(JRoute::_(EventbookingHelperRoute::getViewRoute('registrants', $this->input->getInt('Itemid')), false));
		}
	}

	/**
	 * Delete the selected registration record
	 */
	public function delete()
	{
		parent::delete();

		$this->setRedirect(JRoute::_(EventbookingHelperRoute::getViewRoute('registrants', $this->input->getInt('Itemid')), false));
	}

	/**
	 * Cancel registration for the event
	 */
	public function cancel()
	{
		$db               = JFactory::getDbo();
		$query            = $db->getQuery(true);
		$user             = JFactory::getUser();
		$config           = EventbookingHelper::getConfig();
		$Itemid           = $this->input->getInt('Itemid', 0);
		$id               = $this->input->getInt('id', 0);
		$registrationCode = $this->input->getString('cancel_code', '');
		$fieldSuffix      = EventbookingHelper::getFieldSuffix();

		$language = JFactory::getLanguage()->getTag();

		if (JLanguageMultilang::isEnabled() && $config->get('default_menu_item_' . $language))
		{
			$redirectUrl = JRoute::_('index.php?option=com_eventbooking&Itemid=' . $config->get('default_menu_item_' . $language));
		}
		else if ($config->get('default_menu_item') > 0)
		{
			$redirectUrl = JRoute::_('index.php?option=com_eventbooking&Itemid=' . $config->get('default_menu_item'));
		}
		else
		{
			$redirectUrl = JUri::root();
		}

		if ($id)
		{
			$query->select('a.id, a.event_date, a.cancel_before_date, b.user_id')
				->from('#__eb_events AS a')
				->innerJoin('#__eb_registrants AS b ON a.id = b.event_id')
				->where('b.id = ' . $id);
		}
		else
		{
			$query->select('a.id, a.event_date, a.cancel_before_date, b.user_id, b.id AS registrant_id')
				->from('#__eb_events AS a')
				->innerJoin('#__eb_registrants AS b ON a.id = b.event_id')
				->where('b.registration_code = ' . $db->quote($registrationCode));
		}

		if ($fieldSuffix)
		{
			EventbookingHelperDatabase::getMultilingualFields($query, ['a.title'], $fieldSuffix);
		}
		else
		{
			$query->select('a.title');
		}

		$db->setQuery($query);
		$rowEvent = $db->loadObject();

		if (!$rowEvent)
		{
			$this->app->enqueueMessage(JText::_('EB_INVALID_ACTION'), 'warning');
			$this->app->redirect($redirectUrl, 404);
		}

		if (($user->id == 0 && !$registrationCode) || ($user->id && ($user->id != $rowEvent->user_id)))
		{
			$this->app->enqueueMessage(JText::_('EB_INVALID_ACTION'), 'warning');
			$this->app->redirect($redirectUrl, 404);
		}

		// Validate cancel before date
		if (!EventbookingHelperRegistration::canCancelRegistrationNow($rowEvent))
		{
			if ($rowEvent->cancel_before_date !== JFactory::getDbo()->getNullDate())
			{
				$cancelBeforeDate = JFactory::getDate($rowEvent->cancel_before_date, JFactory::getConfig()->get('offset'));
			}
			else
			{
				$cancelBeforeDate = JFactory::getDate($rowEvent->event_date, JFactory::getConfig()->get('offset'));
			}

			$msg = JText::sprintf('EB_CANCEL_DATE_PASSED', $cancelBeforeDate->format($config->event_date_format, true));
			$this->app->enqueueMessage($msg, 'warning');
			$this->app->redirect($redirectUrl);
		}

		if ($registrationCode)
		{
			$id = $rowEvent->registrant_id;
		}

		/* @var EventbookingModelRegister $model */
		$model = $this->getModel('register');
		$model->cancelRegistration($id);

		$this->setRedirect(JRoute::_('index.php?option=com_eventbooking&view=registrationcancel&id=' . $id . '&Itemid=' . $Itemid, false));
	}

	/**
	 * Cancel editing a registration record
	 */
	public function cancel_edit()
	{
		if ($return = $this->input->getBase64('return', ''))
		{
			$this->setRedirect(base64_decode($return));
		}
		else
		{
			$this->setRedirect(JRoute::_(EventbookingHelperRoute::getViewRoute('registrants', $this->input->getInt('Itemid')), false));
		}
	}

	/**
	 * Download invoice associated to the registration record
	 *
	 * @throws Exception
	 */
	public function download_invoice()
	{
		$user = JFactory::getUser();

		if (!$user->id)
		{
			$this->app->enqueueMessage(JText::_('You do not have permission to download the invoice'), 'error');
			$this->app->redirect(JUri::root(), 403);
		}

		$id  = $this->input->getInt('id', 0);
		$row = JTable::getInstance('Registrant', 'EventbookingTable');

		if (!$row->load($id))
		{
			throw new Exception(sprintf('There is no registration record with ID %d', $id));
		}

		if (!$row->invoice_number)
		{
			throw new Exception(sprintf('No invoice generated for registration record with ID %d yet', $id));
		}

		$canDownload = false;

		if ($row->user_id == $user->id)
		{
			$canDownload = true;
		}

		if (!$canDownload)
		{
			if ($user->authorise('eventbooking.registrantsmanagement', 'com_eventbooking'))
			{
				$config = EventbookingHelper::getConfig();

				if ($config->only_show_registrants_of_event_owner)
				{
					$db    = JFactory::getDbo();
					$query = $db->getQuery(true);
					$query->select('created_by')
						->from('#__eb_events')
						->where('id = ' . $row->event_id);
					$db->setQuery($query);
					$createdBy = $db->loadResult();

					if ($createdBy == $user->id)
					{
						$canDownload = true;
					}
				}
				else
				{
					$canDownload = true;
				}
			}
		}

		if (!$canDownload)
		{
			$this->app->enqueueMessage(JText::_('You do not have permission to download the invoice'), 'error');
			$this->app->redirect(JUri::root(), 403);
		}

		// Generate invoice PDF
		EventbookingHelper::loadComponentLanguage($row->language, true);
		$filePath = EventbookingHelper::callOverridableHelperMethod('Helper', 'generateInvoicePDF', [$row]);

		// Handle backward compatible in case the generateInvoicePDF was overridden and does not return file path
		if (!$filePath)
		{
			$config        = EventbookingHelper::getConfig();
			$invoiceNumber = EventbookingHelper::callOverridableHelperMethod('Helper', 'formatInvoiceNumber', [$row->invoice_number, $config, $row]);
			$filePath      = JPATH_ROOT . '/media/com_eventbooking/invoices/' . $invoiceNumber . '.pdf';
		}

		$this->processDownloadFile($filePath);
	}

	/**
	 * Download certificate associated to the registration record
	 *
	 * @throws Exception
	 */
	public function download_certificate()
	{
		/* @var EventbookingTableRegistrant $row */
		$row    = JTable::getInstance('registrant', 'EventbookingTable');
		$user   = JFactory::getUser();
		$db     = JFactory::getDbo();
		$query  = $db->getQuery(true);
		$config = EventbookingHelper::getConfig();

		$downloadCode = $this->input->getString('download_code');

		if (!$user->id && empty($downloadCode))
		{
			throw new Exception(JText::_('You do not have permission to download the certificate'), 403);
		}

		if (!empty($downloadCode))
		{
			$query->select('id')
				->from('#__eb_registrants')
				->where('registration_code = ' . $db->quote($downloadCode));
			$db->setQuery($query);

			$id = (int) $db->loadResult();
		}
		else
		{
			$id = $this->input->getInt('id', 0);
		}

		if (!$row->load($id))
		{
			throw new Exception(JText::_('Invalid Registration Record'), 404);
		}

		if (empty($downloadCode) && $row->user_id != $user->id && $row->email != $user->get('email'))
		{
			throw new Exception(JText::_('You do not have permission to download the certificate'), 403);
		}

		if ($row->published == 0)
		{
			throw new Exception(JText::_('EB_CERTIFICATE_PAID_REGISTRANTS_ONLY'), 403);
		}

		if ($config->download_certificate_if_checked_in && !$row->checked_in)
		{
			throw new Exception(JText::_('EB_CERTIFICATE_CHECKED_IN_REGISTRANTS_ONLY'), 403);
		}

		// Compare current date with event end date
		$currentDate = EventbookingHelper::getServerTimeFromGMTTime();
		$query->clear()
			->select('*')
			->select("TIMESTAMPDIFF(MINUTE, event_end_date, '$currentDate') AS event_end_date_minutes")
			->from('#__eb_events')
			->where('id = ' . $row->event_id);
		$db->setQuery($query);
		$rowEvent = $db->loadObject();

		if ($rowEvent->activate_certificate_feature == 0 || ($rowEvent->activate_certificate_feature == 2 && !$config->activate_certificate_feature))
		{
			throw new Exception(printf('Certificate is not enabled for event %s', $rowEvent->title), 403);
		}

		if ($rowEvent->event_end_date_minutes < 0)
		{
			throw new Exception(JText::_('EB_CERTIFICATE_AFTER_EVENT_END_DATE'), 403);
		}

		EventbookingHelper::callOverridableHelperMethod('Helper', 'downloadCertificates', [[$row], $config]);
	}

	/**
	 * Download tickets associated to the registration record
	 *
	 * @throws Exception
	 */
	public function download_ticket()
	{
		/* @var EventbookingTableRegistrant $row */
		$row    = JTable::getInstance('registrant', 'EventbookingTable');
		$user   = JFactory::getUser();
		$config = EventbookingHelper::getConfig();

		$downloadCode = $this->input->getString('download_code');

		if (!$user->id && empty($downloadCode))
		{
			throw new Exception(JText::_('You do not have permission to download the ticket'), 403);
		}

		if (!empty($downloadCode))
		{
			$db    = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('id')
				->from('#__eb_registrants')
				->where('registration_code = ' . $db->quote($downloadCode));
			$db->setQuery($query);

			$id = (int) $db->loadResult();
		}
		else
		{
			$id = $this->input->getInt('id', 0);
		}

		if (!$row->load($id))
		{
			throw new Exception(JText::_('Invalid Registration Record'), 404);
		}

		if (empty($downloadCode) && $row->user_id != $user->id && $row->email != $user->get('email'))
		{
			throw new Exception(JText::_('You do not have permission to download the ticket'), 403);
		}

		if ($row->published == 0 || $row->payment_status != 1)
		{
			throw new Exception(JText::_('Ticket is only allowed for confirmed/paid registrants'), 403);
		}

		// The person is allowed to download ticket, let process it
		if (!$row->is_group_billing)
		{
			// Individual registration or group member record
			$ticketFilePaths = EventbookingHelper::callOverridableHelperMethod('Ticket', 'generateRegistrationTicketsPDF', [$row, $config]);
			$filePath        = $ticketFilePaths[0];
			$fileName        = basename($filePath);
		}
		else
		{
			EventbookingHelperTicket::generateTicketsPDF($row, $config);

			$fileName = 'ticket_' . str_pad($row->id, 5, '0', STR_PAD_LEFT) . '.pdf';
			$filePath = JPATH_ROOT . '/media/com_eventbooking/tickets/' . $fileName;
		}

		$this->processDownloadFile($filePath, $fileName);
	}

	/**
	 * Export registrants data into a csv file
	 */
	public function export()
	{
		$eventId = $this->input->getInt('event_id', $this->input->getInt('filter_event_id'));

		if (!EventbookingHelperAcl::canExportRegistrants($eventId))
		{
			$this->app->enqueueMessage(JText::_('EB_NOT_ALLOWED_TO_EXPORT'), 'error');
			$this->app->redirect(JUri::root(), 403);
		}

		set_time_limit(0);
		$config = EventbookingHelper::getConfig();
		$model  = $this->getModel('registrants');

		// Fake config data so that registrants model get correct data for export
		if (isset($config->export_group_billing_records))
		{
			$config->set('include_group_billing_in_registrants', $config->export_group_billing_records);
		}

		if (isset($config->export_group_member_records))
		{
			$config->set('include_group_members_in_registrants', $config->export_group_member_records);
		}

		/* @var EventbookingModelRegistrants $model */
		$model->setState('filter_event_id', $eventId)
			->setState('limitstart', 0)
			->setState('limit', 0)
			->setState('filter_order', 'tbl.id')
			->setState('filter_order_Dir', 'ASC');

		$rows = $model->getData();

		if (count($rows) == 0)
		{
			echo JText::_('There are no registrants to export');

			return;
		}

		$rowFields = EventbookingHelperRegistration::getAllEventFields($eventId);
		$fieldIds  = [];

		foreach ($rowFields as $rowField)
		{
			$fieldIds[] = $rowField->id;
		}

		$fieldValues = $model->getFieldsData($fieldIds);

		list($fields, $headers) = EventbookingHelper::callOverridableHelperMethod('Data', 'prepareRegistrantsExportData', [$rows, $config, $rowFields, $fieldValues, $eventId]);

		EventbookingHelper::callOverridableHelperMethod('Data', 'excelExport', [$fields, $rows, 'registrants_list', $headers]);
	}

	/**
	 * Resend confirmation email to registrants in case they didn't receive it
	 */
	public function resend_email()
	{
		$this->csrfProtection();

		$cid = $this->input->get('cid', [], 'array');
		$cid = ArrayHelper::toInteger($cid);

		/* @var EventbookingModelRegistrant $model */
		$model = $this->getModel();
		$ret   = true;

		foreach ($cid as $id)
		{
			$ret = $model->resendEmail($id);
		}

		if ($ret)
		{
			$this->setMessage(JText::_('EB_EMAIL_SUCCESSFULLY_RESENT'));
		}
		else
		{
			$this->setMessage(JText::_('EB_COULD_NOT_RESEND_EMAIL_TO_GROUP_MEMBER'), 'notice');
		}

		$this->setRedirect($this->getViewListUrl());
	}

	/**
	 * Checkin registrant from given ID
	 *
	 * @throws Exception
	 */
	public function checkin()
	{
		$user   = JFactory::getUser();
		$config = EventbookingHelper::getConfig();
		$db     = JFactory::getDbo();
		$query  = $db->getQuery(true);
		$id     = $this->input->getInt('id');

		$query->select('a.*, b.created_by, b.title AS event_title')
			->from('#__eb_registrants AS a')
			->leftJoin('#__eb_events AS b ON a.event_id = b.id')
			->where('a.id = ' . $id);
		$db->setQuery($query);
		$rowRegistrant = $db->loadObject();

		if (!$rowRegistrant)
		{
			throw new Exception('Invalid Registration Record:' . $id, 404);
		}


		if ($user->authorise('core.admin', 'com_eventbooking')
			|| ($user->authorise('eventbooking.registrantsmanagement', 'com_eventbooking') &&
				(!$config->only_show_registrants_of_event_owner || $user->id == $rowRegistrant->created_by))
		)
		{
			/* @var EventbookingModelRegistrant $model */
			$model       = $this->getModel();
			$result      = $model->checkinRegistrant($id);
			$messageType = null;

			switch ($result)
			{
				case 0:
					$message     = JText::_('EB_INVALID_REGISTRATION_RECORD');
					$messageType = 'error';
					break;
				case 1:
					$message     = JText::_('EB_REGISTRANT_ALREADY_CHECKED_IN');
					$messageType = 'error';
					break;
				case 2:
					$message = JText::_('EB_CHECKED_IN_SUCCESSFULLY');
					break;
				case 3:
					$message = JText::_('EB_CHECKED_IN_FAIL_REGISTRATION_CANCELLED');
					break;
				case 4:
					$message = JText::_('EB_CHECKED_IN_REGISTRATION_PENDING');
					break;
			}

			$replaces = [
				'FIRST_NAME'         => $rowRegistrant->first_name,
				'LAST_NAME'          => $rowRegistrant->last_name,
				'EVENT_TITLE'        => $rowRegistrant->event_title,
				'REGISTRANT_ID'      => $rowRegistrant->id,
				'NUMBER_REGISTRANTS' => $rowRegistrant->number_registrants,
			];

			foreach ($replaces as $key => $value)
			{
				$message = str_ireplace('[' . $key . ']', $value, $message);
			}

			$this->setRedirect(JRoute::_(EventbookingHelperRoute::getViewRoute('registrants', null)), $message, $messageType);
		}
		else
		{
			throw new Exception('You do not have permission to checkin registrant', 403);
		}
	}

	/*
	 * Check in a registrant
	 */
	public function check_in_webapp()
	{
		JSession::checkToken('get');

		if (JFactory::getUser()->authorise('eventbooking.registrantsmanagement', 'com_eventbooking'))
		{
			$id = $this->input->getInt('id');

			/* @var EventbookingModelRegistrant $model */
			$model = $this->getModel();

			try
			{
				$model->checkinRegistrant($id, true);
				$this->setMessage(JText::_('EB_CHECKIN_SUCCESSFULLY'));
			}
			catch (Exception $e)
			{
				$this->setMessage($e->getMessage(), 'error');
			}

			$this->setRedirect(JRoute::_(EventbookingHelperRoute::getViewRoute('registrants', null)));
		}
		else
		{
			throw new Exception('You do not have permission to checkin registrant', 403);
		}
	}

	/**
	 * Reset check in for a registrant
	 *
	 * @throws Exception
	 */
	public function reset_check_in()
	{
		JSession::checkToken('get');

		if (JFactory::getUser()->authorise('eventbooking.registrantsmanagement', 'com_eventbooking'))
		{
			$id = $this->input->getInt('id');

			/* @var EventbookingModelRegistrant $model */
			$model = $this->getModel();

			try
			{
				$model->resetCheckin($id);
				$this->setMessage(JText::_('EB_RESET_CHECKIN_SUCCESSFULLY'));
			}
			catch (Exception $e)
			{
				$this->setMessage($e->getMessage(), 'error');
			}

			$this->setRedirect(JRoute::_(EventbookingHelperRoute::getViewRoute('registrants', null)));
		}
		else
		{
			throw new Exception('You do not have permission to checkin registrant', 403);
		}
	}

	public function check_out()
	{
		if (JFactory::getUser()->authorise('eventbooking.registrantsmanagement', 'com_eventbooking'))
		{
			$cid = $this->input->get('cid', [], 'array');

			/* @var EventbookingModelRegistrant $model */
			$model = $this->getModel();

			try
			{
				foreach ($cid as $id)
				{
					$model->resetCheckin($id);
				}

				$this->setMessage(JText::_('EB_CHECKOUT_REGISTRANTS_SUCCESSFULLY'));
			}
			catch (Exception $e)
			{
				$this->setMessage($e->getMessage(), 'error');
			}

			$this->setRedirect(JRoute::_(EventbookingHelperRoute::getViewRoute('registrants', null)));
		}
		else
		{
			throw new Exception('You do not have permission to checkin registrant', 403);
		}
	}

	/**
	 * Method to checkin multiple registrants
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function checkin_multiple_registrants()
	{
		JSession::checkToken();

		if (!JFactory::getUser()->authorise('eventbooking.registrantsmanagement', 'com_eventbooking'))
		{
			throw new Exception('You do not have permission to checkin registrant', 403);
		}

		$cid = $this->input->get('cid', [], 'array');

		$cid = ArrayHelper::toInteger($cid);

		if (count($cid))
		{
			/* @var EventbookingModelRegistrant $model */
			$model = $this->getModel();

			// First check to see if there is someone already checked in
			$db    = $model->getDbo();
			$query = $db->getQuery(true)
				->select('*')
				->from('#__eb_registrants')
				->where('checked_in = 1')
				->where('id IN (' . implode(',', $cid) . ')');
			$db->setQuery($query);
			$rowRegistrant = $db->loadObject();

			if ($rowRegistrant)
			{
				$message = JText::_('EB_REGISTRANT_ALREADY_CHECKED_IN');

				$replaces = [
					'FIRST_NAME'         => $rowRegistrant->first_name,
					'LAST_NAME'          => $rowRegistrant->last_name,
					'EVENT_TITLE'        => $rowRegistrant->event_title,
					'REGISTRANT_ID'      => $rowRegistrant->id,
					'NUMBER_REGISTRANTS' => $rowRegistrant->number_registrants,
				];

				foreach ($replaces as $key => $value)
				{
					$message = str_ireplace('[' . $key . ']', $value, $message);
				}

				$this->setMessage($message, 'error');
			}
			else
			{
				try
				{
					$model->batchCheckin($cid);
					$this->setMessage(JText::_('EB_CHECKIN_REGISTRANTS_SUCCESSFULLY'));
				}
				catch (Exception $e)
				{
					$this->setMessage($e->getMessage(), 'error');
				}
			}
		}

		$this->setRedirect(JRoute::_(EventbookingHelperRoute::getViewRoute('registrants', null)));
	}


	/**
	 * Send batch mail to registrants
	 */
	public function batch_mail()
	{
		if (!JFactory::getUser()->authorise('eventbooking.registrantsmanagement', 'com_eventbooking'))
		{
			throw new Exception('You do not have permission to cancel registrations', 403);
		}

		/* @var EventbookingModelRegistrant $model */
		$model = $this->getModel();

		try
		{
			$model->batchMail($this->input);
			$this->setMessage(JText::_('EB_BATCH_MAIL_SUCCESS'));
		}
		catch (Exception $e)
		{
			$this->setMessage($e->getMessage(), 'error');
		}

		$this->setRedirect($this->getViewListUrl());
	}

	/**
	 * Resend confirmation email to registrants in case they didn't receive it
	 */
	public function cancel_registrations()
	{
		if (!JFactory::getUser()->authorise('eventbooking.registrantsmanagement', 'com_eventbooking'))
		{
			throw new Exception('You do not have permission to cancel registrations', 403);
		}

		$cid = $this->input->get('cid', [], 'array');
		$cid = ArrayHelper::toInteger($cid);
		$cid = $this->getManagableIds($cid);

		// For some reasons, no records was selected, don't process further
		if (!$cid)
		{
			echo 'No registration records selected';

			return;
		}

		/* @var EventbookingModelRegistrant $model */
		$model = $this->getModel();
		$model->cancelRegistrations($cid);
		$this->setRedirect($this->getViewListUrl(), JText::_('EB_SUCCESSFULLY_CANCELLED_REGISTRATIONS'));
	}

	/**
	 * Send payment request to selected registrant
	 *
	 * @return void
	 */
	public function request_payment()
	{
		if (!JFactory::getUser()->authorise('eventbooking.registrantsmanagement', 'com_eventbooking'))
		{
			throw new Exception('You do not have permission to request payment', 403);
		}

		$cid = $this->input->get('cid', [], 'array');
		$cid = ArrayHelper::toInteger($cid);
		$cid = $this->getManagableIds($cid);

		/* @var EventbookingModelRegistrant $model */
		$model = $this->getModel();

		try
		{
			foreach ($cid as $id)
			{
				$model->sendPaymentRequestEmail($id);
			}

			$this->setMessage(JText::_('EB_REQUEST_PAYMENT_EMAIL_SENT_SUCCESSFULLY'));
		}
		catch (Exception $e)
		{
			$this->setMessage($e->getMessage(), 'warning');
		}

		$this->setRedirect($this->getViewListUrl());
	}

	/**
	 * Resend confirmation email to registrants in case they didn't receive it
	 */
	public function send_certificates()
	{
		if (!JFactory::getUser()->authorise('eventbooking.registrantsmanagement', 'com_eventbooking'))
		{
			throw new Exception('You do not have permission to send certificates', 403);
		}

		$cid = $this->input->get('cid', [], 'array');
		$cid = ArrayHelper::toInteger($cid);
		$cid = $this->getManagableIds($cid);

		/* @var EventbookingModelRegistrant $model */
		$model = $this->getModel();

		try
		{
			foreach ($cid as $id)
			{
				$model->sendCertificates($id);
			}

			$this->setMessage(JText::_('EB_CERTIFICATES_SUCCESSFULLY_SENT'));
		}
		catch (Exception $e)
		{
			$this->setMessage($e->getMessage(), 'error');
		}

		$this->setRedirect($this->getViewListUrl());
	}

	/**
	 * Download Certificates for selected registrants
	 */
	public function download_certificates()
	{
		if (!JFactory::getUser()->authorise('eventbooking.registrantsmanagement', 'com_eventbooking'))
		{
			throw new Exception('You do not have permission to download certificates', 403);
		}

		$cid = $this->input->get('cid', [], 'array');
		$cid = ArrayHelper::toInteger($cid);
		$cid = $this->getManagableIds($cid);

		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*')
			->from('#__eb_registrants')
			->where('id IN (' . implode(',', $cid) . ')')
			->order('id');
		$db->setQuery($query);
		$rows = $db->loadObjectList();

		$config = EventbookingHelper::getConfig();

		list($fileName, $filePath) = EventbookingHelper::callOverridableHelperMethod('Helper', 'generateCertificates', [$rows, $config]);

		$this->processDownloadFile($filePath, $fileName);
	}

	/**
	 * Get Managable Registrant Ids by current logged in user
	 *
	 * @param   array  $ids
	 *
	 * @return array
	 */
	protected function getManagableIds($ids)
	{
		$user   = JFactory::getUser();
		$config = EventbookingHelper::getConfig();

		// User without super admin permission can only perform actions on the registration records from events managed by himself
		if (!$user->authorise('core.admin', 'com_eventbooking') && $config->only_show_registrants_of_event_owner)
		{
			$db    = JFactory::getDbo();
			$query = $db->getQuery(true)
				->select('a.id')
				->from('#__eb_registrants AS a')
				->innerJoin('#__eb_events AS b ON a.event_id = b.id')
				->where('b.created_by = ' . $user->id)
				->where('a.id IN (' . implode(',', $ids) . ')');
			$db->setQuery($query);
			$ids = $db->loadColumn();
		}

		return $ids;
	}

	/**
	 * Get url of the page which display list of records
	 *
	 * @return string
	 */
	protected function getViewListUrl()
	{
		$url = 'index.php?option=com_eventbooking&view=registrants&Itemid=' . $this->input->getInt('Itemid', EventbookingHelperRoute::findView('registrants', 0));

		return JRoute::_($url);
	}

	/**
	 * Get url of the page which allow adding/editing a record
	 *
	 * @param   int  $recordId
	 *
	 * @return string
	 */
	protected function getViewItemUrl($recordId = null)
	{
		$url = 'index.php?option=' . $this->option . '&view=' . $this->viewItem;

		if ($recordId)
		{
			$url .= '&id=' . $recordId;
		}

		$url .= '&Itemid=' . $this->input->getInt('Itemid', EventbookingHelperRoute::findView('registrants', 0));

		return JRoute::_($url);
	}

	/**
	 * Method to check if you can add a new record.
	 *
	 * Extended classes can override this if necessary.
	 *
	 * @param   array  $data  An array of input data.
	 *
	 * @return  boolean
	 */
	protected function allowAdd($data = [])
	{
		if (!JFactory::getUser()->authorise('eventbooking.registrantsmanagement', 'com_eventbooking'))
		{
			return false;
		}

		return parent::allowAdd($data);
	}

	/**
	 * Method to check if you can edit a new record.
	 *
	 * Extended classes can override this if necessary.
	 *
	 * @param   array   $data  An array of input data.
	 * @param   string  $key   The name of the key for the primary key; default is id.
	 *
	 * @return  boolean
	 */
	protected function allowEdit($data = [], $key = 'id')
	{
		$user = JFactory::getUser();

		if ($user->authorise('eventbooking.registrantsmanagement', 'com_eventbooking'))
		{
			return true;
		}

		if (!empty($data['id']))
		{
			$db    = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('COUNT(*)')
				->from('#__eb_registrants')
				->where('id = ' . (int) $data['id'])
				->where('(user_id = ' . $user->get('id') . ' OR email = ' . $db->quote($user->get('email')) . ')');
			$db->setQuery($query);

			$total = $db->loadResult();

			if ($total)
			{
				return true;
			}
		}

		return parent::allowEdit($data, $key);
	}

	/**
	 * Method to check whether the current user is allowed to delete a record
	 *
	 * @param   int  $id  Record ID
	 *
	 * @return  boolean  True if allowed to delete the record. Defaults to the permission for the component.
	 */
	protected function allowDelete($id)
	{
		return EventbookingHelperAcl::canDeleteRegistrant($id);
	}

	/**
	 * Method to check whether the current user can change status (publish, unpublish of a record)
	 *
	 * @param   int  $id  Id of the record
	 *
	 * @return  boolean  True if allowed to change the state of the record. Defaults to the permission for the component.
	 */
	protected function allowEditState($id)
	{
		if (!JFactory::getUser()->authorise('eventbooking.registrantsmanagement', 'com_eventbooking'))
		{
			return false;
		}

		return parent::allowEditState($id);
	}

	/**
	 * Override getView method to support getting layout from themes
	 *
	 * @param   string  $name
	 * @param   string  $type
	 * @param   string  $layout
	 * @param   array   $config
	 *
	 * @return RADView
	 */
	public function getView($name, $type = 'html', $layout = 'default', array $config = [])
	{
		$theme = EventbookingHelper::getDefaultTheme();

		$paths   = [];
		$paths[] = JPATH_THEMES . '/' . $this->app->getTemplate() . '/html/com_eventbooking/' . $name;
		$paths[] = JPATH_ROOT . '/components/com_eventbooking/themes/' . $theme->name . '/' . $name;

		if ($theme->name != 'default')
		{
			$paths[] = JPATH_ROOT . '/components/com_eventbooking/themes/default/' . $name;
		}

		$config['paths'] = $paths;

		return parent::getView($name, $type, $layout, $config);
	}
}
