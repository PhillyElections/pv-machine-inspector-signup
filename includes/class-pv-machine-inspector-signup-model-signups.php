<?php
/**
 * Specific DB model
 *
 * @link  philadelphiavotes.com
 * @since 1.0.0
 *
 * @package    Pv_Machine_Inspector_Signup
 * @subpackage Pv_Machine_Inspector_Signup/Db
 * @author     matthew murphy <matthew.e.murphy@phila.gov>
 */

// include model.
require_once WP_PLUGIN_DIR . '/pv-core/includes/class-pv-core-model.php' ;

if ( class_exists( 'Pv_Core_Model' ) && ! class_exists( 'Pv_Machine_Inspector_Signup_Model_Signups' ) ) {
	/**
	 * Local Signup model
	 */
	class Pv_Machine_Inspector_Signup_Model_Signups extends Pv_Core_Model {

		/**
		 * Address lookup object
		 *
		 * @var mixed $address_lookup
		 */
		private $address_lookup;

		/**
		 * Constructor override
		 *
		 * @param mixed $config plugin configuration.
		 */
		public function __construct( $config ) {
			parent::__construct( $config );
			$this->tablename = 'pv_machine_inspector_signups';
		}

		/**
		 * Insert a row
		 *
		 * @param mixed $data The data.
		 */
		public function insert( &$data ) {

			$this->get_address_lookup();

			$this->address_lookup->set_data( $data );

			$data['division'] = $this->address_lookup->get_division();
			$data['postcode'] = $this->address_lookup->get_postcode();

			return parent::insert( $data );
		}

		/**
		 * Update a row
		 *
		 * @param mixed $data  The data.
		 * @param array $where The where.
		 *
		 * @return bool  result of the update query.
		 */
		public function update( &$data, $where = null ) {

			$this->get_address_lookup();

			$this->address_lookup->set_data( $data );

			$data['division'] = $this->address_lookup->get_division();
			$data['postcode'] = $this->address_lookup->get_postcode();

			return parent::update( $data, $where );
		}

		/**
		 * Gets address lookup.
		 *
		 * @return mixed  Address Lookup.
		 */
		private function get_address_lookup() {

			if ( ! $this->address_lookup ) {
				// include division-lookup.
				include_once WP_PLUGIN_DIR . '/pv-core/includes/class-pv-core-address-lookup.php';
				$this->address_lookup = new Pv_Core_Address_Lookup( $this->config );
			}
		}

	}

}
