<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined( '_JEXEC' ) or die ;

JHtml::_('behavior.core');
JHtml::_('bootstrap.tooltip');
JHtml::_('formbehavior.chosen', 'select');

$listOrder	= $this->state->filter_order;
$listDirn	= $this->state->filter_order_Dir;
$saveOrder	= $listOrder == 'tbl.ordering';

if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_eventbooking&task=sponsor.save_order_ajax';

	if (EventbookingHelper::isJoomla4())
    {
	    \Joomla\CMS\HTML\HTMLHelper::_('draggablelist.draggable');
    }
	else
    {
	    JHtml::_('sortablelist.sortable', 'sponsorsList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
    }
}

$customOptions = array(
	'filtersHidden'       => true,
	'defaultLimit'        => JFactory::getApplication()->get('list_limit', 20),
	'searchFieldSelector' => '#filter_search',
	'orderFieldSelector'  => '#filter_full_ordering'
);

JHtml::_('searchtools.form', '#adminForm', $customOptions);
?>
<form action="index.php?option=com_eventbooking&view=sponsors" method="post" name="adminForm" id="adminForm">
    <div id="j-main-container">
        <div id="filter-bar" class="btn-toolbar js-stools">
            <div class="filter-search btn-group pull-left">
                <label for="filter_search" class="element-invisible"><?php echo JText::_('EB_FILTER_SEARCH_SPEAKERS_DESC');?></label>
                <input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER'); ?>" value="<?php echo $this->escape($this->state->filter_search); ?>" class="hasTooltip" title="<?php echo JHtml::tooltipText('EB_SEARCH_SPEAKERS_DESC'); ?>" />
            </div>
            <div class="btn-group pull-left">
                <button type="submit" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_SUBMIT'); ?>"><span class="icon-search"></span></button>
                <button type="button" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.getElementById('filter_search').value='';this.form.submit();"><span class="icon-remove"></span></button>
            </div>
            <div class="btn-group pull-right">
                <?php
                    echo $this->lists['filter_event_id'];
                    echo $this->lists['filter_state'];
                ?>
            </div>
        </div>
        <div class="clearfix"></div>
        <table class="adminlist table table-striped" id="speakersList">
            <thead>
                <tr>
                    <th width="1%" class="nowrap center hidden-phone">
		                <?php echo JHtml::_('searchtools.sort', '', 'tbl.ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING', 'icon-menu-2'); ?>
                    </th>
                    <th width="20">
                        <input type="checkbox" name="toggle" value="" onclick="Joomla.checkAll(this)" />
                    </th>
                    <th class="title">
                        <?php echo JHtml::_('grid.sort',  JText::_('EB_NAME'), 'tbl.name', $this->state->filter_order_Dir, $this->state->filter_order ); ?>
                    </th>
                    <th class="title">
                        <?php echo JHtml::_('grid.sort',  JText::_('EB_LOGO'), 'tbl.logo', $this->state->filter_order_Dir, $this->state->filter_order ); ?>
                    </th>
                    <th class="title">
                        <?php echo JHtml::_('grid.sort',  JText::_('EB_WEBSITE'), 'tbl.website', $this->state->filter_order_Dir, $this->state->filter_order ); ?>
                    </th>
                    <th class="center" width="5%">
                        <?php echo JHtml::_('grid.sort',  JText::_('EB_ID'), 'tbl.id', $this->state->filter_order_Dir, $this->state->filter_order ); ?>
                    </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <?php echo $this->pagination->getListFooter(); ?>
                    </td>
                </tr>
            </tfoot>
            <tbody <?php if ($saveOrder) :?> class="js-draggable" data-url="<?php echo $saveOrderingUrl; ?>" data-direction="<?php echo strtolower($this->state->filter_order_Dir); ?>" <?php endif; ?>>
            <?php
            $k = 0;
            for ($i=0, $n=count( $this->items ); $i < $n; $i++)
            {
                $row       = $this->items[$i];
                $link      = JRoute::_('index.php?option=com_eventbooking&view=sponsor&id=' . $row->id);
                $checked   = JHtml::_('grid.id', $i, $row->id);
                ?>
                <tr class="<?php echo "row$k"; ?>">
                    <td class="order nowrap center hidden-phone">
		                <?php
		                $iconClass = '';
		                if (!$saveOrder)
		                {
			                $iconClass = ' inactive tip-top hasTooltip"';
		                }
		                ?>
                        <span class="sortable-handler<?php echo $iconClass ?>">
						<i class="icon-menu"></i>
						</span>
		                <?php if ($saveOrder) : ?>
                            <input type="text" style="display:none" name="order[]" size="5" value="<?php echo $row->ordering ?>" class="width-20 text-area-order "/>
		                <?php endif; ?>
                    </td>
                    <td>
                        <?php echo $checked; ?>
                    </td>
                    <td>
                        <a href="<?php echo $link; ?>">
                            <?php echo $row->name; ?>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo $link; ?>">
                            <?php echo $row->logo; ?>
                        </a>
                    </td>
                    <td>
                        <?php
                            if ($row->website)
                            {
                            ?>
                                <a href="<?php echo $row->website; ?>" target="_blank"><?php echo $row->website; ?></a>
                            <?php
                            }
                        ?>
                    </td>
                    <td class="center">
                        <?php echo $row->id; ?>
                    </td>
                </tr>
                <?php
                $k = 1 - $k;
            }
            ?>
            </tbody>
        </table>
    </div>
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="filter_order" value="<?php echo $this->state->filter_order; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $this->state->filter_order_Dir; ?>" />
    <?php echo JHtml::_( 'form.token' ); ?>
</form>