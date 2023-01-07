<?php

	namespace Tourbillon_Labs\Simple_Widget_Title_Links;

	/**
	 * The core plugin class.
	 *
	 * This is used to define admin-specific hooks, and public-facing site hooks.
	 *
	 * Also maintains the unique identifier of this plugin as well as the current
	 * version of the plugin.
	 *
	 * @since      1.0.0
	 * @package    Tourbillon_Labs\Simple_Widget_Title_Links
	 * @author     Tourbillon Labs <hello@tourbillonlabs.com>
	 */
	class Init {

		/**
		 * The loader that's responsible for maintaining and registering all hooks that power
		 * the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      Utils\Loader $loader Maintains and registers all hooks for the plugin.
		 */
		protected $loader;

		/**
		 * The unique identifier of this plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string $plugin_name The string used to uniquely identify this plugin.
		 */
		protected $plugin_name;

		/**
		 * The current version of the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string $version The current version of the plugin.
		 */
		protected $version;

		/**
		 * Define the core functionality of the plugin.
		 *
		 * Set the plugin name and the plugin version that can be used throughout the plugin.
		 * Load the dependencies, and set the hooks for the admin area and the public-facing
		 * side of the site.
		 *
		 * @since    1.0.0
		 */
		public function __construct() {
			if ( defined( __NAMESPACE__ . '\\VERSION' ) ) {
				$this->version = namespace\VERSION;
			} else {
				$this->version = '1.0.0';
			}
			$this->plugin_name = 'tl-simple-widget-title-links';

			$this->load_dependencies();
			$this->define_admin_hooks();
			$this->define_frontend_hooks();
		}

		/**
		 * Load the required dependencies for this plugin.
		 *
		 * Include the following files that make up the plugin:
		 *
		 * - Utils\Loader. Orchestrates the hooks of the plugin.
		 *
		 * Create an instance of the loader which will be used to register the hooks
		 * with WordPress.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function load_dependencies() {
			$this->loader = new Utils\Loader();
		}

		/**
		 * Register all of the hooks related to the admin area functionality
		 * of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function define_admin_hooks() {
			$this->loader->add_filter(
				'in_widget_form',
				'Tourbillon_Labs\Simple_Widget_Title_Links\UI\Admin',
				'extend_widget_form',
				10,
				3
			);
			$this->loader->add_filter(
				'widget_update_callback',
				'Tourbillon_Labs\Simple_Widget_Title_Links\UI\Admin',
				'save_widget_options',
				10,
				2
			);
		}

		/**
		 * Register all of the hooks related to the public-facing functionality
		 * of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function define_frontend_hooks() {
			$this->loader->add_filter(
				'widget_title',
				'Tourbillon_Labs\Simple_Widget_Title_Links\UI\Frontend',
				'decode_widget_title',
				10,
				3
			);
		}

		/**
		 * Run the loader to execute all of the hooks with WordPress.
		 *
		 * @since    1.0.0
		 */
		public function run() {
			$this->loader->run();
		}

		/**
		 * The name of the plugin used to uniquely identify it within the context of
		 * WordPress and to define internationalization functionality.
		 *
		 * @since     1.0.0
		 * @return    string    The name of the plugin.
		 */
		public function get_plugin_name() {
			return $this->plugin_name;
		}

		/**
		 * The reference to the class that orchestrates the hooks with the plugin.
		 *
		 * @since     1.0.0
		 * @return    Utils\Loader    Orchestrates the hooks of the plugin.
		 */
		public function get_loader() {
			return $this->loader;
		}

		/**
		 * Retrieve the version number of the plugin.
		 *
		 * @since     1.0.0
		 * @return    string    The version number of the plugin.
		 */
		public function get_version() {
			return $this->version;
		}

	}
