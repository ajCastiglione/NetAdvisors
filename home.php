<?php
/**
 * Blog Archive.
 *
 * @package Minerva Web Development
 */

get_header();

$home_id = get_option( 'page_on_front' );
if ( $home_id ) {
	$blocks = parse_blocks( get_post_field( 'post_content', $home_id ) );
}

global $wp_query;

?>

<div id="content">

	<main id="main" role="main">

		<?php
		get_template_part(
			'template-parts/single-header',
			null,
			array(
				'title'     => 'explore our blog',
				'subtitle'  => 'Real Talk. Practical Tips. <br/> <span class="text-accent font-extralight">Zero Tech Headaches.</span>',
				'body_text' => "Whether you're trying to make sense of your tech, stay ahead of the latest trends, or just want to learn something new without the jargon, you're in the right place. Our blog is full of clear, helpful insights from the team that makes IT feel easy.",
			)
		);
		?>

		<div class="grid grid-cols-3 gap-6 lg:gap-8 mb-12 container">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/card' );
				endwhile;
				wp_reset_postdata();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div>
		<div class="container">
			<?php mwd_pagination( $wp_query ); ?>
		</div>
		<?php
		if ( ! empty( $blocks ) ) :
			if ( $blocks ) {
				foreach ( $blocks as $block ) {
					if ( 'acf/testimonials' === $block['blockName'] ) {
						echo render_block( $block ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
					if ( 'acf/contact' === $block['blockName'] ) {
						echo render_block( $block ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
				}
			}
		endif;
		?>

	</main>

</div>


<?php get_footer(); ?>
