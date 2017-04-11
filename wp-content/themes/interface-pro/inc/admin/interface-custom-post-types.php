<?php
/**
 * Create Custom post type gallery
 *
 * @package Theme Horse
 * @subpackage Interface Pro
 * @since Interface Pro 1.0
 */

add_action( 'init', 'interface_custom_post' );
/**
 * Register custom post type.
 *
 * We register a new custom post type to show the gallery.
 */
function interface_custom_post() {
   
	$labels = array(
		'name'                  => _x( 'Gallery', 'interface_custom_post', 'interface' ),
		'singular_name'         => _x( 'Gallery', 'interface_custom_post', 'interface' ),
		'all_items'             => _x( 'All Galleries', 'interface_custom_post', 'interface' ),
		'add_new'               => _x( 'Add New Item', 'interface_custom_post', 'interface' ),
		'add_new_item'          => _x( 'Add New Gallery Item', 'interface_custom_post', 'interface' ),
		'edit_item'             => _x( 'Edit Gallery', 'interface_custom_post', 'interface' ),
		'new_item'              => _x( 'New Gallery', 'interface_custom_post', 'interface' ),
		'view_item'             => _x( 'View Gallery', 'interface_custom_post', 'interface' ),
		'search_items'          => _x( 'search Gallery', 'interface_custom_post', 'interface' ),
		'not_found'             => _x( 'No Gallery Found', 'interface_custom_post', 'interface' ),
		'not_found_in_trash'    => _x( 'No Gallery found in Trash', 'interface_custom_post', 'interface' ),
		'parent_item_colon'     => _x( 'Parent Gallery:', 'interface_custom_post', 'interface' ),
		'menu_name'             => _x( 'Galleries', 'interface_custom_post', 'interface' )
	);
	$args = array(
		'labels'                => $labels,
		'hierarchical'          => false,
		'description'           => __( 'Custom Gallery Posts', 'interface' ),
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => INTERFACE_ADMIN_IMAGES_URL . '/backend-theme-horse-icon.png',
		'show_in_nav_menus'     => true,
		'publicly_queryable'    => true,
		'exclude_from_search'   => false,
		'has_archive'           => true,
		'query_var'             => true,
		'can_export'            => true,
		'rewrite'               => true,
		'capability_type'       => 'post'
	);

	register_post_type( 'gallery', $args );       

}

add_action( 'init', 'interface_taxonomy' );
/**
 * Register custom taxonomy for portfolio custom post type
 */
function interface_taxonomy() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'                => __( 'Gallery Categories', 'interface' ),
    'singular_name'       => __( 'Gallery Category', 'interface' ),
    'search_items'        => __( 'Search Gallery Categories', 'interface' ),
    'all_items'           => __( 'All Gallery Categories', 'interface'),
    'parent_item'         => __( 'Parent Gallery Category', 'interface' ),
    'parent_item_colon'   => __( 'Parent Gallery Category:', 'interface' ),
    'edit_item'           => __( 'Edit Gallery Category', 'interface' ), 
    'update_item'         => __( 'Update Gallery Category', 'interface' ),
    'add_new_item'        => __( 'Add New Gallery Category', 'interface' ),
    'new_item_name'       => __( 'New Gallery Category Name', 'interface' ),
    'menu_name'           => __( 'Gallery Category', 'interface')
  ); 	

  $args = array(
    'hierarchical'        => true,
    'labels'              => $labels,
    'show_ui'             => true,
    'show_admin_column'   => true,
    'query_var'           => true,
    'rewrite'             => array( 'slug' => 'gallery_category' )
  );
  register_taxonomy( 'gallery_category', array( 'gallery' ), $args );
}

add_filter( 'manage_edit-gallery_columns', 'interface_add_thumbnail_column', 10, 1 );
/**
 * Add Columns to Portfolio Edit Screen
 */
function interface_add_thumbnail_column( $columns ) {

	$column_thumbnail = array( 'thumbnail' => __('Thumbnail','interface' ) );
	$columns = array_slice( $columns, 0, 2, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
	return $columns;
}

add_action( 'manage_posts_custom_column', 'interface_display_thumbnail', 10, 1 );
/**
 * Adds thumbnails to column view
 */
function interface_display_thumbnail( $column ) {
	global $post;
	switch ( $column ) {
		case 'thumbnail':
			echo get_the_post_thumbnail( $post->ID, array(35, 35) );
			break;
	}
}
?>