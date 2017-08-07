<?php
/**
 * Local instance
 *
 * @link  philadelphiavotes.com
 * @since 1.0.0
 *
 * @package    Pv_Machine_Inspector_Signup
 * @subpackage Pv_Machine_Inspector_Signup/includes
 */

// include configurator.
require_once WP_PLUGIN_DIR . '/pv-core/includes/class-pv-core-configurator.php' ;

if ( class_exists( 'Pv_Core_Configurator' ) && ! class_exists( 'Pv_Machine_Inspector_Signup_Configurator' ) ) {
	/**
	 * Signup configurator.
	 */
	class Pv_Machine_Inspector_Signup_Configurator extends Pv_Core_Configurator {

	}
}
