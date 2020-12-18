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
<dialog>
	<width>400</width>
	<height>150</height>
	<selectors type="json">
	{
		"{submitButton}": "[data-submit-button]",
		"{cancelButton}": "[data-cancel-button]",
		"{form}": "[data-import-form]"
	}
	</selectors>
	<bindings type="javascript">
	{
		"{cancelButton} click": function() {
			this.parent.close();
		},

		"{submitButton} click": function() {
			
			this.form().submit();
		}
	}
	</bindings>
	<title><?php echo JText::_('COM_EB_POST_TEMPLATES_IMPORT_DIALOG_TITLE'); ?></title>
	<content>
		<p class="mt-10 mb-20 ml-10 mr-10"><?php echo JText::_('COM_EB_POST_TEMPLATES_IMPORT_DIALOG_DESCRIPTION'); ?></p>

		<div class="ml-10 mr-10">
			<form data-import-form action="<?php echo JRoute::_('index.php');?>" method="post" enctype="multipart/form-data">
				<input type="file" class="input" name="file" data-import-templates-value>
				<?php echo $this->html('form.action', 'blogs.importPostTemplates'); ?>
			</form>
		</div>
	</content>
	<buttons>
		<button data-cancel-button type="button" class="btn btn-default btn-sm"><?php echo JText::_('COM_EASYBLOG_CANCEL_BUTTON'); ?></button>
		<button data-submit-button type="button" class="btn btn-primary btn-sm"><?php echo JText::_('COM_EASYBLOG_IMPORT_BUTTON'); ?></button>
	</buttons>
</dialog>