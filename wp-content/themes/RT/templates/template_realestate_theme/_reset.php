<?php

add_action('hook_new_install','_newinstall');
function _newinstall(){ global $CORE, $wpdb;
 
 
 
// HOME PAGE LAYOUT
$GLOBALS['theme_defaults']['homepage_layout'] = "layout-realestate1";

// DEFAULTS FOR HOME PAGE OBJECTS
$GLOBALS['theme_defaults']['hdata'] = array(
"j1" => array("title1" => "Real Estate Theme", "title2" => "HTML5 Responsive Real Estate Theme", "title3" => "This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.", 
 "img" => get_template_directory_uri()."/templates/template_realestate_theme/img/banner.jpg"
),
"t1" => array("title1" => "Your Amazing Title Text Here", "title2" => "You can customize this area and enter your own title text via the admin area of the theme."  ),
"t2" => array("title1" => "Your Amazing Title Text Here", "title2" => "You can customize this area and enter your own title text via the admin area of the theme."  ),

); 

// WEBSITE LOGO
$GLOBALS['theme_defaults']['logo_text1'] 	= "WEBSITE LOGO";
$GLOBALS['theme_defaults']['logo_text2'] 	= "Your company slogan goes here";
$GLOBALS['theme_defaults']['logo_icon'] 	= "2";

// HEADER STYLE
$GLOBALS['theme_defaults']['layout_header'] = 6;

// GRID LAYOUT
$GLOBALS['theme_defaults']["display"] = array("default_gallery_style" => "grid"); 

// 4. CUSTOM SUBMISSION FIELDS
$submissionfields[0] = array(
"name" => "Price", 
"help" => "", 
"fieldtype" => "input", 
"values" => "", 
"taxonomy" => "", 
"key" => "price", 
"order" => "1", 
"required" => "yes", 
"ID" => "0", 
);
$submissionfields[1] = array(
"name" => "Bedrooms", 
"help" => "", 
"fieldtype" => "input", 
"values" => "", 
"taxonomy" => "", 
"key" => "beds", 
"order" => "1", 
"required" => "yes", 
"ID" => "1", 
);

$submissionfields[2] = array(
"name" => "Bathrooms", 
"help" => "", 
"fieldtype" => "input", 
"values" => "", 
"taxonomy" => "", 
"key" => "baths", 
"order" => "2", 
"required" => "yes", 
"ID" => "2", 
);

$submissionfields[3] = array(
"name" => "Size (Sq Ft)", 
"help" => "", 
"fieldtype" => "input", 
"values" => "", 
"taxonomy" => "", 
"key" => "sqf", 
"order" => "2", 
"required" => "yes", 
"ID" => "3", 
);

$submissionfields[4] = array(
"name" => "Property Type", 
"help" => "", 
"fieldtype" => "select", 
"values" => "For Sale\nFor Rent (Long Term)\nFor Rent (Short Term)\nFor Lease\nRent To Buy\nRent To Buy", 
"taxonomy" => "", 
"key" => "listtype", 
"order" => "2", 
"required" => "yes", 
"ID" => "4", 
);

	 

// SAVE ARRAY DATA		 
update_option( "submissionfields", $submissionfields);


// 5. DEFAULT TEMPLATE DATA
$GLOBALS['theme_defaults']['template'] 		= "template_realestate_theme";
  
 			
$GLOBALS['theme_defaults']['widgetobject']['gmap']['0'] = array(
'title' => "",
'clickme' => "yes",
'dtype' => "1",
'num' => "",
'dc' => "",
'zoom' => "",
'caticons' => "no",
'fullw' => "yes",
);
$GLOBALS['theme_defaults']['widgetobject']['search2']['1'] = array(
'text' => "<div class=\"wlt_object_search_2 hidden-xs\">                <div class=\"container\"><div class=\"row\"><div class=\"col-md-8\"><img src=\"".THEME_URI."/templates/".$GLOBALS['theme_defaults']['template']."/img/demo/bannermain.jpg\" alt=\"\" class=\"img-responsive wp-image-52\"></div>    	<div class=\"col-md-4\">     <div class=\"panel panel-default\">      	<div class=\"panel-body\">     <h3>Website Search</h3>     				<p>Search our webiste listings below;</p>  <div class=\"row\">     [ADVANCEDSEARCH home=yes]     </div>  </div>         </div>     </div>        </div></div>     </div>",
'fullw' => "yes",
);
$GLOBALS['theme_defaults']['widgetobject']['tabs']['2'] = array(
'title1' => "Recently Added",
'query1' => "orderby=rand&posts_per_page=8",
'content1' => "",
'style1' => "grid",
'title2' => "Most Viewed",
'query2' => "orderby=rand&posts_per_page=8",
'content2' => "",
'style2' => "grid",
'title3' => "Going Soon",
'query3' => "orderby=rand&posts_per_page=8",
'content3' => "",
'style3' => "grid",
'title4' => "Latest Deals",
'query4' => "orderby=rand&posts_per_page=8",
'content4' => "",
'style4' => "grid",
'btnview' => "yes",
'perrow' => "4",
'fullw' => "yes",
);
$GLOBALS['theme_defaults']['widgetobject']['new7']['3'] = array(
'text' => "<section><div class=\"wlt_object_footer_1\"><div class=\"row\"><ul>    <li class=\"col-md-4 col-xs-4\">    <a href=\"#\" class=\"item-link\">    <span>        <img src=\"".THEME_URI."/templates/".$GLOBALS['theme_defaults']['template']."/img/demo/home5.jpg\" alt=\"\" class=\"wp-image-52\">    </span>    <div class=\"item-html\">    <h3>Headline</h3>    <h4>Lorem ipsum dolor sit amet</h4>    <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>    </div>    </a>    </li>         <li class=\"col-md-4 col-xs-4\">    <a href=\"#\" class=\"item-link\">    <span>        <img src=\"".THEME_URI."/templates/".$GLOBALS['theme_defaults']['template']."/img/demo/home6.jpg\" alt=\"\" class=\"wp-image-52\">    </span>    <div class=\"item-html\">    <h3>Headline</h3>    <h4>Lorem ipsum dolor sit amet</h4>    <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>    </div>    </a>    </li> <li class=\"col-md-4 col-xs-4\">    <a href=\"#\" class=\"item-link\">    <span>        <img src=\"".THEME_URI."/templates/".$GLOBALS['theme_defaults']['template']."/img/demo/home7.jpg\" alt=\"\">    </span>    <div class=\"item-html\">    <h3>Headline</h3>    <h4>Lorem ipsum dolor sit amet</h4>    <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>    </div>    </a>    </li>             </ul></div></div></section>",
'fullw' => "yes",
);
$GLOBALS['theme_defaults']["homepage"]["widgetblock1"] = "gmap_0,search2_1,tabs_2,new7_3";


$GLOBALS['theme_defaults']['google'] = 1;
 
 
// CONTENT LAYOUT / SINGLE LAYOUT
$GLOBALS['theme_defaults']['content_layout'] = "listing-realestate";
$GLOBALS['theme_defaults']['single_layout'] = "listing-realestate";

$GLOBALS['theme_defaults']['itemcode'] 		= '[IMAGE]<span class="ftext">[price]  [listtype]</span>[/IMAGE]
<h1>[TITLE]</h1>

<ul class="list-inline">
<li class="tt1">[beds] Beds</li>
<li class="tt2 ">[baths] Baths</li>
<li class="tt3">[sqf] Sq Ft</li>
<li class="tt4">[FAVS]</li>
</ul>
<div class="hidden_details"> [LOCATION]  <hr />[EXCERPT size="350"] [CATEGORY] </div>'; 

update_option('wlt_reset_itemcode', $GLOBALS['theme_defaults']['itemcode']);


$GLOBALS['theme_defaults']['listingcode']		= '<div class="panel panel-default"> 
	<div class="panel-heading">[TITLE]</div>		<div class="panel-body"> 
[IMAGES]  

 <div class="right" style="margin-top:10px; margin-right:10px">[CONTACT button=1]</div>
 
<ul class="nav nav-tabs navstyle1" id="Tabs">
  <li class="active"><a href="#t1" data-toggle="tab">{Description}</a></li>
  <li><a href="#t2" data-toggle="tab">{Details}</a></li>
 
</ul> 

<div class="tab-content">
  <div class="tab-pane active" id="t1">
  [TOOLBOX]
  <h5>[TITLE]</h5>
  [CONTENT]  
  [GOOGLEMAP] 
  </div>
  <div class="tab-pane" id="t2">
  [FIELDS hide="map"]
  </div> 
   
</div> 
 
</div></div> [COMMENTS box=true]'; 
  
// 5. REINSTALL THE SAMPLE DATA CATEGORIES 
$new_cat_array = array("Residential","Commercial","Lettings","Other"); 
$saved_cats_array = array();
foreach($new_cat_array as $cat){
	if ( is_term( $cat , THEME_TAXONOMY ) ){
	$term = get_term_by('slug', $cat, THEME_TAXONOMY);
	$saved_cats_array[] = $term->term_id;
	}else{
	$cat_id = wp_insert_term($cat, THEME_TAXONOMY, array('cat_name' => $cat ));
		if(!is_object($cat_id) && isset($cat_id['term_id'])){
		$saved_cats_array[] = $cat_id['term_id'];
		}else{
		$saved_cats_array[] = $cat_id->term_id;
		}	
	}	
}
// 6. INSTALL THE SAMPLE DATA LISTINGS 
 


$i=1;
while($i < 16){
 
	$my_post = array();
	$my_post['post_title'] 		= "Example Property ".$i;
	$my_post['post_content'] 	= "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue. Pellentesque nec lacus elit. Pellentesque convallis nisi ac augue pharetra eu tristique neque consequat. Mauris ornare tempor nulla, vel sagittis diam convallis eget.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue. Pellentesque nec lacus elit. Pellentesque convallis nisi ac augue pharetra eu tristique neque consequat. Mauris ornare tempor nulla, vel sagittis diam convallis eget.</p><blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p><small>Someone famous <cite title='Source Title'>Source Title</cite></small>
</blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue. Pellentesque nec lacus elit. Pellentesque convallis nisi ac augue pharetra eu tristique neque consequat. Mauris ornare tempor nulla, vel sagittis diam convallis eget.</p><dl class='dl-horizontal'>
				<dt>Description lists</dt>
				<dd>A description list is perfect for defining terms.</dd>
				<dt>Euismod</dt>
				<dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
				<dd>Donec id elit non mi porta gravida at eget metus.</dd>
				<dt>Malesuada porta</dt>
				<dd>Etiam porta sem malesuada magna mollis euismod.</dd>
				<dt>Felis euismod semper eget lacinia</dt>
				<dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
			  </dl>";
	$my_post['post_type'] 		= THEME_TAXONOMY."_type";
	$my_post['post_status'] 	= "publish";
	$my_post['post_category'] 	= "";
	$my_post['tags_input'] 		= "";
	$POSTID 					= wp_insert_post( $my_post );	
	
 
	add_post_meta($POSTID, "beds", rand(1, 5));
	add_post_meta($POSTID, "baths", rand(1, 5));
	 
	add_post_meta($POSTID, "price", rand(10000, 500000));
	add_post_meta($POSTID, "map-lat", rand(20, 60));
	add_post_meta($POSTID, "map-log", rand(20, 60));
	add_post_meta($POSTID, "listtype", "For Sale");
	add_post_meta($POSTID, "sqf", rand(100, 600));
	
	add_post_meta($POSTID, "image", get_template_directory_uri()."/framework/img/demo/noimage.png");
	
	// UPDATE CAT LIST
	wp_set_post_terms( $POSTID, $saved_cats_array, THEME_TAXONOMY );
	
	$i++;		
} 
 

} 

?>