<div class="col-12 p-0">
	<div class="row mb-3">
		<div class="col-6">
			<i class="fas fa-calendar-alt d-inline-block"></i>
			<div class="text-muted d-inline-block"><?php the_time( 'd/m/Y' ); ?></div>
		</div>
		<div class="col-6 text-right">
			<i class="fas fa-tags d-inline-block"></i>
			<div class="text-primary d-inline-block"><?php the_category( ' ' ); ?></div>
		</div>
	</div>
	<div class="card mb-4 shadow">
		<?php if (has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail( 'custom-size', array('class' => 'card-img-right img-fluid flex-auto d-none d-lg-block') ); ?>
			</a>
		<?php endif; ?>
		<div class="card-body d-flex flex-column align-items-start">
			<h3 class="mb-2">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
			<div class="card-text mb-auto"><?php the_excerpt(); ?></div>
		</div>
	</div>
</div>