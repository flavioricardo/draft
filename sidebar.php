<aside class="col-4">

	<div class="sidebar-widget mb-4">
		<?php
		$lancamentos = new WP_Query( array( 'posts_per_page' => 5, 'post_type' => 'lancamentos',
		'meta_key' => 'data_de_lancamento', 'orderby' => 'meta_value', 'order' => 'ASC' ) );
		if ( $lancamentos->have_posts() ) : ?>
			<div class="section-call">
				<h3>Próximos <strong>Lançamentos</strong></h3>
			</div>
			<?php while ( $lancamentos->have_posts() ) : $lancamentos->the_post(); ?>
				<div class="card shadow-sm rounded-0 mb-3">
					<div class="row no-gutters">
						<div class="col-md-4">
							<a href="<?php echo get_tag_link(get_field('tag_do_jogo')); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail( 'small', array('class' => 'img-fluid flex-auto card-img rounded-0')); ?>
							</a>
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<p class="card-title"><i class="fas fa-gamepad mr-2"></i><a href="<?php echo get_tag_link(get_field('tag_do_jogo')); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
								<p class="card-text"><i class="fas fa-calendar-alt mr-2"></i><?php echo the_field('data_de_lancamento'); ?></p>
								<p class="card-text">
									<i class="fas fa-desktop"></i>
									<?php
									foreach (get_field('plataformas') as $key => $plataforma) : ?>
										<a class="d-inline-block" href="<?php echo get_tag_link($plataforma); ?>" title="<?php echo get_tag($plataforma)->name; ?>"><?php echo get_tag($plataforma)->name; ?></a><?php echo ($key < count(get_field('plataformas')) - 1) ? ',' : ''; ?>
									<?php
									endforeach; ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif;
		wp_reset_postdata();
		?>
	</div>

	<div class="sidebar-widget mb-4">
		<?php
		$current_post = 0;
		$analises = new WP_Query( array( 'category__in' => 25, 'posts_per_page' => 5 ) );
		if ( $analises->have_posts() ) : ?>
			<div class="section-call">
				<h3>Últimas <strong>Análises</strong></h3>
			</div>
			<ul class="list-group shadow-sm">
			<?php while ( $analises->have_posts() ) : $analises->the_post(); ?>
				<?php if ($current_post == 0) : ?>
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
			$current_post++;
			endwhile; ?>
			</ul>
		<?php endif;
		wp_reset_postdata();
		?>
	</div>

	<div class="sidebar-widget mb-4">
		<div class="section-call">
			<h3>Calendário <strong>eSports</strong></h3>
		</div>
		<ul class="nav nav-pills" role="tablist">
			<?php
			$campeonatos = get_terms( array( 'taxonomy' => 'campeonatos', 'childless' => true ) );
			foreach ($campeonatos as $campeonato) : ?>
				<li class="nav-item">
					<a class="nav-link" id="<?php echo $campeonato->slug; ?>-tab" data-toggle="tab" href="#<?php echo $campeonato->slug; ?>" role="tab" aria-controls="<?php echo $campeonato->slug; ?>" aria-selected="true"><?php echo $campeonato->name; ?></a>
				</li>
			<?php
			endforeach; ?>
		</ul>
		<div class="tab-content">
			<?php
			$campeonatos = get_terms( array( 'taxonomy' => 'campeonatos', 'childless' => true ) );
			foreach ($campeonatos as $campeonato) : ?>
				<div class="tab-pane fade" id="<?php echo $campeonato->slug; ?>" role="tabpanel" aria-labelledby="<?php echo $campeonato->slug; ?>-tab">
					<?php
					$partidas = new WP_Query( array( 'posts_per_page' => 5, 'post_type' => 'partidas',
					'tax_query' => array( array ( 'taxonomy' => 'campeonatos', 'field' => 'slug', 'terms' => $campeonato->slug ) ) ) );
					if ( $partidas->have_posts() ) :
						while ( $partidas->have_posts() ) : $partidas->the_post(); ?>
							<div class="row">
								<div class="col-5">
									<img src="<?php the_field('time_casa'); ?>" class="img-fluid" alt="">
								</div>
								<div class="col-2">
									<?php the_field('etapa'); ?>
									<?php the_field('data_e_hora'); ?>
								</div>
								<div class="col-5">
									<img src="<?php the_field('time_fora'); ?>" class="img-fluid" alt="">
								</div>
							</div>
						<?php
						endwhile;
					endif; ?>
				</div>
			<?php
			endforeach; ?>
		</div>
	</div>

	<div class="sidebar-widget mb-4">
        <div class="section-call">
            <h3>Sobre o <strong>Blog</strong></h3>
        </div>
        <div class="excerpt">O Conversa de Sofá é um blog com notícias, dicas e tutoriais sobre jogos, análises e novidades sobre os últimos lançamentos e cobertura de eventos.</div>
        <?php
		wp_nav_menu( array(
			'theme_location'  => 'sidebar',
			'depth'	          => 2,
			'container'       => 'ul',
			'menu_class' => 'mt-3',
		) );
		?>
    </div>

    <div class="sidebar-widget mb-4 d-none d-lg-block">
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