<?php

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$term = wp_get_post_terms( $post->id, 'projects' );
$context['term'] = new TimberTerm($term[0], 'projects');
$termMenu = get_field('project_menu', $term[0]);
$context['termMenu'] = new TimberMenu($termMenu->slug);

$events = tribe_get_events( array(
	'posts_per_page' => 3,
	'start_date' => date( 'Y-m-d H:i:s' ),
	'order' => 'DESC',
	'tax_query' => array(
		array(
			'taxonomy' => 'projects',
			'field'    => 'slug',
			'terms'    => $term[0]->slug,
		),
	),
) );

$context['events'] = $events;

Timber::render( 'views/project.twig', $context );

?>