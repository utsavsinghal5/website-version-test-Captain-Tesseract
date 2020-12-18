<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

EventbookingHelperJquery::loadColorboxForMap();
$timeFormat = $this->config->event_time_format ? $this->config->event_time_format : 'g:i a';

$bootstrapHelper = EventbookingHelperBootstrap::getInstance();
$daysInWeek      = [
	0 => JText::_('EB_SUNDAY'),
	1 => JText::_('EB_MONDAY'),
	2 => JText::_('EB_TUESDAY'),
	3 => JText::_('EB_WEDNESDAY'),
	4 => JText::_('EB_THURSDAY'),
	5 => JText::_('EB_FRIDAY'),
	6 => JText::_('EB_SATURDAY'),
];

$monthsInYear = [
	1  => JText::_('EB_JAN'),
	2  => JText::_('EB_FEB'),
	3  => JText::_('EB_MARCH'),
	4  => JText::_('EB_APR'),
	5  => JText::_('EB_MAY'),
	6  => JText::_('EB_JUNE'),
	7  => JText::_('EB_JUL'),
	8  => JText::_('EB_AUG'),
	9  => JText::_('EB_SEP'),
	10 => JText::_('EB_OCT'),
	11 => JText::_('EB_NOV'),
	12 => JText::_('EB_DEC'),
];

$bootstrapHelper  = EventbookingHelperBootstrap::getInstance();
$angleDoubleLeft  = $bootstrapHelper->getClassMapping('icon-angle-double-left');
$angleDoubleRight = $bootstrapHelper->getClassMapping('icon-angle-double-right');
$mapMarkerClass   = $bootstrapHelper->getClassMapping('icon-map-marker');
?>
<h1 class="eb-page-heading"><?php echo $this->escape(JText::_('EB_CALENDAR')); ?></h1>
<div id="extcalendar" class="eb-container">
    <div class="eb-topmenu_calendar <?php echo $bootstrapHelper->getClassMapping('row-fluid');?>">
        <div class="<?php echo $bootstrapHelper->getClassMapping('span7'); ?> today">
            <?php
                $startWeekTime = strtotime("$this->first_day_of_week");
                $endWeekTime   = strtotime("+6 day", strtotime($this->first_day_of_week));
                echo $daysInWeek[date('w', $startWeekTime)] . '. ' . date('d', $startWeekTime) . ' ' . $monthsInYear[date('n', $startWeekTime)] . ', ' . date('Y', $startWeekTime) . ' - ' . $daysInWeek[date('w', $endWeekTime)] . '. ' . date('d', $endWeekTime) . ' ' . $monthsInYear[date('n', $endWeekTime)] . ', ' . date('Y', $endWeekTime);
            ?>
        </div>
        <?php
        if ($this->showCalendarMenu)
        {
        ?>
            <div class="<?php echo $bootstrapHelper->getClassMapping('span5');?>">
                <?php echo EventbookingHelperHtml::loadCommonLayout('common/calendar_navigation.php', array('Itemid' => $this->Itemid, 'config' => $this->config, 'layout' => 'weekly', 'currentDateData' => $this->currentDateData)); ?>
            </div>
        <?php
        }
        ?>
    </div>
    <table cellpadding="0" cellspacing="0" width="100%" border="0">
        <tr class="tablec">
            <td class="previousweek">
                <a href="<?php echo JRoute::_("index.php?option=com_eventbooking&view=calendar&layout=weekly&date=".date('Y-m-d',strtotime("-7 day", strtotime($this->first_day_of_week)))."&Itemid=$this->Itemid"); ?>" rel="nofollow">
                    <i class="<?php echo $angleDoubleLeft; ?> eb-calendar-navigation" title="<?php echo JText::_('EB_PREVIOUS_WEEK')?>"></i>
                </a>
            </td>
            <td class="currentweek currentweektoday">
                <?php echo JText::_('EB_WEEK')?> <?php echo date('W',strtotime("+6 day", strtotime($this->first_day_of_week)));?>
            </td>
            <td class="nextweek">
                <a class="extcalendar" href="<?php echo JRoute::_("index.php?option=com_eventbooking&view=calendar&layout=weekly&date=".date('Y-m-d',strtotime("+7 day", strtotime($this->first_day_of_week)))."&Itemid=$this->Itemid"); ?>" rel="nofollow">
                    <i class="<?php echo $angleDoubleRight; ?> eb-calendar-navigation" title="<?php echo JText::_('EB_NEXT_WEEK')?>"></i>
                </a>
            </td>
        </tr>
    </table>
    <table class="eb-weekly-events-container" border="0">
        <?php
        if (empty($this->events))
        {
        ?>
        <tr>
            <td class="tableb center" colspan="2">
                <strong><?php echo JText::_('EB_NO_EVENTS_ON_THIS_WEEK'); ?></strong>
            </td>
        </tr>
        <?php
        }

        foreach ($this->events AS $key => $events)
        {
            if (empty($events))
            {
                continue;
            }
        ?>
        <tr>
            <td class="tableh2" colspan="2">
                <?php
                    $time = strtotime("+$key day", strtotime($this->first_day_of_week)) ;
                    echo $daysInWeek[date('w', $time)].'. '.date('d', $time).' '.$monthsInYear[date('n', $time)].', '.date('Y', $time) ;
                ?>
            </td>
        </tr>
         <?php
            foreach ($events as $event)
            {
                $url = JRoute::_(EventbookingHelperRoute::getEventRoute($event->id, 0, $this->Itemid));
            ?>
                <tr>
                    <td class="tablea">
                        <a href="<?php echo $url; ?>"><?php echo JHtml::_('date', $event->event_date, $timeFormat, null);?></a>
                    </td>
                    <td class="tableb">
                         <div class="eventdesc">
                            <h4><a href="<?php echo $url; ?>"><?php echo $event->title?></a></h4>
                            <p class="location-name">
                                <i class="<?php echo $mapMarkerClass; ?>"></i>
                                <a href="<?php echo JRoute::_('index.php?option=com_eventbooking&view=map&location_id='.$event->location_id.'&Itemid='.$this->Itemid.'&tmpl=component&format=html'); ?>" title="<?php echo $event->location_name ; ?>" class="eb-colorbox-map" rel="nofollow">
                                    <?php echo $event->location_name; ?>
                                </a>
                            </p>
                            <?php echo $event->short_description; ?>
                        </div>
                    </td>
                </tr>
         <?php
            }
        }
        ?>
    </table>
</div>