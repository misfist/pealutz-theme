<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PeaLutz
 */
namespace PeaLutz;

 /**
 * Get all the include files for the theme.
 *
 * @author Misfist
 */
function get_theme_include_files() {
	return array(
		'inc/setup.php', // Theme set up. Should be included first.
		'inc/hooks.php', // Load custom filters and hooks.
		'inc/enqueue.php', // Load styles and scripts.
		'inc/template-functions.php', // Custom functions.
		'inc/template-tags.php', // Custom template tags for this theme.
	);
}

foreach ( get_theme_include_files() as $include ) {
	require \trailingslashit( \get_template_directory() ) . $include;
}