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
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="pvmi-config" class="wrap metabox-holder columns-2 pvmi-metaboxes hidden">
	<h2><?php esc_attr_e('Configure', $this->plugin_name); ?></h2>
    <form method="post" name="machine_inspector_config" action="">
        <p class="submit">
            <?php submit_button(__('Save Changes', $this->plugin_name), 'primary', 'submit', true); ?>
        </p>
    </form>
</div>