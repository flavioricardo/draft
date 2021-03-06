<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<!-- DNS Prefetch -->
	<link rel="dns-prefetch" href="//www.google-analytics.com">

	<!--- Meta --->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--- CSS --->
	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<main class="container">

		<header>

			<section role="banner" class="mt-2 text-center">
				<?php if ( has_header_image() ) : ?>
					<h1><a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" class="img-fluid" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
				<?php elseif ( has_custom_logo() ) : ?>
					<h1><?php the_custom_logo(); ?></h1>
				<?php else : ?>
					<h1><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<?php endif; ?>
			</section>

			<nav class="nav d-flex">
  				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'before' => '', 'after' => '', 'menu_class' => 'menu col-12 text-left' ) ); ?>
			</nav>

		</header>