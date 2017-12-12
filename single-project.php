<?php

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$term = wp_get_post_terms( $post->id, 'projects' );
$context['term'] = new TimberTerm($term[0], 'projects');
$termMenu = get_field('project_menu', $term[0]);
$context['termMenu'] = new TimberMenu($termMenu->slug);

$events = tribe_get_events( array(
	'posts_per_page' => 3,
	'start_date' => date( 'Y-m-d H:i:s' ),
	'order' => 'DESC',
	'tax_query' => array(
		array(
			'taxonomy' => 'projects',
			'field'    => 'slug',
			'terms'    => $term[0]->slug,
		),
	),
) );

$past_events = tribe_get_events( array(
	'end_date' => date("Y-m-d"),
	'posts_per_page'   => -1,
	'order' => 'DESC',
	'tax_query' => array(
		array(
			'taxonomy' => 'projects',
			'field'    => 'slug',
			'terms'    => $term[0]->slug,
		),
	),
));

$eventYears = array();
$years = array();

foreach($past_events as $key => $event) {
	$eventDate = $event->EventStartDate;
	$eventYear = date('Y', strtotime($eventDate));
	if (!in_array($eventYear, $years)) {
		array_push($years, $eventYear);
		$eventYears[$eventYear]['year'] = $eventYear;
	}
	$eventYears[$eventYear]['events'][$key] = $event;
}

$context['events'] = $events;
$context['eventYears'] = $eventYears;

Timber::render( 'views/project.twig', $context );

?>