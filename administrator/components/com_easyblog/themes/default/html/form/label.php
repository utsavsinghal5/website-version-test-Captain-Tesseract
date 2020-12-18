<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2019 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<label for="<?php echo $id;?>" class="col-md-5" data-uid="<?php echo $uniqueId;?>">
	<a id="<?php echo $uniqueId;?>"></a>
	<?php echo $text;?>

	<?php if ($tooltip) { ?>
	<i data-html="true" data-placement="top" data-title="<?php echo $helpTitle; ?>" data-content="<?php echo $helpContent;?>" data-eb-provide="popover" class="fa fa-question-circle pull-right"></i>
	<?php } ?>
</label>