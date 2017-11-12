<?php

// Post Type

function create_project_pt() {
	register_post_type( 'projects',
		array(
			'labels' => array(
				'name' => 'Projects',
				'menu_name' => 'Project Pages',
				'singular_name' => 'Project Page',
				'all_items' => 'All Project Pages',
				'add_new' => 'Add New Project Page',
				'add_new_item' => 'Add New Project Page',
				'edit' => 'Edit',
				'edit_item' => 'Edit Project Page',
				'new_item' => 'New Project Page',
				'view' => 'View',
				'view_item' => 'View Project Page',
				'search_items' => 'Search Project Pages',
				'not_found' => 'No Project Pages found',
				'not_found_in_trash' => 'No Project Pages found in Trash',
				'parent' => 'Parent'
			),
			'supports' => array( 'title','editor','author','thumbnail','custom-fields','revisions','page-attributes' ),
			//'rewrite' => array('slug' => 'projects_pt'),
			'public' => true,
			'show_in_menu' => true,
			'has_archive' => true,
			'hierarchical' => true,
			'menu_icon' => 'dashicons-media-document',
		)
	);
}
add_action( 'init', 'create_project_pt' );

// Create Projects Taxonomy
function create_project_tax() {
	register_taxonomy(
		'project',
		array( 'projects', 'tribe_events', 'post', 'page' ),
		array(
			'labels' => array(
				'name' => 'Projects',
				'menu_name' => 'Projects',
				'singular_name' => 'Project',
				'all_items' => 'All Projects',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Project',
				'edit' => 'Edit',
				'edit_item' => 'Edit Project',
				'new_item' => 'New Project',
				'view' => 'View',
				'view_item' => 'View Project',
				'search_items' => 'Search Projects',
				'not_found' => 'No Projects found',
				'not_found_in_trash' => 'No Projects found in Trash',
				'parent' => 'Parent'
			),
			//'rewrite' => array( 'slug' => 'projects_tax' ),
			'public' => true,
			'show_in_menu' => true,
			'has_archive' => true,
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'create_project_tax' );

?>