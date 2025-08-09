<?php
/**
 * Contact Block Template
 *
 * @package Minerva Web Development
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'contact';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'contact';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$eyebrow     = get_field( 'eyebrow' );
$block_title = get_field( 'title' );
$intro       = get_field( 'intro' );
$form_id     = get_field( 'form' );
$form        = do_shortcode( '[gravityform id="' . esc_html( $form_id ) . '" title="false" description="false" ajax="true"]' );
$bg          = get_stylesheet_directory_uri() . '/library/images/Contact-Module-BG.png';
$dots        = get_stylesheet_directory_uri() . '/library/images/NA-Dots.png';

?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> text-white py-12 lg:py-16 lg:pt-32 relative">

	<div class="container relative">

		<div class="flex flex-col md:flex-row justify-center gap-6 lg:gap-16 2xl:gap-32">
			<div class="w-full md:w-1/2">
				<?php
				if ( $eyebrow ) :
					?>
					<p class="text-sm text-accent font-semibold mb-4 uppercase"><?php echo esc_html( $eyebrow ); ?></p>
					<?php
				endif;
				if ( $block_title ) :
					?>
					<h2 class="text-4xl lg:text-6xl mb-8 text-blueLight font-extralight"><?php echo esc_html( $block_title ); ?></h2>
					<?php
				endif;
				if ( $intro ) :
					?>
					<p class="mb-8"><?php echo esc_html( $intro ); ?></p>
					<?php
				endif;
				?>
			</div>
			<div class="w-full md:w-1/2">
				<?php
				if ( $form ) :
					echo ( $form ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				endif;
				?>
			</div>
		</div>

		<img class="absolute w-14 -top-44 left-0 z-[1] pointer-events-none hidden lg:block" src="<?php echo esc_url( $dots ); ?>" alt="Dots">
	</div>

	<img class="absolute w-full h-full -z-[1] top-0 left-0 pointer-events-none" src="<?php echo esc_url( $bg ); ?>" alt="Background Pattern">
</section>
