<?php

// VARIABLES

$theme = wp_get_theme();
$ver = $theme->get('Version');

// ACTIONS

remove_action( 'wp_head', 'wp_generator' );
add_filter( 'show_admin_bar', '__return_false' );

// JAVACSRIPT, CSS

function add_theme_scripts(){
	global $ver;
	wp_enqueue_script('app', get_template_directory_uri()."/js/min/combine.min.js", array( 'jquery' ), $ver);
  wp_enqueue_style('app-style', get_template_directory_uri()."/css/min/combine.min.css", array(), $ver);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

// MENU

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

// ENSEMBLE

function create_post_type_ensemble() {
  register_post_type( 'ensemble',
    array(
      'labels' => array(
        'name' => __( 'Ensemble' ),
        'singular_name' => __( 'Ensemble' )
      ),
      'public' => true,
      'has_archive' => true,
			'taxonomies'  => array( 'ensemble-category' ),
    )
  );
}
add_action( 'init', 'create_post_type_ensemble' );

function create_post_type_category_ensemble() {

    register_taxonomy(
        'ensemble-category',
        'ensemble',
        array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' => 'ensemble-category' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'create_post_type_category_ensemble' );

// STÜCKE

function create_post_type_stuecke() {
  register_post_type( 'stuecke',
    array(
      'labels' => array(
        'name' => __( 'Stücke' ),
        'singular_name' => __( 'Stücke' )
      ),
      'public' => true,
      'has_archive' => true,
			'taxonomies'  => array( 'stuecke-category' ),
    )
  );
}
add_action( 'init', 'create_post_type_stuecke' );

function create_post_type_category_stuecke() {

    register_taxonomy(
        'stuecke-category',
        'stuecke',
        array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' => 'stuecke-category' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'create_post_type_category_stuecke' );

// AKTUELLES

function create_post_type_aktuelles() {
  register_post_type( 'aktuelles',
    array(
      'labels' => array(
        'name' => __( 'Aktuelles' ),
        'singular_name' => __( 'Aktuelles' )
      ),
      'public' => true,
      'has_archive' => true,
			'taxonomies'  => array( 'aktuelles-category' ),
    )
  );
}
add_action( 'init', 'create_post_type_aktuelles' );

function create_post_type_category_aktuelles() {

    register_taxonomy(
        'aktuelles-category',
        'aktuelles',
        array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' => 'aktuelles-category' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'create_post_type_category_aktuelles' );

?>
