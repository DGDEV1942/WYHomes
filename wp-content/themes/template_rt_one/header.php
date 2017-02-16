<?php

/* 

* Theme: PREMIUMPRESS CORE FRAMEWORK FILE

* Url: www.premiumpress.com

* Author: Mark Fail

*

* THIS FILE WILL BE UPDATED WITH EVERY UPDATE

* IF YOU WANT TO MODIFY THIS FILE, CREATE A CHILD THEME

*

* http://codex.wordpress.org/Child_Themes

*/

if (!defined('THEME_VERSION')) {	header('HTTP/1.0 403 Forbidden'); exit; }

if (!headers_sent()){ header('X-UA-Compatible: IE=edge'); }

global $CORE, $OBJECTS, $userdata;  ?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<!--[if lte IE 8 ]><html lang="en" class="ie ie8"><![endif]-->
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->

<title>
<?php wp_title('&laquo;', true, 'right'); ?>
<?php bloginfo('name'); ?>
</title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
<script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
 <style>
 .dropdown-menu {
  margin-top: -10px !important;
}
	.top-nav-set{
	float:left;
	width:100%;
}
.top-nav-set .navbar{
	border-radius:0px;
	border-bottom:2px solid #8D3E40;
}

.top-nav-set .navbar-nav > li > a{
	padding-top:10px;
	padding-bottom:10px;
}

.top-nav-set .navbar{
	min-height:40px;
}

.top-nav-set .navbar-inverse .navbar-nav > li > a{
	color:#fff;
}
.dropdown-menu > li.kopie > a {
    padding-left:5px;
}
 
.dropdown-submenu {
    position:relative;
}
.dropdown-submenu>.dropdown-menu {
   top:0;left:100%;
   margin-top:-6px;margin-left:-1px;
   -webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;
 }
  
.dropdown-submenu > a:after {
  border-color: transparent transparent transparent #333;
  border-style: solid;
  border-width: 5px 0 5px 5px;
  content: " ";
  display: block;
  float: right;  
  height: 0;     
  margin-right: -10px;
  margin-top: 5px;
  width: 0;
}
 
.dropdown-submenu:hover>a:after {
    border-left-color:#555;
 }

.dropdown-menu > li > a:hover, .dropdown-menu > .active > a:hover {
  text-decoration: underline;
}  
  
@media (max-width: 767px) {
  .navbar-nav  {
     display: inline;
  }
  .navbar-default .navbar-brand {
    display: inline;
  }
  .navbar-default .navbar-toggle .icon-bar {
    background-color: #fff;
  }
  .navbar-default .navbar-nav .dropdown-menu > li > a {
    color: red;
    background-color: #ccc;
    border-radius: 4px;
    margin-top: 2px;   
  }
   .navbar-default .navbar-nav .open .dropdown-menu > li > a {
     color: #333;
   }
   .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
   .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
     background-color: #ccc;
   }

   .navbar-nav .open .dropdown-menu {
     border-bottom: 0px solid white; 
     border-radius: 0;
   }
  .dropdown-menu {
      padding-left: 10px;
  }
  .dropdown-menu .dropdown-menu {
      padding-left: 20px;
   }
   .dropdown-menu .dropdown-menu .dropdown-menu {
      padding-left: 30px;
   }
   li.dropdown.open {
    border: 0px solid red;
   }
   
   .responsive-set{
	  display:block !important;
  }
  
  .top-nav-set .navbar-inverse .navbar-nav .open .dropdown-menu > li > a{
	  color:#fff;
  }

}
 
@media (min-width: 768px) {
  ul.nav li:hover > ul.dropdown-menu {
    display: block;
  }
  #navbar {
    text-align: center;
  }
 
}  


</style> 
  
  
<style>
.panel-heading {
    color: rgb(144,50,50)!important;
}
select#ls {
    padding: 5px 2px!important;
}
</style>
<?php wp_head(); ?>

<!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->

<script>

jQuery(document).ready(function(){
	jQuery( "li.dropdown-submenu ul" ).addClass( "dropdown-menu responsive-set" );	

	jQuery('li.dropdown-submenu>a').addClass('dropdown-toggle');
	jQuery('li.dropdown-submenu>a').attr('data-toggle','dropdown');
});
</script>

</head>

<body <?php body_class(); ?> <?php echo $CORE->ITEMSCOPE('webpage'); ?>>
<?php
$_SESSION['form_sent'] = 0; 
?>
<?php if ( 'cities' == get_post_type() ) { ?>
<style> .list_results_cities {
    display: none;
}.list_results_cont {    float: right;    width: 100%!important;    height: 700px;    overflow: scroll;	margin-top: 66px!important;}	
</style>
<?php } ?>



