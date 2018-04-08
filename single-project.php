<?php

$context = $context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$term = wp_get_post_terms( $post->id, 'projects' );
$context['term'] = new TimberTerm($term[0], 'projects');
$termMenu = get_field('project_menu', $term[0]);
if ($termMenu) {
	$context['termMenu'] = new TimberMenu($termMenu->slug);
}

$today = date("Y-m-d h:i:s A");
$oneMonth = date('Y-m-d h:i:s A', strtotime("next month"));

$args = array(
	'posts_per_page' => 3,
    'order' => 'ASC',
    'orderby' => 'meta_value',
    'meta_key' => '_EventStartDate',
    'post_type' => 'events',
	'post_status' => 'publish',
	'tax_query' => array(
		array(
			'taxonomy' => 'projects',
			'field' => 'id',
			'terms' => $term[0]->term_id
		)
	),
    'meta_query' => array(
        array(
            'key' => '_EventStartDate',
            'value' => $today,
            'compare' => '>='
        ),
    ),
);
$events = Timber::get_posts( $args );
$context['events'] = $events;

$args = array(
	'posts_per_page'   => -1,
    'order' => 'DESC',
    'orderby' => 'meta_value',
    'meta_key' => '_EventStartDate',
    'post_type' => 'events',
	'post_status' => 'publish',
	'tax_query' => array(
		array(
			'taxonomy' => 'projects',
			'field' => 'id',
			'terms' => $term[0]->term_id
		)
	),
    'meta_query' => array(
        array(
            'key' => '_EventStartDate',
            'value' => $today,
            'compare' => '<'
        )
    ),
);
$pastEvents = Timber::get_posts( $args );
$context['pastEvents'] = $pastEvents;

// Media Embeds
if( have_rows( 'project_page_content' ) ) {
    while ( have_rows('project_page_content') ) : the_row();
        if( get_row_layout() == 'media' ):
			if( get_query_var('page') ) {
				$page = get_query_var( 'page' );
			} else {
				$page = 1;
			}
			$row = 0;
			$items_per_page = 5;
			$items = get_sub_field( 'media_files' );
			$total = count( $items );
			$pages = ceil( $total / $items_per_page );
			$min = ( ( $page * $items_per_page ) - $items_per_page ) + 1;
			$max = ( $min + $items_per_page ) - 1;
			$posts = array();
			if( have_rows( 'media_files' ) ) :
				while( have_rows( 'media_files' ) ): the_row();
					$row++;
					if($row < $min) { continue; }
					if($row > $max) { break; }
					$item = array();
					array_push($item, get_sub_field('media_file_title'));
					array_push($item, get_sub_field('media_file_date'));
					array_push($item, get_sub_field('media_video_embed'));
					array_push($item, get_sub_field('media_audio_embed'));
					array_push($posts, $item);
				endwhile;
				$pagination = paginate_links( array(
					'prev_text' => '<',
					'next_text' => '>',
					'base' => get_permalink() . '%#%' . '/',
					'format' => '?page=%#%',
					'current' => $page,
					'total' => $pages,
					'type' => 'list',
				) );
			endif;
			$context['media_embeds'] = $posts;
			$context['media_pagination'] = $pagination;
		endif;
	endwhile;
}

if( have_rows( 'project_page_content' ) ) {
    while ( have_rows('project_page_content') ) : the_row();
		if( get_row_layout() == 'podcast' ):
			if( get_query_var('page') ) {
				$page = get_query_var( 'page' );
			} else {
				$page = 1;
			}
			$row = 0;
			$items_per_page = 5;
			$items = get_sub_field( 'podcast_episodes' );
			$total = count( $items );
			$pages = ceil( $total / $items_per_page );
			$min = ( ( $page * $items_per_page ) - $items_per_page ) + 1;
			$max = ( $min + $items_per_page ) - 1;
			$posts = array();
			if( have_rows( 'podcast_episodes' ) ) :
				while( have_rows( 'podcast_episodes' ) ): the_row();
					$row++;
					if($row < $min) { continue; }
					if($row > $max) { break; }
					$item = array();
					array_push($item, get_sub_field('podcast_episode'));
					array_push($item, get_sub_field('podcast_episode_title'));
					array_push($item, get_sub_field('podcast_episode_date'));
					array_push($item, get_sub_field('podcast_episode_length'));
					array_push($item, get_sub_field('podcast_episode_description'));
					array_push($item, get_sub_field('podcast_episode_embed'));
					array_push($posts, $item);
				endwhile;
				$pagination = paginate_links( array(
					'prev_text' => '<',
					'next_text' => '>',
					'base' => get_permalink() . '%#%' . '/',
					'format' => '?page=%#%',
					'current' => $page,
					'total' => $pages,
					'type' => 'list',
				) );
			endif;
			$context['podcast_episodes'] = $posts;
			$context['podcast_pagination'] = $pagination;
		endif;
	endwhile;
}

Timber::render( 'views/project.twig', $context );

?>