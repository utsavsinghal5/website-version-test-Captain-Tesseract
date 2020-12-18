<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined( '_JEXEC' ) or die ;

EventbookingHelperJquery::validateForm();

$headerText = JText::_('EB_REMAINDER_PAYMENT');

if (strlen(strip_tags($this->message->{'deposit_payment_form_message' . $this->fieldSuffix})))
{
	$msg = $this->message->{'deposit_payment_form_message' . $this->fieldSuffix};
}
else
{

	$msg = $this->message->deposit_payment_form_message;
}

$msg = str_replace('[AMOUNT]', EventbookingHelper::formatCurrency($this->rowRegistrant->amount - $this->rowRegistrant->deposit_amount, $this->config, $this->event->currency_symbol), $msg);
$msg = str_replace('[REGISTRATION_ID]', $this->rowRegistrant->id, $msg);

$replaces = EventbookingHelperRegistration::buildEventTags($this->event, $this->config);

foreach ($replaces as $key => $value)
{
	$key        = strtoupper($key);
	$msg        = str_replace("[$key]", $value, $msg);
	$headerText = str_replace("[$key]", $value, $headerText);
}

if ($this->config->use_https)
{
	$url = JRoute::_('index.php?option=com_eventbooking&task=payment.process&Itemid='.$this->Itemid, false, 1);
}
else
{
	$url = JRoute::_('index.php?option=com_eventbooking&task=payment.process&Itemid='.$this->Itemid, false);
}

$selectedState = '';

/* @var EventbookingHelperBootstrap $bootstrapHelper */
$bootstrapHelper   = $this->bootstrapHelper;
$controlGroupClass = $bootstrapHelper->getClassMapping('control-group');
$controlLabelClass = $bootstrapHelper->getClassMapping('control-label');
$controlsClass     = $bootstrapHelper->getClassMapping('controls');
$btnPrimary        = $bootstrapHelper->getClassMapping('btn btn-primary');

/* @var EventbookingViewRegisterHtml $this */
?>
<div id="eb-deposit-payment-page" class="eb-container">
	<h1 class="eb-page-heading"><?php echo $this->escape($headerText); ?></h1>
	<form method="post" name="adminForm" id="adminForm" action="<?php echo $url; ?>" autocomplete="off" class="form form-horizontal" enctype="multipart/form-data">
	<?php
	if (strlen($msg))
	{
	?>
		<div class="eb-message"><?php echo $msg; ?></div>
	<?php
	}

	$fields = $this->form->getFields();

	if (isset($fields['state']))
	{
		$selectedState = $fields['state']->value;
	}

	// Billing form fields
	foreach ($fields as $field)
	{
		echo $field->getControlGroup($bootstrapHelper);
	}

	// Payment amount
	echo $this->loadCommonLayout('payment/payment_amounts.php');

	// Payment methods
	echo $this->loadCommonLayout('payment/payment_methods.php');

	if ($this->showCaptcha)
	{
		if ($this->captchaPlugin == 'recaptcha_invisible')
		{
			$style = ' style="display:none;"';
		}
		else
		{
			$style = '';
		}
	?>
		<div class="<?php echo $controlGroupClass;  ?>"<?php echo $style; ?>>
			<label class="<?php echo $controlLabelClass; ?>">
				<?php echo JText::_('EB_CAPTCHA'); ?><span class="required">*</span>
			</label>
			<div class="<?php echo $controlsClass; ?>">
				<?php echo $this->captcha; ?>
			</div>
		</div>
	<?php
	}
	?>
	<div class="form-actions">
		<input type="button" class="<?php echo $btnPrimary; ?>" name="btnBack" value="<?php echo  JText::_('EB_BACK') ;?>" onclick="window.history.go(-1);" />
		<input type="submit" class="<?php echo $btnPrimary; ?>" name="btn-submit" id="btn-submit" value="<?php echo JText::_('EB_PROCESS_PAYMENT');?>" />
		<img id="ajax-loading-animation" src="<?php echo JUri::base(true);?>/media/com_eventbooking/ajax-loadding-animation.gif" style="display: none;"/>
	</div>
	<?php
		if (count($this->methods) == 1)
		{
		?>
			<input type="hidden" name="payment_method" value="<?php echo $this->methods[0]->getName(); ?>" />
		<?php
		}

		echo JHtml::_( 'form.token' );
	?>
		<input type="hidden" name="registrant_id" id="registrant_id" value="<?php echo $this->rowRegistrant->id ; ?>" />
		<input type="hidden" name="show_payment_fee" value="<?php echo (int) $this->showPaymentFee; ?>" />
        <input type="hidden" id="card-nonce" name="nonce" />
		<?php echo $this->loadCommonLayout('payment/payment_javascript.php', ['selectedState' => $selectedState]); ?>
	</form>
</div>