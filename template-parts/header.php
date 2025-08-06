<?php
/**
 * Template for displaying the hero section
 *
 * @package ViteWP
 */

$logo = get_field( 'logo', 'option' );
if ( ! $logo ) {
	$logo = array(
		'url' => get_template_directory_uri() . '/library/images/logo.png',
		'alt' => 'Site Logo',
	);
}

?>

<div class="hero bg-blueDark">

	<div class="hero__inner container-lg">

		<div>
			<a class="hero__logo" href="<?php echo esc_url( home_url() ); ?>" rel="nofollow">
				<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" class="max-w-xs">
			</a>
		</div>

		<div class="nav-container">
			<nav data-js-nav class="nav" role="navigation">
				<?php
				wp_nav_menu(
					array(
						'container'       => false,
						'container_class' => 'menu',
						'menu'            => __( 'The Main Menu', 'ViteWP' ),
						'menu_class'      => 'main-nav',
						'theme_location'  => 'main-nav',
						'depth'           => 2,
					)
				);
				?>
			</nav>
		</div>
	</div>

</div>
