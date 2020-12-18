<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2017 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

require_once(__DIR__ . '/model.php');

class EasyBlogModelBlocks extends EasyBlogAdminModel
{
	public function __construct()
	{
		parent::__construct();

		$limit = $this->app->getUserStateFromRequest('com_easyblog.blocks.limit', 'limit', $this->app->getCfg('list_limit'), 'int');
		$limitstart = $this->app->getUserStateFromRequest('com_easyblog.blocks.limitstart', 'limitstart', 0, 'int');

		$this->setState('limit', $limit);
		$this->setState('limitstart', $limitstart);
	}

	/**
	 * Populate current stats
	 *
	 * @since	5.1.8
	 * @access	public
	 */
	protected function populateState()
	{
		// Publishing state
		$state = $this->app->getUserStateFromRequest('com_easyblog.blocks.filter_state', 'filter_state');
		$this->setState('filter_state', $state);

		// Blocks group
		$group = $this->app->getUserStateFromRequest('com_easyblog.blocks.filter_group', 'filter_group');
		$this->setState('filter_group', $group);


		// Blocks group
		$search = $this->app->getUserStateFromRequest('com_easyblog.blocks.search', 'search');
		$this->setState('search', $search);

		// List state information.
		parent::populateState();
	}

	/**
	 * Retrieves the pagination
	 *
	 * @since	4.0
	 * @access	public
	 */
	public function getPagination($options = array())
	{
		jimport('joomla.html.pagination');

		$pagination = new JPagination($this->getTotal($options), $this->getState('limitstart'), $this->getState('limit'));

		return $pagination;
	}

	/**
	 * Retrieves the total items
	 *
	 * @since	4.0
	 * @access	public
	 */
	public function getTotal($options = array())
	{
		$db = EB::db();
		$query = $this->getQuery($options);

		$query[0] = 'SELECT COUNT(1) FROM ' . $db->quoteName('#__easyblog_composer_blocks');

		$query = implode(' ', $query);

		$db->setQuery($query);
		$total = $db->loadResult();

		return $total;
	}

	/**
	 * Retrieves a list of available blocks on the site
	 *
	 * @since	4.0
	 * @access	public
	 * @param	string
	 * @return
	 */
	public function getQuery($options = array())
	{
		$db = EB::db();

		$query = array();

		$query[] = 'SELECT * FROM ' . $db->quoteName('#__easyblog_composer_blocks');
		$query[] = 'WHERE 1';

		$filterState = isset($options['filter_state']) ? $options['filter_state'] : 'all';

		if ($filterState == 'P') {
			$query[] = 'AND ' . $db->quoteName('published') . '=' . $db->Quote('1');
		}

		if ($filterState == 'U') {
			$query[] = 'AND ' . $db->quoteName('published') . '=' . $db->Quote('0');
		}

		$search = isset($options['search']) ? $options['search'] : '';

		if ($search) {
			$query[] = 'AND ' . $db->quoteName('title') . ' LIKE(' . $db->Quote('%' . $search . '%') . ')';
		}

		$filterGroup = isset($options['filter_group']) ? $options['filter_group'] : '';

		if ($filterGroup) {
			$query[] = 'AND ' . $db->quoteName('group') . '=' . $db->Quote($filterGroup);
		}

		$includeSystemBlock = isset($options['includeSystemBlock']) ? $options['includeSystemBlock'] : false;

		if ($includeSystemBlock) {
			$query[] = 'OR ' . $db->quoteName('published') . '=' . $db->Quote('2');
		}

		return $query;
	}

	/**
	 * Retrieves a list of available blocks on the site
	 *
	 * @since	4.0
	 * @access	public
	 * @param	string
	 * @return
	 */
	public function getBlocks($options = array())
	{
		$db = EB::db();
		$query = $this->getQuery($options);

		$limit = $this->getState('limit');
		$limitstart = $this->getState('limitstart');

		if ($limit) {
			$query[] = 'LIMIT ' . $limitstart . ',' . $limit;
		}

		$query = implode(' ', $query);

		$db->setQuery($query);

		$result = $db->loadObjectList();

		if (!$result) {
			return $result;
		}

		$blocks = array();

		foreach ($result as $row) {

			$block = EB::table('Block');
			$block->bind($row);

			$blocks[] = $block;
		}

		return $blocks;
	}

	/**
	 * Retrieve the groups of the blocks
	 *
	 * @since	4.0
	 * @access	public
	 * @param	string
	 * @return
	 */
	public function getGroups()
	{
		$db = EB::db();

		$query = 'SELECT DISTINCT(' . $db->quoteName('group') . ') FROM ' . $db->quoteName('#__easyblog_composer_blocks');

		$db->setQuery($query);

		$result = $db->loadColumn();

		return $result;
	}

	/**
	 * Retrieves a list of available blocks
	 *
	 * @since	4.0
	 * @access	public
	 * @param	string
	 * @return
	 */
	public function getAvailableBlocks($type = 'ebd')
	{
		$db = EB::db();

		$options = array('filter_state' => 'all');

		if ($type == 'legacy') {
			$options['filter_group'] = 'media';
			$options['includeSystemBlock'] = true;
		}

		$query = $this->getQuery($options);
		$query[] = 'AND(';
		$query[] = $db->qn('published') . '=' . $db->Quote(EASYBLOG_COMPOSER_BLOCKS_PUBLISHED);
		$query[] = 'OR';
		$query[] = $db->qn('published') . '=' . $db->Quote(EASYBLOG_COMPOSER_BLOCKS_NOT_VISIBLE);
		$query[] = ')';
		$query[] = "order by " . $db->qn('ordering');

		$query = implode(' ', $query);

		$db->setQuery($query);

		$result = $db->loadObjectList();

		if (!$result) {
			return $result;
		}

		$categories = array();

		foreach ($result as $row) {

			$block = EB::table('Block');
			$block->bind($row);

			if (!isset($categories[$block->group])) {
				$categories[$block->group] = array();
			}

			$categories[$block->group][] = EB::blocks()->get($block);
		}

		return $categories;
	}

	/**
	 * Retrieves all blocks installed on the site
	 *
	 * @since	5.4.0
	 * @access	public
	 */
	public function loadAllBlocks()
	{
		$db = EB::db();

		$query = array();
		$query[] = 'SELECT * FROM ' . $db->qn('#__easyblog_composer_blocks');
		$db->setQuery($query);

		$results = $db->loadObjectList();

		return $results;
	}
}
