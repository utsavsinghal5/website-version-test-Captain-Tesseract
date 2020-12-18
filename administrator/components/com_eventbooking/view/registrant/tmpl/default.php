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
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('bootstrap.tooltip');
$document = JFactory::getDocument();
$document->addStyleDeclaration(".hasTip{display:block !important}");

// Little command to allow viewing subscription data easier without having to edit code during support
if ($this->input->getInt('debug'))
{
	print_r($this->item);
}

$selectedState = '';

// Add support for custom settings layout
if (file_exists(__DIR__ . '/default_custom_settings.php'))
{
	$hasCustomSettings = true;

	if (!EventbookingHelper::isJoomla4())
	{
		JHtml::_('behavior.tabstate');
	}
}
else
{
	$hasCustomSettings = false;
}

$bootstrapHelper = EventbookingHelperHtml::getAdminBootstrapHelper();
$rowFluidClass   = $bootstrapHelper->getClassMapping('row-fluid');
$span6Class      = $bootstrapHelper->getClassMapping('span6');
?>
<form action="index.php?option=com_eventbooking&view=registrant" method="post" name="adminForm" id="adminForm" class="form form-horizontal" enctype="multipart/form-data">
	<?php
	if ($hasCustomSettings)
	{
		echo JHtml::_('bootstrap.startTabSet', 'registrant', array('active' => 'general-page'));
		echo JHtml::_('bootstrap.addTab', 'registrant', 'general-page', JText::_('EB_GENERAL', true));
	}
	?>
	<div class="control-group">
		<div class="control-label">
			<?php echo  JText::_('EB_EVENT'); ?>
		</div>
		<div class="controls">
			<?php echo $this->lists['event_id']; ?>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo  JText::_('EB_NB_REGISTRANTS'); ?>
		</div>
		<div class="controls">
			<?php
				if ($this->item->number_registrants > 0)
				{
				?>
					<input type="text" name="number_registrants" value="<?php echo $this->item->number_registrants ?>" readonly="readonly" />
				<?php
				}
				else
				{
				?>
					<input class="text_area" type="text" name="number_registrants" id="number_registrants" size="40" maxlength="250" value="1" />
					<small><?php echo JText::_('EB_NUMBER_REGISTRANTS_EXPLAIN'); ?></small>
				<?php
				}
			?>
		</div>
	</div>
	<?php
		if (!empty($this->ticketTypes))
		{
		?>
			<h3><?php echo JText::_('EB_TICKET_INFORMATION'); ?></h3>
		<?php
			foreach($this->ticketTypes AS $ticketType)
			{
			    if ($ticketType->capacity)
                {
	                $available = $ticketType->capacity - $ticketType->registered;
                }
                else
                {
                    $available = 10;
                }

                $quantity = 0;

			    if (!empty($this->registrantTickets[$ticketType->id]))
				{
					$quantity = $this->registrantTickets[$ticketType->id]->quantity;
				}
				?>
				<div class="control-group">
					<div class="control-label">
						<?php echo  $ticketType->title; ?>
					</div>
					<div class="controls">
						<?php
						if ($available > 0 || $quantity > 0)
						{
							$fieldName = 'ticket_type_'.$ticketType->id;
							if ($available < $quantity)
							{
								$available = $quantity;
							}
							echo JHtml::_('select.integerlist', 0, $available, 1, $fieldName, 'class="ticket_type_quantity input-small"', $quantity);
						}
						else
						{
							echo JText::_('EB_NA');
						}
						?>
					</div>
				</div>
				<?php
			}
		}
		?>
		<div class="control-group">
			<div class="control-label">
				<?php echo  JText::_('EB_USER'); ?>
			</div>
			<div class="controls">
				<?php echo EventbookingHelper::getUserInput($this->item->user_id,'user_id',(int) $this->item->id) ; ?>
			</div>
		</div>
		<?php
		$fields = $this->form->getFields();
		if (isset($fields['state']))
		{
			$selectedState = $fields['state']->value;
		}
		foreach ($fields as $field)
		{
			$fieldType = strtolower($field->type);
			switch ($fieldType)
			{
				case 'heading':
				case 'message':
					break;
				default:
					$controlGroupAttributes = 'id="field_' . $field->name . '" ';
					if ($field->hideOnDisplay)
					{
						$controlGroupAttributes .= ' style="display:none;" ';
					}
					$class = "";
					if ($field->isMasterField)
					{
						if ($field->suffix)
						{
							$class = ' master-field-' . $field->suffix;
						}
						else
						{
							$class = ' master-field';
						}
					}
			?>
			<div class="control-group<?php echo $class; ?>" <?php echo $controlGroupAttributes; ?>>
				<div class="control-label">
					<?php echo $field->title; ?>
				</div>
				<div class="controls">
					<?php echo $field->input; ?>
				</div>
			</div>
			<?php
			}
		}
	?>
	<div class="control-group">
		<div class="control-label">
			<?php echo  JText::_('EB_REGISTRATION_DATE'); ?>
		</div>
		<div class="controls">
			<?php echo  JHtml::_('date', $this->item->register_date, $this->config->date_format, null);?>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo  JText::_('EB_TOTAL_AMOUNT'); ?>
		</div>
		<div class="controls">
			<?php echo $this->config->currency_symbol?><input type="text" name="total_amount" class="input-medium" value="<?php echo $this->item->total_amount > 0 ? round($this->item->total_amount , 2) : null;?>" />
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo  JText::_('EB_DISCOUNT_AMOUNT'); ?>
		</div>
		<div class="controls">
			<?php echo $this->config->currency_symbol?><input type="text" name="discount_amount" class="input-medium" value="<?php echo $this->item->discount_amount > 0 ? round($this->item->discount_amount , 2) : null;?>" />
		</div>
	</div>
	<?php
	if ($this->item->late_fee > 0)
	{
	?>
		<div class="control-group">
			<div class="control-label">
				<?php echo  JText::_('EB_LATE_FEE'); ?>
			</div>
			<div class="controls">
				<?php echo $this->config->currency_symbol?><input type="text" name="late_fee" class="input-medium" value="<?php echo $this->item->late_fee > 0 ? round($this->item->late_fee , 2) : null;?>" />
			</div>
		</div>
	<?php
	}

	if ($this->event->tax_rate > 0 || $this->item->tax_amount > 0)
	{
	?>
		<div class="control-group">
			<div class="control-label">
				<?php echo  JText::_('EB_TAX'); ?>
			</div>
			<div class="controls">
				<?php echo $this->config->currency_symbol?><input type="text" name="tax_amount" class="input-medium" value="<?php echo $this->item->tax_amount > 0 ? round($this->item->tax_amount , 2) : null;?>" />
			</div>
		</div>
	<?php
	}

	if ($this->showPaymentFee || $this->item->payment_processing_fee > 0)
	{
	?>
		<div class="control-group">
			<div class="control-label">
				<?php echo  JText::_('EB_PAYMENT_FEE'); ?>
			</div>
			<div class="controls">
				<?php echo $this->config->currency_symbol?><input type="text" name="payment_processing_fee" class="input-medium" value="<?php echo $this->item->payment_processing_fee > 0 ? round($this->item->payment_processing_fee , 2) : null;?>" />
			</div>
		</div>
	<?php
	}
	?>
	<div class="control-group">
		<div class="control-label">
			<?php echo  JText::_('EB_GROSS_AMOUNT'); ?>
		</div>
		<div class="controls">
			<?php echo $this->config->currency_symbol?><input type="text" name="amount" class="input-medium" value="<?php echo $this->item->amount > 0 ? round($this->item->amount , 2) : null;?>" />
		</div>
	</div>
	<?php
		if ($this->config->activate_deposit_feature)
		{
		?>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_DEPOSIT_AMOUNT'); ?>
				</div>
				<div class="controls">
					<?php echo $this->config->currency_symbol?><input type="text" name="deposit_amount" value="<?php echo $this->item->deposit_amount > 0 ? round($this->item->deposit_amount , 2) : null;?>" />
				</div>
			</div>
			<?php
			    if (in_array($this->item->payment_status, [0, 2]) && $this->item->id)
				{
				?>
					<div class="control-group">
						<div class="control-label">
							<?php echo JText::_('EB_DUE_AMOUNT'); ?>
						</div>
						<div class="controls">
							<?php
							if ($this->item->payment_status == 1)
							{
								$dueAmount = 0;
							}
							else
							{
								$dueAmount = $this->item->amount - $this->item->deposit_amount;
							}
							echo $this->config->currency_symbol?><input type="text" name="due_amount" class="input-medium" value="<?php echo $dueAmount > 0 ? round($dueAmount , 2) : null;?>" />
						</div>
					</div>
				<?php
				}
			?>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_PAYMENT_STATUS'); ?>
				</div>
				<div class="controls">
					<?php echo $this->lists['payment_status'];?>
				</div>
			</div>
		<?php
		}

		if ($this->item->id && $this->item->total_amount > 0)
		{
		?>
			<div class="control-group">
				<div class="control-label">
					<?php echo  EventbookingHelperHtml::getFieldLabel('re_calculate_fee', JText::_('EB_RE_CALCULATE_FEE'), JText::_('EB_RE_CALCULATE_FEE_EXPLAIN')); ?>
				</div>
				<div class="controls">
					<input type="checkbox" value="1" id="re_calculate_fee" name="re_calculate_fee" />
				</div>
			</div>
		<?php
		}

		if (!$this->item->id || $this->item->amount > 0)
		{
		?>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_PAYMENT_METHOD'); ?>
				</div>
				<div class="controls">
					<?php echo $this->lists['payment_method']; ?>
				</div>
			</div>
		<?php
		}

		if ($this->item->amount > 0)
		{
		?>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_TRANSACTION_ID'); ?>
				</div>
				<div class="controls">
					<input type="text" name="transaction_id" value="<?php echo $this->item->transaction_id;?>" />
				</div>
			</div>
		<?php
		}

		if ($this->item->deposit_payment_transaction_id)
		{
		?>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_DEPOSIT_PAYMENT_TRANSACTION_ID'); ?>
				</div>
				<div class="controls">
					<input type="text" name="deposit_payment_transaction_id" value="<?php echo $this->item->deposit_payment_transaction_id;?>" />
				</div>
			</div>
		<?php
		}

		if ($this->item->payment_method == "os_offline_creditcard")
		{
			$params = new \Joomla\Registry\Registry($this->item->params);
		?>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_FIRST_12_DIGITS_CREDITCARD_NUMBER'); ?>
				</div>
				<div class="controls">
					<?php echo $params->get('card_number'); ?>
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('AUTH_CARD_EXPIRY_DATE'); ?>
				</div>
				<div class="controls">
					<?php echo $params->get('exp_date'); ?>
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('AUTH_CVV_CODE'); ?>
				</div>
				<div class="controls">
					<?php echo $params->get('cvv'); ?>
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_CARD_HOLDER_NAME'); ?>
				</div>
				<div class="controls">
					<?php echo $params->get('card_holder_name'); ?>
				</div>
			</div>
		<?php
		}
		if ($this->config->activate_checkin_registrants)
		{
		?>
			<div class="control-group">
				<div class="control-label">
					<?php echo  JText::_('EB_CHECKED_IN'); ?>
				</div>
				<div class="controls">
					<?php echo EventbookingHelperHtml::getBooleanInput('checked_in', $this->item->checked_in); ?>
				</div>
			</div>
		<?php
		}
	?>
	<div class="control-group">
		<div class="control-label">
			<?php echo  JText::_('EB_REGISTRATION_STATUS'); ?>
		</div>
		<div class="controls">
			<?php echo $this->lists['published'] ; ?>
		</div>
	</div>
	<?php
	if ($this->config->get('store_user_ip', 1) && $this->item->user_ip)
	{
	?>
		<div class="control-group">
			<div class="control-label">
				<?php echo  JText::_('EB_USER_IP'); ?>
			</div>
			<div class="controls">
				<?php echo $this->item->user_ip; ?>
			</div>
		</div>
	<?php
	}
	if ($this->config->collect_member_information && count($this->rowMembers)) 
	{
	?>
		<h3 class="eb-heading"><?php echo JText::_('EB_MEMBERS_INFORMATION') ; ?> <button type="button" class="btn btn-small btn-success" onclick="addGroupMember();"><span class="icon-new icon-white"></span><?php echo JText::_('EB_ADD_MEMBER'); ?></button></h3>
	<?php
		$n = count($this->rowMembers) + 4;

		for ($i = 0 ; $i < $n ; $i++)
		{
		    $currentMemberFormFields = EventbookingHelperRegistration::getGroupMemberFields($this->memberFormFields, $i + 1);

		    if (isset($this->rowMembers[$i]))
			{
				$rowMember = $this->rowMembers[$i] ;
				$memberId = $rowMember->id ;
				$memberData = EventbookingHelperRegistration::getRegistrantData($rowMember, $currentMemberFormFields);
				$style = '';
			}
			else
			{
				$memberId = 0;
				$memberData = array();
				$style = ' style="display:none;"';
			}

			if (!isset($memberData['country']))
			{
				$memberData['country'] = $this->config->default_country;
			}

			$form = new RADForm($currentMemberFormFields);
			$form->setEventId($this->item->event_id);
			$form->bind($memberData);
			$form->setFieldSuffix($i+1);
			$form->prepareFormFields('setRecalculateFee();');
			$form->buildFieldsDependency();
			if ($i%2 == 0)
			{
				echo "<div class=\"$rowFluidClass\">\n" ;
			}					
			?>
				<div class="<?php echo $span6Class; ?>" id="group_member_<?php echo $i + 1; ?>"<?php echo $style; ?>>
					<h4><?php echo JText::sprintf('EB_MEMBER_INFORMATION', $i + 1); ;?><button type="button" class="btn btn-small btn-danger" onclick="removeGroupMember(<?php echo $memberId; ?>);"><span class="icon-remove icon-white"></span><?php echo JText::_('EB_REMOVE'); ?></button></h4>
					<?php
                        if ($this->event->has_multiple_ticket_types && $memberId > 0)
                        {
                            $ticketType = EventbookingHelperRegistration::getGroupMemberTicketType($memberId);

                            if ($ticketType)
                            {
                            ?>
                                <div class="control-group">
                                    <div class="control-label">
		                                <?php echo JText::_('EB_TICKET_TYPE'); ?>
                                    </div>
                                    <div class="controls">
	                                    <?php echo $ticketType; ?>
                                    </div>
                                </div>
                            <?php
                            }
                        }

						$fields = $form->getFields();

                        foreach ($fields as $field)
						{
							$fieldType = strtolower($field->type);

							switch ($fieldType)
							{
								case 'heading':
								case 'message':
									break;
								default:
									$controlGroupAttributes = 'id="field_' . $field->name . '" ';
									if ($field->hideOnDisplay)
									{
										$controlGroupAttributes .= ' style="display:none;" ';
									}
									$class = '';
									if ($field->isMasterField)
									{
										if ($field->suffix)
										{
											$class = ' master-field-' . $field->suffix;
										}
										else
										{
											$class = ' master-field';
										}
									}
								?>
								<div class="control-group<?php echo $class; ?>" <?php echo $controlGroupAttributes; ?>>
									<div class="control-label">
										<?php echo $field->title; ?>
									</div>
									<div class="controls">
										<?php echo $field->input; ?>
									</div>
								</div>
							<?php
							}
						}
					?>
					<input type="hidden" name="ids[]" value="<?php echo $memberId; ?>" />
				</div>
			<?php	
			if (($i + 1) %2 == 0)
			{
				echo "</div>\n" ;
			}
		}
		if ($i %2 != 0)
		{
			echo "</div>" ;
		}	
	?>				
	</table>	
	<?php	
	}

	// Add support for custom settings layout
	if ($hasCustomSettings)
	{
		echo JHtml::_('bootstrap.endTab');
		echo JHtml::_('bootstrap.addTab', 'registrant', 'custom-settings-page', JText::_('EB_REGISTRANT_CUSTOM_SETTINGS', true));
		echo $this->loadTemplate('custom_settings');
		echo JHtml::_('bootstrap.endTab');
		echo JHtml::_('bootstrap.endTabSet');
	}

	JFactory::getDocument()->addScriptOptions('numberMembers', (int) count($this->rowMembers))
        ->addScriptOptions('selectedState', $selectedState)
        ->addScript(JUri::root(true).'/media/com_eventbooking/js/admin-registrant-default.min.js');

	$languageItems = [
	    'EB_ADD_MEMBER_MAXIMUM_WARNING',
        'EB_REMOVE_EXISTING_MEMBER_CONFIRM',
        'EB_REFUND_REGISTRANT_CONFIRM'
    ];

	EventbookingHelperHtml::addJSStrings($languageItems);
	?>
	<div class="clearfix"></div>
    <input type="hidden" name="id" value="<?php echo (int) $this->item->id; ?>"/>
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="group_member_id" value="0" />
	<?php echo JHtml::_( 'form.token' ); ?>
</form>