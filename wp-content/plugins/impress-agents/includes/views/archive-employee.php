<?php
/**
 * The template for displaying Employee Archive pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package IMPress Agents
 * @since 0.9.0
 */

add_action('wp_enqueue_scripts', 'enqueue_single_employee_scripts');
function enqueue_single_employee_scripts() {
	wp_enqueue_style( 'font-awesome' );
}

add_filter('body_class', 'add_body_class');

function add_body_class($classes) {
    $classes[] = 'archive-employee';
    return $classes;
}

function archive_employee_loop() {
	$class = '';
	$i = 4;

	if ( have_posts() ) : while ( have_posts() ) : the_post();

	// starting at 4
	if ($i == 4) {
		$class = 'first one-fourth agent-wrap';
		$i = 0;
	}
	else {
		$class = 'one-fourth agent-wrap';
	}

	//increase count by 1
	$i++;

	$post_id = get_the_id();
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id, 'employee-thumbnail', true);

	$postMeta= get_post_meta($post_id);	
	?>
	<section class="wh-home">
		<div class="container">
			<div class="row"> 
				<div class="main-part-here">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<div class="wh-home-view">
							<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
							<span class="view-image-sec">
							<a href="<?php echo get_permalink(); ?>"><img src="<?php echo $thumb_url[0]; ?>" alt="<?php echo get_the_title(); ?>-photo" class="attachment-employee-thumbnail wp-post-image" itemprop="image" /></a>
							</span>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
							<div class="wh-home-view-detail">
							<h2><?php printf('<a class="fn" href="%s" itemprop="name">%s</a>', get_permalink(), get_the_title() );?></h2>
							<p><?php echo $postMeta['_employee_title'][0]; ?></p>
							</div>
						 </div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 respon">				
					<div class="middle-detail">
										
						<?php if(!empty($postMeta['_employee_phone'][0])):  ?>
						<p><strong>Office: </strong> <?php echo $postMeta['_employee_phone'][0]; ?></p> 
						<?php endif;?>
						<?php if(!empty($postMeta['_employee_mobile'][0])):  ?>
						<p><strong>Cell: </strong> <?php echo $postMeta['_employee_mobile'][0]; ?></p>
						<?php endif;?>
						<?php if(!empty($postMeta['_employee_agentofficefax'][0])):  ?>
						<p><strong>Fax: </strong><?php echo $postMeta['_employee_agentofficefax'][0]; ?></p>
						<?php endif;?>
						<p>
							<?php echo impa_employee_social(); ?>
						</p> 
					</div>
				</div>
				<?php
				$address1 = $postMeta['_employee_address'][0]. ', '.$postMeta['_employee_city'][0];
				$address2 = $postMeta['_employee_state'][0]. ', '.$postMeta['_employee_zip'][0];
				
				
				?>
				
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 respon">
				
             <div class="right-side-detail">
              <p><a href="mailto:<?php echo $postMeta['_employee_email'][0]; ?>"><?php echo $postMeta['_employee_email'][0]; ?></a></p>
              <p><a href="http://<?php echo $postMeta['_employee_website'][0]; ?>" target="_blank"><?php echo $postMeta['_employee_website'][0]; ?></a></p>
              <p><?php if(!empty ($postMeta['_employee_address'][0])){ echo $address1; } ?></p>
              <p><?php if(!empty ($postMeta['_employee_state'][0])){ echo $address2; }?></p>
             </div>
           </div>

				
				<?php
				if (function_exists('_p2p_init') && function_exists('agentpress_listings_init') || function_exists('_p2p_init') && function_exists('wp_listings_init')) {

					$has_listings = impa_has_listings( $post_id );
					if (!empty($has_listings)) {
						echo '<p><a class="agent-listings-link" href="' . get_permalink() . '#agent-listings">View My Listings</a></p>';
					}
				}
				

				?>
			
	
				</div>
			</div>
		</div> 
	</section>
	

	<?php endwhile;
		if (function_exists('equity')) {
			equity_posts_nav();
		} elseif (function_exists('genesis_init')) {
			genesis_posts_nav();
		} else {
			impress_agents_paging_nav();
		}

	else : ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif;

}

if (function_exists('equity')) {

	add_filter( 'equity_pre_get_option_site_layout', '__equity_return_full_width_content' );
	remove_action( 'equity_entry_header', 'equity_post_info', 12 );
	remove_action( 'equity_entry_footer', 'equity_post_meta' );

	remove_action( 'equity_loop', 'equity_do_loop' );
	add_action( 'equity_loop', 'archive_employee_loop' );

	equity();

} elseif (function_exists('genesis_init')) {

	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
	remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
	remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
	remove_action( 'genesis_after_entry', 'genesis_do_author_box_single' );

	remove_action( 'genesis_loop', 'genesis_do_loop' );
	add_action( 'genesis_loop', 'archive_employee_loop' );

	genesis();

} else {

get_header();
if($options['impress_agents_custom_wrapper'] && $options['impress_agents_start_wrapper']) {
	echo $options['impress_agents_start_wrapper'];
} else {
	echo '<div id="primary" class="content-area container inner">
		<div id="content" class="site-content" role="main">';
}
	if ( have_posts() ) : ?>

		<header class="archive-header">
			<?php
			$object = get_queried_object();

			if ( !isset($object->label) ) {
				$title = '<h1 class="archive-title">' . $object->name . '</h1>';
			} else {
				//$title = '<h1 class="archive-title">' . get_bloginfo('name') . ' Employees</h1>';
				$title = "<h1 class='archive-title'> Wyoming's Top Agents </h1>";
			}

			echo $title; ?>

			<small><?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?></small>
		</header><!-- .archive-header -->

	<?php

	archive_employee_loop();

	else :
		// If no content, include the "No posts found" template.
		get_template_part( 'content', 'none' );

	endif;

if($options['impress_agents_custom_wrapper'] && $options['impress_agents_end_wrapper']) {
	echo $options['impress_agents_end_wrapper'];
} else {
	echo '</div><!-- #content -->
	</div><!-- #primary -->';
}
get_sidebar();
get_footer();

}
