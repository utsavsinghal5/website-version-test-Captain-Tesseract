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
			<?php echo $this->html('filter.search', $search, 'search', 'COM_EB_SEARCH_TOOLTIP_DRAFTS'); ?>
		</div>

		<div class="app-filter-bar__cell app-filter-bar__cell--divider-left">
			<div class="app-filter-bar__filter-wrap">
				<?php echo $this->html('filter.custom', $categoryFilter); ?>
			</div>
		</div>

		<div class="app-filter-bar__cell app-filter-bar__cell--divider-left">
			<div class="app-filter-bar__filter-wrap">
				<?php echo $this->html('filter.custom', $authorFilter); ?>
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
		<table class="app-table table table-striped table-eb table-hover">
			<thead>
				<tr>
					<th width="1%" class="center">
						<?php echo $this->html('grid.checkAll'); ?>
					</th>
					<th>
						<?php echo JHTML::_('grid.sort', JText::_('COM_EASYBLOG_BLOGS_BLOG_TITLE'), 'a.title', $orderDirection, $order ); ?>
					</th>
					<th width="20%" class="text-center">
						<?php echo JText::_('COM_EASYBLOG_TABLE_HEADING_CATEGORY'); ?>
					</th>
					<th width="10%" class="center">
						<?php echo JText::_('COM_EASYBLOG_TABLE_HEADING_AUTHOR'); ?>
					</th>
					<th width="20%" class="nowrap center hidden-phone"><?php echo JHTML::_('grid.sort', 'COM_EASYBLOG_DATE', 'a.created', $orderDirection, $order ); ?></th>

					<th width="1%" nowrap="nowrap center">
						<?php echo JHTML::_('grid.sort', 'COM_EASYBLOG_TABLE_COLUMN_ID', 'a.id', $orderDirection, $order ); ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($drafts) { ?>
					<?php $i = 0; ?>
					<?php foreach ($drafts as $draft) { ?>
					<tr>
						<td>
							<?php echo $this->html('grid.id', $i++, $draft->revision->id); ?>
						</td>
						<td>
							<div style="max-width: 450px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
								<a href="<?php echo EB::composer()->getComposeUrl(array('uid' => $draft->id . '.' . $draft->revision_id));?>">
									<?php echo ($draft->title) ? $draft->title : $draft->revision->getTitle(); ?> (<?php echo JText::sprintf('COM_EASYBLOG_DRAFTS_REVISION_NUMBER', $draft->revisionOrdering); ?>)
								</a>
							</div>
						</td>
						<td class="center">
							<?php echo ($draft->getPrimaryCategory()) ? $draft->getPrimaryCategory()->getTitle() : '-'; ?>
						</td>
						<td class="center">
							<?php echo $draft->getAuthor()->getName();?>
						</td>
						<td class="center">
							<?php echo $draft->getCreationDate()->toFormat(JText::_('DATE_FORMAT_LC1'));?>
						</td>
						<td class="center">
							<?php echo $draft->revision->id;?>
						</td>
					</tr>
					<?php } ?>
				<?php } else { ?>
				<tr>
					<td colspan="6" class="empty">
						<?php echo JText::_('COM_EASYBLOG_DRAFTS_EMPTY'); ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="6">
						<?php echo $pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
		</table>
	</td>

	<?php echo $this->html('form.action'); ?>
	<input type="hidden" name="view" value="blogs" />
	<input type="hidden" name="layout" value="drafts" />
	<input type="hidden" name="filter_order" value="<?php echo $order; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $orderDirection; ?>" />
</form>
