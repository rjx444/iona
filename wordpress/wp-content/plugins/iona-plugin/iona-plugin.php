<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://rjx444.com
 * @since             1.0.0
 * @package           Iona_Plugin
 *
 *
 * Plugin Name:       IONA Plugin
 * Plugin URI:        https://rjx444.com/
 * Description:       This is a custom plugin made for IONA Test Project.
 * Version:           1.0.0
 * Author:            Raymond Serion
 * Author URI:        https://rjx444.com
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version.
 */
define( 'IONA_PLUGIN_VERSION', '1.0.0' );
define( 'IONA_PLUGIN_NAME', 'iona-plugin' );

// The Plugin Directory Path

/**
 * The plugin base dir path
 */
define( 'IONA_PLUGIN_BASE_DIR', plugin_dir_path( __FILE__ ) );

// The Plugin Directory URL

/**
 * The plugin url to access its resources through the browser
 * used to access assets like images/css/js files
 */
define( 'IONA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// The API key for the Cat API
define( 'IONA_PLUGIN_CAT_API_KEY', 'cf4f9b8b-e1e0-40c4-aab1-37e97c5e5497' );

/**
 * The function that will run upon plugin activation.
 */
function activate_iona_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-iona-plugin-activator.php';
	Iona_Plugin_Activator::activate();
}

/**
 * The function that will run upon plugin deactivation.
 */
function deactivate_iona_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-iona-plugin-deactivator.php';
	Iona_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_iona_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_iona_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-iona-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 */
function run_iona_plugin() {

	$plugin = new Iona_Plugin();
	$plugin->run();

}
run_iona_plugin();