<?php
/**
 * Interface Pro style functions and definitions
 *
 * This file contains all the functions related to styles.
 * 
 * @package Theme Horse
 * @subpackage Interface Pro
 * @since Interface Pro 1.0
 */

/****************************************************************************************/

/**
 * Changes the style according to theme options value
 */
add_action( 'wp_head', 'interface_infobar_information');
	function interface_infobar_information() {
	global $interface_theme_setting_value;
	$options = $interface_theme_setting_value;
	
	if( 0 != $options[ 'hide_header_searchform' ] ){ ?>
        <style type="text/css">
.search-toggle, #search-box {
	display: none;
}
.hgroup-right {
	padding-right: 0;
}
</style>
        <?php }
   if ('off' == $options['slider_content']) {?>
        <style type="text/css">
.featured-text {
	display: none;
}
</style>

        <?php }
		
	if( 'right-position' == $options[ 'featured_text_position' ] ) { ?>
       <style type="text/css">
	    /* Right Align */
.featured-text {
	right: 0;
}
.featured-text .featured-title {
	float: right;
}
.featured-text .featured-content {
	float: right;
	clear: right;
}
</style>

<?php }
	}
/****************************************************************************************/
add_action( 'wp_head', 'interface_options_style');
	function interface_options_style() {
	global $interface_theme_setting_value, $interface_default;
	$default_options = $interface_default; ?>
        <style type="text/css">
<?php  /* Color skin */ ?> 
<?php if( $default_options[ 'interface_link_color' ] != $interface_theme_setting_value[ 'interface_link_color' ] ) : ?> /* Site Title, Navigation and links */
.info-bar .info ul li:before, a, #site-title a span, #site-title a:hover, #site-title a:focus, #site-title a:active, #access a:hover, #access ul li.current-menu-item a, #access ul li.current_page_ancestor a, #access ul li.current-menu-ancestor a, #access ul li.current_page_item a, #access ul li:hover > a, #access ul li ul li a:hover, #access ul li ul li:hover > a, #access ul li.current-menu-item ul li a:hover, .search-toggle:hover, .hgroup-right .active, #content ul a:hover, #content ol a:hover, #content .gal-filter li.active a, .entry-title a:hover, .entry-title a:focus, .entry-title a:active, .entry-meta a:hover, .entry-meta .cat-links a:hover, .custom-gallery-title a:hover, .widget ul li a:hover, .widget-title a:hover, .widget_tag_cloud a:hover, #colophon .widget ul li a:hover, #site-generator .copyright a:hover {
 color:<?php echo esc_attr( $interface_theme_setting_value[ 'interface_link_color' ] );
?>;
}
#access ul li ul {
 border-color: <?php echo esc_attr( $interface_theme_setting_value[ 'interface_link_color' ] );?>;
 }
::selection {
	background: <?php echo esc_attr( $interface_theme_setting_value[ 'interface_link_color' ] );?>;
	color: #fff;
}
::-moz-selection {
	background: <?php echo esc_attr( $interface_theme_setting_value[ 'interface_link_color' ] );?>;
	color: #fff;
}
 <?php endif;
 if( $default_options[ 'interface_buttons_color' ] != $interface_theme_setting_value[ 'interface_buttons_color' ] ) : ?> /* Buttons, Custom Tag Cloud, Paginations and Borders */
input[type="reset"], input[type="button"], input[type="submit"], a.readmore, .widget_custom-tagcloud a:hover, #wp_page_numbers ul li a:hover, #wp_page_numbers ul li.active_page a, .wp-pagenavi .current, .wp-pagenavi a:hover, ul.default-wp-page li a:hover, .pagination span, .call-to-action, .back-to-top a:hover, #bbpress-forums button {
 background-color: <?php echo esc_attr( $interface_theme_setting_value[ 'interface_buttons_color' ] );
