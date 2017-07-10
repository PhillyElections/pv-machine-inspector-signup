<?php
/**
 * Fired during plugin activation
 *
 * @link       philadelphiavotes.com
 * @since      1.0.0
 *
 * @package    Pv_Machine_Inspector_Signup
 * @subpackage Pv_Machine_Inspector_Signup/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Pv_Machine_Inspector_Signup
 * @subpackage Pv_Machine_Inspector_Signup/includes
 * @author     matthew murphy <matthew.e.murphy@phila.gov>
 */
class Pv_Machine_Inspector_Signup_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'setup/setup.php';

		$setup = new Pv_Machine_Inspector_Signup_Db();
		$setup->create();
	}
}
