<?php
/**
 * @package        	Joomla
 * @subpackage		Event Booking
 * @author  		Tuan Pham Ngoc
 * @copyright    	Copyright (C) 2010 - 2020 Ossolution Team
 * @license        	GNU/GPL, see LICENSE.php
 */

defined( '_JEXEC' ) or die ;

if ($this->config->use_https)
{
	$ssl = 1;
}
else
{
	$ssl = 0;
}

EventbookingHelperJquery::colorbox('eb-modal');

JFactory::getDocument()->addScriptDeclaration('
    function cancelRegistration(registrantId)
    {
        var form = document.adminForm ;

        if (confirm("' . JText::_('EB_CANCEL_REGISTRATION_CONFIRM') . '"))
        {
            form.task.value = "registrant.cancel" ;
            form.id.value = registrantId ;
            form.submit() ;
        }
    }
');
?>
<div id="eb-search-result-page" class="eb-container">
<h1 class="eb-page-heading"><?php echo $this->escape(JText::_('EB_SEARCH_RESULT')); ?></h1>
<form method="post" name="adminForm" id="adminForm" action="<?php echo JRoute::_('index.php?option=com_eventbooking&view=search&layout=columns&Itemid='.$this->Itemid); ?>">
	<?php
	if (count($this->items))
	{
		$layoutData = [
			'events'          => $this->items,
			'config'          => $this->config,
			'Itemid'          => $this->Itemid,
			'nullDate'        => $this->nullDate,
			'ssl'             => $ssl,
			'viewLevels'      => $this->viewLevels,
			'bootstrapHelper' => $this->bootstrapHelper
		];

		echo EventbookingHelperHtml::loadCommonLayout('common/events_columns.php', $layoutData);
	}
	else
	{
	?>
        <p class="text-info"><?php echo JText::_('EB_NO_EVENTS_FOUND') ?></p>
	<?php
	}

	if ($this->pagination->total > $this->pagination->limit)
	{
	?>
		<div class="pagination">
			<?php echo $this->pagination->getPagesLinks(); ?>
		</div>
	<?php
	}
	?>
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="id" value="" />
	<input type="hidden" name="Itemid" value="<?php echo $this->Itemid; ?>" />
</form>
</div>