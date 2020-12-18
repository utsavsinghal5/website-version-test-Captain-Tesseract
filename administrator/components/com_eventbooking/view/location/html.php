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

class EventbookingViewLocationHtml extends RADViewItem
{
	protected function prepareView()
	{
		parent::prepareView();

		$config    = EventbookingHelper::getConfig();
		$countries = EventbookingHelperDatabase::getAllCountries();
		$options   = [];
		$options[] = JHtml::_('select.option', '', JText::_('EB_SELECT_COUNTRY'));

		foreach ($countries as $country)
		{
			$options[] = JHtml::_('select.option', $country->name, $country->name);
		}

		$this->lists['country'] = JHtml::_('select.genericlist', $options, 'country', ' class="inputbox" ', 'value', 'text', $this->item->country);

		$options               = [];
		$options[]             = JHtml::_('select.option', '', JText::_('Default Layout'));
		$options[]             = JHtml::_('select.option', 'table', JText::_('Table Layout'));
		$options[]             = JHtml::_('select.option', 'timeline', JText::_('Timeline Layout'));
		$this->lists['layout'] = JHtml::_('select.genericlist', $options, 'layout', ' class="inputbox" ', 'value', 'text', $this->item->layout);

		$this->config = $config;
	}
}
