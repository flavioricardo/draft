<article class="blog-post">
	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

	<div class="blog-post-meta">
		<span class="date"><?php the_time( 'F j, Y' ); ?> <?php the_time( 'g:i a' ); ?></span>
		<span class="avatar"><?php echo get_avatar( get_the_author_meta('ID'), 32 ); ?></span>
		<span class="author"><?php the_author_posts_link(); ?></span>
		<span class="comments"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'draft' ) . '</span>', __( '1 Reply', 'draft' ), __( '% Replies', 'draft' ) ); ?></span>
	</div>

	<?php if ( has_post_thumbnail() && !get_post_format() ) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid mt-2 mb-2' ) ); ?>
		</a>
	<?php endif; ?>

	<?php if ( get_post_format() && get_post_format() == 'video' ) : ?>
		<div class="d-block mt-3"></div>
	<?php endif; ?>

	<?php the_content(); ?>

	<div class="blog-post-categories mb-2">
		<span class="category"><?php _e( 'Categories: ', 'draft' ); ?><?php the_category( ' ' ); ?></span>
		<span class="tags"><?php the_tags( __( 'Tags:&nbsp;', 'draft' ), ', ', '' ); ?></span>
	</div>
</article>