<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */
defined( '_JEXEC' ) or die ;
?>
<p class="message"><strong><?php echo JText::_('EB_SEF_SETTING_EXPLAIN'); ?></strong></p>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('default_menu_item', JText::_('EB_DEFAULT_MENU_ITEM'), JText::_('EB_DEFAULT_MENU_ITEM_EXPLAIN')); ?>
	</div>
	<div class="controls">
		<?php echo $this->lists['default_menu_item']; ?>
	</div>
</div>
<?php
$languages = EventbookingHelper::getLanguages();

if (JLanguageMultilang::isEnabled() && count($languages))
{
	foreach ($languages as $language)
	{
		$languageCode = $language->lang_code;
		$key          = 'default_menu_item_' . $languageCode;
	?>
		<div class="control-group">
			<div class="control-label">
				<?php echo EventbookingHelperHtml::getFieldLabel('default_menu_item', JText::_('EB_DEFAULT_MENU_ITEM') . '-' . $languageCode, JText::_('EB_DEFAULT_MENU_ITEM_EXPLAIN')); ?>
			</div>
			<div class="controls">
				<?php echo $this->lists[$key]; ?>
			</div>
		</div>
	<?php
	}
}
?>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('insert_event_id', JText::_('EB_INSERT_EVENT_ID'), JText::_('EB_INSERT_EVENT_ID_EXPLAIN')); ?>
	</div>
	<div class="controls">
		<?php echo EventbookingHelperHtml::getBooleanInput('insert_event_id', $config->insert_event_id); ?>
	</div>
</div>
<div class="control-group">
	<div class="control-label">
		<?php echo EventbookingHelperHtml::getFieldLabel('insert_category', JText::_('EB_INSERT_CATEGORY'), JText::_('EB_INSERT_CATEGORY_EXPLAIN')); ?>
	</div>
	<div class="controls">
		<?php echo $this->lists['insert_category']; ?>
	</div>
</div>
