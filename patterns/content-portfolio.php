<?php
/**
 * Title: Content Portfolio
 * Slug: pealutz/content-portfolio
 * Description: Portfolio section with title, divider, page content, and project grid.
 * Categories: pealutz
 * Keywords: portfolio, projects, grid, section
 */
?>

<!-- wp:group {"metadata":{"name":"Portfolio"},"align":"full"} -->
<div class="wp-block-group alignfull">

	<!-- wp:pattern {"slug":"pealutz/filters-portfolio"} /-->

	<!-- wp:query {
		"queryId": 1,
		"query": {
			"perPage": 10,
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
		"className": "alignfull panel main-query",
		"anchor":"portfolio",
		"metadata": {
			"categories": [
				"pealutz"
			],
			"patternName": "pealutz/content-portfolio",
			"name": "Content Portfolio"
		}
	} -->
	<div id="portfolio" class="wp-block-query">
		<!-- wp:post-template {"className":"project-list","layout":{"type":"grid","columnCount":2}} -->
		
			<!-- wp:pattern {"slug":"pealutz/content-project"} /-->

		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->

</div>
<!-- /wp:group -->