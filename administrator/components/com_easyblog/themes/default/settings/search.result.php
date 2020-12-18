<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2019 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<?php if ($result) { ?>
	<?php foreach ($result as $page => $items) { ?>
	<div class="eb-settings-result">
		<h3 class="eb-settings-result__title"><?php echo ucwords($page);?></h3>
		<hr class="eb-settings-result__divider" />

		<ul class="eb-settings-result__list">
		<?php foreach ($items as $item) { ?>
			<?php $item = (object) $item; ?>
			<li>
				<a href="index.php?option=com_easyblog&view=settings&layout=<?php echo $page;?>&tab=<?php echo $item->tab;?>&goto=<?php echo $item->id;?>">
					<b><?php echo ucfirst($item->label);?></b>
				</a>
				<span><?php echo ucwords($page);?> &rarr; <?php echo ucfirst($item->tab);?></span>
			</li>
		<?php } ?>
		</ul>
	</div>
	<?php } ?>

<?php } else { ?>
<div class="eb-settings-result-empty">
	No results found based on your search keyword
</div>
<?php } ?>
