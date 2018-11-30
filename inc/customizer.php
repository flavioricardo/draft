<?php

function customizer_settings( $customizer ) {

	$customizer->add_section(
		'sec_copyright', array(
			'title' => 'Copyright',
			'description' => 'Copyright Section'
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
			'label' => 'Copyright',
			'description' => '',
			'section' => 'sec_copyright',
			'type' => 'text'
		)
	);

}

add_action( 'customize_register', 'customizer_settings' );