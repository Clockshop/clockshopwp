<?php

function slider_func() {

	$output = '<div class="project-slider">';
	foreach( get_field("project_image_slider") as $item ):
		$output .= '<div class="project-slide">';
		$output .= '<img src="' . $item['sizes']['slider'] . '" />';
		if ($item['caption']) {
			$output .= '<div class="caption caption-left">';
			$output .= $item['caption'];
			$output .= '</div>';
		}
		if ($item['description']) {
			$output .= '<div class="caption caption-right">';
			$output .= $item['description'];
			$output .= '</div>';
		}
		$output .= '</div>';
	endforeach;
	$output .= '</div>';
    
    return $output;
}
add_shortcode( 'slider', 'slider_func' );

function video_func( $atts ) {
    $a = shortcode_atts( array(
        'id' => '',
		'source' => 'vimeo',
		'poster' => '',
    ), $atts );

	if ($a['source'] == 'vimeo') {
		$output = '<div class="video-container"><div class="poster" style="background-image: url(' . $a['poster'] . ');"></div><iframe src="https://player.vimeo.com/video/' . $a['id'] . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
		$output .= '<script src="https://player.vimeo.com/api/player.js"></script>';
		$output .= '<script>';
		$output .= 'var iframe = document.querySelector("iframe");';
		$output .= 'var player = new Vimeo.Player(iframe);';
		$output .= '</script>';
		return $output;
	}
}
add_shortcode( 'video_embed', 'video_func' );

?>