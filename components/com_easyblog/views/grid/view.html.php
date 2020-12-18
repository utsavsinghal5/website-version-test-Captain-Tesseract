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

require_once(JPATH_COMPONENT . '/views/views.php');

class EasyBlogViewGrid extends EasyBlogView
{
	public function display($tmpl = null)
	{
		// Add the RSS headers on the page.
		EB::feeds()->addHeaders('index.php?option=com_easyblog');

		// Add breadcrumbs on the site menu.
		$this->setPathway('COM_EASYBLOG_LATEST_BREADCRUMB');

		$params = $this->theme->params;

		// Retrieving the showcase type.
		$showcasePostType = $params->get('showcase_grid_post_type');

		// Retrieving the showcase categories.
		$showcasePostCategories = $params->get('showcase_grid_showcase_category', array());

		// Retrieving the showcase limit.
		$showcasePostLimit = $params->get('showcase_grid_limit');

		// Format showcasePostCategories if user selected all category.
		if ($showcasePostCategories) {
			$showcasePostCategories = array_diff($showcasePostCategories, array('all'));
		}

		$model = EB::model('Blog');
		$showcasePost = '';
		$excludeBlogs = array();

		// If showcase is disabled, then no need to get the posts.
		if ($params->get('enable_showcase', 1)) {
			// Showcase type latest post.
			if ($showcasePostType == 'latest') {

				$latestPost = $model->getBlogsby('', '', '', $showcasePostLimit, EBLOG_FILTER_PUBLISHED, false, false, '', false, false, true, '', $showcasePostCategories, null, 'listlength',
					false, '', '', '');

				if ($latestPost) {
					// Format the showcase posts.
					$latestPost = EB::formatter('list', $latestPost, false);

					// Exclude all post which already displayed on the showcase.
					foreach ($latestPost as $post) {
						$excludeBlogs[] = $post->id;
					}
				}

				$showcasePost = $latestPost;
			}

			// Showcase type featured post.
			if ($showcasePostType == 'featured') {

				$featured = $model->getFeaturedBlog($showcasePostCategories, $showcasePostLimit);

				if ($featured) {
					// Format the showcase post.
					$featured = EB::formatter('featured', $featured, false);
				}
				$showcasePost = $featured;
			}
		}

		// Determine if we should explicitly include authors.
		$includeAuthors = array();

		if ($params->get('grid_inclusion_authors', false)) {
			$includeAuthors = $params->get('grid_inclusion_authors');
		}

		// Determine if we should explicitly exclude authors.
		$excludeAuthors = array();

		if ($params->get('grid_exclusion_authors', false)) {
			$excludeAuthors = $params->get('grid_exclusion_authors');
		}

		// Determine if we should exclude featured post from the list.
		$excludeFeatured = $params->get('grid_exclude_featured', false);

		// Retrieve the post categories
		$postCategories = $params->get('grid_post_category', array());

		// Format postCategories if user selected all category.
		if ($postCategories) {
			$postCategories = array_diff($postCategories, array('all'));
		}

		$limitstart = $this->input->get('limitstart', 0, 'int');

		$max = 0;
		$options = array();
		$showLoadMore = false;

		// Get the limit
		$limit = EB::getViewLimit();
		$paginationStyle = $params->get('grid_pagination_style', 'normal');

		if ($paginationStyle == 'autoload') {
			$max = $limit + 1;
			$options['paginationType'] = 'loadmore';
		}

		// Fetch all blog entries based on the defined information above.
		$data = $model->getBlogsby('', '', '', 0, EBLOG_FILTER_PUBLISHED, false, false, $excludeBlogs, false, false, true, '', $postCategories, null, 'listlength',
			false, $includeAuthors, $excludeAuthors, $excludeFeatured, array(),	$options);

		$posts = array();

		if ($data) {
			if ($paginationStyle == 'autoload' && count($data) == $max) {
				$showLoadMore = true;

				// Take out the last post
				array_pop($data);
			}

			$posts = EB::formatter('list', $data, false);
		}

		// Determine the total grid for the list article.
		$gridLayout = $params->get('grid_layout', '4');

		if ($gridLayout == '2') {
			$gridShowcaseLayout = '8';
		}
		else if ($gridLayout == '3') {
			$gridShowcaseLayout = '6';
		}
		else if ($gridLayout == '4') {
			$gridShowcaseLayout = '8';
		}
		else if ($gridLayout == '6') {
			$gridShowcaseLayout = '6';
		}
		else {
			$gridShowcaseLayout = 12 - $gridLayout;
		}

		$showcaseTruncation = $params->get('showcase_content_limit', 350) > 0 ? true : false;
		$gridTruncation = $params->Get('grid_content_limit', 350) > 0 ? true : false;

		// Get the pagination
		$pagination = $model->getPagination();
		$currentPageLink = $pagination->getCurrentPageLink('grid', true);
		$previousPageLink = $pagination->getPreviousPageLink('grid', true);

		// Update the title of the page if navigating on different pages to avoid Google marking these title's as duplicates.
		$title = EB::getPageTitle(JText::_('COM_EASYBLOG_GRID_PAGE_TITLE'));

		// Set the page title
		$this->setPageTitle($title, $pagination, $this->config->get('main_pagetitle_autoappend'));

		// Set the meta tags for this page
		EB::setMeta(0, META_TYPE_VIEW, '', $pagination);

		// Retrieve the pagination for the latest view
		$pagination = $pagination->getPagesLinks();

		// Add canonical URLs.
		$this->canonical('index.php?option=com_easyblog');

		$limitstart = $limitstart + $limit;

		// Get the current url
		$return = EBR::_('index.php?option=com_easyblog', false);

		$this->set('return', $return);
		$this->set('showcasePost', $showcasePost);
		$this->set('excludeBlogs', $excludeBlogs);
		$this->set('posts', $posts);
		$this->set('gridLayout', $gridLayout);
		$this->set('gridShowcaseLayout', $gridShowcaseLayout);
		$this->set('showcaseTruncation', $showcaseTruncation);
		$this->set('gridTruncation', $gridTruncation);
		$this->set('pagination', $pagination);
		$this->set('showLoadMore', $showLoadMore);
		$this->set('limitstart', $limitstart);
		$this->set('paginationStyle', $paginationStyle);
		$this->set('currentPageLink', $currentPageLink);
		$this->set('previousPageLink', $previousPageLink);
		$this->set('isGrid', true);

		parent::display('blogs/grid/default');
	}
}
