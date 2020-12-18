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
JHtml::_('formbehavior.chosen', 'select');

JFactory::getDocument()->addScript(JUri::root(true) . '/media/com_eventbooking/js/admin-coupon-default.min.js');

if (!empty($this->registrants) && !EventbookingHelper::isJoomla4())
{
	JHtml::_('behavior.tabstate');
}

EventbookingHelper::normalizeNullDateTimeData($this->item, ['valid_from', 'valid_to']);

$languageKeys = [
    'EB_ENTER_COUPON',
    'EN_ENTER_DISCOUNT_AMOUNT'
];

EventbookingHelperHtml::addJSStrings($languageKeys);
?>
<form action="index.php?option=com_eventbooking&view=coupon" method="post" name="adminForm" id="adminForm" class="form form-horizontal">
	<?php
	if (!empty($this->registrants))
	{
		echo JHtml::_('bootstrap.startTabSet', 'coupon', array('active' => 'coupon-page'));
		echo JHtml::_('bootstrap.addTab', 'coupon', 'coupon-page', JText::_('EB_BASIC_INFORMATION', true));
	}
	?>
	<div class="control-group">
		<div class="control-label">
			<?php echo JText::_('EB_CODE'); ?>
		</div>
		<div class="controls">
			<input class="text_area" type="text" name="code" id="code" size="15" maxlength="250"
			       value="<?php echo $this->item->code; ?>"/>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo JText::_('EB_DISCOUNT'); ?>
		</div>
		<div class="controls">
			<input class="input-small" type="number" name="discount" id="discount" size="10" maxlength="250"
			       value="<?php echo $this->item->discount; ?>"/>&nbsp;&nbsp;<?php echo $this->lists['coupon_type']; ?>
		</div>
	</div>
    <div class="control-group">
        <div class="control-label">
			<?php echo JText::_('EB_CATEGORIES'); ?>
        </div>
        <div class="controls">
            <?php echo $this->lists['category_id']; ?>
        </div>
    </div>
	<div class="control-group">
		<div class="control-label">
			<?php echo JText::_('EB_COUPON_ASSIGNMENT'); ?>
		</div>
		<div class="controls">
			<?php echo $this->lists['assignment'] ; ?>
		</div>
	</div>
	<div class="control-group" id="events_selection_container"<?php if ($this->assignment == 0) echo 'style="display:none;"'; ?>>
		<div class="control-label">
			<?php echo JText::_('EB_EVENT'); ?>
		</div>
		<div class="controls">
			<?php echo $this->lists['event_id']; ?>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo JText::_('EB_TIMES'); ?>
		</div>
		<div class="controls">
			<input class="input-small" type="number" name="times" id="times" size="5" maxlength="250"
			       value="<?php echo $this->item->times; ?>"/>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo JText::_('EB_TIME_USED'); ?>
		</div>
		<div class="controls">
			<?php echo $this->item->used; ?>
		</div>
	</div>
	<?php
		if ($this->item->coupon_type == 2)
		{
		?>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_USED_AMOUNT'); ?>
				</div>
				<div class="controls">
					<input class="input-small" type="number" name="used_amount" id="used_amount" size="5" maxlength="250"
			       value="<?php echo $this->item->used_amount; ?>" />					
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_REMAINING_AMOUNT'); ?>
				</div>
				<div class="controls">
					<?php echo round($this->item->discount - $this->item->used_amount, 2); ?>
				</div>
			</div>
		<?php
		}
	?>
    <div class="control-group">
        <div class="control-label">
			<?php echo JText::_('EB_MAX_USAGE_PER_USER'); ?>
        </div>
        <div class="controls">
            <input class="input-small" type="number" name="max_usage_per_user" id="max_usage_per_user" size="5" maxlength="250"
                   value="<?php echo $this->item->max_usage_per_user; ?>"/>
        </div>
    </div>
	<div class="control-group">
		<div class="control-label">
			<?php echo JText::_('EB_VALID_FROM_DATE'); ?>
		</div>
		<div class="controls">
			<?php echo JHtml::_('calendar', $this->item->valid_from, 'valid_from', 'valid_from', $this->datePickerFormat . ' %H:%M', ['showTime' => true]); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo JText::_('EB_VALID_TO_DATE'); ?>
		</div>
		<div class="controls">
			<?php echo JHtml::_('calendar', $this->item->valid_to, 'valid_to', 'valid_to', $this->datePickerFormat . ' %H:%M', ['showTime' => true]); ?>
		</div>
	</div>
	<?php
		if (!$this->config->multiple_booking)
		{
		?>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_APPLY_TO'); ?>
				</div>
				<div class="controls">
					<?php echo $this->lists['apply_to']; ?>
				</div>
			</div>

			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_ENABLE_FOR'); ?>
				</div>
				<div class="controls">
					<?php echo $this->lists['enable_for']; ?>
				</div>
			</div>
            <div class="control-group">
                <div class="control-label">
					<?php echo JText::_('EB_MIN_NUMBER_REGISTRANTS'); ?>
                </div>
                <div class="controls">
                    <input class="input-small" type="number" name="min_number_registrants" id="min_number_registrants" size="5" maxlength="250"
                           value="<?php echo $this->item->min_number_registrants; ?>"/>
                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
					<?php echo JText::_('EB_MAX_NUMBER_REGISTRANTS'); ?>
                </div>
                <div class="controls">
                    <input class="input-small" type="number" name="max_number_registrants" id="max_number_registrants" size="5" maxlength="250"
                           value="<?php echo $this->item->max_number_registrants; ?>"/>
                </div>
            </div>
		<?php
		}
	?>
	<div class="control-group">
		<div class="control-label">
			<?php echo  JText::_('EB_USER'); ?>
		</div>
		<div class="controls">
			<?php // Note, the third parameter of the method is hardcoded to prevent onchange event, do not remove it.?>
			<?php echo EventbookingHelper::getUserInput($this->item->user_id, 'user_id', 100); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo JText::_('EB_ACCESS'); ?>
		</div>
		<div class="controls">
			<?php echo $this->lists['access']; ?>
		</div>
	</div>
    <div class="control-group">
        <div class="control-label">
			<?php echo JText::_('EB_NOTE'); ?>
        </div>
        <div class="controls">
            <input class="input-xxlarge" type="text" name="note" id="note" maxlength="250"
                   value="<?php echo $this->item->note; ?>"/>
        </div>
    </div>
	<div class="control-group">
		<div class="control-label">
			<?php echo JText::_('EB_PUBLISHED'); ?>
		</div>
		<div class="controls">
			<?php echo $this->lists['published']; ?>
		</div>
	</div>
	<?php
	if (!empty($this->registrants))
	{
		echo JHtml::_('bootstrap.endTab');
		echo JHtml::_('bootstrap.addTab', 'coupon', 'registrants-page', JText::_('EB_COUPON_USAGE', true));
		echo $this->loadTemplate('registrants');
		echo JHtml::_('bootstrap.endTab');
		echo JHtml::_('bootstrap.endTabSet');
	}
	?>
	<div class="clearfix"></div>
	<?php echo JHtml::_('form.token'); ?>
    <input type="hidden" name="id" value="<?php echo (int) $this->item->id; ?>"/>
	<input type="hidden" name="task" value=""/>
	<?php
	if (!$this->item->used)
	{
	?>
		<input type="hidden" name="used" value="0"/>
	<?php
	}
	?>
</form>