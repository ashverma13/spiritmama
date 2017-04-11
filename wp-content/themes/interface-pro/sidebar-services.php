<?php
/**
 * Displays the sidebar on Services page template.
 *
 * @package Theme Horse
 * @subpackage Interface Pro
 * @since Interface Pro 1.0
 */
?>
<?php
	/**
	 * interface_before_services_page_sidebar
	 */
	do_action( 'interface_before_services_page_sidebar' );
?>
<?php
	/** 
	 * interface_services_page_sidebar hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * interface_display_services_page_sidebar 10
	 */
	do_action( 'interface_services_page_sidebar' );
?>
<?php
	/**
	 * interface_after_services_page_sidebar
	 */
	do_action( 'interface_after_services_page_sidebar' );
?>