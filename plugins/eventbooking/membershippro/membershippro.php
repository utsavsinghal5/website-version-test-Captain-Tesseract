<?php
/**
 * @package        Joomla
 * @subpackage     Events Booking
 * @author         Tuan Pham Ngoc
 * @copyright      Copyright (C) 2012 - 2015 Ossolution Team
 * @license        GNU/GPL, see LICENSE.php
 */
defined('_JEXEC') or die;

class plgEventbookingMembershippro extends JPlugin
{
	public function __construct(& $subject, $config = [])
	{
		if (!file_exists(JPATH_ROOT . '/components/com_osmembership/osmembership.php'))
		{
			return;
		}

		parent::__construct($subject, $config);
	}

	/**
	 * Get list of profile fields used for mapping with fields in Events Booking
	 *
	 * @return array
	 */
	public function onGetFields()
	{
		JLoader::register('OSMembershipHelper', JPATH_ROOT . '/components/com_osmembership/helper/helper.php');

		$fields = OSMembershipHelper::getProfileFields(0);

		$options = [];

		foreach ($fields as $field)
		{
			$options[] = JHtml::_('select.option', $field->name, $field->title);
		}

		$options[] = JHtml::_('select.option', 'membership_id', JText::_('Membership ID'));

		return $options;
	}

	/**
	 * Method to get data stored in Membership Pro profile of the given user
	 *
	 * @param   int    $userId
	 * @param   array  $mappings
	 *
	 * @return array
	 */
	public function onGetProfileData($userId, $mappings)
	{
		$synchronizer = new RADSynchronizerMembershippro();

		return $synchronizer->getData($userId, $mappings);
	}
}
