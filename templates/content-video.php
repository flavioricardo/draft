<article class="blog-post">
	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

	<div class="blog-post-meta">
		<span class="date"><?php the_time( 'F j, Y' ); ?> <?php the_time( 'g:i a' ); ?></span>
		<span class="avatar"><?php echo get_avatar( get_the_author_meta('ID'), 32 ); ?></span>
		<span class="author"><?php the_author_posts_link(); ?></span>
		<span class="comments"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply' ) . '</span>', __( '1 Reply' ), __( '% Replies' ) ); ?></span>
	</div>

	<div class="mt-3">
		<?php the_content(); ?>
	</div>

	<div class="blog-post-categories mb-4">
		<span class="category"><?php _e( 'Categories: ' ); ?><?php the_category( ' ' ); ?></span>
		<span class="tags"><?php the_tags( __( 'Tags:&nbsp;' ), ', ', '' ); ?></span>
	</div>
</article>