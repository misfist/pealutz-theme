<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package PeaLutz
 */
namespace PeaLutz\Inc;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
\add_filter( 'body_class', __NAMESPACE__ . '\body_classes' );
