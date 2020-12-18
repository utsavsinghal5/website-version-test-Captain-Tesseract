<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2018 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div class="o-form-group">
	<label for="private" class="o-control-label eb-composer-field-label">
		<?php echo JText::_('COM_EASYBLOG_COMPOSER_VISIBILITY');?>
	</label>
	<div class="o-control-input">
		<?php echo JHTML::_('select.genericlist', EB::privacy()->getOptions('', $post->created_by), 'access', 'class="o-form-control input-sm"', 'value', 'text', $post->access); ?>
	</div>
</div>
