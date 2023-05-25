<footer id="footer" class="footer">
	<div class="content-wrapper footer-container">
		<div class="flex">
			<div class="col-3">
				<p class="footer-logo">logo</p>
				<address>〒***-****<br>都道府県市町村番地</address>
				<p class="tel"><a href="tel:">***-****-****</a></p>
			</div>
			<div class="col-3">
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
			<div class="col-3">
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
			<div class="col-3">
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

</footer>
<?php wp_footer(); ?>
</body>
</html>