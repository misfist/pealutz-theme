<?php
/**
 * Interactivity API
 *
 * @package PEA_Lutz
 */

namespace PEA_Lutz;

const APP_NAMESPACE            = 'pealutz/portfolio';
const PROJECT_EXPAND_NAMESPACE = 'pealutz/project-expand';
const ROUTER_NAMESPACE         = 'pealutz/site-navigation';

/**
 * Add Interactivity Router API directives to the `site-main` class.
 *
 * @since 1.0.11
 *
 * @param string $block_content
 * @param array  $block
 *
 * @return string
 */
function add_navigation_directives( string $block_content, array $block ): string {
	$processor = new \WP_HTML_Tag_Processor( $block_content );

	$target = 'site-main';

	if ( $processor->next_tag( array( 'class_name' => $target ) ) ) {
		$processor->set_attribute( 'data-wp-interactive', ROUTER_NAMESPACE );
		$processor->set_attribute( 'data-wp-router-region', ROUTER_NAMESPACE );
	}

	return $processor->get_updated_html();
}
\add_filter( 'render_block_core/group', __NAMESPACE__ . '\add_navigation_directives', 10, 2 );

/**
 * Add Interactivity API directives to the portfolio content block.
 *
 * @param string $block_content
 * @param array  $block
 *
 * @return string
 */
function add_portfolio_directives( string $block_content, array $block ): string {
	$target = 'portfolio-content';
	if ( empty( $block['attrs']['anchor'] ) || $target !== $block['attrs']['anchor'] ) {
		return $block_content;
	}

	$processor = new \WP_HTML_Tag_Processor( $block_content );

	if ( $processor->next_tag() ) {
		$processor->set_attribute( 'data-wp-init', APP_NAMESPACE . '::callbacks.syncActiveFilter' );
	}

	return $processor->get_updated_html();
}
\add_filter( 'render_block_core/post-content', __NAMESPACE__ . '\add_portfolio_directives', 10, 2 );

/**
 * Add Interactivity API directives to the Query block for portfolio filtering.
 *
 * @param string $block_content
 * @param array  $block
 *
 * @return string
 */
function add_portfolio_query_directives( string $block_content, array $block ): string {
	$target = 'portfolio';
	if ( empty( $block['attrs']['anchor'] ) || $target !== $block['attrs']['anchor'] ) {
		return $block_content;
	}

	$active_filter = isset( $_GET['project-tag'] ) ? \sanitize_title( \wp_unslash( $_GET['project-tag'] ) ) : '';
	\wp_interactivity_state( APP_NAMESPACE, array( 'activeFilter' => $active_filter ) );

	$processor = new \WP_HTML_Tag_Processor( $block_content );

	$target_class = 'wp-block-query';

	if ( $processor->next_tag( array( 'class_name' => $target_class ) ) ) {
		$processor->set_attribute( 'data-wp-interactive', APP_NAMESPACE );
		// $processor->set_attribute( 'data-wp-context', '{"activeFilter":""}' );
	}

	return $processor->get_updated_html();
}
\add_filter( 'render_block_core/query', __NAMESPACE__ . '\add_portfolio_query_directives', 10, 2 );

/**
 * Add Interactivity API directives to the filters group block.
 *
 * @param string $block_content
 * @param array  $block
 *
 * @return string
 */
function add_portfolio_filters_directives( string $block_content, array $block ): string {
	$target = 'filters-portfolio';
	if ( empty( $block['attrs']['anchor'] ) || $target !== $block['attrs']['anchor'] ) {
		return $block_content;
	}

	$processor = new \WP_HTML_Tag_Processor( $block_content );

	$target_class = 'wp-block-group';
	$pattern      = array(
		'class_name' => $target_class,
	);

	if ( $processor->next_tag( $pattern ) ) {
		$processor->set_attribute( 'data-wp-interactive', APP_NAMESPACE );
	}

	return $processor->get_updated_html();
}
\add_filter( 'render_block_core/group', __NAMESPACE__ . '\add_portfolio_filters_directives', 10, 2 );

