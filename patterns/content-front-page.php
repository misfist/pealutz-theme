<?php
/**
 * Title: Content Front Page
 * Slug: pealutz/content-front-page
 * Description: Home page
 * Categories: pealutz
 * Keywords: experience, jobs, work history, section
 */
?>

<!-- wp:query {
	"queryId": 1,
	"query": {
		"perPage": 3,
		"pages": 0,
		"offset": 0,
		"postType": "project",
		"order": "asc",
		"orderBy": "menu_order",
		"author": "",
		"search": "",
		"exclude": [],
		"sticky": "",
		"inherit": false,
		"parents": [],
		"format": [],
		"meta_query": []
	},
	"namespace":"advanced-query-loop",
	"tagName":"section",
	"enhancedPagination": true,
	"className": "panel",
	"anchor":"portfolio",
	"metadata": {
		"name": "Content Portfolio"
	}
} -->
<section id="portfolio" class="wp-block-query panel">
	<!-- wp:post-template {"className":"project-list","layout":{"type":"grid","columnCount":3}} -->
	
		<!-- wp:pattern {"slug":"pealutz/content-project"} /-->

	<!-- /wp:post-template -->
</section>
<!-- /wp:query -->