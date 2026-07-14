<?php
/**
 * Helpers
 *
 * @package PEA_Lutz
 */

namespace PEA_Lutz;

/**
 * Get repeater field values
 *
 * @param  string                   $field_name
 * @param  mixed string || string[] $subfield_names
 * @param  int                      $post_id
 * @return array
 */
function get_repeater_values( string $field_name, $subfield_names, $post_id = null ): array {
	global $post;
	$post_id        = ( $post_id ) ? (int) $post_id : get_the_ID();
	$repeater_value = get_post_meta( $post_id, $field_name, true );
	$array          = array();
	if ( $repeater_value ) {
		for ( $i = 0; $i < $repeater_value; $i++ ) {
			if ( 'array' === gettype( $subfield_names ) ) {
				foreach ( $subfield_names as $subfield_name ) {
					$sub_field_value               = get_repeater_value( $post_id, $field_name, $subfield_name, $i );
					$array[ $i ][ $subfield_name ] = $sub_field_value;
				}
			} elseif ( 'string' === gettype( $subfield_names ) ) {
				$sub_field_value                = get_repeater_value( $post_id, $field_name, $subfield_names, $i );
				$array[ $i ][ $subfield_names ] = $sub_field_value;
			}
		}
	}
	return $array;
}

/**
 * Get repeater field value
 *
 * @param  integer $post_id
 * @param  string  $field_name
 * @param  string  $subfield_name
 * @param  integer $index
 * @return void
 */
function get_repeater_value( int $post_id, string $field_name, string $subfield_name, int $index ) {
	$meta_key        = "{$field_name}_{$index}_{$subfield_name}";
	$sub_field_value = get_post_meta( $post_id, $meta_key, true );
	return $sub_field_value;
}

/**
 * Get IDs of Project posts with project_type = project.
 *
 * @return int[]
 */
function get_project_ids(): array {
	$post_type = 'project';
	$taxonomy  = 'project_type';

	$post_ids = \get_posts(
		array(
			'post_type'      => $post_type,
			'posts_per_page' => -1,
			'fields'         => 'ids',
			'tax_query'      => array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'slug',
					'terms'    => $post_type,
				),
			),
		)
	);

	if ( empty( $post_ids ) ) {
		return array();
	}

	return $post_ids;
}

/**
 * Get project_tag term IDs used by projects, optionally filtered by parent term.
 *
 * @param null||int[] $post_ids
 * @param int         $parent_term_id
 *
 * @return int[]
 */
function get_project_tag_ids( ?array $post_ids = null, int $parent_term_id = 0 ): array {
	$taxonomy = 'project_tag';

	if ( null === $post_ids ) {
		$post_ids = get_project_ids();
	}

	if ( empty( $post_ids ) ) {
		return array();
	}

	$used_args = array(
		'taxonomy'   => $taxonomy,
		'object_ids' => $post_ids,
		'fields'     => 'ids',
	);

	$used_ids = \get_terms( $used_args );

	if ( \is_wp_error( $used_ids ) || empty( $used_ids ) ) {
		return array();
	}

	if ( ! $parent_term_id ) {
		return $used_ids;
	}

	$key = 'is_filter';

	$child_ids = \get_terms(
		array(
			'taxonomy'   => $taxonomy,
			'parent'     => $parent_term_id,
			'fields'     => 'ids',
			'hide_empty' => false,
			'meta_query' => array(
				array(
					'key'   => $key,
					'value' => '1',
				),
			),
		)
	);

	if ( \is_wp_error( $child_ids ) ) {
		return array();
	}

	return array_values( array_intersect( $used_ids, $child_ids ) );
}

/**
 * Get parent terms
 *
 * @link https://developer.wordpress.org/reference/classes/WP_Term_Query/__construct/
 *
 * @param string $taxonomy
 * @param bool   $is_filter
 *
 * @return array
 */
function get_parent_terms( string $taxonomy = 'project_tag', bool $is_filter = true ): array {
	$args = array(
		'taxonomy'   => $taxonomy,
		'hide_empty' => false,
		'parent'     => 0,
	);

	if ( $is_filter ) {
		$key                = 'is_filter';
		$args['meta_query'] = array(
			array(
				'key'   => $key,
				'value' => '1',
			),
		);
	}

	$query = new \WP_Term_Query( $args );

	if ( is_wp_error( $query ) ) {
		return array();
	}

	$posts = $query->get_terms();

	return $posts;
}

/**
 * Check if a block query is for a specific post type, taxonomy and term.
 *
 * @since 1.0.6
 *
 * @param array  $query
 * @param string $post_type
 * @param string $taxonomy
 * @param string $term_slug
 *
 * @return bool
 */
function is_block_query( array $query, string $post_type, string $taxonomy, string $term_slug ): bool {
	if ( ( $query['post_type'] ?? '' ) !== $post_type ) {
		return false;
	}

	foreach ( $query['tax_query'] ?? array() as $item ) {
		$item_taxonomy = $item['taxonomy'] ?? '';
		$item_terms    = (array) ( $item['terms'] ?? array() );
		$item_slugs    = array_map(
			function ( $term_id ) use ( $taxonomy ) {
				$term = \get_term_by( 'id', (int) $term_id, $taxonomy );
				return $term ? $term->slug : '';
			},
			$item_terms
		);

		if ( $taxonomy === $item_taxonomy && in_array( $term_slug, $item_slugs, true ) ) {
			return true;
		}
	}

	return false;
}
