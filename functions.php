<?php
/**
 * Lean functions and definitions
 *
 * @package Lean
 * @since Lean 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Lean 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'lean_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Lean 1.0
 */
function lean_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Lean, use a find and replace
	 * to change 'lean' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'lean', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'lean' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // lean_setup
add_action( 'after_setup_theme', 'lean_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Lean 1.0
 */
function lean_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'lean' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'lean_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function lean_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'lean_scripts' );

register_post_type('link', array(	'label' => 'Link','description' => 'Cose interessanti che di solito commento brevemente.','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'exclude_from_search' => false,'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes',),'labels' => array (
  'name' => 'Link',
  'singular_name' => 'Link',
  'menu_name' => 'Link',
  'add_new' => 'Add Link',
  'add_new_item' => 'Add New Link',
  'edit' => 'Edit',
  'edit_item' => 'Edit Link',
  'new_item' => 'New Link',
  'view' => 'View Link',
  'view_item' => 'View Link',
  'search_items' => 'Search Link',
  'not_found' => 'No Link Found',
  'not_found_in_trash' => 'No Link Found in Trash',
  'parent' => 'Parent Link',
),) );

/**
 * Implement the Custom Header feature
 */
$args = array(
	'width'         => 200,
	'height'        => 200,
	'default-image' => get_template_directory_uri() . '/img/header.png',
	'uploads'		=> true,
	'header-text'	=> false,
);
add_theme_support( 'custom-header', $args );