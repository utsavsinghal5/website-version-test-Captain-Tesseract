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

class EventbookingControllerEvent extends EventbookingController
{
	use EventbookingControllerCaptcha;

	/**
	 * Constructor
	 *
	 * @param   RADInput|null  $input
	 * @param   array          $config
	 *
	 * @throws Exception
	 */
	public function __construct(RADInput $input = null, array $config = [])
	{
		parent::__construct($input, $config);

		$this->registerTask('unpublish', 'publish');
		$this->registerTask('apply', 'save');
		$this->registerTask('save2copy', 'save');
		$this->registerTask('close', 'cancel');
	}

	/**
	 * Add new event
	 *
	 * @return bool|void
	 */
	public function add()
	{
		list ($Itemid, $layout) = EventbookingHelper::getAddEditEventFormLayout();

		if ($Itemid > 0)
		{
			$this->app->redirect(JRoute::_('index.php?Itemid=' . $Itemid, false));
		}
		else
		{
			$this->input->set('view', 'event');
			$this->input->set('layout', $layout);
			$this->display();
		}
	}

	/**
	 * Edit an event
	 *
	 * @return void
	 */
	public function edit()
	{
		$cid = $this->input->get('cid', [], 'array');
		$cid = array_filter(ArrayHelper::toInteger($cid));

		list ($Itemid, $layout) = EventbookingHelper::getAddEditEventFormLayout();
		$this->input->set('view', 'event');
		$this->input->set('id', $cid[0]);
		$this->input->set('layout', $layout);
		$this->display();
	}


	/**
	 * Save an event
	 */
	public function save()
	{
		$this->csrfProtection();

		$user   = JFactory::getUser();
		$config = EventbookingHelper::getConfig();

		$task = $this->getTask();

		if ($task == 'save2copy')
		{
			$this->input->set('source_id', $this->input->getInt('id', 0));
			$this->input->set('id', 0);
			$task = 'apply';
		}

		// Permission check
		$id = $this->input->getInt('id', 0);

		if ($id)
		{
			$ret = EventbookingHelperAcl::checkEditEvent($id);
		}
		else
		{
			$ret = EventbookingHelperAcl::checkAddEvent();
		}

		if (!$ret)
		{
			throw new Exception('You do not have submit event permission, please contact Administrator', 403);
		}

		if ($config->enable_captcha
			&& ($user->id == 0 || $config->bypass_captcha_for_registered_user !== '1')
			&& !$this->validateCaptcha($this->input))
		{
			$this->app->enqueueMessage(JText::_('EB_INVALID_CAPTCHA_ENTERED'), 'warning');
			$this->input->set('view', 'event');
			$this->input->set('layout', 'form');
			$this->display();

			return;
		}


		/* @var EventbookingModelEvent $model */
		$model = $this->getModel('event');

		try
		{
			$errors = $model->validateFormInput($this->input);

			if (count($errors))
			{
				foreach ($errors as $error)
				{
					$this->app->enqueueMessage($error, 'error');
				}

				$this->input->set('validate_input_error', 1);

				$this->input->set('view', 'event');
				$this->input->set('layout', 'form');
				$this->display();

				return;
			}

			// Handle data for published field in case users do not have permission to change event state
			if (!EventbookingHelperAcl::canChangeEventStatus($id))
			{
				if ($id)
				{
					$this->input->remove('published');
				}
				else
				{
					$this->input->set('published', 0);
				}
			}

			$model->store($this->input);

			if ($id)
			{
				$msg = JText::_('EB_EVENT_UPDATED');
			}
			else
			{
				$msg = JText::_('EB_EVENT_SAVED');
			}
		}
		catch (Exception $e)
		{

			$msg = JText::_('EB_EVENT_SAVING_ERROR') . $e->getMessage();
		}

		$return     = base64_decode($this->input->getBase64('return'));
		$formLayout = $this->input->getCmd('form_layout', $config->get('submit_event_form_layout', 'form'));

		if ($task == 'save2copy')
		{
			$msg    = JText::_('EB_EVENT_COPIED');
			$return = JRoute::_('index.php?option=com_eventbooking&view=event&id=' . $this->input->getInt('id') . '&layout=' . $formLayout . '&Itemid=' . $this->input->getInt('Itemid'), false);
			$this->setRedirect($return, $msg);
		}
		elseif ($task == 'apply')
		{
			$return = JRoute::_('index.php?option=com_eventbooking&view=event&id=' . $this->input->getInt('id') . '&layout=' . $formLayout . '&Itemid=' . $this->input->getInt('Itemid'), false);
			$this->setRedirect($return, $msg);
		}
		elseif ($return && JUri::isInternal($return))
		{
			$this->setRedirect($return, $msg);
		}
		elseif ($user->id)
		{
			$this->setRedirect(JRoute::_(EventbookingHelperRoute::getViewRoute('events', $this->input->getInt('Itemid')), false), $msg);
		}
		else
		{
			$redirectUrl = $config->get('submit_event_redirect_url');

			if (empty($redirectUrl))
			{
				$redirectUrl = JUri::root();
			}

			$this->setRedirect($redirectUrl, $msg);
		}
	}

