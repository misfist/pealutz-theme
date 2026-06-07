<?php
/**
 * Title: Content Expertise
 * Slug: pealutz/content-expertise
 * Description: Expertise section with title, divider, and two-column ACF skills list.
 * Categories: pealutz
 * Keywords: expertise, skills, meta
 */

use function \PEA_Lutz\get_parent_terms;

$terms = get_parent_terms();
if( empty( $terms ) ) {
    return;
}
?>

<!-- wp:group {"metadata":{"name":"Skills"},"align":"full","layout":{"type":"grid","minimumColumnWidth":"300px"}} -->
<div class="wp-block-group alignfull">

<?php
foreach( $terms as $term ) :
?>

	<!-- wp:group {"metadata":{"name":"Skills"},"align":"full","layout":{"type":"grid","minimumColumnWidth":"300px"}} -->
	<div class="wp-block-group alignfull">
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
				"parent": 49
			},
			"metadata": {
				"name": "WordPress"
			}
		} -->
		<div class="wp-block-terms-query">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"10px","bottomRight":"10px"},"width":"1px"},"dimensions":{"minHeight":"100%"}},"borderColor":"gray-light","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top"}} -->
			<div class="wp-block-group has-border-color has-gray-light-border-color"
				style="border-width:1px;border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;min-height:100%;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:outermost/icon-block {"iconName":"wordpress-wordpress","width":"24px"} -->
					<div class="wp-block-outermost-icon-block">
						<div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg
								xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
								<path
									d="M12.158,12.786L9.46,20.625c0.806,0.237,1.657,0.366,2.54,0.366c1.047,0,2.051-0.181,2.986-0.51 c-0.024-0.038-0.046-0.079-0.065-0.124L12.158,12.786z M3.009,12c0,3.559,2.068,6.634,5.067,8.092L3.788,8.341 C3.289,9.459,3.009,10.696,3.009,12z M18.069,11.546c0-1.112-0.399-1.881-0.741-2.48c-0.456-0.741-0.883-1.368-0.883-2.109 c0-0.826,0.627-1.596,1.51-1.596c0.04,0,0.078,0.005,0.116,0.007C16.472,3.904,14.34,3.009,12,3.009 c-3.141,0-5.904,1.612-7.512,4.052c0.211,0.007,0.41,0.011,0.579,0.011c0.94,0,2.396-0.114,2.396-0.114 C7.947,6.93,8.004,7.642,7.52,7.699c0,0-0.487,0.057-1.029,0.085l3.274,9.739l1.968-5.901l-1.401-3.838 C9.848,7.756,9.389,7.699,9.389,7.699C8.904,7.67,8.961,6.93,9.446,6.958c0,0,1.484,0.114,2.368,0.114 c0.94,0,2.397-0.114,2.397-0.114c0.485-0.028,0.542,0.684,0.057,0.741c0,0-0.488,0.057-1.029,0.085l3.249,9.665l0.897-2.996 C17.841,13.284,18.069,12.316,18.069,11.546z M19.889,7.686c0.039,0.286,0.06,0.593,0.06,0.924c0,0.912-0.171,1.938-0.684,3.22 l-2.746,7.94c2.673-1.558,4.47-4.454,4.47-7.771C20.991,10.436,20.591,8.967,19.889,7.686z M12,22C6.486,22,2,17.514,2,12 C2,6.486,6.486,2,12,2c5.514,0,10,4.486,10,10C22,17.514,17.514,22,12,22z">
								</path>
							</svg></div>
					</div>
					<!-- /wp:outermost/icon-block -->

					<!-- wp:heading {"level":3} -->
					<h3 class="wp-block-heading"><?php esc_html__( 'WordPress', 'pealutz' ); ?></h3>
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
                "parent": 62
            },
            "metadata": {
                "name": "Technologies"
            }
        } -->
		<div class="wp-block-terms-query">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"10px","bottomRight":"10px"},"width":"1px"},"dimensions":{"minHeight":"100%"}},"borderColor":"gray-light","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top"}} -->
			<div class="wp-block-group has-border-color has-gray-light-border-color"
				style="border-width:1px;border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;min-height:100%;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:outermost/icon-block {"iconName":"wordpress-code","width":"24px"} -->
					<div class="wp-block-outermost-icon-block">
						<div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg
								viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<path
									d="M20.8 10.7l-4.3-4.3-1.1 1.1 4.3 4.3c.1.1.1.3 0 .4l-4.3 4.3 1.1 1.1 4.3-4.3c.7-.8.7-1.9 0-2.6zM4.2 11.8l4.3-4.3-1-1-4.3 4.3c-.7.7-.7 1.8 0 2.5l4.3 4.3 1.1-1.1-4.3-4.3c-.2-.1-.2-.3-.1-.4z">
								</path>
							</svg></div>
					</div>
					<!-- /wp:outermost/icon-block -->

					<!-- wp:heading {"level":3} -->
					<h3 class="wp-block-heading">Technologies</h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:term-template {"style":{"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"blockGap":"0"}},"layout":{"type":"default","columnCount":3}} -->
				<!-- wp:term-name {"isLink":true,"backgroundColor":"background"} /-->
				<!-- /wp:term-template -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:terms-query -->

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
                "parent": 64
            },
            "metadata": {
                "name": " API \u0026 Data Integrations"
            }
        } -->
		<div class="wp-block-terms-query">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"10px","bottomRight":"10px"},"width":"1px"},"dimensions":{"minHeight":"100%"}},"borderColor":"gray-light","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top"}} -->
			<div class="wp-block-group has-border-color has-gray-light-border-color"
				style="border-width:1px;border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;min-height:100%;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:outermost/icon-block {"iconName":"wordpress-share","width":"24px"} -->
					<div class="wp-block-outermost-icon-block">
						<div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg
								viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<path
									d="M9 11.8l6.1-4.5c.1.4.4.7.9.7h2c.6 0 1-.4 1-1V5c0-.6-.4-1-1-1h-2c-.6 0-1 .4-1 1v.4l-6.4 4.8c-.2-.1-.4-.2-.6-.2H6c-.6 0-1 .4-1 1v2c0 .6.4 1 1 1h2c.2 0 .4-.1.6-.2l6.4 4.8v.4c0 .6.4 1 1 1h2c.6 0 1-.4 1-1v-2c0-.6-.4-1-1-1h-2c-.5 0-.8.3-.9.7L9 12.2v-.4z">
								</path>
							</svg></div>
					</div>
					<!-- /wp:outermost/icon-block -->

					<!-- wp:heading {"level":3} -->
					<h3 class="wp-block-heading">API &amp; Data Integrations</h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:term-template {"layout":{"type":"default","columnCount":3}} -->
				<!-- wp:term-name {"isLink":true,"backgroundColor":"background"} /-->
				<!-- /wp:term-template -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:terms-query -->

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
                "parent": 63
            },
            "metadata": {
                "name": "Tooling"
            }
        } -->
		<div class="wp-block-terms-query">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"10px","bottomRight":"10px"},"width":"1px"},"dimensions":{"minHeight":"100%"}},"borderColor":"gray-light","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top"}} -->
			<div class="wp-block-group has-border-color has-gray-light-border-color"
				style="border-width:1px;border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;min-height:100%;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:outermost/icon-block {"iconName":"wordpress-tool","width":"24px"} -->
					<div class="wp-block-outermost-icon-block">
						<div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg
								xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
								<path
									d="M14.103 7.128l2.26-2.26a4 4 0 00-5.207 4.804L5.828 15a2 2 0 102.828 2.828l5.329-5.328a4 4 0 004.804-5.208l-2.261 2.26-1.912-.512-.513-1.912zm-7.214 9.64a.5.5 0 11.707-.707.5.5 0 01-.707.707z">
								</path>
							</svg></div>
					</div>
					<!-- /wp:outermost/icon-block -->

					<!-- wp:heading {"level":3} -->
					<h3 class="wp-block-heading">Tooling</h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:term-template {"layout":{"type":"default","columnCount":3}} -->
				<!-- wp:term-name {"isLink":true,"backgroundColor":"background"} /-->
				<!-- /wp:term-template -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:terms-query -->
	</div>
	<!-- /wp:group -->

<?php
endforeach; ?>

</div>
<!-- /wp:group -->