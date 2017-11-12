<?php

/* Template Name: Projects */ 

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$terms = get_terms( array(
	'taxonomy' => 'project',
	'hide_empty' => false,
));
$activeProjects = array();
$inactiveProjects = array();
foreach($terms as $term) {
	$key = get_term_meta( $term->term_id, 'project_status', true );
	if ( $key == 'active' ) {
		$activeProjects[] = $term;
	} else {
		$inactiveProjects[] = $term;
	}
}
$context['activeProjects'] = $activeProjects;
$context['inactiveProjects'] = $inactiveProjects;

Timber::render( 'views/projects.twig', $context );

?>