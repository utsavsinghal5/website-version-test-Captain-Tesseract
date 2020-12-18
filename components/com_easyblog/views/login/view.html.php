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

require_once(JPATH_COMPONENT . '/views/views.php');

class EasyBlogViewLogin extends EasyBlogView
{
	public function display($tmpl = null)
	{
		// If user is already logged in, just redirect them
		if (!$this->my->guest) {
			$this->info->set(JText::_('COM_EASYBLOG_YOU_ARE_ALREADY_LOGIN'), 'error');

			return $this->app->redirect(EBR::_('index.php?option=com_easyblog'));
		}

		// Determines if there's any return url
		$return = $this->input->get('return', '', 'BASE64');

		if (empty($return)) {

			// We need to append the correct Itemid in order for the url to not always pointing to login menu item. #1427
			$itemId = EBR::getItemId('latest');
			$return = base64_encode('index.php?option=com_easyblog&Itemid=' . $itemId);
		}

		// Set the meta tags for this page
		EB::setMeta(0, META_TYPE_VIEW);

		$this->set('return', $return);
		parent::display('login/default');
	}
}
