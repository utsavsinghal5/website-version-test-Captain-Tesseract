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
 * Editor ebevent buton
 *
 * @package        Joomla.Plugin
 * @subpackage     Editors-xtd.ebevent
 */
class plgButtonEbevent extends JPlugin
{
	/**
	 * Constructor
	 *
	 * @access      protected
	 *
	 * @param   object  $subject  The object to observe
	 * @param   array   $config   An array that holds the plugin configuration
	 *
	 * @since       1.5
	 */
	public function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}

	/**
	 * Display the button
	 *
	 * @return array A four element array of (article_id, article_title, category_id, object)
	 */
	public function onDisplay($name)
	{

		$app = JFactory::getApplication();
		if ($app->isClient('site'))
		{
			return;
		}
		$js = "
			function jSelectEbevent(id) {
				var tag = '{ebevent '+id+'}';
				jInsertEditorText(tag, '" . $name . "');
				SqueezeBox.close();
			}";
		JFactory::getDocument()->addScriptDeclaration($js);
		JHtml::_('behavior.modal');
		$link = 'index.php?option=com_eventbooking&amp;view=events&amp;layout=modal&amp;function=jSelectEbevent&amp;tmpl=component&amp;' . JSession::getFormToken() . '=1';

		$button = new JObject();
		$button->set('modal', true);
		$button->set('link', $link);
		$button->set('text', JText::_('EB Event'));
		$button->set('name', 'ebevent');
		$button->set('options', "{handler: 'iframe', size: {x: 770, y: 400}}");
		$button->set('class', 'btn');

		return $button;
	}
}
