<?php 
if ( isset($pageslug["slug"]) ) {
    $target_slug = $pageslug["slug"];
} else {
    $target_slug = $pageslug[0];
}
$kipage_query =  new WP_Query( array(
    'post_type'		=> 'page',
    'name'	=> $target_slug,
));

if ($kipage_query -> have_posts()):
?>

<?php while ( $kipage_query -> have_posts()): $kipage_query -> the_post(); ?>
<section>
    <h1 class="insert-title"><?php the_title();?></h1>
    <?php the_content();?>
</section>
<?php endwhile; ?>
<?php endif; wp_reset_postdata();?>