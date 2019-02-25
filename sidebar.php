<aside class="col-4">

	<div class="sidebar-widget mb-4">
		<?php
		$contador = 0;
		$the_query = new WP_Query(array('category__in' => 2, 'posts_per_page' => 5));
		if ($the_query->have_posts()) : ?>
			<div class="section-call">
				<h3>Últimas <strong>Análises</strong></h3>
			</div>
			<ul class="list-group shadow">
			<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<?php if ($contador == 0) : ?>
					<li class="list-group-item">
						<a class="card-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail(array(640, 360), array('class' => 'card-img-top img-fluid flex-auto d-none d-lg-block mt-1 mb-3')); ?>
						</a>
						<h4 class="card-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h4>
						<p class="card-text"><?php the_excerpt(); ?></p>
					</li>
				<?php else : ?>
					<li class="list-group-item">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</li>
				<?php endif; ?>
		<?php
			$contador++;
			endwhile; ?>
			</ul>
		<?php endif;
		wp_reset_postdata();
		?>
	</div>

	<div class="sidebar-widget">
		<?php if ( is_active_sidebar( 'sidebar-1' ) && !is_single() ) : ?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		<?php endif; ?>
	</div>

	<div class="sidebar-widget">
		<?php if ( is_active_sidebar( 'sidebar-2' ) && is_single() ) : ?>
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		<?php endif; ?>
	</div>

</aside>