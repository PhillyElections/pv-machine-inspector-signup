<?php
/**
 * The manage database install and update.
 *
 * @link       philadelphiavotes.com
 * @since      1.0.0
 *
 * @package    Pv_Machine_Inspector_Signup
 * @subpackage Pv_Machine_Inspector_Signup/admin
 */

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
class Pv_Machine_Inspector_Signup_Db {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $config ) {

		$this->plugin_name = $config->plugin_name;
		$this->version = $config->version;

	}

	public static function create() {

		$current_db_version = get_option( $this->plugin_name . '_db_version' );
		if ( ! $current_db_version ) {
			// This is a fresh install
			// Perform any databases modifications related to plugin activation here, if necessary

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

			add_option( $this->plugin_name . '_db_version', $this->version );

			global $wpdb;

			$table_name = $wpdb->prefix . 'pv_machine_inspector_signups';
			$sql = "DROP TABLE IF EXISTS `$table_name` ";

			$wpdb->query( $sql );

			$schema = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'schema.sql';
			$data = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'data.sql';

			if ( $sql = file_get_contents( $schema ) ) {
				dbDelta( str_replace( '[[db_prefix]]', $wpdb->prefix, $sql ) );
			}
			if ( $sql = file_get_contents( $data ) ) {
				dbDelta( str_replace( '[[db_prefix]]', $wpdb->prefix, $sql ) );
			}

			return true;

		} else if ( $current_db_version !== $this->version ) {

			return $this->update();

		}

		return false;
	}

	public static function delete() {

		global $wpdb;

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		delete_option( $this->plugin_name . '_db_version', $this->version );
		$table_name = $wpdb->prefix . 'pv_machine_inspector_signups';
		$sql = "DROP TABLE IF EXISTS `$table_name` ";

		$wpdb->query( $sql );

		return true;
	}

	public static function update() {

		global $wpdb;

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		$update = plugin_dir_path( __FILE__ ) . 'update.sql';

		if ( $sql = file_get_contents( $update ) ) {
			dbDelta( str_replace( '[[db_prefix]]', $wpdb->prefix, $sql ) );
		}

		return true;
	}
}
