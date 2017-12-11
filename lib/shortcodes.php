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

?>