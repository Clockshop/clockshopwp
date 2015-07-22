<?php

$my_query = new WP_Query( 'pagename=calendar' );

if ( $my_query->have_posts() ) :
	while ( $my_query->have_posts() ) :
		$my_query->the_post();

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

		endif;

	endwhile;
endif;

if ( count($mycurrentexhibits) > 0 ) : 

	$haveevents = true;

	usort($mycurrentexhibits, 'date_compare'); // date_compare is in functions/projects.php

	$firstEventLink = $mycurrentexhibits[0]['link'];
	$firstEventLabel = $mycurrentexhibits[0]['eventLabel'];
	$firstEventDates = $mycurrentexhibits[0]['readDates'];

	$firstEventStart = $mycurrentexhibits[0]['startDate'];

else:

	$haveevents = false;

endif;

wp_reset_postdata();

?>

<div id="contact" class="mobile">
	<ul> 
		<a href="https://maps.google.com/maps?q=2806+Clearwater+St.+Los+Angeles,+CA+90039&oe=utf-8&client=firefox-a&channel=fflb&ie=UTF-8&ei=MyDvUYv8DpCArQGl94GADw&ved=0CAoQ_AUoAg" target="_blank">
			<li> 2806 Clearwater St. </li>
			<li> Los Angeles, CA 90039 </li>
		</a>
		<li> 323.522.6014 <li>
		<li> <a href="mailto:info@clockshop.org">info@clockshop.org</a> </li>
	</ul>       
</div>


<?php if ( $haveevents ) : ?>

	<a id="nexteventbox" class="largedate" href="<?php echo $firstEventLink; ?>">
		<p id="nextline"> NEXT: </p>
		<p id="dateline"> SEPT 20 <span class="arrowstyle">></span></p>
	</a>

<?php endif; ?>

<div id="container">
	<div class="mobile">

		<?php if ( $haveevents ) : ?>

			<h1> next event </h1>

			<div id="nextevent">

				<div id="text">
					<p><?php echo $firstEventLabel; ?></p>
					<p><?php echo $firstEventDates; ?></p>
					<p><a href="<?php echo $firstEventLink; ?>">more info</a></p>
				</div>

			</div>

			<div id="links">
				<a href="/calendar">view all events</a>
			</div>

		<?php endif; ?>

	</div>

	<div id="about">
		<h2 class="mobile"> about </h2>
		<p class="mobile"> Clockshop produces films and supports projects by artists, writers, and civic leaders. </p> 
		<p class="mobile"> Through public events including a regular conversation series, screenings, and dinners we create a dialogue that explores contemporary social and cultural issues. </p>
		<p class="mobile">Clockshop lives at <a href="http://www.elysianla.com/" target="_blank">Elysian</a> in Los Angeles, CA. Elysian is a place where people, food, discussion, and celebration meet. We host a regular Monday dinner series called night in. Elysian is also available for private parties and events. </p>
	</div>

</div>
