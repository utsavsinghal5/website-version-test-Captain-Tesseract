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

jimport('joomla.filesystem.file');

$engine = JPATH_ADMINISTRATOR . '/components/com_easyblog/includes/easyblog.php';

if (!JFile::exists($engine)) {
	return;
}

require_once(__DIR__ . '/helper.php');
require_once($engine);

$modules = EB::modules($module);

$helper = new modEasyBlogMostCommentedPostHelper($modules);

$config = $modules->config;

$data = $helper->getMostCommentedPost();

if (!$data) {
	return;
}

// Process the posts
$posts = $modules->processItems($data);

$textcount = $params->get('textcount', 150);
$layout = $params->get('module_layout', 'vertical');

// Get photo layout and alignment settings
$photoLayout = $modules->getCoverLayout();
$photoAlignment = $modules->getCoverAlignment();

// EasyBlog 5.0.x backward compatible fixes
if (!in_array($layout, array('vertical', 'horizontal'))) {
	$layout = 'vertical';
}

$columnCount = $params->get('column');

$disabled = $params->get('enableratings') ? false : true;

require($modules->getLayout());
