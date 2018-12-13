<?php get_header(); ?>

<div class="row">

	<?php
		$args = array(
			'posts_per_page' => 2,
			'post__in' => get_option( 'sticky_posts' ),
		);
	?>
	<?php $sticky_posts = new WP_Query( $args ); ?>
	<?php if ( $sticky_posts->have_posts() ) : ?>
		<?php while  ( $sticky_posts->have_posts() ) : $sticky_posts->the_post(); ?>

			<?php get_template_part( 'templates/content', 'sticky' ); ?>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

	<div class="col-8">

		<?php do_action( 'draft_banner_area' ); ?>

		<?php
			$args = array(
				'paged' => (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 0,
				'post__not_in' => get_option( 'sticky_posts' )
			);
		?>
		<?php $the_query = new WP_Query( $args ); ?>
		<?php if ( $the_query->have_posts() ) : ?>
			<?php while  ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<?php get_template_part( 'templates/content', get_post_format() ); ?>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

			<div class="navigation mb-3">
				<?php the_posts_pagination( array('screen_reader_text' => __( ' ', 'draft' )) ); ?>
			</div>

		<?php else : ?>
			<?php _e( 'Sorry, no posts matched your criteria.', 'draft' ); ?>
		<?php endif; ?>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>