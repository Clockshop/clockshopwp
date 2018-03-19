<?php

function enqueue_scripts_method() {

	$version = "h";

	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	if(!wp_script_is('jquery')) wp_enqueue_script("jquery");

	// js
	$alljs = get_template_directory_uri() . '/assets/js/all.js';
	wp_register_script('alljs', $alljs, false);
	$slickjs = get_template_directory_uri() . '/assets/js/slick.min.js';
	wp_register_script('slickjs', $slickjs, false);
	$viemoPlayer = 'https://player.vimeo.com/api/player.js';
	wp_register_script('vimeoPlayer', $viemoPlayer, false);
	$youtubeAPI = get_template_directory_uri() . '/assets/js/youtube.js';
	wp_register_script('youtubeAPI', $youtubeAPI, true);
	$select2 = 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js';
	wp_register_script('select2', $select2, true);
	
	// css
	$normalizecss = get_stylesheet_directory_uri() . '/assets/css/normalize.css';
	wp_register_style('normalizecss',$normalizecss, false);
	$style = get_stylesheet_directory_uri() . '/assets/css/style.css';
	wp_register_style('style', $style, false);
	$allcss = get_stylesheet_directory_uri() . '/assets/css/all.css';
	wp_register_style('allcss', $allcss, false);
	$fontawesome = get_stylesheet_directory_uri() . '/assets/fonts/font-awesome.min.css';
	wp_register_style('fontawesome',$fontawesome, false);
	$slickcss = get_template_directory_uri() . '/assets/css/slick.css';
	wp_register_style('slickcss', $slickcss, false);
	$select2css = 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css';
	wp_register_style('select2css', $select2css, false);

	// enqueue js
	wp_enqueue_script( 'slickjs', array('jquery'));
	wp_enqueue_script( 'vimeoPlayer' );
	wp_enqueue_script( 'youtubeAPI' );
	wp_enqueue_script( 'select2' );
	wp_enqueue_script( 'alljs', array('jquery', 'slickjs'));

	// enqueue css
	wp_enqueue_style( 'normalizecss');
	wp_enqueue_style( 'style');
	wp_enqueue_style( 'allcss');
	wp_enqueue_style( 'fontawesome');
	wp_enqueue_style( 'slickcss');
	wp_enqueue_style( 'select2css');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts_method');

add_action( 'gform_enqueue_scripts_4', 'dequeue_gf_stylesheets', 11 );
function dequeue_gf_stylesheets() {
    wp_dequeue_style( 'gforms_reset_css' );
    wp_dequeue_style( 'gforms_datepicker_css' );
    wp_dequeue_style( 'gforms_formsmain_css' );
    wp_dequeue_style( 'gforms_ready_class_css' );
    wp_dequeue_style( 'gforms_browsers_css' );
}