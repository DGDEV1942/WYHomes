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

<?php get_header($CORE->pageswitch()); ?>
	
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	 
	<?php hook_page_before(); ?>
 
	<div class="panel panel-default">
	 
	<div class="panel-heading"><?php the_title(); ?></div>
        
	<div class="panel-body">  
		
		<?php if ( has_post_thumbnail() ) { ?> <?php the_post_thumbnail('full',array("class" => "img-polaroid")); ?> <hr /> <?php } ?>
	
		<?php the_content(); ?>
                <?php if(is_front_page()){ ?>
                <div class="footer_top">
                    <div class="footer_topbox">
                        <ul id="footer-top1">
                            <?php dynamic_sidebar( 'Footer Top1' ); ?>
                        </ul>
                    </div>
                    <div class="footer_topbox f_border">
                        <ul id="footer-top2">
                            <?php dynamic_sidebar( 'Footer Top2' ); ?>
                        </ul>
                    </div>
                    <div class="footer_topbox">
                        <ul id="footer-top3">
                            <?php dynamic_sidebar( 'Footer Top3' ); ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>

	</div>
	 
	</div> 
 	
	<?php hook_page_after(); ?>
	
	<?php endwhile; endif; ?>
	 
<?php get_footer($CORE->pageswitch()); ?>