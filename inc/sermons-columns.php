<?php

/**
* Create Admin Column for featured image
*
* @since 1.0.0
* @package Selthemes
* @subpackage Sermons by Selthemes
*/

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
 exit;
}


add_filter('manage_selthemes_sermon_posts_columns', 'selt_sermon_columns_head');
add_action('manage_selthemes_sermon_posts_custom_column', 'selt_sermon_columns', 10, 2);

function selt_sermon_columns_head($defaults){
    $defaults['sermon_featured_image_preview'] = __('Thumbnail', 'selthemes'); //name of the column
    return $defaults;
}

function selt_sermon_columns($column_name, $id){
        if($column_name === 'sermon_featured_image_preview'){
        echo the_post_thumbnail( array(50,50) ); //size of the thumbnail
    }
}

?>
