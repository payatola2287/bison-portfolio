<?php
class Bison_Portfolio_Tax{
    private $singular, $plural, $tax, $taxSettings,$postTypes;
    
    public function __construct($t,$s,$p,$ts = array(),$pt = array()){
        $this->tax = $t;
        $this->singular = $s;
        $this->plural = $p;
        $this->$taxSettings = $ts;
        
        $this->postTypes = !empty($pt) ? $pt: array( $t ) ;        
        $this->hook();
    }
    
    
    // Register Custom Taxonomy
    function custom_taxonomy() {

        $labels = array(
            'name'                       => _x( $this->plural, 'Taxonomy General Name', TEXTDOMAIN ),
            'singular_name'              => _x( $this->singular, 'Taxonomy Singular Name', TEXTDOMAIN ),
            'menu_name'                  => __( $this->plural, TEXTDOMAIN ),
            'all_items'                  => __( 'All '. $this->plural, TEXTDOMAIN ),
            'parent_item'                => __( 'Parent '.$this->singular, TEXTDOMAIN ),
            'parent_item_colon'          => __( 'Parent '.$this->singular.":", TEXTDOMAIN ),
            'new_item_name'              => __( 'New '.$this->singular.' Name', TEXTDOMAIN ),
            'add_new_item'               => __( 'Add New '.$this->singular, TEXTDOMAIN ),
            'edit_item'                  => __( 'Edit '.$this->singular, TEXTDOMAIN ),
            'update_item'                => __( 'Update '.$this->singular, TEXTDOMAIN ),
            'view_item'                  => __( 'View '.$this->singular, TEXTDOMAIN ),
            'separate_items_with_commas' => __( 'Separate items with commas', TEXTDOMAIN ),
            'add_or_remove_items'        => __( 'Add or remove items', TEXTDOMAIN ),
            'choose_from_most_used'      => __( 'Choose from the most used', TEXTDOMAIN ),
            'popular_items'              => __( 'Popular Items', TEXTDOMAIN ),
            'search_items'               => __( 'Search Items', TEXTDOMAIN ),
            'not_found'                  => __( 'Not Found', TEXTDOMAIN ),
            'no_terms'                   => __( 'No items', TEXTDOMAIN ),
            'items_list'                 => __( 'Items list', TEXTDOMAIN ),
            'items_list_navigation'      => __( 'Items list navigation', TEXTDOMAIN ),
        );
        
        $this->taxSettings['labels'] = $labels;
        register_taxonomy( $this->tax, $this->postTypes, $this->$taxSettings );

    }
   
    private function hook(){
        add_action( 'init', array( $this,'custom_taxonomy' ) );
    }
}