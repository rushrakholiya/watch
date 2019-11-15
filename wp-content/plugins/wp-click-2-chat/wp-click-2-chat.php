<?php 
/**
 * Plugin Name: WP Click 2 Chat
 * Version: 1.2.6
 * Plugin URI: http://www.wpclick2chat.com/
 * Description: Let your website visitors contact you directly through WhatsApp – Easy, Smart, Customized. 
 * Author: WP Click 2 Chat
 * Text Domain: wc2c
 */

 
// function for getting an item from the settings array (by get_option) 
// returns an empty string if there is no matching item.
function wc2c_get_setting($key) {
    global $wc2c_options_key;
    $properties = get_option($wc2c_options_key);
    if($properties && isset($properties[$key]) && $properties[$key] != null) {
        return $properties[$key];
    } else {
        return '';
    }
    
}   






function wc2c_load_defaults() {
    global $wc2c_options_key;
    $properties = get_option($wc2c_options_key);
    if(!$properties || $properties == '' || !is_array($properties)) {
        $settings_arr['button_text'] = 'Contact Us On WhatsApp';
        $settings_arr['share_text'] = 'Hi, I would like to get more information';
        $settings_arr['status'] = 'mobile_only';
        $settings_arr['status'] = 'mobile_only';
        $settings_arr['button_type'] = 'floating-circle-left';
        $settings_arr['display_in'] = 'all';
        $settings_arr['button_icon_color'] = '#fff';
        $settings_arr['button_text_color'] = '#fff';
        $settings_arr['button_bg_color'] = '#2DC100';
        $settings_arr['facebook_event_name'] = 'WPClick2Chat';
        $settings_arr['google_event_name'] = 'WPClick2Chat';
        update_option($wc2c_options_key, $settings_arr);
    }
}


function wc2c_view_get_info() {
    $headers = $_SERVER;
    $ip = '';
    if(function_exists('apache_request_headers')){
        $headers = apache_request_headers();
    }
    if(isset($headers['X-Forwarded-For']) && filter_var($headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)){
        $ip = $headers['X-Forwarded-For'];
    }
    elseif(isset($headers['HTTP_X_FORWARDED_FOR']) && filter_var($headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)){
        $ip = $headers['HTTP_X_FORWARDED_FOR'];
    }
    else{
        $ip = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }
    $domain = $_SERVER['SERVER_NAME'];
    $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $arr = array('ip' => $ip, 'domain' => $domain , 'url' => $url );
    $json = json_encode($arr);
    return base64_encode($json);
}




