<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined( '_JEXEC' ) or die;

JToolBarHelper::title(JText::_('EB_DASHBOARD'), 'generic.png');
?>
<table>
	<tr>
		<td valign="top">
			<div id="cpanel">
				<?php
					$this->quickiconButton('index.php?option=com_eventbooking&view=configuration', 'icon-48-eventbooking-config.png', JText::_('EB_CONFIGURATION'));
					$this->quickiconButton('index.php?option=com_eventbooking&view=categories', 'icon-48-eventbooking-categories.png', JText::_('EB_CATEGORIES'));
					$this->quickiconButton('index.php?option=com_eventbooking&view=events', 'icon-48-eventbooking-events.png', JText::_('EB_EVENTS'));
					$this->quickiconButton('index.php?option=com_eventbooking&view=registrants', 'icon-48-eventbooking-registrants.png', JText::_('EB_REGISTRANTS'));
					$this->quickiconButton('index.php?option=com_eventbooking&view=fields', 'icon-48-eventbooking-fields.png', JText::_('EB_CUSTOM_FIELDS'));
					$this->quickiconButton('index.php?option=com_eventbooking&view=locations', 'icon-48-eventbooking-locations.png', JText::_('EB_LOCATIONS'));
					$this->quickiconButton('index.php?option=com_eventbooking&view=coupons', 'icon-48-eventbooking-coupons.png', JText::_('EB_COUPONS'));
					$this->quickiconButton('index.php?option=com_eventbooking&view=plugins', 'icon-48-eventbooking-payments.png', JText::_('EB_PAYMENT_PLUGINS'));					
					$this->quickiconButton('index.php?option=com_eventbooking&view=language', 'icon-48-eventbooking-language.png', JText::_('EB_TRANSLATION'));
					$this->quickiconButton('index.php?option=com_eventbooking&view=message', 'icon-48-mail.png', JText::_('EB_EMAIL_MESSAGES'));
					$this->quickiconButton('index.php?option=com_eventbooking&task=registrant.export', 'icon-48-eventbooking-export.png', JText::_('EB_EXPORT_REGISTRANTS'));

					//Permission settings
					$return = urlencode(base64_encode(JUri::getInstance()->toString()));

					$this->quickiconButton('index.php?option=com_config&amp;view=component&amp;component=com_eventbooking&amp;return=' . $return, 'icon-48-acl.png', JText::_('EB_PERMISSIONS'));
					$this->quickiconButton('index.php?option=com_eventbooking&view=massmail', 'icon-48-eventbooking-massmail.png', JText::_('EB_MASS_MAIL'));
                    $this->quickiconButton('index.php?option=com_eventbooking&view=countries', 'icon-48-countries.png', JText::_('EB_COUNTRIES'));
					$this->quickiconButton('index.php?option=com_eventbooking&view=states', 'icon-48-states.png', JText::_('EB_STATES'));

					if ($this->config->check_new_version_in_dashboard !== '0')
					{
						$this->quickiconButton('index.php?option=com_eventbooking', 'icon-48-download.png', JText::_('EB_UPDATE_CHECKING'), 'update-check');
					}
				?>
			</div>
		</td>
		<td valign="top" width="55%">
			<?php
                echo JHtml::_('bootstrap.startAccordion', 'statistics_pane', array('active' => 'statistic'));
                echo JHtml::_('bootstrap.addSlide', 'statistics_pane', JText::_('EB_STATISTICS'), 'statistic');
                echo $this->loadTemplate('statistics');
                echo JHtml::_('bootstrap.endSlide');
                echo JHtml::_('bootstrap.addSlide', 'statistics_pane', JText::_('EB_UPCOMING_EVENTS'), 'upcoming_events');
                echo $this->loadTemplate('upcoming_events');
                echo JHtml::_('bootstrap.endSlide');
                echo JHtml::_('bootstrap.addSlide', 'statistics_pane', JText::_('EB_LATEST_REGISTRANTS'), 'registrants');
                echo $this->loadTemplate('registrants');
                echo JHtml::_('bootstrap.endSlide');
                echo JHtml::_('bootstrap.addSlide', 'statistics_pane', JText::_('EB_USEFUL_LINKS'), 'links_panel');
                echo $this->loadTemplate('useful_links');
                echo JHtml::_('bootstrap.endSlide');
                echo JHtml::_('bootstrap.endAccordion');
			?>
		</td>
	</tr>
</table>
<style>
	#statistics_pane
    {
		margin:0px !important
	}
</style>
<?php
if ($this->config->check_new_version_in_dashboard !== '0')
{
	JHtml::_('behavior.core');

	$document = JFactory::getDocument();
	$baseUri  = JUri::base(true);

	$document->addScript(JUri::root(true) . '/media/com_eventbooking/js/admin-dashboard-default.min.js');
	$document->addScriptOptions('upToDateImg', $baseUri . '/components/com_eventbooking/assets/icons/icon-48-jupdate-uptodate.png');
	$document->addScriptOptions('updateFoundImg', $baseUri . '/components/com_eventbooking/assets/icons/icon-48-jupdate-updatefound.png');
	$document->addScriptOptions('updateFoundImg', $baseUri . '/components/com_eventbooking/assets/icons/icon-48-deny.png');

	JText::script('EB_UPDATE_CHECKING_ERROR', true);
}