<aside class="col-4">

	<div class="sidebar-widget">
		<div class="section-call">
			<div class="text">ÚLTIMAS <strong>ANÁLISES</strong></div>
		</div>
		<div class="list-group">
			<?php
			$contador = 0;
			$the_query = new WP_Query(array('category__in' => 1, 'posts_per_page' => 4));
			if ($the_query->have_posts()) :
				while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<li class="list-group-item <?php echo ($contador == 0) ? 'active' : ''; ?>">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail(array(640, 360), array('class' => 'img-fluid')); ?>
						</a>
						<h4 class="list-group-item-heading"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<div class="list-group-item-text"><?php the_excerpt(); ?></div>
					</li>
			<?php
				$contador++;
				endwhile;
			endif;
			wp_reset_postdata();
			?>
		</div>
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