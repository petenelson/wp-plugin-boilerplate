<?php
/*
Plugin Name: Plugin Name
Description: Plugin Description
Author: Pete Nelson
Version: 1.0.0
*/

$files = array(
	'includes/class-plugin-name-common.php',
	'includes/class-plugin-name.php',
	'admin/class-plugin-name-admin.php',
);

$classes = array(
	'My_Plugin_Name_Common',
	'My_Plugin_Name',
	'My_Plugin_Name_Admin',
);

// include classes
foreach ( $files as $file ) {
	require_once plugin_dir_path( __FILE__ ) . $file;
}

// instantiate classes and hook into WordPress
foreach ( $classes as $class ) {
	if ( class_exists( $class ) ) {
		$plugin = new $class();
		add_action( 'plugins_loaded', array( $plugin, 'plugins_loaded' ) );
	}
}
