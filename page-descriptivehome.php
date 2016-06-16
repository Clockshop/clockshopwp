<?php 

/* Template Name: Descriptive Home */ 

get_header(); ?>

<?php if( have_rows('features') ): ?>
<div class="carouselwrap">
	<div class="carousel-main">
		<?php while ( have_rows('features') ) : 
			the_row();
			$carousel_image = get_sub_field('carousel_image');
		?>
		<div class="carousel-cell">
			<div class="slide" style="background-image: url('<?php echo $carousel_image['url']; ?>');">
				<div class="ratio"></div>
			</div>
		</div>
		<?php endwhile; ?>
		<div class="arrow"><a href="#homer"><span>&darr;</span></a></div>
	</div>
</div>
<?php endif; ?>

<div class="homecolumn" id="homer">

<?php $mission_statement = get_field('mission_statement'); if( $mission_statement ): ?>

	<div class="homecell">
		<div class="missionimage">
			<img src="<?php echo get_stylesheet_directory_uri() ?>/images/cslogo.png" />
		</div>
		<div class="missioncell">
			<?php echo $mission_statement; ?>
			<a class="learnmore" href="http://clockshop.org/about/">Learn more</a>
		</div>
	</div>

<?php endif; ?>

<?php if( have_rows('features') ): ?>
	<div class="features">
	<?php while ( have_rows('features') ) : the_row(); ?>

	<?php 
		$feature_type = get_sub_field('feature_type');
		$internal_link = get_sub_field('internal_link');
		$external_link = get_sub_field('external_link');
		$headline = get_sub_field('headline');
		$description = get_sub_field('description');
		$call_to_action = get_sub_field('call_to_action');
		$thumbnail_image = get_sub_field('thumbnail_image');

		if ( $feature_type == 'internal' ) :
			$linkurl = get_permalink($internal_link->ID);
		else:
			$linkurl = $external_link;
		endif;
	?>

	<div class="homecell">

		<div class="imagecell">
		<a href="<?php echo $linkurl; ?>"><img src="<?php echo $thumbnail_image['url']; ?>" /></a>
		</div>

		<div class="descriptioncell">
		<h3><a href="<?php echo $linkurl; ?>"><?php echo $headline; ?></a></h3>
		<p><?php echo $description; ?></p>
		
		<?php if ( $call_to_action && $call_to_action != '' ) : ?>
		<p class="calltoaction"><a href="<?php echo $linkurl; ?>"><?php echo $call_to_action; ?></a></p>
		<?php endif; ?>
		</div>

	</div>

	<?php endwhile; ?>
	</div>
<?php endif; ?>

<div class="discovermore">
	<h3>Explore Clockshop...</h3>
	<ul>
		<li><a href="http://clockshop.org/events">Upcoming Events</a></li>
		<li><a href="http://clockshop.org/projects/">Project Archive</a></li>
	</ul>
</div>


</div>


<div class="homecue"></div>

<?php get_footer(); ?>