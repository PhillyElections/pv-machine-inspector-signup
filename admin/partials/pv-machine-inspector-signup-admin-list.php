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

// load paginator.
require_once WP_PLUGIN_DIR . '/pv-core/helpers/pv-core-paginator-helper.php';
$paginator = new Pv_Core_Paginator_Helper( $this->model->get_pagination() );

?>
<div id="pvmi-list" class="wrap metabox-holder columns-8 pvmi-metaboxes <?php echo ( 'edit' === $action ) ? 'hidden' : ''; ?>">
	<table>
		<thead>
			<tr>
				<th>
					<?php esc_html_e( 'Id', $this->plugin_name );?>
				</th>
				<th>
					<?php esc_html_e( 'Division', $this->plugin_name );?>
				</th>
				<th>
					<?php esc_html_e( 'Name', $this->plugin_name );?>
				</th>
				<th>
					<?php esc_html_e( 'Phone', $this->plugin_name );?>
				</th>
				<th>
					<?php esc_html_e( 'Email', $this->plugin_name );?>
				</th>
				<th>
					<?php esc_html_e( 'Street Address', $this->plugin_name );?>
				</th>
				<th>
					<?php esc_html_e( 'Zip', $this->plugin_name );?>
				</th>
				<th>
					<?php esc_html_e( 'Date', $this->plugin_name );?>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$rows = $this->list( );
		$n = count( $rows );
		$i = 0;

		foreach ( $rows as $row ) :
			$i++;
			$link      = admin_url( 'admin.php?page=' . $this->plugin_name . '&action=edit&item=' . $row->id );
			$base_post = admin_url( 'admin_post.php' );
			$fullname  = $row->first_name . ' ' . ( $row->middle_name ? $row->middle_name . ' ' : '' ) . $row->last_name;
			$matches   = '';
			preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $row->phone, $matches );
		?>
			<tr>
				<td>
					<?php echo esc_html( $row->id );?>
				</td>
				<td>
					<?php echo esc_html( $row->division );?>
				</td>
				<td>
					<form class="validate" method="post" name="machine_inspector_add" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
						<input name="action" value="pvmi_admin_delete" type="hidden">
						<input name="item" value="<?php echo esc_attr( $row->id );?>" type="hidden">
						<button value="submit">X</button>
					</form> 
				</td>
				<td>
					<a href="<?php echo esc_attr( $link );?>"><?php echo esc_html( $fullname );?></a>
				</td>
				<td>
					<?php echo esc_html( count( $matches ) ? sprintf( '(%d) %d-%d', $matches[1], $matches[2], $matches[3] ) : '' );?>
				</td>
				<td>
					<?php echo esc_html( $row->email );?>
				</td>
				<td>
					<?php echo esc_html( $row->address1 . ( $row->address2 ? ', ' . $row->address2 : '' ) );?>
				</td>
				<td>
					<?php echo esc_html( $row->postcode );?>
				</td>
				<td>
					<?php echo esc_html( $row->created );?>
				</td>
			</tr>
		<?php
		endforeach;
		?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="8"><?php echo esc_html( $paginator->get_list_footer() ); ?></td>
			</tr>
		</tfoot>
	</table>
</div>
