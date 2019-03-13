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


	/**
	 * Create a taxonomy
	 *
	 * @uses  Inserts new taxonomy object into the list
	 * @uses  Adds query vars
	 *
	 * @param string  Name of taxonomy object
	 * @param array|string  Name of the object type for the taxonomy object.
	 * @param array|string  Taxonomy arguments
	 * @return null|WP_Error WP_Error if errors, otherwise null.
	 */
	function taxonomia_preguntas() {
	
		$labels = array(
			'name'                  => _x( 'Categorias Pregunta', 'Taxonomy Categorias', 'ga-preguntas' ),
			'singular_name'         => _x( 'Categoria Pregunta', 'Taxonomy Categoria', 'ga-preguntas' ),
			'search_items'          => __( 'Buscar Categorias', 'ga-preguntas' ),
			'popular_items'         => __( 'Categorias de preguntas Populares', 'ga-preguntas' ),
			'all_items'             => __( 'Todas las Categorias', 'ga-preguntas' ),
			'parent_item'           => __( 'Categoria padre', 'ga-preguntas' ),
			'parent_item_colon'     => __( 'Categoria padre', 'ga-preguntas' ),
			'edit_item'             => __( 'Editar Categoria', 'ga-preguntas' ),
			'update_item'           => __( 'Actualizar Categoria', 'ga-preguntas' ),
			'add_new_item'          => __( 'Añadir nueva Categoria', 'ga-preguntas' ),
			'new_item_name'         => __( 'Nuevo nombre de Categoria', 'ga-preguntas' ),
			'add_or_remove_items'   => __( 'Añadir o eliminar Categorias', 'ga-preguntas' ),
			'choose_from_most_used' => __( 'Elige entre las Categorias más usadas', 'ga-preguntas' ),
			'menu_name'             => __( 'Categoria', 'ga-preguntas' ),
		);
	
		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => true,
			'hierarchical'      => true,
			'show_tagcloud'     => true,
			'show_ui'           => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'categoria-preguntas'),
			'query_var'         => true,
			'capabilities'      => array(),
		);
	
		register_taxonomy( 'categoria-preguntas', array('preguntas'), $args );
	}
	
	add_action( 'init', 'taxonomia_preguntas' );

	