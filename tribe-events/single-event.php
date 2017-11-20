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
$today = date("Y-m-d");

$terms = get_terms( array(
    'taxonomy' => 'project',
    'hide_empty' => false,
) );

?>

<div class="eventsingle">

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="event-single content">
			<section class="event-header side-section">
				<div class="side-section-left">
					<?php if ($today > tribe_get_end_date(get_the_id(), false, 'Y-m-d')) { ?>
						<p class="past">PAST EVENT</p>
					<?php } ?>

					<?php $terms = wp_get_post_terms( get_the_id(), 'projects' ); ?>
					<?php if (has_term( '', 'projects' ) ) { ?>
						<h5 class="event-project"><?php echo $terms[0]->name; ?></h5>
					<?php } ?>

					<h1><?php the_title(); ?></h1>
					<?php if (get_field('event_cost')) { ?>
						<p class="event-cost"><?php the_field('event_cost'); ?></p>
					<?php } elseif (tribe_get_cost()) { ?>
						<p class="event-cost"><?php echo tribe_get_cost($event_id, true); ?></p>
					<?php } ?>
					<?php if (get_field('event_nationbuilder_url')) { ?>
						<a href="<?php the_field('event_nationbuilder_url') ?>" class="button">Get Tickets</a>
					<?php } ?>
				</div>
				<div class="side-section-right event-images">
					<?php $event_images = get_field('event_images') ?>
					<?php if ($event_images) { ?>
						<?php foreach( $event_images as $image ) { ?>
							<img src="<?php echo $image['sizes']['grid-3']; ?>" />
						<?php } ?>
					<?php } ?>
				</div>
				<div class="side-section-left mobile">
					<h5 class="event-project"><?php echo $terms[0]->name; ?></h5>
					<h1><?php the_title(); ?></h1>
					<?php if (get_field('event_cost')) { ?>
						<p class="event-cost"><?php the_field('event_cost'); ?></p>
					<?php } ?>
					<?php if (get_field('event_nationbuilder_url')) { ?>
						<a href="<?php the_field('event_nationbuilder_url') ?>" class="button">Get Tickets</a>
					<?php } ?>
				</div>
			</section>
			<section class="event-info side-section">
				<div class="side-section-left">
					<h4>Details</h4>
				</div>
				<div class="side-section-right">
					<?php if (tribe_get_start_date(get_the_id(), false, 'l') || tribe_get_end_date(get_the_id(), false, 'g')) { ?>
						<div class="event-info-date">
							<p><?php echo tribe_get_start_date(get_the_id(), false, 'l'); ?></p>
							<p><?php echo tribe_get_start_date(get_the_id(), false, 'F j, Y'); ?></p>
							<p><?php echo tribe_get_start_date(get_the_id(), false, 'g'); ?>-<?php echo tribe_get_end_date(get_the_id(), false, 'g'); ?> <?php echo tribe_get_end_date(get_the_id(), false, 'a'); ?></p>
						</div>
					<?php } ?>
					<?php if (tribe_get_venue($event_id)) { ?>
						<div class="event-info-location">
							<?php if (tribe_get_venue($event_id)) { ?>
								<p><?php echo tribe_get_venue($event_id); ?></p>
							<?php } ?>
							<?php if (tribe_get_full_address($event_id)) { ?>
								<p><?php echo tribe_get_full_address($event_id); ?></p>
							<?php } ?>
						</div>
					<?php } ?>
					<?php if (get_field('event_first_hashtag') || get_field('event_second_hashtag') || get_field('event_facebook_url') || get_field('event_twitter_url')) { ?>
						<div class="event-info-social">
							<?php if (get_field('event_first_hashtag')) { ?>
								<p><?php the_field('event_first_hashtag'); ?></p>
							<?php } ?>
							<?php if (get_field('event_second_hashtag')) { ?>
								<p><?php the_field('event_second_hashtag'); ?></p>
							<?php } ?>
							<?php if (get_field('event_facebook_url')) { ?>
								<a href="<?php the_field('event_facebook_url'); ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
							<?php } ?>
							<?php if (get_field('event_twitter_url')) { ?>
								<a href="<?php the_field('event_twitter_url'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</section>
			<section class="event-content side-section">
				<div class="side-section-left">
					<h4>Description</h4>
				</div>
				<div class="side-section-right">
					<?php the_content(); ?>
				</div>
			</section>
			<?php if (get_field('footer_cta')) { ?>
				<div class="event-footer-cta"><?php the_field('footer_cta'); ?></div>
			<?php } ?>
		</div>
	<?php endwhile; ?>

</div>