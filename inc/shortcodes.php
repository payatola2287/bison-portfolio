<?php
class Bison_Shortcodes{
    
    public function __construct(){
        add_shortcode( 'full_portfolio_list',array($this,'full_list') );        
        add_shortcode( 'individual_portfolio',array($this,'individual') );
    }
    
    public function full_list( $shortcodeAtts ){
        $defaults = array(
            'menu' => true,
            'project_number' => 5,
            'container_class' => '',
            'orientation' => 'grid',
            'id' => ''
        );
        $settings = shortcode_atts( $defaults , $shortcodeAtts );
        
        ob_start();
        
        include '\..\templates\full_list.php';
        
        return ob_get_clean();
    }
    
    public function individual( $shortcodeAtts ){
        if( $shortcodeAtts['id'] < 1 || $shortcodeAtts['id'] == '' || $shortcodeAtts['id'] == null  ){
            return; 
        }
        ob_start();
        
        include '../templates/individual.php';
        
        return ob_get_clean();
    }
    
}