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
?>
<div id="eb" class="eb-mod mod-easyblogshowcase--sidenav st-5 mod-easyblogshowcase<?php echo $modules->getWrapperClass(); ?>  <?php echo $modules->isMobile() ? 'is-mobile' : '';?>">
	<div class="eb-gallery-stage" data-eb-module-showcase data-autoplay="<?php echo $autoplay;?>" data-interval="<?php echo $autoplayInterval;?>" data-direction="vertical">
		<div class="row-table">
			<div class="col-cell eb-gallery-main">
				<div class="swiper-container gallery-top" data-container>
					<div class="swiper-wrapper">
						<?php foreach ($posts as $post) { ?>
						<div class="eb-gallery-item swiper-slide">
							<div class="eb-gallery-box" style="background-image: url('<?php echo $post->postCover;?>') !important;">
								<div class="eb-gallery-body">
									<?php if ($params->get('authoravatar', true)) { ?>
										<a href="<?php echo $post->getAuthor()->getProfileLink(); ?>" class="eb-gallery-avatar mod-avatar">
											<img src="<?php echo $post->getAuthor()->getAvatar(); ?>" width="50" height="50" />
										</a>
									<?php } ?>

									<h3 class="eb-gallery-title">
										<a href="<?php echo $post->getPermalink();?>"><?php echo $post->title;?></a>
									</h3>

									<div class="eb-gallery-meta">
										<?php if ($params->get('contentauthor', true)) { ?>
											<span>
												<a href="<?php echo $post->getAuthor()->getProfileLink(); ?>" class="eb-mod-media-title"><?php echo $post->getAuthor()->getName(); ?></a>
											</span>
										<?php } ?>

										<span>
											<a href="<?php echo $post->getPrimaryCategory()->getPermalink();?>"><?php echo JText::_($post->getPrimaryCategory()->title);?></a>
										</span>

										<?php if ($params->get('contentdate' , true)) { ?>
											<span>
												<?php echo $post->getCreationDate(true)->format($params->get('dateformat', JText::_('DATE_FORMAT_LC3'))); ?>
											</span>
										<?php } ?>
									</div>

									<div class="eb-gallery-content">
										<?php echo $post->content; ?>
									</div>

									<?php if ($params->get('showratings', true)) { ?>
										<div class="eb-rating">
											<?php echo EB::ratings()->html($post, 'ebmostshowcase-' . $post->id . '-ratings', JText::_('MOD_SHOWCASE_RATE_BLOG_ENTRY'), $disabled); ?>
										</div>
									<?php } ?>

									<?php if ($params->get('showreadmore', true)) { ?>
										<div class="eb-gallery-more">
											<a href="<?php echo $post->getPermalink();?>"><?php echo JText::_('MOD_SHOWCASE_READ_MORE');?></a>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>

			</div>

			<div class="col-cell cell-tight eb-gallery-side">
				<div class="swiper-container gallery-thumbs swiper-container-vertical" data-thumbs
				data-free-mode="1"
				data-space-between="10"
				data-watch-slides-visibility="1"
				data-watch-slides-progress="1">
					<div class="swiper-wrapper">
					<?php $i = 0; ?>
					<?php foreach ($posts as $post) { ?>
						<div class="swiper-slide">
							<div class="eb-gallery-slide-item ">
								<div class="eb-gallery-slide-item__img">
									<div class="eb-gallery-menu-thumb" style="background-image: url('<?php echo $post->postCover;?>');"></div>
								</div>
								<div class="eb-gallery-slide-item__desc">
									<?php echo $post->title;?>
								</div>
							</div>
						</div>
						<?php $i++; ?>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<?php if (count($posts) > 1) { ?>
		<div class="eb-gallery-foot">
			<div class="eb-gallery-foot__btn-group">
				<div class="eb-gallery-buttons">
					<div class="eb-gallery-button eb-gallery-prev-button" data-featured-previous>
						<i class="fa fa-angle-left"></i>
					</div>
					<div class="eb-gallery-button eb-gallery-prev-button" data-featured-next>
						<i class="fa fa-angle-right"></i>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>

<?php if ($displayViewAll) { ?>
<div id="eb">
	<?php require(JModuleHelper::getLayoutPath('mod_easyblogshowcase', 'default_viewall')); ?>
</div>
<?php } ?>

<?php include_once(__DIR__ . '/default_scripts.php'); ?>
