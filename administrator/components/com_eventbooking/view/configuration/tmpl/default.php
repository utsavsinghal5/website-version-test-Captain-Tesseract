<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');
$document = JFactory::getDocument();
$document->addStyleDeclaration(".hasTip{display:block !important}");
$translatable = JLanguageMultilang::isEnabled() && count($this->languages);
$editor       = JEditor::getInstance(JFactory::getConfig()->get('editor'));
$config       = $this->config;
JHtml::_('formbehavior.chosen', 'select');

if (!EventbookingHelper::isJoomla4())
{
	JHtml::_('behavior.tabstate');
}

JHtml::_('jquery.framework');

if (EventbookingHelper::isJoomla4())
{
	JHtml::_('script', 'system/showon.js', ['version' => 'auto', 'relative' => true]);
}
else
{
	JHtml::_('script', 'jui/cms.js', ['version' => 'auto', 'relative' => true]);
}

/* @var EventbookingViewConfigurationHtml $this */
?>
<div class="row-fluid">
    <form action="index.php?option=com_eventbooking&view=configuration" method="post" name="adminForm" id="adminForm"
          class="form-horizontal eb-configuration">
		<?php
		echo JHtml::_('bootstrap.startTabSet', 'configuration', ['active' => 'general-page']);

		echo JHtml::_('bootstrap.addTab', 'configuration', 'general-page', JText::_('EB_GENERAL', true));
		echo $this->loadTemplate('general', ['config' => $config]);
		echo JHtml::_('bootstrap.endTab');

		echo JHtml::_('bootstrap.addTab', 'configuration', 'theme-page', JText::_('EB_THEMES', true));
		echo $this->loadTemplate('themes', ['config' => $config]);
		echo JHtml::_('bootstrap.endTab');

		echo JHtml::_('bootstrap.addTab', 'configuration', 'sef-setting-page', JText::_('EB_SEF_SETTING', true));
		echo $this->loadTemplate('sef', ['config' => $config]);
		echo JHtml::_('bootstrap.endTab');

		echo JHtml::_('bootstrap.addTab', 'configuration', 'invoice-page', JText::_('EB_INVOICE_SETTINGS', true));
		echo $this->loadTemplate('invoice', ['config' => $config, 'editor' => $editor]);
		echo JHtml::_('bootstrap.endTab');

		echo JHtml::_('bootstrap.addTab', 'configuration', 'tickets-page', JText::_('EB_TICKETS_SETTINGS', true));
		echo $this->loadTemplate('tickets', ['config' => $config, 'editor' => $editor]);
		echo JHtml::_('bootstrap.endTab');

		echo JHtml::_('bootstrap.addTab', 'configuration', 'certificate-page', JText::_('EB_CERTIFICATE_SETTINGS', true));
		echo $this->loadTemplate('certificate', ['config' => $config, 'editor' => $editor]);
		echo JHtml::_('bootstrap.endTab');

		echo JHtml::_('bootstrap.addTab', 'configuration', 'submit-event-fields-page', JText::_('EB_SUBMIT_EVENT_FIELDS', true));
		echo $this->loadTemplate('submit_event_fields', ['config' => $config]);
		echo JHtml::_('bootstrap.endTab');

		echo JHtml::_('bootstrap.addTab', 'configuration', 'export-settings-page', JText::_('EB_EXPORT_REGISTRANTS_SETTINGS', true));
		echo $this->loadTemplate('export_fields', ['config' => $config]);
		echo JHtml::_('bootstrap.endTab');

		if ($translatable)
		{
			echo $this->loadTemplate('translation', ['config' => $config, 'editor' => $editor]);
		}

		if ($config->event_custom_field)
		{
			echo $this->loadTemplate('event_fields');
		}

		echo JHtml::_('bootstrap.addTab', 'configuration', 'eu-tax-rules-page', JText::_('EB_EU_TAX_RULES_SETTINGS', true));
		echo $this->loadTemplate('eu_tax_rules', ['config' => $config]);
		echo JHtml::_('bootstrap.endTab');

		echo JHtml::_('bootstrap.addTab', 'configuration', 'PDF_SETTINGS', JText::_('EB_PDF_SETTINGS', true));
		echo $this->loadTemplate('pdf_settings');
		echo JHtml::_('bootstrap.endTab');

		echo $this->loadTemplate('custom_css');


		// Add support for custom settings layout
		if (file_exists(__DIR__ . '/default_custom_settings.php'))
		{
			echo JHtml::_('bootstrap.addTab', 'configuration', 'custom-settings-page', JText::_('EB_CUSTOM_SETTINGS', true));
			echo $this->loadTemplate('custom_settings', ['config' => $config, 'editor' => $editor]);
			echo JHtml::_('bootstrap.endTab');
		}

		echo JHtml::_('bootstrap.endTabSet');
		?>
        <div class="clearfix"></div>
        <input type="hidden" name="task" value=""/>
    </form>
</div>