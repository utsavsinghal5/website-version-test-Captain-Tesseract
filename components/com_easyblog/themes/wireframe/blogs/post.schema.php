<?php
/**
* @package      EasyBlog
* @copyright    Copyright (C) 2010 - 2019 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"mainEntityOfPage": "<?php echo $post->getPermalink(true, true); ?>",
		"@type": "BlogPosting",
		"headline": "<?php echo $this->html('string.escape', $post->getTitle());?>",
		"image": "<?php echo $post->getImage($this->config->get('cover_size_entry', 'large'), true, true);?>",
		"editor": "<?php echo $post->getAuthor()->getName();?>",
		"genre": "<?php echo $post->getPrimaryCategory()->title;?>",
		"publisher": {
			"@type": "Organization",
			"name": "<?php echo EB::showSiteName(); ?>",
			"logo": <?php echo $post->getSchemaLogo(); ?>
		},
		"datePublished": "<?php echo $post->getPublishDate(true)->format('Y-m-d');?>",
		"dateCreated": "<?php echo $post->getCreationDate(true)->format('Y-m-d');?>",
		"dateModified": "<?php echo $post->getModifiedDate()->format('Y-m-d');?>",
		"description": "<?php echo EB::jconfig()->get('MetaDesc'); ?>",
		"author": {
			"@type": "Person",
			"name": "<?php echo $post->getAuthor()->getName();?>",
			"image": "<?php echo $post->getAuthor()->getAvatar();?>"
		}
	}
</script>

