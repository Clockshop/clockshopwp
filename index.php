<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<article>
			<?php while (have_posts()) : 
				the_post(); 
				the_content();
			endwhile; ?>
		</article>
	<?php endif; ?>
<?php get_footer(); ?>