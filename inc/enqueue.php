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
	$version = wp_get_theme()->get( 'Version' );
	$dir     = get_template_directory();
	$uri     = get_template_directory_uri();

	$asset_file = $dir . '/build/index.asset.php';
	$asset      = file_exists( $asset_file ) ? require $asset_file : array( 'version' => $version );

	wp_enqueue_style(
		'pealutz-style',
		$uri . '/build/index.css',
		array(),
		$asset['version']
	);

	if ( file_exists( $dir . '/build/index.js' ) ) {
		wp_enqueue_script(
			'pealutz-scripts',
			$uri . '/build/index.js',
			$asset['dependencies'] ?? array(),
			$asset['version'],
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );

/**
 * @return void
 */
function enqueue_editor_assets(): void {
	$version = wp_get_theme()->get( 'Version' );
	$dir     = get_template_directory();
	$uri     = get_template_directory_uri();

	$asset_file = $dir . '/build/editor.asset.php';
	$asset      = file_exists( $asset_file ) ? require $asset_file : array( 'version' => $version );

	wp_enqueue_style(
		'pealutz-editor-style',
		$uri . '/build/editor.css',
		array(),
		$asset['version']
	);
}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_editor_assets' );
