<?php
/**
 * Title: Portfolio Filters
 * Slug: pealutz/filters-portfolio
 * Description: Skills filter.
 * Categories: pealutz
 * Keywords: expertise, skills, meta
 * postTypes: wp_template
 */
use function \PEA_Lutz\get_parent_terms;
use function \PEA_Lutz\get_project_tag_ids;

$terms = get_parent_terms();
if( empty( $terms ) ) {
    return;
}
?>
<!-- wp:group {
    "className": "filters-portfolio",
    "anchor": "filters-portfolio",
    "metadata": {
        "categories": [
            "pealutz"
        ],
        "name": "Portfolio Filters"
    }
} -->
<div id="filters-portfolio" class="wp-block-group filters-portfolio">

    <!-- wp:group {"metadata":{"name":"Filter Top"},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
    <div class="wp-block-group">
        <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"small","fontFamily":"monospace"} -->
        <p class="has-monospace-font-family has-small-font-size" style="text-transform:uppercase"><?php esc_html_e( 'Filter by Skill', 'pealutz' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons -->
        <div class="wp-block-buttons">
            <!-- wp:button {"anchor":"portfolio-all"} -->
            <div class="wp-block-button" id="portfolio-all"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'View All', 'pealutz' ); ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

<?php
foreach( $terms as $term ) :
?>

<?php $include = get_project_tag_ids( null, $term->term_id ); ?>
<!-- wp:terms-query {
    "termQuery": {
        "perPage": 20,
        "taxonomy": "project_tag",
        "order": "asc",
        "orderBy": "name",
        "include": <?php echo wp_json_encode( $include ); ?>,
        "hideEmpty": true,
        "showNested": true,
        "inherit": false
    },
    "metadata": {
        "name": "<?php echo esc_html( $term->name ); ?>"
    },
    "className": "<?php echo esc_html( $term->slug ); ?>"
} -->
<div class="wp-block-terms-query">
    <!-- wp:heading {"level":3,"className":"is-style-bulleted"} -->
    <h3 class="wp-block-heading is-style-bulleted"><?php echo esc_html( $term->name ); ?></h3>
    <!-- /wp:heading -->

    <!-- wp:term-template {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default","columnCount":3}} -->
        <!-- wp:term-name {"isLink":true} /-->
    <!-- /wp:term-template -->
</div>
<!-- /wp:terms-query -->

<?php
endforeach; ?>

</div>
<!-- /wp:group -->
