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

?>
<div id="pv-config" class="wrap metabox-holder columns-2 pv-metaboxes hidden">
	<h2><?php esc_attr_e( 'Configure', $this->plugin_name ); ?></h2>
	<form method="post" name="machine_inspector_config" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
		<table class="form-table">
			<tbody>
				<tr class="form-field form-required">
					<th scope="row"><label for="first_name"><?php esc_html_e( 'Address API Key', $this->plugin_name ); ?><span class="description"> (required)</span></label></th>
					<td><input required id="pvmi_api_key" name="pvmi_api_key" type="text" value="<?php echo esc_attr( $config->pvmi_api_key ); ?>"></td>
				</tr>
				<tr class="form-field form-required">
					<th scope="row"><label for="first_name"><?php esc_html_e( 'Address API Key', $this->plugin_name ); ?><span class="description"> (required)</span></label></th>
					<td><input required id="pvmi_page_limit" name="pvmi_page_limit" type="text" value="<?php echo esc_attr( $config->pvmi_page_limit ); ?>"></td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input name="action" value="pvmi_admin_config" type="hidden">
	<?php wp_nonce_field( 'pvmi_admin_config', 'pvmi_admin_config_nonce' ); ?>
	<?php submit_button( __( 'Save Config', $this->plugin_name ), 'primary', 'submit', true ); ?>
		</p>
	</form>
</div>
