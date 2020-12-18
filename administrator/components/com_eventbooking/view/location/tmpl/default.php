<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined( '_JEXEC' ) or die;

JHtml::_('behavior.core');

$config      = EventbookingHelper::getConfig();
$mapProvider = $config->get('map_provider', 'googlemap');
$mapApiKye   = $config->get('map_api_key', '');
$zoomLevel   = (int) $config->get('zoom_level') ?: 14;

if ($this->item->id)
{
	$coordinates = $this->item->lat . ',' . $this->item->long;
}
elseif (trim($config->center_coordinates))
{
	$coordinates = trim($config->center_coordinates);
}
else
{
	if ($mapProvider === 'googlemap')
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
	}
	else
	{
		$coordinates = '37.09024,-95.712891';
	}
}

$coordinates = explode(',', $coordinates);

$editor       = JEditor::getInstance(JFactory::getConfig()->get('editor', 'none'));
$translatable = JLanguageMultilang::isEnabled() && count($this->languages);

if ($translatable && !EventbookingHelper::isJoomla4())
{
	JHtml::_('behavior.tabstate');
}

$document = JFactory::getDocument();
$rootUri  = JUri::root(true);

if ($mapProvider === 'googlemap')
{
	JFactory::getDocument()->addScript('https://maps.google.com/maps/api/js?key=' . $mapApiKye)
		->addScript($rootUri . '/media/com_eventbooking/js/admin-location-default.min.js');
}
else
{
	JFactory::getDocument()
		->addScript($rootUri . '/media/com_eventbooking/assets/js/leaflet/leaflet.js')
		->addScript($rootUri . '/media/com_eventbooking/assets/js/autocomplete/jquery.autocomplete.min.js')
		->addStyleSheet($rootUri . '/media/com_eventbooking/assets/js/leaflet/leaflet.css')
		->addScript($rootUri . '/media/com_eventbooking/js/admin-location-openstreetmap.min.js')
		->addScriptOptions('baseUri', JUri::base(true));
}

$document->addScriptOptions('coordinates', $coordinates)
	->addScriptOptions('zoomLevel', $zoomLevel);

JText::script('EB_ENTER_LOCATION', true);

