<?php

namespace CBBikesAndTrailers;

/**
 * The main class of the plugin.
 */
class Plugin {

	/**
	 * The single instance of the class.
	 *
	 * @var \CBBikesAndTrailers\Plugin|null
	 */
	private static ?Plugin $instance = null;

	/**
	 * Init all the things.
	 */
	public static function init() {
		$plugin = self::get_instance();
		add_action( 'admin_init', array( self::class, 'check_dependencies' ) );
	}

	/**
	 * Return the instance.
	 * Make sure that the instance is created only once.
	 *
	 * @return \CBBikesAndTrailers\Plugin
	 */
	public static function get_instance(): Plugin {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * The actions to be performed on plugin activation.
	 *
	 * @return void
	 */
	public static function activate() {
		self::check_dependencies();
	}

	/**
	 * The actions to be performed on plugin deactivation.
	 *
	 * @return void
	 */
	public static function deactivate() {
		// Run plugin deactivation code here.
	}

	/**
	 * Check if all dependencies are met.
	 * Disables the plugin if they are not met.
	 *
	 * @return void
	 */
	public static function check_dependencies() {
		if ( ! self::is_cb_installed() ) {
			deactivate_plugins( CB_BIKES_AND_TRAILERS_PLUGIN_FILE );
			wp_die( esc_html__( 'CommonsBooking is required for CB Bikes and Trailers to work.', 'cb-bikes-and-trailers' ) );
		}
	}

	/**
	 * Will determine if the CommonsBooking plugin is installed.
	 * This plugin will not work without CommonsBooking.
	 *
	 * @return bool
	 */
	public static function is_cb_installed(): bool {
		if ( defined( 'COMMONSBOOKING_VERSION' ) ) {
			return true;
		}
		return false;
	}
}
