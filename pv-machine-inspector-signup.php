<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              philadelphiavotes.com
 * @since             1.0.0
 * @package           Pv_Machine_Inspector_Signup
 *
 * @wordpress-plugin
 * Plugin Name:       machine inspector signup
 * Plugin URI:        github.com/mattyhead/pv-machine-inspector-signup
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            matthew murphy
 * Author URI:        philadelphiavotes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pv-machine-inspector-signup
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pv-machine-inspector-signup-activator.php
 */
function activate_pv_machine_inspector_signup( ) {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pv-machine-inspector-signup-activator.php';
	Pv_Machine_Inspector_Signup_Activator::activate( );
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pv-machine-inspector-signup-deactivator.php
 */
function deactivate_pv_machine_inspector_signup( ) {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pv-machine-inspector-signup-deactivator.php';
	Pv_Machine_Inspector_Signup_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pv_machine_inspector_signup' );
register_deactivation_hook( __FILE__, 'deactivate_pv_machine_inspector_signup' );



/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pv-machine-inspector-signup.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pv_machine_inspector_signup( ) {
	/**
	 * include our 'decorations'
	 */
	require_once plugin_dir_path( __FILE__ ) . 'helpers/pv-model-signups.php';

	$model = new Pv_Model_Signups( );
	$tablename = $model->get_tablename( );

	$plugin = new Pv_Machine_Inspector_Signup( array( $tablename=>&$model ) );
	$plugin->run( );

}
run_pv_machine_inspector_signup( );
