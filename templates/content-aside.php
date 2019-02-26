<article <?php post_class( 'blog-post col-12 shadow pl-3 pr-3 pt-1 pb-1 mb-4 bg-white' ); ?>>
	<div class="mt-4">
		<a class="float-left mr-1" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">#</a>
		<?php the_content(); ?>
	</div>
</article>