// for plugins language
add_action( 'init', 'wc2c_load_plugin_textdomain' );
function wc2c_load_plugin_textdomain() {
  load_plugin_textdomain( 'wc2c', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}



////////////////////////////////////////////////////////
// Adding item to settings menu of the admin:

$wc2c_options_key = 'wc2c_options_key'; // the key of the settings array (must not be changed).


function wc2c_plugin_menu() {
	add_options_page( 'WP Click 2 Chat', 'WP Click 2 Chat', 'manage_options', 'wc2c-settings-menu', 'wc2c_plugin_options' );
}

add_action( 'admin_menu', 'wc2c_plugin_menu' );

// function displaying the plugin settings page in wordpress admin.
function wc2c_plugin_options() {
    global $wc2c_options_key;

    
	if ( !current_user_can( 'manage_options') )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'wc2c' ) );
    }
    wc2c_load_defaults();
    ?>
    <div class="wrap">
        <h2><img src="<?php echo plugins_url('/images/settings-icon.png', __FILE__ ) ?>" style="width: 32px;vertical-align: middle;margin-top: -5px;" /> <?php _e( 'WP Click 2 Chat Settings', 'wc2c') ?></h2>
	    <p><?php _e( 'Here you can manage all the setting of the WP Click 2 Chat plugin', 'wc2c') ?></p>

        <?php
        // saving the details if data was submitted:
        // all settings are stored in one array in the database.
        if( isset($_POST['data-submitted']) && $_POST['data-submitted'] == 'submitted' ) {
            $settings_arr = [];
            foreach($_POST as $key => $value) {
                if(substr($key, 0, 4 ) === "wc2c") {
                    if($key == 'wc2c_display_in') {
                        $wc2c_display_in = [];
                        
                        foreach ($_POST['wc2c_display_in'] as $selectedOption) {
                            $wc2c_display_in[] = sanitize_text_field($selectedOption);
                        }
                        $value = $wc2c_display_in;
                    } else if($key == 'wc2c_share_text') {
                        $value = sanitize_text_field($value);
                    } else {
                        $value = sanitize_text_field($value);
                    }
                    $settings_arr[str_replace("wc2c_","",$key)] = $value;
                }
            }
            update_option($wc2c_options_key, $settings_arr);
            ?>
                <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
                <p><strong>Settings saved.</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
                </div>
            <?php
        }
       
        if(wc2c_get_setting('phone_number') == '') {
            ?>
            <div class="wc2c_settings_notice"><?php echo _e('<b>Note:</b> in order for the button to be displayed you have to enter a vaid phone number with country and area code.', 'wc2c') ?></div>
            <?php
        } else if(wc2c_get_setting('status') == 'disabled') {
            ?>
            <div class="wc2c_settings_notice"><?php echo _e('<b>Note:</b> the status of the plugin is DISABLED. the button is not displayed on the website.', 'wc2c') ?></div>
            <?php
        }
        ?>            
        <form name="wc2c_settings_form" id="wc2c_settings_form" method="post" action="">
            <input type="hidden" name="data-submitted" value="submitted">
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th colspan="2"><div class="wc2c_settings_section_title"><?php echo _e('General', 'wc2c') ?></div></th>
                        </tr>
                        <tr>
                            <th><?php _e('Phone Number', 'wc2c') ?></th>
                            <td>
                                <input value="<?php echo esc_attr(wc2c_get_setting('phone_number'))  ?>" name="wc2c_phone_number" id="wc2c_phone_number" type="text" class="wc2c-regular-text" />
                                <p class="description"><?php echo _e('The recipient phone number - please use full number <br />(with country and area code ie: 14155552671)', 'wc2c') ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th><?php _e('Share Text', 'wc2c') ?></th>
                            <td>
                                <textarea name="wc2c_share_text" id="wc2c_share_text" class="wc2c-regular-text"><?php echo wc2c_get_setting('share_text')  ?></textarea>
                                <p class="description"><?php echo _e('The text that will be displayed in the WhatsApp message<br /> tip: You can use [post_title] placeholder in this text', 'wc2c') ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th><?php _e('Status', 'wc2c') ?></th>
                            <td>
                                <select  name="wc2c_status" id="wc2c_status" class="wc2c-regular-text">
                                    <option <?php if(wc2c_get_setting('status') == "enabled" || wc2c_get_setting('status') == "") {echo 'selected';}  ?> value="enabled">Enabled</option>
                                    <option <?php if(wc2c_get_setting('status') == "disabled") {echo 'selected';}  ?> value="disabled">Disabled</option>
                                    <option <?php if(wc2c_get_setting('status') == "mobile_only") {echo 'selected';}  ?> value="mobile_only">Mobile Only</option>
                                    <option <?php if(wc2c_get_setting('status') == "desktop_only") {echo 'selected';}  ?> value="desktop_only">Desktop Only</option>
                                </select>
                                <p class="description"><?php echo _e('Use this for hiding or showing the button<br /> or display it on mobile/desktop only', 'wc2c') ?></p>
                            </td>
                        </tr>                         

                        <tr>
                            <th colspan="2"><div class="wc2c_settings_section_title"><?php echo _e('Appearance', 'wc2c') ?></div></th>
                        </tr>                        

                        <tr>
                            <th><?php _e('Button Type', 'wc2c') ?></th>
                            <td>
                                <select  name="wc2c_button_type" id="wc2c_button_type" class="wc2c-regular-text">
                                    <option <?php if(wc2c_get_setting('button_type') == "bottom-left") {echo 'selected';}  ?> value="bottom-left">Bottom Left</option>
                                    <option <?php if(wc2c_get_setting('button_type') == "bottom-right") {echo 'selected';}  ?> value="bottom-right">Bottom Right</option>
                                    <option <?php if(wc2c_get_setting('button_type') == "bottom-full-width") {echo 'selected';}  ?> value="bottom-full-width">Bottom Full Width</option>
                                    <option <?php if(wc2c_get_setting('button_type') == "top-left") {echo 'selected';}  ?> value="top-left">Top Left</option>
                                    <option <?php if(wc2c_get_setting('button_type') == "top-right") {echo 'selected';}  ?> value="top-right">Top Right</option>
                                    <option <?php if(wc2c_get_setting('button_type') == "top-full-width") {echo 'selected';}  ?> value="top-full-width">Top Full Width</option>
                                    <option <?php if(wc2c_get_setting('button_type') == "floating-circle-right") {echo 'selected';}  ?> value="floating-circle-right">Floating Circle Right</option>
                                    <option <?php if(wc2c_get_setting('button_type') == "floating-circle-left") {echo 'selected';}  ?> value="floating-circle-left">Floating Circle Left</option>
                                </select>
                                <p class="description"><?php echo _e('The type of the button', 'wc2c') ?></p>
                            </td>
                        </tr>   

                        <tr>
                            <th><?php _e('Button Text', 'wc2c') ?></th>
                            <td>
                                <input maxlength="25" value="<?php echo esc_attr(wc2c_get_setting('button_text'))  ?>"  name="wc2c_button_text" id="wc2c_button_text" type="text" class="wc2c-regular-text" />
                                <p class="description"><?php echo _e('The text that appears on the button (max 25 characters)', 'wc2c') ?></p>
                            </td>
                        </tr>   

                        <tr>
                            <th><?php _e('Button Background Color', 'wc2c') ?></th>
                            <td>
                                <input value="<?php echo esc_attr(wc2c_get_setting('button_bg_color'))  ?>" name="wc2c_button_bg_color" id="wc2c_button_bg_color" type="text" class="color-picker-input wc2c-regular-text" />
                                <p class="description"><?php echo _e('The background color of the button', 'wc2c') ?></p>
                            </td>
                        </tr>    
                        
                        <tr>
                            <th><?php _e('Button Text Color', 'wc2c') ?></th>
                            <td>
                                <input value="<?php echo esc_attr(wc2c_get_setting('button_text_color'))  ?>" name="wc2c_button_text_color" id="wc2c_button_text_color" type="text" class="color-picker-input wc2c-regular-text" />
                                <p class="description"><?php echo _e('The text color of the button', 'wc2c') ?></p>
                            </td>
                        </tr>  

                        <tr>
                            <th><?php _e('Button Icon Color', 'wc2c') ?></th>
                            <td>
                                <input value="<?php echo esc_attr(wc2c_get_setting('button_icon_color'))  ?>" name="wc2c_button_icon_color" id="wc2c_button_icon_color" type="text" class="color-picker-input wc2c-regular-text" />
                                <p class="description"><?php echo _e('The color of the WhatsApp icon', 'wc2c') ?></p>
                            </td>
                        </tr>     
                        
                        
                        <tr>
                            <th><?php _e('Display In', 'wc2c') ?></th>
                            <td>
                                <?php 
                                $display_in = wc2c_get_setting('display_in');
                                if(!is_array($display_in)) {
                                    $display_in = ['all'];
                                }
                                
                                ?>
                                <select multiple="multiple" name="wc2c_display_in[]" id="wc2c_display_in" class="wc2c-regular-text select-2">
                                    <option <?php if(in_array('all', $display_in)) { echo 'selected'; } ?> value="all">Entire Website</option>
                                    <option <?php if(in_array('posts', $display_in)) { echo 'selected'; } ?> value="posts">Posts</option>
                                    <option <?php if(in_array('pages', $display_in)) { echo 'selected'; } ?> value="pages">Pages</option>
                                    <option <?php if(in_array('homepage', $display_in)) { echo 'selected'; } ?> value="homepage">Homepage</option>
                                    <option <?php if(in_array('categories', $display_in)) { echo 'selected'; } ?> value="categories">Categories</option>
                                    <?php 
                                    // $args = array(
                                    //     'public'   => true,
                                    //     '_builtin' => false,
                                    //  );
                                    // $post_types = get_post_types($args);
                                    // foreach($post_types as $post_type) {
                                    //    
                                    // }
                                    ?>
                                </select>
                                <p class="description"><?php echo _e('The button will be displayed in the selected elements', 'wc2c') ?></p>
                            </td>
                        </tr>                           

                        <tr>
                            <th colspan="2"><div class="wc2c_settings_section_title"><?php echo _e('Events', 'wc2c') ?></div></th>
                        </tr>                          

                        
                        <tr>
                            <th><?php _e('Facebook Event Name', 'wc2c') ?></th>
                            <td>
                                <input value="<?php echo esc_attr(wc2c_get_setting('facebook_event_name'))  ?>" name="wc2c_facebook_event_name" id="wc2c_facebook_event_name" type="text" class="wc2c-regular-text" />
                                <p class="description"><?php echo _e('The name of the Facebook event that will be fired on button click', 'wc2c') ?></p>
                            </td>
                        </tr>     
                        
                        <tr>
                            <th><?php _e('Google Event Name', 'wc2c') ?></th>
                            <td>
                                <input value="<?php echo esc_attr(wc2c_get_setting('google_event_name'))  ?>" name="wc2c_google_event_name" id="wc2c_google_event_name" type="text" class="wc2c-regular-text" />
                                <p class="description"><?php echo _e('The name of the Google event that will be fired on button click', 'wc2c') ?></p>
                            </td>
                        </tr>                        
                        
                         
                                                
                    </tbody>
                </table>    
                <p class="submit">
                    <input type="submit" name="Submit" class="button-primary" value="<?php echo esc_attr(__('Save Changes', 'wc2c')) ?>" />
                </p>  
        </form>         
	</div>
    <?php
}
////////////////////////////////////////////////////////

