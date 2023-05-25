<?php
load_theme_textdomain( 'ki-classic', get_template_directory() . '/languages/' );

// Script and css in head
function ki_classic_script() {
    $mtime = filemtime( get_stylesheet_directory() . '/style.css' );
	wp_enqueue_style('ki-classic-style', get_stylesheet_uri().'?'.$mtime , array(), null, 'all');
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'kcss', get_template_directory_uri().'/js/kcss.js', array('jquery'), null, false);
	wp_enqueue_script( 'togglemenu', get_template_directory_uri().'/js/togglemenu.js', array('jquery'), null, false);
}
add_action('wp_enqueue_scripts','ki_classic_script');

// Custom menu
function action_navigation_menu_setup(){
	register_nav_menus( array('gnav' => 'Header navigation' ,
							  'snav' => 'Sub navigation',
							  'fnav' => 'Footer navigation',
							  'fnav2' => 'Footer navigation2',
							  'fnav3' => 'Footer navigation3',
							));
}
add_action('after_setup_theme', 'action_navigation_menu_setup');

// Enable widget
function ki_widgets_init() {
 register_sidebar(array(
 'name' => 'sidebar1',
 'id' => 'sidebar1',
 'description' => 'sidebar first menu',
 'before_title' => '<h3 class="side-title">',
 'after_title' => '</h3>'
 ));
 
 register_sidebar(array(
 'name' => 'sidebar2',
 'id' => 'sidebar2',
 'description' => 'sidebar second menu',
 'before_title' => '<h3 class="side-title">',
 'after_title' => '</h3>'
 ));
}
add_action('widgets_init','ki_widgets_init');

// Enable thumbnail image 
add_theme_support( 'post-thumbnails' );
add_image_size( 'small', 400, 300, true );

// 固定ページに抜粋を表示
add_post_type_support( 'page', 'excerpt' );

// wp_head()からtitleタグの出力を削除
remove_action('wp_head', '_wp_render_title_tag', 1);

// Enable editor style
add_editor_style('editor-style.css');

// Enable title tag
add_theme_support( 'title-tag' );

// Enable rss feed links
add_theme_support( 'automatic-feed-links' );

// Enable using html5 at forms
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

/* Enable custom header　*/
add_theme_support('custom-header', array(
	'default-image'			=> '',
	'random-default'		=> false,
	'width'					=> 1920,
	'height'				=> 980,
	'flex-height'			=> true,
	'flex-width'			=> true,
	'default-text-color'	=> '',
	'header-text'			=> true,
	'uploads'				=> true,
	'wp-head-callback'		=> '',
	'admin-head-callback'	=> '',
	'admin-preview-callback'=> '',
));

// Setting content width
if ( ! isset( $content_width ) ) $content_width = 600;

// 抜粋の長さの変更
function ki_excerpt_length($length) {
	return 80;
}
add_filter( 'excerpt_length', 'ki_excerpt_length', 999 );

//　The list of categories
function ki_catlist() {
	$kiexcat = get_category_by_slug('top') -> term_id;
	echo '<ul class="sitemap">';
	wp_list_categories(array(
							 'hide_empty' => 0,
							 'exclude' => $kiexcat,
							 'title_li' => "",
							 'carrent_category' => 1,
							 ));
	echo '</ul>';
}

// Title tag

/*
	Get the current category or term in archive page.
*/
function get_current_term(){
	$id;
	$tax_slug;
	if(is_category()){
		$tax_slug = "category";
		$id = get_query_var('cat');	
	}else if(is_tag()){
		$tax_slug = "post_tag";
		$id = get_query_var('tag_id');	
	}else if(is_tax()){
		$tax_slug = get_query_var('taxonomy');	
		$term_slug = get_query_var('term');	
		$term = get_term_by("slug",$term_slug,$tax_slug);
		$id = $term->term_id;
	}
	return get_term($id,$tax_slug);
}
/*
  via： http://blog.ks-product.com/wrodpress-get-current-term/

And write codes and edit as follow in template of archives (category.php, tag.php). 

$term = get_current_term(); 

and write follow codes when you want.
echo $term->name; 
echo $term->slug; 
echo $term->description; 
echo $term->count; 
*/

// Call page content by slug.
function ki_page_content($pageslug) {
	$kipage_query = new WP_Query(array('pagename' => $pageslug ));
	if ($kipage_query -> have_posts()):  $kipage_query -> the_post();
			the_content();
		endif;
    wp_reset_postdata();
}

// Call page link by slug.
// Call page link by slug.
function ki_page_link($page_slug) {
	echo get_permalink( get_page_by_path( $page_slug ) );
}

