<footer id="footer" class="footer">
	<div class="content-wrapper footer-container">
		<div class="pc-4 sp-1 gap-20">
			<div class="">
				<p class="footer-logo">logo</p>
				<address>〒***-****<br>都道府県市町村番地</address>
				<p class="tel"><a href="tel:">***-****-****</a></p>
			</div>
			<div class="">
				<h3>サービス</h3>
			<?php
$fnav = array(
	'menu'            => 'fnav-item',
	'menu_class'      => 'fnav',
	'menu_id'         => 'fnav',
	'container'       => 'div',
	'container_class' => 'footer-nav',
	'container_id'    => 'footer-nav',
	'fallback_cb'     => '',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'echo'            => true,
	'depth'           => 0,
	'walker'          => '',
	'theme_location'  => 'fnav',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
);
wp_nav_menu( $fnav ); ?>
			</div>
			<div class="">
				<h3>サービス2</h3>
			<?php
$fnav2 = array(
	'menu'            => 'fnav-item',
	'menu_class'      => 'fnav2',
	'menu_id'         => 'fnav2',
	'container'       => 'div',
	'container_class' => 'footer-nav2',
	'container_id'    => 'footer-nav2',
	'fallback_cb'     => '',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'echo'            => true,
	'depth'           => 0,
	'walker'          => '',
	'theme_location'  => 'fnav2',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
);
wp_nav_menu( $fnav2 ); ?>
			</div>
			<div class="">
				<h3>会社情報</h3>
			<?php
$fnav3 = array(
	'menu'            => 'fnav-item',
	'menu_class'      => 'fnav3',
	'menu_id'         => 'fnav3',
	'container'       => 'div',
	'container_class' => 'footer-nav3',
	'container_id'    => 'footer-nav3',
	'fallback_cb'     => '',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'echo'            => true,
	'depth'           => 0,
	'walker'          => '',
	'theme_location'  => 'fnav3',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
);
wp_nav_menu( $fnav3 ); ?>

			</div>
		</div>
	</div>

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

<?php /* Slick Slider使用時はこのコメントアウトを外す。 */ ?>
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

<?php /* Contact Form 7にサンクスページを設置するサンプルコード ?>
<?php if(is_page( "contact" )):?>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    setTimeout( () => {
        location = '<?php echo get_home_url()?>/contact/thanks/';
    }, 1000 ); // Wait for 3 seconds to redirect.
}, false );
<?php endif;?>
<?php */?>

  </script>
</footer>
<?php wp_footer(); ?>
</body>
</html>