<?php

$templates = array( 'search.twig' );
$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
$context['pagination'] = Timber::get_pagination();
$context['query'] = filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING);
Timber::render( $templates, $context );

?>