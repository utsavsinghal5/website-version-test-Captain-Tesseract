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
<?php echo $this->html('dashboard.heading', 'COM_EASYBLOG_QUICKPOST_HEADING', 'fa fa-bolt'); ?>

<div class="eb-quick-post" data-eb-quickpost>
	<div class="alert hide" data-quickpost-alert></div>

	<ul class="eb-quick-tabs reset-list">
		<li class="<?php echo $active == 'standard' ? 'active' : ''; ?>">
			<a href="#standard" data-bp-toggle="tab" data-quickpost-tab="standard">
				<i class="fa fa-pencil"></i> <?php echo JText::_('COM_EASYBLOG_DASHBOARD_TOOLBAR_QUICK_POST_STANDARD'); ?>
			</a>
		</li>
		<li class="<?php echo $active=='photo' ? 'active' : ''; ?>">
			<a href="#photo" data-bp-toggle="tab" data-quickpost-tab="photo">
				<i class="fa fa-camera"></i> <?php echo JText::_('COM_EASYBLOG_DASHBOARD_TOOLBAR_QUICK_POST_PHOTO'); ?>
			</a>
		</li>
		<li clas="<?php echo $active == 'video' ? 'active' : ''; ?>">
			<a href="#video" data-bp-toggle="tab" data-quickpost-tab="video">
				<i class="fa fa-video-camera"></i> <?php echo JText::_('COM_EASYBLOG_DASHBOARD_TOOLBAR_QUICK_POST_VIDEO'); ?>
			</a>
		</li>
		<li class="<?php echo $active == 'quote' ? 'active' : ''; ?>">
			<a href="#quote" data-bp-toggle="tab" data-quickpost-tab="quote">
				<i class="fa fa-quote-left"></i> <?php echo JText::_('COM_EASYBLOG_DASHBOARD_TOOLBAR_QUICK_POST_QUOTE'); ?>
			</a>
		</li>
		<li class="<?php echo $active=='link' ? 'active' : ''; ?>">
			<a href="#link" data-bp-toggle="tab" data-quickpost-tab="link">
				<i class="fa fa-link"></i><?php echo JText::_('COM_EASYBLOG_DASHBOARD_TOOLBAR_QUICK_POST_LINK'); ?>
			</a>
		</li>
	</ul>

	<div class="eb-quick-content tab-content">
		<?php echo $this->output('site/dashboard/quickpost/forms/standard'); ?>

		<?php echo $this->output('site/dashboard/quickpost/forms/photo'); ?>

		<?php echo $this->output('site/dashboard/quickpost/forms/video'); ?>

		<?php echo $this->output('site/dashboard/quickpost/forms/quote'); ?>

		<?php echo $this->output('site/dashboard/quickpost/forms/link'); ?>
	</div>
</div>
<div class="hide" data-tag-template>
	<div class="textboxlist-item[%== (this.locked) ? ' is-locked' : '' %]" data-textboxlist-item>
		<span class="textboxlist-itemContent" data-textboxlist-itemContent>[%== html %]</span>
		[% if (!this.locked) { %]
		<div class="textboxlist-itemRemoveButton" data-textboxlist-itemRemoveButton>
			<i class="fa fa-close"></i>
		</div>
		[% } else { %]
			<i class="fa fa-lock"></i>
		[% } %]
	</div>
</div>
