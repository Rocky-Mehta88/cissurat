<?php

	namespace Tourbillon_Labs\Simple_Widget_Title_Links\UI;

	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * @link       https://www.tourbillonlabs.com
	 * @since      1.0.0
	 * @package    Tourbillon_Labs\Simple_Widget_Title_Links\UI
	 * @author     Tourbillon Labs <hello@tourbillonlabs.com>
	 */
	class Admin {

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
		 * @param    string $plugin_name The name of this plugin.
		 * @param    string $version The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {
			$this->plugin_name = $plugin_name;
			$this->version     = $version;
		}

		/**
		 * Build target=_blank checkbox
		 *
		 * @since      1.0.0
		 *
		 * @param      \WP_Widget $widget
		 * @param      array $instance
		 *
		 * @return     string
		 */
		public static function add_blank_target_field( $widget, $instance ) {
			$id    = $widget->get_field_id( 'blank' );
			$name  = $widget->get_field_name( 'blank' );
			$label = __( 'Open in new window/tab', 'tl-simple-widget-title-links' );

			$openBlank = $instance['blank'] === 'on' || (function_exists('boolval') && boolval($instance['blank']) ) ? 'checked' : '';
			$input     = <<<ENDINPUT
    <input type="checkbox" name="{$name}" id="{$id}" $openBlank />
    <label for="{$id}">{$label}</label>
ENDINPUT;

			return sprintf( '<p>%s</p>', $input );
		}

		/**
		 * Build target=_nofollow checkbox
		 *
		 * @since      1.0.0
		 *
		 * @param      \WP_Widget $widget
		 * @param      array $instance
		 *
		 * @return     string
		 */
		public static function add_nofollow_field( $widget, $instance ) {
			$id    = $widget->get_field_id( 'nofollow' );
			$name  = $widget->get_field_name( 'nofollow' );
			$label = __( 'rel="nofollow"', 'tl-simple-widget-title-links' );

			$noFollow = $instance['nofollow'] === 'on' || (function_exists('boolval') && boolval($instance['nofollow']) ) ? 'checked' : '';
			$input    = <<<ENDINPUT
    <input type="checkbox" name="{$name}" id="{$id}" $noFollow />
    <label for="{$id}">{$label}</label>
ENDINPUT;

			return sprintf( '<p>%s</p>', $input );
		}

		/**
		 * Build title link field
		 *
		 * @since      1.0.0
		 *
		 * @param      \WP_Widget $widget
		 * @param      array $instance
		 *
		 * @return     string
		 */
		public static function add_title_link_field( $widget, $instance ) {
			$id    = $widget->get_field_id( 'url' );
			$name  = $widget->get_field_name( 'url' );
			$label = __( 'Title Link:', 'tl-simple-widget-title-links' );

			$url   = isset( $instance['url'] ) ? esc_url( $instance['url'] ) : '';
			$input = <<<ENDINPUT
    <label for="{$id}">{$label}</label>
    <input type="text" name="{$name}" id="{$id}" value="{$url}" class="widefat" />
ENDINPUT;

			return sprintf( '<p>%s</p>', $input );
		}

		/**
		 * Register the stylesheets for the admin area.
		 *
		 * @since      1.0.0
		 *
		 * @param      \WP_Widget $widget
		 * @param      mixed $return
		 * @param      array $instance
		 *
		 * @return     array
		 */
		public static function extend_widget_form( $widget, $return, $instance ) {
			echo "<hr />\n";
			echo self::add_title_link_field( $widget, $instance );
			echo self::add_blank_target_field( $widget, $instance );
			echo self::add_nofollow_field( $widget, $instance );

			return $return;
		}

		/**
		 * Save widget options.
		 *
		 * @param      array $instance
		 * @param      array $new_instance
		 *
		 * @return     mixed
		 */
		public static function save_widget_options( $instance, $new_instance ) {
			if ( isset( $new_instance['url'] ) && ! empty( $new_instance['url'] ) ) {
                $url = trim(strip_tags(stripslashes($new_instance['url'])));
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $instance['url'] = $url;
			}
			$instance['blank'] = isset( $new_instance['blank'] );
			$instance['nofollow'] = isset( $new_instance['nofollow'] );

			return $instance;
		}

	}
