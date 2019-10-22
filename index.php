<?php get_header(); ?>

<div class="row">

	<div class="col-sm-12 col-lg-8">

		<?php do_action( 'draft_banner_area' ); ?>

		<?php if ( have_posts() ) : ?>
			<?php $current_post = 0; ?>

			<div class="section-call">
                <h3>Últimas do <strong>Site</strong></h3>
            </div>

			<?php while  ( have_posts() ) : the_post(); ?>
				<?php if ($current_post == 0) : ?>
					<?php get_template_part( 'templates/content', 'sticky' ); ?>
				<?php else : ?>
					<?php get_template_part( 'templates/content', get_post_format() ); ?>
				<?php endif; ?>
				<?php $current_post++; ?>
			<?php endwhile; ?>

			<div class="navigation mb-4">
				<?php wp_pagenavi(); ?>
			</div>

			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<?php _e( 'Sorry, no posts matched your criteria.', 'draft' ); ?>
		<?php endif; ?>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>