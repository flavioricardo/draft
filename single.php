<?php get_header(); ?>

<div class="row">

	<div class="col-8">

		<?php if ( have_posts() ) : ?>
			<?php while  ( have_posts() ) : the_post(); ?>

				<article class="blog-post">
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail( 'medium' ); ?>
						</a>
					<?php endif; ?>

					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

					<div class="blog-post-meta">
						<span class="date"><?php the_time( 'F j, Y' ); ?> <?php the_time( 'g:i a' ); ?></span>
						<span class="avatar"><?php echo get_avatar( get_the_author_meta('ID'), 32 ); ?></span>
						<span class="author"><?php the_author_posts_link(); ?></span>
						<span class="comments"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply' ) . '</span>', __( '1 Reply' ), __( '% Replies' ) ); ?></span>
					</div>

					<?php the_content(); ?>

					<div class="blog-post-categories mb-2">
						<span class="category"><?php _e( 'Categories: ' ); ?><?php the_category( ' ' ); ?></span>
						<span class="tags"><?php the_tags( __( 'Tags:&nbsp;' ), ', ', '' ); ?></span>
					</div>
				</article>

			<?php endwhile; ?>

			<div class="text-left"><?php previous_post_link(); ?></div>
			<div class="text-right"><?php next_post_link(); ?></div>

			<ol class="comment list">
				<?php wp_list_comments( array('style' => 'ol') ); ?>
			</ol>

		<?php else : ?>
			<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
		<?php endif; ?>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>