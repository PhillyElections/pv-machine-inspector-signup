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

require_once dirname( dirname( __DIR__ ) ) . 'pv-elections-core-ui/db/pv-model.php';

if ( class_exists( 'Pv_Model' )) {
	d('class exists Pv_Model');
	class Pv_Model_Factory extends Pv_Model {
		public function __construct($table) {
			self::$tablename = $table;
		}

	}	
} else {
	d(dirname( dirname( __DIR__ ) ) . 'pv-elections-core-ui/db/pv-model.php');
	die('no shared model available');
}
