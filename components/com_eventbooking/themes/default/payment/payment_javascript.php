<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined( '_JEXEC' ) or die;

EventbookingHelperPayments::writeJavascriptObjects();

JFactory::getDocument()->addScriptOptions('selectedState', $selectedState);

EventbookingHelperHtml::addOverridableScript('media/com_eventbooking/js/site-payment-default.min.js');
