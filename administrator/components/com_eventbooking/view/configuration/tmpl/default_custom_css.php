<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */
defined('_JEXEC') or die;

if (!empty($this->editor))
{
	echo JHtml::_('bootstrap.addTab', 'configuration', 'custom-css', JText::_('EB_CUSTOM_CSS', true));

	$customCss = '';

	if (file_exists(JPATH_ROOT . '/media/com_eventbooking/assets/css/custom.css'))
	{
		$customCss = file_get_contents(JPATH_ROOT . '/media/com_eventbooking/assets/css/custom.css');
	}

	echo $this->editor->display('custom_css', $customCss, '100%', '550', '75', '8', false, null, null, null, array('syntax' => 'css'));

	echo JHtml::_('bootstrap.endTab');
}