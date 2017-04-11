<?php
/**
 * Interface Pro Theme Options
 *
 * Contains all the function related to theme options.
 *
 * @package Theme Horse
 * @subpackage Interface Pro
 * @since Interface Pro 1.0
 */

/****************************************************************************************/

add_action( 'admin_enqueue_scripts', 'interface_jquery_javascript_file_cookie' );
/**
 * Register jquery cookie javascript file.
 *
 * jquery cookie used for remembering admin tabs, and potential future features... so let's register it early
 *
 * @uses wp_register_script
 */
function interface_jquery_javascript_file_cookie() {
   wp_register_script( 'jquery-cookie', INTERFACE_ADMIN_JS_URL . '/jquery.cookie.min.js', array( 'jquery' ) );
}

/****************************************************************************************/

add_action( 'admin_print_scripts-appearance_page_theme_options', 'interface_admin_scripts' );
/**
 * Enqueuing some scripts.
 *
 * @uses wp_enqueue_script to register javascripts.
 * @uses wp_enqueue_script to add javascripts to WordPress generated pages.
 */
function interface_admin_scripts() {
   wp_enqueue_script( 'interface_admin', INTERFACE_ADMIN_JS_URL . '/admin.js', array( 'jquery', 'jquery-ui-tabs', 'jquery-cookie', 'jquery-ui-sortable', 'jquery-ui-draggable' ) );
   wp_enqueue_script( 'interface_toggle_effect', INTERFACE_ADMIN_JS_URL . '/toggle-effect.js' );
   wp_enqueue_script( 'interface_image_upload', INTERFACE_ADMIN_JS_URL . '/add-image-script.js', array( 'jquery','media-upload', 'thickbox' ) );
   wp_enqueue_script( 'wp-color-picker' );
   wp_enqueue_script( 'interface_colorpicker', INTERFACE_ADMIN_JS_URL . '/colorpicker-admin.js', array( 'jquery','wp-color-picker' ), false, true );
}
/****************************************************************************************/

add_action( 'admin_print_styles-appearance_page_theme_options', 'interface_admin_styles' );
/**
 * Enqueuing some styles.
 *
 * @uses wp_enqueue_style to register stylesheets.
 * @uses wp_enqueue_style to add styles.
 */
function interface_admin_styles() {
	wp_enqueue_style( 'thickbox' );
	wp_enqueue_style( 'interface_admin_style', INTERFACE_ADMIN_CSS_URL. '/admin.css' );
	wp_enqueue_style( 'wp-color-picker' );
}

/****************************************************************************************/

add_action( 'admin_print_styles-appearance_page_theme_options', 'interface_social_script', 100);
/**
 * Facebook, twitter script hooked at head
 * 
 * @useage for Facebook, Twitter and Print Script 
 * @Use add_action to display the Script on header
 */
function interface_social_script() { ?>
<!-- Facebook script -->


<div id="fb-root"></div>
<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=284802028306078";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script> 

<!-- Twitter script --> 
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> 

<!-- Print Script --> 
<script src="http://cdn.printfriendly.com/printfriendly.js" type="text/javascript"></script>
<?php     
}

/****************************************************************************************/

add_action( 'admin_menu', 'interface_options_menu' );
/**
 * Create sub-menu page.
 *
 * @uses add_theme_page to add sub-menu under the Appearance top level menu.
 */
function interface_options_menu() {
    
	add_theme_page( 
		__( 'Theme Options', 'interface' ),           // Name of the page
		__( 'Theme Options', 'interface' ),           // Label in menu (Inside apperance)
		'edit_theme_options',                         // Capability 
		'theme_options',                              // Menu slug, which is used to define uniquely the page
		'interface_theme_options_add_theme_page'      // Function used to rendrs the options page
	);

}

/****************************************************************************************/

add_action( 'admin_init', 'interface_register_settings' );
	/**
		* Register options and function call back of validation
		*
		* this three options interface_theme_options', 'interface_theme_options', 'interface_theme_options_validate'
		* first parameter interface_theme_options  =>    To set all field eg:- social link, design options etc.
		* second parameter interface_theme_options =>	 Option value to sanitize and save. array values etc. can be called global 
		* third parameter interface_theme_options  => 	 Call back function
		* @uses register_setting
	*/
function interface_register_settings() {
   register_setting( 'interface_theme_options', 'interface_theme_options', 'interface_theme_options_validate' );
 
}

/****************************************************************************************/
/**
 * Render the options page
 */
