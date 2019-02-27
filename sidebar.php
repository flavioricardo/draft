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
					<li class="list-group-item list-group-item-action rounded-0">
						<a class="card-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail( 'large', array('class' => 'img-fluid flex-auto d-none d-lg-block mt-1 mb-2')); ?>
						</a>
						<h4 class="card-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h4>
						<p class="card-text"><?php the_excerpt(); ?></p>
					</li>
				<?php else : ?>
					<li class="list-group-item list-group-item-action rounded-0">
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

	<div class="sidebar-widget mb-4">
        <div class="section-call">
            <h3>Sobre o <strong>Blog</strong></h3>
        </div>
        <div class="excerpt">O Conversa de Sofá é um blog com notícias, dicas e tutoriais sobre jogos, análises e novidades sobre os últimos lançamentos e cobertura de eventos.</div>
        <?php
		wp_nav_menu( array(
			'theme_location'  => 'social',
			'depth'	          => 2,
			'container'       => 'ul',
			'menu_class' => 'mt-3',
		) );
		?>
    </div>

    <div class="sidebar-widget mb-4">
        <div class="section-call">
            <h3>Redes <strong>Sociais</strong></h3>
        </div>
        <div class="fb-page" data-href="https://www.facebook.com/conversadesofa" data-height="260" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/conversadesofa"><a href="https://www.facebook.com/conversadesofa">Conversa de Sofá</a></blockquote></div></div>
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