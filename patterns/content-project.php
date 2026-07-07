<?php
/**
 * Title: Content Project Item
 * Slug: pealutz/content-project
 * Description: Single project item with featured image and project information.
 * Categories: pealutz
 * Keywords: project, portfolio
 */
?>
<!-- wp:post-featured-image {"isLink":true,"sizeSlug":"thumbnail","linkTarget":"_blank"} /-->

<!-- wp:group {"metadata":{"name":"Content"},"className":"post-entry","layout":{"type":"flex"}} -->
<div class="wp-block-group post-entry">

	<!-- wp:group {"tagName":"header","className":"post-header","layout":{"type":"default"}} -->
	<header class="wp-block-group post-header">
		<!-- wp:post-title {"level":3,"isLink":true,"linkTarget":"_blank"} /-->

		<!-- wp:post-terms {"term":"project_type","separator":" | ","className":"project-type"} /-->

	</header>
	<!-- /wp:group -->

	<!-- wp:group { "className":"post-content","anchor":"project-content-expand","layout":{"type":"default"}} -->
	<div id="project-content-expand" class="wp-block-group post-content">

		<!-- wp:post-content {"className":"entry-content","anchor":"project-content"} /-->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-muted","anchor":"expand-button"} -->
				<div class="wp-block-button is-style-muted" id="expand-button">
					<a class="wp-block-button__link wp-element-button">
						<span data-wp-bind--hidden="context.expanded"><?php esc_html_e( '+', 'pealutz' );?></span>
						<span data-wp-bind--hidden="!context.expanded"><?php esc_html_e( '-', 'pealutz' );?></span>
					</a>
				</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

	<!-- wp:post-terms {"term":"project_tag","separator":" ","className":"project-tags"} /-->

	<!-- wp:read-more {"content":"View Site","linkTarget":"_blank"} /-->
</div>
<!-- /wp:group -->
