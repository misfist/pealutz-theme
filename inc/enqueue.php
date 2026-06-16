<?php
/**
 * Enqueue scripts and styles
 *
 * @package PEA_Lutz
 */

namespace PEA_Lutz;

/**
 * @return void
 */
function enqueue_assets(): void {
	$dir = get_template_directory();
	$uri = get_template_directory_uri();

	$asset                      = include $dir . '/build/index.asset.php';
	// $interactivity_asset        = include $dir . '/build/interactivity.asset.php';
	$interactivity_dependencies = array(
		array(
			'id'     => '@wordpress/interactivity',
			'import' => 'static',
		),
	);

	wp_enqueue_style(
		'pealutz-style',
		$uri . '/build/index.css',
		array(),
		$asset['version']
	);

	wp_enqueue_script(
		'pealutz-scripts',
		$uri . '/build/index.js',
		$asset['dependencies'],
		$asset['version'],
		true
	);

	wp_enqueue_script_module(
		'pealutz-interactivity',
		$uri . '/build/interactivity.js',
		$interactivity_dependencies,
		$asset['version'],
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
