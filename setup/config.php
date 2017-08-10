<?php
/**
 * The manage database install and update.
 *
 * @link  philadelphiavotes.com
 * @since 1.0.0
 *
 * @package    Pv_Machine_Inspector_Signup
 * @subpackage Pv_Machine_Inspector_Signup/admin
 */

if ( ! class_exists( 'Pv_Machine_Inspector_Signup_Config' ) ) {

	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * Defines the plugin name, version, and two examples hooks for how to
	 * enqueue the admin-specific stylesheet and JavaScript.
	 *
	 * @package    Pv_Machine_Inspector_Signup
	 * @subpackage Pv_Machine_Inspector_Signup/admin
	 * @author     matthew murphy <matthew.e.murphy@phila.gov>
	 */
	class Pv_Machine_Inspector_Signup_Config {

		/**
		 * The ID of this plugin.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    string    $plugin_name    The ID of this plugin.
		 */
		public $config;

		/**
		 * The ID of this plugin.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    string    $plugin_name    The ID of this plugin.
		 */
		public $plugin_name;

		/**
		 * The version of this plugin.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    string    $version    The current version of this plugin.
		 */
		public $version;

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			$this->plugin_name = 'pv-machine-inspector-signup';
			$this->version = '1.0.0';
			$this->config->page_limit = 15;
			$this->config->api_key = '';
		}

	}

}
