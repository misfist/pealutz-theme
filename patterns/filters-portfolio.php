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
    "align": "full",
    "layout": {
        "type": "grid",
        "minimumColumnWidth": "300px"
    },
    "className": "filters-portfolio",
    "anchor": "filters-portfolio",
    "metadata": {
        "categories": [
            "pealutz"
        ],
        "patternName": "pealutz/filters-portfolio",
        "name": "Portfolio Filters"
    }
} -->
<div id="filters-portfolio" class="wp-block-group filters-portfolio">

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
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"10px","bottomRight":"10px"},"width":"1px"},"dimensions":{"minHeight":"100%"}},"borderColor":"gray-light","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top"}} -->
    <div class="wp-block-group has-border-color has-gray-light-border-color"
        style="border-width:1px;border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;min-height:100%;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group">

            <!-- wp:group {"tagName":"header","layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <header class="wp-block-group">

                <?php
                $icon_slug = get_term_meta( $term->term_id, 'icon', true );
                if ( $icon_slug ) :
                ?>
                <!-- wp:meta-box/icon {"id":"mb-block-<?php echo esc_attr( wp_generate_uuid4() ); ?>","data":{"icon":"<?php echo esc_attr( $icon_slug ); ?>","width":"24","measurement":"px"}} /-->
                <?php endif; ?>

            </header>
            <!-- /wp:group -->

            <!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading"><?php echo esc_html( $term->name ); ?></h3>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:term-template {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default","columnCount":3}} -->
            <!-- wp:term-name {"isLink":true,"backgroundColor":"background"} /-->
        <!-- /wp:term-template -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:terms-query -->

<?php
endforeach; ?>

</div>
<!-- /wp:group -->