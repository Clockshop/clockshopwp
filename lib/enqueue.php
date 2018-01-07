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
	$flexsliderjs = get_template_directory_uri() . '/assets/js/jquery.flexslider.js';
	wp_register_script('flexsliderjs',$flexsliderjs, false);
	$flickityjs = get_template_directory_uri() . '/assets/js/flickity.pkgd.min.js';
	wp_register_script('flickityjs',$flickityjs, false);
	$descriptivehomejs = get_template_directory_uri() . '/assets/js/descriptivehome.js';
	wp_register_script('descriptivehomejs', $descriptivehomejs, false, $version);
	$viemoPlayer = 'https://player.vimeo.com/api/player.js';
	wp_register_script('vimeoPlayer', $viemoPlayer, false);
	
	// css
	$style = get_stylesheet_directory_uri() . '/assets/css/style.css';
	wp_register_style('style', $style, false);
	$allcss = get_stylesheet_directory_uri() . '/assets/css/all.css';
	wp_register_style('allcss', $allcss, false);
	$normalizecss = get_stylesheet_directory_uri() . '/assets/css/normalize.css';
	wp_register_style('normalizecss',$normalizecss, false);
	$descriptivehomecss = get_stylesheet_directory_uri() . '/assets/css/descriptivehome.css';
	wp_register_style('descriptivehomecss',$descriptivehomecss, false);
	$fontawesome = get_stylesheet_directory_uri() . '/assets/fonts/font-awesome.min.css';
	wp_register_style('fontawesome',$fontawesome, false);
	$slickcss = get_template_directory_uri() . '/assets/css/slick.css';
	wp_register_style('slickcss', $slickcss, false);
	$flexslidercss = get_stylesheet_directory_uri() . '/assets/css/flexslider.css';
	wp_register_style('flexslidercss', $flexslidercss, false);
	$flickitycss = get_stylesheet_directory_uri() . '/assets/css/flickity.min.css';
	wp_register_style('flickitycss', $flickitycss, false);

	// enqueue js
	wp_enqueue_script( 'alljs', array('jquery'));
	wp_enqueue_script( 'slickjs', array('jquery'));
	wp_enqueue_script( 'flexsliderjs', array('jquery'));
	wp_enqueue_script( 'flickityjs', array('jquery'));
	wp_enqueue_script( 'descriptivehomejs', array('jquery','flickityjs'));
	wp_enqueue_script( 'vimeoPlayer' );

	// enqueue css
	wp_enqueue_style( 'style');
	wp_enqueue_style( 'allcss');
	wp_enqueue_style( 'normalizecss');
	wp_enqueue_style( 'descriptivehomecss');
	wp_enqueue_style( 'fontawesome');
	wp_enqueue_style( 'slickcss');
	wp_enqueue_style( 'flexslidercss');
	wp_enqueue_style( 'flickitycss');
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