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
<div class="eb-box">
	<?php echo $this->html('dashboard.miniHeading', 'COM_EASYBLOG_INTEGRATIONS_LINKEDIN', 'fa fa-linkedin-square'); ?>

	<div class="eb-box-body">
		<div class="form-horizontal">
			<div class="form-group">
				<?php echo $this->html('dashboard.label', 'COM_EASYBLOG_OAUTH_ALLOW_ACCESS'); ?>

				<div class="col-md-7">
					<?php if ($linkedin->id && $linkedin->access_token) {?>
					<a href="<?php echo EBR::_('index.php?option=com_easyblog&task=oauth.revoke&client=' . EBLOG_OAUTH_LINKEDIN);?>" class="btn btn-default btn-sm">
						<i class="fa fa-close"></i>&nbsp; <?php echo JText::_('COM_EASYBLOG_OAUTH_REVOKE_ACCESS'); ?>
					</a>
					<?php } else { ?>
					<label><?php echo JText::_('COM_EASYBLOG_INTEGRATIONS_LINKEDIN_ACCESS_DESC');?></label>
					<a href="javascript:void(0);" data-oauth-signup data-client="linkedin">
						<img src="<?php echo JURI::root();?>components/com_easyblog/assets/images/linkedin_signon.png" border="0" alt="here" />
					</a>
					<?php } ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $this->html('dashboard.label', 'COM_EASYBLOG_OAUTH_ENABLED_BY_DEFAULT'); ?>

				<div class="col-md-8">
					<?php echo $this->html('form.toggler', 'integrations_linkedin_auto', $linkedin->auto); ?>
				</div>
			</div>

			<div class="form-group">
				<?php echo $this->html('dashboard.label', 'COM_EASYBLOG_INTEGRATIONS_LINKEDIN_PROTECTED_MODE'); ?>

				<div class="col-md-8">
					<?php echo $this->html('form.toggler', 'integrations_linkedin_private', $linkedin->private); ?>

					<div class="small">
						<?php echo JText::_('COM_EASYBLOG_INTEGRATIONS_LINKEDIN_PROTECTED_MODE_DESC');?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>