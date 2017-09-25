<?php

$templates = array( 'search.twig' );
$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
$args = array(
    'end_size'     => 1,
    'mid_size'     => 1,
);
$context['pagination'] = Timber::get_pagination($args);
$context['query'] = filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING);
Timber::render( $templates, $context );

?>