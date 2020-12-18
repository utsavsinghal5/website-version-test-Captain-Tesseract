<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

use Joomla\Utilities\ArrayHelper;

class EventbookingViewCalendarHtml extends RADViewHtml
{
	public function display()
	{
		$config = EventbookingHelper::getConfig();
		$layout = $this->getLayout();

		$this->showCalendarMenu = $config->activate_weekly_calendar_view || $config->activate_daily_calendar_view;
		$this->config           = $config;

		$this->findAndSetActiveMenuItem();

		#Support Weekly and Daily


		if ($layout == 'weekly')
		{
			$this->displayWeeklyView();

			return;
		}
		elseif ($layout == 'daily')
		{
			$this->displayDailyView();

			return;
		}

		$this->setLayout('default');

		/* @var EventbookingModelCalendar $model */
		$model                 = $this->getModel();
		$rows                  = $model->getData();
		$this->currentDateData = $model->getCurrentDate();

		EventbookingHelper::callOverridableHelperMethod('Html', 'antiXSS', [$rows, ['title', 'price_text']]);

		$state = $model->getState();
		$year  = $state->year;
		$month = $state->month;

		$this->data   = EventbookingHelperData::getCalendarData($rows, $year, $month);
		$this->month  = $month;
		$this->year   = $year;
		$this->params = $this->getParams();

		$listMonth = [
			JText::_('EB_JAN'),
			JText::_('EB_FEB'),
			JText::_('EB_MARCH'),
			JText::_('EB_APR'),
			JText::_('EB_MAY'),
			JText::_('EB_JUNE'),
			JText::_('EB_JULY'),
			JText::_('EB_AUG'),
			JText::_('EB_SEP'),
			JText::_('EB_OCT'),
			JText::_('EB_NOV'),
			JText::_('EB_DEC'),];
		$options   = [];

		foreach ($listMonth as $key => $monthName)
		{
			$value     = $key + 1;
			$options[] = JHtml::_('select.option', $value, $monthName);
		}

		$this->searchMonth = JHtml::_('select.genericlist', $options, 'month', 'class="input-medium" onchange="submit();" ', 'value', 'text', (int) $month);

		$options = [];

		for ($i = $year - 3; $i < ($year + 5); $i++)
		{
			$options[] = JHtml::_('select.option', $i, $i);
		}

		$this->searchYear = JHtml::_('select.genericlist', $options, 'year', 'class="input-medium" onchange="submit();" ', 'value', 'text', $year);

		$fieldSuffix = EventbookingHelper::getFieldSuffix();
		$message     = EventbookingHelper::getMessages();

		$categoryIds = array_filter(ArrayHelper::toInteger($this->params->get('category_ids')));

		if (count($categoryIds) == 1)
		{
			$categoryId = $categoryIds[0];
			$category   = EventbookingHelperDatabase::getCategory($categoryId);
			$introText  = $category->description;
		}
		elseif (EventbookingHelper::isValidMessage($this->params->get('intro_text')))
		{
			$introText = $this->params->get('intro_text');
		}
		elseif (EventbookingHelper::isValidMessage($message->{'intro_text' . $fieldSuffix}))
		{
			$introText = $message->{'intro_text' . $fieldSuffix};
		}
		else
		{
			$introText = $message->intro_text;
		}

		//Set evens alias to EventbookingHelperRoute to improve performance
		$eventsAlias = [];

		foreach ($rows as $item)
		{
			if ($config->insert_event_id)
			{
				$eventsAlias[$item->id] = $item->id . '-' . $item->alias;
			}
			else
			{
				$eventsAlias[$item->id] = $item->alias;
			}
		}

		EventbookingHelperRoute::$eventsAlias = array_filter($eventsAlias);

		// Use override menu item
		if ($this->params->get('menu_item_id') > 0)
		{
			$this->Itemid = $this->params->get('menu_item_id');
		}

		$this->listMonth = $listMonth;

		$this->introText = $introText;

		$this->state = $model->getState();

		$this->setDocumentMetadata();

		parent::display();
	}

	/**
	 * Display weekly events
	 */
	protected function displayWeeklyView()
	{
		/* @var EventbookingModelCalendar $model */
		$model = $this->getModel();

		$this->events = $model->getEventsByWeek();

		EventbookingHelper::callOverridableHelperMethod('Html', 'antiXSS', [$this->events, ['title', 'price_text']]);

		$this->first_day_of_week = $model->getState('date');
		$this->currentDateData   = $model->getCurrentDate();

		parent::display();
	}

	/**
	 * Display daily events
	 */
	protected function displayDailyView()
	{
		EventbookingHelperJquery::colorbox('eb-colorbox-addlocation');

		/* @var EventbookingModelCalendar $model */
		$model = $this->getModel();

		$this->events = $model->getEventsByDaily();
		$this->day    = $model->getState('day');

		EventbookingHelper::callOverridableHelperMethod('Html', 'antiXSS', [$this->events, ['title', 'price_text']]);

		$this->currentDateData = $model->getCurrentDate();

		parent::display();
	}
}
