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
?>

<?php echo EB::renderModule('easyblog-before-team-header'); ?>

<?php if ($this->my->guest && $team->access == EBLOG_TEAMBLOG_ACCESS_REGISTERED) { ?>
	<div class="eb-empty">
		<i class="fa fa-info-circle"></i>
		<?php echo JText::_('COM_EB_TEAMBLOGS_FOR_REGISTERED_USERS_ONLY');?>
	</div>
<?php } elseif ($team->access == EBLOG_TEAMBLOG_ACCESS_MEMBER && !$team->isMember) { ?>
	<div class="eb-empty">
		<i class="fa fa-info-circle"></i>
		<?php echo JText::_('COM_EB_TEAMBLOGS_FOR_MEMBERS_ONLY');?>
	</div>
<?php } else { ?>

	<div class="eb-author eb-author-teamblog" data-team-item data-id="<?php echo $team->id;?>">
		<?php echo $this->html('headers.team', $team); ?>
	</div>

	<?php echo EB::renderModule('easyblog-after-team-header'); ?>

	<div class="eb-posts" data-team-posts>
		<?php if ($posts) { ?>
			<?php foreach ($posts as $post) { ?>
				<?php if (!EB::isSiteAdmin() && $this->config->get('main_password_protect') && !empty($post->blogpassword) && !$post->verifyPassword()) { ?>
					<!-- Password protected theme files -->
					<?php echo $this->fetch('blog.item.protected.php', array('post' => $post, 'index' => 1, 'currentPageLink' => '')); ?>
				<?php } else { ?>
					<?php echo $this->output('site/blogs/latest/default.main', array('post' => $post, 'index' => 1, 'currentPageLink' => '')); ?>
				<?php } ?>
			<?php } ?>
		<?php } else { ?>
			<div class="eb-empty">
				<i class="fa fa-info-circle"></i>
				<?php echo JText::_('COM_EASYBLOG_NO_BLOG_ENTRY');?>
			</div>
		<?php } ?>
	</div>

	<?php if ($pagination) {?>

		<!-- @module: easyblog-before-pagination -->
		<?php echo EB::renderModule('easyblog-before-pagination'); ?>

		<!-- Pagination items -->
		<?php echo $pagination;?>

		<!-- @module: easyblog-after-pagination -->
		<?php echo EB::renderModule('easyblog-after-pagination'); ?>
	<?php } ?>
<?php } ?>


