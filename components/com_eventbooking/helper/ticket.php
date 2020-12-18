<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

class EventbookingHelperTicket
{
	/**
	 * Format ticket number
	 *
	 * @param   string     $ticketPrefix
	 * @param   int        $ticketNumber
	 * @param   RADConfig  $config
	 *
	 * @return string The formatted ticket number
	 */
	public static function formatTicketNumber($ticketPrefix, $ticketNumber, $config)
	{
		return $ticketPrefix . str_pad($ticketNumber, $config->ticket_number_length ? $config->ticket_number_length : 5, '0', STR_PAD_LEFT);
	}

	/**
	 * Generate Ticket PDFs
	 *
	 * @param   EventbookingTableRegistrant  $row
	 * @param   RADConfig                    $config
	 */
	public static function generateTicketsPDF($row, $config)
	{
		if (EventbookingHelper::isMethodOverridden('EventbookingHelperOverrideTicket', 'generateTicketsPDF'))
		{
			EventbookingHelperOverrideTicket::generateTicketsPDF($row, $config);

			return;
		}

		EventbookingHelper::loadLanguage();

		$pdf = EventbookingHelper::callOverridableHelperMethod('Helper', 'getTCPDF', ['Ticket', $config->get('ticket_page_orientation', PDF_PAGE_ORIENTATION), $config->get('ticket_page_format', PDF_PAGE_FORMAT)]);

		$fieldSuffix = EventbookingHelper::getFieldSuffix($row->language);

		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);;

		$rowEvent = EventbookingHelperDatabase::getEvent($row->event_id, null, $fieldSuffix);

		if ($fieldSuffix && EventbookingHelper::isValidMessage($rowEvent->{'ticket_layout' . $fieldSuffix}))
		{
			$ticketLayout = $rowEvent->{'ticket_layout' . $fieldSuffix};
		}
		elseif (EventbookingHelper::isValidMessage($rowEvent->ticket_layout))
		{
			$ticketLayout = $rowEvent->ticket_layout;
		}
		elseif ($fieldSuffix && EventbookingHelper::isValidMessage($config->{'default_ticket_layout' . $fieldSuffix}))
		{
			$ticketLayout = $config->{'default_ticket_layout' . $fieldSuffix};
		}
		else
		{
			$ticketLayout = $config->default_ticket_layout;
		}

		if ($rowEvent->collect_member_information === '')
		{
			$collectMemberInformation = $config->collect_member_information;
		}
		else
		{
			$collectMemberInformation = $rowEvent->collect_member_information;
		}

		$currentUserId = JFactory::getUser()->id;

		if ($row->group_id > 0)
		{
			$query->clear()
				->select('*')
				->from('#__eb_registrants')
				->where('id = ' . $row->group_id);
			$db->setQuery($query);
			$billingRow = $db->loadObject();
		}
		else
		{
			$billingRow = $row;
		}

		if (empty($billingRow))
		{
			$billingRow = $row;
		}

		$billingReplaces = EventbookingHelperRegistration::getRegistrationReplaces($billingRow, $rowEvent, $currentUserId);

