<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2017 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div class="eb-settings-info">
	<i class="fa fa-info-circle"></i>&nbsp; <?php echo JText::_('COM_EASYBLOG_SETTINGS_LISTINGS_LAYOUT_INFO');?>
</div>

<div class="row">
	<div class="col-lg-6">
		<div class="panel">
			<?php echo $this->html('panel.heading', $fieldsets->frontpage['post']->label, $fieldsets->frontpage['post']->info); ?>

			<div class="panel-body">
				<?php echo $this->output('admin/settings/views/fields/renderer', array('fields' => $fieldsets->frontpage['post']->fields, 'key' => 'listing')); ?>
			</div>
		</div>

		<div class="panel">
			<?php echo $this->html('panel.heading', $fieldsets->frontpage['pagination']->label, $fieldsets->frontpage['pagination']->info); ?>

			<div class="panel-body">
				<?php echo $this->output('admin/settings/views/fields/renderer', array('fields' => $fieldsets->frontpage['pagination']->fields, 'key' => 'listing')); ?>
			</div>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="panel">
			<?php echo $this->html('panel.heading', $fieldsets->frontpage['comments']->label, $fieldsets->frontpage['comments']->info); ?>

			<div class="panel-body">
				<?php echo $this->output('admin/settings/views/fields/renderer', array('fields' => $fieldsets->frontpage['comments']->fields, 'key' => 'listing')); ?>
			</div>
		</div>

		<div class="panel">
			<?php echo $this->html('panel.heading', $fieldsets->frontpage['featured']->label, $fieldsets->frontpage['featured']->info); ?>

			<div class="panel-body">
				<?php echo $this->output('admin/settings/views/fields/renderer', array('fields' => $fieldsets->frontpage['featured']->fields, 'key' => 'listing')); ?>
			</div>
		</div>
	</div>
</div>

