<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<select name="<?php echo $name;?>" id="<?php echo !$id ? $name : $id; ?>" multiple="multiple" class="form-control" autocomplete="off" size="6">
	<?php foreach ($scopes as $key => $value) { ?>
			<option value="<?php echo $value; ?>"<?php echo $value == $selected || (is_array($selected) && in_array($value, $selected)) ? ' selected="selected"' : '';?>>
				<?php echo $key; ?>
			</option>
	<?php } ?>
</select>
