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
<form name="adminForm" id="adminForm" class="ebForm" action="index.php" method="post" data-grid-eb>
	<div class="panel-table">
		<div class="alert alert-warning">
			<i class="fa fa-support"></i>&nbsp; <?php echo JText::_('COM_EASYBLOG_LANGUAGES_INFO_NOTE'); ?> 
			<a href="https://stackideas.com/docs/easyblog/administrators/translations/becoming-an-official-translator" target="_blank" class="btn btn-sm btn-default">
				<i class="fa fa-external-link"></i>&nbsp; <?php echo JText::_('COM_EASYBLOG_BE_TRANSLATOR');?>
			</a>
		</div>

		<table class="app-table table table-striped table-eb table-hover" data-mailer-list>
			<thead>
				<tr>
				<th width="1%">
					<?php echo $this->html('grid.checkAll'); ?>
				</th>
				<th>
					<?php echo JText::_('COM_EASYBLOG_TABLE_COLUMN_TITLE'); ?>
				</th>
				<th width="10%" class="center">
					<?php echo JText::_('COM_EASYBLOG_TABLE_COLUMN_LOCALE'); ?>
				</th>
				<th width="15%" class="center">
					<?php echo JText::_('COM_EASYBLOG_TABLE_COLUMN_STATE'); ?>
				</th>
				<th width="10%" class="center">
					<?php echo JText::_('COM_EASYBLOG_TABLE_COLUMN_PROGRESS'); ?>
				</th>
				<th width="10%" class="center">
					<?php echo JText::_('COM_EASYBLOG_TABLE_COLUMN_LAST_UPDATED'); ?>
				</th>
				<th width="5%" class="center">
					<?php echo JText::_('COM_EASYBLOG_TABLE_COLUMN_ID'); ?>
				</th>
				</tr>
			</thead>
			<tbody>
				<?php if( $languages ){ ?>

					<?php $i = 0; ?>
					<?php foreach( $languages as $language ){ ?>
					<tr data-mailer-item data-id="<?php echo $language->id;?>">
						<td class="center">
							<?php echo $this->html( 'grid.id' , $i , $language->id ); ?>
						</td>
						<td>
							<?php echo $language->title;?>
						</td>
						<td class="center">
							<?php echo $language->locale;?>
						</td>
						<td class="center">
							<?php if( $language->state == EBLOG_LANGUAGES_INSTALLED ){ ?>
							<b class="text-success">
								<?php echo JText::_('COM_EASYBLOG_LANGUAGES_INSTALLED'); ?>
							</b>
							<?php } ?>

							<?php if( $language->state == EBLOG_LANGUAGES_NEEDS_UPDATING ){ ?>
							<b class="text-danger">
								<?php echo JText::_('COM_EASYBLOG_LANGUAGES_REQUIRES_UPDATING'); ?>
							</b>
							<?php } ?>

							<?php if( $language->state == EBLOG_LANGUAGES_NOT_INSTALLED ){ ?>
							<span class="">
								<?php echo JText::_('COM_EASYBLOG_LANGUAGES_NOT_INSTALLED'); ?>
							</span>
							<?php } ?>
						</td>
						<td class="center">
							<?php echo !$language->progress ? 0 : $language->progress;?> %
						</td>
						<td class="center">
							<?php echo $language->updated; ?>
						</td>
						<td class="center">
							<?php echo $language->id; ?>
						</td>
					</tr>
					<?php $i++; ?>
					<?php } ?>

				<?php } else { ?>
				<?php } ?>
			</tbody>

			<tfoot>
				<tr>
					<td colspan="8">
					</td>
				</tr>
			</tfoot>
		</table>
	</div>

	<?php echo $this->html('form.action'); ?>
</form>
