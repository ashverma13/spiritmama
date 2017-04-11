<?php
/**
 * Displays the sidebar on testimonial page template.
 *
 * @package Theme Horse
 * @subpackage Interface Pro
 * @since Interface Pro 1.0
 */
?>
<?php
	/**
	 * interface_before_testimonial_page_sidebar
	 */
	do_action( 'interface_before_testimonial_page_sidebar' );
?>
<?php
	/** 
	 * interface_testimonial_page_sidebar hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * interface_display_testimonial_page_sidebar 10
	 */
	do_action( 'interface_testimonial_page_sidebar' );
?>
<?php
	/**
	 * interface_after_testimonial_page_sidebar
	 */
	do_action( 'interface_after_testimonial_page_sidebar' );
?>