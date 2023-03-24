<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package PeaLutz
 */
namespace PeaLutz\Inc;

 /**
  * Enqueue scripts and styles.
  */
function scripts() {
	$theme   = \wp_get_theme();
	$version = $theme->get( 'Version' );

	\wp_enqueue_style( 'style', \get_template_directory_uri() . '/build/index.css', array(), $version, 'all' );
	\wp_enqueue_script( 'scripts', \get_template_directory_uri() . '/build/index.js', array(), $version, true );
}
\add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\scripts' );