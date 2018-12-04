<?php
/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Draft for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

add_action( 'tgmpa_register', 'draft_register_required_plugins' );

function draft_register_required_plugins() {

	$plugins = array(

		array(
			'name' => 'FitVids for WordPress',
			'slug' => 'fitvids-for-wordpress',
			'required' => true
		),

		array(
			'name' => 'Regenerate Thumbnails',
			'slug' => 'regenerate-thumbnails',
			'required' => false
		)

	);

	$config = array(
		'id'           => 'draft',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => ''
	);

	tgmpa( $plugins, $config );
}