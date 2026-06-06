<?php
/**
 * Title: Content Portfolio
 * Slug: pealutz/content-portfolio
 * Description: Portfolio section with title, divider, page content, and project grid.
 * Categories: pealutz
 * Keywords: portfolio, projects, grid, section
 */
?>
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
        <!-- wp:post-featured-image {"sizeSlug":"thumbnail"} /-->

        <!-- wp:group {"metadata":{"name":"Content"},"className":"overlay","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
        <div class="wp-block-group overlay">
            <!-- wp:post-title {"textAlign":"center","level":3,"isLink":true} /-->

            <!-- wp:icon {"icon":"core/external","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","ariaLabel":"External Link"} /-->

            <!-- wp:post-content {"className":"entry-content"} /-->
        </div>
        <!-- /wp:group -->

    <!-- /wp:post-template -->
</div>
<!-- /wp:query -->