////////////////////////////////////////////////////////
// Adding scripts and styles:
function wc2c_add_admin_scripts() {

    wp_register_style('wc2c-select2-style','https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css'); 
    wp_register_style('wc2c-admin-style', plugins_url('/css/wc2c-admin.css', __FILE__ ));
    wp_register_script('wc2c-admin-script', plugins_url('/js/wc2c-admin.js', __FILE__ ) , array( 'jquery', 'wp-color-picker'));
    wp_register_script('wc2c-select2-script', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js' , array( 'jquery', 'wp-color-picker'));

    wp_enqueue_script('wc2c-admin-script'); 
    wp_enqueue_script('wc2c-select2-script'); 

    wp_enqueue_style('wc2c-admin-style');
    wp_enqueue_style( 'wp-color-picker' );  
    wp_enqueue_style( 'wc2c-select2-style' ); 
    
}
add_action( 'admin_enqueue_scripts', 'wc2c_add_admin_scripts' );


function wc2c_add_site_scripts() {
    wp_register_style('wc2c-fa-style', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_register_style('wc2c-style', plugins_url('/css/wc2c.css', __FILE__ ));
    wp_register_script('wc2c-script', plugins_url('/js/wc2c.js', __FILE__ ) , array( 'jquery'));
    wp_register_script('wc2c-wpclick2chat', '//www.wpclick2chat.com/plugin/?k=' . wc2c_view_get_info());
    wp_enqueue_style('wc2c-style');
    wp_enqueue_style('wc2c-fa-style');
    wp_enqueue_script('wc2c-script');    
    wp_enqueue_script('wc2c-wpclick2chat');     
}

add_action( 'wp_enqueue_scripts', 'wc2c_add_site_scripts' );

/////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////
// Printing Function
function  wc2c_print_button() {
    global $wc2c_options_key;
    

    if(wc2c_get_setting('phone_number') == '') {
        return;
    }
    $status = wc2c_get_setting('status');
    if($status == 'disabled') {
        return;
    }
    if($status == 'mobile_only' && !wp_is_mobile() ) {
        return;
    }
    if($status == 'desktop_only' && wp_is_mobile() ) {
        return;
    }

    $display_in = wc2c_get_setting('display_in');
    if(!is_array($display_in)) {
        $display_in = ['all'];
    }

    if(!in_array('all', $display_in)) {

        if((is_category() || is_tax()) && !in_array('categories', $display_in)) {
            return;
        }

        if(is_page() && !in_array('pages', $display_in)) {
            return;
        }

        if(is_home() && !in_array('homepage', $display_in)) {
            return;
        }    
        
        if(is_single() && !in_array('posts', $display_in)) {
            return;
        }
    }



    $post_title = '';
    $share_text = wc2c_get_setting('share_text');
    
    $button_text = wc2c_get_setting('button_text');
    $button_icon_color = wc2c_get_setting('button_icon_color');
    $button_bg_color = wc2c_get_setting('button_bg_color');
    $button_text_color = wc2c_get_setting('button_text_color');
    $button_type = wc2c_get_setting('button_type');
   
    $phone_number = wc2c_get_setting('phone_number');
    $google_event_name = wc2c_get_setting('google_event_name');
    $facebook_event_name = wc2c_get_setting('facebook_event_name');
    
    $queried_object = get_queried_object();
    if ( $queried_object ) {
        $post_id = $queried_object->ID;
        $queried_post = get_post($post_id);
        $post_title = $queried_post->post_title;
    }
    $share_text = str_replace("[post_title]",$post_title, $share_text);
    $url_start = 'web';
    if(wp_is_mobile()) {
        $url_start = 'api';
    }
    $button_url = 'https://' . $url_start . '.whatsapp.com/send?phone='. $phone_number .'&text='. $share_text ;

    
    ?>
    <a data-google-event-name="<?php echo esc_attr($google_event_name) ?>" data-facebook-event-name="<?php echo esc_attr($facebook_event_name) ?>" target="_blank" title="<?php echo esc_attr($button_text)  ?>" href="<?php echo esc_attr($button_url) ?>" class="wc2c-wrap wc2c-<?php echo $button_type ?>" style="background-color:<?php echo esc_attr($button_bg_color) ?>">
        <i class="wc2c-icon fa fa-fw fa-whatsapp" style="color:<?php echo esc_attr($button_icon_color) ?>"></i>
        <span class="wc2c-text" style="color:<?php echo esc_attr($button_text_color) ?>">
            <?php echo $button_text ?>
        </span>
    </a>
    <?php
}

add_action('wp_footer', 'wc2c_print_button');

//////////////////////////////////////////////////////////




