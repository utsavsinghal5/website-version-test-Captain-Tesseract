<?php
/**
* @package   Gridbox
* @author    Balbooa http://www.balbooa.com/
* @copyright Copyright @ Balbooa
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined('_JEXEC') or die;

ob_start();
?>
<div itemscope itemtype="http://schema.org/CreativeWorkSeries">
    <meta itemprop="name" content="">
    <div class="star-ratings-wrapper">
        <div class="stars-wrapper">
            <i class="zmdi zmdi-star active" data-rating="1"></i>
            <i class="zmdi zmdi-star active" data-rating="2"></i>
            <i class="zmdi zmdi-star active" data-rating="3"></i>
            <i class="zmdi zmdi-star active" data-rating="4"></i>
            <i class="zmdi zmdi-star active" data-rating="5"></i>
        </div>
        <div class="info-wrapper" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
            <span class="rating-wrapper">
                <span class="rating-title"><?php echo JText::_('RATING'); ?> </span>
                <span class="rating-value" itemprop="ratingValue">0.00</span>
            </span>
            <span class="votes-wrapper">
                (<span class="votes-count" itemprop="reviewCount">0</span>
                <span class="votes-title"> <?php echo JText::_('VOTES'); ?></span>)
            </span>
        </div>
    </div>
</div>
<?php
$out = ob_get_contents();
ob_end_clean();