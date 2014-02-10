<div class="sidebar">

	<?php get_template_part('searchform'); ?>

	<div class="sidebar-widget">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1') ) ?>
	</div>

	<div class="sidebar-widget">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-2') ) ?>
	</div>

</div>