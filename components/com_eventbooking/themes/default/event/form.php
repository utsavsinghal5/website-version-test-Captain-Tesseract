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
JHtml::_('bootstrap.tooltip');

if (!version_compare(JVERSION, '4.0.0-dev', '<'))
{
	JHtml::_('behavior.tabstate');
}

JHtml::_('behavior.modal');
JHtml::_('jquery.framework');

if (version_compare(JVERSION, '4.0.0-dev', '>='))
{
	JHtml::_('script', 'system/showon.js', array('version' => 'auto', 'relative' => true));
}
else
{
	JHtml::_('script', 'jui/cms.js', array('version' => 'auto', 'relative' => true));
}

$editor          = JEditor::getInstance(JFactory::getConfig()->get('editor', 'none'));
$bootstrapHelper = EventbookingHelperBootstrap::getInstance();
$rowFluidClass   = $bootstrapHelper->getClassMapping('row-fluid');
$btnPrimary      = $bootstrapHelper->getClassMapping('btn btn-primary');
$formHorizontal  = $bootstrapHelper->getClassMapping('form form-horizontal');

EventbookingHelperHtml::addOverridableScript('media/com_eventbooking/js/site-event-form.min.js');

JFactory::getDocument()->addScriptOptions('activateRecurringEvent', (bool) $this->config->activate_recurring_event);

$languageItems = [
    'EB_PLEASE_ENTER_TITLE',
    'EB_ENTER_EVENT_DATE',
    'EB_CHOOSE_CATEGORY',
    'EB_ENTER_RECURRING_INTERVAL',
    'EB_CHOOSE_ONE_DAY',
    'EB_ENTER_DAY_IN_MONTH',
    'EB_ENTER_RECURRING_ENDING_SETTINGS',
    'EB_NO_ROW_TO_DELETE',
];

EventbookingHelperHtml::addJSStrings($languageItems);

$showRecurringSettingsTab      = $this->config->activate_recurring_event && (!$this->item->id || $this->item->event_type == 1);
$showGroupRegistrationRatesTab = $this->config->get('fes_show_group_registration_rates_tab', 1);
$showMiscTab                   = $this->config->get('fes_show_misc_tab', 1);
$showDiscountSettingTab        = $this->config->get('fes_show_discount_setting_tab', 1);
$showExtraInformationTab       = $this->config->get('fes_show_extra_information_tab', 1) && $this->config->event_custom_field;

$hasTab = $showGroupRegistrationRatesTab || $showMiscTab
    || $showDiscountSettingTab || $showExtraInformationTab
    || $showRecurringSettingsTab
    || $this->isMultilingual || count($this->plugins);
?>
<h1 class="eb-page-heading"><?php echo $this->escape(JText::_('EB_ADD_EDIT_EVENT')); ?></h1>
<div id="eb-add-edit-event-page" class="eb-container">
    <div class="btn-toolbar" id="btn-toolbar">
		<?php echo JToolbar::getInstance('toolbar')->render('toolbar'); ?>
    </div>
    <form action="<?php echo JRoute::_('index.php?option=com_eventbooking&view=events&Itemid='.$this->Itemid); ?>" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data" class="<?php echo $formHorizontal; ?>">
    <div class="<?php echo $rowFluidClass; ?> eb-container">
        <?php
            if ($hasTab)
            {
	            echo JHtml::_('bootstrap.startTabSet', 'event', array('active' => 'basic-information-page'));
	            echo JHtml::_('bootstrap.addTab', 'event', 'basic-information-page', JText::_('EB_BASIC_INFORMATION', true));
            }

            echo $this->loadTemplate('general', array('editor' => $editor));

            if ($hasTab)
            {
	            echo JHtml::_('bootstrap.endTab');
            }

            if ($showRecurringSettingsTab)
            {
                echo JHtml::_('bootstrap.addTab', 'event', 'recurring-settings-page', JText::_('EB_RECURRING_SETTINGS', true));
                echo $this->loadTemplate('recurring_settings');
                echo JHtml::_('bootstrap.endTab');
            }

            if ($showGroupRegistrationRatesTab)
            {
	            echo JHtml::_('bootstrap.addTab', 'event', 'group-registration-rates-page', JText::_('EB_GROUP_REGISTRATION_RATES', true));
	            echo $this->loadTemplate('group_rates');
	            echo JHtml::_('bootstrap.endTab');
            }

            if ($showMiscTab)
            {
	            echo JHtml::_('bootstrap.addTab', 'event', 'misc-page', JText::_('EB_MISC', true));
	            echo $this->loadTemplate('misc');
	            echo JHtml::_('bootstrap.endTab');
            }

            if ($showDiscountSettingTab)
            {
	            echo JHtml::_('bootstrap.addTab', 'event', 'discount-page', JText::_('EB_DISCOUNT_SETTING', true));
	            echo $this->loadTemplate('discount_settings');
	            echo JHtml::_('bootstrap.endTab');
            }

            if ($showExtraInformationTab)
            {
                echo JHtml::_('bootstrap.addTab', 'event', 'fields-page', JText::_('EB_EXTRA_INFORMATION', true));
                echo $this->loadTemplate('fields');
                echo JHtml::_('bootstrap.endTab');
            }

            if ($this->isMultilingual)
            {
                echo $this->loadTemplate('translation', ['editor' => $editor]);
            }

            if (count($this->plugins))
            {
                $count = 0;

                foreach ($this->plugins as $plugin)
                {
                    $count++;
                    echo JHtml::_('bootstrap.addTab', 'event', 'tab_' . $count, JText::_($plugin['title'], true));
                    echo $plugin['form'];
                    echo JHtml::_('bootstrap.endTab');
                }
            }

            if ($hasTab)
            {
	            echo JHtml::_('bootstrap.endTabSet');
            }
        ?>
    </div>
        <input type="hidden" name="id" value="<?php echo (int) $this->item->id; ?>"/>
        <input type="hidden" name="task" value="" />
        <input type="hidden" name="return" value="<?php echo $this->return; ?>" />
        <input type="hidden" name="activate_tickets_pdf" value="<?php echo $this->item->activate_tickets_pdf; ?>"/>
        <input type="hidden" name="send_tickets_via_email" value="<?php echo $this->item->send_tickets_via_email; ?>"/>
        <input type="hidden" name="form_layout" value="form" />
        <?php echo JHtml::_( 'form.token' ); ?>
    </form>
</div>