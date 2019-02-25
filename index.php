<?php get_header(); ?>

<div class="row">

	<div class="col-8">

		<?php do_action( 'draft_banner_area' ); ?>

		<?php if (have_posts()) : ?>

			<?php $count = 0; ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php if ($count == 0) : ?>

					<?php get_template_part( 'templates/content', 'sticky' ); ?>

				<?php else : ?>

					<?php get_template_part( 'templates/content', get_post_format() ); ?>

				<?php endif; ?>

				<?php $count++; ?>

			<?php endwhile; ?>

			<div class="navigation mb-3">

				<?php wp_pagenavi(); ?>

			</div>
		<?php else : ?>

			<?php _e( 'Sorry, no posts matched your criteria.', 'draft' ); ?>

		<?php endif; ?>
		<?php wp_reset_postdata(); ?>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>