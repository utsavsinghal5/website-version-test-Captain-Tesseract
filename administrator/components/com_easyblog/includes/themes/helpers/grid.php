<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2019 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

class EasyBlogThemesHelperGrid extends EasyBlog
{
	/**
	 * Renders a check all checkbox
	 *
	 * @since	5.1
	 * @access	public
	 */
	public function checkall()
	{
		$theme = EB::themes();
		$output = $theme->output('admin/html/grid/checkall');

		return $output;
	}

	/**
	 * Renders a checkbox for each row.
	 *
	 * @since	5.1
	 * @access	public
	 */
	public function id($number, $value, $allowed = true, $checkedOut = false, $name = 'cid')
	{
		$theme = EB::getTemplate();

		$theme->set('allowed', $allowed);
		$theme->set('number', $number);
		$theme->set('name', $name);
		$theme->set('checkedOut', $checkedOut);
		$theme->set('value', $value);

		$contents = $theme->output('admin/html/grid.id');

		return $contents;
	}

	/**
	 * Renders a pending moderation icon
	 *
	 * @since	5.0
	 */
	public function moderation($obj, $controllerName = '', $key = '')
	{
		// If primary key is not provided, then we assume that we should use 'state' as the key property.
		if (empty($key)) {
			$key = 'state';
		}

		// For moderated items, tasks should always be publish
		$task = $controllerName . '.publish';

		$theme = EB::template();
		$theme->set('task', $task);

		return $theme->output('admin/html/grid.moderation');
	}

	/**
	 * Renders publish / unpublish icon.
	 *
	 * @since	1.0
	 * @access	public
	 */
	public static function core($obj, $key = '', $tooltip = array())
	{
		// If primary key is not provided, then we assume that we should use 'state' as the key property.
		$key = !empty($key) ? $key : 'state';

		$allowed = false;

		// We need to cast the object key to INT or otherwise, the checking is not working.
		$postStatus = (int)$obj->$key;

		switch ($postStatus) {

			case EASYBLOG_POST_TEMPLATE_CORE:
				$class = 'core';
				$tooltip = isset($tooltip[ 1 ]) ? $tooltip[ 1 ] : JText::_('COM_EASYBLOG_GRID_CORE');
				$allowed = false;
				break;

			case EASYBLOG_POST_TEMPLATE_NOT_CORE:
				$class = 'no-core';
				$tooltip = isset($tooltip[ 0 ]) ? $tooltip[ 0 ] :JText::_('COM_EASYBLOG_GRID_NOT_CORE');
				$allowed = false;
				break;
		}

		if (is_array($tooltip)) {
			$tooltip = '';
		}

		if (is_string($tooltip) && !empty($tooltip)) {
			$tooltip = JText::_($tooltip);
		}

		$theme = EB::getTemplate();

		$theme->set('allowed', $allowed);
		$theme->set('tooltip', $tooltip);
		$theme->set('class', $class);

		return $theme->output('admin/html/grid.core');
	}


	/**
	 * Renders publish / unpublish icon.
	 *
	 * @since	1.0
	 * @access	public
	 */
	public static function published($obj, $controllerName = '', $key = '', $tasks = array(), $tooltip = array(), $disabled = false)
	{
		$input = EB::request();
		$view = $input->get('view', '', 'cmd');
		$layout = $input->get('layout', '', 'cmd');

		// If primary key is not provided, then we assume that we should use 'state' as the key property.
		$key = !empty($key) ? $key : 'state';

		$publishTask = isset($tasks[0]) ? $tasks[0] : $controllerName . '.publish';
		$unpublishTask = isset($tasks[1]) ? $tasks[1] : $controllerName . '.unpublish';

		$allowed = ($disabled) ? false : true;

		// We need to cast the object key to INT or otherwise, the checking is not working.
		$postStatus = (int)$obj->$key;

		switch ($postStatus) {

			case '2':
			case EASYBLOG_POST_SCHEDULED:

				$class = 'scheduled';
				$tooltip = JText::_('COM_EASYBLOG_SCHEDULED');
				$allowed = false;

				if ($view == 'blogs' && $layout == 'templates') {
					$class = 'unpublish';
					$tooltip = JText::_('COM_EASYBLOG_GRID_BLANK_TEMPLATE');
				}
				break;

			case EASYBLOG_POST_DRAFT:
				$class = 'draft';
				$tooltip = JText::_('COM_EASYBLOG_DRAFT');
				$allowed = false;
				break;

			case EASYBLOG_POST_ARCHIVED:
				$class = 'archived';
				$tooltip = JText::_('COM_EASYBLOG_GRID_TOOLTIP_ARCHIVED');
				$allowed = false;
				break;

			case EASYBLOG_POST_PUBLISHED:
				$class = 'publish';
				$tooltip = isset($tooltip[ 1 ]) ? $tooltip[ 1 ] : 'COM_EASYBLOG_GRID_TOOLTIP_PUBLISH';
				break;

			case EASYBLOG_POST_UNPUBLISHED:
				$class = 'unpublish';
				$tooltip = isset($tooltip[ 0 ]) ? $tooltip[ 0 ] : 'COM_EASYBLOG_GRID_TOOLTIP_UNPUBLISH';
				break;

			case EASYBLOG_POST_TRASHED:
				$class = 'trash';
				$tooltip = JText::_('COM_EASYBLOG_TRASHED');
				break;
		}

		if (is_array($tooltip)) {
			$tooltip = '';
		}

		if (is_string($tooltip) && !empty($tooltip)) {
			$tooltip = JText::_($tooltip);
		}

		$task = $obj->$key ? $unpublishTask : $publishTask;

		$theme = EB::getTemplate();

		$theme->set('allowed', $allowed);
		$theme->set('tooltip', $tooltip);
		$theme->set('task', $task);
		$theme->set('class', $class);

		return $theme->output('admin/html/grid.published');
	}

