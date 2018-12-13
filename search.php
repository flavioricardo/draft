<?php get_header(); ?>

<div class="row">

	<div class="col-8">

		<div class="card mb-3">
			<div class="card-body">
				<h3><?php _e( 'Search results for: ', 'draft' ); ?><em><?php echo get_search_query(); ?></em></h3>

				<?php get_search_form(); ?>
			</div>
		</div>

		<?php if ( have_posts() ) : ?>
			<?php while  ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'templates/content', 'search' ); ?>

			<?php endwhile; ?>

			<?php the_posts_pagination( array('screen_reader_text' => __( ' ', 'draft' )) ); ?>

		<?php else : ?>
			<?php _e( 'Sorry, no posts matched your criteria.', 'draft' ); ?>
		<?php endif; ?>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>