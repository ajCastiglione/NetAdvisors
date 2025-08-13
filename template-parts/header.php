<?php
/**
 * Template for displaying the header section
 *
 * @package Minerva Web Development
 */

$logo = get_field( 'logo', 'option' );
if ( ! $logo ) {
	$logo = array(
		'url' => get_template_directory_uri() . '/library/images/logo.png',
		'alt' => 'Site Logo',
	);
}

?>

<div class="bg-blueDark">

	<div class="relative container flex flex-row justify-between items-center py-4 lg:py-8">

		<div>
			<a href="<?php echo esc_url( home_url() ); ?>" rel="nofollow">
				<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" class="max-w-[175px] md:max-w-xs m-0">
			</a>
		</div>

		<div class="nav-container">
			<nav data-js-nav class="nav" role="navigation">
				<?php
				wp_nav_menu(
					array(
						'container'       => false,
						'container_class' => 'menu',
						'menu'            => __( 'The Main Menu', 'mwd' ),
						'menu_class'      => 'main-nav',
						'theme_location'  => 'main-nav',
						'depth'           => 1,
					)
				);
				?>
			</nav>
		</div>

		<div class="hidden lg:block top-1/2 -left-4 border-l-2 border-accent w-1 h-1/2 absolute"></div>
	</div>

</div>
