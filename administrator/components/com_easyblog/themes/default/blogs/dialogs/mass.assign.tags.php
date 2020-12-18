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
<dialog>
	<width>450</width>
	<height>200</height>
	<selectors type="json">
	{
		"{form}" : "[data-assignTags-form]",
		"{suggest}" : "[data-assignTags-suggest]",
		"{submitButton}": "[data-submit-button]",
		"{cancelButton}": "[data-cancel-button]"
	}
	</selectors>
	<bindings type="javascript">
	{
		init: function() {
			this.suggest().implement(EasyBlog.Controller.Tag.Suggest, {
			});
		},

		"{cancelButton} click": function() {
			this.parent.close();
		}
	}
	</bindings>
	<title><?php echo JText::_('COM_EB_MASS_ASSIGN_TAGS');?></title>
	<content>
		<form action="<?php echo JRoute::_('index.php');?>" method="post" data-assignTags-form>
			<p class="mt-10 mb-20 ml-10 mr-10">
				<?php echo JText::_('COM_EB_MASS_ASSIGN_TAGS_DESC'); ?>
			</p>

			<div class="textboxlist controls disabled" data-assignTags-suggest>
				<input type="text" autocomplete="off" disabled class="participants textboxlist-textField" data-textboxlist-textField placeholder="<?php echo JText::_('COM_EB_MASS_ASSIGN_TAGS_PLACEHOLDER');?>" />
			</div>

			<?php echo $this->html('form.action', 'blogs.massAssignTags'); ?>
		</form>
	</content>
	<buttons>
		<button data-cancel-button type="button" class="btn btn-default btn-sm"><?php echo JText::_('COM_EASYBLOG_CANCEL_BUTTON'); ?></button>
		<button data-submit-button type="button" class="btn btn-primary btn-sm"><?php echo JText::_('COM_EASYBLOG_SUBMIT_BUTTON'); ?></button>
	</buttons>
</dialog>
