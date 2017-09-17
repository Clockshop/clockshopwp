<?php 

/* Template Name: Home */ 

	get_header(); ?>

	<?php if( have_rows('features') ): ?>
		<div class="carouselwrap">
			<div class="carousel-main">
				<?php while ( have_rows('features') ) : 
				the_row();
				$carousel_image = get_sub_field('carousel_image');

				$feature_type = get_sub_field('feature_type');
				$internal_link = get_sub_field('internal_link');
				$external_link = get_sub_field('external_link');

				if ( $feature_type == 'internal' ) :
					$linkurl = get_permalink($internal_link->ID);
				else:
					$linkurl = $external_link;
				endif;

				?>
				<div class="carousel-cell">
					<div class="slide" style="background-image: url('<?php echo $carousel_image['url']; ?>');">
						<div class="content">
							<div>
								<div class="arrows">
									<a class="prev"><img class="left-arrow" src="<?php echo get_stylesheet_directory_uri() ?>/images/arrow.png" /></a>
									<a class="next"><img class="right-arrow" src="<?php echo get_stylesheet_directory_uri() ?>/images/arrow.png" /></a>
								</div>
								<p class="project-title"><?php echo get_sub_field('headline'); ?></p>
								<a class="project-more" href="<?php echo $linkurl; ?>">LEARN MORE</a>
							</div>
						</div>
						<div class="project-overlay"></div>
						<div class="ratio"></div>
					</div>
				</div>
			<?php endwhile; ?>
			<div class="arrow"><a href="#homer"><span>&darr;</span></a></div>
		</div>
	</div>
	<?php endif; ?>

	<div class="content">
	<?php if( have_rows('features') ): ?>
		<div class="grid featured-grid">
			<h3>Featured Call Outs</h3>
			<?php while ( have_rows('features') ) : the_row(); ?>

				<?php 
				$feature_type = get_sub_field('feature_type');
				$internal_link = get_sub_field('internal_link');
				$external_link = get_sub_field('external_link');
				$headline = get_sub_field('headline');
				$content_type = get_sub_field('content_type');
				$description = get_sub_field('description');
				$call_to_action = get_sub_field('call_to_action');
				$thumbnail_image = get_sub_field('thumbnail_image');

				if ( $feature_type == 'internal' ) :
					$linkurl = get_permalink($internal_link->ID);
				else:
					$linkurl = $external_link;
				endif;
				?>

				<div class="grid-3">

					<div class="imagecell">
						<a href="<?php echo $linkurl; ?>"><img src="<?php echo $thumbnail_image['sizes']['grid-3']; ?>" /></a>
					</div>

					<div class="descriptioncell">
						<h3><a href="<?php echo $linkurl; ?>"><?php echo $headline; ?></a></h3>
						<p class="content-type"><?php echo $content_type; ?></p>
						<p class="description"><?php echo $description; ?></p>

						<?php if ( $call_to_action && $call_to_action != '' ) : ?>
							<p class="calltoaction"><a href="<?php echo $linkurl; ?>"><?php echo $call_to_action; ?></a></p>
						<?php endif; ?>
					</div>

				</div>

			<?php endwhile; ?>

			<div class="grid-bottom"></div>

		</div>
	<?php endif; ?>
	</div>

</div>

<footer class="followfooter">
	<div class="content">

		<p>Subscribe to our mailing list</p>

		<div class="newsform">
			<?php echo do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]')?>
		</div>

	</div>
</footer>

<?php get_footer(); ?>