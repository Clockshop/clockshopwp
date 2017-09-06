<?php

// Post Type

function codex_custom_init() {
    $args = array(
		'labels' => array(
			'name' => 'Project Templates',
			'menu_name' => 'Templates',
			'singular_name' => 'Project Template',
			'all_items' => 'All Templates',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Project Template',
			'edit' => 'Edit',
			'edit_item' => 'Edit Project Template',
			'new_item' => 'New Project Template',
			'view' => 'View',
			'view_item' => 'View Project Template',
			'search_items' => 'Search Project Templates',
			'not_found' => 'No Project Templates found',
			'not_found_in_trash' => 'No Project Templates found in Trash',
			'parent' => 'Parent'
		),
		'public' => true,
		'supports' => array( 'title','author','custom-fields','revisions', ),
		'has_archive' => true
    );
    register_post_type( 'clock_templates', $args );
}
add_action( 'init', 'codex_custom_init' );
