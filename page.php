<?php get_header(); ?>
	<?php if (has_post_thumbnail() ) :?>
        <div class="page-kv">
            <picture>
                <?php if (get_post_meta($post->ID, 'page_kv', true)):?>
                <source srcset="<?php echo get_post_meta($post->ID, 'page_kv', true);?>" media="(max-width:640px)"
                    width="1280px" height="480px">
                <?php endif;?>
                <?php the_post_thumbnail('full');?>
            </picture>
		</div>
	<?php endif;?>
	<?php  ki_breadcrumb() ;?>
<main id="main" class="main" role="main">
	<?php if (have_posts()): while (have_posts()): the_post();?>
	<section class="container">
		<?php the_title('<h1 class="post-title">','</h1>');?>
		<div <?php post_class();?>><?php the_content() ;?></div>
		<?php comments_template(); ?>
	</section>
	<?php endwhile; endif;?>

	<?php 
    /* 子ページを並べて表示
       １　この固定ページのIDを取得。（参照用）
       ２　この固定ページを親とする固定ページ一式のクエリを取得
       ３　全部を順番に表示
    */
    $parent_id = get_the_ID();
    $child_query = new WP_Query (array(
                        'post_type' => 'page',
                        'post_parent' => $parent_id,
                        'posts_per_page' => 0,
                        'order' => 'ASC',
                        'orderby' => 'menu_order',
                        'post_status' => 'publish'
                        ));
    if ($child_query -> have_posts()):
    while ($child_query -> have_posts()) : $child_query -> the_post(); ?>

	<section class="container">
		<h1 class="post-title"><?php echo get_the_title();?></h1>
		<div <?php post_class();?>><?php the_content() ;?></div>
		<?php comments_template(); ?>
	</section>

	<?php endwhile ; endif ;?>
	<?php wp_reset_postdata();?>
	
</main>
<?php get_sidebar();?>
<?php get_footer(); ?>