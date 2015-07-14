<html lang="en">
<head>

	<title><?php 
		wp_title( '&ndash;', true, 'right' );
		bloginfo( 'name' ); 
		$site_description = get_bloginfo( 'description', 'display' );

		if ( $paged >= 2 || $page >= 2 )
			echo ' &ndash; ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
		?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>

</head>
<body <?php if ( is_front_page() ) echo 'id="home"'; ?> >
	<?php if ( is_front_page() ) : ?>
		<div id="mobilewrapper">
	<?php endif; ?>

    <nav> 
        <a href="<?php echo get_site_url(); ?>" id="main" class="logo"></a>
        <a href="<?php echo get_site_url(); ?>" id="type" class="logo" ></a>
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav>