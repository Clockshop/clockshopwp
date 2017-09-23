<?php

add_filter('timber_context', 'add_to_context');
function add_to_context($data){
	$data['menu'] = new TimberMenu('primary');
	$data['signup_form'] = do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]');
    $data['options'] = get_fields('options');
	return $data;
}

?>