<?php

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render( 'views/404.twig', $context );

?>