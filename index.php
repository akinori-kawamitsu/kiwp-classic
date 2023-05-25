<?php get_header(); ?>
<?php if (have_posts()): ?>
<?php while (have_posts()): the_post();
?>
	<?php if (has_post_thumbnail() ) :?>
	<div class="page-kv"><?php the_post_thumbnail( 'full' );?></div>
	<?php endif;?>
	<?php  ki_breadcrumb() ;?>
		<div class="content-wrapper">
		<main id="main" class="main" role="main">

			<div class="container">
			<h1 class="post-title"><?php echo get_the_title();?></h1>
				<div <?php post_class();?>><?php the_content() ;?></div>
				<?php comments_template(); ?>
				</div>
			</main>
		</div>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_sidebar();?>

<?php get_footer(); ?>