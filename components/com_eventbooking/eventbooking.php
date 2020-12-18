<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

// no direct access
defined('_JEXEC') or die;

// Require library + register autoloader
require_once JPATH_ADMINISTRATOR . '/components/com_eventbooking/libraries/rad/bootstrap.php';

// Add base AjaxURL to use in JS
$baseAjaxUrl = JUri::root(true) . '/index.php?option=com_eventbooking' . EventbookingHelper::getLangLink() . '&time=' . time();
JFactory::getDocument()->addScriptDeclaration('var EBBaseAjaxUrl = "' . $baseAjaxUrl . '";');

if (version_compare(JVERSION, '4.0.0-dev', 'ge'))
{
	$source = JFactory::getApplication()->input;
}
else
{
	$source = null;
}

EventbookingHelper::prepareRequestData();

$input = new RADInput($source);

$config = require JPATH_ADMINISTRATOR . '/components/com_eventbooking/config.php';

RADController::getInstance($input->getCmd('option', null), $input, $config)
	->execute()
	->redirect();
