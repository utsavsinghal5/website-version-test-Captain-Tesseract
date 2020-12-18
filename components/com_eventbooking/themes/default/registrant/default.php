<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */


defined('_JEXEC') or die;
$format = 'Y-m-d';
EventbookingHelperJquery::validateForm();;
$selectedState = '';
?>
<div class="row-fluid eb-container">
	<div class="page-header">
		<h1 class="eb_title"><?php echo JText::_('EB_EDIT_REGISTRANT'); ?></h1>
	</div>
    <div class="btn-toolbar" id="btn-toolbar">
		<?php echo JToolbar::getInstance('toolbar')->render('toolbar'); ?>
    </div>
	<form action="<?php echo JRoute::_('index.php?option=com_eventbooking&view=registrants&Itemid=' . $this->Itemid); ?>" method="post" name="adminForm" id="adminForm" class="form form-horizontal">
		<div class="control-group">
			<div class="control-label">
				<?php echo JText::_('EB_EVENT'); ?>
			</div>
			<div class="controls">
				<?php
				if ($this->item->id)
				{
					echo $this->event->title;
				}
				else
				{
					echo $this->lists['event_id'];
				}
				?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<?php echo JText::_('EB_NUMBER_REGISTRANTS'); ?>
			</div>
			<div class="controls">
				<?php
				if ($this->item->number_registrants)
				{
					echo $this->item->number_registrants;
				}
				else
				{
				?>
					<input class="input-small validate[required,custom[number]]" type="text" name="number_registrants"
					       id="number_registrants" size="40" maxlength="250" value="1"/>
					<small><?php echo JText::_('EB_NUMBER_REGISTRANTS_EXPLAIN'); ?></small>
				<?php
				}
				?>
			</div>
		</div>

        <?php
        if (JFactory::getUser()->authorise('eventbooking.registrantsmanagement', 'com_eventbooking'))
        {
        ?>
            <div class="control-group">
                <label class="control-label">
                    <?php echo  JText::_('EB_USER'); ?>
                </label>
                <div class="controls">
                    <?php echo EventbookingHelper::getUserInput($this->item->user_id,'user_id',(int) $this->item->id) ; ?>
                </div>
            </div>
        <?php
        }

        if (!empty($this->ticketTypes))
		{
		?>
			<h3><?php echo JText::_('EB_TICKET_INFORMATION'); ?></h3>
			<?php
			foreach ($this->ticketTypes AS $ticketType)
			{
				if ($ticketType->capacity)
				{
					$available = $ticketType->capacity - $ticketType->registered;
				}
				else
				{
					$available = 10;
				}

				$quantity  = 0;

				if (!empty($this->registrantTickets[$ticketType->id]))
				{
					$quantity = $this->registrantTickets[$ticketType->id]->quantity;
				}
				?>
				<div class="control-group">
					<div class="control-label">
						<?php echo JText::_($ticketType->title); ?>
					</div>
					<div class="controls">
						<?php
						if ($available > 0 || $quantity > 0)
						{
							$fieldName = 'ticket_type_' . $ticketType->id;

							if ($available < $quantity)
							{
								$available = $quantity;
							}

							if ($this->canChangeTicketsQuantity)
							{
								echo JHtml::_('select.integerlist', 0, $available, 1, $fieldName, 'class="ticket_type_quantity input-small"' . $extra, $quantity);
							}
							else
							{
								echo $quantity;
							}
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

		$fields = $this->form->getFields();

		if (isset($fields['state']))
		{
			$selectedState = $fields['state']->value;
		}

		if (isset($fields['email']))
		{
			$emailField = $fields['email'];
			$cssClass   = $emailField->getAttribute('class');
			$cssClass   = str_replace(',ajax[ajaxEmailCall]', '', $cssClass);
			$emailField->setAttribute('class', $cssClass);
		}

		foreach ($fields as $field)
		{
			/* @var RADFormField $field */

			// Dealing with group member record
			if ($this->item->group_id > 0)
            {
	            if (empty($this->item->is_first_group_member) && $field->row->only_show_for_first_member)
	            {
		            continue;
	            }

	            if (empty($this->item->is_first_group_member) && $field->row->only_require_for_first_member)
	            {
		            $field->makeFieldOptional();
	            }
            }

			$fieldType = strtolower($field->type);

			switch ($fieldType)
			{
				case 'message':
				case 'heading':
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
							<?php
							if ($field->row->required)
							{
							?>
								<span class="star">&#160;*</span>
							<?php
							}
							?>
						</div>
						<div class="controls">
							<?php
							if (($field->fee_field && !$this->canChangeFeeFields) || $this->disableEdit)
							{
								if (is_string($field->value) && is_array(json_decode($field->value)))
								{
									$fieldValue = implode(', ', json_decode($field->value));
								}
								else
								{
									$fieldValue = $field->value;
								}

								echo $fieldValue;
							}
							else
							{
								echo $field->input;
							}
							?>
						</div>
					</div>
					<?php
			}
		}

		if ($this->canChangeStatus)
		{
		    if (isset($this->lists['checked_in']))
            {
            ?>
                <div class="control-group">
                    <div class="control-label">
			            <?php echo JText::_('EB_CHECKED_IN'); ?>
                    </div>
		            <?php echo $this->lists['checked_in']; ?>
                </div>
            <?php
            }
		?>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_REGISTRATION_STATUS'); ?>
				</div>
				<div class="controls">
					<?php echo $this->lists['published']; ?>
				</div>
			</div>
			<?php
		}
		?>
		<div class="control-group">
			<div class="control-label">
				<?php echo JText::_('EB_REGISTRATION_DATE'); ?>
			</div>
			<div class="controls">
				<?php echo JHtml::_('date', $this->item->register_date, $format, null); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<?php echo JText::_('EB_TOTAL_AMOUNT'); ?>
			</div>
			<div class="controls">
				<?php
				if ($this->canChangeStatus)
				{
					echo $this->config->currency_symbol;
				?>
					<input type="text" name="total_amount" class="input-medium" value="<?php echo $this->item->total_amount > 0 ? round($this->item->total_amount, 2) : null; ?>" />
				<?php
				}
				else
				{
					echo EventbookingHelper::formatCurrency($this->item->total_amount, $this->config);
				}
				?>
			</div>
		</div>
		<?php
		if ($this->item->discount_amount > 0 || $this->item->late_fee > 0 || $this->item->tax_amount > 0 || $this->canChangeStatus || empty($this->item->id))
		{
			if ($this->item->discount_amount > 0 || $this->canChangeStatus || empty($this->item->id))
			{
			?>
				<div class="control-group">
					<div class="control-label">
						<?php echo JText::_('EB_DISCOUNT_AMOUNT'); ?>
					</div>
					<div class="controls">
						<?php
						if ($this->canChangeStatus)
						{
							echo $this->config->currency_symbol;
						?>
							<input type="text" name="discount_amount" class="input-medium" value="<?php echo $this->item->discount_amount > 0 ? round($this->item->discount_amount, 2) : null;?>"/>
						<?php
						}
						else
						{
							echo EventbookingHelper::formatCurrency($this->item->discount_amount, $this->config);
						}
						?>
					</div>
				</div>
				<?php
			}

			if ($this->item->late_fee > 0 || empty($this->item->id))
			{
			?>
				<div class="control-group">
					<div class="control-label">
						<?php echo JText::_('EB_LATE_FEE'); ?>
					</div>
					<div class="controls">
						<?php
						if ($this->canChangeStatus)
						{
							echo $this->config->currency_symbol;
						?>
							<input type="text" name="late_fee" class="input-medium" value="<?php echo $this->item->late_fee > 0 ? round($this->item->late_fee, 2) : null;?>" />
						<?php
						}
						else
						{
							echo EventbookingHelper::formatCurrency($this->item->late_fee, $this->config);
						}
						?>
					</div>
				</div>
			<?php
			}

			if ($this->item->tax_amount > 0 || empty($this->item->id))
			{
			?>
				<div class="control-group">
					<div class="control-label">
						<?php echo JText::_('EB_TAX'); ?>
					</div>
					<div class="controls">
						<?php
						if ($this->canChangeStatus)
						{
							echo $this->config->currency_symbol;
						?>
							<input type="text" name="tax_amount" class="input-medium" value="<?php echo $this->item->tax_amount > 0 ? round($this->item->tax_amount, 2) : null;?>" />
						<?php
						}
						else
						{
							echo EventbookingHelper::formatCurrency($this->item->tax_amount, $this->config);
						}
						?>
					</div>
				</div>
			<?php
			}
			?>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_GROSS_AMOUNT'); ?>
				</div>
				<div class="controls">
					<?php
					if ($this->canChangeStatus)
					{
						echo $this->config->currency_symbol;
					?>
						<input type="text" name="amount" class="input-medium" value="<?php echo $this->item->amount > 0 ? round($this->item->amount, 2) : null;?>" />
					<?php
					}
					else
					{
						echo EventbookingHelper::formatCurrency($this->item->amount, $this->config);
					}
					?>
				</div>
			</div>
			<?php
		}

		if ($this->item->deposit_amount > 0)
		{
		?>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_DEPOSIT_AMOUNT'); ?>
				</div>
				<div class="controls">
					<?php echo EventbookingHelper::formatCurrency($this->item->deposit_amount, $this->config); ?>
				</div>
			</div>
			<?php
			if ($this->item->payment_status == 1)
			{
			?>
				<div class="control-group">
					<div class="control-label">
						<?php echo JText::_('EB_PAYMENT_MADE'); ?>
					</div>
					<div class="controls">
						<?php echo EventbookingHelper::formatCurrency($this->item->amount - $this->item->deposit_amount, $this->config); ?>
					</div>
				</div>
			<?php
				$dueAmount = 0;
			}
			else
			{
				$dueAmount = $this->item->amount - $this->item->deposit_amount;
			}
			?>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_DUE_AMOUNT'); ?>
				</div>
				<div class="controls">
					<?php echo EventbookingHelper::formatCurrency($dueAmount, $this->config); ?>
				</div>
			</div>
		<?php
		}

		if ($this->canChangeStatus)
		{
		?>
			<div class="control-group">
				<label class="control-label">
					<?php echo JText::_('EB_PAYMENT_STATUS'); ?>
				</label>
				<div class="controls">
					<?php echo $this->lists['payment_status'];?>
				</div>
			</div>
		<?php
		}

		if ($this->canChangeStatus && $this->item->id && ($this->item->total_amount > 0 || $this->form->containFeeFields()))
		{
		?>
			<div class="control-group">
				<div class="control-label" for="re_calculate_fee">
					<?php echo JText::_('EB_RE_CALCULATE_FEE'); ?>
				</div>
				<div class="controls">
					<input type="checkbox" value="1" id="re_calculate_fee" name="re_calculate_fee" />
				</div>
			</div>
		<?php
		}

		// Members Information
		if ($this->config->collect_member_information && count($this->rowMembers))
		{
		?>
			<h3 class="eb-heading"><?php echo JText::_('EB_MEMBERS_INFORMATION') ; ?></h3>
		<?php
			for ($i = 0, $n = count($this->rowMembers); $i < $n; $i++)
			{
				$currentMemberFormFields = EventbookingHelperRegistration::getGroupMemberFields($this->memberFormFields, $i + 1);
				$rowMember  = $this->rowMembers[$i];
				$memberId   = $rowMember->id;
				$form       = new RADForm($currentMemberFormFields);
				$memberData = EventbookingHelperRegistration::getRegistrantData($rowMember, $currentMemberFormFields);

				if (!isset($memberData['country']))
				{
					$memberData['country'] = $this->config->default_country;
				}

				$form->setEventId($this->item->event_id);
				$form->bind($memberData);
				$form->setFieldSuffix($i + 1);

				if ($this->canChangeStatus)
				{
					$form->prepareFormFields('setRecalculateFee();');
				}

				$form->buildFieldsDependency();

				if ($i % 2 == 0)
				{
					echo "<div class=\"row-fluid\">\n" ;
				}
				?>
				<div class="span6">
					<h4><?php echo JText::sprintf('EB_MEMBER_INFORMATION', $i + 1); ?></h4>
					<?php
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
									<label class="control-label">
										<?php echo $field->title; ?>
									</label>
									<div class="controls">
                                        <?php
                                        if (($field->fee_field && !$this->canChangeFeeFields) || $this->disableEdit)
                                        {
	                                        if (is_string($field->value) && is_array(json_decode($field->value)))
	                                        {
		                                        $fieldValue = implode(', ', json_decode($field->value));
	                                        }
	                                        else
	                                        {
		                                        $fieldValue = $field->value;
	                                        }

	                                        echo $fieldValue;
                                        }
                                        else
                                        {
	                                        echo $field->input;
                                        }
                                        ?>
									</div>
								</div>
								<?php
						}
					}
					?>
					<input type="hidden" name="ids[]" value="<?php echo $memberId; ?>" />
				</div>
				<?php
				if (($i + 1) % 2 == 0)
				{
					echo "</div>\n" ;
				}
			}
			if ($i % 2 != 0)
			{
				echo "</div>\n" ;
			}
		}
		?>
		<!-- End members information -->
		<input type="hidden" name="option" value="com_eventbooking"/>
		<input type="hidden" name="id" value="<?php echo $this->item->id; ?>"/>
		<input type="hidden" name="task" value="registrant.save"/>
		<input type="hidden" name="event_id" value="<?php echo $this->item->event_id; ?>"/>
		<input type="hidden" name="return" value="<?php echo $this->return; ?>"/>
		<?php echo JHtml::_('form.token'); ?>
	</form>
</div>

<?php
JHtml::_('behavior.core');
JFactory::getDocument()->addScriptOptions('selectedState', $selectedState)
	->addScriptOptions('rootUri', JUri::root(true))
	->addScriptDeclaration(' var siteUrl = "'.EventbookingHelper::getSiteUrl().'";');

EventbookingHelperHtml::addOverridableScript('media/com_eventbooking/js/site-registrant-default.min.js');

JText::script('EB_CANCEL_REGISTRATION_CONFIRM', true);