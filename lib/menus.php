<?php

function register_custom_menus() {
	register_nav_menu('primary', __('Primary Menu'));
	register_nav_menu('subnav', __('Secondary Menu'));
}

add_action('init', 'register_custom_menus');

function menu_shortcode( $atts ) {

	extract( shortcode_atts( array(
		'name' => '',
	), $atts ) );

	$defaults = array(
		'menu' => $name,
		'echo' => false,
	);

	return '<div class="subnav">' . wp_nav_menu( $defaults ) . '</div>';

}
add_shortcode( 'menu', 'menu_shortcode' );

add_filter( 'wp_nav_menu_items', 'header_nav', 10, 2 );
function header_nav ( $items, $args ) {
    if ($args->theme_location == 'primary') {
		if (get_field('instagram_url', 'option')) {
			$instagram = '<li class="social first"><a target="_blank" href="' . get_field('instagram_url', 'option') . '"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';
		} else {
			$instagram = '';
		}
		if (get_field('facebook_url', 'option')) {
			$facebook = '<li class="social"><a target="_blank" href="' . get_field('facebook_url', 'option') . '"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>';
		} else {
			$facebook = '';
		}
		if (get_field('tumblr_url', 'option')) {
			$tumblr = '<li class="social"><a target="_blank" href="' . get_field('tumblr_url', 'option') . '"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>';
		} else {
			$tumblr = '';
		}
		if (get_field('vimeo_url', 'option')) {
			$vimeo = '<li class="social"><a target="_blank" href="' . get_field('vimeo_url', 'option') . '"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>';
		} else {
			$vimeo = '';
		}
		if (get_field('twitter_url', 'option')) {
			$twitter = '<li class="social"><a target="_blank" href="' . get_field('twitter_url', 'option') . '"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
		} else {
			$twitter = '';
		}
        $items .= $instagram . $facebook . $tumblr . $vimeo . $twitter;
    }
    return $items;
}