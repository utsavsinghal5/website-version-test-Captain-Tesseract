<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

/**
 * Layout variables
 * -----------------
 * @var   string $controlGroupClass
 * @var   int $articleId
 */

if (JLanguageMultilang::isEnabled())
{
	$associations = JLanguageAssociations::getAssociations('com_content', '#__content', 'com_content.item', $articleId);
	$langCode     = JFactory::getLanguage()->getTag();

	if (isset($associations[$langCode]))
	{
		$article = $associations[$langCode];
	}
}

if (!isset($article))
{
	$db    = JFactory::getDbo();
	$query = $db->getQuery(true);
	$query->select('id, catid')
		->from('#__content')
		->where('id = ' . (int) $articleId);
	$db->setQuery($query);
	$article = $db->loadObject();
}

JLoader::register('ContentHelperRoute', JPATH_ROOT . '/components/com_content/helpers/route.php');

if ($this->config->open_article_on_new_window)
{
	$termLink = ContentHelperRoute::getArticleRoute($article->id, $article->catid) . '&format=html';
	$linkAttrs = 'target="_blank"';
}
else
{
	EventbookingHelperJquery::colorbox('eb-colorbox-term');
	$termLink = ContentHelperRoute::getArticleRoute($article->id, $article->catid) . '&tmpl=component&format=html';
	$linkAttrs = 'class="eb-colorbox-term"';
}
?>
<div class="<?php echo $controlGroupClass;  ?> eb-terms-and-conditions-container">
	<label class="checkbox">
		<input type="checkbox" name="accept_term" value="1" class="validate[required]<?php echo $this->bootstrapHelper->getFrameworkClass('uk-checkbox', 1); ?>" data-errormessage="<?php echo JText::_('EB_ACCEPT_TERMS');?>" />
		<?php echo JText::_('EB_ACCEPT') . ' <a ' . $linkAttrs . ' href="' . JRoute::_($termLink) . '"><strong>' . JText::_('EB_TERM_AND_CONDITION') . '</strong></a>'; ?>
	</label>
</div>