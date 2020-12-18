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

class EventbookingModelLocation extends RADModelAdmin
{
	/**
	 * Pre-process location data before it is being saved to database
	 *
	 * @param   JTable    $row
	 * @param   RADInput  $input
	 * @param   bool      $isNew
	 */
	protected function beforeStore($row, $input, $isNew)
	{
		if ($isNew)
		{
			$row->user_id = JFactory::getUser()->id;
		}

		$coordinates = $input->get('coordinates', '', 'none');
		$coordinates = explode(',', $coordinates);
		$row->lat    = $coordinates[0];
		$row->long   = $coordinates[1];
	}

	/**
	 * Method to store a location
	 *
	 * @access    public
	 * @return    boolean    True on success
	 */
	public function storeLocation(&$data)
	{
		$row         = $this->getTable();
		$user        = JFactory::getUser();
		$coordinates = explode(',', $data['coordinates']);

		if (!empty($data['id']))
		{
			$row->load($data['id']);
		}

		$row->lat     = $coordinates[0];
		$row->long    = $coordinates[1];
		$row->user_id = $user->id;
		$row->bind($data);

		if (empty($row->alias))
		{
			$row->alias = JApplicationHelper::stringURLSafe($row->name);
		}

		$row->store();

		// Check and make sure this alias is valid
		$db    = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('COUNT(*)')
			->from('#__eb_locations')
			->where('id != ' . $row->id)
			->where($db->quoteName('alias') . ' = ' . $db->quote($row->alias));
		$db->setQuery($query);
		$count = $db->loadResult();

		if ($count)
		{
			$row->alias = $row->id . '-' . $row->alias;
			$row->store();
		}

		$data['id'] = $row->id;

		return $row->id;
	}
}
