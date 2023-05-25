<?php 
/*
Template Name: parallax page
*/
/*
  固定ページテンプレートでparallax pageを選択したら有効化
  アイキャッチ画像に登録した画像（フルサイズ）を移動背景にする。
  固定ページに子ページがある場合、それらも読み込み、同様に処理。
*/
get_header();?>

<main id="main" class="parallax page" role="main">

    <?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
        <section class="paracontainer">
        
            <div class="imgcontainer pximg1" style="background: url(<?php echo esc_html(wp_get_attachment_url( get_post_thumbnail_id())) ;?>) fixed no-repeat ; background-size: cover;">
                <div class="paracontent">
                    <h1 class="para-h1"><?php the_title();?></h1>
                    <div class="whitebg">
                         <?php the_content(); ?>
                    </div>
                </div><!--  paracontent  -->
            </div><!-- imgcontainer -->

        </section><!--  paracontainer  -->
<script>
jQuery(function(){
	var bg1 = jQuery(".pximg1").css("height").replace("px","");
	jQuery(window).scroll(function(){
		var j_scroll = jQuery(this).scrollTop();
		jQuery(".pximg1").css('background-position','0 '+ parseInt( 0 - j_scroll * 0.1 ) + 'px');
	});
});
</script>
	<?php 
    /* 子ページをパララックスの要素にする。
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
    $plx_num = 1;
    while ($child_query -> have_posts()) : $child_query -> the_post(); ?>
    <?php $plx_num =  1 + $plx_num ;?>

    <section class="paracontainer">
        <div class="imgcontainer pximg<?php echo $plx_num ;?>" style="background: url(<?php echo esc_html(wp_get_attachment_url( get_post_thumbnail_id())) ;?>) fixed no-repeat ; background-size: cover;">
            <div class="paracontent">
                <h1 class="para-h1"><?php the_title();?></h1>
                <div class="whitebg">
                    <?php the_content(); ?>
                </div>
            </div><!--  paracontent  -->
        </div>
    </section><!--  paracontainer/imgcontainer  -->
<script>
jQuery(function(){
	var bg<?php echo $plx_num;?> = jQuery(".pximg<?php echo $plx_num;?>").css("height").replace("px","");
	jQuery(window).scroll(function(){
		var j_scroll = jQuery(this).scrollTop();
		jQuery(".pximg<?php echo $plx_num;?>").css('background-position','0 '+ parseInt( bg<?php echo $plx_num;?> - j_scroll * 0.5 ) + 'px');
	});
});
</script>

        <?php endwhile ; endif ;?>
        <?php wp_reset_postdata();?>
        
		<?php endwhile;?>
        
	<?php endif;?>
    
</main>

<?php get_footer();?>