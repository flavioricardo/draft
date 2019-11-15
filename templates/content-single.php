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

	<div class="font-italic">
		<?php the_excerpt(); ?>
	</div>

	<?php if ( has_post_thumbnail() && !get_post_format() ) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail( 'large', array('class' => 'img-fluid flex-auto mb-3') ); ?>
		</a>
	<?php endif; ?>

	<?php if ( get_post_format() && get_post_format() == 'video' ) : ?>
		<div class="d-block mt-3"></div>
	<?php endif; ?>

	<?php the_content(); ?>
	<?php wp_link_pages(); ?>

	<div class="row">
		<div class="col-lg-9">
			<i class="fas fa-bookmark d-none d-lg-inline-block"></i>
			<div class="d-inline"><?php the_tags( '', ', ', '' ); ?></div>
		</div>

		<?php do_action( 'after_article' ); ?>
	</div>

	<div class="row d-none d-lg-flex mb-4 shadow-sm pt-2 pb-3 align-middle">
		<div class="col-lg-2 mt-2">
			<?php echo get_avatar(get_the_author_meta('ID'), 90, array('class' => 'avatar')); ?>
		</div>
		<div class="col-lg-10">
			<?php $display_name = explode( ' ', get_the_author_meta('display_name') ); ?>
			<div class="text-left"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo $display_name[0]; ?> <strong><?php echo $display_name[1]; ?></strong></a></div>
			<div class="text-left font-italic"><?php echo get_the_author_meta('description'); ?></div>
		</div>
	</div>
</article>