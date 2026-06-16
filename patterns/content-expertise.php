<?php
/**
 * Title: Content Expertise
 * Slug: pealutz/content-expertise
 * Description: Expertise section with title, divider, and two-column skills list.
 * Categories: pealutz
 * Keywords: expertise, skills, meta
 */

use function \PEA_Lutz\get_parent_terms;

$terms = get_parent_terms();
if( empty( $terms ) ) {
    return;
}
?>

<!-- wp:group {"metadata":{"name":"Skills"},"layout":{"type":"grid","minimumColumnWidth":"300px"}} -->
<div class="wp-block-group">

<?php
foreach( $terms as $term ) :
?>

<!-- wp:terms-query {
    "termQuery": {
        "perPage": 20,
        "taxonomy": "project_tag",
        "order": "asc",
        "orderBy": "name",
        "include": [],
        "hideEmpty": false,
        "showNested": true,
        "inherit": false,
        "parent": <?php echo $term->term_id; ?>
    },
    "metadata": {
        "name": "<?php echo esc_html( $term->name ); ?>"
    },
    "className": "<?php echo esc_html( $term->slug ); ?>"
} -->
<div class="wp-block-terms-query">
    <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top"}} -->
    <div class="wp-block-group">
        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group">

            <!-- wp:group {"tagName":"header","layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <header class="wp-block-group">
                 <!-- wp:heading {"level":3,"className":"is-style-bulleted","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"primary"} -->
                <h3 class="wp-block-heading is-style-bulleted has-primary-color has-text-color has-link-color" style="font-style:normal;font-weight:400"><?php echo esc_html( $term->name ); ?></h3>
                <!-- /wp:heading -->
            </header>
            <!-- /wp:group -->

        </div>
        <!-- /wp:group -->

        <!-- wp:term-template {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default","columnCount":3}} -->
        <!-- wp:term-name {"isLink":true} /-->
        <!-- /wp:term-template -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:terms-query -->

<?php
endforeach; ?>

</div>
<!-- /wp:group -->