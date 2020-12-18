
EasyBlog.require()
.script('site/authors', 'site/posts/posts')
.done(function($) {

	$('[data-authors-sorting]').on('change', function() {
		var dropdown = $(this);
		var value = $(this).val();
		var option = dropdown.find('option[value=' + value + ']');
		var url = option.data('url');

		if (!url) {
			return;
		}

		window.location = url;
	});

	$('[data-authors]').implement(EasyBlog.Controller.Authors.Listing);

	// Simulate click when recent posts disabled but authors enabled
	<?php if (!$this->params->get('author_posts', true) && $this->params->get('author_categories', true)) { ?>
		$('[data-tab-category]').click();
	<?php } ?>

	<?php if (!$this->params->get('author_posts', true) && !$this->params->get('author_categories', true) && $this->params->get('author_tags', true)) { ?>
		$('[data-tab-tag]').click();
	<?php } ?>
});
