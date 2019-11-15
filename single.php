<?php get_header(); ?>

<div class="row">

	<div class="col-sm-12 col-lg-8">

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>

				<?php get_template_part('templates/content', 'single'); ?>

				<?php if (comments_open() || get_comments_number()) : ?>
					<?php comments_template(); ?>
				<?php endif; ?>

			<?php endwhile; ?>

			<div class="row">
				<div class="text-left col-6"><?php previous_post_link(); ?></div>
				<div class="text-right col-6"><?php next_post_link(); ?></div>
			</div>

		<?php else : ?>
			<?php _e('Sorry, no posts matched your criteria.', 'draft'); ?>
		<?php endif; ?>

	</div>

	<?php get_sidebar('sidebar-2'); ?>

</div>

<?php get_footer(); ?>