<?php 

/* Template Name: Home */ 

get_header(); ?>
<?php $images = get_field('gallery'); if( $images ): ?>
    <div class="flexslider desktop">
      <ol class="slides">
		<?php foreach( $images as $image ): ?>
        	<li> <img src="<?php echo $image['url']; ?>"></li> 
    	<?php endforeach; ?>
      </ol>
    </div>
<?php endif; ?>

<?php get_template_part('parts/homemobile'); ?>

<?php get_footer(); ?>