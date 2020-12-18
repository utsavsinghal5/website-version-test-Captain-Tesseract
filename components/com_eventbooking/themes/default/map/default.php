<?php
/**
 * @package        	Joomla
 * @subpackage		Event Booking
 * @author  		Tuan Pham Ngoc
 * @copyright    	Copyright (C) 2010 - 2020 Ossolution Team
 * @license        	GNU/GPL, see LICENSE.php
 */

defined( '_JEXEC' ) or die ;

JHtml::_('behavior.core');

$getDirectionLink = 'https://maps.google.com/maps?daddr=' . str_replace(' ', '+', $this->location->address);

$height    = (int) $this->config->map_height ?: 600;
$height    += 20;
$zoomLevel = (int) $this->config->zoom_level ?: 14;

$config = EventbookingHelper::getConfig();

$popupContent   = [];
$popupContent[] = '<h4>' . addslashes($this->location->name) . '</h4>';
$popupContent[] = '<ul>';
$popupContent[] = '<li>' . addslashes($this->location->address) . '</li>';
$popupContent[] = '<li class="address getdirection"><a href="' . $getDirectionLink . '" target="_blank">' . JText::_('EB_GET_DIRECTION') . '</a></li>';
$popupContent[] = '</ul>';
$popupContent   = implode('', $popupContent);

$document    = JFactory::getDocument();
$document->addScript('https://maps.google.com/maps/api/js?key=' . $config->get('map_api_key', ''))
	->addScriptOptions('lat', $this->location->lat)
	->addScriptOptions('long', $this->location->long)
	->addScriptOptions('zoomLevel', $zoomLevel)
	->addScriptOptions('popupContent', $popupContent);

EventbookingHelperHtml::addOverridableScript('media/com_eventbooking/js/site-map-default.min.js');

if ($this->location->image || EventbookingHelper::isValidMessage($this->location->description))
{
	$onPopup = false;
}
else
{
	$onPopup = true;
}
?>
<div id="eb-event-map-page" class="eb-container">
	<?php
	if (!$onPopup)
	{
	?>
		<h1 class="eb-page-heading"><?php echo $this->escape($this->location->name); ?></h1>
	<?php
	}

	if ($this->location->image && file_exists(JPATH_ROOT . '/' . $this->location->image))
	{
	?>
		<img src="<?php echo JUri::root(true) . '/' . $this->location->image; ?>" class="eb-venue-image img-polaroid" />
	<?php
	}

	if (EventbookingHelper::isValidMessage($this->location->description))
	{
	?>
		<div class="eb-location-description"><?php echo $this->location->description; ?></div>
	<?php
	}
	?>
	<div id="inline_map" style="height:<?php echo $height; ?>px; width:100%;"></div>
</div>
