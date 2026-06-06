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
	"queryId": 9,
	"query": {
		"perPage": 15,
		"pages": 0,
		"offset": 0,
		"postType": "page",
		"order": "asc",
		"orderBy": "menu_order",
		"author": "",
		"search": "",
		"exclude": [656],
		"sticky": "",
		"inherit": false,
		"taxQuery": null,
		"parents": [],
		"format": [],
		"exclude_current": true,
		"meta_query": []
	},
	"namespace":"advanced-query-loop",
    "enhancedPagination": true,
    "className": "alignfull panel main-query",
    "metadata": {
        "categories": [
            "pealutz"
        ],
        "patternName": "pealutz/content-front-page",
        "name": "Content Portfolio"
    }
} -->
<div class="wp-block-query alignfull panel main-query">
	<!-- wp:post-template {
        "tagName": "article",
        "align": "full",
        "className": "main-query"
    } -->
		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:post-title /-->
			<!-- wp:post-content /-->
        </div>
        <!-- /wp:group -->
	<!-- /wp:post-template -->
</div>
<!-- /wp:query -->