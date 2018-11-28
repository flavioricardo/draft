<?php get_header(); ?>

<div class="row">

	<?php $the_query = new WP_Query( array('category_name' => 'home', 'posts_per_page' => 2) ); ?>
	<?php if ( $the_query->have_posts() ) : ?>
		<?php while  ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div class="col-6">
				<div class="card flex-md-row mb-4 shadow-sm h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
						<strong class="d-inline-block text-primary"><?php the_category( ' ' ); ?></strong>
						<h3 class="mb-auto">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h3>
						<div class="text-muted"><?php the_time( 'M j' ); ?></div>
						<div class="card-text mb-auto"><?php the_excerpt(); ?></div>
						<a href="<?php the_permalink(); ?>">Continue reading</a>
					</div>
					<?php if (has_post_thumbnail()) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail( 'custom-size', array('class' => 'card-img-right flex-auto d-none d-lg-block') ); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

	<div class="col-8">

		<?php if ( have_posts() ) : ?>
			<?php while  ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'templates/content', get_post_format() ); ?>

			<?php endwhile; ?>

			<div class="navigation">
				<?php posts_nav_link(); ?>
			</div>

		<?php else : ?>
			<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
		<?php endif; ?>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>