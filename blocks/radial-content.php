<?php
/**
 * Radial Content Block Template
 *
 * @package Minerva Web Development
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'radial-content-block';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'radial-content';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$center_image     = get_field( 'center_image' );
$content_sections = get_field( 'content_sections' );
// Split the sections into 2 arrays for left and right alignment. There will always be 6 total sections, 3 on each side.
$left_sections  = array();
$right_sections = array();
if ( $content_sections ) {
	$left_sections  = array_slice( $content_sections, 0, 3 );
	$right_sections = array_slice( $content_sections, 3 );
}

?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> bg-blueDark lg:bg-none px-4 pb-12 lg:pb-0 lg:px-0">
	<div class="">
		<div class="flex flex-col lg:flex-row justify-center items-stretch relative">

			<div class="lg:w-1/2">
				<?php
				if ( $left_sections ) :
					foreach ( $left_sections as $section ) :
						echo '<div class="radial-content-section left-half">';
						echo wp_kses_post( $section['content'] );
						echo '<a href="#contact" class="btn btn-blue opacity-0 mt-2 hover:bg-blueDark hover:text-white">Contact Us</a>';
						echo '</div>';
					endforeach;
				endif;
				?>
			</div>

			<img src="<?php echo esc_url( $center_image['url'] ); ?>" alt="<?php echo esc_attr( $center_image['alt'] ); ?>" class="lg:w-1/3 m-auto mb-4 lg:mb-0 order-first lg:order-none lg:absolute left-1/2 top-1/2 lg:transform lg:-translate-x-1/2 lg:-translate-y-1/2 z-10 max-w-[342px] 2xl:max-w-[33rem]">

			<div class="lg:w-1/2">
				<?php
				if ( $right_sections ) :
					foreach ( $right_sections as $section ) :
						echo '<div class="radial-content-section right-half">';
						echo wp_kses_post( $section['content'] );
						echo '<a href="#contact" class="btn btn-blue opacity-0 mt-2 hover:bg-blueDark hover:text-white">Contact Us</a>';
						echo '</div>';
					endforeach;
				endif;
				?>
			</div>

		</div>
	</div>
</section>
