<?php
	$project_template = get_field('project_template');
	if ( $project_template ) : ?>


<pre><?php var_dump($post); ?></pre>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<pre><?php var_dump(get_post_meta($post->ID)); ?></pre>


<section class="projecttemplate">

	<?php 
		$post = $project_template; 
		setup_postdata( $post ); 
		
		$display_title = get_field('display_title'); 
		if ( !$display_title || $display_title == '' ) :
			$display_title = the_title_attribute( 'echo=0' );
		endif;

		$logo = get_field('logo'); 
		if ( $logo ) : ?>
			<header><h2 class="withlogo"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $display_title; ?>" /></h2></header>
		<?php else: ?>
			<header><h2><?php echo $display_title; ?></h2></header>
		<?php endif; ?>

	<?php
	
	$menu = get_field('menu'); 
	if ( $menu ) : ?>
		<nav>
			<div class="margin">
			<header><div class="projectmenutoggle">Menu</div></header>

				<div class="menuwrap"><div class="decoration">
				<?php wp_nav_menu (array( 'menu' => $menu )); ?>
				</div></div>
			</div>
		</nav>
	<?php endif; ?>



	<?php wp_reset_postdata(); ?>

<?php endif; ?>