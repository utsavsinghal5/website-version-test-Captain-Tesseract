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
		<?php echo EventbookingHelperHtml::getFieldLabel('invitation_form_message', JText::_('EB_INVITATION_FORM_MESSAGE'), JText::_('EB_INVITATION_FORM_MESSAGE_EXPLAIN')); ?>
	</div>
	<div class="controls">
		<?php echo $editor->display( 'invitation_form_message',  $this->message->invitation_form_message, '100%', '250', '75', '8' ) ;?>
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('invitation_complete', JText::_('EB_INVITATION_COMPLETE_MESSAGE'), JText::_('EB_INVITATION_COMPLETE_MESSAGE_EXPLAIN')); ?>
	</div>
	<div class="controls">
		<?php echo $editor->display( 'invitation_complete',  $this->message->invitation_complete , '100%', '250', '75', '8' ) ;?>
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('invitation_email_subject', JText::_('EB_INVITATION_EMAIL_SUBJECT')); ?>
		<p class="eb-available-tags">
			<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong>[EVENT_TITLE]</strong>
		</p>
	</div>
	<div class="controls">
		<input type="text" name="invitation_email_subject" class="input-xlarge" value="<?php echo $this->message->invitation_email_subject; ?>" size="50" />
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('invitation_email_body', JText::_('EB_INVITATION_EMAIL_BODY')); ?>
		<p class="eb-available-tags">
			<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong>[SENDER_NAME],[NAME], [EVENT_TITLE], [INVITATION_NAME], [EVENT_DETAIL_LINK], [PERSONAL_MESSAGE]</strong>
		</p>
	</div>
	<div class="controls">
		<?php echo $editor->display( 'invitation_email_body',  $this->message->invitation_email_body , '100%', '250', '75', '8' ) ;?>
	</div>
</div>
