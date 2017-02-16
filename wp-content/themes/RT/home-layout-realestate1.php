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

global $CORE;
 

// GET HOME PAGE CUSTOM DATA
$HDATA = $GLOBALS['CORE_THEME']['hdata'];

// MAP DEFAULTS
$defaults = $CORE->wlt_google_getdefaults(); 
 
// HEADER
get_header($CORE->pageswitch()); 

?> 


<?php if(!isset($GLOBALS['CORE_THEME']['home_section1']) || (isset($GLOBALS['CORE_THEME']['home_section1']) && $GLOBALS['CORE_THEME']['home_section1'] == '1' ) ){  ?>

<?php if(isset($GLOBALS['CORE_THEME']['homesliderid']) && $GLOBALS['CORE_THEME']['homesliderid'] != "" && $GLOBALS['CORE_THEME']['homeslider'] == 1 ){  

echo do_shortcode(stripslashes("[rev_slider ".$GLOBALS['CORE_THEME']['homesliderid']."]")); 

}else{ ?>

<div class="jumbostyle1 cols<?php echo $GLOBALS['CORE_THEME']['layout_columns']['homepage']; ?>" <?php if(isset($HDATA['j1']['img']) && $HDATA['j1']['img'] != ""){ echo 'style="background-image: url(\''.$HDATA['j1']['img'].'\');"'; } ?>>

    <div class="jumbotron">
    
    <div class="inner">
            
            <h1><?php echo stripslashes($HDATA['j1']['title1']); ?></h1>
            
            <h2><?php echo stripslashes($HDATA['j1']['title2']); ?></h2>
            
            <?php echo wpautop(stripslashes($HDATA['j1']['title3'])); ?>
                    
            <p><a href="<?php echo $GLOBALS['CORE_THEME']['links']['myaccount']; ?>" class="btn btn-lg btn-primary"><?php echo $CORE->_e(array('button','59')); ?></a>  
            
            <a href="<?php echo home_url(); ?>/?s=" class="btn btn-lg btn-primary"><?php echo $CORE->_e(array('button','60')); ?></a></p>
    </div>
     
    </div>

</div>

<?php } ?>

<?php } ?>



<?php if(!isset($GLOBALS['CORE_THEME']['home_section2']) || (isset($GLOBALS['CORE_THEME']['home_section2']) && $GLOBALS['CORE_THEME']['home_section2'] == '1' ) ){  ?>

<div id="car1" class="owl-carousel wlt_search_results grid_style style1">
<?php echo do_shortcode('[LISTINGS dataonly=1 show=15]'); ?> 
</div>
<script> 
jQuery(document).ready(function() { 	 
	jQuery("#car1").owlCarousel({ items : 4, autoPlay : true,  });   
});
</script>
<?php } ?>



<?php if(!isset($GLOBALS['CORE_THEME']['home_section3']) || (isset($GLOBALS['CORE_THEME']['home_section3']) && $GLOBALS['CORE_THEME']['home_section3'] == '1' ) ){  ?>
 
<div class="gmap500">
<?php echo $CORE->wlt_googlemap_html(true); ?>
</div>

<script> 
jQuery(document).ready(function() { 
	loadGoogleMapsApi(); 
});
var wlt_map_options = [{
	l: "<?php echo home_url(); ?>/",
	path: "<?php echo get_template_directory_uri(); ?>", 
	id: "wlt_google_map", 
	region: "<?php echo $defaults['region']; ?>", 
	lang: "<?php echo $defaults['lang'] ?>", 
	long: <?php echo $defaults['long']; ?>, 
	lat: <?php echo $defaults['lat']; ?>, 	
	zoom: <?php echo $defaults['zoom'] ?>,
	cluster: "<?php if(isset($GLOBALS['CORE_THEME']['googlemap_cluster']) && $GLOBALS['CORE_THEME']['googlemap_cluster'] == 1){ echo "yes"; }else{ echo "no"; } ?>",
	data: "",
	mapicon: "map-icon"
}];

</script>

<?php } ?>



<?php if(!isset($GLOBALS['CORE_THEME']['home_section4']) || (isset($GLOBALS['CORE_THEME']['home_section4']) && $GLOBALS['CORE_THEME']['home_section4'] == '1' ) ){  ?>
 
<div class="tabstyle1"> 

  <ul class="nav nav-tabs " role="tablist">
  
    <li role="presentation" class="active"><a href="#t1" aria-controls="t1" role="tab" data-toggle="tab"><?php _e('New Property', 'premiumpress'); ?></a></li>
    
    <li role="presentation" class="hidden-xs"><a href="#t2" aria-controls="t2" role="tab" data-toggle="tab"><?php _e('Featured Property', 'premiumpress'); ?></a></li>

  </ul>

</div>

<?php $GLOBALS['item_class_size'] = "col-md-3  col-sm-3 "; ?> 
<div class="tab-content">
  
    <div role="tabpanel" class="tab-pane active" id="t1">   
	
        <div class="row wlt_search_results grid_style" style="margin-top:20px;">
        <?php echo do_shortcode('[LISTINGS dataonly=1 show=8 custom="new"]'); ?> 
        </div>
    
    </div>
    <div role="tabpanel" class="tab-pane" id="t2">   
	
        <div class="row wlt_search_results grid_style" style="margin-top:20px;">
        <?php echo do_shortcode('[LISTINGS dataonly=1 show=8 custom="featured"]'); ?> 
        </div>
    
    </div>
 
    
  </div>

  <?php unset($GLOBALS['item_class_size']); ?>

 
<script>
jQuery(document).ready(function(){  

	setTimeout(function(){equalheight('.catstyle5 .col-md-4');  }, 1000); 
 
	setTimeout(function(){equalheight('.grid_style .thumbnail');  }, 2000); 

	jQuery('.nav-tabs a').on( "click", function() {
	setTimeout(function(){equalheight('.grid_style .thumbnail');  }, 1000); 
	});
 
});
 
</script> 
<?php } ?>


<?php get_footer($CORE->pageswitch()); ?>