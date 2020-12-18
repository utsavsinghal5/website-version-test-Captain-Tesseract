<?php
/**
 * @package        	Joomla
 * @subpackage		Event Booking
 * @author  		Tuan Pham Ngoc
 * @copyright    	Copyright (C) 2010 - 2020 Ossolution Team
 * @license        	GNU/GPL, see LICENSE.php
 */
// no direct access
defined( '_JEXEC' ) or die;
JHtml::_('bootstrap.dropdown', 'eb-dropdown-toggle');

?>
<div class="btn-group">
	<button class="btn eb-dropdown-toggle" data-toggle="dropdown"><i class="icon-plus"></i> <?php echo JText::_('EB_SAVE_TO'); ?> <span class="caret"></span></button>
	<ul class="dropdown-menu eb-save-to-calendar-container">
		<li><a  href="<?php echo EventbookingHelperHtml::getAddToGoogleCalendarUrl($item); ?>" target="_blank"><i class="fa fa-google-plus"></i><?php echo JText::_('EB_GOOGLE_CALENDAR'); ?></a></li>
		<li><a href="<?php echo EventbookingHelperHtml::getAddToYahooCalendarUrl($item);?>" target="_blank"><i class="fa fa-yahoo"></i> <?php echo JText::_('EB_YAHOO_CALENDAR'); ?></a></li>
		<li><a href="<?php echo JRoute::_('index.php?option=com_eventbooking&task=event.download_ical&event_id='.$item->id.'&Itemid='.$Itemid); ?>"> <i class="fa fa-download"></i> <?php echo JText::_('EB_DOWNLOAD_ICAL'); ?></a></li>
	</ul>
</div>