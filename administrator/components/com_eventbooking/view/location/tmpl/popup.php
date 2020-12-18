<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

JHtml::_('behavior.core') ;

$document = JFactory::getDocument();
$rootUri  = JUri::root(true);
$document->addScript($rootUri . '/media/com_eventbooking/assets/js/eventbookingjq.min.js');
EventbookingHelperJquery::validateForm();

/* @var EventbookingHelperBootstrap $bootstrapHelper */
$bootstrapHelper   = EventbookingHelperHtml::getAdminBootstrapHelper();
$controlGroupClass = $bootstrapHelper->getClassMapping('control-group');
$controlLabelClass = $bootstrapHelper->getClassMapping('control-label');
$controlsClass     = $bootstrapHelper->getClassMapping('controls');
$span7Class        = $bootstrapHelper->getClassMapping('span7');
$span5Class        = $bootstrapHelper->getClassMapping('span5');
$btnPrimary        = $bootstrapHelper->getClassMapping('btn btn-primary');

$config = $this->config;
$mapApiKye = $config->get('map_api_key', '');

if (trim($config->center_coordinates))
{
	$coordinates = $config->center_coordinates;
}
else
{
	$http     = JHttpFactory::getHttp();
	$url      = "https://maps.googleapis.com/maps/api/geocode/json?address=" . str_replace(' ', '+', $config->default_country) . "&key=" . $mapApiKye;
	$response = $http->get($url);

	if ($response->code == 200)
	{
		$output_deals = json_decode($response->body);
		$latLng       = $output_deals->results[0]->geometry->location;
		$coordinates  = $latLng->lat . ',' . $latLng->lng;
	}
	else
	{
		$coordinates = '37.09024,-95.712891';
	}

	if (trim($coordinates) == ',')
	{
		$coordinates = '37.09024,-95.712891';
	}
}

$document->addScript('https://maps.google.com/maps/api/js?key='.$mapApiKye)
	->addScript($rootUri . '/media/com_eventbooking/js/admin-location-popup.min.js')
	->addScriptOptions('coordinates', explode(',', $coordinates))
	->addScriptOptions('baseUri', JUri::base(true));
?>
<form action="index.php?option=com_eventbooking&view=location" method="post" name="adminForm" id="adminForm" class="form form-horizontal">
<h1 class="eb-page-heading"><?php echo $this->escape(JText::_('EB_ADD_EDIT_LOCATION')); ?></h1>
    <div  class="<?php echo $span5Class ?>">
    	<div class="<?php echo $controlGroupClass;  ?>">
    		<label class="<?php echo $controlLabelClass; ?>">
    			<?php echo JText::_('EB_NAME'); ?>
    			<span class="required">*</span>
    		</label>
    		<div class="<?php echo $controlsClass; ?>">
    			<input class="input-large validate[required]" type="text" name="name" id="name" size="50" maxlength="250" value="<?php echo $this->escape($this->item->name); ?>" />
    		</div>
    	</div>
    
    	<div class="<?php echo $controlGroupClass;  ?>">
    		<label class="<?php echo $controlLabelClass; ?>">
    			<?php echo JText::_('EB_ADDRESS'); ?>
    			<span class="required">*</span>
    		</label>
    		<div class="<?php echo $controlsClass; ?>">
      	         <input class="input-large validate[required]" type="text" name="address" id="address" size="70" autocomplete="off" maxlength="250" value="<?php echo $this->escape($this->item->address);?>" />
    			<ul id="eventmaps_results" style="display:none;"></ul>
    		</div>
    	</div>
	    <?php
	    if (EventbookingHelper::isModuleEnabled('mod_eb_cities'))
	    {
		?>
            <div class="<?php echo $controlGroupClass;  ?>">
                <label class="<?php echo $controlLabelClass; ?>">
				    <?php echo JText::_('EB_CITY'); ?>
			    </label>
			    <div class="<?php echo $controlsClass; ?>">
				    <input class="text_area" type="text" name="city" id="city" size="30" maxlength="250" value="<?php echo $this->escape($this->item->city);?>" />
			    </div>
		    </div>
		<?php
	    }

	    if (EventbookingHelper::isModuleEnabled('mod_eb_states'))
	    {
		?>
            <div class="<?php echo $controlGroupClass;  ?>">
                <label class="<?php echo $controlLabelClass; ?>">
				    <?php echo JText::_('EB_STATE'); ?>
			    </label>
                <div class="<?php echo $controlsClass; ?>">
				    <input class="text_area" type="text" name="state" id="state" size="30" maxlength="250" value="<?php echo $this->escape($this->item->state);?>" />
			    </div>
		    </div>
		<?php
	    }
	    ?>
    	<div class="<?php echo $controlGroupClass;  ?>">
    		<label class="<?php echo $controlLabelClass; ?>">
    			<?php echo JText::_('EB_COORDINATES'); ?>
    		</label>
    		<div class="<?php echo $controlsClass; ?>">
    			<input class="input-large validate[required]" type="text" name="coordinates" id="coordinates" size="30" maxlength="250" value="" />
    		</div>
    	</div>
	    <div class="<?php echo $controlGroupClass;  ?>">
		    <label class="<?php echo $controlLabelClass; ?>">
			    <?php echo JText::_('EB_PUBLISHED') ; ?>
		    </label>
		    <?php echo $this->lists['published']; ?>
	    </div>
     </div>
     <div class="<?php echo $span7Class ?>">
        <div class="<?php echo $controlGroupClass;  ?>">
    		<div id="map-canvas" style="width: 95%; height: 350px"></div><br>
    	</div>
     </div>
     <div class="row-fluid">
         <button id="save_location" class="<?php echo $btnPrimary; ?>" type="submit"><span class="icon-save"></span><?php echo JText::_('EB_SAVE'); ?></button>
   		<input type="button" id="btn-get-location-from-address" class="btn btn-info" value="<?php echo JText::_('EB_PINPOINT'); ?> &raquo;" />
   	</div>
	<input type="hidden" name="published" value="1" />
	<input type="hidden" name="Itemid" value="<?php echo $this->Itemid; ?>" />
	<?php echo JHtml::_( 'form.token' ); ?>
</form>