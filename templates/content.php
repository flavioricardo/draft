<article <?php post_class( 'blog-post mb-3' ); ?>>
	<div class="row">
		<div class="col-lg-4">
			<?php if ( has_post_thumbnail() && !get_post_format() ) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail( 'custom-size', array('class' => 'img-fluid flex-auto mb-3') ); ?>
				</a>
			<?php endif; ?>
		</div>

		<div class="col-lg-8">
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

			<div class="blog-post-meta">
				<div class="row mb-2">
					<div class="col-7 d-none d-lg-inline-block">
						<i class="fas fa-calendar-alt d-none d-lg-inline-block"></i>
						<div class="d-inline-block"><?php the_author_posts_link(); ?> em <?php the_time( 'd/m/Y' ); ?></div>
					</div>
					<div class="col-5 d-none d-lg-inline-block text-right">
						<i class="fas fa-tags d-none d-lg-inline-block"></i>
						<div class="d-inline-block"><?php the_category( ' ' ); ?></div>
					</div>
				</div>
			</div>

			<?php the_excerpt(); ?>
		</div>
	</div>
</article>