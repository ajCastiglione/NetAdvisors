<?php
/**
 * The template for displaying Comments.
 *
 * @package ViteWP
 */

// don't load it if you can't comment.
if ( post_password_required() ) {
	return;
}

?>

<?php if ( have_comments() ) : ?>

<h3 id="comments-title" class="h2"><?php comments_number( __( '<span>No</span> Comments', 'ViteWP' ), __( '<span>One</span> Comment', 'ViteWP' ), __( '<span>%</span> Comments', 'ViteWP' ) ); ?></h3>

<section class="commentlist">
	<?php
	wp_list_comments(
		array(
			'style'             => 'div',
			'short_ping'        => true,
			'avatar_size'       => 40,
			'callback'          => 'bones_comments',
			'type'              => 'all',
			'reply_text'        => __( 'Reply', 'ViteWP' ),
			'page'              => '',
			'per_page'          => '',
			'reverse_top_level' => null,
			'reverse_children'  => '',
		)
	);
	?>
</section>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav class="navigation comment-navigation" role="navigation">
		<div class="comment-nav-prev"><?php previous_comments_link( __( '&larr; Previous Comments', 'ViteWP' ) ); ?></div>
		<div class="comment-nav-next"><?php next_comments_link( __( 'More Comments &rarr;', 'ViteWP' ) ); ?></div>
	</nav>
<?php endif; ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ViteWP' ); ?></p>
<?php endif; ?>

<?php endif; ?>

<?php comment_form(); ?>
