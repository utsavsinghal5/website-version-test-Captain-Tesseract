<?php
/**
 * @package     RAD
 * @subpackage  Controller
 *
 * @copyright   Copyright (C) 2015 Ossolution Team, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */
defined('_JEXEC') or die;

/**
 * Joomla CMS Item View Class. This class is used to display details information of an item
 * or display form allow add/editing items
 *
 * @package     RAD
 * @subpackage  View
 * @since       2.0
 *
 * @property RADModelAdmin $model
 */
class RADViewItem extends RADViewHtml
{
	/**
	 * The model state.
	 *
	 * @var RADModelState
	 */
	protected $state;

	/**
	 * The record which is being added/edited
	 *
	 * @var Object
	 */
	protected $item;

	/**
	 * The array which keeps list of "list" options which will be displayed on the form
	 *
	 * @var array
	 */
	protected $lists;

	/**
	 * Method to prepare all the data for the view before it is displayed
	 */
	protected function prepareView()
	{
		$this->state = $this->model->getState();
		$this->item  = $this->model->getData();

		if ($this->input->getInt('validate_input_error') && method_exists($this->item, 'bind'))
		{
			$this->item->bind($this->input->post->getData(), ['id']);
		}

		if (property_exists($this->item, 'published'))
		{
			$this->lists['published'] = EventbookingHelperHtml::getBooleanInput('published', $this->item->published);
		}

		if (property_exists($this->item, 'access'))
		{
			$this->lists['access'] = JHtml::_('access.level', 'access', $this->item->access, ' ', false);
		}

		if (property_exists($this->item, 'language'))
		{
			$this->lists['language'] = JHtml::_('select.genericlist', JHtml::_('contentlanguage.existing', true, true), 'language', ' ', 'value', 'text', $this->item->language);
		}

		if ($this->isAdminView)
		{
			$this->addToolbar();
		}

		$this->languages = EventbookingHelper::getLanguages();
	}

	/**
	 * Add toolbar buttons for add/edit item form
	 */
	protected function addToolbar()
	{
		$helperClass = $this->viewConfig['class_prefix'] . 'Helper';

		if (is_callable($helperClass . '::getActions'))
		{
			$canDo = call_user_func([$helperClass, 'getActions'], $this->name, $this->state);
		}
		else
		{
			$canDo = call_user_func(['RADHelper', 'getActions'], $this->option, $this->name, $this->state);
		}

		if ($this->item->id)
		{
			$toolbarTitle = $this->viewConfig['language_prefix'] . '_' . $this->name . '_EDIT';
		}
		else
		{
			$toolbarTitle = $this->viewConfig['language_prefix'] . '_' . $this->name . '_NEW';
		}

		JToolbarHelper::title(JText::_(strtoupper($toolbarTitle)));

		if (($canDo->get('core.edit') || ($canDo->get('core.create'))) && !in_array('save', $this->hideButtons))
		{
			JToolbarHelper::apply('apply', 'JTOOLBAR_APPLY');
			JToolbarHelper::save('save', 'JTOOLBAR_SAVE');
		}

		if ($canDo->get('core.create') && !in_array('save2new', $this->hideButtons))
		{
			JToolbarHelper::custom('save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
		}

		if ($this->item->id && $canDo->get('core.create') && !in_array('save2copy', $this->hideButtons))
		{
			JToolbarHelper::save2copy('save2copy');
		}

		if ($this->item->id)
		{
			JToolbarHelper::cancel('cancel', 'JTOOLBAR_CLOSE');
		}
		else
		{
			JToolbarHelper::cancel('cancel', 'JTOOLBAR_CANCEL');
		}
	}
}