		if ($row->is_group_billing && $collectMemberInformation)
		{
			$query->clear()
				->select('*')
				->from('#__eb_registrants')
				->where('group_id = ' . $row->id);
			$db->setQuery($query);
			$rowMembers = $db->loadObjectList();

			foreach ($rowMembers as $rowMember)
			{
				$pdf->AddPage();

				// Add background image for the page if configured
				static::setTicketBackgroundImage($pdf, $rowEvent, $config);

				$replaces = EventbookingHelperRegistration::getRegistrationReplaces($rowMember, $rowEvent, $currentUserId);

				$replaces['ticket_number']     = self::formatTicketNumber($rowEvent->ticket_prefix, $rowMember->ticket_number, $config);
				$replaces['registration_date'] = JHtml::_('date', $row->register_date, $config->date_format);
				$replaces['event_title']       = $rowEvent->title;

				$output = $ticketLayout;

				foreach ($replaces as $key => $value)
				{
					$key    = strtoupper($key);
					$output = str_ireplace("[$key]", $value, $output);
				}

				foreach ($billingReplaces as $key => $value)
				{
					$key    = strtoupper($key);
					$output = str_ireplace("[$key]", $value, $output);
					$key    = strtoupper('BILLING_' . $key);
					$output = str_ireplace("[$key]", $value, $output);
				}

				$output = EventbookingHelperRegistration::processQRCODE($rowMember, $output, false);

				if (strpos($output, '[TICKET_NUMBER_QRCODE]') !== false)
				{
					EventbookingHelperRegistration::generateTicketNumberQrcode($replaces['ticket_number']);
					$imgTag = '<img src="media/com_eventbooking/qrcodes/' . $replaces['ticket_number'] . '.png" border="0" alt="QRCODE" />';
					$output = str_ireplace("[TICKET_NUMBER_QRCODE]", $imgTag, $output);
				}

				$pdf->writeHTML($output, true, false, false, false, '');
			}
		}
		else
		{
			$pdf->AddPage();

			// Add background image for the ticket if configured
			static::setTicketBackgroundImage($pdf, $rowEvent, $config);

			$replaces = EventbookingHelperRegistration::getRegistrationReplaces($row, $rowEvent, $currentUserId, $config->multiple_booking);

			$replaces['ticket_number']     = self::formatTicketNumber($rowEvent->ticket_prefix, $row->ticket_number, $config);
			$replaces['registration_date'] = JHtml::_('date', $row->register_date, $config->date_format);
			$replaces['event_title']       = $rowEvent->title;

			foreach ($replaces as $key => $value)
			{
				$key          = strtoupper($key);
				$ticketLayout = str_ireplace("[$key]", $value, $ticketLayout);
			}

			foreach ($billingReplaces as $key => $value)
			{
				$key          = strtoupper($key);
				$ticketLayout = str_ireplace("[$key]", $value, $ticketLayout);
				$key          = strtoupper('BILLING_' . $key);
				$ticketLayout = str_ireplace("[$key]", $value, $ticketLayout);
			}

			$ticketLayout = EventbookingHelperRegistration::processQRCODE($row, $ticketLayout, false);

			if (strpos($ticketLayout, '[TICKET_NUMBER_QRCODE]') !== false)
			{
				EventbookingHelperRegistration::generateTicketNumberQrcode($replaces['ticket_number']);
				$imgTag       = '<img src="media/com_eventbooking/qrcodes/' . $replaces['ticket_number'] . '.png" border="0" alt="QRCODE" />';
				$ticketLayout = str_ireplace("[TICKET_NUMBER_QRCODE]", $imgTag, $ticketLayout);
			}

			$pdf->writeHTML($ticketLayout, true, false, false, false, '');
		}

		$filePath = JPATH_ROOT . '/media/com_eventbooking/tickets/ticket_' . str_pad($row->id, 5, '0', STR_PAD_LEFT) . '.pdf';

