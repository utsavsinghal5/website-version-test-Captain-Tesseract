<?php
/**
 * @version            3.11.4
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die();

/**
 * Stripe payment plugin for Events Booking
 *
 * @author Tuan Pham Ngoc
 *
 */
class os_stripe extends RADPaymentOmnipay
{

	protected $omnipayPackage = 'Stripe';

	/**
	 * Constructor
	 *
	 * @param JRegistry $params
	 * @param array     $config
	 */
	public function __construct($params, $config = ['type' => 1])
	{
		// Use sandbox API keys if available
		if (!$params->get('mode', 1))
		{
			if ($params->get('sandbox_stripe_public_key'))
			{
				$params->set('stripe_public_key', $params->get('sandbox_stripe_public_key'));
			}

			if ($params->get('sandbox_stripe_api_key'))
			{
				$params->set('stripe_api_key', $params->get('sandbox_stripe_api_key'));
			}
		}

		$config['params_map'] = [
			'apiKey' => 'stripe_api_key',
		];

		$document  = JFactory::getDocument();
		$publicKey = $params->get('stripe_public_key');

		if ($params->get('use_stripe_card_element', 0))
		{
			$db    = JFactory::getDbo();
			$query = $db->getQuery(true)
				->select($db->quoteName('sef'))
				->from('#__languages')
				->where('lang_code = ' . $db->quote(JFactory::getLanguage()->getTag()))
				->where('published = 1');
			$db->setQuery($query);
			$locale           = substr($db->loadResult(), 0, 2);
			$supportedLocales = ['ar', 'da', 'de', 'en', 'es', 'fi', 'fr', 'he', 'it', 'ja', 'no', 'nl', 'pl', 'sv', 'zh'];

			$document->addScript('https://js.stripe.com/v3/');

			if (in_array($locale, $supportedLocales))
			{
				$document->addScriptDeclaration(
					"   var stripe = Stripe('$publicKey');\n
						var elements = stripe.elements({locale: '$locale'});\n
					"
				);
			}
			else
			{
				$document->addScriptDeclaration(
					"   var stripe = Stripe('$publicKey');\n
						var elements = stripe.elements();\n
					"
				);
			}

			$config['type'] = 0;
		}
		else
		{
			$document->addScript('https://js.stripe.com/v2/');
			$document->addScriptDeclaration(
				"   var stripePublicKey = '$publicKey';\n
					Stripe.setPublishableKey('$publicKey');\n
				"
			);
		}

		parent::__construct($params, $config);
	}

	/**
	 * Add stripeToken to request message
	 *
	 * @param \Omnipay\Stripe\Message\AbstractRequest $request
	 * @param EventbookingTableRegistrant             $row
	 * @param array                                   $data
	 */
	protected function beforeRequestSend($request, $row, $data)
	{
		parent::beforeRequestSend($request, $row, $data);

		$request->setToken($data['stripeToken']);

		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('name, title')
			->from('#__eb_fields')
			->where('published = 1');
		$db->setQuery($query);
		$fields = $db->loadObjectList('name');

		$metaData[$fields['first_name']->title] = $row->first_name;

		if ($row->last_name)
		{
			$metaData[$fields['last_name']->title] = $row->last_name;
		}

		$metaData['Email']  = $row->email;
		$metaData['Source'] = 'Event Booking';
		$metaData['Event']  = $data['event_title'];

		if ($row->user_id > 0)
		{
			$metaData['User ID'] = $row->user_id;
		}

		$metaData['Registrant ID'] = $row->id;

		$request->setMetadata($metaData);
	}

	/**
	 * Refund a transaction
	 *
	 * @param EventbookingTableRegistrant $row
	 *
	 * @throws Exception
	 */
	public function refund($row)
	{
		if (!class_exists('\Stripe\Stripe'))
		{
			require_once __DIR__ . '/stripe/init.php';
		}

		\Stripe\Stripe::setApiKey($this->params->get('stripe_api_key'));

		try
		{
			\Stripe\Refund::create(['charge' => $row->transaction_id]);
		}
		catch (\Stripe\Error\Card $e)
		{

			// Use the variable $error to save any errors
			// To be displayed to the customer later in the page
			$body  = $e->getJsonBody();
			$err   = $body['error'];
			$error = $err['message'];

			throw new Exception($error);
		}
	}
}