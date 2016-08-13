<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              tanjil.im
 * @since             1.0.0
 * @package           Create_Db_Table
 *
 * @wordpress-plugin
 * Plugin Name:       Create Database Table
 * Plugin URI:        wpdbtbl.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Tanjil
 * Author URI:        tanjil.im
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       create-db-table
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-create-db-table-activator.php
 */
function activate_create_db_table() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-create-db-table-activator.php';
	Create_Db_Table_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-create-db-table-deactivator.php
 */
function deactivate_create_db_table() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-create-db-table-deactivator.php';
	Create_Db_Table_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_create_db_table' );
register_deactivation_hook( __FILE__, 'deactivate_create_db_table' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-create-db-table.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_create_db_table() {


global $wpdb;
	global $jal_db_version;

	$table_name = $wpdb->prefix . 'students';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		std_name tinytext NOT NULL,
		std_roll int(32) NOT NULL,
		std_class varchar(32) NOT NULL,
		Primary KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'jal_db_version', $jal_db_version );


	$plugin = new Create_Db_Table();
	$plugin->run();
	
}
run_create_db_table();


