<?php
/**
 * Plugin Name: TheUx Slider
 * Description: Premium open source slider.
 * Plugin URI: http://wordpress.org/plugins/theux-slider
 * Author: Daniel Zilli
 * Author URI: http://theux.co
 * License: GPLv2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * Version: 1.0.0
 * Text Domain: tus
 * Domain Path: /assets/lang
 *
 * TheUx Slider is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * TheUx Slider is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * @package   TUS
 * @author    Daniel Zilli
 * @version   1.0.0
 */


/**
 * If this file is called directly, abort it.
 */
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Load the helper library.
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/cuztom/cuztom.php');


/**
 * Administration.
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/admin.php' );


/**
 * Adds function to load slideshow within theme.
 */
function theux_slider( $slideshow = '' ) {
	require_once( plugin_dir_path( __FILE__ ) . 'includes/public.php' );
}


/**
 * Plugin class.
 */
if ( !class_exists('TheUx_Slider') ) {

	class TheUx_Slider {

		/**
		 * Plugin version, used for cache-busting of style and script file references.
		 */
		protected $version = '1.0.0';


		/**
		 * Used as the text domain when internationalizing strings of text. It should
		 * match the Text Domain file header in the main plugin file.
		 */
		protected $plugin_slug = 'tus';


		/**
		 * Initialize the plugin by setting localization, filters, and shortcode functions.
		 */
		public function __construct() {

			/* Load plugin text domain. */
			add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

			/* Load admin style sheet. */
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );

			/* Load public style sheet and javacripts. */
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

			/* Shortcode */
			add_shortcode( 'theux_slider', array( $this, 'tus_shortcode' ) );
		}


		/**
		 * Load plugin text domain for translation.
		 */
		public function load_plugin_textdomain() {

			$domain = $this->plugin_slug;
			$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

			load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
			load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/assets/lang/' );
		}


		/**
		 * Enqueue admin-specific style sheet.
		 */
		public function enqueue_admin_styles($hook) {

			/* Only load the css on the necessary pages */
			if( $hook != 'edit.php' && $hook != 'edit-tags.php' && $hook != 'post-new.php' ) {
				return;
			}

			wp_enqueue_style( $this->plugin_slug .'-admin-styles', plugins_url( 'assets/css/admin.css', __FILE__ ), array(), $this->version );
		}
		

		/**
		 * Enqueue public style sheet.
		 */
		public function enqueue_styles() {
			wp_enqueue_style( $this->plugin_slug . '-plugin-styles', plugins_url( 'assets/css/public.css', __FILE__ ), array(), $this->version );
		}


		/**
		 * Enqueue and register public JavaScript files.
		 */
		public function enqueue_scripts() {
			wp_enqueue_script( $this->plugin_slug . '-slider-script', plugins_url( 'assets/js/jquery.fractionslider.min.js', __FILE__ ), array( 'jquery' ), '0.9.9.9');
			wp_register_script ( $this->plugin_slug . '-public-script', plugins_url( 'assets/js/public.js', __FILE__ ), array( 'tus-slider-script' ), $this->version, TRUE);
		}


		/**
		 * Define the shortcode and its respective default values.
		 */
		public function tus_shortcode($atts) {

			$data = shortcode_atts ( 
				array(
					'slideshow' 			=> '',
					'controls' 				=> TRUE,
					'pager'					=> FALSE,
					'autochange'			=> FALSE,					
					'pauseonhover'			=> FALSE,
					'slideendanimation' 	=> FALSE,
		   			'backgroundanimation'	=> FALSE, 
		            'backgroundx' 			=> '500', 
		            'backgroundy' 			=> '500', 
		            'backgroundspeed' 		=> '2500', 
		            'backgroundease'		=> 'easeOutCubic',
					'fullwidth' 			=> FALSE,
					'responsive' 			=> TRUE,
					'dimensions' 			=> '',
					'increase'				=> FALSE,
				), 
				$atts 
			);
			
			$slideshow_att = $data['slideshow'];
			ob_start();
			theux_slider( $slideshow = $slideshow_att );	
			$theux_slider_content = ob_get_clean();
			
			wp_enqueue_script ( $this->plugin_slug . '-public-script');
			wp_localize_script( $this->plugin_slug . '-public-script', 'tusparams', $data );

			return $theux_slider_content;
		}

	} // End of TheUx_Slider class.


	/**
	 * Initialise the plugin.
	 */
	new TheUx_Slider();


} // End if class_exists check.
