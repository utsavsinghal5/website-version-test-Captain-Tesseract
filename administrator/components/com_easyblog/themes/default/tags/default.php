<?php
/**
* @package  EasyBlog
* @copyright Copyright (C) 2010 - 2018 Stack Ideas Sdn Bhd. All rights reserved.
* @license  GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<form action="index.php" method="post" name="adminForm" id="adminForm" data-grid-eb>

	<div class="app-filter-bar">
		<div class="app-filter-bar__cell">
			<?php echo $this->html('filter.search', $search); ?>
		</div>

		<div class="app-filter-bar__cell app-filter-bar__cell--divider-left">
			<div class="app-filter-bar__filter-wrap">
				<?php echo $this->html('filter.published', 'filter_state', $filterState); ?>
			</div>
		</div>

		<div class="app-filter-bar__cell app-filter-bar__cell--divider-left"></div>

		<div class="app-filter-bar__cell app-filter-bar__cell--divider-left app-filter-bar__cell--last t-text--center">
			<div class="app-filter-bar__filter-wrap">
				<?php echo $this->html('filter.limit', $limit); ?>
			</div>
		</div>
	</div>

	<div class="panel-table">
		<table class="app-table app-table-middle table table-striped table-eb table-hover">
			<thead>
				<tr>
					<?php if(empty($browse)){ ?>
					<th class="center" width="1%">
						<?php echo $this->html('grid.checkAll'); ?>
					</th>
					<?php } ?>
					
					<th class="nowrap">
						<?php echo JHTML::_('grid.sort', 'COM_EASYBLOG_TABLE_COLUMN_TITLE', 'title', $orderDirection, $order ); ?>
					</th>

					<?php if (!$browse) { ?>
					<th width="5%" class="center">
						<?php echo JText::_('COM_EASYBLOG_DEFAULT'); ?>
					</th>
					<th width="5%" class="center">
						<?php echo JText::_('COM_EASYBLOG_PUBLISHED'); ?>
					</th>
					<?php } ?>

					<th class="text-center" width="5%">
						<?php echo JText::_('COM_EASYBLOG_TABLE_COLUMN_POSTS'); ?>
					</th>

					<th width="5%" class="center nowrap">
						<?php echo JText::_('COM_EASYBLOG_TABLE_COLUMN_LANGUAGE'); ?>
					</th>

					<th class="center" width="15%">
						<?php echo JHTML::_('grid.sort', 'COM_EASYBLOG_AUTHOR', 'created_by', $orderDirection, $order); ?>
					</th>
					
					<th class="center" width="1%">
						<?php echo JText::_('COM_EASYBLOG_ID'); ?>
					</th>
				</tr>
			</thead>

			<tbody>
				<?php if( $tags ){ ?>
					<?php $i = 0; ?>
					<?php foreach ($tags as $row) { ?>
						<tr>
							<?php if (!$browse){ ?>
							<td class="center">
								<?php echo $this->html('grid.id', $i, $row->id); ?>
							</td>
							<?php } ?>

							<td align="left">
								<?php if( $browse ){ ?>
									<a href="javascript:void(0);" onclick="parent.<?php echo $browsefunction; ?>('<?php echo $row->id;?>','<?php echo addslashes($this->escape($row->title));?>');">
								<?php } else {?>
									<a href="index.php?option=com_easyblog&view=tags&layout=form&id=<?php echo $row->id;?>">
								<?php } ?>
									<?php echo $row->title; ?>
								</a>
							</td>

							<?php if( !$browse ){ ?>
							<td class="text-center">
								<?php echo $this->html('grid.featured', $row, 'tags', 'default', array('tags.setDefault', 'tags.removeDefault')); ?>
							</td>

							<td class="text-center">
								<?php echo $this->html('grid.published', $row, 'tags', 'published'); ?>
							</td>
							<?php } ?>

							<td class="center">
								<a href="<?php echo JRoute::_('index.php?option=com_easyblog&view=blogs&tagid=' . $row->id);?>"><?php echo $row->count;?></a>
							</td>

							<td class="center">
								<?php if (!$row->language || $row->language == '*') { ?>
									<?php echo JText::_('COM_EASYBLOG_LANGUAGE_ALL');?>
								<?php } else { ?>
									<?php echo $row->language;?>
								<?php } ?>
							</td>
							
							<td class="center">
								<a href="<?php echo JRoute::_('index.php?option=com_easyblog&c=user&id=' . $row->created_by . '&task=edit'); ?>"><?php echo JFactory::getUser($row->created_by)->name; ?></a>
							</td>
							<td class="center">
								<?php echo $row->id;?>
							</td>
						</tr>
						<?php $i++; ?>
					<?php } ?>

				<?php } else { ?>
				<tr>
					<td colspan="9" class="empty">
						<?php echo JText::_('COM_EASYBLOG_TAGS_NO_TAG_CREATED');?>
					</td>
				</tr>
				<?php } ?>
			</tbody>

			<tfoot>
				<tr>
					<td colspan="11">
						<?php echo $pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>

	<?php echo $this->html('form.action'); ?>

	<?php if ($browse) { ?>
	<input type="hidden" name="tmpl" value="component" />
	<input type="hidden" name="browseFunction" value="<?php echo $browsefunction;?>" />
	<?php } ?>

	<input type="hidden" name="browse" value="<?php echo $browse;?>" />
	<input type="hidden" name="view" value="tags" />
	<input type="hidden" name="filter_order" value="<?php echo $order; ?>" />
	<input type="hidden" name="filter_order_Dir" value="" />
</form>
