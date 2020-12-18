<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

JLoader::register('EventbookingHelper', JPATH_ROOT . '/components/com_eventbooking/helper/helper.php');

class EventbookingHelperRoute
{
	/**
	 * Store events needed by routing
	 *
	 * @var array
	 */
	public static $eventsAlias;

	/**
	 * Store locations needed by routing
	 *
	 * @var array
	 */
	public static $locationsAlias;

	/**
	 * Menu items look up array
	 *
	 * @var array
	 */
	protected static $lookup;

	/**
	 * Get ID of the menu item which is associated to the event
	 *
	 * @param   int  $id
	 * @param   int  $catId
	 * @param   int  $itemId
	 */
	public static function getEventMenuId($id, $catId, $itemId)
	{
		$id      = (int) $id;
		$needles = ['event' => [$id]];

		if (!$catId)
		{
			//Find the main category of this event
			$db    = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('main_category_id')
				->from('#__eb_events')
				->where('id = ' . $id);
			$db->setQuery($query);
			$catId = (int) $db->loadResult();
		}

		if ($catId)
		{
			$needles['category']       = self::getCategoriesPath($catId, 'id', false);
			$needles['upcomingevents'] = $needles['calendar'] = $needles['fullcalendar'] = $needles['categories'] = $needles['category'];
		}

		return self::findItem($needles, $itemId);
	}

	/**
	 * Function to get Event Route
	 *
	 * @param   int  $id
	 * @param   int  $catId
	 * @param   int  $itemId
	 *
	 * @return string
	 */
	public static function getEventRoute($id, $catId = 0, $itemId = 0)
	{
		$id      = (int) $id;
		$needles = ['event' => [$id]];
		$link    = 'index.php?option=com_eventbooking&view=event&id=' . $id;

		if (!$catId)
		{
			//Find the main category of this event
			$db    = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('main_category_id')
				->from('#__eb_events')
				->where('id = ' . $id);
			$db->setQuery($query);
			$catId = (int) $db->loadResult();
		}

		if ($catId)
		{
			$needles['category']       = self::getCategoriesPath($catId, 'id', false);
			$needles['upcomingevents'] = $needles['calendar'] = $needles['fullcalendar'] = $needles['categories'] = $needles['category'];
			$link                      .= '&catid=' . $catId;
		}

		if ($item = self::findItem($needles, $itemId))
		{
			$link .= '&Itemid=' . $item;
		}

		return $link;
	}

	/**
	 * Function to get Category Route
	 *
	 * @param   int  $id
	 * @param   int  $itemId
	 *
	 * @return string
	 */
	public static function getCategoryRoute($id, $itemId = 0)
	{
		$link    = 'index.php?option=com_eventbooking&view=category&id=' . $id;
		$catIds  = self::getCategoriesPath($id, 'id', false);
		$needles = ['category' => $catIds, 'upcomingevents' => $catIds, 'calendar' => $catIds, 'fullcalendar' => $catIds, 'categories' => $catIds];

		if ($item = self::findItem($needles, $itemId))
		{
			$link .= '&Itemid=' . $item;
		}

		return $link;
	}

	/**
	 * Function to get View Route
	 *
	 * @param   string  $view  (cart, checkout)
	 * @param   int     $itemId
	 *
	 * @return string
	 */
	public static function getViewRoute($view, $itemId)
	{
		$link = 'index.php?option=com_eventbooking&view=' . $view;

		if ($item = self::findView($view, $itemId))
		{
			$link .= '&Itemid=' . $item;
		}

		return $link;
	}

	/**
	 * Get event title, used for building the router
	 *
	 * @param $id
	 *
	 * @return string
	 */
	public static function getEventTitle($id)
	{
		if (!isset(self::$eventsAlias[$id]))
		{
			$config = EventbookingHelper::getConfig();
			$db     = JFactory::getDbo();
			$query  = $db->getQuery(true);

			if ($fieldSuffix = EventbookingHelper::getFieldSuffix())
			{
				$query->select($db->quoteName('alias' . $fieldSuffix, 'alias'));
			}
			else
			{
				$query->select('alias');
			}

			$query->from('#__eb_events')
				->where('id = ' . $id);
			$db->setQuery($query);

			if ($config->insert_event_id)
			{
				self::$eventsAlias[$id] = $id . '-' . $db->loadResult();
			}
			else
			{
				self::$eventsAlias[$id] = $db->loadResult();
			}
		}

		return self::$eventsAlias[$id];
	}

	/**
	 * Get event title, used for building the router
	 *
	 * @param $id
	 *
	 * @return string
	 */
	public static function getLocationTitle($id)
	{
		if (!isset(self::$locationsAlias[$id]))
		{
			$db    = JFactory::getDbo();
			$query = $db->getQuery(true);

			if ($fieldSuffix = EventbookingHelper::getFieldSuffix())
			{
				$query->select($db->quoteName('alias' . $fieldSuffix, 'alias'));
			}
			else
			{
				$query->select('alias');
			}

			$query->from('#__eb_locations')
				->where('id = ' . $id);
			$db->setQuery($query);

			self::$locationsAlias[$id] = $db->loadResult();
		}

		return self::$locationsAlias[$id];
	}


