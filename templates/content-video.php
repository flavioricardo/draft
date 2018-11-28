<article class="blog-post">
	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

	<div class="mt-4">
		<?php the_content(); ?>
	</div>

	<div class="blog-post-categories mb-4">
		<span class="category"><?php _e( 'Categories: ' ); ?><?php the_category( ' ' ); ?></span>
		<span class="tags"><?php the_tags( __( 'Tags:&nbsp;' ), ', ', '' ); ?></span>
	</div>
</article>