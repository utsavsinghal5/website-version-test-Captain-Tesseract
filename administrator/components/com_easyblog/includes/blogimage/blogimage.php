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

jimport('joomla.filesystem.file');

class EasyBlogBlogImage extends EasyBlog
{
	public $image = null;
	public $original = null;
	public $storage = null;
	public $uri = null;
	public $sizes = array();
	public $storageType = null;

	public function __construct($path, $url, $storageType = EASYBLOG_MEDIA_STORAGE_TYPE_JOOMLA)
	{
		parent::__construct();

		// Get the file name
		$fileName = basename($path);

		// Set the path to the original image
		$this->original = $path;

		// Set the current image item
		$this->image = trim($fileName, '/');

		// Set the storage path
		$this->storage = rtrim(dirname($path), '/');

		// Set the storage uri
		$this->absoluteUri = rtrim($url, '/');
		$this->uri = rtrim(dirname($url), '/');
		$this->storageType = $storageType;

		// Initialize the original width / height based on the configurations
		$this->initDimensions();
	}

	/**
	 * Initialize dimensions available
	 *
	 * @since	5.0
	 * @access	public
	 */
	public function initDimensions()
	{
		// Default sizes that is used internally
		$original = new stdClass();
		$original->width = $this->config->get('main_original_image_width');
		$original->height = $this->config->get('main_original_image_height');
		$original->quality = $this->config->get('main_original_image_quality');
		$this->sizes['original'] = $original;

		// Thumbnail size
		$thumbnail = new stdClass();
		$thumbnail->width = $this->config->get('main_image_thumbnail_width');
		$thumbnail->height = $this->config->get('main_image_thumbnail_height');
		$thumbnail->quality = $this->config->get('main_image_thumbnail_quality');
		$this->sizes['thumbnail'] = $thumbnail;

		// Icon size
		$icon = new stdClass();
		$icon->width = $this->config->get('media_icon_width');
		$icon->height = $this->config->get('media_icon_height');
		$icon->quality = $this->config->get('media_icon_quality');
		$this->sizes['icon'] = $icon;

		// New sizes since 5.0
		$sizes = array('large', 'medium', 'small', 'amp');

		foreach ($sizes as $size) {
			$type = new stdClass();
			$type->width = $this->config->get('main_blogimage_' . $size . '_width');
			$type->height = $this->config->get('main_blogimage_' . $size . '_height');
			$type->quality = $this->config->get('main_blogimage_' . $size . '_quality');
			$this->sizes[$size] = $type;
		}
	}

	/**
	 * Returns a particular image url from remote server with the specified size
	 *
	 * @since	5.3.0
	 * @access	public
	 */
	public function getRemoteSource($size, $html = false, $protocol = false)
	{
		$storageLib = EB::storage($this->storageType);

		// Prefix the image file
		$prefix = EBLOG_SYSTEM_VARIATION_PREFIX;

		// File name should also have a prefix of the theme if there's a value for it.
		$fileName = $prefix . '_' . $size . '_' . $this->image;

		// Get the storage path. need to be relative path
		$relatiavePath = str_replace(JPATH_ROOT, '', $this->storage);

		$relatiavePath = ltrim($relatiavePath, '/');
		$relatiavePath .= '/' . $fileName;

		$url = $storageLib->getPermalink($relatiavePath);

		return ($html) ? '<img src="' . $url . '" />' : $url;
	}


