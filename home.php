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

		<header class="archive-header bg-blueDark py-10 lg:py-16 mb-12 relative overflow-y-hidden">
			<div class="container">
				<h4 class="text-accent uppercase mb-4">explore out blog</h4>
				<h1 class="text-blueLight">Real Talk. Practical Tips. <br/> <span class="text-accent font-extralight">Zero Tech Headaches.</span></h1>
				<p class="text-white">Whether you're trying to make sense of your tech, stay ahead of the latest trends, or just want to learn something new without the jargon, you're in the right place. Our blog is full of clear, helpful insights from the team that makes IT feel easy.</p>
				<div class="flex justify-between items-center mt-16">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/library/images/NA-Dots.png' ); ?>" alt="Dot pattern" class="w-12 rotate-90 ml-5">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/library/images/NA-Intro-Icon.png' ); ?>" alt="Lines pattern" class="w-20">
				</div>
			</div>
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/library/images/NA-Icon-Line-BG.png' ); ?>" alt="Hero Background Icon" class="absolute top-0 right-0 w-[50%] pointer-events-none hidden lg:block">
		</header>

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