function interface_theme_options_add_theme_page() {
?>
<div class="them_option_block clearfix">
  <div class="theme_option_title">
    <h2>
      <?php _e( 'Theme Options by', 'interface' ); ?>
    </h2>
  </div>
  <div class="theme_option_link">
    <a href="<?php echo esc_url( __( 'http://themehorse.com/', 'interface' ) ); ?>" title="<?php esc_attr_e( 'Theme Horse', 'interface' ); ?>" target="_blank">
      <img src="<?php echo INTERFACE_ADMIN_IMAGES_URL . '/theme-horse.png'; ?>" alt="'<?php _e( 'Theme Horse', 'interface' ); ?>" />
    </a> 
  </div>
</div>
<br/>
<br/>
<br/>
<div class="donate-info"> <strong>
  <?php _e( 'Confused about something? See', 'interface' ); ?>
  </strong><br/>
  <a href="<?php echo esc_url( 'http://themehorse.com/theme-instruction/interface-pro/' ); ?>" title="<?php esc_attr_e( 'Interface Pro Theme Instructions', 'interface' ); ?>" target="_blank" class="instruction">
    <?php _e( 'Theme Instructions', 'interface' ); ?>
  </a>
  <a href="<?php echo esc_url( 'http://themehorse.com/support-forum/' ); ?>" title="<?php esc_attr_e( 'Support Forum', 'interface' ); ?>" target="_blank" class="support">
    <?php _e( 'Support Forum', 'interface' ); ?>
  </a>
  <a href="<?php echo esc_url( 'http://themehorse.com/preview/interface-pro/' ); ?>" title="<?php esc_attr_e( 'Interface Pro Demo', 'interface' ); ?>" target="_blank" class="demo">
    <?php _e( 'View Demo', 'interface' ); ?>
  </a>
  <div id="social-share">
    <div class="fb-like" data-href="https://www.facebook.com/themehorse" data-send="false" data-layout="button_count" data-width="90" data-show-faces="true"></div>
    <div class="tw-follow" ><a href="<?php echo esc_url( 'http://twitter.com/Theme_Horse' ); ?>" class="twitter-follow-button" data-button="grey" data-text-color="#FFFFFF" data-link-color="#00AEFF" data-width="150px" data-show-screen-name="true" data-show-count="false"></a></div>
  </div>
</div>
<div id="themehorse" class="wrap">
  <form method="post" action="options.php">
    <?php
			/**
			* should match with the register_settings first parameter of line no 117
			*/
				settings_fields( 'interface_theme_options' ); 
				global $interface_theme_default;
				$options = $interface_theme_default;             
			?>
    <?php if( isset( $_GET [ 'settings-updated' ] ) && 'true' == $_GET[ 'settings-updated' ] ): ?>
    <div class="updated" id="message">
      <p><strong>
        <?php _e( 'Settings saved.', 'interface' );?>
        </strong></p>
    </div>
    <?php endif; ?>
    <div id="interface_tabs">
      <ul id="main-navigation" class="tab-navigation">
        <li><a href="#responsivelayout">
          <?php _e( 'Layout Options', 'interface' );?>
          </a></li>
        <li><a href="#designoptions">
          <?php _e( 'Design Options', 'interface' );?>
          </a></li>
        <li><a href="#advancedoptions">
          <?php _e( 'Advance Options', 'interface' );?>
          </a></li>
        <li><a href="#featuredpostslider">
          <?php _e( 'Featured Post/Page Slider', 'interface' );?>
          </a></li>
        <li><a href="#sociallink">
          <?php _e( 'Contact / Social Links', 'interface' );?>
          </a></li>
      </ul>
      <!-- .tab-navigation #main-navigation --> 
      <!-- Option for Responsive Layout -->
      <div id="responsivelayout">
        <div class="option-container">
          <h3 class="option-toggle"><a href="#">
            <?php _e( 'Site Layout', 'interface' ); ?>
            </a></h3>
          <div class="option-content inside">
            <table class="form-table">
              <tbody>
                <tr>
                  <th scope="row"><label>
                      <?php _e( 'Site Layout', 'interface' ); ?>
                    </label>
                    <p><small>
                      <?php _e( 'This change is reflected in whole website', 'interface' ); ?>
                      </small></p>
                  </th>
                  <td><label title="narrow-layout" class="box" style="margin-right: 18px"><img src="<?php echo INTERFACE_ADMIN_IMAGES_URL; ?>/one-column.png" alt="Content-Sidebar" /><br />
                      <input type="radio" name="interface_theme_options[site_layout]" id="narrow-layout" <?php checked($options['site_layout'], 'narrow-layout') ?> value="narrow-layout"  />
                      <?php _e( 'Narrow Layout', 'interface' ); ?>
                    </label>
                    <label title="wide-layout" class="box" style="margin-right: 18px"><img src="<?php echo INTERFACE_ADMIN_IMAGES_URL; ?>/no-sidebar-fullwidth.png" alt="Content-Sidebar" /><br />
                      <input type="radio" name="interface_theme_options[site_layout]" id="wide-layout" <?php checked($options['site_layout'], 'wide-layout') ?> value="wide-layout"  />
                      <?php _e( 'Wide Layout', 'interface' ); ?>
                    </label></td>
                </tr>
              </tbody>
            </table>
            <p class="submit">
              <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" />
            </p>
          </div>
          <!-- .option-content --> 
        </div>
        <!-- .option-container -->
        <div class="option-container">
          <h3 class="option-toggle"><a href="#">
            <?php _e( 'Content Layout', 'interface' ); ?>
            </a></h3>
          <div class="option-content inside">
            <table class="form-table">
              <tbody>
                <tr>
                  <th scope="row"><label>
                      <?php _e( 'Layouts', 'interface' ); ?>
                    </label></th>
                  <td><label title="no-sidebar" class="box" style="margin-right: 18px"><img src="<?php echo INTERFACE_ADMIN_IMAGES_URL; ?>/no-sidebar.png" alt="Content-Sidebar" /><br />
                      <input type="radio" name="interface_theme_options[default_layout]" id="no-sidebar" <?php checked($options['default_layout'], 'no-sidebar') ?> value="no-sidebar"  />
                      <?php _e( 'No Sidebar', 'interface' ); ?>
                    </label>
                    <label title="no-sidebar-full-width" class="box" style="margin-right: 18px"><img src="<?php echo INTERFACE_ADMIN_IMAGES_URL; ?>/no-sidebar-fullwidth.png" alt="Content-Sidebar" /><br />
                      <input type="radio" name="interface_theme_options[default_layout]" id="no-sidebar-full-width" <?php checked($options['default_layout'], 'no-sidebar-full-width') ?> value="no-sidebar-full-width"  />
                      <?php _e( 'No Sidebar, Full Width', 'interface' ); ?>
                    </label>
                    <label title="left-Sidebar" class="box" style="margin-right: 18px"><img src="<?php echo INTERFACE_ADMIN_IMAGES_URL; ?>/left-sidebar.png" alt="Content-Sidebar" /><br />
                      <input type="radio" name="interface_theme_options[default_layout]" id="left-sidebar" <?php checked($options['default_layout'], 'left-sidebar') ?> value="left-sidebar"  />
                      <?php _e( 'Left Sidebar', 'interface' ); ?>
                    </label>
                    <label title="right-sidebar" class="box" style="margin-right: 18px"><img src="<?php echo INTERFACE_ADMIN_IMAGES_URL; ?>/right-sidebar.png" alt="Content-Sidebar" /><br />
                      <input type="radio" name="interface_theme_options[default_layout]" id="right-sidebar" <?php checked($options['default_layout'], 'right-sidebar') ?> value="right-sidebar"  />
                      <?php _e( 'Right Sidebar', 'interface' ); ?>
                    </label></td>
                </tr>
                <?php if( "1" == $options[ 'reset_layout' ] ) { $options[ 'reset_layout' ] = "0"; } ?>
                <tr>
                  <th scope="row"><label for="reset_layout">
                      <?php _e( 'Reset Layout', 'interface' ); ?>
                    </label></th>
                  <input type='hidden' value='0' name='interface_theme_options[reset_layout]'>
                  <td><input type="checkbox" id="reset_layout" name="interface_theme_options[reset_layout]" value="1" <?php checked( '1', $options['reset_layout'] ); ?> />
                    <?php _e('Check to reset', 'interface'); ?></td>
                </tr>
              </tbody>
            </table>
            <p class="submit">
              <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" />
            </p>
          </div>
          <!-- .option-content --> 
        </div>
        <!-- .option-container -->
        <div class="option-container">
          <h3 class="option-toggle"><a href="#">
            <?php _e( 'Responsive Layout', 'interface' ); ?>
            </a></h3>
          <div class="option-content inside">
            <table class="form-table">
              <tbody>
                <tr>
                  <th scope="row"><label>
                      <?php _e( 'Responsive Layout', 'interface' ); ?>
                    </label></th>
                  <td><label title="on" class="box">
                      <input type="radio" name="interface_theme_options[site_design]" id="on" <?php checked($options['site_design'], 'on') ?> value="on"  />
                      <?php _e( 'ON <span class="description">(Responsive view will be displayed in small devices )</span>', 'interface' ); ?>
                    </label>
                    <label title="off" class="box">
                      <input type="radio" name="interface_theme_options[site_design]" id="off" <?php checked($options['site_design'], 'off') ?> value="off"  />
                      <?php _e( 'OFF   <span class="description">(Full site will display as desktop view)</span>', 'interface' ); ?>
                    </label></td>
                </tr>
              </tbody>
            </table>
            <p class="submit">
              <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" />
            </p>
          </div>
          <!-- .option-content --> 
        </div>
        <!-- .option-container --> 
      </div>
      <!-- #Responsive Layout -->
      <div id="designoptions">
        <div class="option-container">
          <h3 class="option-toggle"><a href="#">
            <?php _e( 'Custom Header', 'interface' ); ?>
            </a></h3>
          <div class="option-content inside">
            <table class="form-table">
              <tbody>
                <tr>
                  <th scope="row"><label for="header_logo">
                      <?php _e( 'Header Logo', 'interface' ); ?>
                    </label></th>
                  <td><input class="upload" size="65" type="text" id="header_logo" name="interface_theme_options[header_logo]" value="<?php echo esc_url( $options [ 'header_logo' ] ); ?>" />
                    <input class="upload-button button" name="image-add" type="button" value="<?php esc_attr_e( 'Change Header Logo', 'interface' ); ?>" /></td>
                </tr>
                <tr>
                  <th scope="row"><?php _e( 'Preview', 'interface' ); ?></th>
                  <td><?php
										       echo '<img src="'.esc_url( $options[ 'header_logo' ] ).'" alt="'.__( 'Header Logo', 'interface' ).'" />';
										   ?></td>
                </tr>
                <tr>
                  <th scope="row"><label>
                      <?php _e( 'Show', 'interface' ); ?>
                    </label></th>
                  <td><?php // interface_theme_options[header_show] this is defined in register_setting second parameter?>
                    <input type="radio" name="interface_theme_options[header_show]" id="header-logo" <?php checked($options['header_show'], 'header-logo') ?> value="header-logo"  />
                    <?php _e( 'Header Logo Only', 'interface' ); ?>
                    </br>
                    <input type="radio" name="interface_theme_options[header_show]" id="header-text" <?php checked($options['header_show'], 'header-text') ?> value="header-text"  />
                    <?php _e( 'Header Text Only', 'interface' ); ?>
                    </br>
                    <input type="radio" name="interface_theme_options[header_show]" id="header-text" <?php checked($options['header_show'], 'disable-both') ?> value="disable-both"  />
                    <?php _e( 'Disable', 'interface' ); ?>
                    </br></td>
                </tr>
                <tr>
                  <th> <?php _e( 'Need to replace Header Image?', 'interface' ); ?>
                  </th>
                  <td><?php printf( __('<a class="button" href="%s">Click here</a>', 'interface' ), admin_url('themes.php?page=custom-header')); ?></td>
                </tr>
                <tr>
                  <th scope="row"><?php _e( 'Hide Searchform from Header', 'interface' ); ?></th>
                  <input type='hidden' value='0' name='interface_theme_options[hide_header_searchform]'>
                  <td><input type="checkbox" id="headerlogo" name="interface_theme_options[hide_header_searchform]" value="1" <?php checked( '1', $options['hide_header_searchform'] ); ?> />
                    <?php _e('Check to hide', 'interface'); ?></td>
                </tr>
              </tbody>
            </table>
            <p class="submit">
              <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" />
            </p>
          </div>
          <!-- .option-content --> 
        </div>
        <!-- .option-container -->
        
        <div class="option-container">
          <h3 class="option-toggle"><a href="#">
            <?php _e( 'Fav Icon Options', 'interface' ); ?>
            </a></h3>
          <div class="option-content inside">
            <table class="form-table">
              <tbody>
                <tr>
                  <th scope="row"><label for="disable_favicon">
                      <?php _e( 'Disable Favicon', 'interface' ); ?>
                    </label></th>
                  <input type='hidden' value='0' name='interface_theme_options[disable_favicon]'>
                  <td><input type="checkbox" id="disable_favicon" name="interface_theme_options[disable_favicon]" value="1" <?php checked( '1', $options['disable_favicon'] ); ?> />
                    <?php _e('Check to disable', 'interface'); ?></td>
                </tr>
                <tr>
                  <th scope="row"><label for="fav_icon_url">
                      <?php _e( 'Fav Icon URL', 'interface' ); ?>
                    </label></th>
                  <td><input class="upload" size="65" type="text" id="fav_icon_url" name="interface_theme_options[favicon]" value="<?php echo esc_url( $options [ 'favicon' ] ); ?>" />
                    <input class="upload-button button" name="image-add" type="button" value="<?php esc_attr_e( 'Change Fav Icon', 'interface' ); ?>" /></td>
                </tr>
                <tr>
                  <th scope="row"><?php _e( 'Preview', 'interface' ); ?></th>
                  <td><?php
										       echo '<img src="'.esc_url( $options[ 'favicon' ] ).'" alt="'.__( 'favicon', 'interface' ).'" />';
										   ?></td>
                </tr>
              </tbody>
            </table>
            <p class="submit">
              <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" />
            </p>
          </div>
          <!-- .option-content --> 
        </div>
        <!-- .option-container -->
        
        <div class="option-container">
          <h3 class="option-toggle"><a href="#">
            <?php _e( 'Web Clip Icon Options', 'interface' ); ?>
            </a></h3>
          <div class="option-content inside">
            <table class="form-table">
              <tbody>
                <tr>
                  <th scope="row"><label for="disable_webpageicon">
                      <?php _e( 'Disable Web Clip Icon', 'interface' ); ?>
                    </label></th>
                  <input type='hidden' value='0' name='interface_theme_options[disable_webpageicon]'>
                  <td><input type="checkbox" id="disable_webpageicon" name="interface_theme_options[disable_webpageicon]" value="1" <?php checked( '1', $options['disable_webpageicon'] ); ?> />
                    <?php _e('Check to disable', 'interface'); ?></td>
                </tr>
                <tr>
                  <th scope="row"><label for="webpageicon_icon_url">
                      <?php _e( 'Web Clip Icon URL', 'interface' ); ?>
                    </label></th>
                  <td><input class="upload" size="65" type="text" id="webpageicon_icon_url" name="interface_theme_options[webpageicon]" value="<?php echo esc_url( $options [ 'webpageicon' ] ); ?>" />
                    <input class="upload-button button" name="image-add" type="button" value="<?php esc_attr_e( 'Change Web Clip Icon', 'interface' ); ?>" /></td>
                </tr>
                <tr>
                  <th scope="row"><?php _e( 'Preview', 'interface' ); ?></th>
                  <td><?php
										       echo '<img src="'.esc_url( $options[ 'webpageicon' ] ).'" alt="'.__( 'webpage icon', 'interface' ).'" />';
										   ?></td>
                </tr>
              </tbody>
            </table>
            <p class="submit">
              <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" />
            </p>
          </div>
          <!-- .option-content --> 
        </div>
        <!-- .option-container -->
        
        <div class="option-container">
          <h3 class="option-toggle"><a href="#">
            <?php _e( 'Custom Background', 'interface' ); ?>
            </a></h3>
          <div class="option-content inside">
            <table class="form-table">
              <tbody>
                <tr>
                  <th> <?php _e( 'Need to replace default background?', 'interface' ); ?>
                  </th>
                  <td style="padding-bottom: 64px;"><?php printf(__('<a class="button" href="%s">Click here</a>', 'interface'), admin_url('themes.php?page=custom-background')); ?></td>
                  <td style="padding-bottom: 20px;"><p><small>
                      <?php _e( 'Note: The custom background change will be reflected in the background if the site layout is set to be narrow layout instead of the wide layout.', 'interface' ); ?>
                      </small></p></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- .option-content --> 
        </div>
        <!-- .option-container -->
        
        <div class="option-container">
          <h3 class="option-toggle"><a href="#">
            <?php _e( 'Custom CSS', 'interface' ); ?>
            </a></h3>
          <div class="option-content inside">
            <table class="form-table">
              <tbody>
                <tr>
                  <th scope="row"><label for="custom-css">
                      <?php _e( 'Enter your custom CSS styles.', 'interface' ); ?>
                    </label>
                    <p><small>
                      <?php _e( 'This CSS will overwrite the CSS of style.css file.', 'interface' ); ?>
                      </small></p>
                  </th>
                  <td><textarea name="interface_theme_options[custom_css]" id="custom-css" cols="90" rows="12"><?php echo esc_attr( $options[ 'custom_css' ] ); ?></textarea></td>
                </tr>
                <tr>
                  <th scope="row"><?php _e( 'CSS Tutorial from W3Schools.', 'interface' ); ?></th>
                  <td><a class="button" href="<?php echo esc_url( __( 'http://www.w3schools.com/css/default.asp','interface' ) ); ?>" title="<?php esc_attr_e( 'CSS Tutorial', 'interface' ); ?>" target="_blank">
                    <?php _e( 'Click Here to Read', 'interface' );?>
                    </a></td>
                </tr>
              </tbody>
            </table>
            <p class="submit">
              <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" />
            </p>
          </div>
          <!-- .option-content --> 
        </div>
        <!-- .option-container --> 
<?php
	$interface_typography_options = array(
		'interface_general_typography'	=> array( 
							'title' => __( 'Content','interface' ),
							'description' => __( 'Changes will reflect in content.', 'interface' )
							 ),
		'interface_navigation'			=> array( 
							'title' => __( 'Navigation','interface' ),
							'description' => __( 'Changes will reflect in the menu', 'interface' )
							 ),
		'interface_title'					=> array( 
							'title' => __( 'Title','interface' ),
							'description' => __( 'Changes will reflect in all titles', 'interface' )
							 )
						);	
	$interface_font_size_options = array(

		'content'							=> array( 
							'title' => __( 'Content','interface' )
							 ),
		'buttons'							=> array( 
							'title' => __( 'Buttons','interface' )
							 ),
		'site_title'							=> array( 
							'title' => __( 'Site Title','interface' )
							 ),
		'navigation'							=> array( 
							'title' => __( 'Navigation','interface' )
							 ),
		'navigation_child'						=> array( 
							'title' => __( 'Navigation Child','interface' )
							),
		'primary_slogan'				=> array( 
							'title' => __( 'Primary Slogan','interface' )
							 ),
		'secondary_slogan'				=> array( 
							'title' => __( 'Secondary Slogan','interface' )
							 ),
		'featured_title'								=> array( 
							'title' => __( 'Featured Title ','interface' )
							 ),
		'business_layout_widget_title'						=> array( 
							'title' => __( 'Business /Our Team/ Testimonial/ Service Template Widget Titles (Parent)','interface' )
							 ),	
		'business_layout_service_promot_featured_recentwork'	=> array( 
							'title' => __( 'Business/ Services/ Promotional/ Featured Recent Work/ Our Team Titles (Child)','interface' )
							 ),
		'post_title'						=> array( 
							'title' => __( 'Post Title','interface' )
							 ),
		'sidebar_colophon_widget_title'						=> array( 
							'title' => __( 'Sidebar/Colophon Widget Title','interface' )
							 )							
						);
				?>
				
        <div class="option-container">
        <h3 class="option-toggle"><a href="#"><?php _e( 'Typography Options', 'interface' ); ?></a></h3>
        <?php /* Font family */ ?>
        <div class="option-content inside">
            <table class="form-table">  
                    <tr>
                        <th>
                            <h3><?php _e( 'Font Family','interface' ); ?></h3>
                        </th>
                    </tr>    
                <?php foreach( $interface_typography_options as $key => $interface_typography_option ) { ?>
                    <tr>
                        <th scope="row">
                            <label for="<?php echo $key; ?>"><?php echo $interface_typography_option[ 'title' ]; ?></label>
                            <p><small><?php printf( __( '%s', 'interface' ), $interface_typography_option[ 'description' ] ); ?></small></p>
                        </th>
                        <td>
                            <div class="<?php echo $key; ?>">
                              <select class="selected" name="interface_theme_options[<?php echo $key; ?>]" id="<?php echo $key; ?>">
                                 <?php 
                                 foreach ( interface_google_fonts() as $value ) { ?>
                                       <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $options[ $key ], $value ); ?>><?php printf( esc_attr( '%s', 'interface' ), $value ); ?></option>
                                 <?php } ?>
                              </select>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        
            <?php /* Font sizes */ ?>
            <table class="form-table">  
                    <tr>
                        <th>
                            <h3><?php _e( 'Font Size','interface' ); ?></h3>
                        </th>
                    </tr>    
                <?php foreach( $interface_font_size_options as $key => $interface_font_size_options ) { ?>
                    <tr>
                        <th scope="row">
                            <label for="<?php echo $key; ?>"><?php echo $interface_font_size_options[ 'title' ]; ?></label>
                        </th>
                        <td>
                            <div class="<?php echo $key; ?>">
                              <select class="selected" name="interface_theme_options[<?php echo $key; ?>]" id="<?php echo $key; ?>">
                                 <?php 
								 $interface_multidimension = interface_font_sizes();
                                 foreach ( $interface_multidimension[$key.'_sizes'] as $value_key => $interface_font_size ) { ?>
                                       <option value="<?php echo esc_attr( $value_key ); ?>" <?php selected( $options[ $key ], $value_key ); ?>><?php printf( esc_attr( '%s', 'interface' ), $interface_font_size ); ?></option>
                                 <?php } ?>
                              </select>
                              <?php _e( 'px','interface' ); ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" /></p>
            <p class="submit"><input type="submit" name="interface_theme_options[reset_font_family]" class="button-primary reset" value="Reset Defaults" /></p>
        </div><!-- .option-content -->
        </div><!-- .option-container -->                      
        
        <div class="option-container">
        <h3 class="option-toggle"><a href="#"><?php _e( 'Color Options', 'interface' ); ?></a></h3>
        <div class="option-content inside">
            <table class="form-table">
                <tbody>
                    <tr>                            
                        <th><h3><?php _e( 'Color Skin','interface' ); ?></h3></th>
                    </tr>
                    <tr>                            
                        <th scope="row"><label for="color_scheme"><?php _e( 'Choose Color', 'interface' ); ?></label></th>
        
                            <td>
                                <div class="font">
                                    <select class="select-color" id="interface_cycle_style" name="interface_theme_options[color_scheme]">
                                        <?php 
                                            $interface_colors = array();
                                            $interface_colors = array( 		'Purple',
                                                                                    'Pink',
                                                                                    'Yellow',
                                                                                    'Orange',
                                                                                    'Brown',
                                                                                    'Maroon',
                                                                                    'Aquamarine',
                                                                                    'Cyan',
                                                                                    'Blue',
                                                                                    'Light Red',
                                                                                    'Light Green',
                                                                                    
                                                                        );
                                            foreach( $interface_colors as $interface_color ) {
                                        ?>
        
                                        <option value="<?php echo $interface_color; ?>" <?php selected( $interface_color, $options['color_scheme']); ?>><?php printf( __( '%s', 'interface' ), $interface_color ); ?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    <?php     
			global $colour_options;                                            
			$colour_options = array(
				 'interface_link_color'		=> array( 
														'title' => __( 'Link Color','interface' ),
														'description' => __( 'Changes will reflect on Site Title, Navigation and links ', 'interface' )),
			  
				'interface_buttons_color'		=> array( 
														'title' => __( 'Buttons Color','interface' ),
														'description' => __( 'Changes will reflect on Buttons, Custom Tag Cloud, Paginations and Borders', 'interface' ) ),
				 'interface_slogan_slider_title_color'		=> array( 
                                                                'title' => __( 'Slogan/Slider Title Color','interface' ),
                                                                'description' => __( 'Changes will reflect on Featured Slider, Slogan and Page Title', 'interface' ) )
			);
                                    
                    foreach ( $colour_options as $key => $colour_option) :
                    ?>      	
                    <tr>
                        <th scope="row">
                            <label for="<?php echo $key; ?>"><?php echo $colour_option['title']; ?></label>
                        </th>
                        <td width="115px">
                            <input type="text" class="color" id="<?php echo $key; ?>" name="interface_theme_options[<?php echo $key; ?>]" size="8" value="<?php echo $options[$key]; ?>" />
                        <div id="colorpicker_<?php echo $key; ?>" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
                        </td>
                        <td>
                                <p><small><?php printf( __( '%s', 'interface' ), $colour_option[ 'description' ] ); ?></small></p>
                            </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        
            <table class="form-table">
                <tbody>
                    <tr>                            
                        <th><h3><?php _e( 'Background Color Options','interface' ); ?></h3></th>
                    </tr>
                    <?php     
                    global $background_options;                                            
                    $background_options = array(
                        'interface_top_info_bar_color'		=> array( 
                                                                'title' => __( 'Top Info Bar','interface' ) ),
                        'interface_header_color'		=> array( 
                                                                'title' => __( 'Header','interface' ) ),
                        'interface_main_content_color'		=> array( 
                                                                'title' => __( 'Main Content', 'interface' ) ),
                        'interface_promotional_clients_blockquote_sticky_color'		=> array( 
                                                                'title' => __( 'Promotional Bar, Our Clients, Blockquote and Sticky post', 'interface' ) ),
                        'interface_form_input_textarea_paginations_color'		=> array( 
                                                                'title' => __( 'Form Input/Textarea Fields and Paginations','interface' ) ),
                        'footer_widget_section_color'		=> array( 
                                                                'title' => __( ' Footer Widget Section','interface' ) ),
                        'bottom_info_bar_color'		=> array( 
                                                                'title' => __( 'Bottom Info Bar','interface' ) ),
                        'site_generator_color'		=> array( 
                                                                'title' => __( 'Site Generator','interface' ) )
                    );
                                    
                    foreach ( $background_options as $key => $background_option) :
                        ?>      	
                        <tr>
                        <th scope="row">
                            <label for="<?php echo $key; ?>"><?php echo $background_option['title']; ?></label>
                        </th>
                        <td>
                            <input type="text" class="color" id="<?php echo $key; ?>" name="interface_theme_options[<?php echo $key; ?>]" size="8" value="<?php echo $options[$key]; ?>" />
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        
            <table class="form-table">
                <tbody>
                    <tr>                            
                        <th><h3><?php _e( 'Font Color Options','interface' ); ?></h3></th>
                    </tr>
                    <?php     
                    global $colour_options;                                            
                    $font_colour_options = array(
                        'content_font_color'		=> array( 
                                                                'title' => __( 'Content','interface' ),
                                                                'description' => __( 'Changes will reflect on Content', 'interface' ) ),
                        'top_info_bar_font_color'		=> array( 
                                                                'title' => __( 'Top Info Bar','interface' ),
                                                                'description' => __( 'Changes will reflect on Top Info Bar, slogans,custom gallery', 'interface' ) ),
                        'site_title_font_color'		=> array( 
                                                                'title' => __( 'Site Title','interface' ),
                                                                'description' => __( 'Changes will reflect on Site Title', 'interface' ) ),
                        'navigation_font_color'		=> array( 
                                                                'title' => __( 'Navigation', 'interface' ),
                                                                'description' => __( 'Changes will reflect on Navigation', 'interface' ) ),
                        'solgan_featured_page_breadcrumbs_title_font_color'		=> array( 
                                                                'title' => __( 'Slogan, Featured Title, Page Title and Breadcrumb', 'interface' ),
                                                                'description' => __( 'Changes will reflect on Slogan, Featured Title Page Title and Breadcrumb', 'interface' ) ),
                        'all_heading_titles_font_color'		=> array( 
                                                                'title' => __( 'All Headings/Titles', 'interface' ),
                                                                'description' => __( 'Changes will reflect on All Headings/Titles', 'interface' ) ),
					                        'sidebar_widget_title_font_color'		=> array( 
                                                                'title' => __( 'Sidebar Widget Titles','interface' ),
                                                                'description' => __( 'Changes will reflect on Sidebar Widget Titles', 'interface' ) ),
                        'sidebar_content_font_color'		=> array( 
                                                                'title' => __( 'Sidebar Content','interface' ),
                                                                'description' => __( 'Changes will reflect on Sidebar Content', 'interface' ) ),
                        'footer_widget_title_font_color'		=> array( 
                                                                'title' => __( 'Footer Widget Titles ','interface' ),
                                                                'description' => __( 'Changes will reflect on Footer Widget Titles', 'interface' ) ),
                        'footer_content_font_color'		=> array( 
                                                                'title' => __( 'Footer Content', 'interface' ),
                                                                'description' => __( 'Changes will reflect on Footer Content', 'interface' ) ),
                        'bottom_info_bar_font_color'		=> array( 
                                                                'title' => __( 'Bottom Info Bar', 'interface' ),
                                                                'description' => __( 'Changes will reflect on Bottom Info Bar', 'interface' ) ),
                        'site_generator_font_color'		=> array( 
                                                                'title' => __( 'Site Generator', 'interface' ),
                                                                'description' => __( 'Changes will reflect on Site Generator', 'interface' ) )
                    );
                                    
                    foreach ( $font_colour_options as $key => $font_colour_option) :
                        ?>      	
                        <tr>
                            <th scope="row">
                                <label for="<?php echo $key; ?>"><?php echo $font_colour_option['title']; ?></label>
                            </th>
                            <td width=115px>
                                <input type="text" class="color" id="<?php echo $key; ?>" name="interface_theme_options[<?php echo $key; ?>]" size="8" value="<?php echo esc_attr( $options[ $key ] );?>"  />
                            </td>
                            <td>
                                <p><small><?php printf( __( '%s', 'interface' ), $font_colour_option[ 'description' ] ); ?></small></p>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" /></p>
            <p class="submit"><input type="submit" name="interface_theme_options[reset_colors]" class="button-primary reset" value="Reset Defaults" /></p>
        </div><!-- .option-content -->
        </div><!-- .option-container -->
        
        <div class="option-container">
        <h3 class="option-toggle"><a href="#"><?php _e( 'Background Pattern', 'interface' ); ?></a></h3>
        <div class="option-content inside">
            <?php                                            
                    $background_patterns = array(
                        'pattern1'		=> array( 
                                                                'title' => __( 'pattern 1','interface' ),
                                                                'img' => 'pattern-1' ),
                        'pattern2'		=> array( 
                                                                'title' => __( 'pattern 2','interface' ),
                                                                'img' => 'pattern-2' ),
                        'pattern3'		=> array( 
                                                                'title' => __( 'pattern 3', 'interface' ),
                                                                'img' => 'pattern-3' ),
                        'pattern4'		=> array( 
                                                                'title' => __( 'pattern 4','interface' ),
                                                                'img' => 'pattern-4' ),
                        'pattern5'		=> array( 
                                                                'title' => __( 'pattern 5','interface' ),
                                                                'img' => 'pattern-5' ),
                        'pattern6'		=> array( 
                                                                'title' => __( 'pattern 6','interface' ),
                                                                'img' => 'pattern-6' ),
                        'pattern7'		=> array( 
                                                                'title' => __( 'pattern 7','interface' ),
                                                                'img' => 'pattern-7' ),
                        'pattern8'		=> array( 
                                                                'title' => __( 'pattern 8','interface' ),
                                                                'img' => 'pattern-8' ),
                        'pattern9'		=> array( 
                                                                'title' => __( 'pattern 9','interface' ),
                                                                'img' => 'pattern-9' ),
                        'pattern10'		=> array( 
                                                                'title' => __( 'pattern 10','interface' ),
                                                                'img' => 'pattern-10' ),
                        'pattern11'		=> array( 
                                                                'title' => __( 'pattern 11','interface' ),
                                                                'img' => 'pattern-11' ),
                        'pattern12'		=> array( 
                                                                'title' => __( 'pattern 12','interface' ),
                                                                'img' => 'pattern-12' ),
                        'pattern13'		=> array( 
                                                                'title' => __( 'pattern 13','interface' ),
                                                                'img' => 'pattern-13' ),
                        'pattern14'		=> array( 
                                                                'title' => __( 'pattern 14','interface' ),
                                                                'img' => 'pattern-14' ),
                        'No Pattern'		=> array( 
                                                                'title' => __( 'No Pattern','interface' ),
                                                                'img' => 'disable' )
                    ); ?>							
                        
            <table class="form-table">
                <tbody>
                    <tr>                            
                        <th><h3><?php _e( 'Content Background Pattern','interface' ); ?></h3></th>
                    </tr>
                    <tr>
                        <td>
                            <?php				
                            foreach ( $background_patterns as $key => $background_pattern) : 
                                if( $key == 'No Pattern'){ ?>
                                    <?php _e( 'Disable Pattern','interface' ); ?>
                                    <label class="pattern_box <?php echo $key; ?>" title="<?php printf( esc_attr__( '%s','interface' ), $background_pattern['title'] ); ?>">
                                        <input class="check" id="<?php echo $key; ?>" type="radio" <?php checked( $options[ 'content_background_pattern'], $background_pattern['img']) ?> value="<?php echo $background_pattern['img']; ?>" name="interface_theme_options[content_background_pattern]">
                                    </label>		
                                <?php }else{ ?>												
                                    <label class="pattern_box <?php echo $key; ?>" title="<?php printf( esc_attr__( '%s','interface' ), $background_pattern['title'] ); ?>">
                                        <img alt="pattern" src="<?php echo INTERFACE_ADMIN_IMAGES_URL ?>/patterns/<?php echo $background_pattern['img']; ?>.jpg ">
                                        <input class="check" id="<?php echo $key; ?>" type="radio" <?php checked( $options[ 'content_background_pattern'], $background_pattern['img']) ?> value="<?php echo $background_pattern['img']; ?>" name="interface_theme_options[content_background_pattern]">
                                    </label>
                                <?php } ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        
            <table class="form-table">
                <tbody>
                    <tr>                            
                        <th><h3><?php _e( 'Footer Widget Background Pattern','interface' ); ?></h3></th>
                    </tr>
                    <tr>
                        <td>
                            <?php				
                            foreach ( $background_patterns as $key => $background_pattern) :
                                if( $key == 'No Pattern'){ ?>
                                    <?php _e( 'Disable Pattern','interface' ); ?>
                                    <label class="pattern_box <?php echo $key; ?>" title="<?php printf( esc_attr__( '%s','interface' ), $background_pattern['title'] ); ?>">
                                        <input class="check" id="<?php echo $key; ?>" type="radio" <?php checked( $options[ 'footer_widget_background_pattern'], $background_pattern['img'] ) ?> value="<?php echo $background_pattern['img']; ?>" name="interface_theme_options[footer_widget_background_pattern]">
                                    </label>
                                <?php }else{ ?>
                                    <label class="pattern_box <?php echo $key; ?>" title="<?php printf( esc_attr__( '%s','interface' ), $background_pattern['title'] ); ?>">
                                        <img alt="pattern" src="<?php echo INTERFACE_ADMIN_IMAGES_URL ?>/patterns/<?php echo $background_pattern['img']; ?>.jpg ">
                                        <input class="check" id="<?php echo $key; ?>" type="radio" <?php checked( $options[ 'footer_widget_background_pattern'], $background_pattern['img'] ) ?> value="<?php echo $background_pattern['img']; ?>" name="interface_theme_options[footer_widget_background_pattern]">
                                    </label>
                                <?php } ?>
                                    
                            <?php endforeach; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        
                
            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" /></p>
            <p class="submit"><input type="submit" name="interface_theme_options[reset_background]" class="button-primary reset" value="Reset Defaults" /></p>
        </div><!-- .option-content -->
        </div><!-- .option-container -->

        
      </div>
      <!-- #designoptions --> 
      <!-- Options for Theme Options -->
      <div id="advancedoptions">
        <div class="option-container">
          <h3 class="option-toggle"><a href="#">
            <?php _e( 'Home Slogan Options', 'interface' ); ?>
            </a></h3>
          <div class="option-content inside">
            <table class="form-table">
              <tbody>
                <tr>
                  <th scope="row"> <label for="slogan">
                      <?php _e( 'Disable Slogan Part', 'interface' ); ?>
                    </label>
                  </th>
                  <input type='hidden' value='0' name='interface_theme_options[disable_slogan]'>
                  <td><input type="checkbox" id="slogan" name="interface_theme_options[disable_slogan]" value="1" <?php checked( '1', $options['disable_slogan'] ); ?> />
                    <?php _e('Check to disable', 'interface'); ?></td>
                </tr>
                <tr>
                  <th scope="row"><label>
                      <?php _e( 'Slogan Position', 'interface' ); ?>
                    </label></th>
                  <td><label title="above-slider" class="box">
                      <input type="radio" name="interface_theme_options[slogan_position]" id="above-slider" <?php checked($options['slogan_position'], 'above-slider') ?> value="above-slider"  />
                      <?php _e( 'Above Slider', 'interface' ); ?>
                    </label>
                    <label title="below-slider" class="box">
                      <input type="radio" name="interface_theme_options[slogan_position]" id="below-slider" <?php checked($options['slogan_position'], 'below-slider') ?> value="below-slider"  />
                      <?php _e( 'Below Slider', 'interface' ); ?>
                    </label></td>
                </tr>
                <tr>
                  <th scope="row"><label for="slogan_1">
                      <?php _e( 'Home Page Primary Slogan', 'interface' ); ?>
                    </label>
                    <p><small>
                      <?php _e( 'The appropriate length of the slogan is around 10 words.', 'interface' ); ?>
                      </small></p>
                  </th>
                  <td><textarea class="textarea input-bg" id="slogan_1" name="interface_theme_options[home_slogan1]" cols="60" rows="3"><?php echo esc_textarea( $options[ 'home_slogan1' ] ); ?></textarea></td>
                </tr>
                <tr>
                  <th scope="row"><label for="slogan_2">
                      <?php _e( 'Home Page Secondary Slogan', 'interface' ); ?>
                    </label>
                    <p><small>
                      <?php _e( 'The appropriate length of the slogan is around 10 words.', 'interface' ); ?>
                      </small></p>
                  </th>
                  <td><textarea class="textarea input-bg" id="slogan_2" name="interface_theme_options[home_slogan2]" cols="60" rows="3"><?php echo esc_textarea( $options[ 'home_slogan2' ] ); ?></textarea></td>
                </tr>
              </tbody>
            </table>
            <p class="submit">
              <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" />
            </p>
          </div>
          <!-- .option-content --> 
        </div>
        <!-- .option-container -->
        <div class="option-container">
          <h3 class="option-toggle"><a href="#">
            <?php _e( 'Homepage Blog Category Setting', 'interface' ); ?>
            </a></h3>
          <div class="option-content inside">
            <table class="form-table">
              <tbody>
                <tr>
                  <th scope="row"> <label for="frontpage_posts_cats">
                      <?php _e( 'Front page posts categories:', 'interface' ); ?>
                    </label>
                    <p> <small>
                      <?php _e( 'Only posts that belong to the categories selected here will be displayed on the front page.', 'interface' ); ?>
                      </small> </p>
                  </th>
                  <td><select name="interface_theme_options[front_page_category][]" id="frontpage_posts_cats" multiple="multiple" class="select-multiple">
                      <option value="0" <?php if ( empty( $options['front_page_category'] ) ) { selected( true, true ); } ?>>
                      <?php _e( '--Disabled--', 'interface' ); ?>
                      </option>
                      <?php /* Get the list of categories */ 
                                 	if( empty( $options[ 'front_page_category' ] ) ) {
                                    	$options[ 'front_page_category' ] = array();
                                  	}
                                  	$categories = get_categories();
                                  	foreach ( $categories as $category) :?>
                      <option value="<?php echo $category->cat_ID; ?>" <?php if ( in_array( $category->cat_ID, $options['front_page_category'] ) ) {echo 'selected="selected"';}?>><?php echo $category->cat_name; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <br />
                    <span class="description">
                    <?php _e( 'You may select multiple categories by holding down the CTRL key.', 'interface' ); ?>
                    </span></td>
                </tr>
              </tbody>
            </table>
            <p class="submit">
              <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" />
            </p>
          </div>
          <!-- .option-content --> 
        </div>
        <!-- .option-container --> 
        <div class="option-container">
        <h3 class="option-toggle"><a href="#"><?php _e( 'Excerpt Options', 'interface' ); ?></a></h3>
        <div class="option-content inside">
            <table class="form-table">							                        
                <tr>
                    <th scope="row"><?php _e( 'Excerpt Length', 'interface' ); ?></th>
                    <td><input type="text" name="interface_theme_options[excerpt_length]" value="<?php echo intval( $options[ 'excerpt_length' ] ); ?>" size="2" /> <?php _e( 'word(s). Default value for excerpt length is 40 words.', 'interface' ); ?></td> 
                </tr>
                <tr>
                    <th scope="row"><label for="post_excerpt_more_text"><?php _e( 'Post Excerpt More Text', 'interface' ); ?></label></th>
                    <td><input type="text" id="post_excerpt_more_text" size="45" name="interface_theme_options[post_excerpt_more_text]" value="<?php echo esc_attr( $options[ 'post_excerpt_more_text' ] ); ?>" />
                    </td>
                </tr>						
            </table>
            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" /></p> 
        </div><!-- .option-content -->
        </div><!-- .option-container -->
        
        <div class="option-container">
        <h3 class="option-toggle"><a href="#"><?php _e( 'Edit Footer Options', 'interface' ); ?></a></h3>
        <div class="option-content inside">
            <table class="form-table">  
                <tbody>
                    <tr>
                        <th scope="row"><label for="interface_theme_options[footer_code]"><?php _e( 'Footer Editor', 'interface' ); ?></label></th>
                        <td>
                            <?php
                            wp_editor( 	esc_textarea( $options[ 'footer_code' ] ),				// Editor content.
                                            'interface_theme_options[footer_code]',					// Editor ID.
                                            array(
                                            'wpautop'					=> false,
                                            'tinymce' 					=> false,  							// Don't use TinyMCE in a meta box.
                                            'media_buttons'			=> false,  							// Don't show upload botton  
                                            'textarea_rows'			=> 5
                                            )
                                        );
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <span class="description"><?php _e( 'You can add custom <acronym title="Hypertext Markup Language">HTML</acronym> and/or shortcodes, which will be automatically inserted into your theme.<br />Some shorcodes: [the-year], [site-link], [wp-link], [th-link] for current year, your site link, wordpress site link and interface site link respectively.<br />It is completely optional, but if you like the Theme We would appreciate it if you keep the credit link at the bottom.', 'interface' ); ?></span>
                        </td>
                    </tr>
                    <!-- Reset all formatting -->
                    <?php if( "1" == $options[ 'reset_foooterinfo' ] ) { $options[ 'reset_foooterinfo' ] = "0"; } ?>
                    <tr>
                        <th scope="row"><label for="reset_editor"><?php _e( 'Reset', 'interface' ); ?></label></th>
                        <input type='hidden' value='0' name='interface_theme_options[reset_foooterinfo]'>
                        <td><input type="checkbox" id="reset_editor" name="interface_theme_options[reset_foooterinfo]" value="1" <?php checked( '1', $options['reset_foooterinfo'] ); ?> /> <?php _e('Check to reset', 'interface'); ?></td>
                    </tr>
                </tbody>
            </table>
            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" /></p>
        </div><!-- .option-content -->
        </div><!-- .option-container -->
        
      </div>
      <!-- #advancedoptions --> 
      <!-- Option for Featured Post Slier -->
      <div id="featuredpostslider"> 
        <!-- Option for More Slider Options -->
        <div class="option-container">
          <h3 class="option-toggle"><a href="#">
            <?php _e( 'Slider Options', 'interface' ); ?>
            </a></h3>
          <div class="option-content inside">
            <table class="form-table">
            <tr>
									<th scope="row"><label><?php _e( 'Select Slider Type', 'interface' ); ?></label></th>
									<td>
                                    										<label title="image-slider" class="box">
										<input type="radio" name="interface_theme_options[slider_type]" id="image-slider" <?php 
										checked($options['slider_type'], 'image-slider') ?> value="image-slider"  />
										<?php _e( 'Featured Post/ page Image Slider', 'interface' ); ?>
										</label>
                                    
										<label title="upload-image-slider" class="box">
										<input type="radio" name="interface_theme_options[slider_type]" id="upload-image-slider" <?php checked($options['slider_type'], 'upload-image-slider') ?> value="upload-image-slider"  />
										<?php _e( 'Image Slider', 'interface' ); ?>
										</label>

										<?php
                              if ( is_plugin_active( 'revslider/revslider.php' ) ) {
								  
                              	?>
											<label title="revolution-slider" class="box">
											<input type="radio" name="interface_theme_options[slider_type]" id="image-slider" <?php checked($options['slider_type'], 'revolution-slider') ?> value="revolution-slider"  />
											<?php _e( 'Revolution Slider', 'interface' ); ?>
											</label>	
											<?php
										}
										?>  								
									</td>
								</tr>
              <tr>
                <th scope="row"><?php _e( 'Disable Slider', 'interface' ); ?></th>
                <input type='hidden' value='0' name='interface_theme_options[disable_slider]'>
                <td><input type="checkbox" id="headerlogo" name="interface_theme_options[disable_slider]" value="1" <?php checked( '1', $options['disable_slider'] ); ?> />
                  <?php _e('Check to disable', 'interface'); ?></td>
              </tr>
              <?php
                              if ( is_plugin_active( 'revslider/revslider.php' ) ) {
								  
                              	?>
              <tr>
              <th colspan="2">                          
<strong><?php _e( 'Note:', 'interface' ); ?></strong>  <i><?php _e('The below mentioned options are only effective with the Featured Post/Page Slider and Featured Image Slider and not with the Revolution Slider', 'interface'); ?></i></th>
									</tr>
                               <?php } ?>
              <tr>
                          <th scope="row"><label><?php _e( 'Slider Status', 'interface' ); ?></label></th>
                          <td>
                              <label title="slider-on-homepage" class="box">
                              <input type="radio" name="interface_theme_options[slider_status]" id="slider-on-homepage" <?php checked($options['slider_status'], 'slider-on-homepage') ?> value="slider-on-homepage"  />
                              <?php _e( 'Enabale on Homepage/Frontpage', 'interface' ); ?>
                              </label>
                              <label title="slider-on-everypage" class="box">
                              <input type="radio" name="interface_theme_options[slider_status]" id="slider-on-everypage" <?php checked($options['slider_status'], 'slider-on-everypage') ?> value="slider-on-everypage"  />
                               <?php _e( 'Enable on All Page', 'interface' ); ?>
                              </label>									                                                            
                           </td>
                        </tr>                     
              <tr>
                <th scope="row"><label>
                    <?php _e( 'Slider Content', 'interface' ); ?>
                  </label></th>
                <td><label title="on" class="box">
                    <input type="radio" name="interface_theme_options[slider_content]" id="on" <?php checked($options['slider_content'], 'on') ?> value="on"  />
                    <?php _e( 'ON <span class="description">(Slider Content will be displayed)</span>', 'interface' ); ?>
                  </label>
                  <label title="off" class="box">
                    <input type="radio" name="interface_theme_options[slider_content]" id="off" <?php checked($options['slider_content'], 'off') ?> value="off"  />
                    <?php _e( 'OFF   <span class="description">(Slider Content will not be displayed)</span>', 'interface' ); ?>
                  </label></td>
              </tr>
              <tr>
									<th scope="row"><label><?php _e( 'Featured Text Position', 'interface' ); ?></label></th>
									<td>
										<label class="box">
										<input type="radio" name="interface_theme_options[featured_text_position]" <?php checked($options['featured_text_position'], 'default-position') ?> value="default-position"  />
										<?php _e( 'Left Side', 'interface' ); ?>
										</label>
										<label class="box">
										<input type="radio" name="interface_theme_options[featured_text_position]" <?php checked($options['featured_text_position'], 'right-position') ?> value="right-position"  />
										<?php _e( 'Right Side', 'interface' ); ?>
										</label>
											  								
									</td>
								</tr>
              <tr>
                <th scope="row"><?php _e( 'Number of Slides', 'interface' ); ?></th>
                <td><input type="text" name="interface_theme_options[slider_quantity]" value="<?php echo intval( $options[ 'slider_quantity' ] ); ?>" size="2" /></td>
              </tr>
              <tr>
                <th> <label for="interface_cycle_style">
                    <?php _e( 'Transition Effect:', 'interface' ); ?>
                  </label>
                </th>
                <td><select id="interface_cycle_style" name="interface_theme_options[transition_effect]">
                    <?php 
												$transition_effects = array();
												$transition_effects = array( 	'fade',
																						'wipe',
																						'scrollUp',
																						'scrollDown',
																						'scrollLeft',
																						'scrollRight',
																						'blindX',
																						'blindY',
																						'blindZ',
																						'cover',
																						'shuffle'
																			);
										foreach( $transition_effects as $effect ) {
											?>
                    <option value="<?php echo $effect; ?>" <?php selected( $effect, $options['transition_effect']); ?>><?php printf( __( '%s', 'interface' ), $effect ); ?></option>
                    <?php 
										}
											?>
                  </select></td>
              </tr>
              <tr>
                <th scope="row"><?php _e( 'Transition Delay', 'interface' ); ?></th>
                <td><input type="text" name="interface_theme_options[transition_delay]" value="<?php echo $options[ 'transition_delay' ]; ?>" size="2" />
                  <span class="description">
                  <?php _e( 'second(s)', 'interface' ); ?>
                  </span></td>
              </tr>
              <tr>
                <th scope="row"><?php _e( 'Transition Length', 'interface' ); ?></th>
                <td><input type="text" name="interface_theme_options[transition_duration]" value="<?php echo $options[ 'transition_duration' ]; ?>" size="2" />
                  <span class="description">
                  <?php _e( 'second(s)', 'interface' ); ?>
                  </span></td>
              </tr>
            </table>
            <p class="submit">
              <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" />
            </p>
          </div>
          <!-- .option-content --> 
        </div>
        <!-- .option-container -->
        
        <div class="option-container">
          <h3 class="option-toggle"><a href="#">
            <?php _e( 'Featured Post/Page Slider Options', 'interface' ); ?>
            </a></h3>
          <div class="option-content inside">
            <table class="form-table">
              <tr>
                <th scope="row"><?php _e( 'Exclude Slider post from Homepage posts?', 'interface' ); ?></th>
                <input type='hidden' value='0' name='interface_theme_options[exclude_slider_post]'>
                <td><input type="checkbox" id="headerlogo" name="interface_theme_options[exclude_slider_post]" value="1" <?php checked( '1', $options['exclude_slider_post'] ); ?> />
                  <?php _e('Check to exclude', 'interface'); ?></td>
              </tr>
              <tbody class="sortable">
                <?php for ( $i = 1; $i <= $options[ 'slider_quantity' ]; $i++ ): ?>
                <tr>
                  <th scope="row"><label class="handle">
                      <?php _e( 'Featured Slider Post/Page #', 'interface' ); ?>
                      <span class="count"><?php echo absint( $i ); ?></span></label></th>
                  <td><input type="text" name="interface_theme_options[featured_post_slider][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'featured_post_slider', $options ) && array_key_exists( $i, $options[ 'featured_post_slider' ] ) ) echo absint( $options[ 'featured_post_slider' ][ $i ] ); ?>" />
                    <a href="<?php bloginfo ( 'url' );?>/wp-admin/post.php?post=<?php if( array_key_exists ( 'featured_post_slider', $options ) && array_key_exists ( $i, $options[ 'featured_post_slider' ] ) ) echo absint( $options[ 'featured_post_slider' ][ $i ] ); ?>&action=edit" class="button" title="<?php esc_attr_e('Click Here To Edit'); ?>" target="_blank">
                    <?php _e( 'Click Here To Edit', 'interface' ); ?>
                    </a></td>
                </tr>
                <?php endfor; ?>
              </tbody>
            </table>
            <p>
              <?php _e( '<strong>Following are the steps on how to use the featured slider.</strong><br />* Create Post, Add featured image to the Post.<br />* Add all the Post ID that you want to use in the featured slider. <br /> &nbsp;(You can now see the Posts\' respective ID in the All Posts\' table in last column.)<br />* Featured Slider will show featured images, Title and excerpt of the respected added post\'s IDs.', 'interface' ); ?>
            </p>
            <p>
              <?php _e( '<strong>Note:</strong> You can now add Pages ID too. (You can now see the Pages\' respective ID in the All Pages\' table in last column.) .', 'interface' ); ?>
            </p>
            <p class="submit">
              <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" />
            </p>
          </div>
          <!-- .option-content --> 
        </div>
        <!-- .option-container --> 
        <div class="option-container">
						<h3 class="option-toggle"><a href="#"><?php _e( 'Featured Image Slider Options', 'interface' ); ?></a></h3>
						<div class="option-content inside">
							<table class="form-table">
								<tbody>
									<?php for ( $i = 1; $i <= $options[ 'slider_quantity' ]; $i++ ): ?>
									<tr>
										<th><h3><?php _e( 'Featured Image Slider #', 'interface' ); echo $i; ?></h3></th>
									</tr>
									<tr>
										<th scope="row"><label for="image_slider_image_<?php echo $i; ?>"><?php _e( 'Image', 'interface' ); ?></label><br /><small><?php _e( 'Recommended Size', 'interface' ); ?><br/><?php _e( 'For Narrow Layout: 1038px(w)*500px(h)', 'interface' ); ?><br /><?php _e( 'For Wide Layout: 1440px(w)*500px(h)', 'interface' ); ?></small></th>
										<td>
											<input size="90" type="text" class="upload" id="image_slider_image_<?php echo $i; ?>" name="interface_theme_options[featured_image_slider_image][<?php echo $i; ?>]" value="<?php if( array_key_exists( 'featured_image_slider_image', $options ) && array_key_exists( $i, $options[ 'featured_image_slider_image' ] ) ) echo esc_url( $options[ 'featured_image_slider_image' ][ $i ] ); ?>" />
							            <input class="upload-button button" name="upload_button" type="button" value="<?php esc_attr_e( 'Upload Image', 'interface' ); ?>" />
										</td>
									</tr>			
									<tr>
										<th scope="row"><label for="image_slider_link_<?php echo $i; ?>"><?php _e( 'Redirect Link', 'interface' ); ?></label></th>
										<td><input size="90" id="image_slider_link_<?php echo $i; ?>" type="text" name="interface_theme_options[featured_image_slider_link][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'featured_image_slider_link', $options ) && array_key_exists( $i, $options[ 'featured_image_slider_link' ] ) ) echo esc_url( $options[ 'featured_image_slider_link' ][ $i ] ); ?>" />
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="image_slider_title_<?php echo $i; ?>"><?php _e( 'Title', 'interface' ); ?></label></th>
										<td><input size="90" id="image_slider_title_<?php echo $i; ?>" type="text" name="interface_theme_options[featured_image_slider_title][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'featured_image_slider_title', $options ) && array_key_exists( $i, $options[ 'featured_image_slider_title' ] ) ) echo esc_attr( $options[ 'featured_image_slider_title' ][ $i ] ); ?>" />
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="image_slider_description_<?php echo $i; ?>"><?php _e( 'Short Description', 'interface' ); ?></label></th>
										<td><textarea id="image_slider_description_<?php echo $i; ?>" name="interface_theme_options[featured_image_slider_description][<?php echo absint( $i ); ?>]" cols="100" rows="3"><?php if( array_key_exists( 'featured_image_slider_description', $options ) && array_key_exists( $i, $options[ 'featured_image_slider_description' ] ) ) echo esc_textarea( $options[ 'featured_image_slider_description' ][ $i ] ); ?></textarea>
										</td>
									</tr>
									<?php endfor; ?>
								</tbody>
							</table>
						<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" /></p> 
					
                  <p class="submit"><input type="submit" name="interface_theme_options[reset_image_slider]" class="button-primary reset" value="Reset Defaults" /></p>
	</div><!-- .option-content -->
					</div><!-- .option-container -->
		<?php
	if ( is_plugin_active( 'revslider/revslider.php' ) ) {
	?>
        <div class="option-container">
            <h3 class="option-toggle"><a href="#"><?php _e( 'Revolution Slider Options', 'interface' ); ?></a></h3>
            <div class="option-content inside">
                <table class="form-table">
                    <tbody>
                        <?php
                        $slider = new RevSlider();
                        $arrSliders = $slider->getAllSliderAliases();
                                
                        if(empty($arrSliders))
                            echo '<tr><th scope="row"></th><td>'.__( 'No sliders found, Please create a slider. You can create it', 'interface' ).'  '.'<a href="'.esc_url( home_url() ).'/wp-admin/themes.php?page=revslider">'.__( 'here', 'interface' ).'</a>'.'</td></tr>';
                        else{
                            ?>
                            <tr>
                                <th scope="row"><label for="header_slider"><?php _e( 'Choose Slider', 'interface' ); ?></label></th>
                                <td>
                                    <select class="selected" name="interface_theme_options[header_slider]" id="header_slider">
                                     <?php 
                                     foreach ( $arrSliders as $slider ) { ?>
                                           <option value="<?php echo esc_attr( $slider ); ?>" <?php selected( $options[ 'header_slider' ], $slider ); ?>><?php printf( esc_attr( '%s', 'interface' ), $slider ); ?></option>
                                     <?php } ?>
                                  </select>
                               </td>
                            </tr>
                            <tr>                            
                                <th scope="row"><?php _e( 'Display on Home Page', 'interface' ); ?></th>
                                <input type='hidden' value='0' name='interface_theme_options[revslider_homepage]'>
                                <td>
                                    <input type="checkbox" id="headerlogo" name="interface_theme_options[revslider_homepage]" value="1" <?php checked( '1', $options['revslider_homepage'] ); ?> /> <?php _e('Check to display on homepage', 'interface'); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="pages_id_revslider"><?php _e( 'Enter Pages ID', 'interface' ); ?></label></th>
                                <td><input type="text" id="pages_id_revslider" size="45" name="interface_theme_options[pages_id_revslider]" value="<?php echo esc_attr( $options[ 'pages_id_revslider' ] ); ?>" /> <?php _e( 'Example: 2,10 Enter the ID of pages in which you want to display this slider on header.', 'interface'); ?>
                                </td>
                            </tr>
                              <?php
                        }
                        ?>
                    </tbody>
                </table>
            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" /></p> 
            </div><!-- .option-content -->
        </div><!-- .option-container -->
		<?php
	}
?>
        
      </div>
      <!-- #featuredpostslider --> 
      <!-- Option for Design Settings -->
      <div id="sociallink">
        <div class="option-container">
          <h3 class="option-toggle"><a href="#">
            <?php _e( 'Contact Info Bar', 'interface' ); ?>
            </a></h3>
          <div class="option-content inside">
            <table class="form-table">
              <tr>
                <th scope="row" style="padding: 0px;"><h4>
                    <?php _e( 'Disable Top Info Bar', 'interface' ); ?>
                  </h4></th>
                <input type='hidden' value='0' name='interface_theme_options[disable_top]'>
                <td><input type="checkbox" id="disable_top" name="interface_theme_options[disable_top]" value="1" <?php checked( '1', $options['disable_top'] ); ?> />
                  <?php _e('Check to disable', 'interface'); ?></td>
              </tr>
              <tr>
                <th scope="row" style="padding: 0px;"><h4>
                    <?php _e( 'Disable Bottom Info Bar', 'interface' ); ?>
                  </h4></th>
                <input type='hidden' value='0' name='interface_theme_options[disable_bottom]'>
                <td><input type="checkbox" id="disable_bottom" name="interface_theme_options[disable_bottom]" value="1" <?php checked( '1', $options['disable_bottom'] ); ?> />
                  <?php _e('Check to disable', 'interface'); ?></td>
              </tr>
              <tr>
                <th scope="row" style="padding: 0px;"><h4>
                    <?php _e( 'Phone Number', 'interface' ); ?>
                  </h4></th>
                <td><input type="text" size="45" name="interface_theme_options[social_phone]" value="<?php echo  preg_replace("/[^() 0-9+-]/", '', $options[ 'social_phone' ]) ; ?>" />
                  <?php _e('Enter your Phone number only', 'interface'); ?></td>
              </tr>
              <tr>
                <th scope="row" style="padding: 0px;"><h4>
                    <?php _e( 'Email ID Only', 'interface' ); ?>
                  </h4></th>
                <td><input type="text" size="45" name="interface_theme_options[social_email]" value="<?php echo  is_email($options[ 'social_email'] ); ?>" />
                  <?php _e('Enter your Email ID', 'interface'); ?></td>
              </tr>
              <tr>
                <th scope="row" style="padding: 0px;"><h4>
                    <?php _e( 'Location Only', 'interface' ); ?>
                  </h4></th>
                <td><input type="text" size="45" name="interface_theme_options[social_location]" value="<?php echo  esc_attr($options[ 'social_location']); ?>" />
                  <?php _e('Enter your Address', 'interface'); ?></td>
              </tr>
            </table>
            <p class="submit">
              <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" />
            </p>
          </div>
          <!-- .option-content --> 
        </div>
        <!-- .option-container -->
        
        <?php 
						$social_links = array(); 
						$social_links_name = array();
						$social_links_name = array( __( 'Facebook', 'interface' ),
													__( 'Twitter', 'interface' ),
													__( 'Google Plus', 'interface' ),
													__( 'Pinterest', 'interface' ),
													__( 'Youtube', 'interface' ),
													__( 'Vimeo', 'interface' ),
													__( 'LinkedIn', 'interface' ),
													__( 'Flickr', 'interface' ),
													__( 'Tumblr', 'interface' ),
													__( 'RSS', 'interface' ),
													__( 'Dribbble', 'interface' ),
													__( 'WordPress', 'interface' ),
													__( 'Github', 'interface' ),
													__( 'Instagram', 'interface' ),
													__( 'Codepen', 'interface' ),
													__( 'Polldaddy', 'interface' ),
													__( 'Path', 'interface' ),
													__( 'Skype', 'interface' ),
													__( 'Digg', 'interface' ),
													__( 'Reddit', 'interface' ),
													__( 'Stumbleupon', 'interface' ),
													__( 'Pocket', 'interface' ),
													__( 'Dropbox', 'interface' )
													);
						$social_links = array( 	'Facebook' 		=> 'social_facebook',
														'Twitter' 		=> 'social_twitter',
														'Google-Plus'	=> 'social_googleplus',
														'Pinterest' 	=> 'social_pinterest',
														'You-tube'		=> 'social_youtube',
														'Vimeo'			=> 'social_vimeo',
														'linkedin'			=> 'social_linkedin',
														'Flickr'			=> 'social_flickr',
														'Tumblr'			=> 'social_tumblr',
														'RSS'				=> 'social_rss',
														'Dribbble'			=> 'social_dribbble',
														'WordPress'			=> 'social_wordpress',
														'Github'			=> 'social_github',
														'Instagram'			=> 'social_instagram',
														'Codepen'			=> 'social_codepen',
														'Polldaddy'			=> 'social_polldaddy',
														'Path'			=> 'social_path',
														'Skype'			=> 'social_skype',
														'Digg'			=> 'social_digg',
														'Reddit'			=> 'social_reddit',
														'Stumbleupon'			=> 'social_stumbleupon',
														'Pocket'			=> 'social_pocket',
														'Dropbox'			=> 'social_dropbox' 
													);
					?>
        <div class="option-container">
          <h3 class="option-toggle"><a href="#">
            <?php _e( 'Social Links', 'interface' ); ?>
            </a></h3>
          <div class="option-content inside">
            <table class="form-table">
              <tbody>
                <?php
						$i = 0;
						foreach( $social_links as $key => $value ) {
						?>
                <tr>
                  <th scope="row" style="padding: 0px;"><h4><?php printf( __( '%s', 'interface' ), $social_links_name[ $i ] ); ?></h4></th>
                  <td><input type="text" size="45" name="interface_theme_options[<?php echo $value; ?>]" value="<?php echo esc_url( $options[$value] ); ?>" /></td>
                </tr>
                <?php
						$i++;
						}
						?>
              </tbody>
            </table>
            <p class="submit">
              <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" />
            </p>
          </div>
        </div>
      </div>
      <!-- #sociallink --> 
    </div>
    <!-- #interface_tabs -->
  </form>
</div>
<!-- .wrap -->
<?php
}

/****************************************************************************************/

/**
 * Validate all theme options values
 * 
 * @uses esc_url_raw, absint, esc_textarea, sanitize_text_field, interface_invalidate_caches
 */
function interface_theme_options_validate( $options ) { //validate individual options before saving. using register_setting 3rd parameter interface_theme_options_validate
	global $interface_theme_default, $interface_default;
	$validated_input_values = $interface_theme_default;
	$input = array();
	$input = $options;

	//font family validation
	if( isset( $input['reset_font_family'] ) && $input['reset_font_family'] == 'Reset Defaults' ) {
			$validated_input_values['interface_general_typography'] = $interface_default['interface_general_typography'];
			$validated_input_values['interface_navigation'] = $interface_default['interface_navigation'];
			$validated_input_values['interface_title'] = $interface_default['interface_title'];
	}
	else {
		 if ( isset( $input['interface_general_typography'] ) ) {
		 	$validated_input_values['interface_general_typography'] = stripslashes($input['interface_general_typography']);
		 }
		if ( isset( $input['interface_navigation'] ) ) {
		 	$validated_input_values['interface_navigation'] = stripslashes($input['interface_navigation']);
		 }
		 if ( isset( $input['interface_title'] ) ) {
		 	$validated_input_values['interface_title'] = stripslashes($input['interface_title']);
		 }
	}

	//font size validation
	if( isset( $input['reset_font_family'] ) && $input['reset_font_family'] == 'Reset Defaults' ) {
			$validated_input_values['content'] = $interface_default['content'];
			$validated_input_values['buttons'] = $interface_default['buttons'];
			$validated_input_values['site_title'] = $interface_default['site_title'];
			$validated_input_values['navigation'] = $interface_default['navigation'];
			$validated_input_values['navigation_child'] = $interface_default['navigation_child'];
			$validated_input_values['primary_slogan'] = $interface_default['primary_slogan'];
			$validated_input_values['secondary_slogan'] = $interface_default['secondary_slogan'];
			$validated_input_values['featured_title'] = $interface_default['featured_title'];
			$validated_input_values['business_layout_widget_title'] = $interface_default['business_layout_widget_title'];
			$validated_input_values['business_layout_service_promot_featured_recentwork'] = $interface_default['business_layout_service_promot_featured_recentwork'];
			$validated_input_values['post_title'] = $interface_default['post_title'];
			$validated_input_values['sidebar_colophon_widget_title'] = $interface_default['sidebar_colophon_widget_title'];
	}else{
		if( isset( $input['content'] ) ) {
			$validated_input_values['content'] = absint($input['content']);
		}
		if( isset( $input['buttons'] ) ) {
			$validated_input_values['buttons'] = absint($input['buttons']);
		}
		if( isset( $input['site_title'] ) ) {
			$validated_input_values['site_title'] = absint($input['site_title']);
		}
		if( isset( $input['navigation'] ) ) {
			$validated_input_values['navigation'] = absint($input['navigation']);
		}
		if( isset( $input['navigation_child'] ) ) {
			$validated_input_values['navigation_child'] = absint($input['navigation_child']);
		}
		if( isset( $input['primary_slogan'] ) ) {
			$validated_input_values['primary_slogan'] = absint($input['primary_slogan']);
		}
		if( isset( $input['secondary_slogan'] ) ) {
			$validated_input_values['secondary_slogan'] = absint($input['secondary_slogan']);
		}
		if( isset( $input['featured_title'] ) ) {
			$validated_input_values['featured_title'] = absint($input['featured_title']);
		}
		if( isset( $input['business_layout_widget_title'] ) ) {
			$validated_input_values['business_layout_widget_title'] = absint($input['business_layout_widget_title']);
		}
		if( isset( $input['business_layout_service_promot_featured_recentwork'] ) ) {
			$validated_input_values['business_layout_service_promot_featured_recentwork'] = absint($input['business_layout_service_promot_featured_recentwork']);
		}
		if( isset( $input['post_title'] ) ) {
			$validated_input_values['post_title'] = absint($input['post_title']);
		}
		if( isset( $input['sidebar_colophon_widget_title'] ) ) {
			$validated_input_values['sidebar_colophon_widget_title'] = absint($input['sidebar_colophon_widget_title']);
		}
	}

	//Font Colors Validation
	if( isset( $input['reset_colors'] ) && $input['reset_colors'] == 'Reset Defaults' ) {
			$validated_input_values['content_font_color'] = $interface_default['content_font_color'];
			$validated_input_values['top_info_bar_font_color'] = $interface_default['top_info_bar_font_color'];
			$validated_input_values['site_title_font_color'] = $interface_default['site_title_font_color'];
			$validated_input_values['navigation_font_color'] = $interface_default['navigation_font_color'];		
			$validated_input_values['solgan_featured_page_breadcrumbs_title_font_color'] = $interface_default['solgan_featured_page_breadcrumbs_title_font_color'];		
			$validated_input_values['all_heading_titles_font_color'] = $interface_default['all_heading_titles_font_color'];
			$validated_input_values['sidebar_widget_title_font_color'] = $interface_default['sidebar_widget_title_font_color'];
			$validated_input_values['sidebar_content_font_color'] = $interface_default['sidebar_content_font_color'];
			$validated_input_values['footer_widget_title_font_color'] = $interface_default['footer_widget_title_font_color'];
			$validated_input_values['footer_content_font_color'] = $interface_default['footer_content_font_color'];		
			$validated_input_values['bottom_info_bar_font_color'] = $interface_default['bottom_info_bar_font_color'];		
			$validated_input_values['site_generator_font_color'] = $interface_default['site_generator_font_color'];
		
	}else{
		if ( isset( $input['content_font_color'] ) ) {
			$validated_input_values['content_font_color'] = stripslashes($input['content_font_color']);
		}
		if ( isset( $input['top_info_bar_font_color'] ) ) {
			$validated_input_values['top_info_bar_font_color'] = stripslashes($input['top_info_bar_font_color']);
		}
		if ( isset( $input['site_title_font_color'] ) ) {
			$validated_input_values['site_title_font_color'] = stripslashes($input['site_title_font_color']);
		}
		if ( isset( $input['navigation_font_color'] ) ) {
			$validated_input_values['navigation_font_color'] = stripslashes($input['navigation_font_color']);
		}
		if ( isset( $input['solgan_featured_page_breadcrumbs_title_font_color'] ) ) {
			$validated_input_values['solgan_featured_page_breadcrumbs_title_font_color'] = stripslashes($input['solgan_featured_page_breadcrumbs_title_font_color']);
		}
		if ( isset( $input['all_heading_titles_font_color'] ) ) {
			$validated_input_values['all_heading_titles_font_color'] = stripslashes($input['all_heading_titles_font_color']);
		}
		if ( isset( $input['sidebar_widget_title_font_color'] ) ) {
			$validated_input_values['sidebar_widget_title_font_color'] = stripslashes($input['sidebar_widget_title_font_color']);
		}
		if ( isset( $input['sidebar_content_font_color'] ) ) {
			$validated_input_values['sidebar_content_font_color'] = stripslashes($input['sidebar_content_font_color']);
		}
		if ( isset( $input['footer_widget_title_font_color'] ) ) {
			$validated_input_values['footer_widget_title_font_color'] = stripslashes($input['footer_widget_title_font_color']);
		}
		if ( isset( $input['footer_content_font_color'] ) ) {
			$validated_input_values['footer_content_font_color'] = stripslashes($input['footer_content_font_color']);
		}
		if ( isset( $input['bottom_info_bar_font_color'] ) ) {
			$validated_input_values['bottom_info_bar_font_color'] = stripslashes($input['bottom_info_bar_font_color']);
		}
		if ( isset( $input['site_generator_font_color'] ) ) {
			$validated_input_values['site_generator_font_color'] = stripslashes($input['site_generator_font_color']);
		}
	}

	//Color skin validation
	if( isset( $input['reset_colors'] ) && $input['reset_colors'] == 'Reset Defaults' ) {
			$validated_input_values['color_scheme'] = $interface_default['color_scheme'];
			$validated_input_values['interface_slogan_slider_title_color'] = $interface_default['interface_slogan_slider_title_color'];
			$validated_input_values['interface_buttons_color'] = $interface_default['interface_buttons_color'];
			$validated_input_values['interface_link_color'] = $interface_default['interface_link_color'];	
	}else{
		if ( isset( $input['color_scheme'] ) ) {
			$validated_input_values['color_scheme'] = stripslashes($input['color_scheme']);
		}
		if ( isset( $input['interface_slogan_slider_title_color'] ) ) {
			$validated_input_values['interface_slogan_slider_title_color'] = stripslashes($input['interface_slogan_slider_title_color']);
		}
		if ( isset( $input['interface_buttons_color'] ) ) {
			$validated_input_values['interface_buttons_color'] = stripslashes($input['interface_buttons_color']);
		}
		if ( isset( $input['interface_link_color'] ) ) {
			$validated_input_values['interface_link_color'] = stripslashes($input['interface_link_color']);
		}
	}

	//Colors Validation
	if( isset( $input['reset_colors'] ) && $input['reset_colors'] == 'Reset Defaults' ) {
			$validated_input_values['interface_top_info_bar_color'] = $interface_default['interface_top_info_bar_color'];
			$validated_input_values['interface_header_color'] = $interface_default['interface_header_color'];
			$validated_input_values['interface_main_content_color'] = $interface_default['interface_main_content_color'];
			$validated_input_values['interface_promotional_clients_blockquote_sticky_color'] = $interface_default['interface_promotional_clients_blockquote_sticky_color'];
			$validated_input_values['interface_form_input_textarea_paginations_color'] = $interface_default['interface_form_input_textarea_paginations_color'];
			$validated_input_values['footer_widget_section_color'] = $interface_default['footer_widget_section_color'];
			$validated_input_values['bottom_info_bar_color'] = $interface_default['bottom_info_bar_color'];
			$validated_input_values['site_generator_color'] = $interface_default['site_generator_color'];		
			
		
	}else{
		if ( isset( $input['interface_top_info_bar_color'] ) ) {
			$validated_input_values['interface_top_info_bar_color'] = stripslashes($input['interface_top_info_bar_color']);
		}
		if ( isset( $input['interface_header_color'] ) ) {
			$validated_input_values['interface_header_color'] = stripslashes($input['interface_header_color']);
		}
		if ( isset( $input['interface_main_content_color'] ) ) {
			$validated_input_values['interface_main_content_color'] = stripslashes($input['interface_main_content_color']);
		}
		if ( isset( $input['interface_promotional_clients_blockquote_sticky_color'] ) ) {
			$validated_input_values['interface_promotional_clients_blockquote_sticky_color'] = stripslashes($input['interface_promotional_clients_blockquote_sticky_color']);
		}
		if ( isset( $input['interface_form_input_textarea_paginations_color'] ) ) {
			$validated_input_values['interface_form_input_textarea_paginations_color'] = stripslashes($input['interface_form_input_textarea_paginations_color']);
		}
		if ( isset( $input['footer_widget_section_color'] ) ) {
			$validated_input_values['footer_widget_section_color'] = stripslashes($input['footer_widget_section_color']);
		}
		if ( isset( $input['bottom_info_bar_color'] ) ) {
			$validated_input_values['bottom_info_bar_color'] = stripslashes($input['bottom_info_bar_color']);
		}
		if ( isset( $input['site_generator_color'] ) ) {
			$validated_input_values['site_generator_color'] = stripslashes($input['site_generator_color']);
		}
	}

	//Background pattern validation
	if( isset( $input['reset_background'] ) && $input['reset_background'] == 'Reset Defaults' ) {
			$validated_input_values['content_background_pattern'] = $interface_default['content_background_pattern'];
			$validated_input_values['footer_widget_background_pattern'] = $interface_default['footer_widget_background_pattern'];
	}else{
		//Content Background pattern validation
		if ( isset( $input['content_background_pattern'] ) ) {
				$validated_input_values['content_background_pattern'] = stripslashes($input['content_background_pattern']);
		}
		//Footer Background pattern validation
		if ( isset( $input['footer_widget_background_pattern'] ) ) {
				$validated_input_values['footer_widget_background_pattern'] = stripslashes($input['footer_widget_background_pattern']);
		}
		//Sitegenerator Background pattern validation

	}
	if ( isset( $input[ 'header_logo' ] ) ) {
		$validated_input_values[ 'header_logo' ] = esc_url_raw( $input[ 'header_logo' ] );
	}
										//esc_url_raw -> To save at the databaseSSSS
										// esc_url -> to echo the url
										//sanitize_text_field -> for normal text only if you dont want html text.
	if( isset( $input[ 'header_show' ] ) ) {
		$validated_input_values[ 'header_show' ] = $input[ 'header_show' ];
	}

   if ( isset( $options[ 'hide_header_searchform' ] ) ) {
		$validated_input_values[ 'hide_header_searchform' ] = $input[ 'hide_header_searchform' ];
	}
    
	if ( isset( $options[ 'disable_slogan' ] ) ) {
		$validated_input_values[ 'disable_slogan' ] = $input[ 'disable_slogan' ];
	}

	if( isset( $options[ 'home_slogan1' ] ) ) {
		$validated_input_values[ 'home_slogan1' ] = sanitize_text_field( $input[ 'home_slogan1' ] );
	}

	if( isset( $options[ 'home_slogan2' ] ) ) {
		$validated_input_values[ 'home_slogan2' ] = sanitize_text_field( $input[ 'home_slogan2' ] );
	}

	if( isset( $input[ 'slogan_position' ] ) ) {
		$validated_input_values[ 'slogan_position' ] = $input[ 'slogan_position' ];
	}	

	if( isset( $options[ 'button_text' ] ) ) {
		$validated_input_values[ 'button_text' ] = sanitize_text_field( $input[ 'button_text' ] );
	}

	if( isset( $options[ 'redirect_button_link' ] ) ) {
		$validated_input_values[ 'redirect_button_link' ] = esc_url_raw( $input[ 'redirect_button_link' ] );
	}
        
	if ( isset( $input[ 'favicon' ] ) ) {
		$validated_input_values[ 'favicon' ] = esc_url_raw( $input[ 'favicon' ] );
	}

	if ( isset( $input['disable_favicon'] ) ) {
		$validated_input_values[ 'disable_favicon' ] = $input[ 'disable_favicon' ];
	}

	if ( isset( $input[ 'webpageicon' ] ) ) {
		$validated_input_values[ 'webpageicon' ] = esc_url_raw( $input[ 'webpageicon' ] );
	}

	if ( isset( $input['disable_webpageicon'] ) ) {
		$validated_input_values[ 'disable_webpageicon' ] = $input[ 'disable_webpageicon' ];
	}

	//Site Layout
	if( isset( $input[ 'site_layout' ] ) ) {
		$validated_input_values[ 'site_layout' ] = $input[ 'site_layout' ];
	}

   // Front page posts categories
	if( isset( $input['front_page_category' ] ) ) {
		$validated_input_values['front_page_category'] = $input['front_page_category'];
	}
    
	// Data Validation for Featured Slider
	if( isset( $input[ 'disable_slider' ] ) ) {
		$validated_input_values[ 'disable_slider' ] = $input[ 'disable_slider' ];
	}
	
	if( isset( $input[ 'featured_text_position' ] ) ) {
		$validated_input_values[ 'featured_text_position' ] = $input[ 'featured_text_position' ];
	}
	if ( isset( $input[ 'slider_quantity' ] ) ) {
		$validated_input_values[ 'slider_quantity' ] = absint( $input[ 'slider_quantity' ] ) ? $input [ 'slider_quantity' ] : 4;
	}
	
	if( isset( $input['reset_image_slider'] ) && $input['reset_image_slider'] == 'Reset Defaults' ) {
			$validated_input_values['featured_post_slider'] = $interface_default['featured_post_slider'];
			$validated_input_values['featured_image_slider_image'] = $interface_default['featured_image_slider_image'];
			$validated_input_values['featured_image_slider_link'] = $interface_default['featured_image_slider_link'];
			$validated_input_values['featured_image_slider_title'] = $interface_default['featured_image_slider_title'];
			$validated_input_values['featured_image_slider_description'] = $interface_default['featured_image_slider_description'];
	
		}else{
	if( isset( $input[ 'slider_quantity' ] ) )   
			for ( $i = 1; $i <= $input [ 'slider_quantity' ]; $i++ ) {
				if ( !empty( $input[ 'featured_post_slider' ][ $i ] ) ) {
					$validated_input_values[ 'featured_post_slider' ][ $i ] = absint($input[ 'featured_post_slider' ][ $i ] );
				}
				if ( !empty( $input[ 'featured_image_slider_image' ][ $i ] ) ) {
					$validated_input_values[ 'featured_image_slider_image' ][ $i ] = esc_url_raw($input[ 'featured_image_slider_image' ][ $i ] );
				}
				if ( !empty( $input[ 'featured_image_slider_link' ][ $i ] ) ) {
					$validated_input_values[ 'featured_image_slider_link' ][ $i ] = esc_url_raw($input[ 'featured_image_slider_link' ][ $i ]);
				}
				if ( !empty( $input[ 'featured_image_slider_title' ][ $i ] ) ) {
					$validated_input_values[ 'featured_image_slider_title' ][ $i ] = sanitize_text_field($input[ 'featured_image_slider_title' ][ $i ]);
				}
				if ( !empty( $input[ 'featured_image_slider_description' ][ $i ] ) ) {
					$validated_input_values[ 'featured_image_slider_description' ][ $i ] = wp_kses_stripslashes($input[ 'featured_image_slider_description' ][ $i ]);
				}
			}
		}
	if ( isset( $input['exclude_slider_post'] ) ) {
		$validated_input_values[ 'exclude_slider_post' ] = $input[ 'exclude_slider_post' ];	

	}
	if ( isset( $input[ 'featured_post_slider' ] ) ) {
		$validated_input_values[ 'featured_post_slider' ] = array();
	}   
	if( isset( $input[ 'slider_quantity' ] ) )   
	for ( $i = 1; $i <= $input [ 'slider_quantity' ]; $i++ ) {
		if ( !empty( $input[ 'featured_post_slider' ][ $i ] ) ) {
			$validated_input_values[ 'featured_post_slider' ][ $i ] = absint($input[ 'featured_post_slider' ][ $i ] );
		}
	} 
	if( isset( $input[ 'slider_status' ] ) ) {
		$validated_input_values[ 'slider_status' ] = $input[ 'slider_status' ];
	} 
	
	if( isset( $input[ 'slider_type' ] ) ) {
		$validated_input_values[ 'slider_type' ] = $input[ 'slider_type' ];
	}
		
	
	
	
   // data validation for transition effect
	if( isset( $input[ 'transition_effect' ] ) ) {
		$validated_input_values['transition_effect'] = wp_filter_nohtml_kses( $input['transition_effect'] );
	}
		if( isset( $input[ 'header_slider' ] ) ) {
		$validated_input_values[ 'header_slider' ] = $input[ 'header_slider' ];
	}

	if ( isset( $input[ 'revslider_homepage' ] ) ) {
		$validated_input_values[ 'revslider_homepage' ] = $input[ 'revslider_homepage' ];	
	}  

	if( isset( $options[ 'pages_id_revslider' ] ) ) {
		$validated_input_values[ 'pages_id_revslider' ] = sanitize_text_field( $input[ 'pages_id_revslider' ] );
	}

	// data validation for transition delay
	if ( isset( $input[ 'transition_delay' ] ) && is_numeric( $input[ 'transition_delay' ] ) ) {
		$validated_input_values[ 'transition_delay' ] = $input[ 'transition_delay' ];
	}

	// data validation for transition length
	if ( isset( $input[ 'transition_duration' ] ) && is_numeric( $input[ 'transition_duration' ] ) ) {
		$validated_input_values[ 'transition_duration' ] = $input[ 'transition_duration' ];
	}
    
   // data validation for Social Icons

   if ( isset( $input['disable_top'] ) ) {
		$validated_input_values[ 'disable_top' ] = $input[ 'disable_top' ];
	}
	 if ( isset( $input['disable_bottom'] ) ) {
		$validated_input_values[ 'disable_bottom' ] = $input[ 'disable_bottom' ];
	}
   if ( isset( $input[ 'social_phone' ] ) ) {
		$validated_input_values[ 'social_phone' ] = preg_replace("/[^() 0-9+-]/", '', $options[ 'social_phone' ]);
	}

	if( isset( $input[ 'social_email' ] ) ) {
		$validated_input_values[ 'social_email' ] = sanitize_email( $input[ 'social_email' ] );
	}
	if( isset( $input[ 'social_location' ] ) ) {
		$validated_input_values[ 'social_location' ] = sanitize_text_field( $input[ 'social_location' ] );
	}

	if( isset( $input[ 'social_facebook' ] ) ) {
		$validated_input_values[ 'social_facebook' ] = esc_url_raw( $input[ 'social_facebook' ] );
	}
	if( isset( $input[ 'social_twitter' ] ) ) {
		$validated_input_values[ 'social_twitter' ] = esc_url_raw( $input[ 'social_twitter' ] );
	}
	if( isset( $input[ 'social_googleplus' ] ) ) {
		$validated_input_values[ 'social_googleplus' ] = esc_url_raw( $input[ 'social_googleplus' ] );
	}
	if( isset( $input[ 'social_pinterest' ] ) ) {
		$validated_input_values[ 'social_pinterest' ] = esc_url_raw( $input[ 'social_pinterest' ] );
	}   
	if( isset( $input[ 'social_youtube' ] ) ) {
		$validated_input_values[ 'social_youtube' ] = esc_url_raw( $input[ 'social_youtube' ] );
	}
	if( isset( $input[ 'social_vimeo' ] ) ) {
		$validated_input_values[ 'social_vimeo' ] = esc_url_raw( $input[ 'social_vimeo' ] );
	}   
	if( isset( $input[ 'social_linkedin' ] ) ) {
		$validated_input_values[ 'social_linkedin' ] = esc_url_raw( $input[ 'social_linkedin' ] );
	}
	if( isset( $input[ 'social_flickr' ] ) ) {
		$validated_input_values[ 'social_flickr' ] = esc_url_raw( $input[ 'social_flickr' ] );
	}
	if( isset( $input[ 'social_tumblr' ] ) ) {
		$validated_input_values[ 'social_tumblr' ] = esc_url_raw( $input[ 'social_tumblr' ] );
	}   
	if( isset( $input[ 'social_myspace' ] ) ) {
		$validated_input_values[ 'social_myspace' ] = esc_url_raw( $input[ 'social_myspace' ] );
	}  
	if( isset( $input[ 'social_rss' ] ) ) {
		$validated_input_values[ 'social_rss' ] = esc_url_raw( $input[ 'social_rss' ] );
	} 
	if( isset( $input[ 'social_dribbble' ] ) ) {
		$validated_input_values[ 'social_dribbble' ] = esc_url_raw( $input[ 'social_dribbble' ] );
	} 
	if( isset( $input[ 'social_wordpress' ] ) ) {
		$validated_input_values[ 'social_wordpress' ] = esc_url_raw( $input[ 'social_wordpress' ] );
	} 
	if( isset( $input[ 'social_github' ] ) ) {
		$validated_input_values[ 'social_github' ] = esc_url_raw( $input[ 'social_github' ] );
	} 
	if( isset( $input[ 'social_instagram' ] ) ) {
		$validated_input_values[ 'social_instagram' ] = esc_url_raw( $input[ 'social_instagram' ] );
	} 
	if( isset( $input[ 'social_codepen' ] ) ) {
		$validated_input_values[ 'social_codepen' ] = esc_url_raw( $input[ 'social_codepen' ] );
	} 
	if( isset( $input[ 'social_polldaddy' ] ) ) {
		$validated_input_values[ 'social_polldaddy' ] = esc_url_raw( $input[ 'social_polldaddy' ] );
	} 
	if( isset( $input[ 'social_path' ] ) ) {
		$validated_input_values[ 'social_path' ] = esc_url_raw( $input[ 'social_path' ] );
	} 
	if( isset( $input[ 'social_skype' ] ) ) {
		$validated_input_values[ 'social_skype' ] = esc_url_raw( $input[ 'social_skype' ] );
	} 
	if( isset( $input[ 'social_digg' ] ) ) {
		$validated_input_values[ 'social_digg' ] = esc_url_raw( $input[ 'social_digg' ] );
	} 
	if( isset( $input[ 'social_reddit' ] ) ) {
		$validated_input_values[ 'social_reddit' ] = esc_url_raw( $input[ 'social_reddit' ] );
	} 
	if( isset( $input[ 'social_stumbleupon' ] ) ) {
		$validated_input_values[ 'social_stumbleupon' ] = esc_url_raw( $input[ 'social_stumbleupon' ] );
	} 
	if( isset( $input[ 'social_pocket' ] ) ) {
		$validated_input_values[ 'social_pocket' ] = esc_url_raw( $input[ 'social_pocket' ] );
	} 
	if( isset( $input[ 'social_dropbox' ] ) ) {
		$validated_input_values[ 'social_dropbox' ] = esc_url_raw( $input[ 'social_dropbox' ] );
	}   

	//Custom CSS Style Validation
	if ( isset( $input['custom_css'] ) ) {
		$validated_input_values['custom_css'] = wp_filter_nohtml_kses($input['custom_css']);
	}

	if( isset( $input[ 'site_design' ] ) ) {
		$validated_input_values[ 'site_design' ] = $input[ 'site_design' ];
	}   
	
	if( isset( $input[ 'slider_content' ] ) ) {
		$validated_input_values[ 'slider_content' ] = $input[ 'slider_content' ];
	} 
	
	if ( isset( $input[ 'excerpt_length' ] ) ) {
		$validated_input_values[ 'excerpt_length' ] = absint( $input[ 'excerpt_length' ] ) ? $input [ 'excerpt_length' ] : 30;
		
	}

	if( isset( $input[ 'post_excerpt_more_text' ] ) ) {
		$validated_input_values[ 'post_excerpt_more_text' ] = sanitize_text_field( $input[ 'post_excerpt_more_text' ] );
	}
	
	if( isset( $input[ 'reset_foooterinfo' ] ) ) {
		$validated_input_values[ 'reset_foooterinfo' ] = $input[ 'reset_foooterinfo' ];
	}

	if( 0 == $validated_input_values[ 'reset_foooterinfo' ] ) {
		if( isset( $input[ 'footer_code' ] ) ) {
			$validated_input_values['footer_code'] =  stripslashes( wp_filter_post_kses( addslashes ( $input['footer_code'] ) ) );
		}
	}
	else {
		$validated_input_values['footer_code'] = $interface_default[ 'footer_code' ];
	}
    
	// Layout settings verification
	if( isset( $input[ 'reset_layout' ] ) ) {
		$validated_input_values[ 'reset_layout' ] = $input[ 'reset_layout' ];
	}
	if( 0 == $validated_input_values[ 'reset_layout' ] ) {
		if( isset( $input[ 'default_layout' ] ) ) {
			$validated_input_values[ 'default_layout' ] = $input[ 'default_layout' ];
		}
	}
	else {
		$validated_input_values['default_layout'] = $interface_default[ 'default_layout' ];
	}

	
    
	
    
   return $validated_input_values;
}
function interface_themeoption_invalidate_caches(){
	
	delete_transient( 'interface_socialnetworks' ); 
	
}

/*	 _e() -> to echo the text
*	 __() -> to get the value
*	 printf () -> to echo the value eg:- my name is $name
*	 eg:- printf( __( 'Your city is %1$s, and your zip code is %2$s.', 'my-text-domain' ), $city, $zipcode );
*	 sprintf() - > to get the value 
* 	 eg:- $url = 'http://example.com';
*	 $link = sprintf( __( 'Check out this link to my <a href="%s">website</a> made with WordPress.', 'my-text-domain' ), esc_url( $url ) );
*	 echo $link;
*/

?>
