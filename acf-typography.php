<?php

/*
 * Plugin Name: Advanced Custom Fields: Typography Field
 * Plugin URI: https://github.com/lordealeister/acf-typography
 * Description: A Typography Add-on for the Advanced Custom Fields Plugin.
 * Version: 3.0.0
 * Author: Lorde Aleister
 * Author URI: https://github.com/lordealeister
 * Text Domain: acf-typography
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

// exit if accessed directly
if(!defined('ABSPATH'))
	exit;

// check if class already exists
if(!class_exists('ACFPluginTypography')):
	class ACFPluginTypography {
				
		/**
		 * __construct This function will setup the class functionality
		 *
		 * @return void
		 */
		function __construct() {
			// vars
			$this->settings = array(
				'version'	=> '3.0.0',
				'url'		=> plugin_dir_url(__FILE__),
				'path'		=> plugin_dir_path(__FILE__)
			);
			
			// include files
			require plugin_dir_path(__FILE__) . 'includes/api-template.php';

			// include field
			add_action('acf/include_field_types', array($this, 'fieldTypes')); // v5
			add_action('acf/register_fields', array($this, 'fieldTypes')); // v4
			add_action('acf/field_group/admin_enqueue_scripts', array($this, 'adminEnqueueScripts'));
			
			add_action('plugins_loaded', array($this, 'loadPluginTextdomain'));
		}
				
		/**
		 * fieldTypes This function will include the field type class
		 *
		 * @param  int $version major ACF version. Defaults to false
		 * @return void
		 */
		function fieldTypes($version = false) {
			// support empty $version
			if(!$version) 
				$version = 4;
			
			// include
			include_once('fields/acf-Typography-v' . $version . '.php');
		}
		
		/**
		 * adminEnqueueScripts This function enqueue scripts on admin dashboard
		 *
		 * @return void
		 */
		function adminEnqueueScripts() {
			wp_enqueue_script('acf-typography-fieldgroup-script', plugin_dir_url(__FILE__) . 'assets/js/admin-field-group.js', array(), $this->settings['version']);
		}
		
		/**
		 * loadPluginTextdomain This function load textdomain for localization
		 *
		 * @return void
		 */
		function loadPluginTextdomain() {
			load_plugin_textdomain('acf-typography', FALSE, basename(dirname(__FILE__ )) . '/languages/');
		}
		
	}

	// initialize
	new ACFPluginTypography();

// class_exists check
endif;
