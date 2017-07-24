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

if ( ! headers_sent() ) {
	foreach ( headers_list() as $header ) {
		header_remove( $header );
	}
}

$export_filename = date( 'Y-m-d' ) . '_appliants_export.csv';

header( 'Content-type: application/csv' );
header( 'Content-Disposition: attachment; filename="' . $csv_filename . '"' );
header( 'Pragma: public' );
header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' ); // Date in the past.
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
header( 'Cache-Control', 'no-store, no-cache, must-revalidate' ); // HTTP/1.1.
header( 'Cache-Control: pre-check=0, post-check=0, max-age=0' ); // HTTP/1.1.
header( 'Pragma: no-cache' );
header( 'Expires: 0' );
header( 'Content-Transfer-Encoding: none' );
header( 'Content-Type: application/csv' ); // joomla will overwrite this...
header( 'Content-Disposition: attachment; filename="' . $export_filename . '"' );

ob_end_flush();

$output = fopen( 'php://output', 'w' );

fputcsv( $output,
	array(
		esc_html_e( 'Id', $this->plugin_name ),
		esc_html_e( 'Division', $this->plugin_name ),
		esc_html_e( 'Name', $this->plugin_name ),
		esc_html_e( 'Street Address', $this->plugin_name ),
		esc_html_e( 'City', $this->plugin_name ),
		esc_html_e( 'State', $this->plugin_name ),
		esc_html_e( 'Zip', $this->plugin_name ),
		esc_html_e( 'Phone', $this->plugin_name ),
		esc_html_e( 'Email', $this->plugin_name ),
		esc_html_e( 'Date', $this->plugin_name ),
	)
);

$rows = $this->list();
$n = count( $rows );
$i = 0;

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