	/**
	 * Renders the lock in a grid
	 *
	 * @since	5.4
	 * @access	public
	 */
	public static function locked($obj, $tasks = array(), $tooltip = array(), $disabled = false)
	{
		$allowed = $disabled ? false : true;
		$lockTask = isset($tasks[0]) ? $tasks[0] : 'blogs.lockTemplate';
		$unlockTask = isset($tasks[1]) ? $tasks[1] : 'blogs.unlockTemplate';

		if ($obj->isLocked()) {
			$class = 'lock';
			$task = $unlockTask;
			$tooltip = isset($tooltip[0]) ? $tooltip[0] : JText::_('COM_EB_GRID_TOOLTIP_TEMPLATE_IS_LOCKED');
		} else {
			$class = 'unlock';
			$task = $lockTask;
			$tooltip = isset($tooltip[1]) ? $tooltip[1] : JText::_('COM_EB_GRID_TOOLTIP_TEMPLATE_IS_UNLOCKED');
		}

		$theme = EB::themes();
		$theme->set('tooltip', $tooltip);
		$theme->set('task', $task);
		$theme->set('class', $class);
		$theme->set('allowed', $allowed);

		return $theme->output('admin/html/grid.locked');
	}

	/**
	 * Renders the ordering in a grid
	 *
	 * @since	1.0
	 * @access	public
	 */
	public static function ordering($total, $current, $showOrdering = true, $ordering = 0)
	{
		$theme = EB::template();

		$theme->set('current', $current);
		$theme->set('total', $total);
		$theme->set('ordering', $ordering);
		$theme->set('showOrdering', $showOrdering);

		$contents = $theme->ouput('admin/html/grid.ordering');

		return $contents;
	}

	/**
	 * Renders the ordering in a grid
	 *
	 * @since	1.0
	 * @access	public
	 */
	public static function sort($column, $text, $currentOrdering, $direction)
	{
		$theme = EB::getTemplate();

		// Ensure that the direction is always in lowercase because we will check for it in the theme file.
		$direction = EBString::strtolower($direction);
		$currentOrdering = EBString::strtolower($currentOrdering);
		$column = EBString::strtolower($column);

		$theme->set('column', $column);
		$theme->set('text', $text);
		$theme->set('currentOrdering', $currentOrdering);
		$theme->set('direction', $direction);

		$contents = $theme->output('admin/html/grid.sort');

		return $contents;
	}

	/**
	 * Renders publish / unpublish icon.
	 *
	 * @since	1.0
	 * @access	public
	 */
	public static function featured($obj, $controllerName = '', $key = '', $task = '', $allowed = true, $tooltip = array())
	{
		// If primary key is not provided, then we assume that we should use 'state' as the key property.
		$key = !empty($key) ? $key : 'default';

		$featureTask = '';
		$unfeatureTask = '';

		if (is_array($task)) {
			$featureTask = $task[0];
			$unfeatureTask = $task[1];
		}
		else {
			$featureTask = !empty($task) ? $task : 'easyblog.toggleDefault';
			$unfeatureTask = $featureTask;
		}

		// We need to cast the object key to INT or otherwise, the checking is not working.
		$postStatus = (int)$obj->$key;

		switch($postStatus) {

			case EASYBLOG_POST_PUBLISHED:
				$class = 'featured';
				$tooltip = '';

				if ($allowed) {
					$tooltip = isset($tooltip[ 1 ]) ? $tooltip[ 1 ] : JText::_('COM_EASYBLOG_GRID_TOOLTIP_UNFEATURE_ITEM');
				}

				$task = $unfeatureTask;
				break;

			default:
				$class = 'default';

				$task = $featureTask;
				$tooltip = isset($tooltip[ 0 ]) ? $tooltip[ 0 ] : JText::_('COM_EASYBLOG_GRID_TOOLTIP_FEATURE_ITEM');
				break;
		}

		$theme = EB::getTemplate();
		$theme->set('task', $task);
		$theme->set('class', $class);
		$theme->set('tooltip', $tooltip);
		$theme->set('allowed', $allowed);

		return $theme->output('admin/html/grid.published');
	}

