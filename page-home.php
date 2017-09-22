<?php

/* Template Name: Home */ 

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render( 'views/homepage.twig', $context );

?>