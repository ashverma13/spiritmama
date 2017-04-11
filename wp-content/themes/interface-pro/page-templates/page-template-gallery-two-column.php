<?php
/**
 * Template Name: Gallery Two Column Template
 *
 * Displays the Gallery Section of the theme with two column.
 *
 * @package Theme Horse
 * @subpackage Interface Pro
 * @since Interface Pro 1.0
 */
?>

<?php get_header(); ?>

<?php
	/** 
	 * interface_before_main_container hook
	 */
	do_action( 'interface_before_main_container' );
?>
	<?php
		/** 
		 * interface_gallery_two_column_template_content hook
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * interface_display_gallery_two_column_content 10
		 */
		do_action( 'interface_gallery_two_column_template_content' );
	?>
<?php
	/** 
	 * interface_after_main_container hook
	 */
	do_action( 'interface_after_main_container' );
?>

<?php get_footer(); ?>