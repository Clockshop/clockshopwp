<?php

/* Related Events */

$term = get_field('related_events');

if( $term ): 

	$taxonomy = 'tribe_events_cat';

	$events = tribe_get_events( array(
		'eventDisplay' => 'custom',
	    'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'term_id',
				'terms'    => $term,
			),
		),
	) );

	$events_order = get_field('events_order');

	if ( $events_order == 'desc' ):
		$events = array_reverse($events);
	endif;

	if ( count($events) > 0 ) : ?>

	<div id="events" class="relatedevents">

		<?php 
			$show_headings = get_field('show_headings');
			if ( $show_headings == 'yes' ) : ?>
			<h3>Events</h3>
		<?php endif; ?>


	<?php foreach ( $events as $post ) :
			$event_id = get_the_ID();
			?>

			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			<?php endif; ?>

			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

			<p class="date"><?php echo tribe_events_event_schedule_details( $event_id ); ?></p>

			<?php 
		endforeach;

		wp_reset_postdata(); 

	endif;
	
endif;