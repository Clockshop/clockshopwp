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

		<?php include(locate_template('parts/projecttemplate-head.php')); ?>

		<article>
			<?php 

			the_content();

			include(locate_template('parts/related-projects.php'));
			include(locate_template('parts/related-events.php'));

			?>
		</article>

		<?php include(locate_template('parts/projecttemplate-foot.php')); ?>

	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
