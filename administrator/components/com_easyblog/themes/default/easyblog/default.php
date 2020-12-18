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
<form action="index.php?option=com_easyblog" method="post" name="adminForm" id="adminForm">
	<div class="row">

		<div class="col-lg-8">
			<?php if ($this->my->authorise('easyblog.manage.blog', 'com_easyblog')) { ?>
				<?php echo $this->output('admin/easyblog/widgets/default');?>
			<?php } ?>
		</div>

		<div class="col-lg-4">
			<?php if ($this->my->authorise('easyblog.manage.maintenance', 'com_easyblog')) { ?>
			<div class="dash-sidebar">
				<div class="dash-user">
					<div>
						<i class="fa fa-cloud" style="font-size: 20px; line-height: 48px; height: 48px; width: 48px; text-align: center; border: 2px solid #ddd; border-radius: 100%; color: #999"></i>
					</div>
					<div class="checking-updates" data-version-checks>
						<b class="checking">
							<i class="fa fa-circle-o-notch fa-spin"></i> <?php echo JText::_('COM_EASYBLOG_CHECKING_FOR_UPDATES');?>
						</b>
						<b class="latest">
							<?php echo JText::_('COM_EASYBLOG_SOFTWARE_IS_UP_TO_DATE');?>
						</b>
						<b class="requires-updating">
							<?php echo JText::_('COM_EASYBLOG_SOFTWARE_REQUIRES_UPDATING');?>

							<a href="<?php echo JURI::root();?>administrator/index.php?option=com_easyblog&task=system.upgrade" class="btn btn-primary btn-sm pull-right"><?php echo JText::_('COM_EASYBLOG_UPDATE_NOW');?></a>
						</b>
						<div class="versions-meta">
							<div class="text-muted local-version"><?php echo JText::_('COM_EASYBLOG_DASHBOARD_INSTALLED_VERSION');?>: <span data-local-version></span></div>
							<div class="text-muted latest-version"><?php echo JText::_('COM_EASYBLOG_DASHBOARD_LATEST_VERSION');?>: <span data-online-version></span></div>
						</div>
					</div>
				</div>

				<div class="dash-stats">
					<strong><?php echo JText::_('COM_EASYBLOG_DASHBOARD_BLOG_STATISTICS');?></strong>
					<div class="row dash-stats-grid text-center">
						<div class="col-md-4">
							<a class="dash-stat-stamp" href="<?php echo JRoute::_('index.php?option=com_easyblog&view=blogs');?>">
								<i class="fa fa-file-text-o"></i>
								<em><?php echo $totalPosts;?></em>
								<b><?php echo JText::_('COM_EASYBLOG_STATS_POSTS');?></b>
							</a>
						</div>
						<div class="col-md-4">
							<a class="dash-stat-stamp" href="<?php echo JRoute::_('index.php?option=com_easyblog&view=blogs&layout=pending');?>">
								<i class="fa fa-file-o"></i>
								<em><?php echo $totalPending;?></em>
								<b><?php echo JText::_('COM_EASYBLOG_STATS_PENDING');?></b>
							</a>
						</div>
						<div class="col-md-4">
							<a class="dash-stat-stamp" href="<?php echo JRoute::_('index.php?option=com_easyblog&view=feeds');?>">
								<i class="fa fa-rss-square"></i>
								<em><?php echo $totalFeeds;?></em>
								<b><?php echo JText::_('COM_EASYBLOG_STATS_FEEDS');?></b>
							</a>
						</div>
						<div class="col-md-4">
							<a class="dash-stat-stamp" href="<?php echo JRoute::_('index.php?option=com_easyblog&view=comments');?>">
								<i class="fa fa-comments-o"></i>
								<em><?php echo $totalComments;?></em>
								<b><?php echo JText::_('COM_EASYBLOG_STATS_COMMENTS');?></b>
							</a>
						</div>
						<div class="col-md-4">
							<a class="dash-stat-stamp" href="<?php echo JRoute::_('index.php?option=com_easyblog&view=categories');?>">
								<i class="fa fa-folder-open-o"></i>
								<em><?php echo $totalCategories;?></em>
								<b><?php echo JText::_('COM_EASYBLOG_STATS_CATEGORIES');?></b>
							</a>
						</div>
						<div class="col-md-4">
							<a class="dash-stat-stamp" href="<?php echo JRoute::_('index.php?option=com_easyblog&view=tags');?>">
								<i class="fa fa-tags"></i>
								<em><?php echo $totalTags;?></em>
								<b><?php echo JText::_('COM_EASYBLOG_STATS_TAGS');?></b>
							</a>
						</div>
						<div class="col-md-4">
							<a class="dash-stat-stamp" href="<?php echo JRoute::_('index.php?option=com_easyblog&view=bloggers');?>">
								<i class="fa fa-user"></i>
								<em><?php echo $totalAuthors;?></em>
								<b><?php echo JText::_('COM_EASYBLOG_STATS_AUTHORS');?></b>
							</a>
						</div>
						<div class="col-md-4">
							<a class="dash-stat-stamp" href="<?php echo JRoute::_('index.php?option=com_easyblog&view=teamblogs');?>">
								<i class="fa fa-users"></i>
								<em><?php echo $totalTeams;?></em>
								<b><?php echo JText::_('COM_EASYBLOG_STATS_TEAMS');?></b>
							</a>
						</div>
						<div class="col-md-4">
							<a class="dash-stat-stamp" href="<?php echo JRoute::_('index.php?option=com_easyblog&view=reactions');?>">
								<i class="fa fa-smile-o"></i>
								<em><?php echo $totalReactions;?></em>
								<b><?php echo JText::_('COM_EASYBLOG_REACTIONS');?></b>
							</a>
						</div>
					</div>
				</div>

				<div class="dash-summary">
					<strong><?php echo JText::_('COM_EASYBLOG_DASHBOARD_STAY_UPDATED');?></strong>
					<div>
						<i class="fa fa-facebook-official"></i>
						<span>
							<a href="https://facebook.com/StackIdeas" class="text-inherit"><?php echo JText::_('COM_EASYBLOG_DASHBOARD_LIKE_US_ON_FACEBOOK');?></a>
						</span>
					</div>
					<div>
						<i class="fa fa-twitter"></i>
						<span>
							<a href="https://twitter.com/StackIdeas" class="text-inherit"><?php echo JText::_('COM_EASYBLOG_DASHBOARD_FOLLOW_US_ON_TWITTER');?></a>
						</span>
					</div>
					<div>
						<i class="fa fa-book"></i>
						<span>
							<a href="http://stackideas.com/docs/easyblog/" class="text-inherit"><?php echo JText::_('COM_EASYBLOG_DASHBOARD_PRODUCT_DOCUMENTATION');?></a>
						</span>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>

	<input type="hidden" name="boxchecked" value="0" />
</form>
