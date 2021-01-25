<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Easy_Tag_And_Tracking_Id_Inserter
 * @subpackage Easy_Tag_And_Tracking_Id_Inserter/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Easy_Tag_And_Tracking_Id_Inserter
 * @subpackage Easy_Tag_And_Tracking_Id_Inserter/includes
 * @author     catchsquare <wearecatchsquare@gmail.com>
 */
class Easy_Tag_And_Tracking_Id_Inserter_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'easy-tag-and-tracking-id-inserter',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
