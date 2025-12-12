<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<?php if( is_front_page() || is_home() ) :?>
<meta property="og:type" content="website" />
<?php else :?>
<meta property="og:type" content="article" />
<?php endif ;?>
<meta property="og:url" content="<?php echo 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
<meta name="twitter:card" content="summary_large_image" />

<?php 
if (is_front_page() || is_home()   ){
     if(have_posts()): while(have_posts()): the_post();
          echo '<meta property="og:title" content="' . get_bloginfo('description'). ' | '.get_bloginfo('name'). ' " /> '; echo "\n";
          echo '<meta property="og:description" content="'.get_the_excerpt().'" />'; echo "\n";
          echo '<meta name="description" content="'.get_the_excerpt().'" />'; echo "\n";
     endwhile; endif;
} elseif(is_singular() && ! is_archive()) {
          echo '<meta property="og:title" content="' .wp_title( "",false).  ' | '.get_bloginfo('name').' " /> '; echo "\n";
          echo '<meta property="og:description" content="'.get_the_excerpt().'" />'; echo "\n";
          echo '<meta name="description" content="'.get_the_excerpt().'" />'; echo "\n";
} else {
     echo '<meta property="og:title" content="' .get_bloginfo('name'). '" />'; echo "\n";
     echo '<meta property="og:description" content="' . get_bloginfo('description').  '" />'; echo "\n";
}
?>
<?php 
if(have_posts()) {
     $str = $post->post_content;
     $searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
     if (has_post_thumbnail() && ! is_archive() && ! is_front_page() && ! is_home()){
          $image_id = get_post_thumbnail_id();
          $image = wp_get_attachment_image_src( $image_id, 'full');
          echo '<meta property="og:image" content="'.$image[0].'" />';echo "\n";
     } else if ( preg_match( $searchPattern, $str, $imgurl ) && ! is_archive() && ! is_front_page() && ! is_home()) {
          echo '<meta property="og:image" content="'.$imgurl[2].'" />';echo "\n";
     } else {// if no thumbnail, no image, or archive page.
          echo '<meta property="og:image" content="" />';echo "\n";
     }
}
?>