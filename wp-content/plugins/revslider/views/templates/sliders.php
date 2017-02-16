<?php

// SETUP GLOBALS
global $wpdb, $CORE, $userdata, $CORE_ADMIN;

	$exampleID = '"slider1"';
    $dir = plugin_dir_path(__FILE__).'../../';
	if(!empty($arrSliders))
		$exampleID = '"'.$arrSliders[0]->getAlias().'"';
		
	$outputTemplates = false;


// LOAD IN HEADER
echo $CORE_ADMIN->HEAD();
?>
 
	<div class='wrap'>
		<div class="clear_both"></div> 

		<div class="title_line">
			<div class="view_title">
				Sliders
			</div>
			
			<!--<a href="<?php echo GlobalsRevSlider::LINK_HELP_SLIDERS?>" class="button-secondary float_right mtop_10 mleft_10" target="_blank"><?php _e("Help",REVSLIDER_TEXTDOMAIN)?></a>	-->		
			
			<a id="button_general_settings" class="button-secondary float_right mtop_10"><?php _e("Global Settings",REVSLIDER_TEXTDOMAIN)?></a>
			
		</div>

		<?php if(empty($arrSliders)): ?>
			<?php _e("No Sliders Found",REVSLIDER_TEXTDOMAIN)?>
			<br>
		<?php else:
			 require self::getPathTemplate("sliders_list");	 		
		endif?>
	
    <hr />
    
		<p>			
			<a class='button-primary revblue' href='<?php echo $addNewLink?>'><?php _e("Create New Slider",REVSLIDER_TEXTDOMAIN)?> </a>
			<a id="button_import_slider" class='button-primary float_right revgreen' href='javascript:void(0)'><?php _e("Import Slider",REVSLIDER_TEXTDOMAIN)?> </a>		
		</p>

		<!-- 
		THE SLIDER TEMPLATES
		-->
		<div style="width:100%;height:17px"></div>
		<div class="title_line"><div class="view_title"><?php _e("Slider Templates",REVSLIDER_TEXTDOMAIN)?></div></div>
		<?php if(empty($arrSlidersTemplates)){ ?>
			<?php _e("No Template Sliders Found",REVSLIDER_TEXTDOMAIN)?>
			<br>
		<?php }else{
				$outputTemplates = true;
				require self::getPathTemplate("sliders_list");	 		
			}
			?>	
            	
        <hr />
        
		<p><a class='button-primary revblue' href='<?php echo $addNewTemplateLink?>'><?php _e("Create New Template Slider",REVSLIDER_TEXTDOMAIN)?> </a></p>

		<div style="width:100%;height:50px"></div>

	 
		
				
	 
		
		
		 
		 
	
	<!-- Import slider dialog -->
	<div id="dialog_import_slider" title="<?php _e("Import Slider",REVSLIDER_TEXTDOMAIN)?>" class="dialog_import_slider" style="display:none">
		<form action="<?php echo UniteBaseClassRev::$url_ajax?>" enctype="multipart/form-data" method="post">
		    <br>
		    <input type="hidden" name="action" value="revslider_ajax_action">
		    <input type="hidden" name="client_action" value="import_slider_slidersview">
		    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce("revslider_actions"); ?>">
		    <?php _e("Choose the import file",REVSLIDER_TEXTDOMAIN)?>:   
		    <br>
			<input type="file" size="60" name="import_file" class="input_import_slider">
			<br><br>
			<span style="font-weight: 700;"><?php _e("Note: custom styles will be updated if they exist!",REVSLIDER_TEXTDOMAIN)?></span><br><br>
			<table>
				<tr>
					<td><?php _e("Custom Animations:",REVSLIDER_TEXTDOMAIN)?></td>
					<td><input type="radio" name="update_animations" value="true" checked="checked"> <?php _e("overwrite",REVSLIDER_TEXTDOMAIN)?></td>
					<td><input type="radio" name="update_animations" value="false"> <?php _e("append",REVSLIDER_TEXTDOMAIN)?></td>
				</tr>
				<tr>
					<td><?php _e("Static Styles:",REVSLIDER_TEXTDOMAIN)?></td>
					<td><input type="radio" name="update_static_captions" value="true" checked="checked"> <?php _e("overwrite",REVSLIDER_TEXTDOMAIN)?></td>
					<td><input type="radio" name="update_static_captions" value="false"> <?php _e("append",REVSLIDER_TEXTDOMAIN)?></td>
				</tr>
			</table>
			<br><br>
			<input type="submit" class='button-primary' value="<?php _e("Import Slider",REVSLIDER_TEXTDOMAIN)?>">
		</form>		
		
	</div>
	
	<script type="text/javascript">
		jQuery(document).ready(function(){
			RevSliderAdmin.initSlidersListView();
			jQuery('#benefitsbutton').hover(function() {
				jQuery('#benefitscontent').slideDown(200);
			}, function() {
				jQuery('#benefitscontent').slideUp(200);				
			})
		});
	</script>

<?php echo $CORE_ADMIN->FOOTER(); ?>