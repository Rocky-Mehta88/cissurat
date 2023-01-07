<?php

	namespace Tourbillon_Labs\Simple_Widget_Title_Links;

	/**
	 * @link              https://www.tourbillonlabs.com
	 * @since             1.0.0
	 * @package           Tourbillon_Labs\Simple_Widget_Title_Links
	 *
	 * @wordpress-plugin
	 * Plugin Name:       Simple Widget Title Links
	 * Plugin URI:        https://www.tourbillonlabs.com/products/simple-widget-title-links/
	 * Description:       Provides link support for widget titles without the need for markup or code.
	 * Version:           1.0.3
	 * Author:            Tourbillon Labs
	 * Author URI:        https://www.tourbillonlabs.com/
	 * License:           GPL-2.0+
	 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
	 * Text Domain:       tl-simple-widget-title-links
	 * Domain Path:       /languages
	 */

	// If this file is called directly, abort.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}

	/**
	 * Current plugin version.
	 */
	define( __NAMESPACE__ . '\\VERSION', '1.0.0' );

	if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
		require( __DIR__ . '/vendor/autoload.php' );
	}

	/**
	 * Load Plugin Text Domain.
	 *
	 * @since    1.0.0
	 */
	function tl_ew_load_plugin_textdomain() {
		load_plugin_textdomain(
			'tl-simple-widget-title-links',
			false,
			plugin_basename( __FILE__ ) . '/languages/'
		);
	}

	add_action( 'load_plugin_textdomain', 'tl_ew_load_plugin_textdomain' );

	/**
	 * Begins execution of the plugin.
	 *
	 * @since    1.0.0
	 */
	function tl_ew_run() {
		$plugin = new Init();
		$plugin->run();
	}

	tl_ew_run();
