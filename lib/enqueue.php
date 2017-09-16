<?php

function enqueue_scripts_method() {

	$version = "h";

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/

	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	if(!wp_script_is('jquery')) wp_enqueue_script("jquery");

	// Define JS

	$flexsliderjs = get_template_directory_uri() . '/js/jquery.flexslider.js';
	wp_register_script('flexsliderjs',$flexsliderjs, false, $version);

	$mainjs = get_template_directory_uri() . '/js/main.js';
	wp_register_script('mainjs',$mainjs, false, $version);

	$scripts = get_template_directory_uri() . '/js/scripts.js';
	wp_register_script('scripts', $scripts, false, $version);

	$projecttemplatejs = get_template_directory_uri() . '/js/projecttemplate.js';
	wp_register_script('projecttemplatejs',$projecttemplatejs, false, $version);

	$flickityjs = get_template_directory_uri() . '/js/flickity.pkgd.min.js';
	wp_register_script('flickityjs',$flickityjs, false, $version);

	$descriptivehomejs = get_template_directory_uri() . '/js/descriptivehome.js';
	wp_register_script('descriptivehomejs',$descriptivehomejs, false, $version);

	// Define CSS

	$ralewaycss = 'http://fonts.googleapis.com/css?family=Raleway:400,300,200,100';
	wp_register_style('ralewaycss',$ralewaycss, false, $version);

	$ptsanscss = 'http://fonts.googleapis.com/css?family=PT+Sans+Narrow';
	wp_register_style('ptsanscss',$ptsanscss, false, $version);

	$flexslidercss = get_stylesheet_directory_uri() . '/css/flexslider.css';
	wp_register_style('flexslidercss',$flexslidercss, false, $version);

	$normalizecss = get_stylesheet_directory_uri() . '/css/normalize.css';
	wp_register_style('normalizecss',$normalizecss, false, $version);

	$themecss = get_stylesheet_directory_uri() . '/style.css';
	wp_register_style('themecss',$themecss, false, $version);

	$flickitycss = get_stylesheet_directory_uri() . '/css/flickity.min.css';
	wp_register_style('flickitycss',$flickitycss, false, $version);

	$descriptivehomecss = get_stylesheet_directory_uri() . '/css/descriptivehome.css';
	wp_register_style('descriptivehomecss',$descriptivehomecss, false, $version);

	$fontawesome = get_stylesheet_directory_uri() . '/assets/fonts/font-awesome.min.css';
	wp_register_style('fontawesome',$fontawesome, false, $version);

	$all = get_stylesheet_directory_uri() . '/assets/css/all.css';
	wp_register_style('all', $all, false, $version);

	// Enqueue

	wp_enqueue_script( 'flexsliderjs',array('jquery'));
	wp_enqueue_script( 'mainjs',array('jquery','flexsliderjs'));
	wp_enqueue_script( 'scripts',array('jquery'));
	wp_enqueue_script( 'projecttemplatejs',array('jquery'));

	wp_enqueue_style( 'flexslidercss');

	wp_enqueue_style( 'ralewaycss');
	wp_enqueue_style( 'ptsanscss');
	wp_enqueue_style( 'normalizecss');
	wp_enqueue_style( 'themecss');

	wp_enqueue_style( 'fontawesome');
	wp_enqueue_style( 'all');

	if ( is_page_template('page-home.php') ) :
		wp_enqueue_style( 'flickitycss');
		wp_enqueue_style( 'descriptivehomecss');
		wp_enqueue_script( 'flickityjs',array('jquery'));
		wp_enqueue_script( 'descriptivehomejs',array('jquery','flickityjs'));
	endif;

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


