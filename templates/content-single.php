<article class="blog-post <?php post_class(); ?>">
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

	<?php if ( has_post_thumbnail() && !get_post_format() ) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail( 'custom-size', array( 'class' => 'img-fluid mb-2' ) ); ?>
		</a>
	<?php endif; ?>

	<?php if ( get_post_format() && get_post_format() == 'video' ) : ?>
		<div class="d-block mt-3"></div>
	<?php endif; ?>

	<?php the_content(); ?>
	<?php wp_link_pages(); ?>

	<div class="blog-post-categories mb-2">
		<span class="category"><?php _e( 'Categories: ', 'draft' ); ?><?php the_category( ' ' ); ?></span>
		<span class="tags"><?php the_tags( __( 'Tags:&nbsp;', 'draft' ), ', ', '' ); ?></span>
	</div>

	<?php do_action( 'after_article' ); ?>
</article>