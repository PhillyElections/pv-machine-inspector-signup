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
$model = $this->models['pv_mi_signups'];
d($this, $model);
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="pvmi-list" class="wrap metabox-holder columns-8 pvmi-metaboxes">
    <table>
        <thead>
            <tr>
                <th>
                    <?php _e( 'Id', $this->plugin_name );?>
                </th>
                <th>
                    <?php _e( 'Division', $this->plugin_name );?>
                </th>
                <th>
                    <?php _e( 'Name', $this->plugin_name );?>
                </th>
                <th>
                    <?php _e( 'Phone', $this->plugin_name );?>
                </th>
                <th>
                    <?php _e( 'Email', $this->plugin_name );?>
                </th>
                <th>
                    <?php _e( 'Street Address', $this->plugin_name );?>
                </th>
                <th>
                    <?php _e( 'Zip', $this->plugin_name );?>
                </th>
                <th>
                    <?php _e( 'Date', $this->plugin_name );?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            $items = array();
            array_push($items, (object) array('id'=>'1','division'=>'1201','first_name'=>'Some','middle_name'=>'','last_name'=>'Guy','phone'=>'3332221111','email'=>'some@guy.com', 'address1'=>'100 some st', 'address2'=>'', 'postcode'=>'11111', 'created'=>'2017-04-30 12:00:00'));
            $n=count($items);
            $k = 0;
        for ($i = 0; $i < $n; $i++) {
            $row      = $items[0];
            $link     = "";
            $fullname = $row->first_name . " " . ($row->middle_name ? $row->middle_name . " " : "") . $row->last_name;
            $matches  = '';
            preg_match('/^(\d{3})(\d{3})(\d{4})$/', $row->phone, $matches);
        ?>
        <tr>
        <td>
            <?=$row->id;?>
        </td>
        <td>
            <?=$row->division;?>
        </td>
        <td>
            <a href="<?=$link;?>"><?=$fullname;?></a>
        </td>
        <td>
            <?=count($matches) ? sprintf("(%d) %d-%d", $matches[1], $matches[2], $matches[3]) : '';?>
        </td>
        <td>
            <?=$row->email;?>
        </td>
        <td>
            <?=$row->address1 . ($row->address2 ? ' ' . $row->address2 : '');?>
        </td>
        <td>
            <?=$row->postcode;?>
        </td>
        <td>
            <?=$row->created;?>
        </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8"><?php //echo $this->pagination->getListFooter(); ?></td>
            </tr>
        </tfoot>
    </table>
</div>
