<?php
/**
 * Plugin Name: Genesis Testimonial Slider
 * Plugin URI: http://wpstud.io/plugins
 * Description: The Genesis Testimonials Slider is a simple-to-use plugin for adding Testimonials to your Genesis Theme, using a shortcode or a widget.
 * Version: 1.6
 * Author: Frank Schrijvers, WPStudio
 * Author URI: http://www.wpstud.io
 * Text Domain: wpstudio-testimonial-slider
 * License: GPLv2
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once ABSPATH . 'wp-admin/includes/plugin.php';

add_action( 'init', 'wpstudio_load_gts_textdomain' );
/**
 * Callback on the `plugins_loaded` hook.
 * Loads the plugin text domain via load_plugin_textdomain()
 *
 * @uses load_plugin_textdomain()
 * @since 1.0.0
 *
 * @access public
 * @return void
 */
function wpstudio_load_gts_textdomain() {
	load_plugin_textdomain( 'wpstudio-testimonial-slider', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * Enqueue scripts and styles.
 */
function wpstudio_gts_load_scripts() {

	wp_enqueue_script( 'gts-lighslider', plugin_dir_url( __FILE__ ) . 'assets/js/lightslider.min.js', array( 'jquery' ) );
	wp_enqueue_style( 'lightslider-style', plugin_dir_url( __FILE__ ) . 'assets/css/lightslider.css', array() );
	wp_enqueue_style( 'gts-style', plugin_dir_url( __FILE__ ) . 'assets/css/gts-style.css', array() );

}

add_action( 'wp_enqueue_scripts', 'wpstudio_gts_load_scripts', 99 );

/**
 * Load required files.
 */
function wpstudio_gts_init() {

		require dirname( __FILE__ ) . '/inc/gts-admin.php';
		include dirname( __FILE__ ) . '/inc/gts-company.php';
		include dirname( __FILE__ ) . '/inc/gts-rating.php';
		include dirname( __FILE__ ) . '/inc/gts-cpt.php';
		include dirname( __FILE__ ) . '/inc/gts-widget.php';
		include dirname( __FILE__ ) . '/inc/gts-shortcode.php';
		new WPSTUDIO_gts_Settings();

}

add_action( 'genesis_setup', 'wpstudio_gts_init' );

// Image size for testimonial thumb.
add_image_size( 'gts-thumbnail', 100, 100, true );

/**
 * Init Lighslider Params.
 */
function gts_params() {

	$gts_autoplay = 'true';
	$gts_controls = 'true';
	$gts_column   = '2';
	$gts_pause    = 'true';
	$gts_effect   = 'slide';
	$gts_loop     = 'true';

	if ( ! function_exists( 'genesis_get_option' ) ) {
		return;
	}

	if ( genesis_get_option( 'gts_speed', 'gts-settings' ) ) {
		$gts_speed = genesis_get_option( 'gts_speed', 'gts-settings' );
	} else {
		$gts_speed = '6000';
	}

	if ( genesis_get_option( 'gts_autoplay', 'gts-settings' ) === 'yes' ) {
		$gts_autoplay = 'true';
	} else {
		$gts_autoplay = 'false';
	}

	if ( genesis_get_option( 'gts_controls', 'gts-settings' ) === 'yes' ) {
		$gts_controls = 'true';
	} else {
		$gts_controls = 'false';
	}

	if ( genesis_get_option( 'gts_column', 'gts-settings' ) === 'one' ) {
		$gts_column = '1';
	}

	if ( genesis_get_option( 'gts_column', 'gts-settings' ) === 'two' ) {
		$gts_column = '2';
	}

	if ( genesis_get_option( 'gts_column', 'gts-settings' ) === 'three' ) {
		$gts_column = '3';
	}

	if ( genesis_get_option( 'gts_effect', 'gts-settings' ) === 'fade' ) {
		$gts_effect = 'fade';
	} else {
		$gts_effect = 'slide';
	}

	if ( genesis_get_option( 'gts_pause', 'gts-settings' ) === 'yes' ) {
		$gts_pause = 'true';
	} else {
		$gts_pause = 'false';
	}

	if ( genesis_get_option( 'gts_loop', 'gts-settings' ) === 'yes' ) {
		$gts_loop = 'true';
	} else {
		$gts_loop = 'false';
	}

	$output = 'jQuery( document ).ready(function() {
                    jQuery( ".testimonials-list" ).lightSlider( {
						auto:           ' . $gts_autoplay . ',
                        controls:       ' . $gts_controls . ',
						item:           ' . $gts_column . ',
                        mode:           \'' . $gts_effect . '\',
                        pauseOnHover:   ' . $gts_pause . ',
                        loop:           ' . $gts_loop . ',
						pause:          ' . $gts_speed . ',
						responsive : [
						    {
						        breakpoint:1023,
						        settings: {
						            item:2
						        }
						    },
						    {
						        breakpoint:860,
						        settings: {
						            item:1
						        }
						    }
						]
					} );
				} );';

	$output = str_replace( array( "\n", "\t", "\r" ), '', $output );

	echo '<script type=\'text/javascript\'>' . $output . '</script>';

}

add_action( 'wp_footer', 'gts_params' );
