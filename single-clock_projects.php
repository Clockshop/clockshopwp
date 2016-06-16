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
		<article>
			<?php 

			the_content();

				/* Related Projects */

				$related_projects = get_field('related_projects');

				if ( $related_projects ): ?>

				<div id="related" class="relatedprojects">

					<h3>Select Artworks &amp; Happenings</h3>

					    <?php foreach( $related_projects as $post): setup_postdata($post); ?>

							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
							<?php endif; ?>

							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

					    <?php endforeach; ?>


					</div>
				<?php

				   wp_reset_postdata();

				endif; 

				/* Related Events */

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

					$events_order = get_field('events_order');

					if ( $events_order == 'desc' ):
						$events = array_reverse($events);
					endif;

					if ( count($events) > 0 ) : ?>

					<div id="events" class="relatedevents">
						<h3>Events</h3>

					<?php foreach ( $events as $post ) :
							$event_id = get_the_ID();
							?>

							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
							<?php endif; ?>

							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

							<p class="date"><?php echo tribe_events_event_schedule_details( $event_id ); ?></p>

							<?php 
						endforeach;

						wp_reset_postdata(); 

					endif;

				?>
			</article>

		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
