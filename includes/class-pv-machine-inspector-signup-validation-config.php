<?php
/**
 * Shared validator class
 *
 * @link  philadelphiavotes.com
 * @since 1.0.0
 *
 * @package    Pv_Elections_Core
 * @subpackage Pv_Elections_Core/db
 * @author     matthew murphy <matthew.e.murphy@phila.gov>
 */

// Include validation.
require_once WP_PLUGIN_DIR . '/pv-core/includes/class-pv-core-validation.php' ;

if ( class_exists( 'Pv_Core_Validation' ) && ! class_exists( 'Pv_Machine_Inspector_Signup_Validation_Config' ) ) {
	/**
	 * Local validation instance (aka validator)
	 */
	class Pv_Machine_Inspector_Signup_Validation_Config extends Pv_Core_Validation {


		/**
		 * Processing rules for this field set
		 *
		 * @var array
		 */
		protected $processing = array(
			'api_key' => array(
				'label' => 'API Key',
				'required' => true,
				'sanitize' => array( 'sanitize_key' ),
				'validate' => '',
			),
			'page_limit' => array(
				'label' => 'Page Limit',
				'required' => true,
				'sanitize' => array( 'sanitize_text_field' ),
				'validate' => array( 'is_numeric' ),
			),
		);

		/**
		 * Is this table's data scrubbable?
		 *
		 * @var boolean
		 */
		protected $scrubbable = false;

	}
}
