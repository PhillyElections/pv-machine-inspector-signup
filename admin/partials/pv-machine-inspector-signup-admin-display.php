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

// * Grab option values if already set
$options = get_option($this->plugin_name);
   
// options
$o_lock_deactivate = $options['lock_deactivate'];
$o_admin_footer_text  = $options['admin_footer_text'];

/*
* Set up hidden fields
*
*/
settings_fields($this->plugin_name);
do_settings_sections($this->plugin_name);


?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <h2 class="nav-tab-wrapper">
        <a href="#pvmi-list" class="nav-tab <?php echo ($post->action === 'edit') ? '' : 'nav-tab-active'; ?>"><?php _e('List', $this->plugin_name);?></a>
        <a href="#pvmi-add" class="nav-tab"><?php _e('Add', $this->plugin_name);?></a>
        <?php if ($post->action === 'edit') : ?>
        <a href="#pvmi-edit" class="nav-tab nav-tab-active"><?php _e('Edit', $this->plugin_name);?></a>
        <?php endif; ?>
        <a href="#pvmi-config" class="nav-tab"><?php _e('Config', $this->plugin_name);?></a>
    </h2>

    <?php
    // Include tabs partials
    require_once('pv-machine-inspector-signup-admin-list.php');
    require_once('pv-machine-inspector-signup-admin-add.php');
    if ($post->action === 'edit') {
        require_once('pv-machine-inspector-signup-admin-edit.php');
    }
    require_once('pv-machine-inspector-signup-admin-config.php');
    ?>

</div>