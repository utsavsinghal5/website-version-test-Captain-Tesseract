<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */
?>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('admin_email_subject', JText::_('EB_ADMIN_EMAIL_SUBJECT')); ?>
		<p class="eb-available-tags">
			<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong>[EVENT_TITLE]</strong>
		</p>
	</div>
	<div class="controls">
		<input type="text" name="admin_email_subject" class="input-xlarge" value="<?php echo $this->message->admin_email_subject; ?>" size="80" />
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('admin_email_body', JText::_('EB_ADMIN_EMAIL_BODY')); ?>
		<p class="eb-available-tags">
			<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong><?php echo $fields; ?></strong>
		</p>
	</div>
	<div class="controls">
		<?php echo $editor->display( 'admin_email_body',  $this->message->admin_email_body , '100%', '250', '75', '8' ) ;?>
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('user_email_subject', JText::_('EB_USER_EMAIL_SUBJECT')); ?>
		<p class="eb-available-tags">
			<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong>[EVENT_TITLE]</strong>
		</p>
	</div>
	<div class="controls">
		<input type="text" name="user_email_subject" class="input-xlarge" value="<?php echo $this->message->user_email_subject; ?>" size="50" />
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('user_email_body', JText::_('EB_USER_EMAIL_BODY')); ?>
		<p class="eb-available-tags">
			<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong><?php echo $fields; ?></strong>
		</p>
	</div>
	<div class="controls">
		<?php echo $editor->display( 'user_email_body',  $this->message->user_email_body , '100%', '250', '75', '8' ) ;?>
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('user_email_body_offline', JText::_('EB_USER_EMAIL_BODY_OFFLINE')); ?>
		<p class="eb-available-tags">
			<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong><?php echo $fields; ?></strong>
		</p>
	</div>
	<div class="controls">
		<?php echo $editor->display( 'user_email_body_offline',  $this->message->user_email_body_offline , '100%', '250', '75', '8' ) ;?>
	</div>
</div>
<?php
foreach ($this->extraOfflinePlugins as $offlinePaymentPlugin)
{
	$name   = $offlinePaymentPlugin->name;
	$title  = $offlinePaymentPlugin->title;
	$prefix = str_replace('os_offline', '', $name);
	?>
    <div class="control-group">
        <div class="control-label">
			<?php echo JText::_('User email body (' . $title . ')'); ?>
            <p class="eb-available-tags">
				<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong><?php echo $fields; ?></strong>
            </p>
        </div>
        <div class="controls">
			<?php echo $editor->display('user_email_body_offline' . $prefix, $this->message->{'user_email_body_offline' . $prefix}, '100%', '250', '75', '8'); ?>
        </div>
    </div>
	<?php
}
?>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('group_member_email_subject', JText::_('EB_GROUP_MEMBER_EMAIL_SUBJECT')); ?>
		<p class="eb-available-tags">
			<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong>[EVENT_TITLE]</strong>
		</p>
	</div>
	<div class="controls">
		<input type="text" name="group_member_email_subject" class="input-xlarge" value="<?php echo $this->message->group_member_email_subject; ?>" size="50" />
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('group_member_email_body', JText::_('EB_GROUP_MEMBER_EMAIL_BODY')); ?>
		<p class="eb-available-tags">
			<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong>[MEMBER_DETAIL], <?php echo EventbookingHelperHtml::getAvailableMessagesTags(false); ?></strong>
		</p>
	</div>
	<div class="controls">
		<?php echo $editor->display( 'group_member_email_body',  $this->message->group_member_email_body , '100%', '250', '75', '8' ) ;?>
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('registration_approved_email_subject', JText::_('EB_REGISTRATION_APPROVED_EMAIL_SUBJECT')); ?>
		<p class="eb-available-tags">
			<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong>[EVENT_TITLE]</strong>
		</p>
	</div>
	<div class="controls">
		<input type="text" name="registration_approved_email_subject" class="input-xlarge" value="<?php echo $this->message->registration_approved_email_subject; ?>" size="50" />
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('registration_approved_email_body', JText::_('EB_REGISTRATION_APPROVED_EMAIL_BODY')); ?>
		<p class="eb-available-tags">
			<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong><?php echo $fields; ?></strong>
		</p>
	</div>
	<div class="controls">
		<?php echo $editor->display( 'registration_approved_email_body',  $this->message->registration_approved_email_body , '100%', '250', '75', '8' ) ;?>
	</div>
</div>
<div class="control-group">
    <div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('certificate_email_subject', JText::_('EB_CERTIFICATE_EMAIL_SUBJECT')); ?>
        <p class="eb-available-tags">
			<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong>[EVENT_TITLE]</strong>
        </p>
    </div>
    <div class="controls">
        <input type="text" name="certificate_email_subject" class="input-xlarge" value="<?php echo $this->message->certificate_email_subject; ?>" size="80" />
    </div>
</div>
<div class="control-group">
    <div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('certificate_email_body', JText::_('EB_CERTIFICATE_EMAIL_BODY'), JText::_('EB_CERTIFICATE_EMAIL_BODY_EXPLAIN')); ?>
        <p class="eb-available-tags">
			<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong><?php echo $fields; ?></strong>
        </p>
    </div>
    <div class="controls">
		<?php echo $editor->display( 'certificate_email_body',  $this->message->certificate_email_body , '100%', '250', '75', '8' ) ;?>
    </div>
</div>
