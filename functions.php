<?php

// VARIABLES

$theme = wp_get_theme();
$ver = $theme->get('Version');

// ACTIONS
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
add_action( 'after_setup_theme', 'image_sizes' );

add_action( 'init', 'register_my_menu' );
add_filter( 'wp_get_nav_menu_items', 'cpt_archive_menu_filter', 10, 3 );
add_action( 'widgets_init', 'arphabet_widgets_init' );


add_action( 'init', 'create_post_type_ensemble' );
add_action( 'init', 'create_post_type_category_ensemble' );
add_action( 'init', 'create_post_type_stuecke' );
add_action( 'init', 'create_post_type_category_stuecke' );
add_action( 'init', 'create_post_type_aktuelles' );
add_action( 'init', 'create_post_type_projekte' );
add_action( 'init', 'create_post_type_locations' );

add_action( 'init', 'get_id_by_slug' );

remove_action( 'wp_head', 'wp_generator' );
add_filter( 'show_admin_bar', '__return_false' );

add_filter( 'user_has_cap', 'pxlcore_give_edit_theme_options' );
add_action('admin_head', 'hide_menu');


// JAVACSRIPT, CSS

function add_theme_scripts(){
	global $ver;
	wp_enqueue_script('lodash', get_template_directory_uri()."/lib/lodash.js", array(), $ver);
	wp_enqueue_script('app', get_template_directory_uri()."/js/min/combine.min.js", array( 'jquery' ), $ver);
  wp_enqueue_style('app-style', get_template_directory_uri()."/css/min/combine.min.css", array(), $ver);
  wp_enqueue_script('flexslider', get_template_directory_uri()."/lib/jquery.flexslider-min.js", array(), $ver);
}

// MENU

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}

// WIDGETS

function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'languages',
		'id'            => 'languages',
		'before_widget' => '<div class="languages">',
		'after_widget'  => '</div>',
	) );

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

// LOCATIONS

function create_post_type_locations() {
  register_post_type( 'locations',
    array(
      'labels' => array(
        'name' => __( 'Lokations' ),
        'singular_name' => __( 'Lokation' )
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


// POSTS IN MENU

/* take care of the urls */

function cpt_archive_menu_filter( $items, $menu, $args ) {
  /* alter the URL for cpt-archive objects */

  $menu_order = count($items); /* Offset menu order */

  $child_items = array();
  foreach ( $items as &$item ) {
    if ( $item->title != '##projekte##' ) continue;

    $item->url = get_post_type_archive_link( 'projekte' );
    $item->title = 'Projekte';

    foreach ( get_posts( 'post_type=projekte&numberposts=-1' ) as $post ) {
      $post->menu_item_parent = $item->ID;
      $post->post_type = 'nav_menu_item';
      $post->object = 'custom';
      $post->type = 'custom';
      $post->menu_order = ++$menu_order;
      $post->title = $post->post_title;
      $post->url = get_permalink( $post->ID );
      /* add children */
      $child_items []= $post;
    }
  }
  return array_merge( $items, $child_items );
}

// GET CAPTIONS FOR IMAGES

function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}


// EDITOR EDIT MENU

function pxlcore_give_edit_theme_options( $caps ) {
	if( ! empty( $caps[ 'edit_pages' ] ) ) {
		$caps[ 'edit_theme_options' ] = true;

	}
	return $caps;
}


// EDITOR HIDE PAGES

function hide_menu() {
    remove_submenu_page( 'themes.php', 'themes.php' );
    remove_submenu_page( 'themes.php', 'widgets.php' );
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'edit.php' );
		remove_menu_page( 'profile.php' );
		remove_menu_page( 'tools.php' );

    global $submenu;
    unset($submenu['themes.php'][6]);
}



?>
