<?php
/*
 * Plugin Name: Bison Portfolio
 * Version: 1.0
 * Plugin URI: http://www.hughlashbrooke.com/
 * Description: This is your starter template for your next WordPress plugin.
 * Author: Hugh Lashbrooke
 * Author URI: http://www.hughlashbrooke.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: bison-portfolio
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-bison-portfolio.php' );
require_once( 'includes/class-bison-portfolio-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-bison-portfolio-admin-api.php' );
require_once( 'includes/lib/class-bison-portfolio-post-type.php' );
require_once( 'includes/lib/class-bison-portfolio-taxonomy.php' );

/**
 * Returns the main instance of Bison_Portfolio to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Bison_Portfolio
 */
function Bison_Portfolio () {
	$instance = Bison_Portfolio::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = Bison_Portfolio_Settings::instance( $instance );
	}

	return $instance;
}

Bison_Portfolio();