<?php

//define('WLT_REALTOR', true);
 
// GOOGLE FONTS
function load_fonts() {
	if(!defined('WLT_CHILDTHEME')){
	wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Roboto:400,700');
	wp_enqueue_style( 'googleFonts');
	}
}    
add_action('wp_print_styles', 'load_fonts');

?>