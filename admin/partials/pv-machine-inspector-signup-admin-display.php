<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       philadelphiavotes.com
 * @since      1.0.0
 *
 * @package    Pv_Machine_Inspector_Signup
 * @subpackage Pv_Machine_Inspector_Signup/admin/partials
 */

$action = '';

// Grab option values if already set.
$options = get_option( $this->plugin_name );

// options.
$o_lock_deactivate = $options['lock_deactivate'];
$o_admin_footer_text  = $options['admin_footer_text'];

/*
* Set up hidden fields
*
*/
settings_fields( $this->plugin_name );
do_settings_sections( $this->plugin_name );

?>
<div class="wrap">
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<h2 class="nav-tab-wrapper">
		<?php if ( isset( $_REQUEST['action'] )  && 'edit' === $_REQUEST['action'] ) :
			$action = 'edit';
		?>
		<a href="#pvmi-edit" class="nav-tab nav-tab-active"><?php esc_html_e( 'Edit', $this->plugin_name );?></a>
		<?php
		require_once 'pv-machine-inspector-signup-admin-edit.php' ;
		else : ?>
		<a href="#pvmi-list" class="nav-tab nav-tab-active"><?php esc_html_e( 'List', $this->plugin_name );?></a>
		<a href="#pvmi-add" class="nav-tab"><?php esc_html_e( 'Add', $this->plugin_name );?></a>
		<a href="#pvmi-config" class="nav-tab"><?php esc_html_e( 'Config', $this->plugin_name );?></a>
		<?php
		require_once 'pv-machine-inspector-signup-admin-list.php' ;
		require_once 'pv-machine-inspector-signup-admin-add.php' ;
		require_once 'pv-machine-inspector-signup-admin-config.php' ;
		endif; ?>
	</h2>
</div>
