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
		require_once JPATH_ROOT . '/plugins/eventbookingsms/clickatell/clickatell/vendor/autoload.php';

		$apiToken = $this->params->get('api_token');

		if (!$apiToken)
		{
			return;
		}

		$clickatell = new \Clickatell\Rest($apiToken);

		foreach ($rows as $row)
		{
			try
			{
				$result = $clickatell->sendMessage(['to' => [$row->phone], 'content' => $row->sms_message]);

				if ($result['error'])
				{
					EventbookingHelper::logData(__DIR__ . '/clickatell_error.txt', ['id' => $row->id, 'phone' => $row->phone, 'error' => $result['error'], 'errorDescription' => $result['errorDescription']]);
				}
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