<?php 
/* Related Projects */

$related_projects = get_field('related_projects');

if ( $related_projects ): ?>

<div id="related" class="relatedprojects">

	<?php 
		$show_headings = get_field('show_headings'); 
		if ( $show_headings == 'yes' ) : ?>
		<h3>Select Artworks &amp; Happenings</h3>
	<?php endif; ?>

	    <?php foreach( $related_projects as $post): setup_postdata($post); ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			<?php endif; ?>

			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

	    <?php endforeach; ?>
		<?php wp_reset_postdata(); ?>

</div>
<?php 

endif;
