<?php

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$today = date("Y-m-d H:i:s");
$oneMonth = date('Y-m-d H:i:s', strtotime("next month"));

$context['today'] = $today;
$context['oneMonth'] = $oneMonth;

$args = array(
	'posts_per_page'   => -1,
    'order' => 'ASC',
    'orderby' => 'meta_value',
    'meta_key' => '_EventStartDate',
    'post_type' => 'events',
	'post_status' => 'publish',
    'meta_query' => array(
		'relation' => 'AND',
        array(
            'key' => '_EventEndDate',
            'value' => $today,
            'compare' => '>='
        ),
        array(
            'key' => '_EventStartDate',
            'value' => $oneMonth,
            'compare' => '<'
        )
    ),
);
$eventsNow = Timber::get_posts( $args );
$context['eventsNow'] = $eventsNow;

$args = array(
	'posts_per_page'   => -1,
    'order' => 'ASC',
    'orderby' => 'meta_value',
    'meta_key' => '_EventStartDate',
    'post_type' => 'events',
	'post_status' => 'publish',
    'meta_query' => array(
        array(
            'key' => '_EventStartDate',
            'value' => $oneMonth,
            'compare' => '>='
        )
    ),
);
$upcomingEvents = Timber::get_posts( $args );
$context['upcomingEvents'] = $upcomingEvents;

$args = array(
	'posts_per_page'   => -1,
    'order' => 'DESC',
    'orderby' => 'meta_value',
    'meta_key' => '_EventStartDate',
    'post_type' => 'events',
	'post_status' => 'publish',
    'meta_query' => array(
        array(
            'key' => '_EventStartDate',
            'value' => $today,
            'compare' => '<'
        )
    ),
);
$pastEvents = Timber::get_posts( $args );
$context['pastEvents'] = $pastEvents;

Timber::render( 'views/events.twig', $context );

?>