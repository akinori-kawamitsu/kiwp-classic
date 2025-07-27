<?php get_header(); ?>
<?php if (have_posts()): ?>
<?php while (have_posts()): the_post();
?>
	
	<main id="main" class="post-main" role="main">

		<div class="container">
			<?php if (has_post_thumbnail() ) :?>
			<div class="post-kv"><?php the_post_thumbnail( 'full' );?></div>
			<?php endif;?>

			<?php  ki_breadcrumb() ;?>
			<h1 class="post-title"><?php echo get_the_title();?></h1>
			<div <?php post_class();?>><?php the_content() ;?></div>
			<?php //comments_template(); ?>
		</div>

	</main>
		<?php
		$prev_post = get_previous_post(true); // 同一カテゴリに属する前の投稿を取得
		$next_post = get_next_post(true); // 同一カテゴリに属する次の投稿を取得
		?>
		<div class="post-nav container">
			<div class="prevpost">
			<?php if( $prev_post ):?>
			<a href="<?php echo get_permalink($prev_post->ID); ?>"> 前の記事：「<?php echo get_the_title($prev_post->ID); ?>」 </a>
			<?php endif; ?>
			</div>
			<div class="nextpost">
			<?php if( $next_post ):?>
			<a href="<?php echo get_permalink($next_post->ID); ?>"> 次の記事：「<?php echo get_the_title($next_post->ID); ?>」 </a>
			<?php endif; ?>
			</div>
		</div>

	<?php endwhile; ?>

	<?php
	$related_cat = get_the_category();
	$category_array = array();
	foreach($related_cat as $category) {
		$category_array[] = $category->cat_ID;
	}
	$child_query1 =  new WP_Query( array(
		'post_type'		=> 'post',
		'category__in'	=> $category_array,
		'post__not_in'	=> array($post->ID),
		'posts_per_page'=> 4,
	));
	?>
	<?php if ( $child_query1 -> have_posts()): ?>
		<aside class="container">
			
			<h2>関連記事</h2>
			<div class="pc-4 gap-20">
				<?php while ( $child_query1 -> have_posts()): $child_query1 -> the_post();?>
				<section class="card">
					<?php if (has_post_thumbnail()):?>
					<a href="<?php the_permalink() ;?>" class="small-img"><?php the_post_thumbnail( 'small' ); ?></a>
					<?php else: ?>
					<a href="<?php the_permalink() ;?>" class="no-img">No image</a>
					<?php endif;?>
					<h2 class="card-post-title"><a href="<?php the_permalink() ;?>"><?php echo wp_strip_all_tags( mb_substr( $post->post_title, 0, 20) , true );?></a></h2>
					<div class="card-post-excerpt"><?php echo wp_strip_all_tags( mb_substr( get_the_excerpt(), 0, 50 ) , true ) ;?></div>
					<div class="card-more" aria-role="button"><a href="<?php the_permalink() ;?>" class="card-more-btn">詳しく</a></div>
				</section>
				<?php endwhile; ?>
			</div>
		
		</aside>
	<?php endif; wp_reset_postdata();?>
	
<?php endif; ?>

<?php get_sidebar();?>

<?php get_footer(); ?>