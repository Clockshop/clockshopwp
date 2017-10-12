<?php

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$menu = get_field('project_menu');
$context['projectMenu'] = new TimberMenu($menu);
Timber::render( 'views/project.twig', $context );

?>