/**
 * Add Interactivity API directives to project post template items.
 *
 * @uses get_id_from_class()
 *
 * @param string $block_content
 * @param array  $block
 *
 * @return string
 */
function add_portfolio_item_directives( string $block_content, array $block ): string {
	$processor = new \WP_HTML_Tag_Processor( $block_content );

	$target_class = 'wp-block-post';
	$pattern      = array(
		'tag_name'   => 'li',
		'class_name' => $target_class,
	);

	while ( $processor->next_tag( $pattern ) ) {
		$class_value = $processor->get_attribute( 'class' ) ?? '';
		$post_id     = get_id_from_class( $class_value );

		if ( $post_id ) {
			$tags = \wp_get_post_terms( $post_id, 'project_tag', array( 'fields' => 'slugs' ) );
			$processor->set_attribute( 'data-wp-context', \wp_json_encode( array( 'projectTags' => $tags ) ) );
		}

		$processor->set_attribute( 'data-wp-class--hidden', APP_NAMESPACE . '::callbacks.isHidden' );
	}

	return $processor->get_updated_html();
}
\add_filter( 'render_block_core/post-template', __NAMESPACE__ . '\add_portfolio_item_directives', 10, 2 );

/**
 * Add Interactivity API directives to filter term items.
 *
 * @uses get_id_from_class()
 *
 * @param string $block_content
 * @param array  $block
 *
 * @return string
 */
function add_filter_term_directives( string $block_content, array $block ): string {
	$excluded_class = 'skills-list';

	$class_name = $block['attrs']['className'] ?? '';
	$classes    = explode( ' ', $class_name );

	if ( in_array( $excluded_class, $classes, true ) ) {
		return $block_content;
	}

	$processor       = new \WP_HTML_Tag_Processor( $block_content );
	$target_tag      = 'li';
	$target_link_tag = 'a';

	while ( $processor->next_tag( $target_tag ) ) {
		$class = $processor->get_attribute( 'class' ) ?? '';

		$term_id = get_id_from_class( $class, 'term' );

		if ( $term_id ) {
			$term = \get_term( $term_id );

			if ( $term && ! \is_wp_error( $term ) ) {
				$processor->set_attribute( 'data-wp-context', \wp_json_encode( array( 'termSlug' => $term->slug ) ) );

				if ( $processor->next_tag( $target_link_tag ) ) {
					$processor->set_attribute( 'data-wp-on--click', APP_NAMESPACE . '::actions.setFilter' );
					$processor->set_attribute( 'data-wp-class--is-active', APP_NAMESPACE . '::callbacks.isActive' );
				}
			}
		}
	}

	return $processor->get_updated_html();
}
\add_filter( 'render_block_core/term-template', __NAMESPACE__ . '\add_filter_term_directives', 10, 2 );

/**
 * Add Interactivity API directives to the "View All" button.
 *
 * @param string $block_content
 * @param array  $block
 *
 * @return string
 */
function add_view_all_directives( string $block_content, array $block ): string {
	$target = 'portfolio-all';
	if ( empty( $block['attrs']['anchor'] ) || $target !== $block['attrs']['anchor'] ) {
		return $block_content;
	}

	$processor  = new \WP_HTML_Tag_Processor( $block_content );
	$target_tag = 'a';

	if ( $processor->next_tag( $target_tag ) ) {
		$processor->set_attribute( 'data-wp-on--click', APP_NAMESPACE . '::actions.resetFilter' );
		$processor->set_attribute( 'data-wp-class--is-active', APP_NAMESPACE . '::callbacks.isAllActive' );
	}

	return $processor->get_updated_html();
}
\add_filter( 'render_block_core/button', __NAMESPACE__ . '\add_view_all_directives', 10, 2 );

/**
 * Add Interactivity API directives to project-content-expand wrapper block.
 *
 * @param string $block_content
 * @param array  $block
 *
 * @return string
 */
