<?php
get_header('listing');
?>
	<div class="container">
		<div class="panel panel-default">
		<div class="panel-heading"><?php the_title(); ?> <span style="background-color:transparent;padding:0px;"><small><i> </i></small></span></div>
		</div>
	</div>
	<div class="container">
	<?php if (!isset($_GET['sr_vendor'])) echo '<div class="container">'; ?>
	<?php the_content(); ?>
	<?php if (!isset($_GET['sr_vendor'])) echo '</div>'; ?>
	</div>

<?php
get_footer('listing');
?>