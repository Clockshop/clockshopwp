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

		<div class="event-single content">
			<section class="event-header side-section">
				<div class="side-section-left">
					<h5 class="event-project"><?php echo tribe_get_text_categories(); ?></h5>
					<h1><?php the_title(); ?></h1>
					<?php if (get_field('event_cost')) { ?>
						<p class="event-cost"><?php the_field('event_cost'); ?></p>
					<?php } ?>
					<?php if (get_field('event_nationbuilder_url')) { ?>
						<a href="<?php the_field('event_nationbuilder_url') ?>" class="button">Get Tickets</a>
					<?php } ?>
				</div>
				<div class="side-section-right">
					<img src="<?php the_post_thumbnail_url('grid-3'); ?>" />
				</div>
			</section>
			<section class="event-info side-section">
				<div class="side-section-left">
					<h4>Details</h4>
				</div>
				<div class="side-section-right">
					<div class="event-info-date">
						<p><?php echo tribe_get_start_date(get_the_id(), false, 'l'); ?></p>
						<p><?php echo tribe_get_start_date(get_the_id(), false, 'F j, Y'); ?></p>
						<p><?php echo tribe_get_start_date(get_the_id(), false, 'g'); ?>-<?php echo tribe_get_end_date(get_the_id(), false, 'g'); ?> <?php echo tribe_get_end_date(get_the_id(), false, 'a'); ?></p>
					</div>
					<div class="event-info-location">
						<p><?php echo tribe_get_text_categories(); ?></p>
						<?php if (get_field('event_address')) { ?>
							<p><?php the_field('event_address'); ?></p>
						<?php } ?>
						<?php if (get_field('event_address_2')) { ?>
							<p><?php the_field('event_address_2'); ?></p>
						<?php } ?>
					</div>
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
				</div>
			</section>
			<section class="event-content side-section">
				<div class="side-section-left">
					<h4>Description</h4>
				</div>
				<div class="side-section-right">
					<?php the_content(); ?>
				</div>
				<?php if (get_field('footer_cta')) { ?>
					<div class="event-footer-cta"><?php the_field('footer_cta'); ?></div>
				<?php } ?>
			</section>
		</div>
	<?php endwhile; ?>

</div>