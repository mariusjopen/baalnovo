<?php

// VARIABLES

$theme = wp_get_theme();
$ver = $theme->get('Version');

// ACTIONS
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
add_action( 'after_setup_theme', 'image_sizes' );

add_action( 'init', 'register_my_menu' );

add_action( 'init', 'create_post_type_ensemble' );
add_action( 'init', 'create_post_type_category_ensemble' );
add_action( 'init', 'create_post_type_stuecke' );
add_action( 'init', 'create_post_type_category_stuecke' );
add_action( 'init', 'create_post_type_aktuelles' );
add_action( 'init', 'create_post_type_projekte' );

add_action( 'init', 'get_id_by_slug' );

remove_action( 'wp_head', 'wp_generator' );
add_filter( 'show_admin_bar', '__return_false' );

// JAVACSRIPT, CSS

function add_theme_scripts(){
	global $ver;
	wp_enqueue_script('app', get_template_directory_uri()."/js/min/combine.min.js", array( 'jquery' ), $ver);
  wp_enqueue_style('app-style', get_template_directory_uri()."/css/min/combine.min.css", array(), $ver);
  wp_enqueue_script('flexslider', get_template_directory_uri()."/lib/jquery.flexslider-min.js", array(), $ver);
}

// MENU

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}

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
    )
  );
}

// PROJEKTE

function create_post_type_projekte() {
  register_post_type( 'projekte',
    array(
      'labels' => array(
        'name' => __( 'Projekte' ),
        'singular_name' => __( 'Projekt' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}

// RESPONSIVE IMAGES

function image_sizes(){
	add_image_size( '_3200', 3200, 0, 0 );
	add_image_size( '_2560', 2560, 0, 0 );
	add_image_size( '_1920', 1920, 0, 0 );
	add_image_size( '_1280', 1280, 0, 0 );
	add_image_size( '_1024', 1024, 0, 0 );
	add_image_size( '_768', 768, 0, 0 );
	add_image_size( '_512', 512, 0, 0 );
	add_image_size( '_256', 256, 0, 0 );
}

// GET PAGE ID BY SLUG

function get_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}

// ACF CONTROL

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}




?>
