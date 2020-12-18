<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

class EasyBlogAdminView extends JViewLegacy
{
	protected $heading = null;
	protected $desc = null;
	protected $doc = null;
	protected $my = null;
	protected $app = null;
	protected $config = null;
	protected $jconfig = null;
	protected $sidebar = true;

	public function __construct()
	{
		$this->config = EB::getConfig();
		$this->jconfig = JFactory::getConfig();
		$this->app = JFactory::getApplication();
		$this->doc = JFactory::getDocument();
		$this->my = JFactory::getUser();
		$this->input = EB::request();
		$this->info = EB::info();

		$this->theme = EB::getTemplate(null, array('view' => $this, 'admin' => true));

		if ($this->doc->getType() == 'ajax') {
			$this->ajax = EB::ajax();
		}

		// Standardize heading
		JToolBarHelper::title(JText::_('COM_EASYBLOG'));

		parent::__construct();
	}

	/**
	 * Hides back-end sidebar
	 *
	 * @since	5.4.4
	 * @access	public
	 */
	public function hideSidebar()
	{
		$this->sidebar = false;
	}

	/**
	 * Allows child classes to set heading of the page
	 *
	 * @since	5.0.0
	 * @access	public
	 */
	public function setHeading($heading, $desc = '', $icon = '')
	{
		$userGid = $this->input->get('id', 0, 'int');
		$view = $this->input->get('view', '', 'cmd');
		$layout = $this->input->get('layout', '', 'cmd');

		$this->heading = $heading;

		// Display user group on the acl header
		if ($view == 'acls' && $layout == 'form') {

			$model = EB::model('Acls');
			$rulesets = $model->getRuleSets($userGid);

			foreach ($rulesets as $ruleset) {
				$this->heading = $ruleset->name;
			}
		}

		if (empty($desc)) {
			$this->desc = $heading . '_DESC';
		}
	}

	/**
	 * Checks if the current viewer can really access this section
	 *
	 * @since	5.0.0
	 * @access	public
	 */
	public function checkAccess($rule)
	{
		if (!$this->my->authorise($rule , 'com_easyblog')) {
			$this->info->set('JERROR_ALERTNOAUTHOR', 'error');
			return $this->app->redirect('index.php?option=com_easyblog');
		}
	}

	/**
	 * Override parent's implementation
	 *
	 * @since	5.0.0
	 * @access	public
	 */
	public function display($tpl = null)
	{
		// Set the appropriate namespace
		$namespace 	= 'admin/' . $tpl;

		// Get the child contents
		$output = $this->theme->output($namespace);

		// Get the sidebar
		$sidebar = $this->getSidebar();

		// Determine if this is a tmpl view
		$tmpl = $this->input->get('tmpl', '', 'word');

		// Prepare the structure
		$theme = EB::getTemplate();

		// Get current version
		$version = EB::getLocalVersion();

		// Render a different structure prefix when tmpl=component
		$prefix = $tmpl == 'component' ? 'eb-window' : '';

		// Initialize all javascript frameworks
		EB::init('admin');

		$scripts = '';

		// Check if facebook token is expiring
		$model = EB::model('Oauth');
		$fbTokenExpiring = $model->getSoonTobeExpired('facebook', 7);

		$theme->set('info', $this->info);
		$theme->set('prefix', $prefix);
		$theme->set('version', $version);
		$theme->set('heading', $this->heading);
		$theme->set('desc', $this->desc);
		$theme->set('output', $output);
		$theme->set('tmpl', $tmpl);
		$theme->set('sidebar', $sidebar);
		$theme->set('jscripts', $scripts);
		$theme->set('fbTokenExpiring', $fbTokenExpiring);

		$contents = $theme->output('admin/structure/default');

		// If the toolbar registration exists, load it up
		if (method_exists($this, 'registerToolbar')) {
			$this->registerToolbar();
		}

		// Collect all javascripts attached so that we can output them at the bottom of the page
		$scripts = EB::scripts()->getScripts();
		$this->doc->addCustomTag($scripts);

		echo $contents;

	}

	/**
	 * Proxy for setting a variable to the template.
	 *
	 * @since	5.0
	 * @access	public
	 */
	public function set($key, $value = '')
	{
		$this->theme->set($key, $value);
	}

	/**
	 * Processes counters from the menus.json
	 *
	 * @since	5.0.0
	 * @access	public
	 */
	public function getCounter($namespace)
	{
		static $counters = array();

		list($model, $method) = explode('/', $namespace);

		if (!isset($counters[$namespace])) {
			$model = EB::model($model);

			$counters[$namespace] = $model->$method();
		}

		return $counters[$namespace];
	}

	/**
	 * Prepares the sidebar
	 *
	 * @since	5.2.0
	 * @access	public
	 */
	public function getSidebar()
	{
		if (!$this->sidebar) {
			return;
		}

		$file = JPATH_COMPONENT . '/defaults/menus.json';
		$contents = file_get_contents($file);

		$view = $this->input->get('view', '', 'cmd');
		$layout = $this->input->get('layout', '', 'cmd');
		$result = json_decode($contents);
		$menus = array();

		foreach ($result as &$row) {

			// Check if the user is allowed to view this sidebar
			if (isset($row->access) && $row->access) {
				if (!$this->my->authorise($row->access, 'com_easyblog')) {
					continue;
				}
			}

			if (!isset($row->view)) {
				$row->link = 'index.php?option=com_easyblog';
				$row->view = '';
			}

			if (isset($row->counter)) {
				$row->counter = $this->getCounter($row->counter);
			}

			if (!isset($row->link)) {
				$row->link = 'index.php?option=com_easyblog&view=' . $row->view;
			}

			if (isset($row->childs) && $row->childs) {

				foreach ($row->childs as &$child) {

					$child->link = 'index.php?option=com_easyblog&view=' . $row->view;

					if ($child->url) {
						foreach ($child->url as $key => $value) {

							if (!empty($value)) {
								$child->link .= '&' . $key . '=' . $value;
							}
						}
					}

					// Processes items with counter
					if (isset($child->counter)) {
						$child->counter = $this->getCounter($child->counter);
					}
				}
			}

			$menus[] = $row;
		}

		// Get local version
		$localVersion = EB::getLocalVersion();

		$theme = EB::getTemplate();
		$theme->set('localVersion', $localVersion);
		$theme->set('layout', $layout);
		$theme->set('view', $view);
		$theme->set('menus', $menus);

		$output = $theme->output('admin/structure/default.sidebar');

		return $output;
	}
}
