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

require_once( plugin_dir_path . '/inc/post-type.php' );
if( ! class_exists( 'Bison_Portfolio' ) ){
    
    class Bison_Portfolio{
        /** 
            Plugin Hooks
        **/
        public function __construct(){}
        
        /** 
            Plugin activation
        **/
        public static activate(){
            /**
                Register Post Types
            **/
            $project = new Bison_PostType( 'project','Project','Projects',array() );
        }
        /**
            Plugin deactivation
        **/
        
    }
    
}