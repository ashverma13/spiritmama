<?php
function fontAdmin()
{

    global $fontUploaderName, $sn, $fontOptions;
    $i=0;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$fontUploaderName.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$fontUploaderName.' settings reset.</strong></p></div>';
	 $fuVersion = '1.6';
    ?>

<div class="fu_wrap">
<h2>Font Uploader</h2>
<div class="credits">
	<p>Wordpress Font Uploader Plugin by <a href="http://pippinspages.com">Pippin Williamson</a></p>	
	<small><?php echo 'Version ' . $fuVersion; ?></small>
		
	<p>Help me buy a beer?</p>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="72HGD7SA97KPE">
		<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>		
</div>

<p><em>Filetypes accepted: <strong>.ttf</strong>, <strong>.otf</strong></em>, and <strong>.eot</strong></p>
<p>Uploaded fonts will appear in the menus below</p>
<?php $baseFontDir = WP_PLUGIN_URL . '/' . str_replace(basename( __FILE__), "" ,plugin_basename(__FILE__)); ?>
	<form name="newad" method="post" enctype="multipart/form-data" action="<?php echo $baseFontDir; ?>font-upload.php">
	 <table>
	 	<tr><td><input type="file" name="font"></td></tr>
	 	<tr><td><input name="Submit" type="submit" value="Upload" class="fu_upload"></td></tr>
	 </table>	
	</form>
        <form method="post">

<?php 
                foreach ($fontOptions as $value):
                    switch ( $value['type'] ):
                        case "open":
                            break;

                        case "close":
?>
    </div>
</div>
<br />
<?php                       break;

                        case "title":
?>
 
<p>Apply your uploaded fonts to elements below:</p>
<?php                       break;

                        case 'text':
?>
<div class="fu_input fu_text">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    <input name="<?php echo $value['id']; ?>"
    		  class="<?php echo $value['class']; ?>"
           id="<?php echo $value['id']; ?>"
           type="<?php echo $value['type']; ?>"
           value="<?php if ( get_settings( $value['id'] ) != ""){ echo htmlentities(stripslashes(get_settings( $value['id']))); } else { echo htmlentities($value['std']); } ?>" />
    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
                            break;

                        case 'textarea':
?>
<div class="fu_input fu_textarea">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    <textarea name="<?php echo $value['id']; ?>" cols="" rows="" class="<?php echo $value['class']; ?>"><?php if ( get_settings( $value['id'] ) != ""){ echo htmlentities(stripslashes(get_settings( $value['id'] ))); } else { echo $value['std']; } ?></textarea>
    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
                            break;

                        case 'select':
?>
<div class="fu_input fu_select">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="<?php echo $value['class']; ?>">
    <?php foreach ($value['options'] as $option) { ?>
        <option <?php if (get_settings( $value['id'] ) == $option){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
    <?php } ?>
    </select>

    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
                            break;

                        case "checkbox":
?>
<div class="fu_input fu_checkbox">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

    <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php if(get_option($value['id'])) echo 'checked="checked"'; ?> />

    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php                       break;

                        case "section":
                            $i++;
?>

<div class="fu_section">
    <div class="fu_title"><h3><img src="<?php echo $baseFontDir; ?>fontFunctions/images/trans.gif" class="inactive" alt="">
    <?php echo $value['name']; ?></h3>
   		<span class="submit">
    		<input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
    	</span><div class="clearfix"></div>
    </div>
    <div class="fu_options">

                        <?php break;

                endswitch;
            endforeach;
?>

        <input type="hidden" name="action" value="save" />
        </form>
        <form method="post">
            <p class="submit">
                <input name="reset" type="submit" value="Reset" />
                <input type="hidden" name="action" value="reset" />
            </p>
        </form>
 
    </div>
</div>
<?php
} //end fontAdmin

add_action('admin_init', 'fontInit');
add_action('admin_menu', 'fontAddAdmin');

?>