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

