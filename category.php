<?php get_header(); ?>

<div class="row">

	<div class="col-sm-12 col-lg-8">

		<div class="card mb-4">
			<div class="card-body">
				<h3><?php single_cat_title(); ?></h3>
				<?php the_archive_description(); ?>
			</div>
		</div>

		<?php if ( have_posts() ) : ?>
			<?php while  ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'templates/content', get_post_format() ); ?>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

			<div class="navigation">
				<?php wp_pagenavi(); ?>
			</div>

		<?php else : ?>
			<?php _e( 'Sorry, no posts matched your criteria.', 'draft' ); ?>
		<?php endif; ?>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
