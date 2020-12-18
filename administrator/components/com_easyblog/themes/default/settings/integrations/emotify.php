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
<div class="row">
	<div class="col-lg-6">
		<div class="panel">
			<?php echo $this->html('panel.heading', 'COM_EASYBLOG_SETTINGS_EMOTIFY'); ?>

			<div class="panel-body">
				<?php echo $this->html('settings.toggle', 'emotify_enabled', 'COM_EASYBLOG_SETTINGS_EMOTIFY_ENABLE'); ?>

				<?php echo $this->html('settings.text', 'emotify_key', 'COM_EASYBLOG_SETTINGS_EMOTIFY_APIKEY'); ?>
			</div>
		</div>
	</div>
</div>