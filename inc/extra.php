<?php
function project_categories_string( $project_id ){
    
    $cats = get_the_category( $project_id );
    
    $return = array();

    foreach( $cats as $cat ){
        $return[] = strtolower($cat->name);
    }
    
    return implode( ' ',$return );

}