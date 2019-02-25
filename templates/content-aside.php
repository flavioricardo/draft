<article class="blog-post col-12 shadow p-3 mb-4 bg-white <?php post_class(); ?>">
	<div class="mt-4">
		<a class="float-left mr-1" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">#</a>
		<?php the_content(); ?>
	</div>
</article>