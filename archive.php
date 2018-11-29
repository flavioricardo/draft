<?php get_header(); ?>

<div class="row">

	<div class="col-8">

		<div class="card mb-3">
			<div class="card-body">
				<?php the_archive_title( '<h3>', '</h3>' ); ?>
				<?php the_archive_description(); ?>
			</div>
		</div>

		<?php if ( have_posts() ) : ?>
			<?php while  ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'templates/content', get_post_format() ); ?>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

			<div class="navigation mb-3">
				<?php the_posts_pagination( array('screen_reader_text' => ' ') ); ?>
			</div>

		<?php else : ?>
			<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
		<?php endif; ?>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>