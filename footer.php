		<footer class="mb-4">
			<div class="row">
				<div class="col-6">
					<?php echo get_theme_mod( 'set_copyright' ); ?>
				</div>
				<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'before' => '', 'after' => '', 'menu_class' => 'menu col-6 text-right') ); ?>
			</div>
		</footer>

	</main>

	<?php wp_footer(); ?>
</body>
</html>