?>;
}
.tag-links a:hover {
 background-color:<?php echo esc_attr( $interface_theme_setting_value[ 'interface_buttons_color' ] );
?>;
	color: #fff;
}
.tag-links a:hover:before {
 border-color: transparent <?php echo esc_attr( $interface_theme_setting_value[ 'interface_buttons_color' ] );
?> transparent transparent;
}
.service-item .service-icon, .widget_promotional_bar, blockquote {
 border-color: <?php echo esc_attr( $interface_theme_setting_value[ 'interface_buttons_color' ] );
?>;
}
<?php endif;
?>  <?php if( $default_options[ 'interface_slogan_slider_title_color' ] != $interface_theme_setting_value[ 'interface_slogan_slider_title_color' ] ) : ?> 		/* Featured Slider, Slogan and Page Title */
.slogan-wrap, .page-title-wrap, #controllers a:hover, #controllers a.active {
 background-color: <?php echo esc_attr( $interface_theme_setting_value[ 'interface_slogan_slider_title_color' ] );
?>;
}
.featured-text .featured-title {
 background-color:<?php echo esc_attr( $interface_theme_setting_value[ 'interface_slogan_slider_title_color' ] );
?>;
	opacity: 0.9;
	-moz-opacity: 0.9;
	filter: alpha(opacity=90);
}
#controllers a {
 border-color: <?php echo esc_attr( $interface_theme_setting_value[ 'interface_slogan_slider_title_color' ] );
?>;
}
#controllers a:hover, #controllers a.active {
 color: <?php echo esc_attr( $interface_theme_setting_value[ 'interface_slogan_slider_title_color' ] );
?>;
}
 <?php endif; ?>
<?php /* Background Color */?> 
<?php if( $default_options[ 'interface_top_info_bar_color' ] != $interface_theme_setting_value[ 'interface_top_info_bar_color' ] ) : ?> /* Top Info Bar */
.info-bar {
 background-color: <?php echo esc_attr( $interface_theme_setting_value[ 'interface_top_info_bar_color' ] );
?>;
}
 <?php endif;
?>  <?php if( $default_options[ 'interface_header_color' ] != $interface_theme_setting_value[ 'interface_header_color' ] ) : ?> /* Header */
.hgroup-wrap {
 background-color:<?php echo esc_attr( $interface_theme_setting_value[ 'interface_header_color' ] );
?>;
}
 <?php endif;?>
 <?php if( ( $default_options[ 'interface_main_content_color' ] != $interface_theme_setting_value[ 'interface_main_content_color' ] ) || ( $default_options[ 'content_background_pattern' ] != $interface_theme_setting_value[ 'content_background_pattern' ] ) ) : ?>
 /* Main Content */
 #main, .post-featured-image .arrow {
 		<?php if( $interface_theme_setting_value[ 'content_background_pattern' ] != 'disable' ): ?>

			background-image: url("<?php echo INTERFACE_ADMIN_IMAGES_URL; ?>/patterns/<?php echo $interface_theme_setting_value[ 'content_background_pattern' ]; ?>.jpg");

		<?php endif; ?>
 			background-color: <?php echo esc_attr( $interface_theme_setting_value[ 'interface_main_content_color' ] ); ?>;
}
 <?php endif;
?>  <?php if( $default_options[ 'interface_promotional_clients_blockquote_sticky_color' ] != $interface_theme_setting_value[ 'interface_promotional_clients_blockquote_sticky_color' ] ) : ?> /* Promational Bar, Our Clients, Blockquote and Sticky post */
.widget_promotional_bar, .widget_ourclients, pre, code, kbd, blockquote, .sticky {
 background-color:  <?php echo esc_attr( $interface_theme_setting_value[ 'interface_promotional_clients_blockquote_sticky_color' ] );
?>;
}
<?php endif;
?>  <?php if( $default_options[ 'interface_form_input_textarea_paginations_color' ] != $interface_theme_setting_value[ 'interface_form_input_textarea_paginations_color' ] ) : ?> /* Form Input/Textarea Fields and Paginations */
input[type="text"], input[type="email"], input[type="search"], input[type="password"], textarea, .widget_custom-tagcloud a, #wp_page_numbers ul li a, .wp-pagenavi a, ul.default-wp-page li a, .pagination a:hover span {
 background-color:<?php echo esc_attr( $interface_theme_setting_value[ 'interface_form_input_textarea_paginations_color' ] );
?>;
}
 <?php endif;?>
 <?php if( ( $default_options[ 'footer_widget_section_color' ] != $interface_theme_setting_value[ 'footer_widget_section_color' ] ) || ( $default_options[ 'footer_widget_background_pattern' ] != $interface_theme_setting_value[ 'footer_widget_background_pattern' ] ) ) : ?>