	/**
	 * Publish the selected events
	 */
	public function publish()
	{
		$id = $this->input->getInt('id', 0);

		if ($id)
		{
			$cid = [$id];
		}
		else
		{
			$cid = $this->input->get('cid', [], 'array');
			$cid = array_filter(ArrayHelper::toInteger($cid));
		}

		// Check permission
		foreach ($cid as $id)
		{
			if (!EventbookingHelperAcl::canChangeEventStatus($id))
			{
				$msg = JText::_('EB_NO_PUBLISH_PERMISSION');
				$this->setRedirect(JRoute::_(EventbookingHelperRoute::getViewRoute('events', $this->input->getInt('Itemid', 0)), false), $msg);

				return;
			}
		}

		//OK, enough permission checked. Change status of the event
		$task = $this->getTask();

		if ($task == 'publish')
		{
			$msg   = JText::_('EB_PUBLISH_SUCCESS');
			$state = 1;
		}
		else
		{
			$msg   = JText::_('EB_UNPUBLISH_SUCCESS');
			$state = 0;
		}

		/* @var EventbookingModelEvent $model */
		$model = $this->getModel('event');

		foreach ($cid as $id)
		{
			$model->publish($id, $state);
		}

		$return = base64_decode($this->input->getBase64('return'));

		if ($return && JUri::isInternal($return))
		{
			$this->setRedirect($return);
		}
		else
		{
			$this->setRedirect(JRoute::_(EventbookingHelperRoute::getViewRoute('events', $this->input->getInt('Itemid', 0)), false), $msg);
		}
	}

	/**
	 * Method to delete an event
	 *
	 */
	public function delete()
	{
		$this->csrfProtection();

		$cid = $this->input->get('cid', [], 'array');
		$cid = array_filter(ArrayHelper::toInteger($cid));

		// Check permission
		foreach ($cid as $id)
		{
			if (!EventbookingHelperAcl::canDeleteEvent($id))
			{
				$msg = JText::sprintf('EB_NO_DELETE_EVENT_PERMISSION_PERMISSION', $id);
				$this->setRedirect(JRoute::_(EventbookingHelperRoute::getViewRoute('events', $this->input->getInt('Itemid', 0)), false), $msg);

				return;
			}
		}

		// Permission is OK, perform deleting the selected events

		/* @var EventbookingModelEvent $model */
		$model = $this->getModel('event');
		$model->delete($cid);

		$msg = JText::_('EB_DELETE_EVENTS_SUCCESS');

		$return = base64_decode($this->input->getBase64('return'));

		if ($return && JUri::isInternal($return))
		{
			$this->setRedirect($return);
		}
		else
		{
			$this->setRedirect(JRoute::_(EventbookingHelperRoute::getViewRoute('events', $this->input->getInt('Itemid', 0)), false), $msg);
		}
	}

	/**
	 * Send invitation to friends
	 *
	 * @return void|boolean
	 *
	 * @throws Exception
	 */
	public function send_invite()
	{
		$this->csrfProtection();
		$config = EventbookingHelper::getConfig();

		if ($config->show_invite_friend)
		{
			$config = EventbookingHelper::getConfig();
			$user   = JFactory::getUser();

			if ($config->enable_captcha && ($user->id == 0 || $config->bypass_captcha_for_registered_user !== '1') && !$this->validateCaptcha($this->input))
			{
				$this->app->enqueueMessage(JText::_('EB_INVALID_CAPTCHA_ENTERED'), 'warning');
				$this->input->set('view', 'invite');
				$this->input->set('layout', 'default');
				$this->display();

				return;
			}

			/* @var EventBookingModelInvite $model */
			$model = $this->getModel('invite');
			$post  = $this->input->post->getData();

			$model->sendInvite($post);

			$this->setRedirect(
				JRoute::_('index.php?option=com_eventbooking&view=invite&layout=complete&tmpl=component&Itemid=' . $this->input->getInt('Itemid', 0),
					false));
		}
		else
		{
			throw new Exception(JText::_('JLIB_APPLICATION_ERROR_ACCESS_FORBIDDEN'), 403);
		}
	}

	/**
	 * Download Ical
	 */
	public function download_ical()
	{
		$eventId = $this->input->getInt('event_id');

		if ($eventId)
		{
			$config      = EventbookingHelper::getConfig();
			$event       = EventbookingHelperDatabase::getEvent($eventId);
			$rowLocation = EventbookingHelperDatabase::getLocation($event->location_id);

			if ($config->from_name)
			{
				$fromName = $config->from_name;
			}
			else
			{
				$fromName = JFactory::getConfig()->get('from_name');
			}

			if ($config->from_email)
			{
				$fromEmail = $config->from_email;
			}
			else
			{
				$fromEmail = JFactory::getConfig()->get('mailfrom');
			}

			$ics = new EventbookingHelperIcs();
			$ics->setName($event->title)
				->setDescription($event->short_description)
				->setOrganizer($fromEmail, $fromName)
				->setStart($event->event_date)
				->setEnd($event->event_end_date);

			if ($rowLocation)
			{
				$ics->setLocation($rowLocation->name);
			}

			$ics->download();
		}
	}

	/**
	 * Redirect user to events mangement page
	 */
	public function cancel()
	{
		$return = base64_decode($this->input->getBase64('return'));

		if ($return && JUri::isInternal($return))
		{
			$this->setRedirect($return);
		}
		else
		{
			$this->setRedirect(JRoute::_(EventbookingHelperRoute::getViewRoute('events', $this->input->getInt('Itemid', 0)), false));
		}
	}
}
