<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link	   philadelphiavotes.com
 * @since	  1.0.0
 *
 * @package	Pv_Machine_Inspector_Signup
 * @subpackage Pv_Machine_Inspector_Signup/admin/partials
 */

?>
<div id="pvmi-edit" class="wrap metabox-holder columns-2 pvmi-metaboxes">
	<h2><?php esc_attr_e( 'Edit a Machine Inspector Signup', $this->plugin_name ); ?></h2>
	<form class="validate" method="post" name="machine_inspector_edit" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
		<table class="form-table">
			<tbody>
				<tr class="form-field form-required">
					<th scope="row"><label for="first_name"><?php _e( 'First Name', $this->plugin_name ); ?><span class="description"> (required)</span></label></th>
					<td><input id="first_name" name="first_name" type="text" value=""></td>
				</tr>
				<tr class="form-field">
					<th scope="row"><label for="middle_name"><?php _e( 'Middle Name', $this->plugin_name ); ?> <span class="description"></span></label></th>
					<td><input id="middle_name" name="middle_name" type="text" value=""></td>
				</tr>
				<tr class="form-field form-required">
					<th scope="row"><label for="last_name"><?php _e( 'Last Name', $this->plugin_name ); ?><span class="description"> (required)</span></label></th>
					<td><input id="last_name" name="last_name" type="text" value=""></td>
				</tr>
				<tr class="form-field form-required">
					<th scope="row"><label for="address1"><?php _e( 'Address', $this->plugin_name ); ?><span class="description"> (required)</span></label></th>
					<td><input id="address1" name="address1" type="text" value=""></td>
				</tr>
				<tr class="form-field">
					<th scope="row"><label for="address2"><?php _e( '(Continued)', $this->plugin_name ); ?> <span class="description"></span></label></th>
					<td><input id="address2" name="address2" type="text" value=""></td>
				</tr>
				<tr class="form-field form-required">
					<th scope="row"><label for="city"><?php _e( 'City', $this->plugin_name ); ?><span class="description"> (required)</span></label></th>
					<td><input id="city" name="city" type="text" value=""></td>
				</tr>
				<tr class="form-field form-required">
					<th scope="row"><label for="postcode"><?php _e( 'Zip', $this->plugin_name ); ?><span class="description"> (required)</span></label></th>
					<td><input id="postcode" name="postcode" type="text" value=""></td>
				</tr>
				<tr class="form-field">
					<th scope="row"><label for="email"><?php _e( 'Email', $this->plugin_name ); ?> <span class="description"></span></label></th>
					<td><input id="email" name="email" type="email" value=""></td>
				</tr>
				<tr class="form-field form-required">
					<th scope="row"><label for="phone"><?php _e( 'Phone', $this->plugin_name ); ?><span class="description"> (required)</span></label></th>
					<td><input id="phone" name="phone" type="text" value=""></td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input name="action" value="pvmi_admin_update" type="hidden">
			<?php submit_button( __( 'Save', $this->plugin_name ), 'primary', 'submit', true ); ?>
		</p>
	</form>
</div>
