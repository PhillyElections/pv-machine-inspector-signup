<?php
/**
 * Shared abstract DB Model
 *
 * @link       philadelphiavotes.com
 * @since      1.0.0
 *
 * @package    Pv_Elections_Core
 * @subpackage Pv_Elections_Core/db
 * @author     matthew murphy <matthew.e.murphy@phila.gov>
 */
class Pv_Model {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    The PK of this plugin.
     */
    private $primary_key = 'id';

    /**
     * The tablename
     *
     * @since    1.0.0
     * @access   private
     * @var      string    The name of the instanced table
     */
    private $tablename;

    /**
     * The database object
     *
     * @since    1.0.0
     * @access   private
     * @var      mixed     The WBDB object.
     */
    private $db;

    /**
     * The pagination array
     *
     * @since    1.0.0
     * @access   private
     * @var      mixed     start / stop
     */
    private $pagination;

    public function __construct() {
        global $wpdb;
        d($wpdb);
        $this->db = &$wpdb;

        $this->pagination['start'] = isset($_REQUEST('start')) ? (int) $_REQUEST('start') : 0 ;
        $this->pagination['end'] = isset($_REQUEST('end')) ? (int) $_REQUEST('end') : 20 ;
    }

    private function _table() {
        return $this->db->prefix . $this->tablename;
    }

    private function _fetch_row( $value ) {
        $sql = sprintf( 'SELECT * FROM %s WHERE %s = %%s', $this->_table(), $this->primary_key );
        return $this->db->prepare( $sql, $value );
    }

    private function _fetch_rows( ) {
        $sql = sprintf( 'SELECT * FROM %s ', $this->_table());
        return $this->db->prepare( $sql );
    }

    private function _fetch_paged_rows( ) {
        $sql = sprintf( 'SELECT * FROM %s LIMIT %%s = %%s', $this->_table());
        return $this->db->prepare( $sql, $this->start, $this->$end );
    }

    public function get_row( $value ) {
        return $this->db->get_row( $this->_fetch_sql( $value ) );
    }

    public function get_tablename( ) {
        return $this->tablename;
    }

    public function insert( $data ) {
        $this->db->insert( $this->_table(), $data );
    }

    public function update( $data, $where ) {
        $this->db->update( $this->_table(), $data, $where );
    }

    public function delete( $value ) {
        $sql = sprintf( 'DELETE FROM %s WHERE %s = %%s', $this->_table(), $this->primary_key );
        return $this->db->query( $this->db->prepare( $sql, $value ) );
    }

    public function insert_id() {
        return $this->db->insert_id;
    }

    public function time_to_date( $time ) {
        return gmdate( 'Y-m-d H:i:s', $time );
    }

    public function now() {
        return $this->time_to_date( time() );
    }

    public function date_to_time( $date ) {
        return strtotime( $date . ' GMT' );
    }

}