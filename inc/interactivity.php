<?php
/**
 * Interactivity API
 *
 * @package PEA_Lutz
 */

namespace PEA_Lutz;

/**
 * Add Interactivity API directives to the Query block for portfolio filtering.
 *
 * @param string $block_content
 * @param array  $block
 *
 * @return string
 */
function add_portfolio_query_directives( string $block_content, array $block ): string {
	if ( empty( $block['attrs']['anchor'] ) || 'portfolio' !== $block['attrs']['anchor'] ) {
		return $block_content;
	}

	$processor = new \WP_HTML_Tag_Processor( $block_content );

	if ( $processor->next_tag( array( 'class_name' => 'wp-block-query' ) ) ) {
		$processor->set_attribute( 'data-wp-interactive', 'pealutz/portfolio' );
		$processor->set_attribute( 'data-wp-context', '{"activeFilter":""}' );
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
	if ( empty( $block['attrs']['anchor'] ) || 'filters-portfolio' !== $block['attrs']['anchor'] ) {
		return $block_content;
	}

	$processor = new \WP_HTML_Tag_Processor( $block_content );

	if ( $processor->next_tag( array( 'class_name' => 'wp-block-group' ) ) ) {
		$processor->set_attribute( 'data-wp-interactive', 'pealutz/portfolio' );
	}

	return $processor->get_updated_html();
}
\add_filter( 'render_block_core/group', __NAMESPACE__ . '\add_portfolio_filters_directives', 10, 2 );

/**
 * Add Interactivity API directives to project post template items.
 *
 * @param string $block_content
 * @param array  $block
 *
 * @return string
 */
function add_portfolio_item_directives( string $block_content, array $block ): string {
	$processor = new \WP_HTML_Tag_Processor( $block_content );

	while ( $processor->next_tag( 'li' ) ) {
		$processor->set_attribute( 'data-wp-class--hidden', 'callbacks.isHidden' );
	}

	return $processor->get_updated_html();
}
\add_filter( 'render_block_core/post-template', __NAMESPACE__ . '\add_portfolio_item_directives', 10, 2 );

/**
 * Add Interactivity API directives to filter term items.
 *
 * @param string $block_content
 * @param array  $block
 *
 * @return string
 */
function add_filter_term_directives( string $block_content, array $block ): string {
	$processor = new \WP_HTML_Tag_Processor( $block_content );

	while ( $processor->next_tag( 'li' ) ) {
		$class = $processor->get_attribute( 'class' ) ?? '';

		if ( preg_match( '/\bterm-(\d+)\b/', $class, $matches ) ) {
			$term = \get_term( (int) $matches[1] );

			if ( $term && ! \is_wp_error( $term ) ) {
				$processor->set_attribute( 'data-wp-context', wp_json_encode( array( 'termSlug' => $term->slug ) ) );

				if ( $processor->next_tag( 'a' ) ) {
					$processor->set_attribute( 'data-wp-on--click', 'actions.setFilter' );
					$processor->set_attribute( 'data-wp-class--is-active', 'callbacks.isActive' );
				}
			}
		}
	}

	return $processor->get_updated_html();
}
\add_filter( 'render_block_core/term-template', __NAMESPACE__ . '\add_filter_term_directives', 10, 2 );
