<aside class="col-sm-12 col-lg-4">

	<div class="sidebar-widget mb-4">
		<?php
		date_default_timezone_set( 'America/Sao_Paulo' );
		$first_day_of_the_week = 'Sunday';
		$start_of_the_week     = strtotime("Last $first_day_of_the_week");

		if ( strtolower(date('l')) === strtolower($first_day_of_the_week) )
			$start_of_the_week = strtotime('today');

		$end_of_the_week = $start_of_the_week + (60 * 60 * 24 * 7) - 1;

		$start_of_the_week = date('d/m/Y', $start_of_the_week);
		$end_of_the_week = date('d/m/Y', $end_of_the_week);

		$lancamentos = new WP_Query( array( 'posts_per_page' => -1, 'post_type' => 'lancamentos',
		'meta_key' => 'data_de_lancamento', 'orderby' => 'meta_value', 'order' => 'ASC',
		'meta_query' => array(
			array(
				'key' => 'data_de_lancamento',
				'value' => array($start_of_the_week, $end_of_the_week),
				'compare' => 'BETWEEN'
			)
		) ) );

		if ( $lancamentos->have_posts() ) : ?>
			<div class="section-call">
				<h3>Próximos <strong>Lançamentos</strong></h3>
			</div>
			<?php while ( $lancamentos->have_posts() ) : $lancamentos->the_post(); ?>
				<div class="card shadow-sm rounded-0 mb-3">
					<div class="row no-gutters">
						<div class="col-md-4">
							<a href="<?php echo get_tag_link(get_field('tag_do_jogo')); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail( 'small', array('class' => 'img-fluid flex-auto d-none d-lg-block card-img rounded-0')); ?>
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
		<?php
			wp_reset_postdata();
		endif;
		?>
	</div>

	<div class="sidebar-widget mb-4">
		<?php
		$current_post = 0;
		$analises = new WP_Query( array( 'category__in' => 25, 'posts_per_page' => 6 ) );
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
		<?php
			wp_reset_postdata();
		endif;
		?>
	</div>

	<div class="sidebar-widget mb-4">
		<div class="section-call">
			<h3>Agenda <strong>eSports</strong></h3>
		</div>
		<div class="card shadow-sm rounded-0">
			<div class="list-group" role="tablist">
				<?php
				$campeonatos = get_terms( array( 'taxonomy' => 'campeonatos', 'childless' => true ) );
				foreach ($campeonatos as $c => $campeonato) : ?>
					<a class="list-group-item list-group-item-action rounded-0 border-0 <?php echo ($c == 0) ? 'active' : ''; ?>" id="list-<?php echo $campeonato->slug; ?>-list" data-toggle="list" href="#list-<?php echo $campeonato->slug; ?>" role="tab" aria-controls="<?php echo $campeonato->slug; ?>"><?php echo $campeonato->name; ?></a>
				<?php
				endforeach; ?>
			</div>
		</div>
		<div class="tab-content">
			<?php
			$campeonatos = get_terms( array( 'taxonomy' => 'campeonatos', 'childless' => true ) );
			foreach ($campeonatos as $c => $campeonato) : ?>
				<div class="tab-pane fade <?php echo ($c == 0) ? 'active show' : ''; ?>" id="list-<?php echo $campeonato->slug; ?>" role="tabpanel" aria-labelledby="list-<?php echo $campeonato->slug; ?>-list">
					<?php
					$partidas = new WP_Query( array( 'posts_per_page' => -1, 'post_type' => 'partidas',
					'meta_key' => array( 'data', 'hora' ), 'orderby' => array( 'data' => 'ASC', 'hora' => 'ASC' ),
					'tax_query' => array( array ( 'taxonomy' => 'campeonatos', 'field' => 'slug', 'terms' => $campeonato->slug ) ) ) );
					if ( $partidas->have_posts() ) :
						while ( $partidas->have_posts() ) : $partidas->the_post(); ?>
							<div class="row mt-2 text-center shadow-sm border m-0 pb-1">
								<div class="col-3 align-self-center">
									<?php $time_casa = get_field('time_casa'); ?>
									<img src="<?php echo $time_casa['url']; ?>" class="img-fluid" alt="<?php echo $time_casa['alt']; ?>">
								</div>
								<div class="col-6 align-self-center">
									<h3 class="align-middle text-dark font-weight-bold m-0">x</h3>
									<div class="d-block text-secondary"><?php the_field('data_exibicao'); ?></div>
									<div class="d-block text-secondary"><?php the_field('hora'); ?></div>
									<?php if (!empty(get_field('transmissao'))) : ?>
										<div class="d-block text-secondary font-italic"><a href="<?php the_field('transmissao'); ?>">Transmissão</a></div>
									<?php endif; ?>
								</div>
								<div class="col-3 align-self-center">
									<?php $time_fora = get_field('time_fora'); ?>
									<img src="<?php echo $time_fora['url']; ?>" class="img-fluid" alt="<?php echo $time_fora['alt']; ?>" />
								</div>
							</div>
						<?php
						endwhile;
						wp_reset_postdata();
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
        <div class="excerpt"><?php bloginfo( 'description' ); ?></div>
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