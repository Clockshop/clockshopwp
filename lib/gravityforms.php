<?php 

// Gravity Forms anchor - disable auto scrolling of forms
add_filter("gform_confirmation_anchor", create_function("","return false;"));

?>