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

// include model.
require_once WP_PLUGIN_DIR . '/pv-core/shared/class-pv-core-model.php' ;

if ( class_exists( 'Pv_Core_Model' ) && ! class_exists( 'Pv_Machine_Inspector_Signup_Model' ) ) {
	/**
	 * Local Signup model
	 */
	class Pv_Machine_Inspector_Signup_Model extends Pv_Core_Model {
		/**
		 * Constructor override
		 */
		public function __construct() {
			parent::__construct();
			$this->tablename = 'pv_machine_inspector_signups';
		}


		/**
		 * Insert a row
		 *
		 * @param      mixed $data   The data.
		 */
		public function insert( &$data ) {
			// include division-lookup.
			require_once WP_PLUGIN_DIR . '/pv-core/shared/class-pv-core-address-lookup.php';
			$address_lookup = new Pv_Core_Address_Lookup( $data );

			$data['division'] = $address_lookup->get_division();

			return parent::insert( $data );
		}

		/**
		 * Update a row
		 *
		 * @param      mixed $data   The data.
		 * @param      array $where  The where.
		 *
		 * @return     bool  result of the update query.
		 */
		public function update( &$data, $where = null ) {
			// include division-lookup.
			require_once WP_PLUGIN_DIR . '/pv-core/shared/class-pv-core-address-lookup.php';
			$address_lookup = new Pv_Core_Address_Lookup( $data );

			$data['division'] = $address_lookup->get_division();

			return parent::update( $data, $where );
		}
	}
}
