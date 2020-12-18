<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2017 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
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
			<?php echo $this->html('filter.search', $search, 'search', 'COM_EB_SEARCH_TOOLTIP_PENDING'); ?>
		</div>

		<div class="app-filter-bar__cell app-filter-bar__cell--divider-left">
			<div class="app-filter-bar__filter-wrap">
				<?php echo $this->html('filter.custom', $categoryFilter); ?>
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
		<table class="app-table table table-striped table-eb table-hover" data-table-grid>
			<thead>
				<tr>
					<td width="1%" class="center">
						<?php echo $this->html('grid.checkAll'); ?>
					</td>
					<td>
						<?php echo JHTML::_('grid.sort', 'Title', 'a.title', $orderDirection, $order ); ?>
					</td>
					<td width="20%">
						&nbsp;
					</td>
					<td width="10%" class="center">
						<?php echo JText::_('COM_EASYBLOG_TABLE_HEADING_CATEGORY'); ?>
					</td>
					<td width="10%" class="center">
						<?php echo JText::_('COM_EASYBLOG_TABLE_HEADING_AUTHOR'); ?>
					</td>
					<td width="15%" class="center">
						<?php echo JHTML::_('grid.sort', JText::_('COM_EASYBLOG_TABLE_HEADING_CREATED'), 'a.created', $orderDirection, $order ); ?>
					</th>
					<td width="5%" class="center">
						<?php echo JHTML::_('grid.sort', JText::_('COM_EASYBLOG_TABLE_HEADING_ID'), 'a.post_id', $orderDirection, $order ); ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($posts) { ?>
					<?php $i = 0; ?>
					<?php foreach ($posts as $post) { ?>
					<tr
						data-item
						data-id="<?php echo $post->uid;?>"
						data-title="<?php echo $post->title;?>"
					>
						<td>
							<?php echo $this->html('grid.id', $i++, $post->uid); ?>
						</td>
						<td>
							<a href="<?php echo EB::composer()->getComposeUrl(array('uid' => $post->id . '.' . $post->revision_id));?>"><?php echo $post->title;?></a>
						</td>
						<td class="center">
							<div>
								<a class="btn btn-primary btn-xs" href="javascript:void(0);" data-blog-accept data-id="<?php echo $post->uid;?>">
									<?php echo JText::_('COM_EASYBLOG_APPROVE_BUTTON');?>
								</a>
								&nbsp;
								<a class="btn btn-danger btn-xs" href="javascript:void(0);" data-blog-reject data-id="<?php echo $post->uid;?>">
									<?php echo JText::_('COM_EASYBLOG_REJECT_BUTTON');?>
								</a>
							</div>
						</td>
						<td class="center">
							<?php echo $post->getPrimaryCategory(true)->title;?>
						</td>
						<td class="center">
							<?php echo $post->getAuthor()->getName();?>
						</td>
						<td class="center">
							<?php echo $post->getCreationDate()->format(JText::_('DATE_FORMAT_LC1'));?>
						</td>
						<td class="center">
							<?php echo $post->id;?>
						</td>
					</tr>
					<?php } ?>
				<?php } else { ?>
				<tr>
					<td colspan="7" class="empty">
						<?php echo JText::_('COM_EASYBLOG_PENDING_EMPTY'); ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="7">
						<?php echo $pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
		</table>
	</td>

	<?php echo $this->html('form.action'); ?>
	<input type="hidden" name="view" value="blogs" />
	<input type="hidden" name="layout" value="pending" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="filter_order" value="<?php echo $order; ?>" />
	<input type="hidden" name="filter_order_Dir" value="" />
</form>
