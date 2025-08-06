<?php
/**
 * Hero Block Template
 *
 * @package Minerva Web Development
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'hero-block';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'acf-hero';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$bg_color     = get_field( 'background_color' );
$image        = get_field( 'image' );
$img_underlay = get_stylesheet_directory_uri() . '/library/images/blue-blob.png';
$content      = get_field( 'content' );

?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> bg-<?php echo esc_attr( $bg_color ); ?> text-white">
	<div class="hero-content">
		<div class="hero-text">
			<?php echo wp_kses_post( $content ); ?>
		</div>
		<?php if ( $image ) : ?>
			<div class="hero-image">
				<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
				<img class="hero-underlay" src="<?php echo esc_url( $img_underlay ); ?>" alt="Image underlay">
			</div>
		<?php endif; ?>
	</div>
</section>
