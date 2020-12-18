<?php
/**
 * @package        Joomla
 * @subpackage     Event Booking
 * @author         Tuan Pham Ngoc
 * @copyright      Copyright (C) 2010 - 2020 Ossolution Team
 * @license        GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

/**
 * HTML View class for the Event Booking component
 *
 * @static
 * @package        Joomla
 * @subpackage     Event Booking
 */
class EventbookingViewEventsHtml extends RADViewList
{
	protected $lists = [];

	/**
	 * Prepare the view before it's being rendered
	 *
	 * @throws Exception
	 */
	protected function prepareView()
	{
		// Require user to login before allowing access to events management page
		$this->requestLogin();

		parent::prepareView();

		$fieldSuffix = EventbookingHelper::getFieldSuffix();

		//Add categories filter
		$this->lists['filter_category_id'] = EventbookingHelperHtml::buildCategoryDropdown($this->state->filter_category_id, 'filter_category_id',
			'onchange="submit();"', $fieldSuffix);
		$this->lists['filter_search']      = $this->state->filter_search;

		$options                      = [];
		$options[]                    = JHtml::_('select.option', 0, JText::_('EB_EVENTS_FILTER'));
		$options[]                    = JHtml::_('select.option', 1, JText::_('EB_HIDE_PAST_EVENTS'));
		$options[]                    = JHtml::_('select.option', 2, JText::_('EB_HIDE_CHILDREN_EVENTS'));
		$this->lists['filter_events'] = JHtml::_('select.genericlist', $options, 'filter_events', ' class="input-medium" onchange="submit();" ',
			'value', 'text', $this->state->filter_events);

		$this->findAndSetActiveMenuItem();

		$this->config   = EventbookingHelper::getConfig();
		$this->nullDate = JFactory::getDbo()->getNullDate();
		$this->return   = base64_encode(JUri::getInstance()->toString());

		EventbookingHelper::callOverridableHelperMethod('Html', 'antiXSS', [$this->items, ['title', 'price_text']]);

		$this->addToolbar();

		// Force layout to default
		$this->setLayout('default');
	}

	protected function addToolbar()
	{
		JLoader::register('JToolbarHelper', JPATH_ADMINISTRATOR . '/includes/toolbar.php');

		$user = JFactory::getUser();

		if (EventbookingHelperAcl::checkAddEvent())
		{
			JToolbarHelper::addNew('add', 'JTOOLBAR_NEW');
		}

		if ($user->authorise('core.admin', 'com_eventbooking')
			|| $user->authorise('core.edit', 'com_eventbooking')
			|| $user->authorise('core.edit.own', 'com_eventbooking'))
		{
			JToolbarHelper::editList('edit', 'JTOOLBAR_EDIT');
		}

		if (EventbookingHelperAcl::canDeleteEvent())
		{
			JToolbarHelper::deleteList(JText::_('EB_DELETE_CONFIRM'), 'delete');
		}

		if ($user->authorise('core.admin', 'com_eventbooking') || $user->authorise('core.edit.state', 'com_eventbooking'))
		{
			JToolbarHelper::publish('publish', 'JTOOLBAR_PUBLISH', true);
			JToolbarHelper::unpublish('unpublish', 'JTOOLBAR_UNPUBLISH', true);
		}
	}
}
