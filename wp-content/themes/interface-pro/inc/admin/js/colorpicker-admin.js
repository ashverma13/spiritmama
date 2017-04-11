/**
 * Iris color picker for theme options
 */
jQuery(document).ready(function(jQuery){
	jQuery('#content_font_color').wpColorPicker();
	jQuery('#top_info_bar_font_color').wpColorPicker();
	jQuery('#site_title_font_color').wpColorPicker();
	jQuery('#navigation_font_color').wpColorPicker();
	jQuery('#solgan_featured_page_breadcrumbs_title_font_color').wpColorPicker();
	jQuery('#all_heading_titles_font_color').wpColorPicker();
	jQuery('#sidebar_widget_title_font_color').wpColorPicker();
	jQuery('#sidebar_content_font_color').wpColorPicker();
	jQuery('#footer_widget_title_font_color').wpColorPicker();
	jQuery('#footer_content_font_color').wpColorPicker();
	jQuery('#bottom_info_bar_font_color').wpColorPicker();
	jQuery('#site_generator_font_color').wpColorPicker();

	jQuery('#interface_top_info_bar_color').wpColorPicker();
	jQuery('#interface_header_color').wpColorPicker();
	jQuery('#interface_main_content_color').wpColorPicker();
	jQuery('#interface_promotional_clients_blockquote_sticky_color').wpColorPicker();
	jQuery('#interface_form_input_textarea_paginations_color').wpColorPicker();
	jQuery('#footer_widget_section_color').wpColorPicker();
	jQuery('#bottom_info_bar_color').wpColorPicker();
	jQuery('#site_generator_color').wpColorPicker();

var interface_id = ["interface_slogan_slider_title_color","interface_buttons_color","interface_link_color"];
for (var i = 0; i < 3; i++) {
	var id = "#"+interface_id[i];
	jQuery(id).wpColorPicker();
}
jQuery(".font").change(function () {
	var color_selected = "";
	jQuery("select.select-color option:selected").each(function () {
		color_selected = jQuery(this).val();
		switch(color_selected){
			case 'Cyan':
				var color_value = ["#05A9C5","#05A9C5","#05A9C5"];//put your cases here
     		break;

     		case 'Light Green':
				var color_value = ["#8db45c","#8db45c","#8db45c"];//put your cases here
     		break;

			case 'Yellow':
     			var color_value = ["#FCC71F","#FCC71F","#FCC71F"];//put your cases here
     		break;

     		case 'Pink':
     			var color_value = ["#F52E5D","#F52E5D","#F52E5D"];//put your cases here
     		break;

     		case 'Brown':
     			var color_value = ["#9C6B33","#9C6B33","#9C6B33"];//put your cases here
     		break;

     		case 'Maroon':
     			var color_value = ["#CC3F48","#CC3F48","#CC3F48"];//put your cases here
     		break;
        case 'Blue':
          var color_value = ["#4a89c3","#4a89c3","#4a89c3"];//put your cases here
        break;        

     		case 'Purple':
     			var color_value = ["#9651CC","#9651CC","#9651CC"];//put your cases here
     		break;

     		case 'Orange':
     			var color_value = ["#E46B3E","#E46B3E","#E46B3E"];//put your cases here
     		break;

     		case 'Aquamarine':
     			var color_value = ["#63C6AE","#63C6AE","#63C6AE"];//put your cases here
     		break;

     		case 'Light Red':
     			var color_value = ["#F77565","#F77565","#F77565"];//put your cases here
     		break;
   	}
   	for (var i = 0; i < 3; i++) {
   		var ids = "#"+interface_id[i];
   		jQuery(ids).val(color_value[i]);
   		jQuery(ids).closest(".wp-picker-container").children(".wp-color-result").css("background-color",color_value[i]);
   		jQuery(ids).wpColorPicker('color', color_value[i]);
   	}
	});

});

/* Alert box for Restore defaults options */
jQuery('.reset').click(function(event){
	var answer = confirm('Are you sure you want to restore defaults?');
if (answer)
{
  console.log('yes');
}
else
{
  event.preventDefault();
}
});
});