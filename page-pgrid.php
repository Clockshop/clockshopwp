<?php 

/* Template Name: Projects */ 

get_header(); ?>
	<div class="projects">
	<?php if( have_rows('projects') ): ?>

		<div class="projectstoggle">
			<li id="commissionstoggle">Commissions</li>
			<li id="seriestoggle">Series</li>
		</div>

		<?php while ( have_rows('projects') ) : the_row(); ?>
			<?php
				$project_object = get_sub_field('project_object');
				$project_title = $project_object->post_title;
				$project_subtitle = $project_object->post_excerpt;
				$project_image = get_the_post_thumbnail($project_object->ID);
				$project_url = get_permalink( $project_object->ID);

				$project_tags = get_sub_field('project_tags');

				$tags = '';
				if ( $project_tags ) :
					foreach ($project_tags as $key => $val) :
						$tags .= $val . ' ';
					endforeach; 
				endif;

			?>

					<div class="project <?php echo $tags; ?>">

						<?php if ( $project_image ) : ?>
							<a href="<?php echo $project_url; ?>"><?php echo $project_image; ?></a>
						<?php endif; ?>

						<h2><a href="<?php echo $project_url; ?>"><?php echo $project_title; ?></a></h2>

						<?php if ( $project_subtitle ) : ?>
							<p><?php echo $project_subtitle; ?></p>
						<?php endif; ?>

					</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>