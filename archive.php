<?php get_header(); 

global $query_string;
query_posts( $query_string . '&posts_per_page=-1' ); ?>

	<?php if (have_posts()) : ?>
		<div class="archive">
			<h2><?php single_cat_title(); ?></h2>

			<?php while (have_posts()) : the_post(); ?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php endwhile; ?>

		</div>
	<?php endif; ?>
<?php get_footer(); ?>