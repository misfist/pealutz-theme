<?php
/**
 * Title: Footer Credit
 * Slug: pealutz/footer-credit
 * Inserter: no
 */
?>
<!-- wp:columns {"verticalAlignment":"top","metadata":{"patternName":"pealutz/footer-credit","name":"Footer Credit"}} -->
<div class="wp-block-columns are-vertically-aligned-top">
    <!-- wp:column {"verticalAlignment":"top"} -->
    <div class="wp-block-column is-vertically-aligned-top">
        <!-- wp:site-title /-->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"top"} -->
    <div class="wp-block-column is-vertically-aligned-top">
        <!-- wp:navigation {"className":"main-nav","overlayMenu":"never","anchor":"main-nav--footer","layout":{"type":"flex","justifyContent":"center"}} /-->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"top"} -->
    <div class="wp-block-column is-vertically-aligned-top">
        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top","justifyContent":"right"}} -->
        <div class="wp-block-group">
            <!-- wp:epico/dynamic-year-block {"beforeElement":"© Copyright "} /-->

            <!-- wp:paragraph {"metadata":{"patternName":"pealutz/footer-credit","name":"Footer Credit"}} -->
            <p><?php printf( 
                '%s <a href="%s" target="_blank" rel="noreferrer noopener nofollow">%s</a>', 
                __( 'Built with', 'pealutz' ), 
                esc_url( 'https://wordpress.org' ), 
                __( 'WordPress', 'pealutz' ) 
                ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:column -->
</div>
        <!-- /wp:columns -->