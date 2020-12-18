<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

JHtml::_('behavior.core');
JHtml::_('jquery.framework');
JHtml::_('bootstrap.tooltip');
JHtml::_('formbehavior.chosen', 'select');

$document = JFactory::getDocument();
$document->addStyleDeclaration(".hasTip{display:block !important}")
	->addScript(JUri::root(true) . '/media/com_eventbooking/js/admin-speaker-default.min.js');

$translatable = JLanguageMultilang::isEnabled() && count($this->languages);

if ($translatable)
{
    JHtml::_('behavior.tabstate');
}

$bootstrapHelper = EventbookingHelperHtml::getAdminBootstrapHelper();
$rowFluid        = $bootstrapHelper->getClassMapping('row-fluid');
$span6           = $bootstrapHelper->getClassMapping('span6');

$languageKeys = [
    'EB_ENTER_SPEAKER_NAME',
];

EventbookingHelperHtml::addJSStrings($languageKeys);

$editor = JEditor::getInstance(JFactory::getConfig()->get('editor'));
?>
<form action="index.php?option=com_eventbooking&view=speaker" method="post" name="adminForm" id="adminForm" class="form form-horizontal">
    <div class="control-group">
        <div class="control-label">
            <?php echo JText::_('EB_EVENTS'); ?>
        </div>
        <div class="controls">
            <?php echo $this->lists['event_id'] ; ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
            <?php echo  JText::_('EB_NAME'); ?>
        </div>
        <div class="controls">
            <input type="text" name="name" id="name" size="50" maxlength="250" value="<?php echo $this->item->name;?>" />
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
            <?php echo  JText::_('EB_TITLE'); ?>
        </div>
        <div class="controls">
            <input type="text" name="title" id="title" size="50" maxlength="250" value="<?php echo $this->item->title;?>" />
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
            <?php echo JText::_('EB_AVATAR'); ?>
        </div>
        <div class="controls">
            <?php echo EventbookingHelperHtml::getMediaInput($this->item->avatar, 'avatar'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo  JText::_('EB_URL'); ?>
        </div>
        <div class="controls">
            <input class="text_area" type="url" name="url" id="url" size="50" maxlength="250" value="<?php echo $this->item->url;?>" />
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
            <?php echo  JText::_('EB_DESCRIPTION'); ?>
        </div>
        <div class="controls">
            <?php echo $editor->display( 'description',  $this->item->description , '100%', '250', '75', '10' ) ; ?>
        </div>
    </div>
    <input type="hidden" name="id" value="<?php echo (int) $this->item->id; ?>"/>
    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_( 'form.token' ); ?>
</form>