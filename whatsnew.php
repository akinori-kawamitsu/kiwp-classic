<?php 
/*
Template Name: 最新記事一覧ページ
*/
get_header(); ?>
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

<main id="main" class="main" role="main">
	<?php if (have_posts()): while (have_posts()): the_post();?>
	<section class="container">
        <?php  ki_breadcrumb() ;?>
		<?php the_title('<h1 class="archive-title">','</h1>');?>
		<div <?php post_class();?>><?php the_content() ;?></div>
	</section>
	<?php endwhile; endif;?>

    <?php 
        $paged = get_query_var('paged')? get_query_var('paged') : 1;
        $child_query =  new WP_Query( array(
            'post_type'		=> 'post',
            'posts_per_page'=> 8,
            'orderby'     => 'date',
            'order' => 'DESC',
            'paged' => $paged,
            'post_status' => 'publish'
        ));
    ?>
    <article class="container">
        <h1 class="post-title"><?php single_cat_title( '', true ); ?></h1>
        <?php if ($child_query -> have_posts()): ?>
            <div class="pc-4 gap-20 mb-30">
            <?php while ($child_query -> have_posts()): $child_query -> the_post();?>
            <section class="card">
                <?php if (has_post_thumbnail()):?>
                <a href="<?php the_permalink() ;?>" class="small-img"><?php the_post_thumbnail( 'small' ); ?></a>
                <?php else: ?>
                <a href="<?php the_permalink() ;?>" class="no-img">No image</a>
                <?php endif;?>
                <h2 class="card-post-title"><a href="<?php the_permalink() ;?>"><?php echo wp_strip_all_tags( mb_substr( $post->post_title, 0, 25)  ,true ) ;?></a></h2>
                <div class="card-post-excerpt"><?php echo wp_strip_all_tags( mb_substr( get_the_excerpt(), 0, 50 ) ,true )  ;?></div>
                <div class="card-more" role="button"><a href="<?php the_permalink() ;?>" class="card-more-btn">詳しく</a></div>
            </section>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <div class="pagenation">
            <?php
                if ($child_query -> max_num_pages > 1) {
                    echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => 'page/%#%/',
                        'current' => max(1, $paged),
                        'mid_size' => 1,
                        'total' => $child_query -> max_num_pages
                    ));
                }
            ?>
        </div>
        <?php wp_reset_postdata();?>
    </article>
</main>