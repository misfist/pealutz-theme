<?php
/**
 * Hooks
 *
 * @package PEA_Lutz
 */

namespace PEA_Lutz;



/**
 * Adds custom classes to the array of body classes.
 *
 * @author WebDevStudios
 *
 * @param array $classes Classes for the body element.
 *
 * @return array Body classes.
 */
function body_classes( $classes ) {
	if ( 'local' === wp_get_environment_type() ) {
		$classes[] = 'debug-screens';
	}

	if ( wp_is_mobile() ) {
		$classes[] = 'mobile';
	}

	if ( is_singular() ) {
		global $post;
		$classes[] = 'page-' . $post->post_name;
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'single-' . get_post_type();
	}

	if ( is_singular() && is_front_page() ) {
		$classes[] = 'front-page';
	}

	return $classes;
}
add_filter( 'body_class', __NAMESPACE__ . '\body_classes' );


