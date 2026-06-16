<?php
/**
 * Enqueue scripts and styles
 *
 * @package PEA_Lutz
 */

namespace PEA_Lutz;

/**
 * Register Block category
 *
 * @return void
 */
function register_block_category(): void {
	$args = array(
		'label' => __( 'P E A Lutz', 'pealutz' ),
	);
	\register_block_pattern_category( 'pealutz', $args );
}
\add_action( 'init', __NAMESPACE__ . '\register_block_category' );

/**
 * Register block style variations.
 *
 * @return void
 */
function register_block_styles(): void {
	\register_block_style(
		'core/heading',
		array(
			'name'  => 'embellished',
			'label' => __( 'Embellished', 'pealutz' ),
		)
	);
	\register_block_style(
		'core/heading',
		array(
			'name'  => 'bulleted',
			'label' => __( 'Bulleted', 'pealutz' ),
		)
	);
	\register_block_style(
		'core/heading',
		array(
			'name'  => 'ruled',
			'label' => __( 'Ruled', 'pealutz' ),
		)
	);
	\register_block_style(
		'core/heading',
		array(
			'name'  => 'ruled-left',
			'label' => __( 'Ruled Left', 'pealutz' ),
		)
	);
	\register_block_style(
		'core/paragraph',
		array(
			'name'  => 'read-more',
			'label' => __( 'Fancy Link', 'pealutz' ),
		)
	);
	\register_block_style(
		'core/paragraph',
		array(
			'name'  => 'label',
			'label' => __( 'Label', 'pealutz' ),
		)
	);
	\register_block_style(
		'core/paragraph',
		array(
			'name'  => 'intro',
			'label' => __( 'Intro', 'pealutz' ),
		)
	);
	\register_block_style(
		'core/paragraph',
		array(
			'name'  => 'embellished',
			'label' => __( 'Embellished', 'pealutz' ),
		)
	);
	\register_block_style(
		'core/paragraph',
		array(
			'name'  => 'bulleted',
			'label' => __( 'Bulleted', 'pealutz' ),
		)
	);
	\register_block_style(
		'core/paragraph',
		array(
			'name'  => 'ruled',
			'label' => __( 'Ruled', 'pealutz' ),
		)
	);
	\register_block_style(
		'core/paragraph',
		array(
			'name'  => 'ruled-left',
			'label' => __( 'Ruled Left', 'pealutz' ),
		)
	);
	register_block_style(
		'core/list',
		array(
			'name'  => 'fancy-bullets',
			'label' => __( 'Red Bullets', 'pealutz' ),
		)
	);
	register_block_style(
		'core/list',
		array(
			'name'  => 'pills',
			'label' => __( 'Pills', 'pealutz' ),
		)
	);
	\register_block_style(
		'core/navigation',
		array(
			'name'  => 'list',
			'label' => __( 'Vertical List', 'pealutz' ),
		)
	);
}
\add_action( 'init', __NAMESPACE__ . '\register_block_styles' );

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