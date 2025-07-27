<?php get_header(); ?>
	<main id="main" class="top-main" role="main">
		<?php if( has_header_image() ):?>
		<div class="top-kv"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></div>
		<?php endif;?>
		<?php if (have_posts()): 
			while (have_posts()): the_post();?>
			<section class="top-page">
				<h1><?php the_title(); ?></h1>
				<?php the_content();?>
			</section>
			<?php endwhile; ?>
		<?php endif; ?>


		<?php $child_query1 =  new WP_Query( array(
					'post_type'		=> 'post',
					'category_name'	=> 'uncategorized',
					'posts_per_page'=> 6,
				));?>
		<?php if ( $child_query1 -> have_posts()): ?>
		<article class="container">
			<h2>未分類</h2>
			<div class="pc-4 gap-30">
				<?php while ( $child_query1 -> have_posts()): $child_query1 -> the_post();?>
				<section class="top-posts card">
					<?php if (has_post_thumbnail()):?>
					<a href="<?php the_permalink() ;?>" class="small-img"><?php the_post_thumbnail( 'small' ); ?></a>
					<?php else: ?>
					<a href="<?php the_permalink() ;?>" class="no-img">No image</a>
					<?php endif;?>
					<h2 class="card-post-title"><a href="<?php the_permalink() ;?>"><?php echo wp_strip_all_tags( mb_substr( $post->post_title, 0, 20) , true );?></a></h2>
					<div class="card-post-excerpt"><?php echo wp_strip_all_tags( mb_substr( get_the_excerpt(), 0, 50 ) , true ) ;?></div>
					<div class="card-more" role="button"><a href="<?php the_permalink() ;?>" class="card-more-btn">詳しく</a></div>
				</section>
				<?php endwhile; ?>
			</div>
			<div class="aligncenter mt-30 clear">
				<a href="<?php ki_cat_link('uncategorized');?>" class="button-link" role="button">もっと見る</a>
			</div>
		</article>
		<?php endif; wp_reset_postdata();?>

	</main>

	<?php get_sidebar();?>
<?php get_footer(); ?>