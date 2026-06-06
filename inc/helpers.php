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
