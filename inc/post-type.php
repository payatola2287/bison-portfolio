<?php

/** 
    Handles the creation of the custom post types of the plugin
    @var $postType | String | The post type to register into Wordpress
    @var $singular | String | The singular text for the post type
    @var $plural | String | The plural text for the post type
    @var $postSettings | Array | The set of post type configuration
**/

class Bison_PostType{
    
    private $postType, $singular,$plural,$postSettings;
    
    public function __construct( $pt, $s, $p, $ps = array() ){
        $postSettingsDefaults = array(
            'description'           => '',
            'label'                 => __( 'Post Type', 'text_domain' ),
            'description'           => __( 'Post Type Description', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'thumbnail','revisions','editor' ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,		
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'menu_icon'             => null,
            'show_in_rest'          => false
        );
        $this->postType = $pt;
        $this->singular = $s;
        $this->plural = $p;
        $this->postSettings = array_merge( $postSettingsDefaults, $ps );
        $this->hook();
    }

    /**
        Set the post type labels and register it.
    **/
    private function bison_custom_post_type() {
            
            $labels = array(
                'name'                  => _x( $this->singular, 'Post Type General Name', TEXTDOMAIN ),
                'singular_name'         => _x( $this->singular, 'Post Type Singular Name', TEXTDOMAIN ),
                'menu_name'             => __( $this->singular, TEXTDOMAIN ),
                'name_admin_bar'        => __( $this->singular, TEXTDOMAIN ),
                'archives'              => __( $this->singular.' Archives', TEXTDOMAIN ),
                'parent_item_colon'     => __( 'Parent '.$this->singular.': ', TEXTDOMAIN ),
                'all_items'             => __( 'All '.$this->plural, TEXTDOMAIN ),
                'add_new_item'          => __( 'Add New '.$this->singular, TEXTDOMAIN ),
                'add_new'               => __( 'Add New', TEXTDOMAIN ),
                'new_item'              => __( 'New Item '. $this->singular, TEXTDOMAIN ),
                'edit_item'             => __( 'Edit '. $this->singular, TEXTDOMAIN ),
                'update_item'           => __( 'Update '. $this->singular, TEXTDOMAIN ),
                'view_item'             => __( 'View '.$this->singular, TEXTDOMAIN ),
                'search_items'          => __( 'Search '.$this->singular, TEXTDOMAIN ),
                'not_found'             => __( 'Not found', TEXTDOMAIN ),
                'not_found_in_trash'    => __( 'Not found in Trash', TEXTDOMAIN ),
                'featured_image'        => __( $this->singular.' Image', TEXTDOMAIN ),
                'set_featured_image'    => __( 'Set featured image', TEXTDOMAIN ),
                'remove_featured_image' => __( 'Remove featured image', TEXTDOMAIN ),
                'use_featured_image'    => __( 'Use as featured image', TEXTDOMAIN ),
                'insert_into_item'      => __( 'Insert into item', TEXTDOMAIN ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', TEXTDOMAIN ),
                'items_list'            => __( 'Items list', TEXTDOMAIN ),
                'items_list_navigation' => __( 'Items list navigation', TEXTDOMAIN ),
                'filter_items_list'     => __( 'Filter items list', TEXTDOMAIN ),
            );
            $args = array(
                'label'                 => __( $this->singular, TEXTDOMAIN ),
                'description'           => __( $postSettings[ 'description' ], TEXTDOMAIN ),
                'labels'                => $labels,
                'supports'              => $postSettings[ 'supports' ],
                'taxonomies'            => $postSettings[ 'taxonomies' ],
                'hierarchical'          => $postSettings[ 'hierarchical' ],
                'public'                => $postSettings[ 'public' ],
                'show_ui'               => $postSettings[ 'show_ui' ],
                'show_in_menu'          => $postSettings[ 'show_in_menu' ],
                'menu_position'         => $postSettings[ 'menu_position' ],
                'show_in_admin_bar'     => $postSettings[ 'show_in_admin_bar' ],
                'show_in_nav_menus'     => $postSettings[ 'show_in_nav_menus' ],
                'can_export'            => $postSettings[ 'can_export' ],
                'has_archive'           => $postSettings[ 'has_archive' ],		
                'exclude_from_search'   => $postSettings[ 'exclude_from_search' ],
                'publicly_queryable'    => $postSettings[ 'publicly_queryable' ],
                'capability_type'       => $postSettings[ 'capability_type' ],
            );
            register_post_type( $this->postType, $args );

        }
    
        private function hook(){
            add_action( 'init', array( $this, 'bison_custom_post_type' );
        }
    
}