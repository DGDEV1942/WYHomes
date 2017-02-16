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

global $CORE, $userdata; $membershipfields = get_option("membershipfields");

	
	// USER COUNTRY
	$logincount = get_user_meta($userdata->ID,'login_count',true);
	if($logincount == "" || $logincount == 0){ $logincount = 1; }
	// REGISTERED
	$seconds_offset = get_option( 'gmt_offset' ) * 3600;
	$dateoffset = date("Y-m-d H:i:s", strtotime($userdata->user_registered) + $seconds_offset );
 
	$date = $CORE->TimeDiff($dateoffset); 
 	if(trim($date['date']) == ""){ $date['date'] = "a few seconds"; }
 
 ?>

<div class="panel panel-default" id="MyAccountBlock" <?php if(isset($_GET['tab'])){ echo "style='display:none;'"; } ?>>
		 
	<div class="panel-heading"> <span><?php the_title(); ?></span> </div>
		 
		<div class="panel-body clearfix"> 
         
           <!-- START MEMBERSHIP DISPLAY -->
            
            <?php if($GLOBALS['current_membership'] != "" && is_numeric($GLOBALS['current_membership']) && is_array($membershipfields) ){ ?>
         
            <div class="alert alert-success">
            <?php
			$date_expires = hook_date($GLOBALS['current_membership_expires']);
			if(strlen($date_expires) > 1){
			?>   
            <div class="pull-right"><?php echo $CORE->_e(array('single','20')); ?>: <?php echo $date_expires; ?></div>
            <?php } ?>
            
            <b><span class="label label-success"><?php echo $CORE->_e(array('account','43')); ?></span></b>  <b><?php echo $membershipfields[$GLOBALS['current_membership']]['name']; ?></b> 
             
            <?php /** SHOW RENEW BUTTON IF EXPIRING SOON **/ 
			
			
			if(strtotime(date('Y-m-d H:i:s')) > strtotime(date('Y-m-d H:i:s', strtotime($GLOBALS['current_membership_expires']. '-30 days'))) ){ ?>
			<div class="clearfix"></div>
			<a class="btn btn-primary btn-right" href="javascript:void(0);" style="margin-top:10px;margin-right:0px;" onclick="document.getElementById('membershipID').value='<?php echo $GLOBALS['current_membership']; ?>';document.MEMBERSHIPFORM.submit();"><?php echo $CORE->_e(array('account','67')); ?></a>
            <div class="clearfix"></div>
            <?php }  /*---------------------------------------*/ ?>
           
                	    
			</div>
            <?php } ?> 
            
            <?php if(is_numeric($GLOBALS['usercredit']) && $GLOBALS['usercredit'] < 0){ $current_price = str_replace("-","",$GLOBALS['usercredit']); ?>
            
         
             <div class="alert alert-danger">
               <b><span class="label label-danger"><?php echo $CORE->_e(array('account','77')); ?></span></b> 
               <span class="pull-right"><button style="margin-top:5px;" href="#myPaymentOptions" role="button" class="btn btn-danger" data-toggle="modal"><?php echo $CORE->_e(array('button','21')); ?></button></span>
               <br /><small><?php echo str_replace("%a",hook_price($current_price),$CORE->_e(array('account','78'))); ?></small>
               
               <div class="clearfix"></div>
			</div>           
            <?php 
			
			$STRING = ' 
				<!-- Modal -->
				<div id="myPaymentOptions" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				 <div class="modal-dialog"><div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h4 id="myModalLabel">'.$CORE->_e(array('single','13')).' ('.hook_price($current_price).')</h4>
				  </div>
				  <div class="modal-body">'.$CORE->PAYMENTS(round($current_price,2), "PAY-".$userdata->ID."-".date("Ymd"), $post->post_title, $post->ID, $subscription = false).'</div>
				  <div class="modal-footer">
				  '.$CORE->admin_test_checkout().'
				  <button class="btn" data-dismiss="modal" aria-hidden="true">'.$CORE->_e(array('single','14')).'</button></div></div></div></div>
				<!-- End Modal -->';
				
				echo $STRING;
			
			} ?>        
         
		
           <!-- START CUSTOM TEXT DISPLAY -->            
            <?php if(strlen($GLOBALS['customtext']) > 1){ echo $GLOBALS['customtext']."<hr />"; } ?>		  
  
 <?php if($GLOBALS['CORE_THEME']['show_account_edit'] == '1'){ ?>
 
<div class="authorheader">

    <a href=" <?php if($GLOBALS['CORE_THEME']['show_profilelinks'] == 1){ echo get_author_posts_url( $userdata->ID ); }else{ echo "#"; } ?>" class="frame"><?php echo get_avatar($userdata->ID , 60 ); ?></a>            
    <h1><?php echo get_the_author_meta( 'display_name', $userdata->ID); ?> </h1>
    <ul class="list-inline hidden-sm hidden-xs">    
    <li><span class="glyphicon glyphicon-info-sign"></span> <?php echo str_replace("%a", $date['date'], $CORE->_e(array('account','88')) ); ?></li>
    <li><span class="glyphicon glyphicon-ok-sign"></span> <?php echo number_format($logincount); ?> <?php echo $CORE->_e(array('account','87')); ?></li>
    
    <?php if($GLOBALS['CORE_THEME']['show_profilelinks'] == 1){ ?>
    <li><a href="<?php echo get_author_posts_url( $userdata->ID ); ?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> <?php echo $CORE->_e(array('widgets','24')); ?></a></li>
 	<?php } ?>
    
    </ul>
    
<hr />

</div>

<?php } ?>

 
<?php 

