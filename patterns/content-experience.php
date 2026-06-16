<?php
/**
 * Title: Content Experience
 * Slug: pealutz/content-experience
 * Description: Experience section with title, divider, and job list.
 * Categories: pealutz
 * Keywords: experience, jobs, work history, section
 */
$slug = 'job';
$term = get_term_by( 'slug', $slug, 'project_type' );
if( ! $term || is_wp_error( $term ) ) {
    return;
}
$term_id = $term->term_id;
?>

<!-- wp:query {
    "queryId": 10,
    "query": {
        "perPage": 12,
        "pages": 0,
        "offset": 0,
        "postType": "project",
        "order": "desc",
        "orderBy": "date",
        "author": "",
        "search": "",
        "exclude": [],
        "sticky": "",
        "inherit": false,
        "parents": [],
        "format": [],
        "meta_query": [],
        "taxQuery": {
            "include": {
                "project_type": [
                    <?php echo $term_id; ?>
                ]
            }
        }
    },
    "namespace": "advanced-query-loop",
    "metadata": {
        "categories": [
            "pealutz"
        ],
        "name": "Resume",
        "patternName": "pealutz/content-experience"
    },
    "layout": {
        "type": "default"
    }
} -->
<div class="wp-block-query">
    <!-- wp:post-template -->
    
        <!-- wp:pattern {"slug":"pealutz/content-job"} /-->

    <!-- /wp:post-template -->
</div>
<!-- /wp:query -->