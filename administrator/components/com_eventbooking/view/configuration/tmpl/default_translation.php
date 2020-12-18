<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */
defined( '_JEXEC' ) or die ;

echo JHtml::_('bootstrap.addTab', 'configuration', 'invoice-translation', JText::_('EB_INVOICE_TRANSLATION', true));
echo JHtml::_('bootstrap.startTabSet', 'invoice-translation', array('active' => 'invoice-translation-'.$this->languages[0]->sef));

foreach ($this->languages as $language)
{
	$sef = $language->sef;
	echo JHtml::_('bootstrap.addTab', 'invoice-translation', 'invoice-translation-' . $sef, $language->title . ' <img src="' . JUri::root() . 'media/com_eventbooking/flags/' . $sef . '.png" />');
	?>
	<div class="control-group">
		<div class="control-label">
			<?php echo EventbookingHelperHtml::getFieldLabel('invoice_format', JText::_('EB_INVOICE_FORMAT'), JText::_('EB_INVOICE_FORMAT_EXPLAIN')); ?>
		</div>
		<div class="controls">
			<?php echo $editor->display('invoice_format_' . $sef, $config->{'invoice_format_' . $sef}, '100%', '550', '75', '8');?>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo EventbookingHelperHtml::getFieldLabel('invoice_format_cart', JText::_('EB_INVOICE_FORMAT_CART'), JText::_('EB_INVOICE_FORMAT_CART_EXPLAIN')); ?>
		</div>
		<div class="controls">
			<?php echo $editor->display('invoice_format_cart_' . $sef, $config->{'invoice_format_cart_' . $sef}, '100%', '550', '75', '8');?>
		</div>
	</div>
    <div class="control-group">
        <div class="control-label">
	        <?php echo EventbookingHelperHtml::getFieldLabel('default_ticket_layout_' . $sef, JText::_('EB_DEFAULT_TICKET_LAYOUT'), JText::_('EB_DEFAULT_TICKET_LAYOUT_EXPLAIN')); ?>
        </div>
        <div class="controls">
	        <?php echo $editor->display('default_ticket_layout_' . $sef, $config->{'default_ticket_layout_' . $sef}, '100%', '550', '75', '8'); ?>
        </div>
    </div>
	<?php
	echo JHtml::_('bootstrap.endTab');
}

echo JHtml::_('bootstrap.endTabSet');
echo JHtml::_('bootstrap.endTab');