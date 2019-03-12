<article <?php post_class( 'blog-post col-12 p-0' ); ?>>
	<div class="row mb-3 d-none d-lg-flex">
		<div class="col-6 d-none d-lg-inline-block">
			<i class="fas fa-calendar-alt d-none d-lg-inline-block"></i>
			<div class="d-inline-block">Por <?php the_author_posts_link(); ?> em <?php the_time( 'd/m/Y' ); ?></div>
		</div>
		<div class="col-6 d-none d-lg-inline-block text-right">
			<i class="fas fa-tags d-none d-lg-inline-block"></i>
			<div class="d-inline-block"><?php the_category( ' ' ); ?></div>
		</div>
	</div>
	<div class="card mb-4 shadow-sm rounded-0">
		<?php if (has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail( 'large', array('class' => 'img-fluid flex-auto d-none d-lg-block') ); ?>
			</a>
		<?php endif; ?>
		<div class="card-body d-flex flex-column align-items-start">
			<h3 class="mb-2">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
			<div class="card-text mb-auto"><?php the_excerpt(); ?></div>
		</div>
	</div>
</article>