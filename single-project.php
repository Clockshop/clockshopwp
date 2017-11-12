<?php

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$term = wp_get_post_terms( $post->id, 'projects' );
$context['term'] = new TimberTerm($term[0], 'projects');
$termMenu = get_field('project_menu', $term[0]);
$context['termMenu'] = new TimberMenu($termMenu->slug);

Timber::render( 'views/project.twig', $context );

?>