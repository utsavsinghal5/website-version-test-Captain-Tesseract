<?php
/**
 * @package        Joomla
 * @subpackage     Event Booking
 * @author         Tuan Pham Ngoc
 * @copyright      Copyright (C) 2010 - 2020 Ossolution Team
 * @license        GNU/GPL, see LICENSE.php
 */
// no direct access

defined('_JEXEC') or die;
?>
<table width="100%">
	<?php
	$rows = $this->rows;
	if (count($rows))
	{
		$k = 0 ;
		for ($i = 0 , $n = count($rows) ; $i < $n ; $i++)
		{
			$row = $rows[$i] ;
			$link = EventbookingHelperRoute::getEventRoute($row->id, 0, $this->Itemid);
			?>
			<tr>
				<td>
					<a href="<?php echo $link; ?>" class="eb_event_link"><div class="eb_event_title"><?php echo $row->title ; ?></div></a>
					<br />
					<span class="qty_title"><?php echo JText::_('EB_QTY'); ?></span>: <span class="qty"><?php echo $row->quantity ;?></span>
					<?php
					if ($row->rate > 0)
					{
						?>
						<br />
						<span class="eb_rate"><?php echo JText::_('EB_RATE'); ?></span>: <span class="eb_rate"><?php echo EventbookingHelper::formatCurrency($row->rate, $this->config) ;?></span>
					<?php
					}
					?>
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td style="text-align: center;">
				<input type="button" onclick="goToCheckOut();" value="<?php echo JText::_('EB_CHECKOUT'); ?>" />
			</td>
		</tr>
	<?php
	}
	else
	{
		?>
		<tr>
			<td>
				<?php echo JText::_('EB_CART_EMPTY'); ?>
			</td>
		</tr>
	<?php
	}
	?>
</table>