<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

JFormHelper::loadFieldClass('list');

class JFormFieldEBField extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var string
	 */
	protected $type = 'ebfield';

	protected function getOptions()
	{
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName('id', 'value'))
			->select($db->quoteName('title', 'text'))
			->from('#__eb_fields')
			->where('published = 1')
			->order('title');
		$db->setQuery($query);

		$options   = [];
		$options[] = JHtml::_('select.option', '0', JText::_('Select Field'));

		return array_merge($options, $db->loadObjectList());
	}
}
