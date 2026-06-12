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
    <!-- wp:columns {"className":"job"} -->
    <div class="wp-block-columns job">
        <!-- wp:column {"width":"20%"} -->
        <div class="wp-block-column" style="flex-basis:20%">
            <!-- wp:group {"metadata":{"name":"Dates"},"className":"job-dates","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
            <div class="wp-block-group job-dates">
                <!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"site-functionality/project-date","args":{"key":"start_date"}}},"name":"Start Date"},"className":"start-date","fontFamily":"monospace"} -->
                <p class="start-date has-monospace-font-family"></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"separator","fontFamily":"monospace"} -->
                <p class="separator has-monospace-font-family">to</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"site-functionality/project-date","args":{"key":"end_date"}}},"name":"End Date"},"className":"end-date","fontFamily":"monospace"} -->
                <p class="end-date has-monospace-font-family"></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"location"}}},"name":"Location"},"className":"job-location","fontFamily":"monospace"} -->
            <p class="job-location has-monospace-font-family"></p>
            <!-- /wp:paragraph -->

        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"30%"} -->
        <div class="wp-block-column" style="flex-basis:30%">
            <!-- wp:heading {"level":3,"metadata":{"bindings":{"content":{"source":"site-functionality/project-company"}},"name":"Company Name"},"className":"job-company"} -->
            <h3 class="wp-block-heading job-company"></h3>
            <!-- /wp:heading -->

            <!-- wp:post-title {"level":4,"className":"job-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"uppercase"}},"textColor":"primary"} /-->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:post-content {"className":"job-description"} /-->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
    <!-- /wp:post-template -->
</div>
<!-- /wp:query -->