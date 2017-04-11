<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Spirit Mama Theme' );
define( 'CHILD_THEME_URL', 'http://www.spiritmama.com.au' );
define( 'CHILD_THEME_VERSION', '2.1.2' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Put primary navigation menu inside header
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav' );

//* Put secondary navigation menu inside header
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_header', 'genesis_do_subnav' );

//* Remove Page titles
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

//* Custom Responsive Stylesheet
add_action( 'wp_enqueue_scripts', 'custom_load_custom_style_sheet' );
function custom_load_custom_style_sheet() {
	wp_enqueue_style( 'custom-stylesheet', CHILD_URL . '/css/responsive.css', array(), PARENT_THEME_VERSION );
}

//* Start navigation wrapper before primary nav
add_filter( 'genesis_do_nav', 'genesis_child_nav', 10, 3 );
function genesis_child_nav($nav_output, $nav, $args) {
return '<div class="nav-wrapper">' . $nav_output;
}
//* End navigation wrapper after secondart nav
add_filter( 'genesis_do_subnav', 'genesis_child_subnav', 10, 3 );
function genesis_child_subnav($subnav_output, $subnav, $args) {
return  $subnav_output . '</div>';
}

//* Add custom js file
add_action( 'wp_enqueue_scripts', 'crunchify_enqueue_script' );
function crunchify_enqueue_script() {
    wp_enqueue_script( 'follow3', get_stylesheet_directory_uri() . '/js/jcarousel.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'follow', get_stylesheet_directory_uri() . '/js/global.js', array( 'jquery' ), '', true );
}