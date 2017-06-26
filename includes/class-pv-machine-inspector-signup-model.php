<?php
/**
 * Specific DB model
 *
 * @link       philadelphiavotes.com
 * @since      1.0.0
 *
 * @package    Pv_Machine_Inspector_Signup
 * @subpackage Pv_Machine_Inspector_Signup/Db
 * @author     matthew murphy <matthew.e.murphy@phila.gov>
 */

require_once WP_PLUGIN_DIR . '/pv-core/shared/class-pv-core-model.php';

if ( class_exists( 'Pv_Core_Model' ) && ! class_exists( 'Pv_Machine_Inspector_Signup_Model' ) ) {
	class Pv_Machine_Inspector_Signup_Model extends Pv_Core_Model {
		public function __construct( ) {
			parent::__construct();
			$this->tablename = 'pv_machine_inspector_signups';
			$this->validation = '';
		}

		public function update( $data , $where = null) {
			// run validation routine
			// -- we'll get data from the validation routine

			// run update
			parent::update( $data );
		}
	}	
}