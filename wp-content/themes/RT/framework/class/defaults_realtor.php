<?php


function _hook_header_style6(){

// GET DISPLAY DATA
$core_admin_values = get_option("core_admin_values");  
$st = $core_admin_values['shoptop'];

ob_start();
?> 
 
<div class="col-md-5 col-sm-5 col-xs-12" id="core_logo">

<a href="<?php echo get_home_url(); ?>/" title="<?php echo get_bloginfo('name'); ?>"><?php echo hook_logo(true); ?></a></div>

<div class="col-md-7 col-sm-7 hidden-xs">

<div class="menuitems">

            <div class="row">
               
                <div class="col-md-6 text-center hidden-sm">
                	<div class="text-area icon2"><h3><?php echo stripslashes($st[1]['t']); ?></h3><p><?php echo stripslashes($st[1]['d']); ?></p></div>
                </div>
                
                <div class="col-md-6 text-center hidden-sm">
                  
                  <div class="text-area icon1"><h3><?php echo stripslashes($st[2]['t']); ?></h3><p><?php echo stripslashes($st[2]['d']); ?></p></div>
                  
                </div> 
                
            </div>
        </div>
          
</div>
<?php
return ob_get_clean();
} 
add_action('hook_header_style6','_hook_header_style6');


 add_action('hook_admin_1_topnav_top', '_hook_admin_1_topnav_top');

function _hook_admin_1_topnav_top(){

$core_admin_values = get_option("core_admin_values");  

// ONLY SHOW IF FULL HTML LAYOUT IS SELECTED
if($core_admin_values['layout_header'] != 6){ return; }

$default = array(

"1" => array("t" => "BOOK A HOUSE VIEWING ", "d" => "Weekdays Mon - Fri 9am - 5pm" ),
"2" => array("t" => "CALL NOW: 1234-1214-123", "d" => "Speak to one of our agents today!" ),
 
);

// GET DATA
$st = $core_admin_values['shoptop']; 

ob_start();
?>


<div class="heading2">Header Text (opposite logo) </div>
  
  
<?php foreach($default as $key => $t){ ?>
<div class="form-row control-group row-fluid">
	<label class="control-label span4">Box <?php echo $key; ?></label>
    <div class="controls span7">
    <p>Title</p>
    <input name="admin_values[shoptop][<?php echo $key; ?>][t]"  type="text" value="<?php if(isset($st[$key]['t']) && strlen($st[$key]['t']) > 0){ echo stripslashes($st[$key]['t']); }else{ echo $t['t']; } ?>" class="row-fluid">
    <p>Description</p>
    <input name="admin_values[shoptop][<?php echo $key; ?>][d]"  type="text" value="<?php if(isset($st[$key]['d']) && strlen($st[$key]['d']) > 0){ echo stripslashes($st[$key]['d']); }else{ echo $t['d']; }  ?>" class="row-fluid">
      
    </div>                      
</div>
<?php } ?>

<?php
echo ob_get_clean(); 
}
 

class core_realtor extends white_label_themes {
 
 	function core_realtor(){ global $wpdb;
 
	
	}// end function

}

?>