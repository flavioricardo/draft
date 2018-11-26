<?php get_header(); ?>

<div class="row">

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<div class="col-md-6">
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
							<?php the_post_thumbnail( 'thumbnail', array('class' => 'card-img-right flex-auto d-none d-lg-block') ); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>

		<?php endwhile; ?>
	<?php endif; ?>

	<div class="col-md-8">

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				
				<div class="blog-post">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

					<div class="blog-post-meta">
						<span class="date"><?php the_time( 'F j, Y' ); ?> <?php the_time( 'g:i a' ); ?></span>
						<span class="avatar"><?php echo get_avatar( get_the_author_meta('ID'), 32 ); ?></span>
						<span class="author"><?php the_author_posts_link(); ?></span>
						<span class="comments"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply' ) . '</span>', __( '1 Reply' ), __( '% Replies' ) ); ?></span>
					</div>

					<?php the_excerpt(); ?>
				</div>

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