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

class plgInstallerEasyBlog extends JPlugin
{
	/**
	 * Determines if EasyBlog is installed
	 *
	 * @since	5.2.0
	 * @access	public
	 */
	public function exists()
	{
		$file = JPATH_ADMINISTRATOR . '/components/com_easyblog/includes/easyblog.php';

		if (!JFile::exists($file) || !JComponentHelper::isInstalled('com_easyblog')) {
			return false;
		}

		require_once($file);

		return true;
	}

	/**
	 * Modifies update url
	 *
	 * @since	5.2.0
	 * @access	public
	 */
	public function onInstallerBeforePackageDownload(&$url, &$headers)
	{
		$app = JFactory::getApplication();

		// If EasyBlog doesn't exist or it isn't enabled, there is no point updating it.
		if (!$this->exists() || stristr($url, 'https://services.stackideas.com/updater/easyblog') === false) {
			return true;
		}

		// Get user's subscription key
		$config = EB::config();
		$key = $config->get('main_apikey');

		if (!$key) {
			$app->enqueueMessage('Your setup contains an invalid api key. EasyBlog will not be updated now. If the problem still persists, please get in touch with the support team at https://stackideas.com/forums', 'error');

			return true;
		}

		$domain = str_ireplace(array('http://', 'https://'), '', rtrim(JURI::root(), '/'));

		$uri = new JURI($url);
		$uri->setVar('from', EB::getLocalVersion());
		$uri->setVar('key', $key);
		$uri->setVar('domain', $domain);
		$url = $uri->toString();

		return true;
	}
}
