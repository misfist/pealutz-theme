<?php
/**
 * Jetpack compatibility
 *
 * @package PEA_Lutz
 */

namespace PEA_Lutz;

/**
 * @return void
 */
function jetpack_setup(): void {
	add_theme_support( 'jetpack-responsive-videos' );
	add_theme_support( 'jetpack-content-options', array(
		'post-details'    => array(
			'stylesheet' => 'pealutz-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
		'featured-images' => array(
			'archive' => true,
			'post'    => true,
			'page'    => true,
		),
	) );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\jetpack_setup' );

add_filter( 'jetpack_implode_frontend_css', '__return_false' );
