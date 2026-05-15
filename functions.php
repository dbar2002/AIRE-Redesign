<?php
/**
 * AIRE theme bootstrap.
 *
 * Loads styles, registers menus, registers the Programs custom post type,
 * and wires up theme support.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'AIRE_VERSION', '1.0.0' );
define( 'AIRE_DIR', get_template_directory() );
define( 'AIRE_URI', get_template_directory_uri() );

/**
 * Theme support and core registrations.
 */
function aire_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'aire' ),
		'footer_programs' => __( 'Footer — Programs column', 'aire' ),
		'footer_school'   => __( 'Footer — School column', 'aire' ),
		'footer_required' => __( 'Footer — Required column', 'aire' ),
	) );
}
add_action( 'after_setup_theme', 'aire_setup' );

/**
 * Enqueue styles and any inline scripts.
 */
function aire_enqueue_assets() {
	wp_enqueue_style(
		'aire-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'aire-main',
		AIRE_URI . '/assets/css/main.css',
		array(),
		AIRE_VERSION
	);

	wp_enqueue_script(
		'aire-cart',
		AIRE_URI . '/assets/js/cart.js',
		array(),
		AIRE_VERSION,
		true
	);

	wp_enqueue_script(
		'aire-animations',
		AIRE_URI . '/assets/js/animations.js',
		array(),
		AIRE_VERSION,
		true
	);

	wp_enqueue_script(
		'aire-program-cards',
		AIRE_URI . '/assets/js/program-cards.js',
		array(),
		AIRE_VERSION,
		true
	);

	wp_enqueue_script(
		'aire-nav',
		AIRE_URI . '/assets/js/nav.js',
		array(),
		AIRE_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'aire_enqueue_assets' );

/**
 * Load supporting modules.
 */
require_once AIRE_DIR . '/inc/post-types.php';
require_once AIRE_DIR . '/inc/template-tags.php';
