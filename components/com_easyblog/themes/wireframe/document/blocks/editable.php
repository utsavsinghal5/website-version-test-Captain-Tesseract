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
<div class="ebd-block <?php echo !empty($blockNest) ? $blockNest : ''; ?>" <?php echo isset($blockType) ? $blockType : ''; ?> <?php echo isset($blockStyle) ? $blockStyle : ''; ?> <?php echo isset($blockUid) ? $blockUid : ''; ?>>
	<div class="ebd-block-toolbar" data-ebd-block-toolbar>
		<div class="ebd-block-sort-handle" data-ebd-block-sort-handle></div>
	</div>
	<div class="ebd-block-viewport" data-ebd-block-viewport>
		<div class="ebd-block-content" data-ebd-block-content>
			<?php echo isset($blockHtml) ? $blockHtml : ''; ?>
		</div>
		<div class="eb-hint hint-loading style-gray size-sm">
			<div>
				<i class="eb-hint-icon"><span class="eb-loader-o size-sm"></span></i>
			</div>
		</div>
	</div>
	<div class="ebd-block-hint" data-ebd-block-hint>
		<div class="eb-hint hint-move layout-overlay">
			<div>
				<span class="eb-hint-text"><?php echo JText::_('COM_EASYBLOG_COMPOSER_HINT_DRAG_TO_MOVE_BLOCK'); ?></span>
			</div>
		</div>
	</div>

	<?php if (!$postTemplateIsLocked) { ?>
	<div class="ebd-block-action" data-ebd-block-actions>
		<div class="ebd-block-action__inner">
			<a href="javascript:void(0);" data-eb-provide="tooltip" title="<?php echo JText::_('COM_EB_COMPOSER_INSERT_BLOCK');?>" data-blocks-insert>
				<i class="fa fa-plus"></i>
			</a>
			<a href="javascript:void(0);" data-eb-provide="tooltip" title="<?php echo JText::_('COM_EASYBLOG_COMPOSER_BLOCKS_DUPLICATE');?>" data-blocks-duplicate>
				<i class="fa fa-files-o"></i>
			</a>
			<a href="javascript:void(0);" data-eb-provide="tooltip" title="<?php echo JText::_('COM_EASYBLOG_COMPOSER_BLOCKS_MOVE');?>" data-blocks-move>
				<i class="fa fa-arrows"></i>
			</a>
			<a href="javascript:void(0);" data-eb-provide="tooltip" title="<?php echo JText::_('COM_EASYBLOG_COMPOSER_BLOCKS_REMOVE');?>" data-blocks-remove>
				<i class="fa fa-times"></i>
			</a>
		</div>
	</div>
	<?php } ?>
</div>
