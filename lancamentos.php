<?php

/**
  Plugin Name: Lançamentos
  Description: Cadastre seus jogos e os exiba em ordem de lançamento!
  Author: Flávio Ricardo
  Version: 1.0
  Author URI: http://fricardo.com/
 */

add_action('init', 'set_lancamento');

function set_options() {
	return array(
		'labels' => array(
			'name' => _('Lançamentos'),
			'singular_name' => _('Lançamento'),
			'add_new' => _('Adicionar novo'),
			'add_new_item' => __('Adicionar novo lançamento'),
			'edit_item' => __('Editar lançamento'),
			'new_item' => __('Novo lançamento'),
			'view_item' => __('Ver lançamento'),
			'search_items' => __('Pesquisar lançamentos'),
			'menu_name' => 'Lançamentos'
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 100,
		'supports' => array('title', 'editor', 'thumbnail')
	);
}

function set_lancamento() {
	register_post_type('lancamentos', set_options());
}

?>