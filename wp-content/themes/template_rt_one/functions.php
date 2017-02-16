<?php

require_once( __DIR__ . '/directory-searchform.php' );

/* Footer Top1 Sidebar */

add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Footer Top1', 'blankslate' ),
'id' => 'footer-top1',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}

/* Footer Top2 Sidebar */

add_action( 'widgets_init', 'blankslate_widgets_init2' );
function blankslate_widgets_init2()
{
register_sidebar( array (
'name' => __( 'Footer Top2', 'blankslate' ),
'id' => 'footer-top2',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}

/* Footer Top3 Sidebar */

add_action( 'widgets_init', 'blankslate_widgets_init3' );
function blankslate_widgets_init3()
{
register_sidebar( array (
'name' => __( 'Footer Top3', 'blankslate' ),
'id' => 'footer-top3',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}

/* Magazine Left */

add_action( 'widgets_init', 'blankslate_widgets_init4' );
function blankslate_widgets_init4()
{
register_sidebar( array (
'name' => __( 'MagazineL', 'blankslate' ),
'id' => 'magazine-l',
'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
'after_widget' => "</div>",
'before_title' => '<b>',
'after_title' => '</b>',
) );
}

/* Magazine Right */

add_action( 'widgets_init', 'blankslate_widgets_init5' );
function blankslate_widgets_init5()
{
register_sidebar( array (
'name' => __( 'MagazineR', 'blankslate' ),
'id' => 'magazine-r',
'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
'after_widget' => "</div>",
'before_title' => '<b>',
'after_title' => '</b>',
) );
}

function modify_idx_widget_output( $atts ) {
	$atts = shortcode_atts(
		array(
			'id' => '',
		), $atts, 'idx-widget' );
	$output = '<script id="idxwidgetsrc-' . $atts[ 'id' ] . '" type="text/javascript" charset="UTF-8">';
	$output .= file_get_contents( 'https://realestate.wyhomesearch.com/idx/customslideshowjs.php?widgetid=' . $atts[ 'id' ] );
	$output .= '</script>';
	$output = str_replace( 'http%3A%2F%2F', 'https%3A%2F%2F', $output );
	$output = str_replace( 'http://', 'https://', $output );

	return $output;
}

add_shortcode( 'idx-widget', 'modify_idx_widget_output' );

function wyh_ssl_blacklist( $force_ssl, $post_id = 0, $url = '' ) {
	$ssl_blacklist = array(
		'/sr-listings',
		'/sr_vendor',
	    '/listings',
	);

	foreach( $ssl_blacklist as $term ) {
		if ( strpos( $url, $term ) !== false ) {
			$force_ssl = false;
		}
	}

	if( is_home() || is_front_page() ) {
		$force_ssl = false;
	}	

	return $force_ssl;
}

add_filter( 'force_ssl', 'wyh_ssl_blacklist', 10, 3 );

/*remove css version*/
function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 1000 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 1000 );


add_action( 'init', 'codex_cities_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_cities_init() {
	$labels = array(
		'name'               => _x( 'Cities', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'City', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Cities', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'City', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'City', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New City', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New City', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit City', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View City', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Cities', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search cities', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent cities:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No cities found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No cities found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'Post type for Cities' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'cities' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'cities', $args );
}
