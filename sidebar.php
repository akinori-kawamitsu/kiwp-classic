<aside id="sidebar" class="sidebar">
	<?php
$snav = array(
	'menu'            => 'snav-item',
	'menu_class'      => 'snav',
	'menu_id'         => 'snav',
	'container'       => 'div',
	'container_class' => 'side-nav',
	'container_id'    => 'side-nav',
	'fallback_cb'     => '',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'echo'            => true,
	'depth'           => 0,
	'walker'          => '',
	'theme_location'  => 'snav',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
);
wp_nav_menu( $snav ); ?>
	<?php dynamic_sidebar('sidebar-1');?>
</aside>