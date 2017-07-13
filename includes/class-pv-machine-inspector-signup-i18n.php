<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       philadelphiavotes.com
 * @since      1.0.0
 *
 * @package    Pv_Machine_Inspector_Signup
 * @subpackage Pv_Machine_Inspector_Signup/includes
 */

if ( ! class_exists( 'Pv_Machine_Inspector_Signup_i18n' ) ) {
	/**
	 * Define the internationalization functionality.
	 *
	 * Loads and defines the internationalization files for this plugin
	 * so that it is ready for translation.
	 *
	 * @since      1.0.0
	 * @package    Pv_Machine_Inspector_Signup
	 * @subpackage Pv_Machine_Inspector_Signup/includes
	 * @author     matthew murphy <matthew.e.murphy@phila.gov>
	 */
	class Pv_Machine_Inspector_Signup_i18n {


		/**
		 * Load the plugin text domain for translation.
		 *
		 * @since    1.0.0
		 */
		public function load_plugin_textdomain() {

			load_plugin_textdomain(
				'pv-machine-inspector-signup',
				false,
				dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
			);
		}
	}
}
