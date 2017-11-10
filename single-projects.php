<?php

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$parents = get_post_ancestors( $post->ID );
if ($parents) {
	$parent = end($parents);
} else {
	$parent = $post->ID;
}
if (count($parents) > 1) {
	$context['direct_parent'] = new TimberPost($parents[0]);
} else {
	$context['direct_parent'] = '';
}
$context['parent'] = new TimberPost($parent);

$menu = get_field('project_menu');
Timber::render( 'views/project.twig', $context );

?>