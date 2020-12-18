<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2018 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

require_once(JPATH_ADMINISTRATOR . '/components/com_easyblog/views.php');

class EasyBlogViewSpools extends EasyBlogAdminView
{
	/**
	 * Display a list of email activities
	 *
	 * @since	4.0
	 * @access	public
	 */
	public function display($tpl = null)
	{
		$this->checkAccess('easyblog.manage.mail');

		$layout = $this->getLayout();

		if (method_exists($this, $layout)) {
			return $this->$layout();
		}

		// Load frontend language file
		EB::loadLanguages();

		// Set heading
		$this->setHeading('COM_EASYBLOG_TITLE_MAIL_ACTIVITIES', '', 'fa-send-o');

		$filter_state = $this->app->getUserStateFromRequest('com_easyblog.spools.filter_state', 'filter_state', '*', 'word');
		$search = $this->app->getUserStateFromRequest('com_easyblog.spools.search', 'search', '', 'string');

		$search = trim(EBString::strtolower($search));
		$order = $this->app->getUserStateFromRequest('com_easyblog.spools.filter_order', 'filter_order', 'created', 'cmd');
		$orderDirection	= $this->app->getUserStateFromRequest('com_easyblog.spools.filter_order_Dir', 'filter_order_Dir', 'asc', 'word');

		$model = EB::model('Spools');
		$limit = $model->getState('limit');
		$mails = $this->get('Data');
		$pagination = $this->get('Pagination');

		// Determine the last execution time of the cronjob if there is
		$cronLastExecuted = $this->config->get('cron_last_execute', '');

		if ($cronLastExecuted) {
			$cronLastExecuted = JFactory::getDate($cronLastExecuted)->format(JText::_('DATE_FORMAT_LC2'));
		}

		$this->set('cronLastExecuted', $cronLastExecuted);
		$this->set('limit', $limit);
		$this->set('mails', $mails);
		$this->set('pagination', $pagination);
		$this->set('state', $this->getFilterState($filter_state));
		$this->set('search', $search);
		$this->set('order', $order);
		$this->set('orderDirection', $orderDirection);

		parent::display('spools/default');
	}

	/**
	 * Previews a mail
	 *
	 * @since	4.0
	 * @access	public
	 */
	public function preview()
	{
		// Check for acl rules.
		$this->checkAccess('mail');

		// Get the mail id
		$id = $this->input->get('id', 0, 'int');

		$mailq	= EB::table('Mailqueue');
		$mailq->load($id);

		echo $mailq->getBody();
		exit;
	}

	/**
	 * Renders the template preview
	 *
	 * @since	5.1.11
	 * @access	public
	 */
	public function templatePreview()
	{
		$file = $this->input->get('file', '', 'default');
		$file = str_ireplace('.php', '', ltrim(urldecode($file), '/'));

		$notification = EB::notification();
		$output = $notification->getTemplateContents($file, array(), true);

		echo $output;exit;
	}

	/**
	 * Renders the lists of e-mail templates
	 *
	 * @since	5.1
	 * @access	public
	 */
	public function editor()
	{
		$this->checkAccess('mail');

		$this->setHeading('COM_EASYBLOG_TITLE_EMAIL_TEMPLATES');

		$model = EB::model('spools');
		$files = $model->getFiles();

		$this->set('files', $files);

		parent::display('spools/editor/default');

	}

	/**
	 * Render the editor for the template
	 *
	 * @since	5.1
	 * @access	public
	 */
	public function editFile()
	{
		$this->checkAccess('mail');

		$this->setHeading('COM_EASYBLOG_EMAILS_EDITING_FILE');

		$file = $this->input->get('file', '', 'default');
		$file = urldecode($file);

		$model = EB::model('spools');
		$absolutePath = $model->getFolder() . $file;

		$file = $model->getTemplate($absolutePath, true);

		// Use codemirror editor to display the file
		$editor = EBFactory::getEditor('codemirror');

		$this->set('editor', $editor);
		$this->set('file', $file);

		parent::display('spools/editfile/default');
	}

	/**
	 * Render toolbar for this page
	 *
	 * @since	5.1
	 * @access	public
	 */
	public function registerToolbar()
	{
		if ($this->getLayout() == 'editor') {
			JToolbarHelper::deleteList('', 'spools.reset', JText::_('COM_EASYBLOG_EMAIL_RESET_DEFAULT'));
			return;
		}

		if ($this->getLayout() == 'editfile') {
			JToolbarHelper::apply('spools.saveFile');
			JToolbarHelper::cancel();
			return;
		}

		JToolbarHelper::deleteList('COM_EASYBLOG_ARE_YOU_SURE_CONFIRM_DELETE', 'spools.remove');
		JToolBarHelper::divider();
		JToolBarHelper::custom('spools.purgeSent','purge','icon-32-unpublish.png', 'COM_EASYBLOG_PURGE_SENT', false);
		JToolBarHelper::custom('spools.purge','purge','icon-32-unpublish.png', 'COM_EASYBLOG_PURGE_ALL', false);
	}

	public function getFilterState($filter_state = '*')
	{
		$state[] = JHTML::_('select.option', '', JText::_('COM_EASYBLOG_SELECT_STATE'));
		$state[] = JHTML::_('select.option', 'P', JText::_('COM_EASYBLOG_SENT'));
		$state[] = JHTML::_('select.option', 'U', JText::_('COM_EASYBLOG_PENDING'));
		return JHTML::_('select.genericlist',   $state, 'filter_state', 'class="form-control" data-table-grid-filter ', 'value', 'text', $filter_state );
	}
}
