<?php
/**
 * @package        	Joomla
 * @subpackage		Event Booking
 * @author  		Tuan Pham Ngoc
 * @copyright    	Copyright (C) 2010 - 2020 Ossolution Team
 * @license        	GNU/GPL, see LICENSE.php
 */
// no direct access
defined( '_JEXEC' ) or die ;
?>
<div id="eb-event-page" class="eb-container">
<h1 class="eb-page-heading"><?php echo JText::_('EB_REGISTRATION_FAILURE'); ?></h1>
<table width="100%">
	<tr>
		<td colspan="2" align="left">
			<?php echo  JText::_('EB_FAILURE_MESSAGE'); ?>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<?php echo JText::_('EB_REASON'); ?>
		</td>
		<td>
			<p class="info"><?php echo $this->reason; ?></p>
		</td>
	</tr>	
</table>
</div>