$bootstrapHelper = EventbookingHelperHtml::getAdminBootstrapHelper();
?>
<form action="index.php?option=com_eventbooking&view=location" method="post" name="adminForm" id="adminForm" class="form form-horizontal">
<div class="<?php echo $bootstrapHelper->getClassMapping('row-fluid'); ?>">
	<?php
	if ($translatable)
	{
		echo JHtml::_('bootstrap.startTabSet', 'field', array('active' => 'general-page'));
		echo JHtml::_('bootstrap.addTab', 'field', 'general-page', JText::_('EB_GENERAL', true));
	}
	?>
	<div class="<?php echo $bootstrapHelper->getClassMapping('span6'); ?>">
		<div class="control-group">
			<div class="control-label">
				<?php echo JText::_('EB_NAME'); ?>
			</div>
			<div class="controls">
				<input class="text_area" type="text" name="name" id="name" size="50" maxlength="250" value="<?php echo $this->item->name;?>" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<?php echo JText::_('EB_ALIAS'); ?>
			</div>
			<div class="controls">
				<input class="text_area" type="text" name="alias" id="alias" size="50" maxlength="250" value="<?php echo $this->item->alias;?>" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<?php echo JText::_('EB_ADDRESS'); ?>
			</div>
			<div class="controls">
				<input class="input-xlarge" type="text" name="address" id="address" size="50" autocomplete="off" maxlength="250" value="<?php echo $this->item->address;?>" />
				<ul id="eventmaps_results" style="display:none;"></ul>
			</div>
		</div>

		<?php
			if (EventbookingHelper::isModuleEnabled('mod_eb_cities'))
			{
			?>
				<div class="control-group">
					<div class="control-label">
						<?php echo JText::_('EB_CITY'); ?>
					</div>
					<div class="controls">
						<input class="text_area" type="text" name="city" id="city" size="30" maxlength="250" value="<?php echo $this->item->city;?>" />
					</div>
				</div>
			<?php
			}

			if (EventbookingHelper::isModuleEnabled('mod_eb_states'))
			{
			?>
				<div class="control-group">
					<div class="control-label">
						<?php echo JText::_('EB_STATE'); ?>
					</div>
					<div class="controls">
						<input class="text_area" type="text" name="state" id="state" size="30" maxlength="250" value="<?php echo $this->item->state;?>" />
					</div>
				</div>
			<?php
			}
		?>

		<div class="control-group">
			<div class="control-label">
				<?php echo JText::_('EB_COORDINATES'); ?>
			</div>
			<div class="controls">
				<input class="text_area" type="text" name="coordinates" id="coordinates" size="30" maxlength="250" value="<?php echo $this->item->lat.','.$this->item->long;?>" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<?php echo JText::_('EB_LAYOUT'); ?>
			</div>
			<div class="controls">
				<?php echo $this->lists['layout']; ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<?php echo JText::_('EB_CREATED_BY'); ?>
			</div>
			<div class="controls">
				<?php echo EventbookingHelper::getUserInput($this->item->user_id, 'user_id', 100) ; ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label"><?php echo JText::_('EB_IMAGE'); ?></div>
			<div class="controls">
				<?php echo EventbookingHelperHtml::getMediaInput($this->item->image, 'image'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<?php echo  JText::_('EB_DESCRIPTION'); ?>
			</div>
			<div class="controls">
				<?php echo $editor->display( 'description',  $this->item->description , '100%', '250', '90', '10' ) ; ?>
			</div>
		</div>
		<?php
			if (JLanguageMultilang::isEnabled())
			{
			?>
				<div class="control-group">
					<div class="control-label">
						<?php echo JText::_('EB_LANGUAGE'); ?>
					</div>
					<div class="controls">
						<?php echo $this->lists['language'] ; ?>
					</div>
				</div>
			<?php
			}
		?>
		<div class="control-group">
			<div class="control-label">
				<?php echo JText::_('EB_PUBLISHED') ; ?>
			</div>
			<div class="controls">
				<?php echo $this->lists['published']; ?>
			</div>
		</div>
	</div>
	<div class="<?php echo $bootstrapHelper->getClassMapping('span6'); ?>">
		<div class="control-group">
            <?php
            if ($mapProvider === 'googlemap')
            {
            ?>
                <input type="button" id="btn-get-location-from-address" value="<?php echo JText::_('EB_PINPOINT'); ?> &raquo;" />
                <br/><br/>
            <?php
            }
            ?>
			<div id="map-canvas" style="width: 95%; height: 400px"></div>
		</div>
	</div>

	<?php
	if ($translatable)
	{
		echo JHtml::_('bootstrap.endTab');
		echo JHtml::_('bootstrap.addTab', 'field', 'translation-page', JText::_('EB_TRANSLATION', true));
		echo JHtml::_('bootstrap.startTabSet', 'field-translation', array('active' => 'translation-page-'.$this->languages[0]->sef));

		foreach ($this->languages as $language)
		{
			$sef = $language->sef;
			echo JHtml::_('bootstrap.addTab', 'field-translation', 'translation-page-' . $sef, $language->title . ' <img src="' . JUri::root() . 'media/com_eventbooking/flags/' . $sef . '.png" />');
			?>
			<div class="control-group">
				<div class="control-label">
					<?php echo  JText::_('EB_NAME'); ?>
				</div>
				<div class="controls">
					<input class="input-xlarge" type="text" name="name_<?php echo $sef; ?>" id="title_<?php echo $sef; ?>" size="" maxlength="250" value="<?php echo $this->item->{'name_'.$sef}; ?>" />
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<?php echo  JText::_('EB_ALIAS'); ?>
				</div>
				<div class="controls">
					<input class="input-xlarge" type="text" name="alias_<?php echo $sef; ?>" id="alias_<?php echo $sef; ?>" size="" maxlength="250" value="<?php echo $this->item->{'alias_'.$sef}; ?>" />
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<?php echo JText::_('EB_DESCRIPTION'); ?>
				</div>
				<div class="controls">
					<?php echo $editor->display('description_' . $sef, $this->item->{'description_' . $sef}, '100%', '250', '75', '10'); ?>
				</div>
			</div>
			<?php
			echo JHtml::_('bootstrap.endTab');
		}
		echo JHtml::_('bootstrap.endTabSet');
		echo JHtml::_('bootstrap.endTab');
		echo JHtml::_('bootstrap.endTabSet');
	}
	?>
</div>
<div class="clearfix"></div>
    <input type="hidden" name="id" value="<?php echo (int) $this->item->id; ?>"/>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_( 'form.token' ); ?>
</form>
<style>
	#map-canvas img{
		max-width:none !important;
	}
</style>