<div class="page-wrapper <?php $CORE->CSS("mode"); ?>" id="<?php echo THEME_TAXONOMY; ?>_styles">
<?php hook_wrapper_before(); ?>
<div class="header_wrapper">
  <header id="header">
    <div class="overlay"> <?php echo hook_topmenu(_design_topmenu()).hook_header(_design_header()).hook_menu(_design_menu(),1); ?>
	
	
      <?php hook_container_before(); ?>
    </div>
    <div class="container s_icon">
      <div id="banner"> <a href="http://www.facebook.com/pages/WY-HOMES-Properties/108888812478933" target="_blank"> <img src="<?php echo site_url(); ?>/wp-content/themes/template_rt_one/img/fb.png" width="19" height="19" alt="facebook"></a> <a href="http://twitter.com/WYHOMES" target="_blank"> <img src="<?php echo site_url(); ?>/wp-content/themes/template_rt_one/img/twitter.png" width="19" height="19" alt="twitter"></a> <a href="" target="_blank"> <img src="<?php echo site_url(); ?>/wp-content/themes/template_rt_one/img/rss.png" width="19" height="19" alt="rss"></a> </div>
      <div id="loginmenu">
        <div class="960">
          <ul class="submenu_account">
            <li><a href="<?php echo site_url(); ?>/wp-login.php" rel="nofollow">Login</a> | <a href="<?php echo site_url(); ?>/wp-login.php?action=register" rel="nofollow">Register</a></li>
          </ul>
        </div>
        <!-- end w_960 --> 
      </div>
    </div>
    <div class="home_banner container magicbox1">
    <div class="home_bnr_hd">
      <div class="bnr_hd">
        <h3>Search Wyoming Homes</h3>
        <h2>& PROPERTIES</h2>
      </div>
      <div class="bnr_listing"><a href="http://tpr.cm/j47"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2016/06/get_new_listings-2.png" alt=""/></a></div>
    </div>
    <div class="home_search">
      <div class="search-tab">
        <ul>
          <li class="first_li s-from liactive" form-data="sale-form">for sale</li>
          <li class="third_li s-from" form-data="view_DM">view digital magazine</li>
          <li class="four_li s-from" form-data="resource-dir">resource directory</li>
        </ul>
      </div>
      <div class="search-form-section">
        <div class="sale-form u-form factive"> <!-- begin search form -->
          <style type="text/css">
          .search-form-section .idx_new_form .search_form_wrap select { width: 200px; }
          .search_form_box_half { float: left; width: 50%; margin: 5px 0; }
          .search_form_wrap { overflow: hidden; }
          .search-form-section .idx_new_form .search_form_wrap input[type="text"] {
            background: #fff;
            border-radius: 0 !important;
            border: 1px solid #888;
            margin: 0;
            width: 130px;
            height: 25px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            padding: 0 10px !important;
            font-weight: normal;
            font-size: 12px;
            color: #000;
          }
          .search_form_box_half label { width: 100px; }
          .search-form-section .idx_new_form .search_form_wrap .search_form_box input[type="text"] {
            width: 259px;
            color: #000;
            font-weight: normal;
            padding: 0 10px !important;
            font-size: 12px;
          }

          .search_form_box { float: left; margin-top: 7px; }

          .search-form-section .idx_new_form .search_form_wrap .search_form_box input[type="submit"] {
              margin: 0 0 0 20px;
              height: 30px;
              padding: 0 !important;
              width: 110px;
            }


            @media only screen and (max-width: 767px) { 
              .search-form-section .idx_new_form .search_form_wrap select { width: 92%; }
              .search-form-section .idx_new_form .search_form_wrap .search_form_box input[type="text"] {  width: 140px; }
             }


          </style>
		  
		  
		  <script>
			function myFunction() 
			{				
				var sr_vendor = document.getElementById("sr_vendor").value;	
				
				var sr_keywords = document.getElementById("sr_keywords").value;
					
				if( sr_keywords == 'Riverton' || sr_keywords == 'Lander' || sr_keywords == 'Dubois' ||sr_keywords == 'Thermopolis')
				{
				document.getElementById("sr_vendor").value='wyomls';	
				
				jQuery('#sr_keyword2').attr('name', 'xyz');									
				}
				else
				{	
					if(sr_keywords == 'Cheyenne' || sr_keywords == 'Laramie' || sr_keywords == 'Rock Springs' || sr_keywords == 'Green River')
					{
					document.getElementById("sr_vendor").value='clsc';						
						
					jQuery('#sr_keyword2').attr('name', 'xyz');					
					}
				}				
				
			}
			</script>
            <div class="idx_new_form">
              <form id="home_search_form" class="home_search_form" method="get" action="<?php echo $home_url; ?>">
                <input type="hidden" name="sr-listings" value="sr-search">
                <div class="search_form_wrap">
                  <div class="search_form_box_half">
                    <select name="sr_vendor"  id="sr_vendor" style="display:none;">
                      <option value="wyomls">--Select MLS--</option>
                      <option value="wyomls">Wyoming Properties</option>
                      <option value="clsc">Cheyenne Properties</option>
                    </select>
					
					<select name="sr_keywords" id="sr_keywords" onchange="myFunction()">
                      <option value="wyomls">--Select City--</option>
                      <option value="Casper">Casper</option>
                      <option value="Cheyenne">Cheyenne</option>
					  <option value="Dubois">Dubois</option>
                      <option value="Douglas">Douglas</option>
					  <option value="Green River">Green River</option>		  

					  <option value="Lander">Lander</option>
                      <option value="Laramie">Laramie</option>
					  <option value="Rawlins">Rawlins</option>
                      <option value="Riverton">Riverton</option>
					  <option value="Rock Springs">Rock Springs</option>
					    
					  <option value="Shoshoni">Shoshoni</option>
                      <option value="Thermopolis">Thermopolis</option>
					  <option value="Torrington">Torrington</option>
                      <option value="Wheatland">Wheatland</option>
					  <option value="Worland">Worland</option>
					  
                    </select>
					
					
                  </div>
                  <div class="search_form_box_half">
                    <select name="sr_ptype">
                      <option value="">--Property Type--</option>
                      <option value="Residential">Residential</option>
                      <option value="Condominium">Condominium</option>
                      <option value="Rental">Rental</option>
                      <option value="Townhome">Townhome</option>
                    </select>
                  </div>
                  <div class="search_form_box_half">
                    <label>Min Price</label><input type="text" name="sr_minprice" />
                  </div>
                  <div class="search_form_box_half">
                    <label>Max Price</label><input type="text" name="sr_maxprice" />
                  </div>
                  <div class="search_form_box_half">
                    <label>Min Bedrooms</label><input type="text" name="sr_minbeds" />
                  </div>
                  <div class="search_form_box_half">
                    <label>Min Baths</label><input type="text" name="sr_minbaths" />
                  </div>
                  <div class="search_form_box" >
                   <input type="text" id="sr_keyword2" name="sr_keywords" placeholder="City, Subdivision or Zipcode" />
                  </div>
                  <div class="search_form_box">
                    <input type="submit" value="Search" />
                  </div>
                </div><!-- end search_form_wrap -->
              </form>
            </div>
        </div>

        <div class="view_DM pro u-form"> 
        <div class="view_dm_l"><?php dynamic_sidebar( 'MagazineL' ); ?></div>
        <div class="view_dm_r"><?php dynamic_sidebar( 'MagazineR' ); ?></div>
        </div>
        <div class="resource-dir u-form clearfix">
          <div class="resource-dir-left">
            <?php echo WP_Widget_Directory_Search::create_form_html( 'header-directory-searchform' ); ?>
          </div>
          <div class="resource-dir-right">
            <strong>Choose from:</strong>
            <ul>
              <li>Mortages</li>
              <li>Insurance</li>
              <li>Appraisers</li>
              <li>Window &amp; Flooring</li>
              <li>Plumbing &amp; Electric</li>
              <li>Roofing &amp; Siding</li>
              <li><strong>&hellip;and many more!</strong></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div id="hdr_custm" class="clearfix magicbox2"> <img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/template_rt_one/img/get_new_listings.png" alt=""/>
      <h3>Wyoming Homes</h3>
      <h2>Resources</h2>
    </div>
  </header>
  <?php hook_header_after(); ?>
