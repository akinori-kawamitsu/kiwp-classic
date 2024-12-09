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
		<?php // comments_template(); ?>
	</section>
	<?php endwhile; endif;?>	
</main>
<?php get_sidebar();?>
<?php get_footer(); ?>