<?php
/**
 * Shared abstract DB Model
 *
 * @link       philadelphiavotes.com
 * @since      1.0.0
 *
 * @package    Pv_Machine_Inspector_Signup
 * @subpackage Pv_Machine_Inspector_Signup/Db
 * @author     matthew murphy <matthew.e.murphy@phila.gov>
 */

require_once plugin_dir_path( __FILE__ ) . 'pv-model.php';

if ( class_exists( 'Pv_Model' )) {
	d( 'class exists Pv_Model' );
	class Pv_Model_Factory extends Pv_Model {
		public function __construct($table, $fields) {
			self::$tablename = $table;
			self::$fields = $fields;
		}

	}	
} 