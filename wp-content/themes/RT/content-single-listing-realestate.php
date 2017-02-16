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
?>

<?php global $post, $CORE;

// CAN WE DISPLAY THE GOOGLE MAP BOX ?
$canShowMap = false;
if( get_post_meta($post->ID,'showgooglemap',true) == "yes"){
$canShowMap = true;
}
 
 
ob_start();
?>
<a name="toplisting"></a>

<div class="panel panel-default"> 
[STICKER] 
<div class="panel-body">

    <h1>[TITLE-NOLINK] </h1>
    
    <div class="pull-right"><i class="fa fa-star"></i> [FAVS]</div>
    
    <h4>[price] [listtype]</h4>    
    
    [LOCATION]
    
    <hr />
    
	[IMAGES]
 
 	<div class="wrap">
 
		<div class="pull-right">[CONTACT button=1]</div>

  		<h3><?php echo $CORE->_e(array('single','34')); ?></h3>
  
  		<hr />
        
   		[TOOLBOX]
  		
        [CONTENT]
  
  		<h3><?php echo $CORE->_e(array('single','35')); ?></h3>
        
  		<hr />
  
         [FIELDS hide="map"]
          
         <hr />
          
          <?php if($canShowMap): ?>
          
          <h3><?php echo $CORE->_e(array('add','37')); ?></h3>
          
          <hr />
          
          [GOOGLEMAP] 
          
          <?php endif; ?>
     
</div> 
 
 
</div></div> 

[COMMENTS]
  
<hr />
<?php $SavedContent = ob_get_clean(); 
echo hook_item_cleanup($CORE->ITEM_CONTENT($post, hook_content_single_listing($SavedContent)));

?>