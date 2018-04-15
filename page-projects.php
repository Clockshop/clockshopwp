<?php

/* Template Name: Projects */ 

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$terms = get_terms( array(
	'taxonomy' => 'projects',
	'hide_empty' => false,
	'orderby' => 'terms_order',
));

$grandparents = array();
$parents = array();
$children = array();
foreach ($terms as $term) {
    if ($term->parent == 0) {
		$grandparents[] = $term;
	} else {
		if (get_term($term->parent)->parent != 0) {
			$children[] = $term;
		} else {
			$parents[] = $term;
		}
	}
}

$terms = [];

foreach ($grandparents as $grandparent) {
	$terms[] = $grandparent;
	$tempGrandparent = $grandparent;
	foreach ($parents as $parent) {
		if ($parent->parent == $tempGrandparent->term_id) {
			$terms[] = $parent;
		}
		$tempParent = $parent;
		foreach ($children as $child) {
			if ($tempParent->parent == $tempGrandparent->term_id && $child->parent == $tempParent->term_id) {
				$terms[] = $child;
			}
		}
	}
}

/*
echo '<pre>';
print_r($terms);
echo '</pre>';
*/

$activeProjects = array();
$inactiveProjects = array();
if ($terms) {
	foreach($terms as $term) {
 		if (get_term_meta( $term->term_id, 'project_status', true )) {
			$key = get_term_meta( $term->term_id, 'project_status', true );
		}
		if ( $key == 'active' ) {
			$activeProjects[] = $term;
		} else {
			$inactiveProjects[] = $term;
		}
	}
}

$context['activeProjects'] = $activeProjects;
$context['inactiveProjects'] = $inactiveProjects;

Timber::render( 'views/projects.twig', $context );

?>