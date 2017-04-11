<?php
/**
 * Template Name: Blog Image Medium
 *
 * Displays the Blog with Medium Image as Featured Image and excerpt.
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
		 * interface_main_container hook
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * interface_content 10
		 */
		do_action( 'interface_main_container' );
	?>
<?php
	/** 
	 * interface_after_main_container hook
	 */
	do_action( 'interface_after_main_container' );
?>
<?php get_footer(); ?>