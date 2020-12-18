<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2020 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<?php if ($posts) { ?>
	<?php $index = 0; ?>
	<?php foreach ($posts as $post) { ?>
		<?php if (!EB::isSiteAdmin() && $this->config->get('main_password_protect') && !empty($post->blogpassword) && !$post->verifyPassword()) { ?>
			<?php echo $this->output('site/blogs/latest/default.protected', array('post' => $post, 'index' => $index)); ?>
		<?php } else { ?>
			<?php echo $this->output('site/blogs/latest/card/default', array('post' => $post, 'index' => $index)); ?>
		<?php } ?>
	<?php $index++; ?>
	<?php } ?>
<?php } else { ?>
<div class="eb-empty">
	<i class="fa fa-paper-plane-o"></i>
	<?php echo JText::_('COM_EASYBLOG_NO_BLOG_ENTRY');?>
</div>
<?php } ?>