/* Footer Widget Section */
#colophon .widget-wrap {
	<?php if( $interface_theme_setting_value[ 'footer_widget_background_pattern' ] != 'disable' ): ?>
						background-image: url("<?php echo INTERFACE_ADMIN_IMAGES_URL; ?>/patterns/<?php echo $interface_theme_setting_value[ 'footer_widget_background_pattern' ]; ?>.jpg");
					<?php endif; ?>
 background-color:<?php echo esc_attr( $interface_theme_setting_value[ 'footer_widget_section_color' ] );
?>;
}
 <?php endif;
?>  <?php if( $default_options[ 'bottom_info_bar_color' ] != $interface_theme_setting_value[ 'bottom_info_bar_color' ] ) : ?> #colophon .info-bar {
 background-color:<?php echo esc_attr( $interface_theme_setting_value[ 'bottom_info_bar_color' ] );
?>;
}
 <?php endif;
?>  <?php if( $default_options[ 'site_generator_color' ] != $interface_theme_setting_value[ 'site_generator_color' ] ) : ?> /* Site Generator */
#site-generator {
 background-color:<?php echo esc_attr( $interface_theme_setting_value[ 'site_generator_color' ] );
?>;
}
 <?php endif; ?>
<?php /* Font family */?>
<?php if( $default_options[ 'interface_general_typography' ] != $interface_theme_setting_value[ 'interface_general_typography' ] ) : ?> /* Content */
body, input, textarea {
 font-family: '<?php echo esc_attr( $interface_theme_setting_value['interface_general_typography' ] ); ?>', sans-serif;
}
 <?php endif;
?>  <?php if( $default_options[ 'interface_navigation' ] != $interface_theme_setting_value[ 'interface_navigation' ] ) : ?> /* Navigation */
#access a {
 font-family: '<?php echo esc_attr( $interface_theme_setting_value['interface_navigation' ] ); ?>', sans-serif;
}
 <?php endif;
?>  <?php if( $default_options[ 'interface_title' ] != $interface_theme_setting_value[ 'interface_title' ] ) : ?> /* All Headings/Titles */
h1, h2, h3, h4, h5, h6 {
 font-family: '<?php echo esc_attr( $interface_theme_setting_value['interface_title' ] ); ?>', sans-serif;
}
 <?php endif; ?>
<?php /* Font Size */?>
<?php if( $default_options[ 'content' ] != $interface_theme_setting_value[ 'content' ] ) : ?> /* Content */
body, input, textarea, .widget_promotional_bar .promotional-text span, #colophon .info-bar .info ul li {
 font-size: <?php echo esc_attr( $interface_theme_setting_value[ 'content' ] );
?>px;
}
 <?php endif;
?>  <?php if( $default_options[ 'buttons' ] != $interface_theme_setting_value[ 'buttons' ] ) : ?> /* Buttons */
input[type="reset"], input[type="button"], input[type="submit"], .call-to-action {
 font-size: <?php echo esc_attr( $interface_theme_setting_value[ 'buttons' ] );
?>px;
}
 <?php endif;
?>  <?php if( $default_options[ 'site_title' ] != $interface_theme_setting_value[ 'site_title' ] ) : ?> /* Site Title */
#site-title {
 font-size: <?php echo esc_attr( $interface_theme_setting_value[ 'site_title' ] );
?>px;
}
 <?php endif;
?>  <?php if( $default_options[ 'navigation' ] != $interface_theme_setting_value[ 'navigation' ] ) : ?> /* Navigation */
#access a {
 font-size: <?php echo esc_attr( $interface_theme_setting_value[ 'navigation' ] );
?>px;
}
 <?php endif;
?>  <?php if( $default_options[ 'navigation_child' ] != $interface_theme_setting_value[ 'navigation_child' ] ) : ?> /* Navigation Child */
#access ul li ul li a {
 font-size: <?php echo esc_attr( $interface_theme_setting_value[ 'navigation_child' ] );
?>px;
}
 <?php endif;
?>  <?php if( $default_options[ 'primary_slogan' ] != $interface_theme_setting_value[ 'primary_slogan' ] ) : ?> /* Primary Slogan */
.slogan-wrap .slogan {
 font-size: <?php echo esc_attr( $interface_theme_setting_value[ 'primary_slogan' ] );
?>px;
}
 <?php endif;