$ex = ""; // extra

if($GLOBALS['CORE_THEME']['show_account_edit'] == '1'){
$AFIELDS[] = array(
	"l" => "#top",
	"oc" => "jQuery('#MyAccountBlock').hide();jQuery('#MyDetailsBlock').show();",
	"i" => "glyphicon glyphicon-user",
	"t" => $CORE->_e(array('account','2')),
	"d" => $CORE->_e(array('account','3')),
	"e" => $ex,
);
}


if($GLOBALS['CORE_THEME']['show_account_create'] == '1' && !defined('WLT_CART')  ){ 
	if(isset($membershipfields[$GLOBALS['current_membership']]['submissionamount']) && $membershipfields[$GLOBALS['current_membership']]['submissionamount']  == "0" ){ }else{
$AFIELDS[] = array(
	"l" => $GLOBALS['CORE_THEME']['links']['add'],
	"oc" => "",
	"i" => "glyphicon glyphicon-pencil",
	"t" => $CORE->_e(array('account','4')),
	"d" => $CORE->_e(array('account','5')),
	"e" => $ex,
);
	} 
}

if($GLOBALS['CORE_THEME']['show_account_viewing'] == '1' && !defined('WLT_CART') ){
$AFIELDS[] = array(
	"l" => get_home_url()."/?s=&uid=".$userdata->ID,
	"oc" => "",
	"i" => "glyphicon glyphicon-search",
	"t" => $CORE->_e(array('account','6')),
	"d" => $CORE->_e(array('account','7')),
	"e" => $ex,
);
}

if($GLOBALS['CORE_THEME']['message_system'] == '1' && !defined('WLT_CART') ){ 
$mc = $CORE->MESSAGECOUNT($userdata->user_login);
if($mc > 0){ $ex = '<span class="label label-danger">'.str_replace("%a",$mc,$CORE->_e(array('account','28'))).'</span>'; }

$AFIELDS[] = array(
	"l" => "#top",	
	"oc" => "jQuery('#MyAccountBlock').hide();jQuery('#MyMsgBlock').show();",
	"i" => "glyphicon glyphicon-envelope",
	"t" => $CORE->_e(array('account','26')),
	"d" => $CORE->_e(array('account','27')),
	"e" => $ex,
);
$ex = "";
} 

if(isset($GLOBALS['CORE_THEME']['feedback_enable']) && $GLOBALS['CORE_THEME']['feedback_enable'] == '1' && !defined('WLT_CART')){
$AFIELDS[] = array(
	"l" => "#top",	
	"oc" => "jQuery('#MyAccountBlock').hide();jQuery('#MyFeedback').show();",
	"i" => "glyphicon glyphicon-comment",
	"t" => $CORE->_e(array('account','81')),
	"d" => $CORE->_e(array('account','82')),
	"e" => $ex,
);
}

