<?php
/**
 * Title: Content Expertise
 * Slug: pealutz/content-expertise
 * Description: Expertise section with title, divider, and two-column skills list.
 * Categories: pealutz
 * Keywords: expertise, skills, meta
 */

use function PEA_Lutz\get_parent_terms;

$terms = get_parent_terms( 'project_tag', false );
if ( empty( $terms ) ) {
	return;
}
?>

<!-- wp:group {
	"metadata": {
		"name": "Skills",
		"categories": [
			"pealutz"
		],
		"patternName": "pealutz/content-expertise"
	},
	"style": {
		"border": {
			"width": "1px"
		},
		"spacing": {
			"blockGap": "0"
		}
	},
	"backgroundColor": "white",
	"borderColor": "gray-light",
    "className": "skills-section",
	"layout": {
		"type": "grid",
		"minimumColumnWidth": "300px",
		"columnCount": 2
	}
} -->
<div class="wp-block-group has-border-color has-gray-light-border-color has-white-background-color has-background skills-section" style="border-width:1px">

<?php
foreach ( $terms as $term ) :
	$term_id = $term->term_id;
	$key     = 'is_filter';
	$is_link = ( get_term_meta( $term_id, $key, true ) ) ? 'true' : 'false';
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
		"parent": <?php echo $term_id; ?>
	},
	"metadata": {
		"name": "<?php echo esc_html( $term->name ); ?>"
	},
	"className": "skills-query <?php echo esc_html( $term->slug ); ?>"
} -->
<div class="wp-block-terms-query">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
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

		<!-- wp:term-template {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default","columnCount":3},"className":"skills-list"} -->
		<!-- wp:term-name {"isLink":<?php echo $is_link; ?>} /-->
		<!-- /wp:term-template -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:terms-query -->

	<?php
endforeach;
?>

</div>
<!-- /wp:group -->