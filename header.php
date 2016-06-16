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

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon.ico">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-180.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-152.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-144.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-120.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-76.png" />
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-60.png" />
	<meta name="application-name" content="<?php bloginfo( 'name' ); ?>"/> 
	<meta name="msapplication-TileColor" content="#000000"/> 
	<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-144.png"/>

	<?php wp_head(); ?>

</head>
<body <?php 
		if ( is_page_template('page-home.php')) :
			echo 'class="home"'; 
		endif;
?>>

    <h1><a href="<?php echo get_site_url(); ?>" class="logo"><span>Clockshop</span></a></h1>
    <a href="<?php echo get_site_url(); ?>" class="logotype"></a>

   <nav> 
	<div class="wpadminbarspacer"></div>

	<div class="mobiletoggle">
		<a class="homelink" href="<?php echo get_site_url(); ?>"><span>Home</span></a>
		<div class="opennav toggle"><span class="icon icon-menu"></span>Menu</div>	
		<div class="closenav toggle"><span class="icon icon-close"></span>Close</div>
	</div>

	<div class="topnav">
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>		
	</div>

 </nav>

<?php if ( !is_page_template('page-home.php') ) : ?>
	<div class="layoutspacer"></div>
<?php endif; ?>