?>  <?php if( $default_options[ 'secondary_slogan' ] != $interface_theme_setting_value[ 'secondary_slogan' ] ) : ?> /* Secondary Slogan */
.slogan-wrap .slogan span {
 font-size: <?php echo esc_attr( $interface_theme_setting_value[ 'secondary_slogan' ] );
?>px;
}
 <?php endif;
?>  <?php if( $default_options[ 'featured_title' ] != $interface_theme_setting_value[ 'featured_title' ] ) : ?> /* Featured Title */
.featured-text .featured-title {
 font-size: <?php echo esc_attr( $interface_theme_setting_value[ 'featured_title' ] );
?>px;
}
 <?php endif;
?>  <?php if( $default_options[ 'business_layout_widget_title' ] != $interface_theme_setting_value[ 'business_layout_widget_title' ] ) : ?>
/* Business /Our Team/ Testimonial/ Service Template Widget Titles */
.business-layout .widget-title,
.our-team-template .widget-title,
.testimonial-template .widget-title,
.service-template .widget-title {
 font-size: <?php echo esc_attr( $interface_theme_setting_value[ 'business_layout_widget_title' ] );
?>px;
}
 <?php endif;
?>  <?php if( $default_options[ 'business_layout_service_promot_featured_recentwork' ] != $interface_theme_setting_value[ 'business_layout_service_promot_featured_recentwork' ] ) : ?> /* Business/ Services/ Promotional/ Featured Recent Work/ Our Team Titles */
#content .service-item .service-title,
.widget_promotional_bar .promotional-text,
#content .custom-gallery-title,
.custom-gallery-title a,
#content .widget_our_team .our-team-name {
 font-size: <?php echo esc_attr( $interface_theme_setting_value[ 'business_layout_service_promot_featured_recentwork' ] );
?>px;
}
 <?php endif;
?>  <?php if( $default_options[ 'post_title' ] != $interface_theme_setting_value[ 'post_title' ] ) : ?> /* Post Title */
.page-title, .entry-title {
 font-size: <?php echo esc_attr( $interface_theme_setting_value[ 'post_title' ] );
?>px;
}
 <?php endif;
?>  <?php if( $default_options[ 'sidebar_colophon_widget_title' ] != $interface_theme_setting_value[ 'sidebar_colophon_widget_title' ] ) : ?> /* Sidebar/Colophon Widget Title */
#secondary .widget-title, #colophon .widget-title {
 font-size: <?php echo esc_attr( $interface_theme_setting_value[ 'sidebar_colophon_widget_title' ] );
?>px;
}
 <?php endif; ?>
<?php /* Font color options */?>
<?php if( $default_options[ 'content_font_color' ] != $interface_theme_setting_value[ 'content_font_color' ] ) : ?> /* Content */
body, input, textarea, input.s, #site-description, .featured-text .featured-content, .widget_promotional_bar .promotional-text span, #content ul a, #content ol a, .entry-meta, .entry-meta a, #wp_page_numbers ul li.page_info, #wp_page_numbers ul li a, .wp-pagenavi .pages, .wp-pagenavi a, ul.default-wp-page li a, .pagination, .pagination a span, th {
 color: <?php echo esc_attr( $interface_theme_setting_value[ 'content_font_color' ] );
?>;
}
.tag-links a {
	color: #fff;
}
 <?php endif;
?>  <?php if( $default_options[ 'top_info_bar_font_color' ] != $interface_theme_setting_value[ 'top_info_bar_font_color' ] ) : ?> /* Top Info Bar */
.info-bar, .info-bar .info ul li a {
 color: <?php echo esc_attr( $interface_theme_setting_value[ 'top_info_bar_font_color' ] );
?>;
}
 <?php endif;
?>  <?php if( $default_options[ 'site_title_font_color' ] != $interface_theme_setting_value[ 'site_title_font_color' ] ) : ?> /* Site Title */
#site-title a {
 color: <?php echo esc_attr( $interface_theme_setting_value[ 'site_title_font_color' ] );
?>;
}
 <?php endif;
