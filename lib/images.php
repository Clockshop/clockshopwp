<?php

add_image_size('grid-3', 1434, 956, true);
add_image_size('list', 424, 272, true);
add_image_size('slider', 1900, 1267, true);
add_image_size('project_slider', 1900, 1267, false);

function image_crop_dimensions($default, $orig_w, $orig_h, $new_w, $new_h, $crop){
    if ( !$crop ) return null; // let the wordpress default function handle this

    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);

    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );

    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter('image_resize_dimensions', 'image_crop_dimensions', 10, 6);

function catch_first_image($id) {
	$post = get_post($id);
	$meta = get_post_meta($post->ID);
	$first_img = '';
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	if(isset($matches[1][0])) {
		return $matches[1][0] . '?content';
	} else {
		/*
		foreach($meta as $key=>$value){
			if ((strpos($key, 'image') !== false) && (substr($key, 0, 1) !== '_')) {
				//return json_encode($key) . ': ' . json_encode($value);
				$first_img = wp_get_attachment_image_src( $value[0], 'list' );
				return $first_img[0] . '?field';
			}
		}
		*/
		return '';
	}
}

?>