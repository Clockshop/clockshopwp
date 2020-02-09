<?php

function enqueue_scripts_method() {

	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	// jquery
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
	wp_deregister_script('jquery-migrate');
	wp_enqueue_script('jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.0.1.min.js', array('jquery'), '3.0.1', false );

	// js
	wp_register_script('slickjs', get_template_directory_uri() . '/assets/js/slick.min.js', false);
	wp_register_script('vimeoPlayer', 'https://player.vimeo.com/api/player.js', false);
	wp_register_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js', true);
	if (!defined('WP_ENVIRONMENT') || WP_ENVIRONMENT == "production") {
		wp_register_script('scripts', get_template_directory_uri() . '/dist/scripts.js', false);
	} else {
		wp_register_script('scripts', 'http://localhost:8080/scripts.js', array(), false);
	}

	// css
	wp_register_style('style_legacy', get_stylesheet_directory_uri() . '/assets/css/style_legacy.css', false);
	wp_register_style('fonts', get_stylesheet_directory_uri() . '/assets/css/fonts.css', false);
	wp_register_style('slickcss', get_template_directory_uri() . '/assets/css/slick.css', false);
	wp_register_style('normalizecss', get_stylesheet_directory_uri() . '/assets/css/normalize.css', false);
	wp_register_style('fontawesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css', false);
	wp_register_style('select2css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css', false);
	if (!defined('WP_ENVIRONMENT') || WP_ENVIRONMENT == "production") {
		wp_register_style('styles', get_stylesheet_directory_uri() . '/dist/styles.css', false);
	} else {
		wp_register_style('styles', 'http://localhost:8080/styles.css', false);
	}

	// enqueue js
	wp_enqueue_script('slickjs', array('jquery'));
	wp_enqueue_script('vimeoPlayer' );
	wp_enqueue_script('select2' );
	wp_enqueue_script('scripts', array('slickjs', 'jquery'));

	// enqueue css
	wp_enqueue_style('style_legacy');
	wp_enqueue_style('fonts');
	wp_enqueue_style('slickcss');
	wp_enqueue_style('normalizecss');
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('select2css');
	wp_enqueue_style('styles');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts_method');

add_action( 'gform_enqueue_scripts_4', 'dequeue_gf_stylesheets', 11 );
function dequeue_gf_stylesheets() {
    wp_dequeue_style('gforms_reset_css');
    wp_dequeue_style('gforms_datepicker_css');
    wp_dequeue_style('gforms_formsmain_css');
    wp_dequeue_style('gforms_ready_class_css');
    wp_dequeue_style('gforms_browsers_css');
}