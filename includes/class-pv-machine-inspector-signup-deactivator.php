<?php
/**
 * Fired during plugin deactivation
 *
 * @link  philadelphiavotes.com
 * @since 1.0.0
 *
 * @package    Pv_Machine_Inspector_Signup
 * @subpackage Pv_Machine_Inspector_Signup/includes
 */

if ( ! class_exists( 'Pv_Machine_Inspector_Signup_Deactivator' ) ) {
	/**
	 * Fired during plugin deactivation.
	 *
	 * This class defines all code necessary to run during the plugin's deactivation.
	 *
	 * @since      1.0.0
	 * @package    Pv_Machine_Inspector_Signup
	 * @subpackage Pv_Machine_Inspector_Signup/includes
	 * @author     matthew murphy <matthew.e.murphy@phila.gov>
	 */
	class Pv_Machine_Inspector_Signup_Deactivator {


		/**
		 * Short Description. (use period)
		 *
		 * Long Description.
		 *
		 * @since 1.0.0
		 */
		public static function deactivate() {

			include_once plugin_dir_path( dirname( __FILE__ ) ) . 'setup/setup.php';

			$setup = new Pv_Machine_Inspector_Signup_Db();
			$setup->delete();
		}

	}
}
