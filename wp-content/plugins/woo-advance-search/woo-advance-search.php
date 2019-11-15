<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.multidots.com/
 * @since             1.0.0
 * @package           Woo_Advance_Search
 *
 * @wordpress-plugin
 * Plugin Name:       Advance Search for WooCommerce
 * Plugin URI:        multidots.com
 * Description:       Advance Search for WooCommerce plugin allows you to add an advanced search option for WooCommerce Products. With this option you can search products by product tag and category. you can apply filter searcher like Title, order by date, price category and search order by ascending, Descending. You can customize search as per your requirement like enable and disable product category and tag. you can view searcher option by preview option. you can integrated searcher option in your site using a short-code on a page, as the widget in a sidebar or as template tag in a template.
 * Version:           1.1
 * Author:            multidots
 * Author URI:        http://www.multidots.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woo-advance-search
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woo-advance-search-activator.php
 */
function activate_woo_advance_search() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-advance-search-activator.php';
	Woo_Advance_Search_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woo-advance-search-deactivator.php
 */
function deactivate_woo_advance_search() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-advance-search-deactivator.php';
	Woo_Advance_Search_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woo_advance_search' );
register_deactivation_hook( __FILE__, 'deactivate_woo_advance_search' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woo-advance-search.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woo_advance_search() {

	$plugin = new Woo_Advance_Search();
	$plugin->run();

}
run_woo_advance_search();
