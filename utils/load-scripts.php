<?php
/**
 * Load scripts and styles
 *
 * @package    Utils
 */

/**
 * Enqueue scripts and styles
 *
 * @return void
 */
function load_scripts() {
	// Load development styles/scripts, if on localhost.
	if ( is_localhost() ) {
		wp_enqueue_script( 'index-scripts', 'http://localhost:5173/library/js/index.js', array( 'jquery' ), '1.0.0', true );
	} else {
		// Get modified file time.
		$script_version = filemtime( get_template_directory() . '/dist/index.js' );
		$style_version  = filemtime( get_template_directory() . '/dist/index.css' );
		wp_enqueue_script( 'index-scripts', get_template_directory_uri() . '/dist/index.js', array(), $script_version, true );
		wp_enqueue_style( 'index-styles', get_template_directory_uri() . '/dist/index.css', array(), $style_version );
	}
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );
