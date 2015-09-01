<?php

// https://github.com/scribu/wp-posts-to-posts/wiki

function clock_p2p_register_connections() {

	// "Related" functionality 

	// Posts
	p2p_register_connection_type( array(
		'name' => 'posts_to_posts',
		'from' => 'post',
		'to' => 'post',
		'reciprocal' => true,
		'title' => array(
		    'from' => __( 'Related Posts' ),
		    'to' => __( 'Related Posts' )
		  )
	) );
	
	p2p_register_connection_type( array(
		'name' => 'posts_to_pages',
		'from' => 'post',
		'to' => 'page',
		'title' => array(
		    'from' => __( 'Related Pages' ),
		    'to' => __( 'Related Posts' )
		  )
	) );

	p2p_register_connection_type( array(
		'name' => 'posts_to_clock_projects',
		'from' => 'post',
		'to' => 'clock_projects',
		'title' => array(
		    'from' => __( 'Related Projects' ),
		    'to' => __( 'Related Posts' )
		  )
	) );

	p2p_register_connection_type( array(
		'name' => 'posts_to_tribe_events',
		'from' => 'post',
		'to' => 'tribe_events',
		'title' => array(
		    'from' => __( 'Related Events' ),
		    'to' => __( 'Related Posts' )
		  )
	) );

	// Pages

	p2p_register_connection_type( array(
		'name' => 'pages_to_pages',
		'from' => 'page',
		'to' => 'page',
		'reciprocal' => true,
		'title' => array(
		    'from' => __( 'Related Pages' ),
		    'to' => __( 'Related Pages' )
		  )
	) );

	p2p_register_connection_type( array(
		'name' => 'pages_to_clock_projects',
		'from' => 'page',
		'to' => 'clock_projects',
		'title' => array(
		    'from' => __( 'Related Projects' ),
		    'to' => __( 'Related Pages' )
		  )
	) );

	p2p_register_connection_type( array(
		'name' => 'pages_to_tribe_events',
		'from' => 'page',
		'to' => 'tribe_events',
		'title' => array(
		    'from' => __( 'Related Events' ),
		    'to' => __( 'Related Pages' )
		  )
	) );

	// Projects

	p2p_register_connection_type( array(
		'name' => 'clock_projects_to_clock_projects',
		'from' => 'clock_projects',
		'to' => 'clock_projects',
		'reciprocal' => true,
		'title' => array(
		    'from' => __( 'Related Projects' ),
		    'to' => __( 'Related Projects' )
		  )
	) );

	p2p_register_connection_type( array(
		'name' => 'clock_projects_to_tribe_events',
		'from' => 'clock_projects',
		'to' => 'tribe_events',
		'title' => array(
		    'from' => __( 'Related Events' ),
		    'to' => __( 'Related Projects' )
		  )
	) );

	// Events

	p2p_register_connection_type( array(
		'name' => 'tribe_events_to_tribe_events',
		'from' => 'tribe_events',
		'to' => 'tribe_events',
		'reciprocal' => true,
		'title' => array(
		    'from' => __( 'Related Events' ),
		    'to' => __( 'Related Events' )
		  )
	) );

}
add_action( 'p2p_init', 'clock_p2p_register_connections' );



// Related

function clock_p2p_the_related() {

	echo clock_p2p_get_related();
		
}

function clock_p2p_get_related() {

	global $post;
	
	$output = '';
	
	$postType = get_post_type( $post );
	
	// if ( $postType == "post" ) :
	// 
	// 	$output .= clock_p2p_get_related_posts('posts_to_posts','Related posts');
	// 	$output .= clock_p2p_get_related_posts('posts_to_pages','Related pages');
	// 	$output .= clock_p2p_get_related_posts('posts_to_clock_projects','Related projects');
	// 	$output .= clock_p2p_get_related_events('posts_to_tribe_events','Related events');
	// 
	// elseif ( $postType == "page"):
	// 
	// 	$output .= clock_p2p_get_related_posts('pages_to_pages','Related pages');
	// 	$output .= clock_p2p_get_related_posts('posts_to_pages','Related posts');
	// 	$output .= clock_p2p_get_related_posts('pages_to_clock_projects','Related projects');
	// 	$output .= clock_p2p_get_related_events('pages_to_tribe_events','Related events');
	
	if ( $postType == "clock_projects"):
	
		// $output .= clock_p2p_get_related_posts('clock_projects_to_clock_projects','Related projects');
		// $output .= clock_p2p_get_related_posts('posts_to_clock_projects','Related posts');
		// $output .= clock_p2p_get_related_posts('pages_to_clock_projects','Related pages');
		$output .= clock_p2p_get_related_events('clock_projects_to_tribe_events','Events');
		
	elseif ( $postType == "tribe_events"):
	
		// $output .= clock_p2p_get_related_events('tribe_events_to_tribe_events','Related events');
		// $output .= clock_p2p_get_related_posts('posts_to_tribe_events','Related posts');
		// $output .= clock_p2p_get_related_posts('pages_to_tribe_events','Related pages');
		$output .= clock_p2p_get_related_posts('clock_projects_to_tribe_events','Related projects');
	
	endif;
	
	if ( $output !== '' ) :
		$output = '<div class="related-posts">' . $output . '</div>';
	endif;

	return $output;

}

function clock_p2p_get_related_posts($connectionName, $label) {

	$output = '';

	if ( $connectionName && $label) :

		$connected_posts = p2p_type( $connectionName )->get_connected();

		if ( $connected_posts->have_posts() ) :

			$loop = '';

			while ( $connected_posts->have_posts() ) : $connected_posts->the_post();
				$loop .= '<p><a href="' . get_permalink() . '">' . get_the_title() . '</a></p>';
			endwhile;
	
			if ( $loop !== '' ) :
				$output .= "<div id=\"related-posts-$connectionName\" class=\"related-posts-type\">\n";
				$output .= '<h3>' . $label . '</h3>' . $loop . '</div>';
			endif;
		
		endif;
	
		wp_reset_postdata();

	endif;

	return $output;
	
}


function clock_p2p_get_related_events($connectionName, $label) {

	$output = '';

	if ( $connectionName && $label) :
	
		$connected_posts = p2p_type( $connectionName )->get_connected();
	
		if ( $connected_posts->have_posts() ) :
	
			$loop = '';
	
			while ( $connected_posts->have_posts() ) : $connected_posts->the_post();
	
				$thisid = get_the_id();
				$loop .= '<p><a href="' . get_permalink() . '">' . get_the_title() . '</a>';
				$loop .= '<br />' . spellerberg_return_sp_date( $thisid ) . "</p>\n";

			endwhile;
	
			if ( $loop !== '' ) :
				$output .= "<div id=\"related-posts-$connectionName\" class=\"related-posts-type\">\n";
				$output .= '<h3>' . $label . '</h3>' . $loop . '</div>';
			endif;
		
		endif;
	
		wp_reset_postdata();
	
	endif;

	return $output;
	
}


?>