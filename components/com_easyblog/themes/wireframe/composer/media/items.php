<?php
/**
* @package      EasyBlog
* @copyright    Copyright (C) 2010 - 2017 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<?php foreach ($items as $item) { ?>
	<?php if ($item->type == 'folder') { ?>
	<div class="eb-nmm-content-listing__item type-folder" data-mm-folder data-uri="<?php echo $item->uri;?>" data-key="<?php echo $item->key;?>">
		<div class="eb-nmm-media">

			<div class="eb-nmm-media__body">
				<div class="eb-nmm-media__icon-wrapper">
					<i class="eb-nmm-media__icon"></i>
				</div>

				<div class="eb-nmm-media__cover">

					<div class="eb-nmm-media__embed">
						<div class="eb-nmm-media__embed-item"></div>
					</div>
				</div>
			</div>

			<div class="eb-nmm-media__info">
				<div class="eb-nmm-media__info-txt text-center" data-item-title><?php echo $item->title;?></div>
			</div>

			<div class="eb-nmm-media__dropdown-action">
				<button type="button" class="eb-nmm-media__toggle-info" data-mm-mobile-panel-open data-uri="<?php echo $item->uri;?>" data-key="<?php echo $item->key;?>">
					<i class="fa fa-info"></i>
				</button>
			</div>
		</div>
	</div>
	<?php } else { ?>
	<div class="eb-nmm-content-listing__item type-<?php echo $item->type; ?><?php echo empty($item->extension) ? '' : ' ext-' . $item->extension; ?>" data-mm-item data-key="<?php echo $item->key; ?>"
		data-uri="<?php echo $item->uri;?>">
		<div class="eb-nmm-media">

			<div class="eb-nmm-media__checkbox-wrap">
				<div class="o-checkbox eb-nmm-media__checkbox">
					<input type="checkbox" id="<?php echo $item->key; ?>" data-mm-item-checkbox-input />
					<label for="<?php echo $item->key; ?>" data-mm-item-checkbox></label>
				</div>
			</div>


			<div class="eb-nmm-media__body">
				<div class="eb-nmm-media__icon-wrapper">
					<i class="eb-nmm-media__icon"></i>
				</div>


				<div class="eb-nmm-media__cover">
					<div class="eb-nmm-media__embed">
						<div class="eb-nmm-media__embed-item" style="<?php echo $item->preview ? "background-image: url('" . $item->preview . "');" : '';?>">
							<?php if ($item->type != 'image') { ?>
							<i class="eb-nmm-media__embed-item-icon <?php echo $item->icon;?>"></i>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

			<div class="eb-nmm-media__info">
				<div class="eb-nmm-media__info-txt" data-item-title><?php echo $item->title;?></div>
			</div>
			<div class="eb-nmm-media__dropdown-action">
				<button type="button" class="eb-nmm-media__toggle-info" data-mm-mobile-panel-open data-uri="<?php echo $item->uri;?>" data-key="<?php echo $item->key;?>">
					<i class="fa fa-info"></i>
				</button>
			</div>

		</div>
	</div>
	<?php } ?>
<?php } ?>

<?php if ($uri == 'flickr') { ?>
	<div class="eb-nmm-content-listing__item type-loadmore" data-mm-item-loadmore data-page="<?php echo $nextPage; ?>">
		<div class="eb-nmm-media">

			<div class="eb-nmm-media__body">
				<div class="eb-nmm-media__icon-wrapper">
					<i class="eb-nmm-media__icon"></i>
				</div>
				
				<div class="eb-nmm-media__cover">
					<div class="eb-nmm-media__embed">
						
						<div class="eb-nmm-media__loader-container" data-loadmore-container>
							<div class="eb-nmm-media__loader-txt">
								<i style="font-size:24px;" class="fa fa-chevron-circle-right"></i>
								<div><?php echo JText::_('COM_EB_LOADMORE'); ?></div>
							</div>
							<div class="o-loader o-loader--sm"></div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
<?php } ?>
