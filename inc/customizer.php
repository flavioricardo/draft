<?php

function customizer_settings( $customizer ) {

	// Copyright
	$customizer->add_section(
		'sec_copyright', array(
			'title' => __( 'Copyright', 'draft' ),
			'description' => __( 'Copyright Section', 'draft' )
		)
	);

	$customizer->add_setting(
		'set_copyright', array(
			'type' => 'theme_mod',
			'default' => 'Copyright @ ' . date('Y'),
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$customizer->add_control(
		'set_copyright', array(
			'label' => __( 'Copyright', 'draft' ),
			'description' => '',
			'section' => 'sec_copyright',
			'type' => 'text'
		)
	);

	// Banner
	$customizer->add_section(
		'sec_banner_area', array(
			'title' => __( 'Banner', 'draft' ),
			'description' => __( 'Banner Area', 'draft' )
		)
	);

	$customizer->add_setting(
		'set_banner_url', array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$customizer->add_control(
		'set_banner_url', array(
			'label' => __( 'URL', 'draft' ),
			'description' => '',
			'section' => 'sec_banner_area',
			'type' => 'text'
		)
	);

	$customizer->add_setting(
		'set_banner_desc', array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$customizer->add_control(
		'set_banner_desc', array(
			'label' => __( 'Description', 'draft' ),
			'description' => '',
			'section' => 'sec_banner_area',
			'type' => 'text'
		)
	);

	$customizer->add_setting(
		'set_banner_area', array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$customizer->add_control(
		new WP_Customize_Image_Control( $customizer, 'set_banner_area', array(
        	'label' => __('Image', 'draft'),
        	'section' => 'sec_banner_area',
        	'settings' => 'set_banner_area',
    		)
		)
	);

}

add_action( 'customize_register', 'customizer_settings' );