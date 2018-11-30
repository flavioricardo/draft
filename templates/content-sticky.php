<div class="col-6">
	<div class="card flex-md-row mb-4 shadow h-md-250">
		<div class="card-body d-flex flex-column align-items-start">
			<strong class="d-inline-block text-primary"><?php the_category( ' ' ); ?></strong>
			<h3 class="mb-auto">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
			<div class="text-muted"><?php the_time( 'M j' ); ?></div>
			<div class="card-text mb-auto"><?php the_excerpt(); ?></div>
		</div>
		<?php if (has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail( 'custom-size', array('class' => 'card-img-right flex-auto d-none d-lg-block') ); ?>
			</a>
		<?php endif; ?>
	</div>
</div>