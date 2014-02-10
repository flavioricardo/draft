<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<!-- DNS Prefetch -->
	<link rel="dns-prefetch" href="//www.google-analytics.com">

	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

	<!-- Meta -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/normalize.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

	<!-- jQuery + JavaScript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/conditionizr.js/2.1.1/conditionizr.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.min.js"></script>

	<?php wp_head(); ?>
</head>

<body>

	<div class="wrapper">

		<div class="header">

			<div class="title">
				<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
			</div>

			<div class="menu">
  				<?php wp_nav_menu(array('items_wrap' => '%3$s')); ?>
			</div>

		</div>