if($GLOBALS['CORE_THEME']['show_account_subscriptions'] == '1'){
$AFIELDS[] = array(
	"l" => "#top",	
	"oc" => "jQuery('#MyAccountBlock').hide();jQuery('#MySubscriptionBlock').show();",
	"i" => "glyphicon glyphicon-book",
	"t" => $CORE->_e(array('account','44')),
	"d" => $CORE->_e(array('account','45')),
	"e" => $ex,
);
}

 if($GLOBALS['CORE_THEME']['show_account_favs'] == '1'){ 
$AFIELDS[] = array(
	"l" => home_url()."/?s=&favs=1",	
	"oc" => "",
	"i" => "glyphicon glyphicon-star",
	"t" => $CORE->_e(array('account','46')),
	"d" => $CORE->_e(array('account','47')),
	"e" => $ex,
);
}

if($GLOBALS['CORE_THEME']['show_account_withdraw'] == '1'){ 
$AFIELDS[] = array(
	"l" => "#top",
	"oc" => "jQuery('#MyAccountBlock').hide();jQuery('#MyWidthdrawlBlock').show();",
	"i" => "glyphicon glyphicon-usd",
	"t" => $CORE->_e(array('account','54')),
	"d" => $CORE->_e(array('account','55')),
	"e" => "<span class='label label-danger'>".$CORE->_e(array('order_status','title4'))." ".hook_price($GLOBALS['usercredit'])."</span>",
);
}

if( isset($GLOBALS['CORE_THEME']['sellspace_enable']) && $GLOBALS['CORE_THEME']['sellspace_enable'] == 1 ){
$AFIELDS[] = array(
	"l" => "#top",
	"oc" => "jQuery('#MyAccountBlock').hide();jQuery('#MyAdvertising').show();",
	"i" => "glyphicon glyphicon-list-alt",
	"t" => "Premium Advertising",
	"d" => "Here you can purchase additional advertising.",
	"e" => "",
);
}




// HOOK FOR PLUGINS
$AFIELDS = hook_account_pagelist($AFIELDS);

if(isset($GLOBALS['CORE_THEME']['account_layout']) && $GLOBALS['CORE_THEME']['account_layout'] == 1){ 
echo "<br />";
}

// DISPLAY LIST
foreach($AFIELDS as $key => $account){ 

if(isset($GLOBALS['CORE_THEME']['account_layout']) && $GLOBALS['CORE_THEME']['account_layout'] == 1){ ?>

<div class="clearfix"></div>
<a href="<?php echo $account['l']; ?>" onclick="<?php echo $account['oc']; ?>">
<div class="media">
  <div class="media-left">   
      <div class="media-object" style="  font-size: 60px;  margin-left: 20px;  margin-top: 10px; color:#ddd"><i class="<?php echo $account['i']; ?>"></i></div>  
  </div>
  <div class="media-body">
    <h4 class="media-heading"><?php echo $account['t']; ?> <?php if($account['e'] != ""){ ?><span><?php echo $account['e']; ?></span><?php } ?></h4>
    <?php echo $account['d']; ?>
  </div>
</div>
</a>
<?php }else{ ?>

<div class="col-sm-6 col-md-4 accountbit" id="accbit<?php echo $key; ?>">
   <a href="<?php echo $account['l']; ?>" onclick="<?php echo $account['oc']; ?>">
            <div class="account-block">
                <div class="icon">  <i class="<?php echo $account['i']; ?>"></i> </div>
                <div class="description">
                    <h3><?php echo $account['t']; ?></h3>
                   <?php if($account['e'] == ""){ ?> <hr /> <?php }else{ ?> <span><?php echo $account['e']; ?></span><?php } ?>
                    <p><?php echo $account['d']; ?></p>
                </div>
            </div>
	</a>
</div>

<?php } } ?>       

		
		<?php echo hook_account_menu(); ?>	
        		
		<div class="clearfix"></div>
            
       <hr />
             
		<a class="btn btn-default pull-right" href="<?php echo wp_logout_url(); ?>"><?php echo $CORE->_e(array('account','8')); ?></a>       
		
	</div> 
    
</div>