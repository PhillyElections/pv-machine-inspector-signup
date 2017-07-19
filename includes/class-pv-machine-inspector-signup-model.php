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

			$address_lookup = $this->get_address_lookup();
			$address_lookup->set_data( $data );

			$data['division'] = $address_lookup->get_division();
			$data['postcode'] = $address_lookup->get_postcode();

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

			$address_lookup = $this->get_address_lookup();
			$address_lookup->set_data( $data );

			$data['division'] = $address_lookup->get_division();
			$data['postcode'] = $address_lookup->get_postcode();

			return parent::update( $data, $where );
		}

		/**
		 * Gets address lookup.
		 *
		 * @return     mixed  Address Lookup.
		 */
		private function get_address_lookup() {

			if ( ! $this->address_lookup ) {
				// include division-lookup.
				require_once WP_PLUGIN_DIR . '/pv-core/shared/class-pv-core-address-lookup.php';
				$this->address_lookup = new Pv_Core_Address_Lookup();
			}

			return $this->address_lookup;
		}
	}
}
