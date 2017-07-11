<?php
/**
 * The admin-specific functionality of the plugin.
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
 **/
class Pv_Machine_Inspector_Signup_Admin {

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
	 * The messaging object.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      mixed
	 */
	private $messaging;

	/**
	 * The .
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      mixed
	 */
	private $model;

	/**
	 * The admin form actions of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      mixed
	 */
	private $validator;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		// we always need our model.
		$this->get_model();
		$this->get_messaging();
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pv_Machine_Inspector_Signup_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pv_Machine_Inspector_Signup_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pv-machine-inspector-signup-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pv_Machine_Inspector_Signup_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pv_Machine_Inspector_Signup_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pv-machine-inspector-signup-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_child_menu() {

		if ( isset( $GLOBALS['admin_page_hooks']['phillyvotes'] ) ) {
			// parent exists.  write just a child menu.
			add_submenu_page( 'phillyvotes', __( 'Machine Inspector Signup', $this->plugin_name ), 'Machine Inspectors', 'manage_options', $this->plugin_name, array( $this, 'display_plugin_manage_display_page' )
			);
		} else {
			// woops.  no parent.  wire parent and child to display page.
			add_menu_page( __( 'Machine Inspectors', $this->plugin_name ),'Phillyvotes','manage_options','phillyvotes', array( $this, 'display_plugin_manage_display_page' ) );
			add_submenu_page( 'phillyvotes', __( 'Machine Inspector Signup', $this->plugin_name ), 'Machine Inspectors', 'manage_options', $this->plugin_name, array( $this, 'display_plugin_manage_display_page' ) );
		}
	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_manage_display_page() {
		include_once( 'partials/pv-machine-inspector-signup-admin-display.php' );
	}

	/**
	 * Load up messaging
	 *
	 * @return void
	 */
	private function get_messaging() {

		if ( ! $this->messaging ) {

			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-pv-machine-inspector-signup-messaging.php';

			$this->messaging = new Pv_Machine_Inspector_Signup_Messaging();
		}
	}

	/**
	 * Load up a model
	 *
	 * @return void
	 */
	private function get_model() {

		if ( ! $this->model ) {

			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-pv-machine-inspector-signup-model.php';

			$this->model = new Pv_Machine_Inspector_Signup_Model();
		}

	}

	/**
	 * Load up a validator
	 *
	 * @return void
	 */
	private function get_validator() {

		if ( ! $this->validator ) {

			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-pv-machine-inspector-signup-validation.php';

			$this->validator = new Pv_Machine_Inspector_Signup_Validation();
		}
	}

	// processing actions.
	/**
	 * Create a record
	 */
	public function create() {

		$this->get_validator();

	}

	/**
	 * List records
	 */
	public function list() {
		return $this->model->get_paged();
	}

	/**
	 * Read a record
	 */
	public function read() {
		if ( isset( $_REQUEST['item'] ) && $item = ( int ) $_REQUEST['item'] ) {
			return $this->model->get_row( $item );
		}
	}

	/**
	 * Update a record
	 */
	public function update() {

		$this->get_validator();

		if ( ! $this->model->update( $_REQUEST ) ) {
			$status = 'failure';
			$message = 'Something went wrong.';
		} else {
			$status = 'success';
			$message = 'Changes saved.';
		}

		wp_redirect( admin_url( 'admin.php?page=' . $this->plugin_name . '&pvstatus=' . urlencode( $status ) . 'pvmessage=' . urlencode( $message ) ) );

	}

	/**
	 * Delete a record
	 */
	public function delete() {
		return $this->model->delete();
	}

	/**
	 * Write Configuration
	 */
	public function get_config() {

	}

	/**
	 * Write Configuration
	 */
	public function set_config() {

	}
}
