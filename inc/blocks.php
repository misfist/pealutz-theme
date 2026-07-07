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
	\register_block_style(
		'core/button',
		array(
			'name'  => 'small',
			'label' => __( 'Small', 'pealutz' ),
		)
	);
	\register_block_style(
		'core/button',
		array(
			'name'  => 'muted',
			'label' => __( 'Muted', 'pealutz' ),
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
 * Customize Block Queries for Experience/Jobs
 *
 * @since 1.0.6
 *
 * @link https://developer.wordpress.org/reference/hooks/query_loop_block_query_vars/
 *
 * @param  array $query
 * @param  obj   $block
 * @param  int   $page
 * @return array $query
 */
function query_loop_vars_expertise( array $query, $block, $page ): array {
	$post_type = 'project';
	$taxonomy  = 'project_type';
	$term_slug = 'job';

	if ( ! is_block_query( $query, $post_type, $taxonomy, $term_slug ) ) {
		return $query;
	}

	$key = 'end_date';

	$meta_query = array(
		'relation'     => 'OR',
		'no_end_date'  => array(
			'key'     => $key,
			'compare' => 'NOT EXISTS',
		),
		'has_end_date' => array(
			'key'     => $key,
			'compare' => 'EXISTS',
			'type'    => 'DATE',
		),
	);

	$orderby = array(
		'no_end_date'  => 'DESC',
		'has_end_date' => 'DESC',
	);

	$query['meta_query'] = $meta_query;
	$query['orderby']    = $orderby;

	\add_filter( 'posts_clauses', __NAMESPACE__ . '\order_expertise_by_end_date', 10, 2 );

	return $query;
}
add_filter( 'query_loop_block_query_vars', __NAMESPACE__ . '\query_loop_vars_expertise', 10, 3 );

/**
 * Override ORDER BY to sort jobs by end_date, with no end_date first.
 *
 * @since 1.0.6
 *
 * @param array    $clauses
 * @param WP_Query $wp_query
 *
 * @return array
 */
function order_expertise_by_end_date( array $clauses, $wp_query ): array {
	global $wpdb;

	\remove_filter( 'posts_clauses', __NAMESPACE__ . '\order_expertise_by_end_date', 10 );

	$key        = 'end_date';
	$join_alias = 'end_date_meta';

	$clauses['join'] .= "
		LEFT JOIN {$wpdb->postmeta} AS {$join_alias}
			ON ( {$wpdb->posts}.ID = {$join_alias}.post_id
			AND {$join_alias}.meta_key = '{$key}' )
	";

	$clauses['orderby'] = "
		CASE WHEN {$join_alias}.meta_value IS NULL THEN 0 ELSE 1 END ASC,
		{$join_alias}.meta_value DESC
	";

	return $clauses;
}

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
