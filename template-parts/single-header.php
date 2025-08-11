<?php
/**
 * Template part for displaying the header of a single post or page.
 *
 * @package Minerva Web Development
 */

$header_classes = 'archive-header bg-blueDark py-10 lg:py-16 mb-12 relative overflow-y-hidden';
if ( isset( $args ) ) {
	$header_title  = $args['title'] ?? '';
	$subtitle      = $args['subtitle'] ?? '';
	$body_text     = $args['body_text'] ?? '';
	$use_thumbnail = $args['use_thumbnail'] ?? false;

	if ( $use_thumbnail ) {
		$header_classes .= ' pb-0 lg:pb-1';
	}
}

?>
<header class="<?php echo esc_attr( $header_classes ); ?>">

	<div class="container">
		<h4 class="text-accent uppercase mb-4"><?php echo esc_html( $header_title ); ?></h4>
		<h1 class="text-blueLight"><?php echo wp_kses_post( $subtitle ); ?></h1>
		<p class="text-white"><?php echo wp_kses_post( $body_text ); ?></p>
		<div class="flex justify-between items-center mt-16">
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/library/images/NA-Dots.png' ); ?>" alt="Dot pattern" class="w-12 rotate-90 ml-5">
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/library/images/NA-Intro-Icon.png' ); ?>" alt="Lines pattern" class="w-20">
		</div>

		<?php if ( $use_thumbnail ) : ?>
			<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="w-full h-full relative z-10 mt-8">
		<?php endif; ?>
	</div>
	<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/library/images/NA-Icon-Line-BG.png' ); ?>" alt="Hero Background Icon" class="absolute top-0 right-0 w-[50%] pointer-events-none hidden lg:block">

</header>
