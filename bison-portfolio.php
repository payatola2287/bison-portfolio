<?php
/*
 * Plugin Name: Bison Portfolio
 * Version: 1.0
 * Plugin URI: https://github.com/payatola2287/bison-portfolio
 * Description: Plugin for displaying your portfolio projects
 * Author: Paolo Gallardo
 * Author URI: http://www.paologallardo.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: bison-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'TEXTDOMAIN','bison-portfolio' );

require_once( 'inc/post-type.php' );
require_once( 'inc/taxonomy.php' );
require_once( 'inc/shortcodes.php' );
require_once( 'inc/extra.php' );


if( ! class_exists( 'Bison_Portfolio' ) ){
    
    class Bison_Portfolio{
        public function __construct(){
            /** 
                Post types
            **/
            $project = new Bison_PostType( 'project','Project','Projects' );
            /** 
                Shortcodes
            **/
            $shortcodes = new Bison_Shortcodes();
        }
        
        /** 
            Plugin activation
        **/
        public static function activate(){}
        /**
            Plugin deactivation
        **/
        public static function deactivate(){
        
        }
        
        
        
    }
    register_activation_hook(__FILE__, array('Bison_Portfolio', 'activate'));
    register_deactivation_hook(__FILE__, array('Bison_Portfolio', 'deactivate'));
    new Bison_Portfolio();
}