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

		<h3><?php echo spellerberg_sp_date($event_id); ?></h3>

		<?php 
			tribe_get_template_part( 'modules/meta' );
			the_content();
		?>


	<?php endwhile; ?>

</div>