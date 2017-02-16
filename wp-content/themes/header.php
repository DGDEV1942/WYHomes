<?php
/* =============================================================================

   THIS FILE SHOULD NOT BE EDITED // UPDATED: 16TH MARCH 2012

   ========================================================================== */
global $PPT, $PPTDesign, $ThemeDesign, $pagenow, $userdata; get_currentuserinfo();

 

/* =============================================================================

   MAINTENANCE MODE // V7 // 16TH MARCH

   ========================================================================== */

 

if(get_option('maintenance_mode') == "yes" && ( !isset($_GET['redirect_to']) && $pagenow !="wp-login.php") ){ $msg = nl2br(stripslashes(get_option("maintenance_mode_message"))); if(strlen($msg)  < 1){ $msg ="Maintenance Mode On"; } die($msg);	}  



/* =============================================================================

   INITIALIZE PAGE ACTIONS AND GLOBALS // V7 // 16TH MARCH

   ========================================================================== */



premiumpress_action();



/* =============================================================================

   LOAD IN PAGE CONTENT // V7 // 16TH MARCH

   ========================================================================== */

   

$hookContent = premiumpress_pagecontent("header"); /* HOOK V7 */



if(strlen($hookContent) > 20 ){ // HOOK DISPLAYS CONTENT



	get_header();

	

	echo $hookContent;

	

	get_footer();

	

}elseif(file_exists(str_replace("functions/","",THEME_PATH)."/themes/".$GLOBALS['premiumpress']['theme']."/_header.php")){

		

	include(str_replace("functions/","",THEME_PATH)."/themes/".$GLOBALS['premiumpress']['theme'].'/_header.php');



}elseif(file_exists(str_replace("functions/","",THEME_PATH)."/template_".strtolower(PREMIUMPRESS_SYSTEM)."/_header.php")){

		

	include(str_replace("functions/","",THEME_PATH)."/template_".strtolower(PREMIUMPRESS_SYSTEM)."/_header.php");

		

}else{



/* =============================================================================

   LOAD IN PAGE DEFAULT DISPLAY // UPDATED: 25TH MARCH 2012

   ========================================================================== */ 

 

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<!--[if lte IE 8 ]>    <html lang="en" class="ie ie8"> <![endif]-->

<!--[if IE 9 ]>    <html lang="en" class="ie"> <![endif]-->

<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />



<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title> 

<?php wp_head(); ?>

<link rel='stylesheet' id='PPT4-css'  href='http://<?php echo $_SERVER['HTTP_HOST']; ?>/wp-includes/added/css/ddtabmenu.css' type='text/css' media='all' />

<link rel='stylesheet' id='PPT4-css'  href='http://<?php echo $_SERVER['HTTP_HOST']; ?>/wp-includes/added/css/splitmenubuttons.css' type='text/css' media='all' />

<script type='text/javascript' src='http://<?php echo $_SERVER['HTTP_HOST']; ?>/wp-includes/added/js/ddtabmenu.js'></script>

<script type='text/javascript' src='http://<?php echo $_SERVER['HTTP_HOST']; ?>/wp-includes/added/js/ddaccordion.js'></script>

<script type='text/javascript' src='http://<?php echo $_SERVER['HTTP_HOST']; ?>/wp-includes/added/js/ad_action.js'></script>

<script type='text/javascript' src='http://<?php echo $_SERVER['HTTP_HOST']; ?>/wp-includes/added/js/splitmenubuttons.js'></script>

<style type="text/css">

	#qsearchbox{

		 position: relative; width: 500px; height: 200px; margin-top: 116px; left: 25px; 

		 background-image:url(http://<?php echo $_SERVER['HTTP_HOST']; ?>/files/2012/10/searchbox-bgrnd.png)

	}	

	

	@media screen and (-webkit-min-device-pixel-ratio:0){

		#qsearchbox{ margin-top: 130px; }

	}

</style>

<?php



	if(trim(strchr(str_replace('/','',_match_request_uri($_SERVER["REQUEST_URI"])),'login-page')) != ''){

		echo '<script type="text/javascript">

					jQuery(function(){ // on document load

						jQuery(\'a[data-showmenu]\').splitmenubuttonMenu() // Add split button menu to links with "data-showmenu" attr

						resizeframes();

						jQuery(\'#adcontent\').bind("contextmenu",function(e){ return false; });



					});

					</script>';
	}
?>
<!--[if lt IE 9]>

	    	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>

	    	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

	<![endif]-->

<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>

<link rel="shortcut icon" href="http://www.wyhomesmag.com/favicon.ico">



</head> 

 <?php function _bit_menu_inside(){ /* MENU BAR */

				

				global $wpdb,$PPT; $string='';

            

            	$string .= '<div class="menu"> <div class="960">';

                

				if(has_nav_menu('PPT-CUSTOM-MENU-PAGES')){ $string .= wp_nav_menu( $GLOBALS['blog_custom_menu'] ); }else{ 

                

                $string .= '<ul id="menubar"> 

                                    

                    <li class="first"><a href="'.$GLOBALS['bloginfo_url'].'/" title="'.get_bloginfo('name').'">'.$PPT->_e(array('head','1')).'</a></li> 

                    '.premiumpress_pagelist().'                    

                    </ul>';                    

                    

                }

                 

             	$string .= '</div><!-- end  menubar w_960 --> </div><!-- end menubar -->';

				

				return $string;

				

				}				

		?>



<?php if (is_front_page()) { 



echo "<body style='background-image:url(http://wyhomesmag.com/wp-content/themes/realtorpress/images/main-bg.png); background-repeat:repeat-x;'>";







 

} else {

 echo "<body style='background-image:url(http://wyhomesmag.com/wp-content/themes/realtorpress/images/main-bg-inner.png); background-repeat:repeat-x;'>";

}







?>

 









    

 

 

 

   

        

        

        

<?php premiumpress_top(); /* HOOK */ ?>



	<div class="wrapper <?php $PPTDesign->CSS("ppt_layout_width"); ?>">

    

    

    



    

    

    

    

    

    

    

    	<?php premiumpress_header_before(); /* HOOK */ ?>

	

		<div id="header" class="full">        	

        	

           <?php function _bit_header_inside(){ /* HEADER WITH LOGO + BANNER */

		   

		    global $wpdb,$PPT;  

           

           	return '<div class="960">

        

            

           <img src="http://wyhomesmag.com/wp-content/themes/realtorpress/images/logo.png" style="margin-top:12px;"  />

            

        



           

        </div> 

		

		<!-- end header w_960 -->'; 

        

         } ?>



                 

                 

                 

            <div id="banner"> 

			

	<a href="http://www.facebook.com/pages/WY-HOMES-Properties/108888812478933">	<img src="http://wyhomesmag.com/wp-content/themes/realtorpress/images/fb.png" width="19" height="19" alt="facebook" /></a>

		

		

			 <a href="http://twitter.com/WYHOMES">  <img src="http://wyhomesmag.com/wp-content/themes/realtorpress/images/twitter.png" width="19" height="19" alt="twitter" /></a>

				<a href="">  

				 <img src="http://wyhomesmag.com/wp-content/themes/realtorpress/images/rss.png" width="19" height="19" alt="rss" /></a>

				 

				 

           	<?php '.premiumpress_banner("top",true).' ?>

             

            </div>

         <div id="loginmenu">

        

        	<?php function _bit_submenu_inside(){ /*SUB MENU BAR */

			

			global $wpdb,$PPT, $userdata; get_currentuserinfo(); $string='';  

        

        	$string .= '<div class="960">';

            

          

             

            $string .= '<ul class="submenu_account">';

                       

            if ( $userdata->ID ){ 

			

				$string .= '<li><a href="'.wp_logout_url().'">'.$PPT->_e(array('head','4')).'</a></li>

				<li><a href="'.$GLOBALS['premiumpress']['dashboard_url'].'">'.$PPT->_e(array('head','5')).'</a></li>

				<li><b>'.$userdata->user_login.'</b></li>';

			

            }else{

            

            	$string .= '<li><a href="'.$GLOBALS['bloginfo_url'].'/wp-login.php" rel="nofollow">'. $PPT->_e(array('head','6')).'</a> |  

				<a href="'.$GLOBALS['bloginfo_url'].'/wp-login.php?action=register" rel="nofollow">'.$PPT->_e(array('head','7')).'</a></li>';

			

            }

             

            $string .= '</ul> ';      

        

        	$string .= '</div> <!-- end w_960 -->';

			

			return $string;

            

            } ?>

            

            <?php echo premiumpress_submenu_inside(_bit_submenu_inside()); /* HOOK / FILTER */  ?>

            

</div> 

         

         

        

        <?php echo premiumpress_header_inside(_bit_header_inside()); /* HOOK  / FILTER  */ ?>             

        

        <div class="clearfix"></div>

        

        </div> <!-- end header -->

        

        <?php premiumpress_header_after(); /* HOOK */ ?> 

        

        <?php premiumpress_menu_before(); /* HOOK */ ?>

 

     

        



             

             

             

             

      

       <br style="clear:both" />  

      

          <?php echo premiumpress_menu_inside(_bit_menu_inside()); /* HOOK / FILTER */ ?> 

     

        

        

        <?php echo premiumpress_menu_after(); /* HOOK */ ?>   

        

        

        

  

                        

<?php if (is_front_page()) { ?>

 	

    <?php include(SPECIALCASEDIR . 'quick-search.php'); ?>

      

        

<img src="http://wyhomesmag.com/wp-content/themes/realtorpress/images/search-properties-box-orig.png" width="945" height="343" style="padding-top:5px; clear:both; "/> 

         

       <br />

        <div id="button_notif" onclick="javascript:window.location.href='<?php echo $GLOBALS['bloginfo_url']; ?>/signup/';return true;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

       

<?php } else { ?>

       

<?php if (is_page( array( 166, 'login-page', 'agent-signup' ,'registration-form') ) ) { ?>

        <a href="http://wyhomesmag.com/ebook-download/"><img src="http://wyhomesmag.com/wp-content/themes/realtorpress/images/agent-properties-box.png" width="945" height="343" style="padding-top:5px; clear:both; "/></a> 





     

<?php 



	} else { 

			

			if(trim(strchr(SPECIALCASEPAGES,str_replace('/','',_match_request_uri($_SERVER["REQUEST_URI"])))) != ''){

					

					if(trim(strchr(str_replace('/','',_match_request_uri($_SERVER["REQUEST_URI"])),'search-result-listings')) != ''){

							if(trim(strchr($_SERVER["REQUEST_URI"],'yrblt1')) == '' && trim(strchr($_SERVER["REQUEST_URI"],'mlsaddf')) == ''){

								include(SPECIALCASEDIR . 'quick-search.php');

								echo '<img src="http://'.$_SERVER['HTTP_HOST'].'/files/2012/10/search_bg.png" width="945" height="343" style="padding-top:5px; clear:both; "/> <br />';

							} else {

								

								echo '<img src="http://wyhomesmag.com/wp-content/themes/realtorpress/images/subpage-header.png" /> ';

								

							}

                                                        echo '<div id="button_notif" onclick="javascript:window.location.href=\''. $GLOBALS['bloginfo_url']. '/signup/\';return true;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>';      

					} else if(trim(strchr(str_replace('/','',_match_request_uri($_SERVER["REQUEST_URI"])),'search-result-map-view')) != ''){

							if(trim(strchr($_SERVER["REQUEST_URI"],'yrblt1')) == '' && trim(strchr($_SERVER["REQUEST_URI"],'mlsaddf')) == ''){

								include(SPECIALCASEDIR . 'quick-search.php');

								echo '<img src="http://'.$_SERVER['HTTP_HOST'].'/files/2012/10/search_bg.png" width="945" height="343" style="padding-top:5px; clear:both; "/> <br />';

							} else {

								

								echo '<img src="http://wyhomesmag.com/wp-content/themes/realtorpress/images/subpage-header.png" /> ';

								

							}

                                                        echo '<div id="button_notif" onclick="javascript:window.location.href=\''. $GLOBALS['bloginfo_url']. '/signup/\';return true;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>';      

		   } else { 

				

				echo '<img src="http://wyhomesmag.com/wp-content/themes/realtorpress/images/subpage-header.png" /> ';

			        echo '<div id="button_notif" onclick="javascript:window.location.href=\''. $GLOBALS['bloginfo_url']. '/signup/\';return true;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>';      

		} } else { ?>

        	<img src="http://wyhomesmag.com/wp-content/themes/realtorpress/images/subpage-header.png" /> 

                <div id="button_notif" onclick="javascript:window.location.href='<?php echo $GLOBALS['bloginfo_url']; ?>/signup/';return true;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

   <?php } } ?>      

     <?php } ?>             

         

       <br />

       

     

     

     

<?php if (is_front_page()) { ?>



<?php require_once('inc/homepage-widget-inc.php'); ?>



<?php } ?>

       

       

                    

           

        <?php if(isset($GLOBALS['ppt_layout_styles']['submenubar']) && isset($GLOBALS['ppt_layout_styles']['submenubar']['hide']) && $GLOBALS['ppt_layout_styles']['submenubar']['hide'] == 1){ ?>

        

        <?php }else{ ?>

        

        <?php premiumpress_submenu_before(); /* HOOK */ ?>

        

    <!-- end submenubar -->

       

       <?php premiumpress_submenu_after(); /* HOOK */ ?>

     

     	<?php } ?>

        

 

 		<?php premiumpress_page_before(); ?>

        

		<div id="page" class="clearfix full">

        

        <div class="w_960">

        

        <?php $PPTDesign->AdvancedSearchBox(); ?> 

  

		<?php if(get_option("PPT_slider") =="s1"  && is_home() && !isset($_GET['s']) && !isset($_GET['search-class']) ){ echo $PPTDesign->SLIDER(); } ?>

        

        <?php premiumpress_content_before(); ?> 

       

        <div id="content" <?php $PPTDesign->CSS("padding"); ?>>       	

			

			<?php

    			

				if(trim(strchr(SPECIALCASEPAGES,str_replace('/','',_match_request_uri($_SERVER["REQUEST_URI"])))) == ''){

				 

                if(file_exists(str_replace("functions/","",THEME_PATH)."/themes/".$GLOBALS['premiumpress']['theme']."/_sidebar1.php") &&  !isset($GLOBALS['nosidebar-left']) ){

                

                    include(str_replace("functions/","",THEME_PATH)."/themes/".$GLOBALS['premiumpress']['theme']."/_sidebar1.php");

                

                }elseif(!isset($GLOBALS['nosidebar-left']) ){ ?>                

                

                

                <div id="sidebar-left" class="<?php $PPTDesign->CSS("columns-left"); ?>">

                

                <?php premiumpress_sidebar_left_top(); /* HOOK */ ?> 

                

                <?php if(is_single() && !isset($GLOBALS['ARTICLEPAGE']) && isset($GLOBALS['nosidebar-right']) && get_option("display_listinginfo") =="yes"){  echo $PPTDesign->GetObject('authorinfo'); }

                

                /****************** INCLUDE WIDGET ENABLED SIDEBAR *********************/

                

				if(function_exists('dynamic_sidebar')){ 

				

					// LEFT SIDEBAR REGARDLESS

					dynamic_sidebar('Left Sidebar (3 Column Layouts Only)');

					

					// DISPLAY IF THE RIGHT SIDEBAR IS DISABLED

					if(isset($GLOBALS['nosidebar-right'] ) ){

				

						if(is_single() && !isset($GLOBALS['ARTICLEPAGE']) ){

							if ( !is_active_sidebar('sidebar-3') ) {

							echo $PPT->SidebarText('Listing Page');

							}else{

								dynamic_sidebar('Listing Page') ;

							} 

						}elseif(is_single() && isset($GLOBALS['ARTICLEPAGE']) ){

							if ( !is_active_sidebar('sidebar-5') ) {

							echo $PPT->SidebarText('Article/FAQ Page Sidebar');

							}else{

								dynamic_sidebar('Article/FAQ Page Sidebar') ;

							} 

						}elseif(is_page()){

							if ( !is_active_sidebar('sidebar-4') ) {

							echo $PPT->SidebarText('Pages Sidebar');

							}else{

								dynamic_sidebar('Pages Sidebar') ;

							}

						}else{

							if ( !is_active_sidebar('sidebar-1') ) {

							echo $PPT->SidebarText('Right Sidebar');

							}else{

							dynamic_sidebar('Right Sidebar'); 

							} 

						}

					

					}// end if

					

				} // end function

 

                

                /****************** end/ INCLUDE WIDGET ENABLED SIDEBAR *********************/

                  

                if(get_option('advertising_left_checkbox') =="1"){ 

                

                 echo premiumpress_banner("left");

                

                } ?>

                

                <?php premiumpress_sidebar_left_bottom(); /* HOOK */ ?> 

                

                &nbsp;&nbsp; 

                </div>

                

                <!-- end left sidebar -->                

               

           <?php } ?>

			

        <div class="<?php $PPTDesign->CSS("columns"); ?>">

        

        <?php echo $PPTDesign->GL_ALERT($GLOBALS['error_msg'],$GLOBALS['error_type']); ?>

		

        <?php premiumpress_middle_top(); /* HOOK */ ?>  

        

        

<?php 

		} 

} 

/* =============================================================================

   -- END FILE

   ========================================================================== */

?>