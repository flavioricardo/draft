			<footer class="mb-4">
				<div class="row">
					<div class="col-6">
						<?php echo get_theme_mod( 'set_copyright' ); ?>
					</div>
				</div>
			</footer>

		</div>

	</main>

	<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.4/lib/darkmode-js.min.js"></script>
	<script>
		var options = {
			bottom: '64px', // default: '32px'
			right: 'unset', // default: '32px'
			left: '32px', // default: 'unset'
			time: '0.5s', // default: '0.3s'
			mixColor: '#fff', // default: '#fff'
			backgroundColor: '#fff',  // default: '#fff'
			buttonColorDark: '#100f2c',  // default: '#100f2c'
			buttonColorLight: '#fff', // default: '#fff'
			saveInCookies: false, // default: true,
			label: '🌓', // default: ''
			autoMatchOsTheme: true // default: true
		};
		new Darkmode(options).showWidget();
	</script>

	<?php wp_footer(); ?>
</body>
</html>