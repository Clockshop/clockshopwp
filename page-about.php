<?php

/* Template Name: About */ 

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render( 'views/about.twig', $context );

?>