</div>
<div id="core_padding">
<?php hook_breadcrumbs_before(); ?>
<?php echo hook_breadcrumbs(_design_breadcrumbs()); ?>
<?php hook_breadcrumbs_after(); ?>
<div class="<?php $CORE->CSS("2columns"); ?> core_section_top_container">
<?php echo $CORE->BANNER('full_top'); ?>
<div class="row core_section_top_row <?php $CORE->CSS("colnum"); ?>">
<?php hook_core_columns_wrapper_inside(); ?>
<div id="core_inner_wrap" class="clearfix">
<?php if(!isset($GLOBALS['flag-custom-homepage'])): ?>
<?php hook_core_columns_wrapper_inside_inside(); ?>
<?php if(!isset($GLOBALS['nosidebar-left'])): ?>
<?php get_template_part( 'sidebar', 'left' ); ?>
<?php endif; ?>

<?php if( is_tax('offices') ) 
{
echo '<article id="core_middle_column">
<style>
aside#core_right_column {
    display: none;
}
</style>'; 
}
elseif( is_tax('Area'))
{ 
echo '<article id="core_middle_column">
<style>
aside#core_right_column {
    display: none;
}
</style>'; 
}
else
{
?>

<?php print_r(); ?>	
<article class="<?php $CORE->CSS("columns-middle"); ?>" id="core_middle_column">		
<?php 
}	
?>

<div class="core_middle_wrap">
<?php echo $CORE->ERRORCLASS(); ?>
<div id="core_ajax_callback"></div>
<?php echo $CORE->BANNER('middle_top'); ?>
<?php hook_core_columns_wrapper_middle_inside();  ?>
<?php endif; ?>
<script> 
jQuery(document).ready(function(){
	
	jQuery(".s-from").hover(function(){ 		
	 jQuery('.s-from').removeClass("liactive");
	 jQuery(this).addClass("liactive");			
	 var cls = jQuery(this).attr('form-data');	
	 jQuery('.u-form').removeClass("factive");
	 jQuery('.'+cls).addClass("factive");
	});
});
</script> 