<?php
/**
 * Title: Content Project
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

	<!-- wp:post-content {"className":"entry-content"} /-->

	<!-- wp:post-terms {"term":"project_tag","separator":" ","className":"project-tags"} /-->

	<!-- wp:read-more {"content":"View Site","linkTarget":"_blank"} /-->
</div>
<!-- /wp:group -->