// Call category archive link by category slug.
function ki_cat_link($cat_slug) {
	$kicat_query = get_category_by_slug($cat_slug);
	echo get_category_link($kicat_query->term_id); 
}

/* Breadcrumb navigation */
function ki_breadcrumb($divOption = array("id" => "breadcrumb", "class" => "breadcrumb")){
	global $post;
	$text_home = esc_html__('home','ki-classic');
	$text_year = esc_html__('year','ki-classic');
	$text_month = esc_html__('month','ki-classic');
	$text_day = esc_html__('day','ki-classic');
	
	$str ='';
	if(!is_home()&&!is_admin()){
		$tagAttribute = '';
		foreach($divOption as $attrName => $attrValue){
			$tagAttribute .= sprintf(' %s="%s"', $attrName, $attrValue);
		}
		
		$str.= '<nav id="breadcrumb" itemprop="breadcrumb">';
		$str.= '<ul class="breadcrumb">';
		$str.= '<li><a href="'. home_url() .'/">'.$text_home.'</a></li>';
		
		if(is_category()) {
			$cat = get_queried_object();
			if($cat -> parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_category_link($ancestor) .'">'. get_cat_name($ancestor) .'</a></li>';
				}
			}
			$str.='<li>'. $cat -> name . '</li>';
		}
		
		elseif(is_single()){	/* post */
			$categories = get_the_category($post->ID);
			$cat = $categories[0];
			if($cat -> parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_category_link($ancestor).'">'. get_cat_name($ancestor). '</a></li>';
				}
			}
			$str.='<li><a href="'. get_category_link($cat -> term_id). '">'. $cat-> cat_name . '</a></li>';
			$str.= '<li>'. $post -> post_title .'</li>';
		}
		
		elseif(is_page()){
			if($post -> post_parent != 0 ){
				$ancestors = array_reverse(get_post_ancestors( $post->ID ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_permalink($ancestor).'">'. get_the_title($ancestor) .'</a></li>';
				}
			}
			$str.= '<li>'. $post -> post_title .'</li>';
		}
		
		elseif(is_date()){
		
			if(get_query_var('day') != 0){
				$str.='<li><a href="'. get_year_link(get_query_var('year')). '">' . get_query_var('year'). '年</a></li>';
				$str.='<li><a href="'. get_month_link(get_query_var('year'), get_query_var('monthnum')). '">'. get_query_var('monthnum') .'月</a></li>';
				$str.='<li>'. get_query_var('day'). '日</li>';
			}
			elseif(get_query_var('monthnum') != 0){
				$str.='<li><a href="'. get_year_link(get_query_var('year')) .'">'. get_query_var('year') .'年</a></li>';
				$str.='<li>'. get_query_var('monthnum'). '月</li>';
			}
			else {
				$str.='<li>'. get_query_var('year') .'年</li>';
			}
		}
		
		elseif(is_search()) {
			$str.='<li>キーワード「'. get_search_query() .'」で検索した結果</li>';
		}
		
		elseif(is_author()){
			$str .='<li>投稿者 : '. get_the_author_meta('display_name', get_query_var('author')).'の過去記事</li>';
		}
		
		elseif(is_tag()){
			$str.='<li>タグ : '. single_tag_title( '' , false ). '</li>';
		}
		
		elseif(is_attachment()){
			$str.= '<li>'. $post -> post_title .'</li>';
		}
		
		elseif(is_404()){
			$str.='<li>ページが見つかりません。</li>';
		}
		else{
			$str.='<li>'. wp_title('', true) .'</li>';
		}
		$str.='</ul>';
		$str.='</nav>';
	}
	echo $str;
}

//　Page navigation
function ki_page_navigation() {
    global $wp_rewrite;
    global $wp_query;
    global $paged;
    $paginate_base = get_pagenum_link(1);

    if(($wp_query->max_num_pages) > 1):
            if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
                    $paginate_format = '';
                    $paginate_base = add_query_arg('paged', '%#%');
            } else {
                    $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
                    user_trailingslashit('page/%#%/', 'paged');;
                    $paginate_base .= '%_%';
            }
            $result = paginate_links( array(
                    'base' => $paginate_base,
                    'format' => $paginate_format,
                    'total' => $wp_query->max_num_pages,
                    'mid_size' => 3,
                    'current' => ($paged ? $paged : 1),
            ));
            echo '<p class="pagenation">'."\n".$result."</p>\n";
    endif;
}

// taglist
function ki_taglist(){
	wp_tag_cloud(array(
					   'format' => 'list',
					   'smallest' => 13,
					   'largest' => 13,
					));
}
add_shortcode('taglist','ki_taglist');


// Theme customize admin menu
