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
?>

	<h1>Events This Month</h1>

<?php
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

$today = current_time('Y-m-d');
$oneMonth = endCycle($today, 1);

$events = tribe_get_events( array(
	'start_date' => $today,
	'end_date'   => $oneMonth
));

if ( empty( $events ) ) {
	echo 'Sorry, nothing found.';
}
else { ?>
	<section class="events-slider content">
		<?php foreach( $events as $event ) { ?>
			<div class="slide-cell">
				<div class="slide">
					<div class="event-image">
						<a href="<?php echo get_permalink($event->ID); ?>">
							<?php echo get_the_post_thumbnail($event); ?>
						</a>
					</div>
					<div class="event-content">
						<a class="prev"><img class="left-arrow" src="<?php echo get_template_directory_uri() ?>/images/arrow_black.png" /></a>
						<a class="next"><img class="right-arrow" src="<?php echo get_template_directory_uri() ?>/images/arrow_black.png" /></a>
						<h2><a href="<?php echo get_permalink($event->ID); ?>"><?php echo get_the_title($event); ?></a></h2>
						<h3><?php echo spellerberg_sp_date($event); ?></h3>
						<h5><?php echo tribe_get_text_categories($event->ID); ?></h5>
						<h5 class="cost"><?php echo tribe_get_cost( null, true ); ?></h5>
						<?php if (get_the_excerpt($event->ID) != '') { ?>
							<p class="excerpt"><?php echo get_the_excerpt($event->ID); ?></p>
						<?php } else { ?>
							<p class="excerpt"><?php echo wp_trim_words( get_post_field('post_content', $event->ID), 15, '...' ); ?></p>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</section>
<?php } ?>

<?php 
$events = tribe_get_events( array(
	'start_date' => $oneMonth,
	'posts_per_page'   => 3,

));

if ( empty( $events ) ) {
	echo 'Sorry, nothing found.';
}
else { ?>
	<section class="content upcoming-events">
		<h4>Further Out</h4>
		<div class="grid featured-grid">
			<?php foreach( $events as $event ) { ?>
				<div class="grid-3">
					<div class="imagecell">
						<a href="<?php echo get_permalink($event->ID); ?>"><?php echo get_the_post_thumbnail($event); ?></a>
					</div>
					<div class="descriptioncell">
						<h3><a href="<?php echo get_permalink($event->ID); ?>"><?php echo get_the_title($event); ?></a></h3>
						<p class="content-type"><?php echo spellerberg_sp_date($event); ?></p>
						<p class="add-descriptor"><?php echo tribe_get_text_categories($event->ID); ?></p>
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
	</section>
<?php } ?>

<?php
do_action( 'tribe_events_after_template' );
