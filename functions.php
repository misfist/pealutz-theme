<?php
/**
 * P.E.A. Lutz theme functions
 *
 * @package PEA_Lutz
 */

/**
 * Load all files from the /inc directory.
 *
 * @return void
 */
function init(): void {
	foreach ( glob( get_stylesheet_directory() . '/inc/*.php' ) as $file ) {
		require_once $file;
	}
}
init();