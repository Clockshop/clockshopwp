<?php get_header(); ?>
<div class="search-template content">

	<?php if (have_posts()) : ?>
	<?php $s = filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING); ?>

	<h2>Search Results</h2>
	<h4>YOU SEARCHED FOR "<?php echo $s; ?>"</h4>
	<?php get_search_form(); ?>

	<div class="search-list">
		
		<?php while (have_posts()) : the_post(); ?>
			<article>
				<?php if (has_post_thumbnail()) { ?>
					<div class="list-image">
						<?php the_post_thumbnail('list'); ?>
					</div>
				<?php } else { ?>
					<div class="list-image">
						<img src="http://placehold.it/303x202" />
					</div>
				<?php } ?>
				<div class="list-title">
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</div>
			</article>				
		<?php endwhile; ?>

		<?php if (get_next_posts_link()) { ?>

			<div class="search-pag">
				<?php $args = array(
					'base'               => '%_%',
					'format'             => '?paged=%#%',
					'show_all'           => true,
					'prev_next'          => false,
				); ?>
				
				<?php echo paginate_links($args); ?>
			</div>

		<?php } ?>

	</div>

	<?php endif; ?>
	

</div>
<?php get_footer(); ?>