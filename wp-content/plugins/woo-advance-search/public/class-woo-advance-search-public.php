<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.multidots.com/
 * @since      1.0.0
 *
 * @package    Woo_Advance_Search
 * @subpackage Woo_Advance_Search/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woo_Advance_Search
 * @subpackage Woo_Advance_Search/public
 * @author     multidots <info@multidots.in>
 */
class Woo_Advance_Search_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
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
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/woo-advance-search-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
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
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/woo-advance-search-public.js', array('jquery'), $this->version, false);

        wp_localize_script($this->plugin_name, 'adminajaxjs', array('adminajaxjsurl' => admin_url('admin-ajax.php')));
    }

    public function woo_advance_search_shortcode() {
        $product_category = get_option('Woo_Advance_Search_Product_Category_Enable');
        $product_tag = get_option('Woo_Advance_Search_Product_Tag_Enable');
        $Advance_Search_Filter = get_option('Woo_Advance_Search_Filter');

        if (!empty($product_category) && $product_category === 'Active') {
            $category_display = "inline-block";
        } else {
            $category_display = "none";
        }

        if (!empty($product_tag) && $product_tag === 'Active') {
            $tag_display_css = "inline-block";
        } else {
            $tag_display_css = "none";
        }
        $action = get_permalink(wc_get_page_id('shop'));

        $search_text = !empty($_GET['s']) ? sanitize_text_field(wp_unslash($_GET['s'])) : '';
        ?>
        <div class="Advance_search_for_woo_display_main"> 
            <form name="woo_advance_search_form" id="woo_advance_search_form" class="woocommerce" action="<?php echo esc_url($action); ?>" method="get">
                <div class="Default_search_preview_tab">
                    <input type="hidden" name="post_type" value="product" />
                    <input type="hidden" name="was" value="was" />
                    <input type="text" placeholder ="Search" name="s" value="<?php echo esc_attr($search_text); ?>" class="woo_advance_default_preview_set_search_text"><input type="submit" value="<?php _e('submit', 'woo-advance-search') ?>" class="advance_search_for_woocommerce_save_btn">
                </div>

                <div class="advance_default_search_advance_search_option">
                    <?php
                    $product_search = !empty($_GET['was']) ? sanitize_text_field(wp_unslash($_GET['was'])) : '';
                    $product_cat = !empty($_GET['product_cat']) ? sanitize_text_field(wp_unslash($_GET['product_cat'])) : '';
                    $product_tag = !empty($_GET['product_tag']) ? sanitize_text_field(wp_unslash($_GET['product_tag'])) : '';
                    $order_by_filter_results = !empty($_GET['order_by_filter']) ? sanitize_text_field(wp_unslash($_GET['order_by_filter'])) : '';
                    $advance_search_filter_results = !empty($_GET['advance_search_filter_results']) ? sanitize_text_field(wp_unslash($_GET['advance_search_filter_results'])) : '';
                    $price_selected = "";
                    $date_selected = "";
                    $title_selected = "";
                    if (empty($product_search) && !empty($Advance_Search_Filter) && $Advance_Search_Filter == 'Order_By_Price') {
                        $price_selected = "selected='selected'";
                    }
                    if (empty($product_search) && !empty($Advance_Search_Filter) && $Advance_Search_Filter == 'Order_by_date') {
                        $date_selected = "selected='selected'";
                    }
                    if (empty($product_search) && !empty($Advance_Search_Filter) && $Advance_Search_Filter == 'Product_Title') {
                        $title_selected = "selected='selected'";
                    }
                    $prod_cat_args = array(
                        'taxonomy' => 'product_cat',
                        'orderby' => 'name',
                        'empty' => 0
                    );
                    $woo_categories = get_categories($prod_cat_args);
                    ?> 

                    <div class="Advance_Search_Button"></div>
                    <div class="Advance_search_select_category">
                        <select name="product_cat" class="advance_search_category_preview_html" style="display:<?php echo esc_attr($category_display); ?>"> 
                            <option value=""><?php _e( 'Select Category', 'woo-advance-search' );?></option>
                            <?php
                            foreach ($woo_categories as $woo_cat) {
                                $woo_cat_name = $woo_cat->name; //category name 
                                ?>
                                <option value="<?php echo $woo_cat_name; ?>" <?php
                                if ($product_cat === $woo_cat_name) {
                                    echo "selected=selected";
                                }
                                ?>><?php echo $woo_cat_name; ?></option>	
                                    <?php }
                                    ?>
                        </select>

                        <select name="product_tag" class="advance_search_category_tag_html" style="display:<?php echo esc_attr($tag_display_css); ?>"> 
                            <option value=""><?php _e('Select Tag','woo-advance-search'); ?></option>
                            <?php
                            $terms = get_terms('product_tag');
                            if (!empty($terms) && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    ?>
                                    <option value="<?php echo $term->name; ?>" <?php
                                    if ($product_tag === $term->name) {
                                        echo "selected=selected";
                                    }
                                    ?> ><?php echo esc_attr($term->name); ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                        </select>
                    </div>

                    <div class="order_by_filter">
                        <p class="order_by_filter_inner_html"><label><?php _e('Order by','woo-advance-search'); ?></label>
                            <select name="order_by_filter" class="order_by_dropdown">
                                <option value="Asc" <?php
                                if (!empty($order_by_filter_results) && $order_by_filter_results === 'Asc') {
                                    echo "selected=selected";
                                }
                                ?>><?php _e('Ascending','woo-advance-search'); ?></option>
                                <option value="Desc" <?php
                                if (!empty($order_by_filter_results) && $order_by_filter_results === 'Desc') {
                                    echo "selected=selected";
                                }
                                ?>><?php _e('Descending','woo-advance-search');?></option>
                            </select>
                        </p>
                    </div>	

                    <div class="advace_search_filter_html"> 
                        <p class="order_by_filter_inner_html"><label><?php _e('Filter','woo-advance-search');?></label>
                            <select name="advance_search_filter_results" class="advance_search_filter_dropdown">
                                <option value="_price" <?php
                                if (!empty($advance_search_filter_results) && $advance_search_filter_results === "_price") {
                                    echo "selected=selected";
                                }
                                ?> <?php echo $price_selected; ?>><?php _e('Order by price','woo-advance-search');?></option>
                                <option value="date" <?php
                                if (!empty($advance_search_filter_results) && $advance_search_filter_results === "date") {
                                    echo "selected=selected";
                                }
                                ?> <?php echo $date_selected; ?> ><?php _e('Order by date','woo-advance-search');?></option>
                                <option value="title" <?php
                                if (!empty($advance_search_filter_results) && $advance_search_filter_results === "title") {
                                    "selected=selected";
                                }
                                ?><?php echo $title_selected ?>><?php _e('Order by title','woo-advance-search');?></option>
                            </select>
                        </p> 
                    </div>

                </div>
            </form>
        </div>
        <?php
    }

    public function woo_advance_search_filter_post($query) {
        $Product_search_by_sku = get_option('Woo_Advance_Search_Product_Sku_Enable');

        if (!is_admin()) {

            if (!$query->is_main_query())
                return;

            $query_args = array();

            $product_cat = !empty($_GET['product_cat']) ? esc_attr($_GET['product_cat']) : '';
            $product_tag = !empty($_GET['product_tag']) ? esc_attr($_GET['product_tag']) : '';

            // Basic arguments
            $query_args['post_type'] = 'product';
            $query_args['post_status'] = 'publish';

            // Pagination
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $query_args['paged'] = $paged;

            $search_keyword = sanitize_text_field(wp_unslash($_GET['s']));

            if ($search_keyword && strlen($search_keyword) > 0) {
                $query_args['s'] = $search_keyword;
            } else {
                $query_args['s'] = '';
            }

            if (!empty($Product_search_by_sku) && $Product_search_by_sku == 'All') {
                $query_args['meta_query']['relation'] = 'OR';
                $query_args['meta_query'][] = array(
                    'key' => '_sku',
                    'value' => $query_args['s'],
                    'compare' => 'LIKE'
                );
            }

            // Check selected taxonomies
            if (!empty($product_cat) && $product_cat != 'all' && $product_cat != '') {
                $query_args['tax_query']['relation'] = 'OR';
                $query_args['tax_query'][] = array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $product_cat,
                );
            }

            // Check selected tag
            if (!empty($product_tag) && $product_tag != 'all' && $product_tag != '') {
                $query_args['tax_query']['relation'] = 'AND';
                $query_args['tax_query'][] = array(
                    'taxonomy' => 'product_tag',
                    'field' => 'slug',
                    'terms' => $product_tag,
                );
            }



            // Set query variables
            foreach ($query_args as $key => $value) {
                $query->set($key, $value);
            }
        }
    }

    /**
     * Function to override woocomerce product query hooks 
     *
     * @param unknown_type $q
     */
    public function set_woo_advance_search_order_by($q) {

        $Product_order_by = !empty($_GET['order_by_filter']) ? esc_attr($_GET['order_by_filter']) : '';
        $Product_price_order = !empty($_GET['advance_search_filter_results']) ? esc_attr($_GET['advance_search_filter_results']) : '';
        if (!empty($Product_price_order) && $Product_price_order == "_price") {
            $q->set('orderby', 'meta_value_num');
            $q->set('order', $Product_order_by);
            $q->set('meta_key', $Product_price_order);
        } else if (!empty($Product_price_order) && $Product_price_order == 'title') {
            $q->set('orderby', $Product_price_order);
            $q->set('order', $Product_order_by);
        } else {
            $q->set('orderby', 'date');
            $q->set('order', $Product_order_by);
        }
    }

    /**
     * Function to override wordpress search query hooks 
     *
     * @param unknown_type $q
     */
    public function woo_advance_search_filter_search($term) {
        $search = "";
        return $search;
    }

    /**
     * Function for  wp footer custom style
     * 
     */
    public function woo_advance_search_custom_css() {
        $wp_custom_css = get_option('Woo_Advance_Custom_Css');
        if (!empty($wp_custom_css) && $wp_custom_css != '') {
            $advance_custom_css_results = "<style type=text/css>" . $wp_custom_css . "</style>";
            echo $advance_custom_css_results;
        }
    }

    /**
     * Function For bn code
     * 
     */
    function paypal_bn_code_filter_woo_advance_search($paypal_args) {
        $paypal_args['bn'] = 'Multidots_SP';
        return $paypal_args;
    }

}
