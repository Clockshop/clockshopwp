<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_link();

?>

<p class="venue">

<?php echo tribe_get_venue(); if ( tribe_address_exists() ) : ?><br />

	<?php echo tribe_get_full_address(); ?><br />

	<?php if ( tribe_show_google_map_link() ) : ?>
		<?php echo tribe_get_map_link_html(); ?><br />
	<?php endif; ?>

<?php endif; ?>

<?php if ( ! empty( $phone ) ): ?>
Phone: <?php echo $phone ?><br />
<?php endif ?>

<?php if ( ! empty( $website ) ): ?>
<?php echo $website ?> <br />
<?php endif ?>
</p>
<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>
