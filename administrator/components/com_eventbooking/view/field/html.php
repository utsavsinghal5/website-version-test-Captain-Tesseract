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

class EventbookingViewFieldHtml extends RADViewItem
{
	protected function prepareView()
	{
		parent::prepareView();

		$db     = JFactory::getDbo();
		$query  = $db->getQuery(true);
		$config = EventbookingHelper::getConfig();

		// Set default display_in property for new field
		if (!$this->item->id)
		{
			$this->item->display_in = 5;
		}

		$options    = [];
		$fieldTypes = ['Text', 'Url', 'Email', 'Number', 'Tel', 'Textarea', 'List', 'Checkboxes', 'Radio', 'Date', 'Heading', 'Message', 'File', 'Countries', 'State', 'SQL', 'Range', 'Hidden', 'Password'];


		foreach ($fieldTypes as $fieldType)
		{
			$options[] = JHtml::_('select.option', $fieldType, $fieldType);
		}

		if ($this->item->is_core)
		{
			$readOnly = ' readonly="true" ';
		}
		else
		{
			$readOnly = '';
		}

		$this->lists['fieldtype'] = JHtml::_('select.genericlist', $options, 'fieldtype', ' class="inputbox" ' . $readOnly, 'value', 'text',
			$this->item->fieldtype);

		if ($config->custom_field_by_category)
		{
			$rows     = EventbookingHelperDatabase::getAllCategories($config->get('category_dropdown_ordering', 'name'));
			$children = [];

			if ($rows)
			{
				// first pass - collect children
				foreach ($rows as $v)
				{
					$pt   = $v->parent_id;
					$list = @$children[$pt] ? $children[$pt] : [];
					array_push($list, $v);
					$children[$pt] = $list;
				}
			}

			$list      = JHtml::_('menu.treerecurse', 0, '', [], $children, 9999, 0, 0);
			$options   = [];
			$options[] = JHtml::_('select.option', -1, JText::_('EB_ALL_CATEGORIES'));

			foreach ($list as $listItem)
			{
				$options[] = JHtml::_('select.option', $listItem->id, '&nbsp;&nbsp;&nbsp;' . $listItem->treename);
			}

			if (empty($this->item->id) || $this->item->category_id == -1)
			{
				$selectedCategoryIds[] = -1;
			}
			else
			{
				$query->clear()
					->select('category_id')
					->from('#__eb_field_categories')
					->where('field_id=' . $this->item->id);
				$db->setQuery($query);
				$selectedCategoryIds = $db->loadColumn();
			}

			$this->lists['category_id'] = JHtml::_('select.genericlist', $options, 'category_id[]',
				[
					'option.text.toHtml' => false,
					'option.text'        => 'text',
					'option.value'       => 'value',
					'list.attr'          => ' class="input-xlarge" multiple="multiple" ',
					'list.select'        => $selectedCategoryIds,]);
		}
		else
		{

			if (empty($this->item->id) || $this->item->event_id == -1)
			{
				$selectedEventIds[] = -1;
				$assignment         = 0;
			}
			else
			{
				$query->clear()
					->select('event_id')
					->from('#__eb_field_events')
					->where('field_id=' . $this->item->id);
				$db->setQuery($query);
				$selectedEventIds = $db->loadColumn();

				if (count($selectedEventIds) && $selectedEventIds[0] < 0)
				{
					$assignment = -1;
				}
				else
				{
					$assignment = 1;
				}

				$selectedEventIds = array_map('abs', $selectedEventIds);
			}

			$filters = [];

			if ($config->hide_disable_registration_events)
			{
				$filters[] = 'registration_type != 3';
			}

			$rows                    = EventbookingHelperDatabase::getAllEvents($config->sort_events_dropdown, $config->hide_past_events_from_events_dropdown, $filters);
			$this->lists['event_id'] = EventbookingHelperHtml::getEventsDropdown($rows, 'event_id[]', 'class="input-xlarge" multiple="multiple" size="5" ', $selectedEventIds);

			$options   = [];
			$options[] = JHtml::_('select.option', 0, JText::_('EB_ALL_EVENTS'));
			$options[] = JHtml::_('select.option', 1, JText::_('EB_ALL_SELECTED_EVENTS'));

			if (!$config->multiple_booking)
			{
				$options[] = JHtml::_('select.option', -1, JText::_('EB_ALL_EXCEPT_SELECTED_EVENTS'));
			}

			$this->lists['assignment'] = JHtml::_('select.genericlist', $options, 'assignment', ' onchange="showHideEventsSelection(this);"', 'value', 'text', $assignment);
			$this->assignment          = $assignment;
		}

		// Trigger plugins to get list of fields for mapping
		JPluginHelper::importPlugin('eventbooking');

		$results = JFactory::getApplication()->triggerEvent('onGetFields', []);
		$fields  = [];

		if (count($results))
		{
			foreach ($results as $res)
			{
				if (is_array($res) && count($res))
				{
					$fields = $res;
					break;
				}
			}
		}

		if (count($fields))
		{
			$options                      = [];
			$options[]                    = JHtml::_('select.option', '', JText::_('Select Field'));
			$options                      = array_merge($options, $fields);
			$this->lists['field_mapping'] = JHtml::_('select.genericlist', $options, 'field_mapping', ' class="inputbox" ', 'value', 'text',
				$this->item->field_mapping);
		}

		$results = JFactory::getApplication()->triggerEvent('onGetNewsletterFields', []);
		$fields  = [];

		if (count($results))
		{
			foreach ($results as $res)
			{
				if (is_array($res) && count($res))
				{
					$fields = $res;
					break;
				}
			}
		}

		if (count($fields))
		{
			$options   = [];
			$options[] = JHtml::_('select.option', '', JText::_('Select Field'));


			$options                                 = array_merge($options, $fields);
			$this->lists['newsletter_field_mapping'] = JHtml::_('select.genericlist', $options, 'newsletter_field_mapping', ' class="inputbox" ', 'value', 'text',
				$this->item->newsletter_field_mapping);
		}

		$options   = [];
		$options[] = JHtml::_('select.option', 0, JText::_('EB_ALL'));
		$options[] = JHtml::_('select.option', 1, JText::_('EB_INDIVIDUAL_BILLING'));
		$options[] = JHtml::_('select.option', 2, JText::_('EB_GROUP_BILLING_FORM'));
		$options[] = JHtml::_('select.option', 3, JText::_('EB_INDIVIDUAL_GROUP_BILLING'));
		$options[] = JHtml::_('select.option', 4, JText::_('EB_GROUP_MEMBER_FORM'));
		$options[] = JHtml::_('select.option', 5, JText::_('EB_GROUP_MEMBER_INDIVIDUAL'));

		$this->lists['display_in'] = JHtml::_('select.genericlist', $options, 'display_in', ' class="inputbox" ', 'value', 'text',
			$this->item->display_in);

		$options   = [];
		$options[] = JHtml::_('select.option', 0, JText::_('EB_ALL'));
		$options[] = JHtml::_('select.option', 1, JText::_('EB_STANDARD_REGISTRATION'));
		$options[] = JHtml::_('select.option', 2, JText::_('EB_WAITING_LIST'));

		$this->lists['show_on_registration_type'] = JHtml::_('select.genericlist', $options, 'show_on_registration_type', ' class="inputbox" ', 'value', 'text',
			$this->item->show_on_registration_type);


		$options   = [];
		$options[] = JHtml::_('select.option', 0, JText::_('None'));
		$options[] = JHtml::_('select.option', 1, JText::_('Integer Number'));
		$options[] = JHtml::_('select.option', 2, JText::_('Number'));
		$options[] = JHtml::_('select.option', 3, JText::_('Email'));
		$options[] = JHtml::_('select.option', 4, JText::_('Url'));
		$options[] = JHtml::_('select.option', 5, JText::_('Phone'));
		$options[] = JHtml::_('select.option', 6, JText::_('Past Date'));
		$options[] = JHtml::_('select.option', 7, JText::_('Ip'));
		$options[] = JHtml::_('select.option', 8, JText::_('Min size'));
		$options[] = JHtml::_('select.option', 9, JText::_('Max size'));
		$options[] = JHtml::_('select.option', 10, JText::_('Min integer'));
		$options[] = JHtml::_('select.option', 11, JText::_('Max integer'));

		$this->lists['datatype_validation'] = JHtml::_('select.genericlist', $options, 'datatype_validation', 'class="inputbox"', 'value', 'text',
			$this->item->datatype_validation);

		$query->clear()
			->select('id, title')
			->from('#__eb_fields')
			->where('fieldtype IN ("List", "Radio", "Checkboxes")')
			->where('published=1');

		if ($this->item->id)
		{
			$query->where('id != ' . $this->item->id);
		}

		$db->setQuery($query);
		$options                           = [];
		$options[]                         = JHtml::_('select.option', 0, JText::_('Select'), 'id', 'title');
		$options                           = array_merge($options, $db->loadObjectList());
		$this->lists['depend_on_field_id'] = JHtml::_('select.genericlist', $options, 'depend_on_field_id',
			'', 'id', 'title', $this->item->depend_on_field_id);

		if ($this->item->depend_on_field_id)
		{
			//Get the selected options
			$this->dependOnOptions = json_decode($this->item->depend_on_options);
			$query->clear()
				->select('`values`')
				->from('#__eb_fields')
				->where('id=' . $this->item->depend_on_field_id);
			$db->setQuery($query);
			$this->dependOptions = explode("\r\n", $db->loadResult());
		}

		$options   = [];
		$options[] = JHtml::_('select.option', 0, JText::_('EB_ABOVE_PAYMENT_INFORMATION'));
		$options[] = JHtml::_('select.option', 1, JText::_('EB_BELOW_PAYMENT_INFORMATION'));

		$this->lists['position'] = JHtml::_('select.genericlist', $options, 'position', '', 'value', 'text',
			$this->item->position);

		$this->config = $config;
	}
}
