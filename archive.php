<?php get_header(); ?>
	<main id="main" class="main" role="main">
		<div class="container">
			<article class="flex">
				<h1 class="post-title col-12"><?php single_cat_title( '', true ); ?></h1>
				<?php if (have_posts()): 
					while (have_posts()): the_post();?>
					<section class="col-4 card">
						<?php if (has_post_thumbnail()):?>
						<a href="<?php the_permalink() ;?>" class="small-img"><?php the_post_thumbnail( 'small' ); ?></a>
						<?php else: ?>
						<a href="<?php the_permalink() ;?>" class="no-img">No image</a>
						<?php endif;?>
						<h2 class="card-post-title"><a href="<?php the_permalink() ;?>"><?php echo wp_strip_all_tags( mb_substr( $post->post_title, 0, 25)  ,true ) ;?></a></h2>
						<div class="card-post-excerpt"><?php echo wp_strip_all_tags( mb_substr( get_the_excerpt(), 0, 50 ) ,true )  ;?></div>
						<div class="card-more" aria-role="button"><a href="<?php the_permalink() ;?>" class="card-more-btn">詳しく</a></div>
					</section>
					<?php endwhile; ?>
					<?php ki_page_navigation(); ?>
				<?php endif; ?>
			</article>
		</div>
	</main>
<?php get_sidebar();?>
<?php get_footer(); ?>