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

// Includes.
require_once '../../../../wp-load.php';

$nonce = wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ), 'pvmi_admin_delete_all' );

if ( ! $nonce ) {
	die( 'Invalid request.' );
}

require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-pv-machine-inspector-signup-model-signups.php';

$model = new Pv_Machine_Inspector_Signup_Model_Signups();

$export_filename = date( 'Y-m-d' ) . '_appliants_export.csv';

header( 'Content-Type:application/csv' ); // joomla will overwrite this...
header( 'Content-Disposition:attachment;filename=' . $export_filename );

$output = fopen( 'php://output', 'w' );

fputcsv( $output,
	array(
		'Id',
		'Division',
		'FName',
		'MName',
		'LName',
		'Street Address',
		'City',
		'State',
		'Zip',
		'Phone',
		'Email',
		'Date',
	)
);

$rows = $model->get_all();
$n    = count( $rows );
$i    = 0;

foreach ( $rows as $row ) {
	$matches     = '';
	preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $row->phone, $matches );

	fputcsv( $output,
		array(
			esc_html( $row->id ),
			esc_html( $row->division ),
			esc_html( $row->first_name ),
			esc_html( $row->middle_name ),
			esc_html( $row->last_name ),
			esc_html( $row->address1 . ( $row->address2 ? ', ' . $row->address2 : '' ) ),
			esc_html( $row->city ),
			esc_html( $row->region ),
			esc_html( $row->postcode ),
			esc_html( count( $matches ) ? sprintf( '(%d) %d-%d', $matches[1], $matches[2], $matches[3] ) : '' ),
			esc_html( $row->email ),
			esc_html( $row->created ),
		)
	);
}

