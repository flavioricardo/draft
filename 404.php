<?php get_header(); ?>

<div class="row">

	<div class="col-8">

		<h2><?php _e( 'Not Found' ); ?></h2>
		<div><?php _e( 'Sorry, no posts matched your criteria.' ); ?></div>
		<div class="mt-4">
			<?php the_widget( 'WP_Widget_Recent_Posts', array( 'title' => 'Latest Posts', 'number' => 3 ) ); ?>
		</div>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>