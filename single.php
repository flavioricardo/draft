<?php get_header(); ?>

<div class="main">

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<?php if (has_post_thumbnail()) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(array(120, 120)); ?>
				</a>
			<?php endif; ?>

			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<span class="avatar"><?php echo get_avatar( get_the_author_meta('ID'), 32 ); ?></span>
			<span class="author"><?php the_author_posts_link(); ?></span>
			<span class="comments"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply' ) . '</span>', __( '1 Reply' ), __( '% Replies' ) ); ?></span>

			<?php the_content(); ?>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link(); ?></div>
			<div class="alignright"><?php next_post_link(); ?></div>
		</div>

		<?php wp_list_comments( array('style' => 'ol') ); ?>

	<?php else : ?>
		<?php _e('Sorry, no posts matched your criteria.'); ?>
	<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>