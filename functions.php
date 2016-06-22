<?php

require_once( 'functions/enqueue.php' );
require_once( 'functions/events.php' );
require_once( 'functions/gallery.php' );
require_once( 'functions/menus.php' );
require_once( 'functions/projects.php' );
require_once( 'functions/projecttemplates.php' );


function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );