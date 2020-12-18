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
		<?php echo EventbookingHelperHtml::getFieldLabel('pdf_font', JText::_('EB_PDF_FONT'), JText::_('EB_PDF_FONT_EXPLAIN')); ?>
        <p class="text-warning">
			<?php echo JText::_('EB_PDF_FONT_WARNING'); ?>
        </p>
    </div>
    <div class="controls">
		<?php echo $this->lists['pdf_font']; ?>
    </div>
</div>
<div class="control-group">
    <div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('pdf_margin_left', JText::_('EB_MARGIN_LEFT')); ?>
    </div>
    <div class="controls">
		<input type="number" name="pdf_margin_left" step="1" value="<?php echo $this->config->get('pdf_margin_left', 15); ?>">
    </div>
</div>
<div class="control-group">
    <div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('pdf_margin_right', JText::_('EB_MARGIN_RIGHT')); ?>
    </div>
    <div class="controls">
        <input type="number" name="pdf_margin_right" step="1" value="<?php echo $this->config->get('pdf_margin_right', 15); ?>">
    </div>
</div>
<div class="control-group">
    <div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('pdf_margin_top', JText::_('EB_MARGIN_TOP')); ?>
    </div>
    <div class="controls">
        <input type="number" name="pdf_margin_top" step="1" value="<?php echo $this->config->get('pdf_margin_top', 0); ?>">
    </div>
</div>
<div class="control-group">
    <div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('pdf_margin_bottom', JText::_('EB_MARGIN_BOTTOM')); ?>
    </div>
    <div class="controls">
        <input type="number" name="pdf_margin_bottom" step="1" value="<?php echo $this->config->get('pdf_margin_bottom', 25); ?>">
    </div>
</div>
