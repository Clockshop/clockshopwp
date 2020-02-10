<?php

require_once( 'lib/enqueue.php' );
require_once( 'lib/events.php' );
require_once( 'lib/gallery.php' );
require_once( 'lib/menus.php' );
require_once( 'lib/projects.php' );
require_once( 'lib/acf.php' );
require_once( 'lib/aq_resizer.php' );
require_once( 'lib/images.php' );
require_once( 'lib/gravityforms.php' );
require_once( 'lib/search.php' );
require_once( 'lib/context.php' );
require_once( 'lib/utilities.php' );
require_once( 'lib/shortcodes.php' );

function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );

add_filter('show_admin_bar', '__return_false');

function enable_wpautop(){
	add_filter('the_content', 'wpautop');
}
add_action( 'after_setup_theme', 'enable_wpautop' );

// Set LA as default timezone
//date_default_timezone_set('America/Los_Angeles');

?>