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

<?php global $CORE, $post; 

// SHOW MAP BUTTON
if(isset($GLOBALS['flag-search']) ){ $canShowMap = get_post_meta($post->ID,'showgooglemap',true); }else{ $canShowMap = false; }

ob_start(); ?>
<div class="itemdata icons itemid<?php echo $post->ID; ?> <?php hook_item_class(); ?>" <?php echo $CORE->ITEMSCOPE('itemtype'); ?>>

<div class="thumbnail clearfix"> 
  
    [IMAGE gallery=1][/IMAGE]    
    
    <div class="content">
        
       <h4>[TITLE]</h4>
       
       <span class="pull-right">[listtype]</span> 
       
       [price] 
       
       <div class="line1"></div>
            
       <ul class="list-inline hidden_list">
       
        <li>[beds] <em><?php echo $CORE->_e(array('single','51')); ?></em> </li>
        <li>[baths] <em><?php echo $CORE->_e(array('single','52')); ?></em> </li>
        <li>[sqf] <em><?php echo $CORE->_e(array('single','53')); ?></em> </li>
        
       </ul>
       
       <span class="hidden_grid">[EXCERPT]</span>
       
     
    </div>

</div>

</div>
<?php 
$SavedContent = ob_get_clean(); 

echo hook_item_cleanup($CORE->ITEM_CONTENT($post, hook_content_listing($SavedContent))); ?>  