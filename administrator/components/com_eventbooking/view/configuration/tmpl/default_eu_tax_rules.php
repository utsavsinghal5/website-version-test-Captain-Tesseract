<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

/* @var EventbookingViewConfigurationHtml $this */
?>
<div class="control-group">
    <div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('activate_eu_tax_rules', JText::_('EB_ACTIVATE_EU_TAX_RULES'), JText::_('EB_ACTIVATE_EU_TAX_RULES_EXPLAIN')); ?>
    </div>
    <div class="controls">
		<?php echo EventbookingHelperHtml::getBooleanInput('activate_eu_tax_rules', $config->get('activate_eu_tax_rules')); ?>
    </div>
</div>
<div class="control-group">
    <div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('eu_vat_number_field', JText::_('EB_VAT_NUMBER_FIELD'), JText::_('EB_VAT_NUMBER_FIELD_EXPLAIN')); ?>
    </div>
    <div class="controls">
		<?php echo $this->lists['eu_vat_number_field']; ?>
    </div>
</div>