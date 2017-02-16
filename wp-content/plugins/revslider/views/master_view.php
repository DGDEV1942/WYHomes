<?php
	global $revSliderVersion;
	
	$wrapperClass = "";
	if(GlobalsRevSlider::$isNewVersion == false)
		 $wrapperClass = " oldwp";
	
	$nonce = wp_create_nonce("revslider_actions");
	
?>

<script type="text/javascript">
	var g_revNonce = "<?php echo $nonce?>";
	var g_uniteDirPlagin = "<?php echo self::$dir_plugin?>";
	var g_urlContent = "<?php echo content_url()."/";?>";
	var g_urlAjaxShowImage = "<?php echo UniteBaseClassRev::$url_ajax_showimage?>";
	var g_urlAjaxActions = "<?php echo UniteBaseClassRev::$url_ajax_actions?>";
	var g_settingsObj = {};
	
</script>

<div id="div_debug"></div>

<div class='unite_error_message' id="error_message" style="display:none;"></div>

<div class='unite_success_message' id="success_message" style="display:none;"></div>

<div id="viewWrapper" class="view_wrapper<?php echo $wrapperClass?>">
<?php
	self::requireView($view);
?>

</div>

<div id="divColorPicker" style="display:none;"></div>

<?php self::requireView("system/video_dialog")?>
<?php self::requireView("system/update_dialog")?>
<?php self::requireView("system/general_settings_dialog")?>

 
 

