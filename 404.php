<?php get_header(); ?>

<div class="row">

	<div class="col-8">

		<h2><?php _e( 'Not Found', 'draft' ); ?></h2>
		<div><?php _e( 'Sorry, no posts matched your criteria.', 'draft' ); ?></div>
		<div class="mt-4">
			<?php the_widget( 'WP_Widget_Recent_Posts', array( 'title' => __( 'Latest Posts', 'draft' ), 'number' => 3 ) ); ?>
		</div>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>