	/**
	 * Returns a particular image url with the specified size
	 *
	 * @since	5.0
	 * @access	public
	 */
	public function getSource($size, $html = false, $protocol = false)
	{
		static $cache = array();

		// we need to handle remote storage differently.
		if ($this->storageType != EASYBLOG_MEDIA_STORAGE_TYPE_JOOMLA) {
			return $this->getRemoteSource($size, $html);
		}

		$isHTML = $html ? '-html' : '';
		$index = $this->original . $size . $isHTML . $protocol;

		$uri = $this->uri;
		$protocolStr = '';

		if ($protocol) {
			$juri = JURI::getInstance();
			$protocolStr = $juri->toString(array('scheme'));
			$protocolStr = str_replace('//', '', $protocolStr);

			// check if $uri has the site domain or not.
			$root = rtrim(JURI::root(), '/');
			$root = preg_replace("(^https?://)", "//", $root);

			// to test if the url has the full domain name, we need to exclude the sub-directory.
			// e.g. http://www.abc.com/test/index.php vs http://www.abc.com/index.php
			$testRoot = JURI::getInstance()->toString(array('scheme','host'));
			$testRoot = rtrim($testRoot, '/');
			$testRoot = preg_replace("(^https?://)", "//", $testRoot);

			if (strpos($uri, $testRoot) === false) {
				$uri = '//' . ltrim($root, '//') . '/' . ltrim($uri, '/');
			}
		}

		if (!isset($cache[$index])) {

			// For original images we don't need to do anything since it is already stored on the site
			if ($size == 'original') {
				$cache[$index] = $protocolStr . $uri . '/' . $this->image;

				return $cache[$index];
			}

			// Check if the desired size exists
			if (!isset($this->sizes[$size])) {
				$cache[$index] = false;

				return $cache[$index];
			}

			// Prefix the image file
			$prefix = EBLOG_SYSTEM_VARIATION_PREFIX;

			// File name should also have a prefix of the theme if there's a value for it.
			$fileName = $prefix . '_' . $size . '_' . $this->image;

			// Get the storage path.
			$storage = $this->storage . '/' . $fileName;

			$exists = JFile::exists($storage);

			// If the file doesn't exist, we need to create it first
			if (!$exists) {

				$params = $this->sizes[$size];

				// Test if the original image file exists on the site
				$exists = JFile::exists($this->original);

				// If the original image file does not exist, we shouldn't be doing anything here
				if (!$exists) {
					$cache[$index] = false;

					return $cache[$index];
				}

				// Try to create the blog image now
				$state = $this->createImage($params, $storage);

				// If this fails, we shouldn't proceed either
				if (!$state) {
					$cache[$index] = false;

					return $cache[$index];
				}
			}

			if ($html) {
				$cache[$index] = '<img src="' . $protocolStr . $uri . '/' . $fileName . '" />';
			} else {
				$cache[$index] = $protocolStr . $uri . '/' . $fileName;
			}
		}

		return $cache[$index];
	}

	/**
	 * Create the blog image on the site
	 *
	 * @since	5.0
	 * @access	public
	 */
	public function createImage($params, $storage)
	{
		// Generate a thumbnail for each uploaded images
		$image = EB::simpleimage();
		$image->load($this->original);

		$originalWidth = $image->getWidth();
		$originalHeight = $image->getHeight();

		// @TODO: Make this configurable in the future
		// Resize everything to be "resize within" by default
		$mode = 'within';

		// If quality is not given, use default quality given in configuration
		if (!isset($params->quality)) {
			$params->quality = $this->config->get('main_image_quality');
		}

		// If the resize method
		if (($mode == 'crop') && ($originalWidth < $params->width || $originaHeight < $params->height)) {
			$mode = 'fill';
		}

		if ($mode == 'crop') {
			$image->crop($params->width, $params->height);
		}

		if ($mode == 'fit') {
			$image->resizeToFit($params->width, $params->height);
		}

		if ($mode == 'within') {
			$image->resizeWithin($params->width, $params->height);
		}

		if ($mode == 'fill') {
			$image->resizeToFill($params->width, $params->height);
		}

		// Save the image
		$image->save($storage, $image->type, $params->quality);

		return true;
	}

	/**
	 * Get image dimension
	 *
	 * @since	5.1
	 * @access	public
	 */
	public function getImageDimension($size = 'original')
	{
		$obj = new stdClass();
		$obj->width = '';
		$obj->height = '';

		// Check if the desired size exists
		if (!isset($this->sizes[$size])) {
			return $obj;
		}

		// Prefix the image file
		$prefix = EBLOG_SYSTEM_VARIATION_PREFIX;

		// File name should also have a prefix of the theme if there's a value for it.
		$fileName = $prefix . '_' . $size . '_' . $this->image;

		// Get the storage path.
		$storage = $this->storage . '/' . $fileName;

		// For original images we don't need to do anything since it is already stored on the site
		if ($size == 'original') {
			$storage = $this->uri . '/' . $this->image;

			// Test if the image exists on the site
			$exists = JFile::exists($storage);

			if (!$exists) {
				$storage = $this->original;
			}
		}

		$exists = JFile::exists($storage);

		if (!$exists) {
			return $obj;
		}

		$dimension = getimagesize($storage);

		if ($dimension) {
			$obj->width = $dimension[0];
			$obj->height = $dimension[1];
		}

		return $obj;
	}
}