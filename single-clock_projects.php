<?php
	$redirect = get_field('redirect');
	if ( $redirect ) :
		wp_redirect(clean_url($redirect), 301);
		exit;
	endif;
?>

<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div id="container">
			<?php the_content(); ?>

			<?php 
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

				if ( count($events) > 0 ) :

					echo '<div class="related"><h3>Events</h3>';

					foreach ( $events as $post ) :
						$event_id = get_the_ID();
						?>

						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						<?php endif; ?>

						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

						<p><?php echo tribe_events_event_schedule_details( $event_id ); ?></p>

						<?php 
					endforeach;

				endif;

				wp_reset_postdata();

				echo '</div>';

			endif;
			?>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
