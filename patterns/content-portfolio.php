<?php
/**
 * Title: Content Portfolio
 * Slug: pealutz/content-portfolio
 * Description: Portfolio section with title, divider, page content, and project grid.
 * Categories: pealutz
 * Keywords: portfolio, projects, grid, section
 */
?>

<!-- wp:pattern {"slug":"pealutz/filters-portfolio"} /-->

<!-- wp:query {
	"queryId": 5,
	"query": {
		"perPage": 12,
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
	"enhancedPagination": true,
	"className": "main-query",
	"anchor":"portfolio",
	"metadata": {
		"name": "Content Portfolio"
	}
} -->
<div id="portfolio" class="wp-block-query main-query">
	<!-- wp:post-template {"className":"project-list","layout":{"type":"grid","columnCount":3}} -->
	
		<!-- wp:pattern {"slug":"pealutz/content-project"} /-->

	<!-- /wp:post-template -->
</div>
<!-- /wp:query -->