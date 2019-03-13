<?php
	
	/*
	Plugin Name: Preguntale a Gaby Arce
	Plugin URI:
	Description: Plugin para gestionar las preguntas realizadas en el website de gaby arce
	Version:     1.0
	Author:      Iván Fuentes González
	Author URI:
	License:     GPL2
	License URI: https://www.gnu.org/licenses/gpl-2.0.html
	*/

	/**
	 * Registers a new post type
	 * @uses $wp_post_types Inserts new post type object into the list
	 *
	 * @param string  Post type key, must not exceed 20 characters
	 * @param array|string  See optional args description above.
	 * @return object|WP_Error the registered post type object, or an error object
	 */

	function preguntas_register_name() {
	
		$labels = array(
			'name'               => __( 'Preguntas', 'ga-preguntas' ),
			'singular_name'      => __( 'Pregunta', 'ga-preguntas' ),
			'add_new'            => _x( 'Añadir nueva Pregunta', 'ga-preguntas', 'ga-preguntas' ),
			'add_new_item'       => __( 'Añadir nueva Pregunta', 'ga-preguntas' ),
			'edit_item'          => __( 'Editar Pregunta', 'ga-preguntas' ),
			'new_item'           => __( 'Nueva Pregunta', 'ga-preguntas' ),
			'view_item'          => __( 'Ver Pregunta', 'ga-preguntas' ),
			'search_items'       => __( 'Buscar Preguntas', 'ga-preguntas' ),
			'not_found'          => __( 'No encontrado', 'ga-preguntas' ),
			'not_found_in_trash' => __( 'No encontrado en la papelera', 'ga-preguntas' ),
			'parent_item_colon'  => __( 'Pregunta padre:', 'ga-preguntas' ),
			'menu_name'          => __( 'Preguntas', 'ga-preguntas' ),
		);
	
		$args = array(
			'labels'              => $labels,
			'hierarchical'        => false,
			'description'         => 'Preguntas Gaby Arce',
			'taxonomies'          => array(),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 6,
			'menu_icon'           => 'dashicons-format-chat',
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'post',
			'supports'            => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt'
			),
		);
	
		register_post_type( 'preguntas', $args );
	}
	
	add_action( 'init', 'preguntas_register_name' );
	