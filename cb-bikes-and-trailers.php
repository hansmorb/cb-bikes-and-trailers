<?php
/**
 * Plugin Name:     CB Bikes And Trailers
 * Plugin URI:      https://github.com/hansmorb/cb-bikes-and-trailers
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          hansmorb
 * Author URI:      https://profiles.wordpress.org/hansmorb/
 * Text Domain:     cb-bikes-and-trailers
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Cb_Bikes_And_Trailers
 */

namespace CBBikesAndTrailers;

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

define( 'CB_BIKES_AND_TRAILERS_VERSION', '0.1.0' );
define( 'CB_BIKES_AND_TRAILERS_PATH', __DIR__ );
define( 'CB_BIKES_AND_TRAILERS_URL', plugins_url( '', __FILE__ ) );
define ('CB_BIKES_AND_TRAILERS_PLUGIN_FILE', __FILE__ );

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

class CBBikesAndTrailers {

	public static function plugins_loaded() {
		load_plugin_textdomain(
			'cb-bikes-and-trailers',
			false,
			basename( CB_BIKES_AND_TRAILERS_PATH ) . '/languages'
		);
		$plugin = Plugin::init();
	}

	public static function activation_hooks() {
		register_activation_hook( CB_BIKES_AND_TRAILERS_PLUGIN_FILE, array( Plugin::class, 'activate' ) );
		register_deactivation_hook( CB_BIKES_AND_TRAILERS_PLUGIN_FILE, array( Plugin::class, 'deactivate' ) );
	}
}

add_action(
	'plugins_loaded',
	function () {
		CBBikesAndTrailers::plugins_loaded();
	}
);

CBBikesAndTrailers::activation_hooks();
