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
<div class="eb-authors-team">
	<?php if ($teams) { ?>
		<?php foreach ($teams as $team) { ?>
			<div class="eb-author <?php echo $this->isMobile() ? 'is-mobile' : '';?>" data-team-item data-id="<?php echo $team->id;?>">

				<?php echo $this->html('headers.team', $team); ?>

				<div class="eb-authors-stats">
					<ul class="eb-stats-nav reset-list">
						<li class="active">
							<a class="btn btn-default btn-block" href="#team-posts-<?php echo $team->id;?>" data-bp-toggle="tab">
								<?php echo JText::_('COM_EASYBLOG_TEAMBLOG_TOTAL_POSTS');?>
								<b><?php echo $team->postCount; ?></b>
							</a>
						</li>
						<li>
							<a class="btn btn-default btn-block" href="#team-authors-<?php echo $team->id;?>" data-bp-toggle="tab">
								<?php echo JText::_('COM_EASYBLOG_TEAMBLOG_TOTAL_AUTHORS');?>
								<b><?php echo $team->memberCount;?></b>
							</a>
						</li>
					</ul>
					<div class="eb-stats-content">
						<div class="tab-pane eb-stats-posts active" id="team-posts-<?php echo $team->id;?>">
							<?php if ($team->blogs) { ?>
								<?php foreach ($team->blogs as $post) { ?>
								<div>
									<time><?php echo $post->getCreationDate()->format(JText::_('DATE_FORMAT_LC3'));?></time>

									<?php echo $post->getIcon('eb-post-type'); ?>

									<a href="<?php echo $post->getPermalink();?>"><?php echo $post->title;?></a>
								</div>
								<?php } ?>

								<a href="<?php echo $team->getPermalink();?>" class="btn btn-show-all">
									<?php echo JText::_('COM_EASYBLOG_VIEW_ALL_POSTS');?>
								</a>

							<?php } else { ?>
								<div class="eb-empty">
									<?php echo JText::_('COM_EASYBLOG_TEAMBLOGS_NO_POSTS_YET');?>
								</div>
							<?php } ?>
						</div>
						<div class="tab-pane eb-labels eb-stats-authors" id="team-authors-<?php echo $team->id;?>">

							<?php if ($team->members) { ?>
								<?php foreach ($team->members as $member) { ?>
									<div class="eb-stats-author row-table">
										<a class="col-cell cell-tight" href="<?php echo $member->getPermalink();?>">
											<img src="<?php echo $member->getAvatar(); ?>" width="50" height="50" alt="<?php echo $member->getName();?>" />
										</a>
										<div class="col-cell pl-10">
											<b>
												<a href="<?php echo $member->getPermalink();?>"><?php echo $member->getName();?></a>
											</b>
											<div>
												<?php $pCnt = isset($member->postCount) ? $member->postCount : $member->getTotalPosts() ; ?>
												<?php echo $this->getNouns('COM_EASYBLOG_AUTHOR_POST_COUNT', $pCnt, true); ?>
											</div>
										</div>
									</div>
								<?php } ?>

								<?php if ($team->memberCount > count($team->members)) { ?>
									<a href="javascript:void(0);" data-view-member class="btn btn-default btn-block btn-show-all"><?php echo JText::_('COM_EASYBLOG_TEAMBLOG_VIEW_ALL_MEMBERS');?></a>
								<?php } ?>


							<?php } else { ?>
								<div class="eb-empty">
									<?php echo JText::_('COM_EASYBLOG_TEAMBLOGS_NO_AUTHORS_YET');?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php } else { ?>
		<div class="eb-empty"><?php echo JText::_('COM_EASYBLOG_NO_TEAMBLOGS_FOUND'); ?></div>
	<?php } ?>

	<?php if ($pagination) { ?>
		<?php echo $pagination; ?>
	<?php } ?>
</div>
