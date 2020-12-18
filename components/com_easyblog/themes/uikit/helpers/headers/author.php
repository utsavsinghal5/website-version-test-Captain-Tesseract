<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2019 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div class="uk-section uk-section-muted uk-padding-small">
	<div class=""  uk-grid>
		<div class="uk-width-expand@m">
			<div class="uk-grid uk-grid-small" uk-grid>
				<?php if ($this->config->get('layout_avatar') && $viewOptions->avatar) { ?>
				<div class="uk-width-auto@m">
					<a class="eb-avatar" href="<?php echo $author->getPermalink();?>">
						<img src="<?php echo $author->getAvatar(); ?>" class="eb-authors-avatar" width="50" height="50" alt="<?php echo $author->getName(); ?>" />
					</a>
				</div>
				<?php } ?>

				<div class="uk-width-expand@m">

					<?php if ($viewOptions->name) { ?>
					<div class="">
						<h2 class="eb-authors-name reset-heading">
							<a href="<?php echo $author->getProfileLink(); ?>" class="text-inherit"><?php echo $author->getName(); ?></a>
							<small class="eb-authors-featured eb-star-featured<?php echo !$isFeatured ? ' hide' : '';?>"
								data-featured-tag data-eb-provide="tooltip"
								data-original-title="<?php echo JText::_('COM_EASYBLOG_FEATURED_BLOGGER_FEATURED', true);?>"
							>
								<i class="fa fa-star"></i>
							</small>
						</h2>
					</div>
					<?php } ?>

					<div class="eb-authors-subscribe spans-separator">
						<?php if (EB::messaging()->hasMessaging($author->id)) { ?>
							<?php echo EB::messaging()->html($author);?>
						<?php } ?>

						<?php if ($author->getTwitterLink() && $viewOptions->twitter) { ?>
						<span>
							<a href="<?php echo $author->getTwitterLink(); ?>" data-eb-provide="tooltip" title="<?php echo JText::_('COM_EASYBLOG_INTEGRATIONS_TWITTER_FOLLOW_ME', true); ?>">
								<i class="fa fa-twitter"></i>
							</a>
						</span>
						<?php } ?>

						<?php if ($author->getWebsite() && $viewOptions->website) { ?>
						<span class="eb-authors-url">
							<a href="<?php echo $this->escape($author->getWebsite());?>" target="_blank" data-eb-provide="tooltip" title="<?php echo JText::_('COM_EB_VISIT_WEBSITE', true);?>">
								<i class="fa fa-globe"></i>
							</a>
						</span>
						<?php } ?>

						<?php if ($this->acl->get('allow_subscription') && $this->config->get('main_bloggersubscription') && $viewOptions->subscription) { ?>
						<span class="eb-authors-subscription">
							<a href="javascript:void(0);" class="<?php echo $author->isBloggerSubscribed ? 'hide' : ''; ?>" data-blog-subscribe data-type="blogger" data-id="<?php echo $author->id;?>"
								data-eb-provide="tooltip" title="<?php echo JText::_('COM_EASYBLOG_SUBSCRIPTION_SUBSCRIBE_TO_BLOGGER', true);?>"
							>
								<i class="fa fa-envelope"></i>
							</a>
							<a href="javascript:void(0);" class="<?php echo $author->isBloggerSubscribed ? '' : 'hide'; ?>" 
								data-blog-unsubscribe 
								data-type="blogger" 
								data-id="<?php echo $author->id;?>" 
								data-subscription-id="<?php echo $author->isBloggerSubscribed ? $author->isBloggerSubscribed : '';?>"
								data-email="<?php echo $this->my->email;?>"
								data-eb-provide="tooltip" data-title="<?php echo JText::_('COM_EASYBLOG_SUBSCRIPTION_UNSUBSCRIBE_TO_BLOGGER', true);?>"
							>
								<i class="fa fa-envelope"></i>
							</a>
						</span>
						<?php } ?>

						<?php if ($this->acl->get('allow_subscription_rss') && $this->config->get('main_rss') && $viewOptions->rss) { ?>
						<span class="eb-authors-rss">
							<a href="<?php echo $author->getRSS();?>" data-eb-provide="tooltip" title="<?php echo JText::_('COM_EASYBLOG_SUBSCRIBE_FEEDS'); ?>">
								<i class="fa fa-rss"></i>
							</a>
						</span>
						<?php } ?>
					</div>
				</div>

			</div>
		</div>
		
		<?php if (EB::isSiteAdmin() && $viewOptions->featureAction) { ?>
		<div class="uk-width-auto@m">
			<a href="javascript:void(0);" class="uk-button uk-button-default uk-button-small<?php echo !$isFeatured ? ' hide' : '';?>" data-author-unfeature data-id="<?php echo $author->id;?>">
				<i class="fa fa-star-o"></i>&nbsp; <?php echo Jtext::_('COM_EASYBLOG_UNFEATURE_AUTHOR'); ?>
			</a>
			<a href="javascript:void(0);" class="uk-button uk-button-default uk-button-small<?php echo $isFeatured ? ' hide' : '';?>" data-author-feature data-id="<?php echo $author->id;?>">
				<i class="fa fa-star"></i>&nbsp; <?php echo Jtext::_('COM_EASYBLOG_FEATURE_AUTHOR'); ?>
			</a>
		</div>
		<?php } ?>
	</div>
</div>


<?php  if ($author->getBiography() && $viewOptions->biography) { ?>
<div class="eb-authors-bio">
	<?php if ($this->params->get('author_truncate_bio', true)) { ?>
		<?php echo $this->html('string.truncater', $author->getBiography(), 350); ?>
	<?php } else { ?>
		<?php echo $author->getBiography();?>
	<?php } ?>
</div>
<?php } ?>