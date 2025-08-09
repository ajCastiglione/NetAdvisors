<?php
/**
 * ACF Configurations.
 *
 * @package Minerva Web Development
 */

/**
 * ACF JSON Save Point.
 *
 * @param string $path content.
 * @return string
 */
function mwd_acf_json_save_point( $path ) {
	// update path.
	$path = get_stylesheet_directory() . '/library/acf-json';

	// return.
	return $path;
}
add_filter( 'acf/settings/save_json', 'mwd_acf_json_save_point' );

/**
 * ACF JSON Load Point.
 *
 * @param string $paths content.
 * @return string
 */
function mwd_acf_json_load_point( $paths ) {
	// remove original path.
	unset( $paths[0] );

	// append path.
	$paths[] = get_stylesheet_directory() . '/library/acf-json';

	// return.
	return $paths;
}
add_filter( 'acf/settings/load_json', 'mwd_acf_json_load_point' );

/**
 * Options Pages and block registry.
 *
 * @since 1.0.0
 *
 * @return void
 */
function mwd_acf_option_init() {
	// Check function exists.
	if ( function_exists( 'acf_add_options_sub_page' ) ) {
		// Add options page for BR.
		acf_add_options_page(
			array(
				'page_title' => 'Options Page',
				'menu_title' => 'Options Page',
				'menu_slug'  => 'theme-options',
				'capability' => 'edit_posts',
				'redirect'   => false,
				'position'   => 2,
			)
		);
	}
	// Add blocks.
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type(
			array(
				'name'            => 'hero',
				'title'           => __( 'Hero' ),
				'description'     => __( 'Hero block containing a background image and text overlay' ),
				'render_callback' => 'render_callback',
				'category'        => 'layout',
				'icon'            => 'superhero-alt',
				'mode'            => 'edit',
				'align'           => 'wide',
				'keywords'        => array( 'hero', 'background', 'overlay' ),
				'supports'        => array(
					'multiple' => false,
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'content-media',
				'title'           => __( 'Content & Media' ),
				'description'     => __( 'Displays a title, media, and content section with a choice of background color' ),
				'render_callback' => 'render_callback',
				'category'        => 'layout',
				'icon'            => 'media-document',
				'align'           => 'wide',
				'keywords'        => array( 'content', 'media' ),
				'mode'            => 'edit',
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'content',
				'title'           => __( 'Content' ),
				'description'     => __( 'Content block with a choice of background color' ),
				'render_callback' => 'render_callback',
				'category'        => 'layout',
				'icon'            => 'media-text',
				'align'           => 'wide',
				'keywords'        => array( 'content' ),
				'mode'            => 'edit',
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'radial-content',
				'title'           => __( 'Radial Content' ),
				'description'     => __( 'Radial content that matches the center image. Specific to the image used at time of development.' ),
				'render_callback' => 'render_callback',
				'category'        => 'layout',
				'icon'            => 'image-filter',
				'align'           => 'wide',
				'keywords'        => array( 'radial content' ),
				'mode'            => 'edit',
			)
		);
	}
}
add_action( 'acf/init', 'mwd_acf_option_init' );

/**
 * ACF Render Callback.
 *
 * @param array $block content.
 * @return void
 */
function render_callback( $block ) {
	// Name has to be equal to the file name after content.
	$slug = str_replace( 'acf/', '', $block['name'] );

	// include a template part from within the "template-parts/blocks" folder.
	$path = get_stylesheet_directory() . "/blocks/{$slug}.php";
	if ( file_exists( $path ) ) {
		require $path;
	}
}
