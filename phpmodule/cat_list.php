<?php 
// $target_slugは第1引数または cat="" で指定されたカテゴリースラッグのリストを取得。
// $target_firstは最初のスラッグを取得。後に一覧リンクとして出力する。
if ( isset($atts["cat"]) ) {
    $target_slug = $atts["cat"];
    $target_first = explode( ',' , $atts["cat"])[0];
} else {
    $target_slug = $atts[0];
    $target_first = explode( ',' , $atts[0])[0];
}
// 第2引数又は num="" で指定された出力件数を取得。指定がない場合は全記事を出力する。
if ( isset($atts["num"]) ) {
    $item_num = $atts["num"];
} elseif( isset($atts[1]) ) {
    $item_num = $atts[1];
} else {
    $item_num = 0;
}

// ,区切りのカテゴリースラッグを,区切りのカテゴリー名に変換。見出しに使う。
$slug_array = explode(",", $target_slug);
$category_names = array();
foreach ($slug_array as $slug) {
    $term = get_term_by('slug', $slug, 'category');
    if ($term) {
        $category_names[] = $term->name;
    }
}
$category_names_string = implode(",", $category_names);

// 記事リストの見出し
if ( isset($atts["title"]) ) {
    $section_title = $atts["title"];
} elseif ( isset($atts[2]) ) {
    $section_title = $atts[2];
} else {
    $section_title =  $category_names_string . "一覧";
}

//　サブループの取得条件
$child_query2 =  new WP_Query( array(
    'post_type'		=> 'post',
    'category_name'	=> $target_slug,
    'posts_per_page'=> $item_num,
));

?>

<?php if ( $child_query2 -> have_posts()): ?>
    <article class="post-list">
        <h2><?php echo $section_title ;?></h2>
        <div class="flex">
            <?php while ( $child_query2 -> have_posts()): $child_query2 -> the_post();?>
                <section class="post-list-item">
                    <?php if (has_post_thumbnail()):?>
                    <a href="<?php the_permalink() ;?>" class="small-img post-list-img"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
                    <?php else: ?>
                    <a href="<?php the_permalink() ;?>" class="no-img post-list-img">No image</a>
                    <?php endif;?>
                    <div class="post-list-info">
                        <a href="<?php the_permalink() ;?>">
                            <h2 class="post-list-heading">
                                <span class="post-date"><?php the_time('Y/n/j');?></span>
                                <span class="post-list-title"><?php the_title();?></span>
                            </h2>
                            <div class="post-list-excerpt"><?php the_excerpt() ;?></div>
                        </a>
                    </div>
                </section>
            <?php endwhile; ?>
        </div>
    <?php if(!array_key_exists(1, $slug_array)):?>
        <div class="aligncenter">
            <a href="<?php echo get_category_link ( get_category_by_slug($target_first)->term_id );?>" class="button-link" role="button">もっと見る</a>
        </div>
    <?php endif;?>
    </article>
<?php endif; wp_reset_postdata();?>