<?php

	namespace Tourbillon_Labs\Simple_Widget_Title_Links\UI;

	/**
	 * The public-facing functionality of the plugin.
	 *
	 * @link       https://www.tourbillonlabs.com
	 * @since      1.0.0
	 * @package    Tourbillon_Labs\Simple_Widget_Title_Links\UI
	 * @author     Tourbillon Labs <hello@tourbillonlabs.com>
	 */
	class Frontend {

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string $plugin_name The ID of this plugin.
		 */
		private $plugin_name;

		/**
		 * The version of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string $version The current version of this plugin.
		 */
		private $version;

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 *
		 * @param    string $plugin_name The name of the plugin.
		 * @param    string $version The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {
			$this->plugin_name = $plugin_name;
			$this->version     = $version;
		}

		/**
		 * Output decoded widget title.
		 *
		 * @since    1.0.0
		 *
		 * @param    string $title
		 * @param    array $instance
		 *
		 * @return   string
		 */
		public static function decode_widget_title( $title, $instance = null ) {
			if ( $instance && ! empty( $instance['url'] ) ) {
				$title = sprintf(
					'<a href="%s"%s%s>%s</a>',
					esc_url( $instance['url'] ),
					$instance['blank'] === 'on' || (function_exists('boolval') && boolval($instance['blank']) ) ? ' target="_blank"' : '',
					$instance['nofollow'] === 'on' || (function_exists('boolval') && boolval($instance['nofollow']) ) ? ' rel="nofollow"' : '',
					esc_html( $title )
				);
			}

			return html_entity_decode( $title );
		}

	}