	/**
	 * Renders a Yes / No input.
	 *
	 * @since	5.0
	 * @access	public
	 */
	public static function boolean($name, $value, $id = '', $attributes = '', $tips = array(), $text = array())
	{
		// Ensure that id is set.
		$id = empty($id) ? $name : $id;

		// Determine if the input should be checked.
		$checked = $value ? true : false;

		$theme = EB::template();

		if (is_array($attributes)) {
			$attributes = implode(' ', $attributes);
		}

		$onText = JText::_('COM_EASYBLOG_GRID_YES');
		$offText = JText::_('COM_EASYBLOG_GRID_NO');

		if (isset($text['on'])) {
			$onText = $text['on'];
		}

		if (isset($text['off'])) {
			$offText = $text['off'];
		}

		$theme->set('onText', $onText);
		$theme->set('offText', $offText);
		$theme->set('attributes', $attributes);
		$theme->set('tips', $tips);
		$theme->set('id', $id);
		$theme->set('name', $name);
		$theme->set('checked', $checked);

		return $theme->output('admin/html/grid.boolean');
	}

	/**
	 * Renders a date form
	 *
	 * @since	1.0
	 * @access	public
	 */
	public static function dateform($name, $value = '', $id = '', $attributes = '', $withOffset = true)
	{
		if (is_array($attributes)) {
			$attributes	= implode(' ', $attributes);
		}

		if (empty($value)) {
			$value = Foundry::date('now', $withOffset);
		} else {
			$value = Foundry::date($value, $withOffset);
		}

		$theme = Foundry::get('Themes');
		$theme->set('name', $name);
		$theme->set('value', $value);
		$theme->set('id', $id);
		$theme->set('attributes', $attributes);

		return $theme->output('admin/html/grid.dateform');
	}

	public static function location($location, $options='')
	{
		$uid = uniqid();
		$classname = 'es-location-' . $uid;
		$selector = '.' . $classname;

		if (empty($location)) {
			$location = Foundry::table('Location');
		}

		$theme = Foundry::get('Themes');
		$theme->set('uid', $uid);
		$theme->set('classname', $classname);
		$theme->set('selector', $selector);
		$theme->set('location', $location);

		return $theme->output('admin/html/grid.location');
	}

	public static function inputbox($name, $value = '', $id = '', $attributes = '')
	{
		if (is_array($attributes)) {
			$attributes = implode(' ', $attributes);
		}

		// If value is an array, implode it with a comma as a separator
		if (is_array($value)) {
			$value = implode(',', $value);
		}

		$theme = EB::template();
		$theme->set('name', $name);
		$theme->set('value', $value);
		$theme->set('id', $id);
		$theme->set('attributes', $attributes);

		return $theme->output('admin/html/grid.inputbox');
	}

	public static function listbox($name, $items, $options = array())
	{
		$options = array_merge(array(
			'attributes' => '',
			'classes' => '',
			'id' => $name,
			'sortable' => false,
			'toggleDefault' => true,
			'allowAdd' => true,
			'allowRemove' => true,
			'customHTML' => '',
			'itemTitle' => JText::_('COM_EASYBLOG_GRID_LISTBOX_DEFAULT_ITEM_TITLE'),
			'addTitle' => JText::_('COM_EASYBLOG_GRID_LISTBOX_ADD_NEW_ITEM_TITLE'),
			'default' => 0,
			'max' => 0,
			'min' => 0
		), $options);

		if (is_array($options['attributes'])) {
			$options['attributes'] = implode(' ', $options['attributes']);
		}

		if (is_array($options['classes'])) {
			$options['classes'] = implode(' ', $options['classes']);
		}

		if (!is_array($items)) {
			$items = array($items);
		}

		$theme = EB::template();

		$theme->set('name', $name);
		$theme->set('items', $items);
		$theme->set('options', $options);

		return $theme->output('admin/html/grid.listbox');
	}
}
