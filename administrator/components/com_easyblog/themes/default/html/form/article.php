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
<div class="row" data-form-author-wrapper>
	<div class="col-lg-10">
		<div class="input-group">
			<input type="text" id="<?php echo $id;?>-placeholder" class="form-control" value="<?php echo $articleTitle;?>" disabled="disabled" />
			<span class="input-group-btn">
				<button class="btn btn-default" type="button" data-form-remove-article>
					<i class="fa fa-times"></i>
				</button>
				<button class="btn btn-default" type="button" data-form-browse-article>
					<?php echo JText::_('COM_EB_BROWSE');?>
				</button>
			</span>p
		</div>
		<input type="hidden" name="<?php echo $name;?>" id="<?php echo $id;?>" value="<?php echo $value;?>" <?php echo $attributes; ?> />
	</div>
</div>