		$pdf->Output($filePath, 'F');
	}

	/**
	 * Generate Ticket PDFs and return path to the files. Each ticket will be a separate PDF file for easier sending to
	 * members in a group registration
	 *
	 * @param   EventbookingTableRegistrant  $row
	 * @param   RADConfig                    $config
	 *
	 * @return []
	 */
	public static function generateRegistrationTicketsPDF($row, $config)
	{
		EventbookingHelper::loadLanguage();

		$fieldSuffix = EventbookingHelper::getFieldSuffix($row->language);

		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);;

		$rowEvent = EventbookingHelperDatabase::getEvent($row->event_id, null, $fieldSuffix);

		if ($fieldSuffix && EventbookingHelper::isValidMessage($rowEvent->{'ticket_layout' . $fieldSuffix}))
		{
			$ticketLayout = $rowEvent->{'ticket_layout' . $fieldSuffix};
		}
		elseif (EventbookingHelper::isValidMessage($rowEvent->ticket_layout))
		{
			$ticketLayout = $rowEvent->ticket_layout;
		}
		elseif ($fieldSuffix && EventbookingHelper::isValidMessage($config->{'default_ticket_layout' . $fieldSuffix}))
		{
			$ticketLayout = $config->{'default_ticket_layout' . $fieldSuffix};
		}
		else
		{
			$ticketLayout = $config->default_ticket_layout;
		}

		if ($rowEvent->collect_member_information === '')
		{
			$collectMemberInformation = $config->collect_member_information;
		}
		else
		{
			$collectMemberInformation = $rowEvent->collect_member_information;
		}

		$currentUserId = JFactory::getUser()->id;

		if ($row->group_id > 0)
		{
			$query->clear()
				->select('*')
				->from('#__eb_registrants')
				->where('id = ' . $row->group_id);
			$db->setQuery($query);
			$billingRow = $db->loadObject();
		}
		else
		{
			$billingRow = $row;
		}

		if (empty($billingRow))
		{
			$billingRow = $row;
		}

		$ticketFilePaths = [];

		$billingReplaces = EventbookingHelperRegistration::getRegistrationReplaces($billingRow, $rowEvent, $currentUserId);

		if ($row->is_group_billing && $collectMemberInformation)
		{
			$query->clear()
				->select('*')
				->from('#__eb_registrants')
				->where('group_id = ' . $row->id);
			$db->setQuery($query);
			$rowMembers = $db->loadObjectList();

			foreach ($rowMembers as $rowMember)
			{
				$pdf = EventbookingHelper::callOverridableHelperMethod('Helper', 'getTCPDF', ['Ticket', $config->get('ticket_page_orientation', PDF_PAGE_ORIENTATION), $config->get('ticket_page_format', PDF_PAGE_FORMAT)]);

				$pdf->AddPage();

				// Add background image for the page if configured
				static::setTicketBackgroundImage($pdf, $rowEvent, $config);

				$replaces = EventbookingHelperRegistration::getRegistrationReplaces($rowMember, $rowEvent, $currentUserId);

				$replaces['ticket_number']     = self::formatTicketNumber($rowEvent->ticket_prefix, $rowMember->ticket_number, $config);
				$replaces['registration_date'] = JHtml::_('date', $row->register_date, $config->date_format);
				$replaces['event_title']       = $rowEvent->title;

				$output = $ticketLayout;

				foreach ($replaces as $key => $value)
				{
					$key    = strtoupper($key);
					$output = str_ireplace("[$key]", $value, $output);
				}

				foreach ($billingReplaces as $key => $value)
				{
					$key    = strtoupper($key);
					$output = str_ireplace("[$key]", $value, $output);
					$key    = strtoupper('BILLING_' . $key);
					$output = str_ireplace("[$key]", $value, $output);
				}

				$output = EventbookingHelperRegistration::processQRCODE($rowMember, $output, false);

				if (strpos($output, '[TICKET_NUMBER_QRCODE]') !== false)
				{
					EventbookingHelperRegistration::generateTicketNumberQrcode($replaces['ticket_number']);
					$imgTag = '<img src="media/com_eventbooking/qrcodes/' . $replaces['ticket_number'] . '.png" border="0" alt="QRCODE" />';
					$output = str_ireplace("[TICKET_NUMBER_QRCODE]", $imgTag, $output);
				}

				$pdf->writeHTML($output, true, false, false, false, '');
				$ticketFileName = JFile::makeSafe($replaces['ticket_number'] . '.pdf');
				$filePath       = JPATH_ROOT . '/media/com_eventbooking/tickets/' . $ticketFileName;
				$pdf->Output($filePath, 'F');
				$ticketFilePaths[] = $filePath;
			}
		}
		else
		{
			$pdf = EventbookingHelper::callOverridableHelperMethod('Helper', 'getTCPDF', ['Ticket', $config->get('ticket_page_orientation', PDF_PAGE_ORIENTATION), $config->get('ticket_page_format', PDF_PAGE_FORMAT)]);

			$pdf->AddPage();

			// Add background image for the ticket if configured
			static::setTicketBackgroundImage($pdf, $rowEvent, $config);

			$replaces = EventbookingHelperRegistration::getRegistrationReplaces($row, $rowEvent, $currentUserId, $config->multiple_booking);

			$replaces['ticket_number']     = self::formatTicketNumber($rowEvent->ticket_prefix, $row->ticket_number, $config);
			$replaces['registration_date'] = JHtml::_('date', $row->register_date, $config->date_format);
			$replaces['event_title']       = $rowEvent->title;

			foreach ($replaces as $key => $value)
			{
				$key          = strtoupper($key);
				$ticketLayout = str_ireplace("[$key]", $value, $ticketLayout);
			}

			foreach ($billingReplaces as $key => $value)
			{
				$key          = strtoupper($key);
				$ticketLayout = str_ireplace("[$key]", $value, $ticketLayout);
				$key          = strtoupper('BILLING_' . $key);
				$ticketLayout = str_ireplace("[$key]", $value, $ticketLayout);
			}

			$ticketLayout = EventbookingHelperRegistration::processQRCODE($row, $ticketLayout, false);

			if (strpos($ticketLayout, '[TICKET_NUMBER_QRCODE]') !== false)
			{
				EventbookingHelperRegistration::generateTicketNumberQrcode($replaces['ticket_number']);
				$imgTag       = '<img src="media/com_eventbooking/qrcodes/' . $replaces['ticket_number'] . '.png" border="0" alt="QRCODE" />';
				$ticketLayout = str_ireplace("[TICKET_NUMBER_QRCODE]", $imgTag, $ticketLayout);
			}

			$pdf->writeHTML($ticketLayout, true, false, false, false, '');

			$ticketFileName = JFile::makeSafe($replaces['ticket_number'] . '.pdf');
			$filePath       = JPATH_ROOT . '/media/com_eventbooking/tickets/' . $ticketFileName;
			$pdf->Output($filePath, 'F');
			$ticketFilePaths[] = $filePath;
		}

		return $ticketFilePaths;
	}

	/**
	 * Set background image for ticket
	 *
	 * @param   TCPDF                   $pdf
	 * @param   EventbookingTableEvent  $rowEvent
	 * @param   RADConfig               $config
	 *
	 * @return void
	 */
	public static function setTicketBackgroundImage($pdf, $rowEvent, $config)
	{
		if ($rowEvent->ticket_bg_image)
		{
			$backgroundImage = $rowEvent->ticket_bg_image;
		}
		else
		{
			$backgroundImage = $config->get('default_ticket_bg_image');
		}

		if (!$backgroundImage || !file_exists(JPATH_ROOT . '/' . $backgroundImage))
		{
			return;
		}

		$backgroundImagePath = JPATH_ROOT . '/' . $backgroundImage;

		if ($rowEvent->ticket_bg_left > 0)
		{
			$ticketBgLeft = $rowEvent->ticket_bg_left;
		}
		elseif ($config->default_ticket_bg_left > 0)
		{
			$ticketBgLeft = $config->default_ticket_bg_left;
		}
		else
		{
			$ticketBgLeft = 0;
		}

		if ($rowEvent->ticket_bg_top > 0)
		{
			$ticketBgTop = $rowEvent->ticket_bg_top;
		}
		elseif ($config->default_ticket_bg_top > 0)
		{
			$ticketBgTop = $config->default_ticket_bg_top;
		}
		else
		{
			$ticketBgTop = 0;
		}

		if ($rowEvent->ticket_bg_width > 0)
		{
			$ticketBgWidth = $rowEvent->ticket_bg_width;
		}
		elseif ($config->default_ticket_bg_width > 0)
		{
			$ticketBgWidth = $config->default_ticket_bg_width;
		}
		else
		{
			$ticketBgWidth = 0;
		}

		if ($rowEvent->ticket_bg_height > 0)
		{
			$ticketBgHeight = $rowEvent->ticket_bg_height;
		}
		elseif ($config->default_ticket_bg_height > 0)
		{
			$ticketBgHeight = $config->default_ticket_bg_height;
		}
		else
		{
			$ticketBgHeight = 0;
		}

		// Get current  break margin
		$breakMargin = $pdf->getBreakMargin();
		// get current auto-page-break mode
		$autoPageBreak = $pdf->getAutoPageBreak();
		// disable auto-page-break
		$pdf->SetAutoPageBreak(false, 0);
		// set background image
		$pdf->Image($backgroundImagePath, $ticketBgLeft, $ticketBgTop, $ticketBgWidth, $ticketBgHeight);
		// restore auto-page-break status
		$pdf->SetAutoPageBreak($autoPageBreak, $breakMargin);
		// set the starting point for the page content
		$pdf->setPageMark();
	}

	/**
	 * Generate TICKET_QRCODE
	 *
	 * @param $row
	 */
	public static function generateTicketQrcode($row)
	{
		EventbookingHelperRegistration::generateTicketQrcode($row);
	}

	/**
	 * Process QRCODE for ticket. Support [QRCODE] and [TICKET_QRCODE] tag
	 *
	 * @param $row
	 * @param $output
	 *
	 * @return mixed
	 */
	protected static function processQRCODE($row, $output)
	{
		return EventbookingHelperRegistration::processQRCODE($row, $output, false);
	}
}