?>  <?php if( $default_options[ 'navigation_font_color' ] != $interface_theme_setting_value[ 'navigation_font_color' ] ) : ?> /* Navigation */
#access a, #access ul li ul li a, #access ul li.current-menu-item ul li a, #access ul li ul li.current-menu-item a, #access ul li.current_page_ancestor ul li a, #access ul li.current-menu-ancestor ul li a, #access ul li.current_page_item ul li a, .menu-toggle, .search-toggle {
 color: <?php echo esc_attr( $interface_theme_setting_value[ 'navigation_font_color' ] );
?>;
}
 <?php endif;
?>  <?php if( $default_options[ 'solgan_featured_page_breadcrumbs_title_font_color' ] != $interface_theme_setting_value[ 'solgan_featured_page_breadcrumbs_title_font_color' ] ) : ?> /* Slogan, Featured Title, Page Titles and Breadcrumb */
.slogan-wrap .slogan, .featured-text .featured-title, .featured-text .featured-title a, .page-title, .breadcrumb, .breadcrumb a, .breadcrumb a:hover {
 color: <?php echo esc_attr( $interface_theme_setting_value[ 'solgan_featured_page_breadcrumbs_title_font_color' ] );
?>;
}
 <?php endif;
?>  <?php if( $default_options[ 'all_heading_titles_font_color' ] != $interface_theme_setting_value[ 'all_heading_titles_font_color' ] ) : ?> /* All Headings/Titles */
h1, h2, h3, h4, h5, h6, #content .service-item .service-title, .widget_promotional_bar .promotional-text, #content .widget-title, #content .widget-title a, .custom-gallery-title, .custom-gallery-title a, .entry-title, .entry-title a, .entry-meta .cat-links, .entry-meta .cat-links a {
 color: <?php echo esc_attr( $interface_theme_setting_value[ 'all_heading_titles_font_color' ] );
?>;
}
 <?php endif;
?>  <?php if( $default_options[ 'sidebar_widget_title_font_color' ] != $interface_theme_setting_value[ 'sidebar_widget_title_font_color' ] ) : ?> /* Sidebar Widget Titles */
.widget-title, .widget-title a {
 color: <?php echo esc_attr( $interface_theme_setting_value[ 'sidebar_widget_title_font_color' ] );
?>;
}
 <?php endif;
?>  <?php if( $default_options[ 'sidebar_content_font_color' ] != $interface_theme_setting_value[ 'sidebar_content_font_color' ] ) : ?> /* Sidebar Content */
#secondary, #secondary .widget ul li a, .widget_search input.s, .widget_custom-tagcloud a {
 color: <?php echo esc_attr( $interface_theme_setting_value[ 'sidebar_content_font_color' ] );
?>;
}
 <?php endif;
?>  <?php if( $default_options[ 'footer_widget_title_font_color' ] != $interface_theme_setting_value[ 'footer_widget_title_font_color' ] ) : ?> /* Footer Widget Titles */
#colophon .widget-title {
 color: <?php echo esc_attr( $interface_theme_setting_value[ 'footer_widget_title_font_color' ] );
?>;
}
 <?php endif;
?>  <?php if( $default_options[ 'footer_content_font_color' ] != $interface_theme_setting_value[ 'footer_content_font_color' ] ) : ?> /* Footer Content */
#colophon .widget-wrap, #colophon .widget ul li a, #site-generator .copyright a {
 color: <?php echo esc_attr( $interface_theme_setting_value[ 'footer_content_font_color' ] );
?>;
}
 <?php endif;
?>  <?php if( $default_options[ 'bottom_info_bar_font_color' ] != $interface_theme_setting_value[ 'bottom_info_bar_font_color' ] ) : ?> /* Bottom Info Bar */
#colophon .info-bar, #colophon .info-bar .info ul li a {
 color: <?php echo esc_attr( $interface_theme_setting_value[ 'bottom_info_bar_font_color' ] );
?>;
}
 <?php endif;
?>  <?php if( $default_options[ 'site_generator_font_color' ] != $interface_theme_setting_value[ 'site_generator_font_color' ] ) : ?> /* Site Generator */
#site-generator .copyright {
 color: <?php echo esc_attr( $interface_theme_setting_value[ 'site_generator_font_color' ] );
?>;
}
 <?php endif; ?>
</style>
        <?php	}?>
