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

class EventbookingControllerRegistrant extends EventbookingController
{
	use RADControllerDownload;

	/**
	 * Send batch mail to registrants
	 */
	public function batch_mail()
	{
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

		$this->setRedirect('index.php?option=com_eventbooking&view=registrants');
	}

	/**
	 * Resend confirmation email to registrants in case they didn't receive it
	 */
	public function resend_email()
	{
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

		$this->setRedirect('index.php?option=com_eventbooking&view=registrants');
	}

	/**
	 * Resend confirmation email to registrants in case they didn't receive it
	 */
	public function cancel_registrations()
	{
		$cid = $this->input->get('cid', [], 'array');
		$cid = ArrayHelper::toInteger($cid);

		/* @var EventbookingModelRegistrant $model */
		$model = $this->getModel();
		$model->cancelRegistrations($cid);
		$this->setRedirect('index.php?option=com_eventbooking&view=registrants', JText::_('EB_SUCCESSFULLY_CANCELLED_REGISTRATIONS'));
	}

	/**
	 * Send payment request to selected registrant
	 *
	 * @return void
	 */
	public function request_payment()
	{
		$cid = $this->input->get('cid', [], 'array');
		$cid = ArrayHelper::toInteger($cid);

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

		$this->setRedirect('index.php?option=com_eventbooking&view=registrants');
	}

	/**
	 * Resend confirmation email to registrants in case they didn't receive it
	 */
	public function send_certificates()
	{
		$cid = $this->input->get('cid', [], 'array');
		$cid = ArrayHelper::toInteger($cid);

		/* @var EventbookingModelRegistrant $model */
		$model = $this->getModel();

		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->update('#__eb_registrants')
			->set('certificate_sent = 1')
			->where('id IN (' . implode(',', $cid) . ')');
		$db->setQuery($query)
			->execute();

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

		$this->setRedirect('index.php?option=com_eventbooking&view=registrants');
	}

	/**
	 * Export registrants into a CSV file
	 */
	public function export()
	{
		ini_set('memory_limit', '-1');
		set_time_limit(0);

		$config = EventbookingHelper::getConfig();

		// Fake config data so that registrants model get correct data for export
		if (isset($config->export_group_billing_records))
		{
			$config->set('include_group_billing_in_registrants', $config->export_group_billing_records);
		}

		if (isset($config->export_group_member_records))
		{
			$config->set('include_group_members_in_registrants', $config->export_group_member_records);
		}

		$model = $this->getModel('registrants');

		/* @var EventbookingModelRegistrants $model */
		$model->setState('limitstart', 0)
			->setState('limit', 0)
			->setState('filter_order', 'tbl.id')
			->setState('filter_order_Dir', 'ASC');
		$cid = $this->input->get('cid', [], 'raw');

		if (!is_array($cid))
		{
			$cid = explode(',', $cid);
		}

		$cid = array_filter(ArrayHelper::toInteger($cid));

		$model->setRegistrantIds($cid);

		$rows = $model->getData();

		if (count($rows) == 0)
		{
			$this->setMessage(JText::_('There are no registrants to export'));
			$this->setRedirect('index.php?option=com_eventbooking&view=dashboard');

			return;
		}

		$eventId = (int) $model->getState('filter_event_id');

		// Trigger event for action log
		JPluginHelper::importPlugin('eventbooking');
		$this->app->triggerEvent('onRegistrantsExport', [$model->getState(), count($rows)]);

		$rowFields = EventbookingHelperRegistration::getAllEventFields($eventId);

		$fieldIds = [];

		foreach ($rowFields as $rowField)
		{
			$fieldIds[] = $rowField->id;
		}

		$fieldValues = $model->getFieldsData($fieldIds);

		list($fields, $headers) = EventbookingHelper::callOverridableHelperMethod('Data', 'prepareRegistrantsExportData', [$rows, $config, $rowFields, $fieldValues, $eventId]);

		EventbookingHelper::callOverridableHelperMethod('Data', 'excelExport', [$fields, $rows, 'registrants_list', $headers]);
	}

	/**
	 * Export registrants into a template file which can be used for modifying, then import back to system
	 */
	public function import_template()
	{
		ini_set('memory_limit', '-1');
		set_time_limit(0);

		$config = EventbookingHelper::getConfig();
		$model  = $this->getModel('registrants');

		/* @var EventbookingModelRegistrants $model */
		$model->setState('limitstart', 0)
			->setState('limit', 0)
			->setState('filter_order', 'tbl.id')
			->setState('filter_order_Dir', 'ASC');

		$cid = $this->input->get('cid', [], 'array');
		$model->setRegistrantIds($cid);

		$rows = $model->getData();

		if (count($rows) == 0)
		{
			$this->setMessage(JText::_('There are no registrants to export'));
			$this->setRedirect('index.php?option=com_eventbooking&view=dashboard');

			return;
		}

		$eventId   = (int) $model->getState('filter_event_id');
		$rowFields = EventbookingHelperRegistration::getAllEventFields($eventId);
		$fieldIds  = [];

		foreach ($rowFields as $rowField)
		{
			$fieldIds[] = $rowField->id;
		}

		$fieldValues = $model->getFieldsData($fieldIds);

		list($fields, $headers) = EventbookingHelper::callOverridableHelperMethod('Data', 'prepareRegistrantsExportData', [$rows, $config, $rowFields, $fieldValues, $eventId, true]);

		for ($i = 0, $n = count($fields); $i < $n; $i++)
		{
			if ($fields[$i] == 'registration_group_name')
			{
				unset($fields[$i]);

				continue;
			}
		}

		reset($fields);

		EventbookingHelperData::excelExport($fields, $rows, 'registrants_list', $fields);
	}

