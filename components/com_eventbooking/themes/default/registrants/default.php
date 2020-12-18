<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

JHtml::_('jquery.framework');
JHtml::_('behavior.core');
JHtml::_('formbehavior.chosen', 'select');

EventbookingHelperHtml::addOverridableScript('media/com_eventbooking/js/admin-registrants-default.min.js');
JText::script('EB_SELECT_EVENT_TO_ADD_REGISTRANT', true);

$return = base64_encode(JUri::getInstance()->toString());
$cols   = 4;

if (in_array('last_name', $this->coreFields))
{
	$showLastName = true;
	$cols++;
}
else
{
	$showLastName = false;
}

$rootUri         = JUri::root(true);
$nullDate        = JFactory::getDbo()->getNullDate();
$bootstrapHelper = EventbookingHelperBootstrap::getInstance();
$hiddenPhone     = $bootstrapHelper->getClassMapping('hidden-phone');
?>
<h1 class="eb-page-heading"><?php echo JText::_('EB_REGISTRANT_LIST'); ?></h1>
<div id="eb-registrants-management-page" class="eb-container">
    <div class="btn-toolbar" id="btn-toolbar">
		<?php echo JToolbar::getInstance('toolbar')->render('toolbar'); ?>
    </div>
<form action="<?php JRoute::_('index.php?option=com_eventbooking&view=registrants&Itemid='.$this->Itemid );?>" method="post" name="adminForm" id="adminForm">
	<div class="filters btn-toolbar clearfix mt-2 mb-2">
		<?php echo $this->loadTemplate('search_bar'); ?>
	</div>
