<?php get_header(); ?>
	<?php  ki_breadcrumb() ;?>
<div class="content-wrapper">
<main id="main" class="main" role="main">

	<div class="container">
		<h2 class="post-title">お探しのページは見つかりませんでした。</h2>
		<div <?php post_class();?>><?php the_content() ;?></div>
	</main>
	<?php get_sidebar();?>
</div>
<?php get_footer(); ?>