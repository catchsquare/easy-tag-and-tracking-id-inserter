<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Easy Tag and Tracking Id Inserter
 * Plugin URI:        https://github.com/catchsquare/easy-tag-and-tracking-id-inserter
 * Description:       Add tracking and verification script on your WordPress site with ease. Place your ids and content tags in *Easy Tags and Tracking Id Inserter* to get verified.
 * Version:           1.0.0
 * Author:            catchsquare
 * Author URI:        https://catchsquare.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       easy-tag-and-tracking-id-inserter
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'EASY_TAG_AND_TRACKING_ID_INSERTER_VERSION', '1.0.0' );

define('EASY_TAG_AND_TRACKING_ID_INSERTER_NAME', 'Easy Tag and Tracking Id Inserter');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-easy-tag-and-tracking-id-inserter-activator.php
 */
function activate_easy_tag_and_tracking_id_inserter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-tag-and-tracking-id-inserter-activator.php';
	Easy_Tag_And_Tracking_Id_Inserter_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-easy-tag-and-tracking-id-inserter-deactivator.php
 */
function deactivate_easy_tag_and_tracking_id_inserter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-tag-and-tracking-id-inserter-deactivator.php';
	Easy_Tag_And_Tracking_Id_Inserter_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_easy_tag_and_tracking_id_inserter' );
register_deactivation_hook( __FILE__, 'deactivate_easy_tag_and_tracking_id_inserter' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-easy-tag-and-tracking-id-inserter.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_easy_tag_and_tracking_id_inserter() {

	$plugin = new Easy_Tag_And_Tracking_Id_Inserter();
	$plugin->run();

}
run_easy_tag_and_tracking_id_inserter();

