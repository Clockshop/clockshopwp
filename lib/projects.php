<?php

// Post Type

function create_project_pt() {
	register_post_type( 'project',
		array(
			'labels' => array(
				'name' => 'Project Pages',
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
	        'taxonomies' => array('projects'),
			//"rewrite" => array( "slug" => "projects/%projects%", "with_front" => true ),
			'supports' => array( 'title','editor','author','thumbnail','custom-fields','revisions','page-attributes' ),
			'public' => true,
			'show_in_menu' => true,
			'hierarchical' => true,
			'menu_icon' => 'dashicons-media-document',
		)
	);
}
add_action( 'init', 'create_project_pt' );

// Create Projects Taxonomy
function create_project_tax() {
	register_taxonomy(
		'projects',
		array( 'project', 'events', 'page' ),
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
			'public' => true,
			'show_in_menu' => true,
			'has_archive' => true,
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'create_project_tax' );

add_filter('post_type_link', 'update_permalink_structure', 10, 2);
function update_permalink_structure( $post_link, $post )
{
    if ( false !== strpos( $post_link, '%projects%' ) ) {
        $taxonomy_terms = get_the_terms( $post->ID, 'projects' );
        if ($taxonomy_terms) {
	        foreach ( $taxonomy_terms as $term ) { 
	            if ( ! $term->parent ) {
	                $post_link = str_replace( '%projects%', $term->slug, $post_link );
	            }
	        }
	    }
    }
    return $post_link;
}

/*
function save_book_meta( $post_id, $post, $update ) {
    $post_type = get_post_type($post_id);
    if ( ($post_type == "project")  && ($post->project_content_type == 'artist_single') ) {
		update_post_meta( $post_id, 'project_menu', 'active', '' );
    } else {
		update_post_meta( $post_id, 'project_menu', 'inactive', '' );
    }
}
add_action( 'save_post', 'save_book_meta', 10, 3 );
*/

?>