<?php
	if (count($this->items))
	{
	?>
		<table class="<?php echo $bootstrapHelper->getClassMapping('table table-striped table-bordered'); ?> table-hover">
		<thead>
			<tr>
				<th width="20">
					<input type="checkbox" name="toggle" value="" onclick="Joomla.checkAll(this);" />
				</th>
				<th class="list_first_name">
					<?php echo JHtml::_('grid.sort',  JText::_('EB_FIRST_NAME'), 'tbl.first_name', $this->state->filter_order_Dir, $this->state->filter_order); ?>
				</th>
				<?php
					if ($showLastName)
					{
					?>
						<th class="list_last_name <?php echo $hiddenPhone; ?>">
							<?php echo JHtml::_('grid.sort',  JText::_('EB_LAST_NAME'), 'tbl.last_name', $this->state->filter_order_Dir, $this->state->filter_order); ?>
						</th>
					<?php
					}
				?>
				<th class="list_event">
					<?php echo JHtml::_('grid.sort',  JText::_('EB_EVENT'), 'ev.title', $this->state->filter_order_Dir, $this->state->filter_order); ?>
				</th>
				<?php
					if ($this->config->show_event_date)
					{
						$cols++;
					?>
						<th class="list_event_date <?php echo $hiddenPhone; ?>">
							<?php echo JHtml::_('grid.sort',  JText::_('EB_EVENT_DATE'), 'ev.event_date', $this->state->filter_order_Dir, $this->state->filter_order); ?>
						</th>
					<?php
					}
				?>
				<th class="list_email">
					<?php echo JHtml::_('grid.sort',  JText::_('EB_EMAIL'), 'tbl.email', $this->state->filter_order_Dir, $this->state->filter_order); ?>
				</th>
                <?php
                if ($this->config->get('rm_show_number_registrants', 1))
                {
                    $cols++;
                ?>
                    <th class="list_registrant_number <?php echo $hiddenPhone; ?>">
                        <?php echo JHtml::_('grid.sort',  JText::_('EB_REGISTRANTS'), 'tbl.number_registrants', $this->state->filter_order_Dir, $this->state->filter_order); ?>
                    </th>
                <?php
                }

                if ($this->config->get('rm_show_registration_date', 1))
                {
                    $cols++;
                ?>
                    <th class="<?php echo $hiddenPhone; ?>">
                        <?php echo JHtml::_('grid.sort',  JText::_('EB_REGISTRATION_DATE'), 'tbl.register_date', $this->state->filter_order_Dir, $this->state->filter_order); ?>
                    </th>
                <?php
                }

                if ($this->config->get('rm_show_amount', 1))
                {
                    $cols++;
                ?>
                    <th class="list_amount <?php echo $hiddenPhone; ?>">
                        <?php echo JHtml::_('grid.sort',  JText::_('EB_AMOUNT'), 'tbl.amount', $this->state->filter_order_Dir, $this->state->filter_order); ?>
                    </th>
                <?php
                }

				foreach ($this->fields as $field)
				{
					$cols++;

					if ($field->is_core || $field->is_searchable)
					{
					?>
						<th class="title <?php echo $hiddenPhone; ?>">
							<?php echo JHtml::_('grid.sort', JText::_($field->title), 'tbl.' . $field->name, $this->state->filter_order_Dir, $this->state->filter_order); ?>
						</th>
					<?php
					}
					else
					{
					?>
						<th class="title <?php echo $hiddenPhone; ?>"><?php echo $field->title; ?></th>
					<?php
					}
				}

				if ($this->config->activate_deposit_feature)
				{
					$cols++;
				?>
					<th class="eb-payment-status <?php echo $hiddenPhone; ?>" nowrap="nowrap">
						<?php echo JHtml::_('grid.sort',  JText::_('EB_PAYMENT_STATUS'), 'tbl.payment_status', $this->state->filter_order_Dir, $this->state->filter_order); ?>
					</th>
				<?php
				}

				if ($this->config->activate_tickets_pdf)
				{
					$cols++;
				?>
                    <th width="8%" class="center">
						<?php echo JHtml::_('grid.sort',  JText::_('EB_TICKET_NUMBER'), 'tbl.ticket_number', $this->state->filter_order_Dir, $this->state->filter_order); ?>
                    </th>
                 <?php
				}

				if ($this->config->get('rm_show_registration_status', 1))
                {
                    $cols++;
                ?>
                    <th class="list_id <?php echo $hiddenPhone; ?>">
		                <?php echo JHtml::_('grid.sort',  JText::_('EB_REGISTRATION_STATUS'), 'tbl.published', $this->state->filter_order_Dir, $this->state->filter_order); ?>
                    </th>
                <?php
                }

				if ($this->config->activate_checkin_registrants)
				{
					$cols++;
				?>
					<th class="list_id <?php echo $hiddenPhone; ?>">
						<?php echo JHtml::_('grid.sort',  JText::_('EB_CHECKED_IN'), 'tbl.checked_in', $this->state->filter_order_Dir, $this->state->filter_order); ?>
					</th>
				<?php
				}

				if ($this->config->activate_invoice_feature)
				{
					$cols++;
				?>
					<th width="8%" class="<?php echo $hiddenPhone; ?>">
						<?php echo JHtml::_('grid.sort',  JText::_('EB_INVOICE_NUMBER'), 'tbl.invoice_number', $this->state->filter_order_Dir, $this->state->filter_order); ?>
					</th>
				<?php
				}

				if ($this->config->get('rm_show_id', 1))
                {
                    $cols++;
                ?>
                    <th width="3%" class="title <?php echo $hiddenPhone; ?>" nowrap="nowrap">
		                <?php echo JHtml::_('grid.sort',  JText::_('EB_ID'), 'tbl.id', $this->state->filter_order_Dir, $this->state->filter_order ); ?>
                    </th>
                <?php
                }
				?>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<?php
					if ($this->pagination->total > $this->pagination->limit)
					{
					?>
						<td colspan="<?php echo $cols; ?>">
							<?php echo $this->pagination->getListFooter(); ?>
						</td>
					<?php
					}
				?>
			</tr>
		</tfoot>
		<tbody>
		<?php
		$k = 0;
		
		for ($i=0, $n=count( $this->items ); $i < $n; $i++)
		{
			$row      = $this->items[$i];
			$link     = JRoute::_('index.php?option=com_eventbooking&view=registrant&id=' . $row->id . '&Itemid=' . $this->Itemid . '&return=' . $return);
			$isMember = $row->group_id > 0 ? true : false;
			$img    = $row->checked_in ? 'tick.png' : 'publish_x.png';
			$alt    = $row->checked_in ? JText::_('EB_CHECKED_IN') : JText::_('EB_NOT_CHECKED_IN');
			$action = $row->checked_in ? JText::_('EB_UN_CHECKIN') : JText::_('EB_CHECKIN');
			$task   = $row->checked_in ? 'registrant.reset_check_in' : 'registrant.check_in_webapp';
			$checked 	= JHtml::_('grid.id',   $i, $row->id );
			?>
			<tr class="<?php echo "row$k"; if ($row->is_group_billing) echo ' eb-row-group-billing'; ?>">
				<td>
					<?php echo $checked; ?>
				</td>
				<td>
					<a href="<?php echo $link; ?>">
						<?php echo $row->first_name ?>
					</a>
					<?php
					if ($row->is_group_billing)
					{
						echo '<br />' ;
						echo JText::_('EB_GROUP_BILLING');
					}
					if ($isMember)
					{
						$groupLink = JRoute::_('index.php?option=com_eventbooking&view=registrant&id=' . $row->group_id . '&Itemid=' . $this->Itemid. '&return=' . $return);
					?>
						<br />
						<?php echo JText::_('EB_GROUP'); ?><a href="<?php echo $groupLink; ?>"><?php echo $row->group_name ;  ?></a>
					<?php
					}
					?>
				</td>
				<?php
					if ($showLastName)
					{
					?>
						<td class="<?php echo $hiddenPhone; ?>">
							<?php echo $row->last_name ; ?>
						</td>
					<?php
					}
				?>
				<td>
					<?php echo $row->title ; ?>
				</td>
				<?php
					if ($this->config->show_event_date)
					{
					?>
						<td class="<?php echo $hiddenPhone; ?>">
							<?php
							if ($row->event_date == EB_TBC_DATE)
							{
								echo JText::_('EB_TBC');
							}
							else
							{
								echo JHtml::_('date', $row->event_date, $this->config->date_format, null);
							}
							?>
						</td>
					<?php
					}
				?>
				<td>
					<?php echo $row->email; ?>
				</td>
                <?php
                if ($this->config->get('rm_show_number_registrants', 1))
                {
                ?>
                    <td class="center <?php echo $hiddenPhone; ?>" style="font-weight: bold;">
                        <?php echo $row->number_registrants; ?>
                    </td>
                <?php
                }

                if ($this->config->get('rm_show_registration_date', 1))
                {
                ?>
                    <td class="center <?php echo $hiddenPhone; ?>">
                        <?php echo JHtml::_('date', $row->register_date, $this->config->date_format); ?>
                    </td>
                <?php
                }

                if ($this->config->get('rm_show_amount', 1))
                {
                ?>
                    <td align="right" class="<?php echo $hiddenPhone; ?>">
                        <?php echo EventbookingHelper::formatAmount($row->amount, $this->config); ?>
                    </td>
                <?php
                }

                foreach ($this->fields as $field)
				{
					$fieldValue = isset($this->fieldsData[$row->id][$field->id]) ? $this->fieldsData[$row->id][$field->id] : '';

					if ($fieldValue && $field->fieldtype == 'File')
					{
						$fieldValue = '<a href="' . JRoute::_('index.php?option=com_eventbooking&task=controller.download_file&file_name=' . $fieldValue) . '">' . $fieldValue . '</a>';
					}
					?>
					<td class="<?php echo $hiddenPhone; ?>">
						<?php echo $fieldValue; ?>
					</td>
					<?php
				}

				if ($this->config->activate_deposit_feature)
				{
				?>
					<td class="<?php echo $hiddenPhone; ?>">
						<?php
						if($row->payment_status == 1)
						{
							echo JText::_('EB_FULL_PAYMENT');
						}
						elseif ($row->payment_status == 2)
						{
							echo JText::_('EB_DEPOSIT_PAID');
						}
						else
						{
							echo JText::_('EB_PARTIAL_PAYMENT');
						}
						?>
					</td>
				<?php
				}

				if ($this->config->activate_tickets_pdf)
				{
				?>
                    <td class="center">
						<?php
						if ($row->ticket_code)
						{
						?>
                            <a href="<?php echo JRoute::_('index.php?option=com_eventbooking&task=registrant.download_ticket&download_code=' . $row->registration_code); ?>" title="<?php echo JText::_('EB_DOWNLOAD'); ?>"><?php echo $row->ticket_number ? EventbookingHelperTicket::formatTicketNumber($row->ticket_prefix, $row->ticket_number, $this->config) : JText::_('EB_DOWNLOAD_TICKETS');?></a>
						<?php
						}
						?>
                    </td>
				<?php
				}

				if ($this->config->get('rm_show_registration_status', 1))
                {
                ?>
                    <td class="center <?php echo $hiddenPhone; ?>">
		                <?php
		                switch ($row->published)
		                {
			                case 0 :
				                echo JText::_('EB_PENDING');
				                break;
			                case 1 :
				                echo JText::_('EB_PAID');
				                break;
			                case 2 :
				                echo JText::_('EB_CANCELLED');
				                break;
			                case 3:
				                echo JText::_('EB_WAITING_LIST');
				                break;
		                }
		                ?>
                    </td>
                <?php
                }

				if ($this->config->activate_checkin_registrants)
				{
				?>
					<td class="center <?php echo $hiddenPhone; ?>">
						<a href="<?php echo JRoute::_('index.php?option=com_eventbooking&task='.$task.'&id='.$row->id.'&'.JSession::getFormToken().'=1'.'&Itemid='.$this->Itemid); ?>"><img src="<?php echo $rootUri . '/media/com_eventbooking/assets/images/' . $img; ?>" alt="<?php echo $alt; ?>" /></a>

                        <?php
                        if ($row->checked_in && $row->checked_in_at && $row->checked_in_at != $nullDate)
                        {
	                    ?>
                            <br /><?php echo JText::sprintf('EB_CHECKED_IN_AT', JHtml::_('date', $row->checked_in_at, $this->config->date_format.' H:i:s')); ?>
	                    <?php
                        }

                        if (!$row->checked_in && $row->checked_out_at && $row->checked_out_at != $nullDate)
                        {
	                    ?>
                            <br /><span style="color: red;"><?php echo JText::sprintf('EB_CHECKED_OUT_AT', JHtml::_('date', $row->checked_out_at, $this->config->date_format.' H:i:s')); ?></span>
	                    <?php
                        }
                        ?>
					</td>
				<?php
				}

				if ($this->config->activate_invoice_feature)
				{
				?>
					<td class="center <?php echo $hiddenPhone; ?>">
						<?php
						if ($row->invoice_number)
						{
						?>
							<a href="<?php echo JRoute::_('index.php?option=com_eventbooking&task=registrant.download_invoice&id='.($row->cart_id ? $row->cart_id : ($row->group_id ? $row->group_id : $row->id))); ?>" title="<?php echo JText::_('EB_DOWNLOAD'); ?>"><?php echo EventbookingHelper::callOverridableHelperMethod('Helper', 'formatInvoiceNumber', [$row->invoice_number, $this->config, $row]) ; ?></a>
						<?php
						}
						?>
					</td>
				<?php
				}

				if ($this->config->get('rm_show_id', 1))
                {
                ?>
                    <td class="center <?php echo $hiddenPhone; ?>">
		                <?php echo $row->id; ?>
                    </td>
                <?php
                }
				?>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		</tbody>
	</table>
	<?php
		echo JHtml::_(
			'bootstrap.renderModal',
			'collapseModal',
			array(
				'title' => JText::_('EB_MASS_MAIL'),
				'footer' => $this->loadTemplate('batch_footer')
			),
			$this->loadTemplate('batch_body')
		);
	}
	else
	{
	?>
		<div class="eb-message"><?php echo JText::_('EB_NO_REGISTRATION_RECORDS');?></div>
	<?php
	}
?>
	<input type="hidden" name="task" id="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->state->filter_order; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->state->filter_order_Dir; ?>" />
	<input type="hidden" name="return" value="<?php echo $return; ?>" />
	<?php echo JHtml::_( 'form.token' ); ?>
</form>

<form action="<?php JRoute::_('index.php?option=com_eventbooking&view=registrants&Itemid='.$this->Itemid );?>" method="post" name="registrantsExportForm" id="registrantsExportForm">
    <input type="hidden" name="task" value=""/>
    <input type="hidden" id="export_filter_search" name="filter_search"/>
    <input type="hidden" id="export_filter_from_date" name="filter_from_date" value="">
    <input type="hidden" id="export_filter_to_date" name="filter_to_date" value="">
    <input type="hidden" id="export_filter_event_id" name="filter_event_id" value="">
    <input type="hidden" id="export_filter_published" name="filter_published" value="">
    <input type="hidden" id="export_cid" name="cid" value="">
    <?php
    if ($this->config->activate_checkin_registrants)
    {
        ?>
        <input type="hidden" id="export_filter_checked_in" name="filter_checked_in"  value="">
        <?php
    }
    ?>
    <input type="hidden" name="filter_order" value="<?php echo $this->state->filter_order; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $this->state->filter_order_Dir; ?>" />
    <?php echo JHtml::_( 'form.token' ); ?>
</form>
</div>