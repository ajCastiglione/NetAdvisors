<?php
/**
 * Content & Media Block Template
 *
 * @package Minerva Web Development
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'content-media-block';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'content-media';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$orientation     = 'left' === get_field( 'media_side' ) ? 'flex-row-reverse' : 'flex-row';
$image           = get_field( 'media' );
$img_underlay    = get_stylesheet_directory_uri() . '/library/images/NA-About-Color-BG.png';
$content_title   = get_field( 'title' );
$content         = get_field( 'content' );
$dots            = get_stylesheet_directory_uri() . '/library/images/NA-About-Dots.png';
$secondary_icons = get_stylesheet_directory_uri() . '/library/images/NA-About-Icon.png';

?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> bg-blueMid text-white">
	<div class="relative container py-16 lg:py-20">
		<div class="title text-5xl mb-20 md:mb-18">
			<?php
			if ( ! empty( $content_title ) ) :
				echo wp_kses_post( $content_title );
			endif;
			?>
		</div>

		<div class="flex flex-col-reverse md:<?php echo esc_attr( $orientation ); ?> items-center gap-12 md:gap-16">
			<div class="md:w-2/5 w-full">
				<?php
				if ( $content ) :
					echo wp_kses_post( $content );
				endif;
				?>
			</div>
			<?php if ( $image ) : ?>
				<div class="md:w-3/5 w-full relative z-[1]">
					<img class="relative z-10 animate-pulse-slow w-[80%] -right-16 md:-right-28" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
					<img class="absolute top-0 left-0 max-h-full z-[1]" src="<?php echo esc_url( $img_underlay ); ?>" alt="Image underlay">
					<img class="absolute w-8 md:w-12 -top-8 md:-top-12 left-3 md:left-10 z-[2] pointer-events-none" src="<?php echo esc_url( $dots ); ?>" alt="Dots">
					<img class="absolute w-10 md:w-16 bottom-[15%] left-4 z-[2] pointer-events-none" src="<?php echo esc_url( $secondary_icons ); ?>" alt="Secondary Icons">
				</div>
			<?php endif; ?>
		</div>

		<div class="hidden lg:block top-0 -left-4 border-l-2 border-accent w-1 h-[70%] absolute"></div>
		<div class="hidden lg:block top-[80%] -left-[4.5rem] absolute -rotate-90 text-blueDark font-semibold">Making IT Easy</div>


	</div>
</section>
