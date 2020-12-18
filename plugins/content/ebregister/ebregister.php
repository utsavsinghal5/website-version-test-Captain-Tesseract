<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

class plgContentEBRegister extends JPlugin
{
	/**
	 * Display Individual Registration Form for the event in article
	 *
	 * @param $context
	 * @param $article
	 * @param $params
	 * @param $limitstart
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function onContentPrepare($context, &$article, &$params, $limitstart = 0)
	{
		$app = JFactory::getApplication();

		if ($app->getName() != 'site')
		{
			return true;
		}

		if (strpos($article->text, 'ebregister') === false)
		{
			return true;
		}

		$regex         = "#{ebregister (\d+)}#s";
		$article->text = preg_replace_callback($regex, [&$this, 'displayIndividualRegistrationForm'], $article->text);

		return true;
	}

	/**
	 * Display individual registration form for the event
	 *
	 * @param $matches
	 *
	 * @return string
	 * @throws Exception
	 */
	public function displayIndividualRegistrationForm(&$matches)
	{
		// Require library + register autoloader
		require_once JPATH_ADMINISTRATOR . '/components/com_eventbooking/libraries/rad/bootstrap.php';

		EventbookingHelper::loadLanguage();
		$eventId = $matches[1];

		$request = ['option' => 'com_eventbooking', 'view' => 'register', 'event_id' => $eventId, 'layout' => 'default', 'hmvc_call' => 1, 'Itemid' => EventbookingHelper::getItemid()];
		$input   = new RADInput($request);
		$config  = require JPATH_ADMINISTRATOR . '/components/com_eventbooking/config.php';
		ob_start();

		//Initialize the controller, execute the task
		RADController::getInstance('com_eventbooking', $input, $config)
			->execute();

		return '<div class="clearfix"></div>' . ob_get_clean();
	}
}
