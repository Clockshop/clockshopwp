<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div class="eventsingle">

	<?php while ( have_posts() ) : the_post(); ?>

		<h2><?php the_title(); ?></h2>

		<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

		<h4><?php echo tribe_events_event_schedule_details( $event_id ); ?></h4>

		<?php 
			do_action( 'tribe_events_single_event_before_the_content' );
			the_content();
			do_action( 'tribe_events_single_event_after_the_content' ); 
		?>

		<?php 
			do_action( 'tribe_events_single_event_before_the_meta' );
			tribe_get_template_part( 'modules/meta' );
			do_action( 'tribe_events_single_event_after_the_meta' ); 
		?>

		<?php clock_p2p_the_related(); ?>

	<?php endwhile; ?>

</div>