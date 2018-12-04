<?php get_header(); ?>

<div class="row">

	<div class="col-8">

		<?php if ( have_posts() ) : ?>
			<?php while  ( have_posts() ) : the_post(); ?>

				<article class="blog-post">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

					<div class="blog-post-meta">
						<span class="date"><?php the_time( 'F j, Y' ); ?> <?php the_time( 'g:i a' ); ?></span>
						<span class="avatar"><?php echo get_avatar( get_the_author_meta('ID'), 32 ); ?></span>
						<span class="author"><?php the_author_posts_link(); ?></span>
					</div>

					<?php the_content(); ?>
				</article>

			<?php endwhile; ?>

		<?php else : ?>
			<?php _e( 'Sorry, no posts matched your criteria.', 'draft' ); ?>
		<?php endif; ?>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>