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
<div id="pvmi-list" class="wrap metabox-holder columns-8 pvmi-metaboxes <?php echo ( $action === 'edit' ) ? 'hidden' : ''; ?>">
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
        $rows = $this->models['pv_mi_signups']->get_paged( );
        $n=count( $rows );
        $i = 0;

        foreach ( $rows as $row ) :
            $i++;
            $link     = admin_url( "admin.php?page=" . $this->plugin_name . "&action=edit&item=" . $row->id );
            $fullname = $row->first_name . " " . ( $row->middle_name ? $row->middle_name . " " : "" ) . $row->last_name;
            $matches  = '';
            preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $row->phone, $matches );
        ?>
            <tr>
                <td>
                    <?php echo $row->id;?>
                </td>
                <td>
                    <?php echo $row->division;?>
                </td>
                <td>
                    <a href="<?php echo $link;?>"><?php echo $fullname;?></a>
                </td>
                <td>
                    <?php echo count( $matches ) ? sprintf( "(%d) %d-%d", $matches[1], $matches[2], $matches[3] ) : '';?>
                </td>
                <td>
                    <?php echo $row->email;?>
                </td>
                <td>
                    <?php echo $row->address1 . ( $row->address2 ? ', ' . $row->address2 : '' );?>
                </td>
                <td>
                    <?php echo $row->postcode;?>
                </td>
                <td>
                    <?php echo $row->created;?>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8"><?php //echo $this->pagination->getListFooter( ); ?></td>
            </tr>
        </tfoot>
    </table>
</div>
