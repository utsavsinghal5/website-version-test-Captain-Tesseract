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
	<i class="fa fa-info-circle"></i>&nbsp; <?php echo JText::_('COM_EASYBLOG_SETTINGS_AUTHOR_LISTINGS_LAYOUT_NOTE');?>
</div>

<div class="row">
	<div class="col-lg-6">
		<div class="panel">
			<?php echo $this->html('panel.heading', $fieldsets->author['author']->label, $fieldsets->author['author']->info); ?>

			<div class="panel-body">
				<?php echo $this->output('admin/settings/views/fields/renderer', array('fields' => $fieldsets->author['author']->fields, 'key' => 'blogger')); ?>
			</div>
		</div>

		<div class="panel">
			<?php echo $this->html('panel.heading', $fieldsets->author['theme']->label, $fieldsets->author['theme']->info); ?>

			<div class="panel-body">
				<?php echo $this->output('admin/settings/views/fields/renderer', array('fields' => $fieldsets->author['theme']->fields, 'key' => 'blogger')); ?>
			</div>
		</div>

		<div class="panel">
			<?php echo $this->html('panel.heading', $fieldsets->author['comments']->label, $fieldsets->author['comments']->info); ?>

			<div class="panel-body">
				<?php echo $this->output('admin/settings/views/fields/renderer', array('fields' => $fieldsets->author['comments']->fields, 'key' => 'blogger')); ?>
			</div>
		</div>

		<div class="panel">
			<?php echo $this->html('panel.heading', $fieldsets->author['grid']->label, $fieldsets->author['grid']->info); ?>

			<div class="panel-body">
				<?php echo $this->output('admin/settings/views/fields/renderer', array('fields' => $fieldsets->author['grid']->fields, 'key' => 'blogger')); ?>
			</div>
		</div>

	</div>

	<div class="col-lg-6">
		<div class="panel">
			<?php echo $this->html('panel.heading', $fieldsets->author['limit']->label, $fieldsets->author['limit']->info); ?>

			<div class="panel-body">
				<?php echo $this->output('admin/settings/views/fields/renderer', array('fields' => $fieldsets->author['limit']->fields, 'key' => 'blogger')); ?>
			</div>
		</div>

		<div class="panel">
			<?php echo $this->html('panel.heading', $fieldsets->author['post']->label, $fieldsets->author['post']->info); ?>

			<div class="panel-body">
				<?php echo $this->output('admin/settings/views/fields/renderer', array('fields' => $fieldsets->author['post']->fields, 'key' => 'blogger')); ?>
			</div>
		</div>
	</div>
</div>