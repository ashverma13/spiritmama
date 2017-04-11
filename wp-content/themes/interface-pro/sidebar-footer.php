<?php
/**
 * Displays the footer sidebar of the theme.
 *
 * @package Theme Horse
 * @subpackage Interface Pro
 * @since Interface Pro 1.0
 */
?>
<?php
	/**
	 * interface_before_footer_sidebar
	 */
	do_action( 'interface_before_footer_sidebar' );
?>
<?php
	/** 
	 * interface_footer_sidebar hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * interface_display_footer_sidebar 10
	 */
	do_action( 'interface_footer_sidebar' );
?>
<?php
	/**
	 * interface_after_footer_sidebar
	 */
	do_action( 'interface_after_footer_sidebar' );
?>