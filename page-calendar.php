<?php 

/* Template Name: Calendar */ 

get_header(); 

if( have_rows('events') ):

	$mycurrentexhibits = Array();

	$currentDate = current_time('mysql');
	$currentDate_time = strtotime($currentDate);

	while ( have_rows('events') ) : the_row();

		$eventLabel = get_sub_field('event_label');
		$readDates = get_sub_field('read_dates');
		$startDate = get_sub_field('start_date');
		$endDate = get_sub_field('end_date');
		$link = get_sub_field('link');

		$endDate_time = strtotime($endDate);

		if ( $endDate_time >= $currentDate_time ) :

			$mycurrentexhibits[] = Array( 
				'eventLabel' => $eventLabel,
				'readDates' => $readDates,
				'startDate' => $startDate,
				'endDate' => $endDate,
				'link' => $link
			);

		endif;

	endwhile;

endif; ?>

<div id="cal">
<div id="events">
	<ul>
	<?php if ( count($mycurrentexhibits) > 0 ) : 

		usort($mycurrentexhibits, 'date_compare'); // date_compare is in functions/projects.php

		foreach ( $mycurrentexhibits as $exhibit ) :
			echo '<li><a href="' . $exhibit['link'] . '">' . $exhibit['eventLabel'] . '</a>' . $exhibit['readDates'] . '</li>';
		endforeach;

	else: ?>
		<li>No upcoming events.</li>
	<?php endif; ?>

	</ul>
</div>
</div>
<?php get_footer(); ?>