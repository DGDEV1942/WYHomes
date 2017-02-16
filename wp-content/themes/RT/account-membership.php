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

global $CORE, $userdata;

$membershipfields = get_option("membershipfields");
 

if(is_array($membershipfields) && count($membershipfields) > 0 && $CORE->_PACKNOTHIDDEN($membershipfields) > 0 ){ ?>

		<div class="panel panel-default" id="MyMembershipPackages">
        
        <div class="panel-heading"><?php echo $CORE->_e(array('add','24')); ?></div>
		 
            <div class="panel-body">
            
            <p><?php echo $CORE->_e(array('add','25')); ?> </p>
            
            <ul class="packagelistitems list-group"><?php echo $CORE->packageblock(2,'membershipfields',10); ?></ul>  
                  
            </div>
            
        </div>       

<?php } ?>