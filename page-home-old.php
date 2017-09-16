<?php 

/* Template Name: Home (old) */ 

get_header(); ?>

<?php $images = get_field('gallery'); if( $images ): ?>
	<div class="flexslider">
		<ol class="slides">
		<?php foreach( $images as $image ): ?>
        	<li style="background: url(<?php echo $image['url']; ?>) center; background-size: cover;"></li> 
    	<?php endforeach; ?>
		</ol>
	</div>
<?php endif; ?>

<?php 

$events = tribe_get_events(array( 
	'posts_per_page' => 1,
	'eventDisplay' => 'upcoming'
));

foreach( $events as $post ) : ?>

<div class="nextevent">
	<a href="<?php the_permalink(); ?>">
		<p>Next: <br /><?php echo tribe_get_start_date( $post->ID, true, 'M j' ); ?><span class="arrow"></span></p>
		<span class="box"></span>
	</a>
</div>

<?php endforeach; wp_reset_postdata();?>

<?php get_footer(); ?>