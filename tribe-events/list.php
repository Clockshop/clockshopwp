<?php
/**
 * List View Template
 * The wrapper template for a list of events. This includes the Past Events and Upcoming Events views
 * as well as those same views filtered to a specific category.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

do_action( 'tribe_events_before_template' );

function add_months($months, DateTime $dateObject) {
	$next = new DateTime($dateObject->format('Y-m-d'));
	$next->modify('last day of +'.$months.' month');

	if($dateObject->format('d') > $next->format('d')) {
		return $dateObject->diff($next);
	} else {
		return new DateInterval('P'.$months.'M');
	}
}

function endCycle($d1, $months) {
	$date = new DateTime($d1);

	// call second function to add the months
	$newDate = $date->add(add_months($months, $date))->modify("+1 days");

	// goes back 1 day from date, remove if you want same day of month
	$newDate->sub(new DateInterval('P1D')); 

	//formats final date to Y-m-d form
	$dateReturned = $newDate->format('Y-m-d'); 

	return $dateReturned;
}

$today = date("Y-m-d");
$oneMonth = endCycle($today, 1);

/*
$today = date("Y-m-d");
$firstNextMonth = date("Y-m-01");
$nextMonth = date("Y-m-d", strtotime("$firstNextMonth +1 month"));
*/

$events = tribe_get_events( array(
	'start_date' => $today,
	'end_date'   => $oneMonth
));

if ( empty( $events ) ) {
?>
<div class="no-events content">
	<div class="newsform">
		<h1>Nothing this month! Subscribe and stay tuned.</h1>
		<?php echo do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]'); ?>
	</div>
</div>
<?php
}
else { ?>
	<div class="content">
		<h1>Events This Month</h1>	
	</div>
	<section class="events-slider events-this-month content">
		<?php foreach( $events as $event ) { ?>
			<div class="slide-cell">
				<div class="slide">
					<div class="event-image">
						<a href="<?php echo get_permalink($event->ID); ?>">
							<?php echo get_the_post_thumbnail($event, 'grid-3'); ?>
						</a>
					</div>
					<div class="event-content">
						<?php if (count($events) > 1) { ?>
							<a class="prev"><img class="left-arrow" src="<?php echo get_template_directory_uri() ?>/images/arrow_black.png" /></a>
							<a class="next"><img class="right-arrow" src="<?php echo get_template_directory_uri() ?>/images/arrow_black.png" /></a>
						<?php } ?> 
						<h2><a href="<?php echo get_permalink($event->ID); ?>"><?php echo get_the_title($event); ?></a></h2>
						<h3><?php echo spellerberg_sp_date($event); ?></h3>

						<?php $terms = wp_get_post_terms( $event->ID, 'projects' ); ?>
						<?php if (has_term( '', 'projects' ) ) { ?>
							<h5><?php echo $terms[0]->name; ?></h5>
						<?php } ?>

						<h5 class="cost"><?php echo tribe_get_cost( null, true ); ?></h5>
						<?php if (get_the_excerpt($event->ID) != '') { ?>
							<p class="excerpt"><?php echo get_the_excerpt($event->ID); ?></p>
						<?php } else { ?>
							<p class="excerpt"><?php echo wp_html_excerpt( get_post_field('post_content', $events[0]->ID), 150 ); ?>...</p>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</section>
<?php } ?>

<?php 
$events = tribe_get_events( array(
	'start_date' => $oneMonth,
	'posts_per_page'   => 3,

));

if ( empty( $events ) ) {
}
else { ?>
	<section class="content upcoming-events">
		<div>
			<h4>Further Out</h4>
			<div class="grid featured-grid">
				<?php foreach( $events as $event ) { ?>
					<div class="grid-3">
						<div class="imagecell">
							<a href="<?php echo get_permalink($event->ID); ?>"><?php echo get_the_post_thumbnail($event, 'grid-3'); ?></a>
						</div>
						<div class="descriptioncell">
							<h2><a href="<?php echo get_permalink($event->ID); ?>"><?php echo get_the_title($event); ?></a></h2>
							<p class="content-type"><?php echo spellerberg_sp_date($event); ?></p>
							
							<?php $terms = wp_get_post_terms( $event->ID, 'projects' ); ?>
							<?php if (has_term( '', 'projects' ) ) { ?>
								<p class="add-descriptor"><?php echo $terms[0]->name; ?></p>
							<?php } ?>
							
							<?php if (get_the_excerpt($event->ID) != '' && get_the_excerpt($event->ID) != ' ') { ?>
								<p class="description"><?php echo get_the_excerpt($event->ID); ?></p>
							<?php } else { ?>
								<p class="description"><?php echo wp_trim_words( get_post_field('post_content', $event->ID), 15, '...' ); ?></p>
							<?php } ?>
							<p class="calltoaction"><a href="<?php echo get_permalink($event->ID); ?>">RSVP</a></p>
						</div>
					</div>
				<?php } ?>
				<div class="grid-bottom"></div>
			</div>
		</div>
	</section>
<?php } ?>

<?php 
$events = tribe_get_events( array(
	'end_date' => $today,
	'posts_per_page'   => -1,
	'order' => 'DESC',
));

$eventYears = array();

$years = array();

foreach($events as $key => $event) {
	$eventDate = $event->EventStartDate;
	$eventYear = date('Y', strtotime($eventDate));
	if (!in_array($eventYear, $years)) {
		array_push($years, $eventYear);
		$eventYears[$eventYear]['year'] = $eventYear;
	}
	$eventYears[$eventYear]['events'][$key] = $event;
}

if ( !empty( $events ) ) { ?>
	<section class="content past-events">
		<h4>Past Events</h4>
		<div class="collapsable-sections collapsable-events">
			<?php foreach( $eventYears as $eventYear ) { ?>
				<section>
				    <p class="section-title"><?php echo $eventYear['year'] ?></p>
					<i class="fa fa-plus" aria-hidden="true"></i>
					<div class="section-content">
					<?php $months = array(); ?>
					<?php foreach( $eventYear['events'] as $event ) {
						$month = date('m', strtotime($event->EventStartDate));
						if (!in_array($month, $months)) { ?>
							<?php array_push($months, $month); ?>
							<p class="event-month"><span><?php echo date('F', strtotime($event->EventStartDate)); ?></span></p>
						<?php } ?>
						<div class="event-info">

							<?php $terms = wp_get_post_terms( $event->ID, 'projects' ); ?>
							<p class="event-title">
								<a href="<?php echo get_permalink($event); ?>">
									<?php if ($terms) {
										echo $terms[0]->name . ': ';
									}
									echo $event->post_title; ?>
								</a>
							</p>
							<p class="event-date"><span><?php echo date('F j, Y', strtotime($event->EventStartDate)); ?></span></p>
						</div>
					<?php } ?>
					</div>
				</section>
			<?php } ?>
		</div>
	</section>
<?php } ?>

<?php
do_action( 'tribe_events_after_template' );
?>
