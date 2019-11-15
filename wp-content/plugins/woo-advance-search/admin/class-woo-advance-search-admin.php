<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.multidots.com/
 * @since      1.0.0
 *
 * @package    Woo_Advance_Search
 * @subpackage Woo_Advance_Search/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woo_Advance_Search
 * @subpackage Woo_Advance_Search/admin
 * @author     multidots <info@multidots.in>
 */
class Woo_Advance_Search_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Woo_Advance_Search_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Woo_Advance_Search_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/woo-advance-search-admin.css', array('wp-jquery-ui-dialog'), $this->version, 'all');
        wp_enqueue_style('wp-pointer');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Woo_Advance_Search_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Woo_Advance_Search_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script('jquery-ui');
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('jquery-ui-dialog');
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/woo-advance-search-admin.js', array('jquery'), $this->version, false);
        wp_enqueue_script('copytoclipboard', plugin_dir_url(__FILE__) . 'js/clipboard.min.js', array('jquery'), $this->version);
        wp_localize_script($this->plugin_name, 'adminajaxjs', array('adminajaxjsurl' => admin_url('admin-ajax.php')));
        wp_enqueue_script('wp-pointer');
    }

    /**
     * Custom menu in woocommerce setting
     *
     */
    public function asfw_custom_menu_free_version() {
        $wbm_page = 'woocommerce';
        $wbm_settings_page = add_submenu_page($wbm_page, __('Advance Search', 'advance-search'), __('Advance Search', 'advance-search'), 'manage_options', 'advance-search', array(&$this, 'custom_aswf_submenu_page_callback_free_version'));
    }

    /**
     * Woo advance search call back function
     *
     */
    public function custom_aswf_submenu_page_callback_free_version() {

        $product_category = get_option('Woo_Advance_Search_Product_Category_Enable');
        $product_tag = get_option('Woo_Advance_Search_Product_Tag_Enable');
        $Advance_Search_Filter = get_option('Woo_Advance_Search_Filter');
        $Advance_order_by = get_option('Woo_Advance_order_by');
        $Advance_Custom_Css = get_option('Woo_Advance_Custom_Css');
        ?>
        <div class="wrap woocommerce">
            <form method="post" id="mainform" action="" enctype="multipart/form-data">
                <?php wp_nonce_field(basename(__FILE__), 'woo_advance_search'); ?>
                <div class="icon32 icon32-woocommerce-settings" id="icon-woocommerce"><br></div>
                <h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
                    <a class="nav-tab nav-tab-active"
                       id="advance_search_open_setting"><?php _e('Setting', 'woo-advance-search'); ?></a>
                    <a class="nav-tab"
                       id="advance_search_open_preview"><?php _e('Preview', 'woo-advance-search'); ?></a>
                    <a class="nav-tab"
                       id="advance_search_open_shortcode"><?php _e('Shortcode', 'woo-advance-search'); ?></a>
                    <a class="nav-tab"
                       id="advance_search_open_custom_css"><?php _e('Custom CSS', 'woo-advance-search'); ?></a>
                </h2>

                <br class="clear">
                <div class="woo-advance-search-setting-tab">
                    <div id="message" class="updated woo_advance_save_record_messgae" style="display:none"></div>
                    <h3><?php _e('Advance Search Settings', 'woo-advance-search'); ?></h3>
                    <table class="advance_woocommerce_serach_table form-table">
                        <tbody>
                            <tr>
                                <th class="advance_"><?php _e('Enable/Disable search by product category', 'woo-advance-search'); ?></th>
                        <span class="woocommerce-help-tip"></span>
                        <td class="advance_search_html"><input type="checkbox" id="advance_search_product_category"
                                                               name="advance_search_product_category"
                                                               value="Active" <?php
                                                               if (!empty($product_category) && $product_category == 'Active') {
                                                                   echo "checked";
                                                               }
                                                               ?>/></td>
                        </tr>

                        <tr>
                            <th class="advance_"><?php _e('Enable/Disable search by product tag', 'woo-advance-search'); ?></th>
                            <td class="advance_search_html"><input type="checkbox" id="advance_search_product_tag"
                                                                   name="advance_search_product_tag"
                                                                   value="Active" <?php
                                                                   if (!empty($product_tag) && $product_tag == 'Active') {
                                                                       echo "checked";
                                                                   }
                                                                   ?>/></td>
                        </tr>

                        <tr>
                            <th class="advance_"><?php _e('Apply search filter', 'woo-advance-search'); ?></th>
                            <td class="forminp forminp-checkbox">
                                <fieldset>
                                    <legend class="screen-reader-text">
                                        <span><?php _e('Product Ratings', 'woo-advance-search'); ?></span></legend>
                                    <label for="woocommerce_enable_review_rating">
                                        <input type="radio" name="advance_search_filter" <?php
                                        if (!empty($Advance_Search_Filter) && $Advance_Search_Filter == 'Product_Title') {
                                            echo "checked";
                                        }
                                        ?> value="Product_Title"/><?php _e('Product title', 'woo-advance-search'); ?>
                                    </label>
                                </fieldset>
                                <fieldset class="hidden_option">
                                    <label for="woocommerce_review_rating_required">
                                        <input type="radio" name="advance_search_filter" value="Order_by_date" <?php
                                        if (!empty($Advance_Search_Filter) && $Advance_Search_Filter == 'Order_by_date') {
                                            echo "checked";
                                        }
                                        ?> /><?php _e('Order by date', 'woo-advance-search'); ?>
                                    </label>
                                </fieldset>
                                <fieldset class="hidden_option">
                                    <label for="woocommerce_review_rating_required">
                                        <input type="radio" name="advance_search_filter" value="Order_By_Price" <?php
                                        if (!empty($Advance_Search_Filter) && $Advance_Search_Filter == 'Order_By_Price') {
                                            echo "checked";
                                        }
                                        ?> /><?php _e('Order by price', 'woo-advance-search'); ?>
                                    </label>
                                </fieldset>
                            </td>
                        </tr>

                        <tr>
                            <th class="advance_"><?php _e('Search order by', 'woo-advance-search'); ?></th>
                            <td class="advance_search_html"><select name="Selectorder_by"
                                                                    class="advance_search_filter_order_by_html">
                                    <option value="Asc" <?php
                                    if (!empty($Advance_order_by) && $Advance_order_by == 'Asc') {
                                        echo "selected = 'selected'";
                                    }
                                    ?>><?php _e('Ascending', 'woo-advance-search'); ?>
                                    </option>
                                    <option value="Desc" <?php
                                    if (!empty($Advance_order_by) && $Advance_order_by == 'Desc') {
                                        echo "selected = 'selected'";
                                    }
                                    ?>><?php _e('Descending', 'woo-advance-search'); ?>
                                    </option>
                                </select></td>
                        </tr>

                        </tbody>
                    </table>
            </form>
        </div>

        <div class="woo-advance-search-preview-tab" style="display:none">
            <h3><?php _e('Advance Search Preview', 'woo-advance-search'); ?></h3>
            <form>
                <?php wp_nonce_field(basename(__FILE__), 'woo_advance_search'); ?>
                <table class="advance_woocommerce_serach_table form-table">
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" placeholder="Search by product">
                                <input type="button" name="Search" class="button button-primary" value="Search"
                                       id="Search_Button_Preview">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="SelectCategory" id="advance_search_category_preview_html">
                                    <option value="Select Category"><?php _e('Select Category', 'woo-advance-search'); ?></option>
                                    <option value="Select Category"><?php _e('Test Category1', 'woo-advance-search'); ?></option>
                                    <option value="Select Category"><?php _e('Test Category2', 'woo-advance-search'); ?></option>
                                    <option value="Select Category"><?php _e('Test Category3', 'woo-advance-search'); ?></option>
                                </select>
                                <select name="Selecttag" id="advance_search_category_tag_html">
                                    <option value="Select Tag"><?php _e('Select Tag', 'woo-advance-search'); ?></option>
                                    <option value="Test Tag1"><?php _e('Test Tag1', 'woo-advance-search'); ?></option>
                                    <option value="Test Tag2"><?php _e('Test Tag2', 'woo-advance-search'); ?></option>
                                    <option value="Test Tag3"><?php _e('Test Tag3', 'woo-advance-search'); ?></option>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="orderby" id="advance_search_order_by_preview_html">
                                    <option value="Ascending"><?php _e('Ascending', 'woo-advance-search'); ?></option>
                                    <option value="Descending"><?php _e('Descending', 'woo-advance-search'); ?></option>
                                </select>

                                <select name="filter" id="advance_search_filter_tag_html">
                                    <option value="Product_title"><?php _e('Product_Title', 'woo-advance-search'); ?></option>
                                    <option value="Product_price"><?php _e('Product_Price', 'woo-advance-search'); ?></option>
                                    <option value="Product_date"><?php _e('Product_Date', 'woo-advance-search'); ?></option>
                                </select>

                            </td>
                        </tr>

                    </tbody>
                </table>
        </div>
        <div class="woo-advance-search-shortcode-tab" style="display:none">

            <h3><?php _e('Advance Search Shortcode', 'woo-advance-search'); ?></h3>
            <table class="advance_woocommerce_serach_table form-table">
                <tbody>
                    <tr>
                        <td>
                            <input type="text" id="clipboard" readonly value="[woo-advance-search]" width="50%">
                            <input data-clipboard-target="#clipboard"
                                   class="button button-primary zclip js-textareacopybtn btn" data-zclip-text=""
                                   type="button" value="Copy to clipboard">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="woo-advance-search-custom-css" style="display:none">
            <h3><?php _e('Advance Search Custom CSS', 'woo-advance-search'); ?></h3>
            <table class="advance_woocommerce_serach_table form-table">
                <tbody>
                    <tr>
                        <td>
                            <textarea name="woo-advance-search-custom-css" id="woo-advance-search-custom-id" rows="10"
                                      cols="50"><?php echo $Advance_Custom_Css; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="submit">
            <input name="save" class="button-primary advance_search_for_woocommerce_save_btn" type="button" value="Save changes">
        </p>
        </form>
        </div>

        <?php
    }

    /**
     * Function For save data
     *
     *
     */
    public function Save_advance_search_settings_free() {
//        global $wpdb; unused variable
        $create_nonce = wp_create_nonce('woo_advance_search');
        if (wp_verify_nonce($create_nonce, sanitize_text_field(wp_unslash($_POST['woo_advance_search'])))) {
            die('Failed security check');
        }
        $product_category = !empty($_POST['Product_Category']) ? sanitize_text_field(wp_unslash($_POST['Product_Category'])) : '';
        $product_tag = !empty($_POST['Product_Tag']) ? sanitize_text_field(wp_unslash($_POST['Product_Tag'])) : '';
        $product_sku = !empty($_POST['Product_Sku']) ? sanitize_text_field(wp_unslash($_POST['Product_Sku'])) : '';
        $Advance_search_filter = !empty($_POST['Advance_search_filter']) ? sanitize_text_field(wp_unslash($_POST['Advance_search_filter'])) : '';
        $order_by = !empty($_POST['order_by']) ? sanitize_text_field(wp_unslash($_POST['order_by'])) : '';
        $custom_css = !empty($_POST['custom_css']) ? sanitize_text_field(wp_unslash($_POST['custom_css'])) : '';

        update_option('Woo_Advance_Search_Product_Category_Enable', $product_category);
        update_option('Woo_Advance_Search_Product_Tag_Enable', $product_tag);
        update_option('Woo_Advance_Search_Product_Sku_Enable', $product_sku);
        update_option('Woo_Advance_Search_Filter', $Advance_search_filter);
        update_option('Woo_Advance_order_by', $order_by);
        update_option('Woo_Advance_Custom_Css', $custom_css);
        echo "<p><strong>" . esc_html__('Your settings have been saved.', 'woo-advance-search') . "</strong></p>";

        die();
    }

    // function for welcome screen page

    public function welcome_advance_search_for_woocommerce_screen_do_activation_redirect() {

        if (!get_transient('_advance_search_for_woocommerce_welcome_screen')) {
            return;
        }

        // Delete the redirect transient
        delete_transient('_advance_search_for_woocommerce_welcome_screen');

        // if activating from network, or bulk
        if (is_network_admin() || isset($_GET['activate-multi'])) {
            return;
        }
        // Redirect to extra cost welcome  page
        wp_safe_redirect(add_query_arg(array('page' => 'advance-search-for-woocommerce&tab=about'), admin_url('index.php')));
    }

    public function welcome_pages_screen_advance_search_for_woocommerce() {
        add_dashboard_page(
                'Advance Search for WooCommerce Dashboard', 'Advance Search for WooCommerce Dashboard', 'read', 'advance-search-for-woocommerce', array($this, 'welcome_screen_content_advance_search_for_woocommerce'));
    }

    public function welcome_screen_advance_search_for_woocommerce_remove_menus() {
        remove_submenu_page('index.php', 'advance-search-for-woocommerce');
    }

    public function welcome_screen_content_advance_search_for_woocommerce() {
        ?>
        <div class="wrap about-wrap">
            <h1 style="font-size: 2.1em;"><?php printf(__('Welcome to Advance Search for WooCommerce', 'woo-advance-search')); ?></h1>

            <div class="about-text woocommerce-about-text">
                <?php
                $message = '';
                printf(__('%s Advance Search for WooCommerce plugin allows you to add an advanced search option for WooCommerce Products.', 'woo-advance-search'), $message);
                ?>
                <img class="version_logo_img"
                     src="<?php echo plugin_dir_url(__FILE__) . 'images/woo-advance-search.png'; ?>">
            </div>

            <?php
            $setting_tabs_wc = apply_filters('advance_search_for_woocommerce_setting_tab', array("about" => "Overview", "other_plugins" => "Checkout our other plugins"));
            $current_tab_wc = (isset($_GET['tab'])) ? $_GET['tab'] : 'general';
            ?>
            <h2 id="woo-extra-cost-tab-wrapper" class="nav-tab-wrapper">
                <?php
                foreach ($setting_tabs_wc as $name => $label)
                    echo '<a  href="' . esc_url(home_url('wp-admin/index.php?page=advance-search-for-woocommerce&tab=' . esc_attr($name))) . '" class="nav-tab ' . ($current_tab_wc == $name ? 'nav-tab-active' : '') . '">' . esc_attr($label) . '</a>';
                ?>
            </h2>
            <?php
            foreach ($setting_tabs_wc as $setting_tabkey_wc => $setting_tabvalue) {
                switch ($setting_tabkey_wc) {
                    case $current_tab_wc:
                        do_action('advance_search_for_woocommerce_' . $current_tab_wc);
                        break;
                }
            }
            ?>
            <hr/>
            <div class="return-to-dashboard">
                <a href="<?php echo esc_url(home_url('/wp-admin/admin.php?page=advance-search')); ?>"><?php _e('Go to Advance Search for WooCommerce Settings', 'woo-advance-search'); ?></a>
            </div>
        </div>

        <?php
    }

    // function for welcome page about us tag content

    public function advance_search_for_woocommerce_about() {
        ?>
        <div class="changelog">
            </br>
            <style type="text/css">
                p.advance_search_for_woocommerce_overview {
                    max-width: 100% !important;
                    margin-left: auto;
                    margin-right: auto;
                    font-size: 15px;
                    line-height: 1.5;
                }

                .advance_search_for_woocommerce_content_ul ul li {
                    margin-left: 3%;
                    list-style: initial;
                    line-height: 23px;
                }
            </style>
            <div class="changelog about-integrations">
                <div class="wc-feature feature-section col three-col">
                    <div>
                        <p class="advance_search_for_woocommerce_overview"><?php _e('Advance Search for WooCommerce plugin allows you to add an advanced search option for WooCommerce Products. With this option you can search products by product tag and category. you can apply filter searcher like Title, order by date, price category and search order by ascending, Descending. You can customize search as per your requirement like enable and disable product category and tag. you can view searcher option by preview option. you can integrated searcher option in your site using a short-code on a page, as the widget in a sidebar or as template tag in a template.', 'woo-advance-search'); ?></p>
                    </div>
                    <p class="advance_search_for_woocommerce_overview"><strong><?php _e('Plugin Functionality:', 'woo-advance-search'); ?></strong></p>
                    <div class="advance_search_for_woocommerce_content_ul">
                        <ul>
                            <li><?php _e('Advance search across all your WooCommerce products', 'woo-advance-search'); ?></li>
                            <li><?php _e('Advance Search by Category', 'woo-advance-search'); ?></li>
                            <li><?php _e('Advance Search by Product tag', 'woo-advance-search'); ?></li>
                            <li><?php _e('Filter by Title, Date, Price', 'woo-advance-search'); ?></li>
                            <li><?php _e('Filter by Ascending and Descending', 'woo-advance-search'); ?></li>
                            <li><?php _e('Enable or disable searches by product category and tag.', 'woo-advance-search'); ?></li>
                            <li><?php _e('you can preview of advanced searcher option as per your setting.', 'woo-advance-search'); ?></li>
                            <li><?php _e('Shortcode - Use shortcode to place search option anywhere you want', 'woo-advance-search'); ?></li>
                            <li><?php _e('you can apply custom CSS for advanced searcher option.', 'woo-advance-search'); ?></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <?php
    }

    public function advance_search_for_woocommerce_pointers_footer() {
        $admin_pointers = advance_search_for_woocommerce_admin_pointers();
        ?>
        <script type="text/javascript">
            /* <![CDATA[ */
            (function($) {
        <?php
        foreach ($admin_pointers as $pointer => $array) {
            if ($array['active']) {
                ?>
                        $('<?php echo $array['anchor_id']; ?>').pointer({
                            content: '<?php echo $array['content']; ?>',
                            position: {
                                edge: '<?php echo $array['edge']; ?>',
                                align: '<?php echo $array['align']; ?>'
                            },
                            close: function() {
                                $.post(ajaxurl, {
                                    pointer: '<?php echo $pointer; ?>',
                                    action: 'dismiss-wp-pointer'
                                });
                            }
                        }).pointer('open');
                <?php
            }
        }
        ?>
            })(jQuery);
            /* ]]> */
        </script>
        <?php
    }

}

function advance_search_for_woocommerce_admin_pointers() {

    $dismissed = explode(',', (string) get_user_meta(get_current_user_id(), 'dismissed_wp_pointers', true));
    $version = '1_0'; // replace all periods in 1.0 with an underscore
    $prefix = 'advance_search_for_woocommerce_admin_pointers' . $version . '_';

    $new_pointer_content = '<h3>' . __('Welcome to Advance Search for WooCommerce', 'woo-advance-search') . '</h3>';
    $new_pointer_content .= '<p>' . __('Advance Search for WooCommerce plugin allows you to add an advanced search option for WooCommerce Products.', 'woo-advance-search') . '</p>';

    return array(
        $prefix . 'advance_search_for_woocommerce_admin_pointers' => array(
            'content' => $new_pointer_content,
            'anchor_id' => '#toplevel_page_woocommerce',
            'edge' => 'left',
            'align' => 'left',
            'active' => (!in_array($prefix . 'advance_search_for_woocommerce_admin_pointers', $dismissed))
        )
    );
}
