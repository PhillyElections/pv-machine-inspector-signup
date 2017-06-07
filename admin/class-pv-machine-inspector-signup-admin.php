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
 */
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
	 * The admin form actions of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      mixed
	 */
	private $models;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles( ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run( ) function
		 * defined in Pv_Machine_Inspector_Signup_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pv_Machine_Inspector_Signup_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pv-machine-inspector-signup-admin.css', array( ), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts( ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run( ) function
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
    public function add_plugin_admin_child_menu()
    {

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         */
        add_menu_page(__('Phillyvotes', $this->plugin_name),'Phillyvotes','manage_options','phillyvotes', array($this, 'display_candidates_admin_page'));
        add_submenu_page('phillyvotes',__('Machine Inspector Signup', $this->plugin_name), 'Machine Inspectors', 'manage_options', $this->plugin_name, array($this, 'display_plugin_manage_display_page')
        );
    }

    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */
    public function display_plugin_manage_display_page()
    {
        include_once('partials/pv-machine-inspector-signup-admin-display.php');
    }


	public function add( ) {
		$this->get_models( 'pv_mi_signups' );
		dd('ADD');
	}

	public function config( ) {
		dd('CONFIG');
	}

	public function update( ) {
		dd('UPDATE');
	}

	public function get_models( $tablename ) {
		d('get_models', $tablename);
		require_once dirname( dirname( __FILE__ ) ) . '/db/pv-model-factory.php';

	}
}