	/**
	 * Download invoice of the given registration record
	 *
	 * @throws Exception
	 */
	public function download_invoice()
	{
		$id  = $this->input->getInt('id');
		$row = JTable::getInstance('EventBooking', 'Registrant');

		if (!$row->load($id))
		{
			throw new Exception(sprintf('There is no registration record with ID %d', $id));
		}

		if (!$row->invoice_number)
		{
			throw new Exception(sprintf('No invoice generated for registration record with ID %d yet', $id));
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
	 * Method to checkin multiple registrants
	 *
	 * @return void
	 */
	public function checkin_multiple_registrants()
	{
		$cid = $this->input->get('cid', [], 'array');

		$cid = ArrayHelper::toInteger($cid);

		if (count($cid))
		{
			/* @var EventbookingModelRegistrant $model */
			$model = $this->getModel();

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

		$this->setRedirect('index.php?option=com_eventbooking&view=registrants');
	}

	/*
	 * Check in a registrant
	 */
	public function check_in()
	{
		$cid = $this->input->get('cid', [], 'array');

		/* @var EventbookingModelRegistrant $model */
		$model = $this->getModel();

		try
		{
			$model->checkin($cid[0], true);
			$this->setMessage(JText::_('EB_CHECKIN_SUCCESSFULLY'));
		}
		catch (Exception $e)
		{
			$this->setMessage($e->getMessage(), 'error');
		}

		$this->setRedirect('index.php?option=com_eventbooking&view=registrants');
	}

	/**
	 * Download Certificates for selected registrants
	 */
	public function download_certificates()
	{
		$cid = $this->input->get('cid', [], 'array');

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
	 * Reset check in for a registrant
	 */
	public function reset_check_in()
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

			$this->setMessage(JText::_('EB_RESET_CHECKIN_SUCCESSFULLY'));
		}
		catch (Exception $e)
		{
			$this->setMessage($e->getMessage(), 'error');
		}

		$this->setRedirect('index.php?option=com_eventbooking&view=registrants');
	}

	/**
	 * Remove group member from group registration
	 */
	public function remove_group_member()
	{
		$id            = $this->input->getInt('id');
		$groupMemberId = $this->input->getInt('group_member_id');

		/* @var $model EventbookingModelRegistrant */
		$model = $this->getModel();
		$model->delete([$groupMemberId]);

		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('COUNT(*)')
			->from('#__eb_registrants')
			->where('id = ' . $id);
		$db->setQuery($query);
		$total = $db->loadResult();

		if ($total)
		{
			// Redirect back to registrant edit screen
			$url = JRoute::_('index.php?option=com_eventbooking&view=registrant&id=' . $id, false);
		}
		else
		{
			// Redirect to registrants management
			$url = JRoute::_('index.php?option=com_eventbooking&view=registrants', false);
		}

		$this->setRedirect($url, JText::_('EB_GROUP_MEMBER_REMOVED'));
	}

	/**
	 * Method to import registrants from a csv file
	 */
	public function import()
	{
		$inputFile = $this->input->files->get('input_file');
		$fileName  = $inputFile ['name'];
		$fileExt   = strtolower(JFile::getExt($fileName));

		if (!in_array($fileExt, ['csv', 'xls', 'xlsx']))
		{
			$this->setRedirect('index.php?option=com_eventbooking&view=registrant&layout=import', JText::_('Invalid File Type. Only CSV, XLS and XLS file types are supported'));

			return;
		}

		/* @var  EventbookingModelRegistrant $model */
		$model = $this->getModel('Registrant');

		try
		{
			$numberImportedRegistrants = $model->import($inputFile['tmp_name']);

			$this->setRedirect('index.php?option=com_eventbooking&view=registrants', JText::sprintf('EB_NUMBER_REGISTRANTS_IMPORTED', $numberImportedRegistrants));
		}
		catch (Exception $e)
		{
			$this->setRedirect('index.php?option=com_eventbooking&view=registrant&layout=import');
			$this->setMessage($e->getMessage(), 'error');
		}
	}

	public function download_ticket()
	{
		$config = EventbookingHelper::getConfig();

		$row = JTable::getInstance('registrant', 'EventbookingTable');

		$id = $this->input->getInt('id', 0);

		if (!$row->load($id))
		{
			throw new Exception(JText::_('Invalid Registration Record'), 404);
		}

		if ($row->published == 0)
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
	 * Refund a registration
	 *
	 * @throws Exception
	 */
	public function refund()
	{
		$id = $this->input->post->getInt('id', 0);

		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*')
			->from('#__eb_registrants')
			->where('id = ' . $id);
		$db->setQuery($query);
		$rowRegistrant = $db->loadObject();

		if (EventbookingHelperRegistration::canRefundRegistrant($rowRegistrant))
		{
			/**@var EventbookingModelRegistrant $model * */
			$model = $this->getModel('Registrant');

			try
			{
				$model->refund($rowRegistrant);

				$this->setRedirect('index.php?option=com_eventbooking&view=registrant&id=' . $rowRegistrant->id, JText::_('EB_REGISTRATION_REFUNDED'));
			}
			catch (Exception $e)
			{
				$this->app->enqueueMessage($e->getMessage(), 'error');
				$this->setRedirect('index.php?option=com_eventbooking&view=registrant&id=' . $rowRegistrant->id, $e->getMessage(), 'error');
			}
		}
		else
		{
			throw new InvalidArgumentException(JText::_('EB_CANNOT_PROCESS_REFUND'));
		}
	}
}