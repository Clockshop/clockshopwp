<?php 

/* Template Name: Projects */ 

get_header(); ?>

<article class="projectarchive">
	<?php if( have_rows('projects') ): ?>

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
				<div class="ratio"></div>
				<div class="inner"><div class="padding">

					<?php if ( $project_image ) : ?>
						<a href="<?php echo $project_url; ?>"><?php echo $project_image; ?></a>
					<?php endif; ?>

					<h2><a href="<?php echo $project_url; ?>"><?php echo $project_title; ?></a></h2>

					<?php if ( $project_subtitle ) : ?>
						<p><?php echo $project_subtitle; ?></p>
					<?php endif; ?>

				</div></div>

			</div>

		<?php endwhile; ?>
	<?php endif; ?>
</article>
<?php get_footer(); ?>
