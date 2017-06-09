<?php
/**
 * Shared validator class
 *
 * @link       philadelphiavotes.com
 * @since      1.0.0
 *
 * @package    Pv_Elections_Core
 * @subpackage Pv_Elections_Core/db
 * @author     matthew murphy <matthew.e.murphy@phila.gov>
 */
if ( ! class_exists('Pv_Validator') ) {
	class Pv_Validator {

		/**
		 * shim for PHP ctype_alpha()
		 *
		 * @param      string   $value  a possible alphabetic value
		 *
		 * @return     boolean  True if alphabetic, False otherwise.
		 */
		private static function is_alphabetic( $value ) {
			return ctype_alpha( $value );
		}

		/**
		 * negating shim for PHP empty()
		 *
		 * @param      string   $value  a possible non-empty value
		 *
		 * @return     boolean  True if extant, False otherwise.
		 */
		private static function is_extant( $value ) {
			return ! empty( $value );
		}

		/**
		 * shim for PHP is_numeric().
		 *
		 * @param      string   $value  a possible numeric value
		 *
		 * @return     boolean  True if numeric, False otherwise.
		 */
		private static function is_numeric( $value ) {
			return is_numeric( $value );
		}

		/**
		 * Determines if phone.
		 *
		 * @param      string   $value  a possible phone
		 *
		 * @return     boolean  True if phone, False otherwise.
		 */
		private static function is_phone( $value ) {
			// todo
			return true;
		}

		/**
		 * Determines if us state.
		 *
		 * @param      string   $value  a possible US State
		 *
		 * @return     boolean  True if us state, False otherwise.
		 */
		private static function is_us_state($value) {
			// todo
			return true;
		}

		/**
		 * Determines if us zip code.
		 *
		 * @param      string   $value  a possible zip code
		 *
		 * @return     boolean  True if us zip code, False otherwise.
		 */
		private static function is_us_zip_code($value) {
			if (strlen(trim($value)) > 10) {
				return false;
			}
		 
			if (!preg_match('/^\d{5}(\-?\d{4})?$/', $value)) {
				return false;
			}
		 
			return true;
		}

		/**
		 * Scrub whitespace (trim() plus no multiple \t|\n|\s)
		 *
		 * @param      mixed  $data   all the form data
		 *
		 * @return     mixed  a less whitespacey $data array
		 */
		public static function scrub( $data ) {
			array_walk( $data, 
				function ( &$value ) {
					$value = trim( $value );
					$value = preg_replace( '!\s+!', ' ', $value );
				}
			);

			return $data;
		}

		/**
		 * shim for WP sanitize_email()
		 *
		 * @param      string  $value  a possible email
		 *
		 * @return     string  yet another possible email
		 */
		public static function sanitize_email( $value ) {
			return sanitize_email( $value );
		}

		/**
		 * sanitize 'phone'/'fax' inputs
		 *
		 * @param      string  $value  a possible phone number
		 *
		 * @return     string  yet another possible phone
		 */
		public static function sanitize_phone( $value ) {
			// todo -- basically, strip to numbers only
			return $value;
		}

		/**
		 * shim for WP sanitize_text_field()
		 *
		 * @param      string  $value  text input value
		 *
		 * @return     string  a sanitized text input value
		 */
		public static function sanitize_text_field( $value ) {
			return sanitize_text_field( $value );
		}

	}

}