function add_project_content_expand_directives( string $block_content, array $block ): string {
	$target = 'project-content-expand';
	if ( empty( $block['attrs']['anchor'] ) || $target !== $block['attrs']['anchor'] ) {
		return $block_content;
	}

	$processor    = new \WP_HTML_Tag_Processor( $block_content );
	$target_class = 'wp-block-group';
	$pattern      = array(
		'class_name' => $target_class,
	);

	if ( $processor->next_tag( $pattern ) ) {
		$processor->set_attribute( 'data-wp-interactive', PROJECT_EXPAND_NAMESPACE );
		$processor->set_attribute( 'data-wp-context', '{"expanded":false}' );
		$processor->set_attribute( 'data-wp-init', 'callbacks.init' );
	}

	return $processor->get_updated_html();
}
\add_filter( 'render_block_core/group', __NAMESPACE__ . '\add_project_content_expand_directives', 10, 2 );

/**
 * Add Interactivity API directives to project post-content block.
 *
 * @param string $block_content
 * @param array  $block
 *
 * @return string
 */
function add_project_content_directives( string $block_content, array $block ): string {
	$target = 'project-content';
	if ( empty( $block['attrs']['anchor'] ) || $target !== $block['attrs']['anchor'] ) {
		return $block_content;
	}

	$processor    = new \WP_HTML_Tag_Processor( $block_content );
	$target_class = 'wp-block-post-content';
	$pattern      = array(
		'class_name' => $target_class,
	);

	if ( $processor->next_tag( $pattern ) ) {
		$processor->set_attribute( 'data-wp-class--is-expanded', 'context.expanded' );
	}

	return $processor->get_updated_html();
}
\add_filter( 'render_block_core/post-content', __NAMESPACE__ . '\add_project_content_directives', 10, 2 );

/**
 * Add Interactivity API directives to project button block.
 *
 * @param string $block_content
 * @param array  $block
 *
 * @return string
 */
function add_expand_button_directives( string $block_content, array $block ): string {
	$target = 'expand-button';
	if ( empty( $block['attrs']['anchor'] ) || $target !== $block['attrs']['anchor'] ) {
		return $block_content;
	}

	$processor  = new \WP_HTML_Tag_Processor( $block_content );
	$target_tag = 'a';

	if ( $processor->next_tag( $target_tag ) ) {
		$processor->set_attribute( 'data-wp-bind--hidden', '!context.isOverflowing' );
		$processor->set_attribute( 'data-wp-on--click', 'actions.toggle' );
		$processor->set_attribute( 'aria-label', \esc_attr__( 'Click to toggle full description.', 'pealutz' ) );
	}

	return $processor->get_updated_html();
}
\add_filter( 'render_block_core/button', __NAMESPACE__ . '\add_expand_button_directives', 10, 2 );

/**
 * Mark non-filterable skill terms so their links can be disabled.
 *
 * @param string $block_content
 * @param array  $block
 *
 * @return string
 */
function add_skill_term_link_state( string $block_content, array $block ): string {
	$target_class      = 'skills-list';
	$term_class_prefix = 'term-';
	$term_meta_key     = 'is_filter';

	$class_name = $block['attrs']['className'] ?? '';
	$classes    = explode( ' ', $class_name );

	if ( ! in_array( $target_class, $classes, true ) ) {
		return $block_content;
	}

	$processor = new \WP_HTML_Tag_Processor( $block_content );

	while ( $processor->next_tag( 'li' ) ) {
		$item_classes = explode( ' ', $processor->get_attribute( 'class' ) ?? '' );
		$term_id      = 0;

		foreach ( $item_classes as $item_class ) {
			if ( 0 === strpos( $item_class, $term_class_prefix ) ) {
				$term_id = (int) substr( $item_class, strlen( $term_class_prefix ) );
				break;
			}
		}

		if ( $term_id ) {
			$is_filter = \get_term_meta( $term_id, $term_meta_key, true );

			$pattern = array(
				'class_name' => 'wp-block-term-name',
			);

			if ( ! $is_filter && $processor->next_tag( $pattern ) ) {
				$processor->add_class( 'no-link' );
			}
		}
	}

	return $processor->get_updated_html();
}
\add_filter( 'render_block_core/term-template', __NAMESPACE__ . '\add_skill_term_link_state', 10, 2 );
