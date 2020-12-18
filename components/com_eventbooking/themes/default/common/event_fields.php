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
 * @var   EventbookingTableEvent $item
 */

foreach ($item->paramData as $param)
{
	if ($param['value'] && empty($param['hide']))
	{
		$paramValue = $param['value'];

		// Make the link click-able
		if (filter_var($paramValue, FILTER_VALIDATE_URL))
		{
			$paramValue = '<a href="' . $paramValue . '" target="_blank">' . $paramValue . '<a/>';
		}
		?>
        <tr class="eb-event-property">
            <td class="eb-event-property-label">
				<?php echo JText::_($param['title']); ?>
            </td>
            <td class="eb-event-property-value">
				<?php echo JText::_($paramValue); ?>
            </td>
        </tr>
		<?php
	}
}

