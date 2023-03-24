<?php
/**
 * Hooks
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PeaLutz
 */
namespace PeaLutz\Inc;

/**
 * Modify Query
 * 
 * @link https://developer.wordpress.org/reference/hooks/pre_get_posts/
 *
 * @param object $query
 * @return void
 */
function home_query( $query ) {
    if ( ! \is_admin() && $query->is_main_query() ) {
		if ( $query->is_home() ) {
			$query->set( 'post_type', 'project' );
		}
	}
}
\add_filter( 'pre_get_posts', __NAMESPACE__ . '\home_query', 11 );