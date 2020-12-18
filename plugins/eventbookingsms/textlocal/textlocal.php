<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

class plgEventbookingSMSClickatell extends JPlugin
{
	public function onEBSendingSMSReminder($rows)
	{
		require_once JPATH_ROOT . '/plugins/eventbookingsms/textlocal/textlocal/textlocal.class.php';

		$apiKey = $this->params->get('api_key');
		$sender = $this->params->get('sender', 'TXTLCL');

		if (!$apiKey)
		{
			return;
		}

		$client = new Textlocal(false, false, $apiKey);

		foreach ($rows as $row)
		{
			try
			{
				$client->sendSms([$row->phone], $row->sms_message, $sender);
			}
			catch (Exception $e)
			{
				EventbookingHelper::logData(__DIR__ . '/clickatell_error.txt', ['id' => $row->id, 'phone' => $row->phone, 'error' => $e->getMessage()]);
			}
		}

		// Return true to tell the system that SMS were successfully sent so that it could update sms sending status for registrants
		return true;
	}
}