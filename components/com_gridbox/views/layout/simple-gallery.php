<?php
/**
* @package   Gridbox
* @author    Balbooa http://www.balbooa.com/
* @copyright Copyright @ Balbooa
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined('_JEXEC') or die;

ob_start();
$obj->items->{'item-'.$now} = gridboxHelper::getOptions('simple-gallery');
?>
<div class="ba-item-simple-gallery ba-item" id="<?php echo 'item-'.$now; ?>">
	<div class="instagram-wrapper">
<?php
    foreach ($data as $key => $image) {
?>
        <div class="ba-instagram-image" style="background-image: url(<?php echo JUri::root().$image; ?>)">
            <img src="<?php echo JUri::root().$image; ?>" data-src="<?php echo $image; ?>">
            <div class="ba-simple-gallery-image"></div>
            <div class="ba-simple-gallery-caption">
                <div class="ba-caption-overlay"></div>
                <h3 class="ba-simple-gallery-title"></h3>
                <div class="ba-simple-gallery-description"></div>
            </div>
        </div>
<?php
    }
?>
        <div class="empty-list">
            <i class="zmdi zmdi-alert-polygon"></i>
            <p><?php echo JText::_('NO_ITEMS_HERE'); ?></p>
        </div>
    </div>
	<div class="ba-edit-item">
        <span class="ba-edit-wrapper edit-settings">
            <i class="zmdi zmdi-settings"></i>
            <span class="ba-tooltip tooltip-delay">
                <?php echo JText::_("ITEM"); ?>
            </span>
        </span>
        <div class="ba-buttons-wrapper">
            <span class="ba-edit-wrapper">
                <i class="zmdi zmdi-edit edit-item"></i>
                <span class="ba-tooltip tooltip-delay settings-tooltip">
                    <?php echo JText::_("EDIT"); ?>
                </span>
            </span>
            <span class="ba-edit-wrapper">
                <i class="zmdi zmdi-copy copy-item"></i>
                <span class="ba-tooltip tooltip-delay settings-tooltip">
                    <?php echo JText::_("COPY_ITEM"); ?>
                </span>
            </span>
            <span class="ba-edit-wrapper">
                <i class="zmdi zmdi-globe add-library"></i>
                <span class="ba-tooltip tooltip-delay settings-tooltip">
                    <?php echo JText::_("ADD_TO_LIBRARY"); ?>
                </span>
            </span>
            <span class="ba-edit-wrapper">
                <i class="zmdi zmdi-delete delete-item"></i>
                <span class="ba-tooltip tooltip-delay settings-tooltip">
                    <?php echo JText::_("DELETE_ITEM"); ?>
                </span>
            </span>
            <span class="ba-edit-text">
                <?php echo JText::_("ITEM"); ?>
            </span>
        </div>
    </div>
    <div class="ba-box-model">
        <div class="ba-bm-top"></div>
        <div class="ba-bm-left"></div>
        <div class="ba-bm-bottom"></div>
        <div class="ba-bm-right"></div>
    </div>
</div>
<?php
$out = ob_get_contents();
ob_end_clean();