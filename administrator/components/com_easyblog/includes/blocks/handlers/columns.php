<?php
/**
* @package      EasyBlog
* @copyright    Copyright (C) Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

require_once(dirname(__FILE__) . '/abstract.php');

class EasyBlogBlockHandlerColumns extends EasyBlogBlockHandlerAbstract
{
	public $icon = 'fa fa-columns';
	public $nestable = true;
	public $element = 'none';

	public function meta()
	{
		static $meta;

		if (isset($meta)) {
			return $meta;
		}

		$meta = parent::meta();

		return $meta;
	}

	public function data()
	{
		$data = new stdClass();

		$column = new stdClass();
		$column->size = 6;
		$column->content = JText::_('COM_EASYBLOG_BLOCK_COLUMN_DEFAULT_TITLE');

		$data->columns = array($column, $column);

		return $data;
	}

	/**
	 * Validates if the block contains any contents
	 *
	 * @since   5.0
	 * @access  public
	 * @param   string
	 * @return
	 */
	public function validate($block)
	{
		$content = EB::blocks()->renderViewableBlock($block);

		// convert html entities back to it string. e.g. &nbsp; back to empty space
		$content = html_entity_decode($content);

		// strip html tags to precise length count.
		// column block can have image block inside. we need to allow img tag.
		$content = strip_tags($content, '<img>');

		// remove any blank space.
		$content = trim($content);

		// get content length
		$contentLength = EBString::strlen($content);

		if ($contentLength > 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Retrieve AMP html
	 *
	 * @since   5.1
	 * @access  public
	 */
	public function getAMPHtml($block)
	{
		return $block->html;
	}
}
