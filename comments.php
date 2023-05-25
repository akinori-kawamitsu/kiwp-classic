<?php if ( post_password_required() ) {return ;}?>

<?php if (comments_open()):?>
<article class="comments">
	
	<?php if ( have_comments() ) : ?>
		<section>
			<h2 class="comment-title"><?php esc_html_e('Comments','ki-orion');?></h2>
			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'avatar_size' => 24
					) );
				?>
			</ol><!-- .comment-list -->
		</section>

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ki-orion' ); ?></p>
	<?php endif; ?>

	<?php comment_form();?>

</article>
<?php endif; ?>