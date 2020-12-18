<?php
/**
 * @version            2.1.0
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2015 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */
// no direct access
defined('_JEXEC') or die();

require_once JPATH_ROOT . '/components/com_eventbooking/payments/ccavenue/Crypto.php';

class os_ccavenue extends RADPayment
{
	/**
	 * Working key
	 *
	 * @var string
	 */
	private $workingKey;

	/**
	 * Access code
	 *
	 * @var string
	 */
	private $accessCode;

	/**
	 * Constructor
	 *
	 * @param   JRegistry  $params
	 * @param   array      $config
	 */

	public function __construct($params, $config = [])
	{
		parent::__construct($params, $config);

		if ($params->get('mode', 0))
		{
			$this->url = 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction';
		}
		else
		{
			$this->url = 'https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction';
		}

		$this->workingKey = $params->get('workingkey');
		$this->accessCode = $params->get('access_code');

		// Init parameter
		$this->setParameter('merchant_id', $params->get('merchant_id'));
		$this->setParameter('currency', 'INR');
		$this->setParameter('language', 'EN');
	}

	/**
	 * Process payment
	 *
	 * @param $row
	 * @param $data
	 */
	public function processPayment($row, $data)
	{
		$Itemid  = JFactory::getApplication()->input->getInt('Itemid', 0);
		$siteUrl = JUri::base();

		$this->setParameter('amount', round($data['amount'], 2));
		$this->setParameter('order_id', $row->id);
		$this->setParameter('redirect_url', urlencode($siteUrl . 'index.php?option=com_eventbooking&task=payment_confirm&payment_method=os_ccavenue&Itemid=' . $Itemid));
		$this->setParameter('cancel_url', urlencode($siteUrl . 'index.php?option=com_eventbooking&task=cancel&id=' . $row->id . '&Itemid=' . $Itemid));

		if ($row->country)
		{
			$country = $row->country;
		}
		else
		{
			$config  = EventbookingHelper::getConfig();
			$country = $config->default_country;
		}

		// Billing information
		$this->setParameter('billing_name', rtrim($row->first_name . ' ' . $row->last_name));
		$this->setParameter('billing_address', $row->address);
		$this->setParameter('billing_city', $row->city);
		$this->setParameter('billing_state', $row->state);
		$this->setParameter('billing_zip', $row->zip);
		$this->setParameter('billing_country', $country);
		$this->setParameter('billing_tel', $row->phone);
		$this->setParameter('billing_email', $row->email);

		// Shipping information
		$this->setParameter('delivery_name', rtrim($row->first_name . ' ' . $row->last_name));
		$this->setParameter('delivery_address', $row->address);
		$this->setParameter('delivery_city', $row->city);
		$this->setParameter('delivery_state', $row->state);
		$this->setParameter('delivery_zip', $row->zip);
		$this->setParameter('delivery_country', $country);
		$this->setParameter('delivery_tel', $row->phone);

		$merchantData = '';

		foreach ($this->parameters as $key => $value)
		{
			$merchantData .= $key . '=' . $value . '&';
		}

		$encrypted_data = encrypt($merchantData, $this->workingKey); // Method for encrypting the data.

		$this->renderRedirectForm($this->url, ['encRequest' => $encrypted_data, 'access_code' => $this->accessCode]);
	}

	/**
	 * Validate the post data from paypal to our server
	 *
	 * @return string
	 */
	private function validate()
	{
		$session     = JFactory::getSession();
		$encResponse = $_POST["encResp"];            //This is the response sent by the CCAvenue Server
		$rcvdString  = decrypt($encResponse, $this->workingKey);        //Crypto Decryption used as per the specified working key.
		$query       = [];
		parse_str($rcvdString, $query);
		$order_status           = $query['order_status'];
		$this->notificationData = $query;

		if ($order_status === "Success")
		{
			$this->logGatewayData('Success');

			return true;
		}
		else if ($order_status === "Aborted")
		{
			$session->set('omnipay_payment_error_reason', 'Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail');
			$this->logGatewayData('Aborted');

			return false;

		}
		else if ($order_status === "Failure")
		{
			$session->set('omnipay_payment_error_reason', 'Thank you for shopping with us.However,the transaction has been declined.');
			$this->logGatewayData('Failure');

			return false;
		}
		else
		{
			$session->set('omnipay_payment_error_reason', 'Security Error. Illegal access detected.');
			$this->logGatewayData('Failure');

			return false;
		}
	}

	/**
	 * Process payment callback, update registration status, send email...
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function verifyPayment()
	{
		$app    = JFactory::getApplication();
		$Itemid = $app->input->getInt('Itemid', 0);
		$ret    = $this->validate();
		$id     = (int) $this->notificationData['order_id'];

		if ($ret)
		{
			$row = JTable::getInstance('Registrant', 'EventbookingTable');

			if (!$row->load($id))
			{
				return false;
			}

			if ($row->published)
			{
				return false;
			}

			$this->onPaymentSuccess($row, $this->notificationData['tracking_id']);

			$app->redirect(JRoute::_('index.php?option=com_eventbooking&view=complete&registration_code=' . $row->registration_code . '&Itemid=' . $Itemid, false, false));

			return true;
		}
		else
		{
			$app->redirect(JRoute::_('index.php?option=com_eventbooking&view=failure&id=' . $id . '&Itemid=' . $Itemid, false, false));
		}
	}
}