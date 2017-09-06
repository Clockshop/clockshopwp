<?php

// Image linking in content is lame
update_option('image_default_link_type','none');

// Featured Images

add_theme_support( 'post-thumbnails' );

// http://speakinginbytes.com/2012/11/responsive-images-in-wordpress/
// https://gist.github.com/stuntbox/4557917
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
add_filter( 'category_description', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {

	if (preg_match_all('/<img[^>]+>/ims', $html, $matches)) {
		foreach ($matches as $match) {
			$clean = preg_replace('/(width|height)=["\'\d%\s]+/ims', "", $match); // Replace all occurences of width/height
			$html = str_replace($match, $clean, $html); // Replace with result within html
//			error_log($match);
		}
	}

	return $html;
}
