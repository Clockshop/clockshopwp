<?php

add_filter('timber_context', 'add_to_context');
function add_to_context($data){
	$data['menu'] = new TimberMenu(); // This is where you can also send a WordPress menu slug or ID
	$data['signup_form'] = do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]');
	return $data;
}

?>