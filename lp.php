<?php 
/*
Template Name: LP template
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: https://ogp.me/ns# fb: https://ogp.me/ns/fb# article: https://ogp.me/ns/article#">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<?php get_template_part('phpmodule/ogp');?>
	
	<title><?php wp_title(); if(is_front_page()){ bloginfo('description'); }?> | <?php bloginfo('name');?></title>

    
	<?php $mtimelp = filemtime( get_stylesheet_directory() . '/css/lp.css' );?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/lp.css?<?php echo $mtimelp;?>">

<?php /* Slick Slider使用時は以下のコメントアウトを外す。 
 ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/slick/slick.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/slick/slick-theme.css">
<?php /* Slick Slider  */ ?>

<?php /* AOS.js使用時は以下のコメントアウトを外す。※footer.phpにも初期化コードあり。 
?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/aos/aos.css">
	<script src="<?php echo get_stylesheet_directory_uri();?>/aos/aos.js"></script>
<?php /* AOS.js */?>

<?php wp_head(); ?>

<?php get_template_part('phpmodule/ies');?>


<?php /* Slick Slider使用時はこのコメントアウトを外す。  ?>
	<script src="<?php echo get_stylesheet_directory_uri();?>/slick/slick.min.js"></script>
<?php /* Slick Slider  */ ?>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php /* ページ開始 */?>
<?php if (have_posts()): while (have_posts()): the_post();?>
    <div <?php post_class();?>><?php the_content() ;?></div>
<?php endwhile; endif;?>	

<div>
	<script>
	window.addEventListener('load', function() {
		var links = document.querySelectorAll('a[href^="#"]');
		
		function smoothScroll(event) {
			event.preventDefault();
			
			var speed = 400; // ミリ秒
			var href = this.getAttribute("href");
			var target = document.querySelector(href === "#" || href === "" ? 'html' : href);
			var position = target.offsetTop - 60;
			
			window.scrollTo({
				top: position,
				behavior: 'smooth'
			});
		}
		
		for (var i = 0; i < links.length; i++) {
			links[i].addEventListener('click', smoothScroll);
		}
	});

<?php /* Slick Slider使用時はこのコメントアウトを外す。  ?>
	jQuery(document).ready(function(){
		jQuery('.slide').slick({
			dots: true,
			infinite: true,
			speed: 500,
			slidesToShow: 1,
			centerMode: true,
			variableWidth: true,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 4000,
		});
	});
<?php /* Slick Slider  */ ?>

<?php /* AOS.js使用時は以下のコメントアウトを外す。※header.phpにもライブラリの読み込みコードあり。 
?>
	AOS.init();
<?php /* AOS.js */?>

  </script>
<?php wp_footer(); ?>
</body>
</html>