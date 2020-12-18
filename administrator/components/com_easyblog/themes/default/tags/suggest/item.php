<?php
/**
* @package      EasyBlog
* @copyright    Copyright (C) 2010 - 2017 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<i class="fa fa-tags">&nbsp;<?php echo $title; ?></i>

<input type="hidden" value="<?php echo $title;?>" data-tag-title />
<input type="hidden" name="<?php echo $inputName;?>" value="<?php echo $tagId;?>" data-tag-id />