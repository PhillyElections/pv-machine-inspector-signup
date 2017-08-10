<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link  philadelphiavotes.com
 * @since 1.0.0
 *
 * @package    Pv_Machine_Inspector_Signup
 * @subpackage Pv_Machine_Inspector_Signup/admin/partials
 */

// Grab option values if already set.
$options = get_option( $this->plugin_name );


?>
<div class="wrap">
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<?php
	if ( isset( $_REQUEST['action'] ) && 'edit' === $_REQUEST['action'] ) {
		$action = 'edit';
	?>
	<h2 class="nav-tab-wrapper">
		<a href="#pv-edit" class="nav-tab nav-tab-active"><?php esc_html_e( 'Edit', $this->plugin_name ); ?></a>
	</h2>
	<?php
		include_once 'pv-machine-inspector-signup-admin-edit.php' ;
	} else {
		$action = '';
	?>
	<h2 class="nav-tab-wrapper">
		<a href="#pv-list" class="nav-tab nav-tab-active"><?php esc_html_e( 'List', $this->plugin_name ); ?></a>
		<a href="#pv-add" class="nav-tab"><?php esc_html_e( 'Add', $this->plugin_name ); ?></a>
	</h2>
	<?php
		include_once 'pv-machine-inspector-signup-admin-list.php' ;
		include_once 'pv-machine-inspector-signup-admin-add.php' ;
	}
	?>
</div>
