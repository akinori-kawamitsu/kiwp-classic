<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: https://ogp.me/ns# fb: https://ogp.me/ns/fb# article: https://ogp.me/ns/article#">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="format-detection" content="telephone=no">
	<?php get_template_part('phpmodule/ogp');?>
	
	<title><?php wp_title("",true); if(is_front_page()){ bloginfo('description'); }?> | <?php bloginfo('name');?></title>

<?php // if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>

<?php /* Slick Slider使用時は以下のコメントアウトを外す。 
 ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/slick/slick.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/slick/slick-theme.css">
<?php /* Slick Slider  */ ?>

<?php wp_head(); ?>

<?php get_template_part('phpmodule/ies');?>

<?php /* Slick Slider使用時はこのコメントアウトを外す。  ?>
	<script src="<?php echo get_stylesheet_directory_uri();?>/slick/slick.min.js"></script>
<?php /* Slick Slider  */ ?>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header" id="header">
	<div class="container header-container">
		<div class="header-logo">
			<a href="<?php echo home_url('/');?>">logo</a><a href="#main" class="skip-link">本文へスキップ</a>
		</div>
		<?php $gnav = array(
	'menu'            => 'gnav-item',
	'menu_class'      => 'toggle-menu',
	'menu_id'         => '',
	'container'       => 'nav',
	'container_class' => '',
	'container_id'    => 'gnav',
	'fallback_cb'     => '',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'echo'            => true,
	'depth'           => 0,
	'walker'          => '',
	'theme_location'  => 'gnav',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
);
wp_nav_menu( $gnav );?>
		<button class="hamburger" id="hamburger" onclick="navopen()" title="メニュー">
			<span class="burg-line-tc" role="presentation"></span>
			<span class="burg-line-b" role="presentation"></span>
			<span class="burg-text"></span>
		</button>
	</div>
    <script>
        function navopen() {
            document.getElementById("hamburger").classList.toggle("js-open");
            document.getElementById("gnav").classList.toggle("js-open");
        }
    </script>
</header>