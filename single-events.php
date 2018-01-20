<?php

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

Timber::render( 'views/event.twig', $context );

?>