	/**
	 * @param   int     $id
	 * @param   string  $type
	 * @param   bool    $reverse
	 *
	 * @return array
	 */
	public static function getCategoriesPath($id, $type = 'id', $reverse = true)
	{
		static $categories;

		if (empty($categories))
		{
			$db    = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('id, parent')->from('#__eb_categories');

			if ($fieldSuffix = EventbookingHelper::getFieldSuffix())
			{
				$query->select($db->quoteName('alias' . $fieldSuffix, 'alias'));
			}
			else
			{
				$query->select('alias');
			}

			$db->setQuery($query);
			$categories = $db->loadObjectList('id');
		}

		$config = EventbookingHelper::getConfig();
		$paths  = [];

		if ($type == 'id' || $config->insert_category == 0)
		{
			do
			{
				$paths[] = $categories[$id]->{$type};
				$id      = $categories[$id]->parent;
			} while ($id != 0);

			if ($reverse)
			{
				$paths = array_reverse($paths);
			}
		}
		else
		{
			$paths[] = $categories[$id]->{$type};
		}

		return $paths;
	}

	/**
	 * Method to find menu item by query
	 *
	 * @param   array  $query
	 * @param   bool   $firstOnly
	 *
	 * @return array|\Joomla\CMS\Menu\MenuItem
	 * @throws Exception
	 */
	public static function findMenuItemByQuery($query, $firstOnly = true)
	{
		$component = JComponentHelper::getComponent('com_eventbooking');
		$menus     = JFactory::getApplication()->getMenu('site');
		$items     = $menus->getItems('component_id', $component->id);

		$returnItems = [];

		foreach ($items as $item)
		{
			foreach ($query as $key => $value)
			{
				if (!isset($item->query[$key]) || $item->query[$key] != $value)
				{
					continue 2;
				}
			}

			if ($firstOnly)
			{
				return $item;
			}

			$returnItems[] = $item;
		}

		return $returnItems;
	}

	/**
	 * Find item id variable corresponding to the view
	 *
	 * @param   string  $view
	 * @param   int     $itemId
	 *
	 * @return int
	 */
	public static function findView($view, $itemId = 0)
	{
		$needles = [$view => [0]];

		if ($item = self::findItem($needles, $itemId))
		{
			return $item;
		}

		return 0;
	}

	/**
	 * Function to find Itemid
	 *
	 * @param   array  $needles
	 * @param   int    $itemId
	 *
	 * @return int
	 */
	public static function findItem($needles = [], $itemId = 0)
	{
		// Prepare the reverse lookup array.
		if (self::$lookup === null)
		{
			self::$lookup = [];
			$component    = JComponentHelper::getComponent('com_eventbooking');
			$menus        = JFactory::getApplication()->getMenu('site');
			$items        = $menus->getItems('component_id', $component->id);

			foreach ($items as $item)
			{
				if (!empty($item->query['view']))
				{
					$view = $item->query['view'];

					// Ignore that export for routing
					if ($view == 'registrants' && !empty($item->query['layout']) && $item->query['layout'] == 'export')
					{
						continue;
					}

					if (!isset(self::$lookup[$view]))
					{
						self::$lookup[$view] = [];
					}

					if (isset($item->query['id']))
					{
						self::$lookup[$view][$item->query['id']] = $item->id;
					}
					else
					{
						self::$lookup[$view][0] = $item->id;
					}
				}
			}
		}

		if ($needles)
		{
			foreach ($needles as $view => $ids)
			{
				if (isset(self::$lookup[$view]))
				{
					foreach ($ids as $id)
					{
						$id = (int) $id;

						if (isset(self::$lookup[$view][$id]))
						{
							return self::$lookup[$view][$id];
						}
					}
				}
			}
		}

		//Return default item id
		return $itemId;
	}

	/**
	 * Get default menu item
	 *
	 * @return int
	 */
	public static function getDefaultMenuItem()
	{
		$config   = EventbookingHelper::getConfig();
		$language = JFactory::getLanguage()->getTag();

		if (JLanguageMultilang::isEnabled() && $config->get('default_menu_item_' . $language))
		{
			return $config->get('default_menu_item_' . $language);
		}
		else if ($config->get('default_menu_item') > 0)
		{
			return $config->get('default_menu_item');
		}
		else
		{
			$defaultViews = ['calendar', 'fullcalendar', 'categories', 'upcomingevents', 'category'];
			$component    = JComponentHelper::getComponent('com_eventbooking');
			$menus        = JFactory::getApplication()->getMenu('site');
			$items        = $menus->getItems('component_id', $component->id);

			foreach ($items as $item)
			{
				if (!empty($item->query['view']) && in_array($item->query['view'], $defaultViews))
				{
					return $item->id;
				}
			}
		}

		return 0;
	}
}
