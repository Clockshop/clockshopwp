<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<article>
			<?php while (have_posts()) : the_post(); 
				the_content();

				/* Page Links */

				$links = get_field('links');

				if ( have_rows('links') ): ?>

				<div class="relatedlinks">

					    <?php while ( have_rows('links') ) : the_row();

							$image = get_sub_field('link_image');
							$url = get_sub_field('link_url');
							$title = get_sub_field('link_title');
							$description = get_sub_field('link_description');
							$call_to_action = get_sub_field('link_call_to_action');

							?>

							<?php if ( $image ) : ?>
								<a href="<?php echo $url; ?>"><?php echo wp_get_attachment_image($image['ID'],'full'); ?></a>
							<?php endif; ?>

							<h3><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h3>

							<p class="date"><?php echo $description; ?> <a href="<?php echo $url; ?>"><?php echo $call_to_action; ?></a><p>

					    <?php endwhile; ?>


					</div>
				<?php

				   wp_reset_postdata();

				endif;

			endwhile; ?>
		</article>
	<?php endif; ?>
<?php get_footer(); ?>