<?php 

/* Template Name: About */ 

get_header(); ?>

	<div class="about-hero">
		<div style="background-image: url('<?php echo get_field('hero_background_image')['url'] ?>');">
			<div class="content">
				<div>
					<p class="mission"><?php echo get_field('mission_statement'); ?></p>
				</div>
			</div>
			<div class="project-overlay"></div>
			<p class="photo-credit"><?php the_field('photo_credit'); ?></p>
		</div>
	</div>
	<div class="content about-content">
		<?php echo wpautop( $post->post_content ); ?>
	</div>
	<div class="content about-sections">
		<?php if( have_rows('collapsable_sections') ): ?>
			<?php while ( have_rows('collapsable_sections') ) : the_row(); ?>
				<section>
				    <p class="section-title"><?php the_sub_field('section_title'); ?></p>
					<i class="fa fa-plus" aria-hidden="true"></i>
					<div class="section-content">
						<?php the_sub_field('section_content'); ?>
					</div>
				</section>
			<?php endwhile; ?>
		<?php else : ?>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>
