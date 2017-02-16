<?php

// TELL THE CORE THIS IS A CHILD THEME
define('WLT_CHILDTHEME',true);

// TURN OFF DEFAULT PRICE SEARCH
define('DEFAULTS_ADMIN_COLOR_PRESETS',false);

// TURN ON HOME PAGE EDITOR OPTIONS
define('ALLOW_HOMEPAGE_EDIT',true);

// GOOGLE FONTS
function load_fonts() {
	if(!defined('WLT_CHILDTHEME')){
	wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans');
	wp_enqueue_style( 'googleFonts');
	}
}    
add_action('wp_print_styles', 'load_fonts');

// CHILD THEME ACTIVATION
function childtheme_designchanges(){
	
	// LOAD IN CORE STYLES AND UNSET THE LAYOUT ONES SO OUR CHILD THEME DEFAULT OPTIONS CAN WORK
	$core_admin_values = get_option("core_admin_values"); 
		
	// SET LOGO
	//$core_admin_values['logo_url'] = CHILD_THEME_PATH_IMG."logo.png";	
	$core_admin_values['logo_icon'] 	= 0;
	$core_admin_values['logo_text1'] 	= "Realtor Theme";
	$core_admin_values['logo_text2'] 	= "Responsive Real Estate Theme";
		
	// FULL PAGE LAYOUT
	$core_admin_values['layout_layoutwidth'] = 1;
	$core_admin_values['layout_contentwidth'] = 0;
	
	// SET HEADER
	$core_admin_values['layout_menu'] = 1;
	$core_admin_values['layout_header'] = 2;
	
	// BREADCRUMBS
	$core_admin_values['breadcrumbs_inner'] = 1;
	$core_admin_values['header_accountdetails'] = 0;
	
	// WELCOME TEXT
	$core_admin_values['header_welcometext'] = '<i class="fa fa-phone-square"></i> Call Now: 123-123-123  &nbsp;&nbsp;  <i class="fa fa-skype"></i> Skype &nbsp;&nbsp; <i class="fa fa-facebook-official"></i> facebook';
	
	// EXTRA DEMO CONTENT
	$core_admin_values['hdata'] = array(
	 
	"t1" => array("title1" => "Real Estate Website", "title2" => "Over 10,000 real estate listings for you to enjoy!"  ),
	"t2" => array("title1" => "Big Discounts Online Now!", "title2" => "You can customize this area and enter your own title text via the admin area of the theme."  ),
	);
	
	// SAMPLE DATA
	$core_admin_values['sampledata'] = array(
		
			"1" => array("t" => CHILD_THEME_PATH_IMG."p/1.jpg", "f" => CHILD_THEME_PATH_IMG."p/1.jpg"),
			"2" => array("t" => CHILD_THEME_PATH_IMG."p/2.jpg", "f" => CHILD_THEME_PATH_IMG."p/2.jpg"),
			"3" => array("t" => CHILD_THEME_PATH_IMG."p/3.jpg", "f" => CHILD_THEME_PATH_IMG."p/3.jpg"),
			"4" => array("t" => CHILD_THEME_PATH_IMG."p/4.jpg", "f" => CHILD_THEME_PATH_IMG."p/4.jpg"),
			"5" => array("t" => CHILD_THEME_PATH_IMG."p/5.jpg", "f" => CHILD_THEME_PATH_IMG."p/5.jpg"),
			"6" => array("t" => CHILD_THEME_PATH_IMG."p/6.jpg", "f" => CHILD_THEME_PATH_IMG."p/6.jpg"),
			"7" => array("t" => CHILD_THEME_PATH_IMG."p/7.jpg", "f" => CHILD_THEME_PATH_IMG."p/7.jpg"),
			"8" => array("t" => CHILD_THEME_PATH_IMG."p/8.jpg", "f" => CHILD_THEME_PATH_IMG."p/8.jpg"),
			"9" => array("t" => CHILD_THEME_PATH_IMG."p/9.jpg", "f" => CHILD_THEME_PATH_IMG."p/9.jpg"),
			"10" => array("t" => CHILD_THEME_PATH_IMG."p/10.jpg", "f" => CHILD_THEME_PATH_IMG."p/10.jpg"),
			"11" => array("t" => CHILD_THEME_PATH_IMG."p/11.jpg", "f" => CHILD_THEME_PATH_IMG."p/11.jpg"),
			"12" => array("t" => CHILD_THEME_PATH_IMG."p/12.jpg", "f" => CHILD_THEME_PATH_IMG."p/12.jpg"),
			"13" => array("t" => CHILD_THEME_PATH_IMG."p/13.jpg", "f" => CHILD_THEME_PATH_IMG."p/13.jpg"),
			"14" => array("t" => CHILD_THEME_PATH_IMG."p/14.jpg", "f" => CHILD_THEME_PATH_IMG."p/14.jpg"),
			"15" => array("t" => CHILD_THEME_PATH_IMG."p/15.jpg", "f" => CHILD_THEME_PATH_IMG."p/15.jpg"),
			"16" => array("t" => CHILD_THEME_PATH_IMG."p/16.jpg", "f" => CHILD_THEME_PATH_IMG."p/16.jpg"),		
		
		);
 
	// RETURN VALUES
	return $core_admin_values;
}
// FUNCTION EXECUTED WHEN THE THEME IS CHANGED
function _after_switch_theme(){
	// GET DESIGN FROM FUNCTION
	$core_admin_values = childtheme_designchanges();
	// SAVE VALUES
	//update_option('core_admin_values',$core_admin_values);
		
}
add_action('after_switch_theme','_after_switch_theme');
// DEMO MODE
if(defined('WLT_DEMOMODE')){
$GLOBALS['CORE_THEME'] = childtheme_designchanges();
}
?>