<?php
/**
 * Hooks
 *
 * @package PEA_Lutz
 */

namespace PEA_Lutz;

/**
 * Customize Block Queries
 *
 * @link https://developer.wordpress.org/reference/hooks/query_loop_block_query_vars/
 *
 * @param  array $query
 * @param  obj   $block
 * @param  int   $page
 * @return array $query
 */
function query_loop_vars( $query, $block, $page ): array {
	global $post;

	if ( is_front_page() && is_main_query() ) {
		$query['orderby']   = 'menu_order';
		$query['order']     = 'ASC';
		$query['post_type'] = 'page';

		$home = get_option( 'page_on_front' );
		if ( $home ) {
			$query['post__not_in'] = array( (int) $home );
		}

		error_log( __FUNCTION__ . print_r( $block->context, true ) );

	}

	return $query;
}
// add_filter( 'query_loop_block_query_vars', __NAMESPACE__ . '\query_loop_vars', 10, 3 );


/**
 * Add post slug as ID to each post-template list item.
 *
 * @param  string $block_content
 * @param  array  $block
 * @return string
 */
function post_template_slug_ids( string $block_content, array $block ): string {
	// if ( 'core/post-template' !== $block['blockName'] ) {
	// 	return $block_content;
	// }

	$processor = new \WP_HTML_Tag_Processor( $block_content );

	while ( $processor->next_tag( 'li' ) ) {
		$classes = $processor->get_attribute( 'class' );

		if ( null === $classes || ! preg_match( '/\bpost-(\d+)\b/', $classes, $matches ) ) {
			continue;
		}

		$post_id = (int) $matches[1];
		$post    = get_post( $post_id );
		if ( $post ) {
			$processor->set_attribute( 'id', $post->post_name );
		}
	}

	return $processor->get_updated_html();
}
add_filter( 'render_block_core/post-template', __NAMESPACE__ . '\post_template_slug_ids', 10, 2 );

/**
 * Replace ul/li markup in post template blocks with divs.
 *
 * @param string $block_content The rendered block HTML.
 * @param array  $block         The block data array.
 * @return string Modified block HTML.
 */
function replace_post_template_list_markup( $block_content, $block ) {
	// if ( 'core/post-template' !== $block['blockName'] ) {
	// 	return $block_content;
	// }

	$classes = $block['attrs']['className'] ?? '';

	if ( ! str_contains( $classes, 'main-query' ) ) {
		return $block_content;
	}

	$block_content = str_replace( '<ul ', '<section ', $block_content );
	$block_content = str_replace( '</ul>', '</section>', $block_content );
	$block_content = str_replace( '<li ', '<article ', $block_content );
	$block_content = str_replace( '</li>', '</article>', $block_content );

	return $block_content;
}
// add_filter( 'render_block_core/post-template', __NAMESPACE__ . '\replace_post_template_list_markup', 10, 2 );
