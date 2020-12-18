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
<form method="post" action="<?php echo JRoute::_('index.php');?>" id="adminForm" enctype="multipart/form-data">

	<div class="app-tabs">
		<ul class="app-tabs-list list-unstyled">
			<?php foreach ($tabs as $tab) { ?>
			<li class="tabItem <?php echo $tab->active ? 'active' : '';?>">
				<a href="#<?php echo $tab->id;?>" data-bp-toggle="tab" data-form-tabs><?php echo $tab->title;?></a>
			</li>
			<?php } ?>
		</ul>
	</div>

	<div class="tab-content">
		<?php foreach ($tabs as $tab) { ?>
		<div id="<?php echo $tab->id;?>" class="tab-pane <?php echo $tab->active ? 'active' : '';?>">
			<?php echo $tab->contents;?>
		</div>
		<?php } ?>
	</div>

	<div class="hidden btn-wrapper eb-settings-search" data-search-wrapper>
		<input type="text" class="eb-settings-search__input" data-settings-search placeholder="Search for settings ..."/>

		<div class="hidden eb-settings-search__result" data-search-result style="">
		</div>
	</div>

	<div id="toolbar-actions" class="btn-wrapper hidden" data-toolbar-actions="others">
		<div class="dropdown">
			<button type="button" class="btn btn-small dropdown-toggle" data-toggle="dropdown">
				<span class="icon-cog"></span> <?php echo JText::_('COM_EB_OTHER_ACTIONS');?> &nbsp;<span class="caret"></span>
			</button>

			<ul class="dropdown-menu">
				<li>
					<a href="javascript:void(0);" data-action="export">
						<?php echo JText::_('COM_EASYBLOG_EXPORT_SETTINGS'); ?>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" data-action="import">
						<?php echo JText::_('COM_EASYBLOG_IMPORT_SETTINGS'); ?>
					</a>
				</li>
			</ul>
		</div>
	</div>

	<?php echo $this->html('form.action'); ?>
	<input type="hidden" name="page" value="<?php echo $layout;?>" />
	<input type="hidden" name="activeTab" value="<?php echo $activeTab;?>" data-settings-active />
</form>
