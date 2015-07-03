<?php
/*
Plugin Name: wp-plugin-boilerplate
Description: Description
Author: Pete Nelson
Version: 1.0.0
*/

$includes = array(
	'includes/class-plugin-name-common.php',
	'includes/class-plugin-name-i18n.php',
	'includes/class-plugin-name.php',
	'admin/class-plugin-name-admin.php',
);

$classes = array(
	'My_Plugin_Name_Common',
	'My_Plugin_Name_i18n',
	'My_Plugin_Name',
	'My_Plugin_Name_Admin',
);


// activation hook
register_activation_hook( __FILE__, function() {
	require_once 'includes/class-plugin-name-activator.php';
	My_Plugin_Name_Activator::activate();
} );

// include classes
foreach ( $includes as $include ) {
	require_once plugin_dir_path( __FILE__ ) . $include;
}

// instantiate classes and hook into WordPress
foreach ( $classes as $class ) {
	if ( class_exists( $class ) ) {
		$plugin = new $class();
		add_action( 'plugins_loaded', array( $plugin, 'plugins_loaded' ) );
	}
}
