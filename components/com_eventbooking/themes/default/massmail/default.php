<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined( '_JEXEC' ) or die;

JLoader::register('JToolbarHelper', JPATH_ADMINISTRATOR . '/includes/toolbar.php');
JToolbarHelper::custom('send', 'envelope', 'envelope', 'EB_SEND_MAILS', false);

JHtml::_('behavior.core');


$editor  = JEditor::getInstance(JFactory::getConfig()->get('editor', 'none'));
$message = EventbookingHelper::getMessages();

$languageItems = [
    'EB_CHOOSE_EVENT',
    'EB_ENTER_MASSMAIL_SUBJECT'
];

EventbookingHelperHtml::addOverridableScript('media/com_eventbooking/js/site-massmail-default.min.js');

EventbookingHelperHtml::addJSStrings($languageItems);
?>
<h1 class="eb-page-heading"><?php echo $this->escape(JText::_('EB_MASS_MAIL')); ?></h1>
<form action="<?php echo JRoute::_('index.php?option=com_eventbooking&view=massmail&Itemid='.$this->Itemid); ?>" method="post" name="adminForm" id="adminForm" class="form form-horizontal" enctype="multipart/form-data">
	<div class="btn-toolbar" id="btn-toolbar">
		<?php echo JToolbar::getInstance('toolbar')->render('toolbar'); ?>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo JText::_('EB_EVENT'); ?>
		</div>
		<div class="controls">
			<?php echo $this->lists['event_id'] ; ?>
		</div>
	</div>
    <div class="control-group">
        <div class="control-label">
			<?php echo JText::_('EB_REGISTRANT_STATUS'); ?>
        </div>
        <div class="controls">
			<?php echo $this->lists['published'] ; ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo JText::_('EB_SEND_TO_GROUP_BILLING'); ?>
        </div>
        <div class="controls">
			<?php echo $this->lists['send_to_group_billing']; ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo JText::_('EB_SEND_TO_GROUP_MEMBERS'); ?>
        </div>
        <div class="controls">
	        <?php echo $this->lists['send_to_group_members']; ?>
        </div>
    </div>
	<?php
	if ($this->config->activate_checkin_registrants)
	{
	?>
        <div class="control-group">
            <div class="control-label">
				<?php echo JText::_('EB_ONLY_SEND_TO_CHECKED_IN_REGISTRANTS'); ?>
            </div>
            <div class="controls">
				<?php echo $this->lists['only_send_to_checked_in_registrants']; ?>
            </div>
        </div>
	<?php
	}
	?>
    <div class="control-group">
        <div class="control-label">
			<?php echo JText::_('EB_ATTACHMENT'); ?>
        </div>
        <div class="controls">
            <input type="file" name="attachment" value="" size="70" class="input-xxlarge" />
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo JText::_('EB_BCC_EMAIL'); ?>
        </div>
        <div class="controls">
            <input type="text" name="bcc_email" value="" size="70" class="input-xlarge" />
        </div>
    </div>
	<div class="control-group">
		<div class="control-label">
			<?php echo JText::_('EB_EMAIL_SUBJECT'); ?>
		</div>
		<div class="controls">
			<input type="text" name="subject" value="" size="70" class="input-xlarge" />
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo JText::_('EB_EMAIL_MESSAGE'); ?>
			<p class="eb-available-tags">
				<?php echo JText::_('EB_AVAILABLE_TAGS'); ?>: <strong>[FIRST_NAME], [LAST_NAME], [EVENT_TITLE], [EVENT_DATE], [SHORT_DESCRIPTION], [DESCRIPTION], [LOCATION_NAME], [LOCATION_NAME_ADDRESS], [REGISTRATION_DETAIL]</strong>
			</p>
		</div>
		<div class="controls">
			<?php echo $editor->display( 'description',  $message->mass_mail_template , '100%', '250', '75', '10' ) ; ?>
		</div>
	</div>
	<div class="clearfix"></div>
	<?php echo JHtml::_( 'form.token' ); ?>
	<input type="hidden" name="task" value="" />
</form>