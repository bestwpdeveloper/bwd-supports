<?php
/**
 * Plugin Name: Test Plugin
 * Description: Test Plugin
 * Plugin URI:  https://example.com
 * Version:     1.0
 * Author:      example
 * Author URI:  https://example.com
 * Text Domain: test-plugin-td
 * Elementor tested up to: 3.0.0
 * Elementor Pro tested up to: 3.7.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
final class test_plugin_ckeck{

	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'bwdbh_init' ) );
	}

	public function bwdbh_init() {
		require_once( 'test-plugin-boots.php' );
	}
}

new test_plugin_ckeck();
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );