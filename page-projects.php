<?php

/* Template Name: Projects */ 

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;


$args = array(
    'post_parent' => 0,
	'post_type' => 'clock_projects',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'meta_key'		=> 'project_status',
	'meta_value'	=> 'ongoing'
);
$context['ongoingProjects'] = Timber::get_posts($args);

$args = array(
    'post_parent' => 0,
	'post_type' => 'clock_projects',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'meta_key'		=> 'project_status',
	'meta_value'	=> 'past'
);
$context['pastProjects'] = Timber::get_posts($args);

Timber::render( 'views/projects.twig', $context );

?>