<?php

get_header(); ?>

<article class="projectarchive project-archive ongoing projects-list">
	<?php if( have_rows('projects') ): ?>
	
	<h1>Ongoing Projects</h1>

		<?php while ( have_rows('ongoing') ) : the_row(); ?>

		<?php
		
			$project_object = get_sub_field('project_object');
			$project_title = $project_object->post_title;
			$project_subtitle = $project_object->post_excerpt;
			$project_image = get_the_post_thumbnail($project_object->ID);
			$project_url = get_permalink( $project_object->ID);
			$project_excerpt = get_post_custom($project_object->ID);
			$excerpt = $project_excerpt['excerpt'];
		?>

            <div class="one-half first">

				<?php if ( $project_image ) : ?>
					<a href="<?php echo $project_url; ?>"><?php echo $project_image; ?></a>
				<?php endif; ?>
            </div>
            
            <div class="one-half">   
				<h2><a href="<?php echo $project_url; ?>"><?php echo $project_title; ?></a></h2>
				<?php if ( $project_subtitle ) : ?>
					<p><?php echo $project_subtitle; ?></p>
                 	
				<?php endif; ?>
				
                <?php if ($excerpt){ ?>
            	<p><? foreach ( $excerpt as $key => $value ) {
						echo $value . "<br />";
					  } ?></p>
                      <a href="<?php echo $project_url; ?>" class="more">More</a>
				<?php } ?>
            </div>

		<?php endwhile; ?>
	<?php endif; ?>
</article>

<article class="project-archive bowtie clear-both">
	<?php if( have_rows('projects') ): 
	
	echo "<h3>Artwork at the Bowtie</h3>";
			$counter = 1;
			while ( have_rows('artwork_bowtie') ) : the_row(); ?>

			<?php
				$project_object = get_sub_field('project_object');
				$project_title = $project_object->post_title;
				$project_subtitle = $project_object->post_excerpt;
				$project_image = get_the_post_thumbnail($project_object->ID);
				$project_url = get_permalink( $project_object->ID);
				$project_excerpt = get_the_excerpt ($project_object->ID);
				$creator = get_post_meta ($project_object->ID, 'Creator', true);
			?>
                <div class="one-third <? if ($counter % 3== 1) echo 'first';?>">
					<?php if ( $project_image ) : ?>
						<a href="<?php echo $project_url; ?>"><?php echo $project_image; ?></a>
					<?php endif; ?>
                    
                    <a href="<?php echo $project_url; ?>" class="titlelink"><h4><? echo $creator; ?></h4><h5><?php echo $project_title; ?></h5></a>
					<?php if ( $project_subtitle ) : ?>
						<p><?php echo $project_subtitle; ?></p>
                     	
					<?php endif; ?>
                </div>
                <? $counter++; ?>
                
		<?php endwhile; ?>
	<?php endif; ?>
</article>

<article class="projectarchive project-archive past_programs clear-both">
	<?php if( have_rows('projects') ): 
	
	echo "<h3>Past Projects</h3>";
			$counter = 1;
			while ( have_rows('past_programs') ) : the_row(); ?>

			<?php
				$project_object = get_sub_field('project_object');
				$project_title = $project_object->post_title;
				$project_subtitle = $project_object->post_excerpt;
				$project_image = get_the_post_thumbnail($project_object->ID);
				$project_url = get_permalink( $project_object->ID);
				$project_excerpt = get_the_excerpt ($project_object->ID);
			?>

                <div class="one-third <? if ($counter % 3 ==1) echo 'first';?>">
					<?php if ( $project_image ) : ?>
						<a href="<?php echo $project_url; ?>"><?php echo $project_image; ?></a>
					<?php endif; ?>
                    <h4><a href="<?php echo $project_url; ?>"><?php echo $project_title; ?></a></h4>
					<?php if ( $project_subtitle ) : ?>
						<p><?php echo $project_subtitle; ?></p>
                     	
					<?php endif; ?>
                </div>
                <? $counter++; ?>
                
		<?php endwhile; ?>
	<?php endif; ?>
</article>

<?php get_footer(); ?>
