<article <?php post_class( 'blog-post' ); ?>>
	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

	<div class="blog-post-meta">
		<div class="row mb-3">
			<div class="col-6 d-none d-lg-inline-block">
				<i class="fas fa-calendar-alt d-none d-lg-inline-block"></i>
				<div class="d-inline-block">Por <?php the_author_posts_link(); ?> em <?php the_time( 'd/m/Y' ); ?></div>
			</div>
			<div class="col-6 d-none d-lg-inline-block text-right">
				<i class="fas fa-tags d-none d-lg-inline-block"></i>
				<div class="d-inline-block"><?php the_category( ' ' ); ?></div>
			</div>
		</div>
	</div>

	<?php the_excerpt(); ?>
</article>