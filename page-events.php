<?php

/* Template Name: Events */ 

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$timestamp = time();
$now = new DateTime("now", new DateTimeZone('America/Los_Angeles')); //first argument "must" be a string
$now->setTimestamp($timestamp); //adjust the object to correct timestamp
$oneMonth = date('Y-m-d H:i:s', strtotime("next month"));

// echo '<br>';
// echo '<br>';
// echo '<br>';
// echo '<br>';
// echo 'Now (LA time): ' . $now->format('Y-m-d H:i:s');
// echo '<br>';
// echo '8154 (start): ' . get_field('_EventStartDate', 8154);
// echo '<br>';
// echo '8154 (end): ' . get_field('_EventEndDate', 8154);
// echo '<br>';
// echo '8154 end < now? ';
// var_dump(get_field('_EventEndDate', 8154) < $now->format('Y-m-d H:i:s'));
// echo '<br>';
// echo '8154 end >= now? ';
// var_dump(get_field('_EventEndDate', 8154) >= $now->format('Y-m-d H:i:s'));

$args = array(
	'posts_per_page'   => -1,
    'order' => 'ASC',
    'orderby' => 'meta_value',
    'meta_key' => '_EventEndDate',
    'post_type' => 'events',
	'post_status' => 'publish',
    'meta_query' => array(
		'relation' => 'AND',
        array(
            'key' => '_EventEndDate',
            'value' => $now->format('Y-m-d H:i:s'),
            'compare' => '>='
        ),
        // array(
        //     'key' => '_EventStartDate',
        //     'value' => $oneMonth,
        //     'compare' => '<'
        // )
    ),
);
$events = Timber::get_posts( $args );
$context['events'] = $events;

// $args = array(
// 	'posts_per_page'   => -1,
//     'order' => 'ASC',
//     'orderby' => 'meta_value',
//     'meta_key' => '_EventStartDate',
//     'post_type' => 'events',
// 	'post_status' => 'publish',
//     'meta_query' => array(
//         array(
//             'key' => '_EventStartDate',
//             'value' => $oneMonth,
//             'compare' => '>='
//         )
//     ),
// );
// $upcomingEvents = Timber::get_posts( $args );
// $context['upcomingEvents'] = $upcomingEvents;

$args = array(
	'posts_per_page'   => -1,
    'order' => 'DESC',
    'orderby' => 'meta_value',
    'meta_key' => '_EventStartDate',
    'post_type' => 'events',
	'post_status' => 'publish',
    'meta_query' => array(
        array(
            'key' => '_EventEndDate',
            'value' => $now->format('Y-m-d H:i:s'),
            'compare' => '<'
        )
    ),
);
$pastEvents = Timber::get_posts( $args );
$context['pastEvents'] = $pastEvents;

Timber::render( 'views/events.twig', $context );

?>