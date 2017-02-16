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
 

function _hook_header_after(){ global $CORE, $post; $HDATA = $GLOBALS['CORE_THEME']['hdata']; 

?>
 
<section class="sbg1">

<div class="overwrap">

<div class="container">

    <div class="title-lines">
        <h2><?php echo stripslashes($HDATA['t1']['title1']); ?></h2>
        <h3><?php echo stripslashes($HDATA['t1']['title2']); ?></h3>
    </div>
    
     
    <div id="car1" class="owl-carousel wlt_search_results grid_style ">
    <?php echo do_shortcode('[LISTINGS dataonly=1 show=8 custom="random"]'); ?> 
    </div> 
    <script>
    jQuery(document).ready(function() { 
      jQuery("#car1").owlCarousel({ items : 4, autoPlay : true, rtl: true  }); 
    });
    </script> 

</div>

</div>

</section>

<?php
}
add_action('hook_header_after','_hook_header_after');
 
  
// HEADER
get_header($CORE->pageswitch()); 
?> 




 
    <div class="title-lines">
        <h2><?php echo stripslashes($HDATA['t2']['title1']); ?></h2>
        <h3><?php echo stripslashes($HDATA['t2']['title2']); ?></h3>
    </div> 
 
    <div class="tabstyle1"> 
    
      <ul class="nav nav-tabs hidden-xs" role="tablist">
      
      <li class="pull-right"><a href="<?php echo $GLOBALS['CORE_THEME']['links']['add']; ?>" class="btn btn-success"><?php echo $CORE->_e(array('homepage','4')); ?></a></li>
      
        <li role="presentation" class="active"><a href="#t1" aria-controls="t1" role="tab" data-toggle="tab">Ending Soon</a></li>
        
        
        <li role="presentation"><a href="#t3" aria-controls="t3" role="tab" data-toggle="tab">Latest Items</a></li>
    
      
      </ul>
    
    </div>
    
    <?php $GLOBALS['item_class_size'] = "col-md-3 col-sm-4 col-xs-12 "; ?> 
    <div class="tab-content" style="margin-top:20px;">
      
        <div role="tabpanel" class="tab-pane active" id="t1">   
        
            <div class="row wlt_search_results grid_style" >
            <?php echo do_shortcode('[LISTINGS dataonly=1 show=8 custom="endingsoon"]'); ?> 
            </div>
        
        </div>
 
        <div role="tabpanel" class="tab-pane" id="t3">   
        
            <div class="row wlt_search_results grid_style">
            <?php echo do_shortcode('[LISTINGS dataonly=1 show=8 custom="new"]'); ?> 
            </div>
        
        </div>
 
    
    </div>
    <?php unset($GLOBALS['item_class_size']); ?>
    <script>
    jQuery(document).ready(function() { 
     
        setTimeout(function(){equalheight('.grid_style .thumbnail');  }, 2000); 
    
        jQuery('.nav-tabs a').on( "click", function() {
        setTimeout(function(){equalheight('.grid_style .thumbnail');  }, 1000); 
        });
    
    });
     </script>
     
     
      
<div class="searchme">
    
<div class="container-fluid"><div class="row">
                        
        <div class="col-md-7">
        
            <h5><?php echo $CORE->_e(array('button','60')); ?></h5>
            
            <p><?php echo $CORE->_e(array('validate','8')); ?></p>
        
        </div>
             
        <div class="col-md-5">
                <form method="get" action="<?php echo get_home_url(); ?>/">
            
                <input type="text" name="s" value="" placeholder="<?php echo $CORE->_e(array('homepage','7','flag_noedit')); ?>"> <button type="submit"><?php echo $CORE->_e(array('button','11','flag_noedit')); ?></button>    
                </form>          
        </div>
    
    </div></div>
</div>



<?php get_footer($CORE->pageswitch()); ?>