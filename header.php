<html lang="en">
<head>

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
<body <?php if ( is_page_template('page-home.php')) : echo 'class="home"'; endif; ?>>

	<div class="container">
		<!--
		<h1><a href="<?php // echo get_site_url(); ?>" class="logo"><span>Clockshop</span></a></h1>
		<a href="<?php // echo get_site_url(); ?>" class="logotype"></a>
		-->

		<nav class="primarynav"> 
			<div class="wpadminbarspacer"></div>

			<div class="mobiletoggle">
				<a class="homelink" href="<?php echo get_site_url(); ?>"></a>
				<div class="opennav toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>	
				<div class="closenav toggle"><i class="fa fa-times" aria-hidden="true"></i></div>
			</div>

			<div class="logo_container">
				<a href="<?php echo get_site_url(); ?>" class="logo_horizontal"></a>			
			</div>

			<div class="topnav">
				<div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					<?php get_search_form(); ?>
				</div>
				<button class="search">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</div>

		</nav>

		<?php // if ( !is_page_template('page-home.php') ) : ?>
			<div class="layoutspacer"></div>
		<?php // endif; ?>