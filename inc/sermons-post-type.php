<?php
/**
* Create Sermon custom post type.
*
* @since 1.0.0
* @package Selthemes
* @subpackage Sermons by Selthemes
*/

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}


if ( ! function_exists('selthemes_church_sermon_post_type') ) {


// Register Custom Post Type
function selthemes_church_sermon_post_type() {

	$labels = array(
		'name'                  => __( 'Sermons', 'Post Type General Name', 'selthemes' ),
		'singular_name'         => __( 'Sermon', 'Post Type Singular Name', 'selthemes' ),
		'menu_name'             => __( 'Sermons', 'selthemes' ),
		'name_admin_bar'        => __( 'Sermon', 'selthemes' ),
		'archives'              => __( 'Sermon Archives', 'selthemes' ),
		'attributes'            => __( 'Sermon Attributes', 'selthemes' ),
		'parent_item_colon'     => __( 'Parent Sermon:', 'selthemes' ),
		'all_items'             => __( 'All Sermons', 'selthemes' ),
		'add_new_item'          => __( 'Add New Sermon', 'selthemes' ),
		'add_new'               => __( 'Add New Sermon', 'selthemes' ),
		'new_item'              => __( 'New Sermon', 'selthemes' ),
		'edit_item'             => __( 'Edit Sermon', 'selthemes' ),
		'update_item'           => __( 'Update Sermon', 'selthemes' ),
		'view_item'             => __( 'View Sermon', 'selthemes' ),
		'view_items'            => __( 'View Sermons', 'selthemes' ),
		'search_items'          => __( 'Search Sermon', 'selthemes' ),
		'not_found'             => __( 'Sermon Not found', 'selthemes' ),
		'not_found_in_trash'    => __( 'Sermon Not found in Trash', 'selthemes' ),
		'featured_image'        => __( 'Sermon Featured Image', 'selthemes' ),
		'set_featured_image'    => __( 'Set sermon featured image', 'selthemes' ),
		'remove_featured_image' => __( 'Remove sermon featured image', 'selthemes' ),
		'use_featured_image'    => __( 'Use as sermon featured image', 'selthemes' ),
		'insert_into_item'      => __( 'Insert into sermon', 'selthemes' ),
		'uploaded_to_this_item' => __( 'Uploaded to this sermon', 'selthemes' ),
		'items_list'            => __( 'Sermons list', 'selthemes' ),
		'items_list_navigation' => __( 'Sermons list navigation', 'selthemes' ),
		'filter_items_list'     => __( 'Filter Sermons list', 'selthemes' ),
	);
	$rewrite = array(
		'slug'                  => 'sermon',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Sermon', 'selthemes' ),
		'description'           => __( 'Display sermons posts for Selthemes\'s Church Themes', 'selthemes' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', ),
		'taxonomies'            => array( 'selt_sermon_series', 'selt_sermon_topic', 'selt_sermon_tag', 'selt_sermon_speaker' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-video-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
	);
	register_post_type( 'selt_sermon', $args );

}

add_action( 'init', 'selthemes_church_sermon_post_type', 0 );

}


// Series Taxonomies

if ( ! function_exists( 'selthemes_sermon_series_taxonomy' ) ) {

// Register Custom Taxonomy
function selthemes_sermon_series_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Series', 'Taxonomy General Name', 'selthemes' ),
		'singular_name'              => _x( 'Series', 'Taxonomy Singular Name', 'selthemes' ),
		'menu_name'                  => __( 'Series', 'selthemes' ),
		'all_items'                  => __( 'All Series', 'selthemes' ),
		'parent_item'                => __( 'Parent Series', 'selthemes' ),
		'parent_item_colon'          => __( 'Parent Series:', 'selthemes' ),
		'new_item_name'              => __( 'New Series Name', 'selthemes' ),
		'add_new_item'               => __( 'Add New Series', 'selthemes' ),
		'edit_item'                  => __( 'Edit Series', 'selthemes' ),
		'update_item'                => __( 'Update Series', 'selthemes' ),
		'view_item'                  => __( 'View Series', 'selthemes' ),
		'separate_items_with_commas' => __( 'Separate Series with commas', 'selthemes' ),
		'add_or_remove_items'        => __( 'Add or remove Series', 'selthemes' ),
		'choose_from_most_used'      => __( 'Choose from the most used Series', 'selthemes' ),
		'popular_items'              => __( 'Popular Series', 'selthemes' ),
		'search_items'               => __( 'Search Series', 'selthemes' ),
		'not_found'                  => __( 'Series Not Found', 'selthemes' ),
		'no_terms'                   => __( 'No Series', 'selthemes' ),
		'items_list'                 => __( 'Series list', 'selthemes' ),
		'items_list_navigation'      => __( 'Series list navigation', 'selthemes' ),
	);
	$rewrite = array(
		'slug'                       => 'sermon-series',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'selt_sermon_series', array( 'selt_sermon' ), $args );

}
add_action( 'init', 'selthemes_sermon_series_taxonomy', 0 );

}


// Topics Taxonomy

if ( ! function_exists( 'selthemes_sermon_topic_taxonomy' ) ) {

// Register Custom Taxonomy
function selthemes_sermon_topic_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Topics', 'Taxonomy General Name', 'selthemes' ),
		'singular_name'              => _x( 'Topic', 'Taxonomy Singular Name', 'selthemes' ),
		'menu_name'                  => __( 'Topics', 'selthemes' ),
		'all_items'                  => __( 'All Topics', 'selthemes' ),
		'parent_item'                => __( 'Parent Topics', 'selthemes' ),
		'parent_item_colon'          => __( 'Parent Topics:', 'selthemes' ),
		'new_item_name'              => __( 'New Topic Name', 'selthemes' ),
		'add_new_item'               => __( 'Add New Topic', 'selthemes' ),
		'edit_item'                  => __( 'Edit Topic', 'selthemes' ),
		'update_item'                => __( 'Update Topic', 'selthemes' ),
		'view_item'                  => __( 'View Topic', 'selthemes' ),
		'separate_items_with_commas' => __( 'Separate Topics with commas', 'selthemes' ),
		'add_or_remove_items'        => __( 'Add or remove Topics', 'selthemes' ),
		'choose_from_most_used'      => __( 'Choose from the most used Topics', 'selthemes' ),
		'popular_items'              => __( 'Popular Topics', 'selthemes' ),
		'search_items'               => __( 'Search Topics', 'selthemes' ),
		'not_found'                  => __( 'Topics Not Found', 'selthemes' ),
		'no_terms'                   => __( 'No Topics', 'selthemes' ),
		'items_list'                 => __( 'Topics list', 'selthemes' ),
		'items_list_navigation'      => __( 'Topics list navigation', 'selthemes' ),
	);
	$rewrite = array(
		'slug'                       => 'sermon-topics',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'selt_sermon_topic', array( 'selt_sermon' ), $args );

}
add_action( 'init', 'selthemes_sermon_topic_taxonomy', 0 );

}


// Sermon Tags Taxonomy
if ( ! function_exists( 'selthemes_sermon_tag_taxonomy' ) ) {

// Register Custom Taxonomy
function selthemes_sermon_tag_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Tags', 'Taxonomy General Name', 'selthemes' ),
		'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'selthemes' ),
		'menu_name'                  => __( 'Tags', 'selthemes' ),
		'all_items'                  => __( 'All Tags', 'selthemes' ),
		'parent_item'                => __( 'Parent Tag', 'selthemes' ),
		'parent_item_colon'          => __( 'Parent Tag:', 'selthemes' ),
		'new_item_name'              => __( 'New Tag Name', 'selthemes' ),
		'add_new_item'               => __( 'Add New Tag', 'selthemes' ),
		'edit_item'                  => __( 'Edit Tag', 'selthemes' ),
		'update_item'                => __( 'Update Tag', 'selthemes' ),
		'view_item'                  => __( 'View Tag', 'selthemes' ),
		'separate_items_with_commas' => __( 'Separate Tags with commas', 'selthemes' ),
		'add_or_remove_items'        => __( 'Add or remove Tags', 'selthemes' ),
		'choose_from_most_used'      => __( 'Choose from the most used Tags', 'selthemes' ),
		'popular_items'              => __( 'Popular Tags', 'selthemes' ),
		'search_items'               => __( 'Search Tags', 'selthemes' ),
		'not_found'                  => __( 'Tags Not Found', 'selthemes' ),
		'no_terms'                   => __( 'No Tags', 'selthemes' ),
		'items_list'                 => __( 'Tags list', 'selthemes' ),
		'items_list_navigation'      => __( 'Tags list navigation', 'selthemes' ),
	);
	$rewrite = array(
		'slug'                       => 'sermon-tag',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'selt_sermon_tag', array( 'selt_sermon' ), $args );

}
add_action( 'init', 'selthemes_sermon_tag_taxonomy', 0 );

}


if ( ! function_exists( 'selthemes_sermon_speaker_taxonomy' ) ) {

// Register Custom Taxonomy
function selthemes_sermon_speaker_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Speakers', 'Taxonomy General Name', 'selthemes' ),
		'singular_name'              => _x( 'Speaker', 'Taxonomy Singular Name', 'selthemes' ),
		'menu_name'                  => __( 'Speaker', 'selthemes' ),
		'all_items'                  => __( 'All Speakers', 'selthemes' ),
		'parent_item'                => __( 'Parent Speaker', 'selthemes' ),
		'parent_item_colon'          => __( 'Parent Speaker:', 'selthemes' ),
		'new_item_name'              => __( 'New Speaker Name', 'selthemes' ),
		'add_new_item'               => __( 'Add New Speaker', 'selthemes' ),
		'edit_item'                  => __( 'Edit Speaker', 'selthemes' ),
		'update_item'                => __( 'Update Speaker', 'selthemes' ),
		'view_item'                  => __( 'View Speaker', 'selthemes' ),
		'separate_items_with_commas' => __( 'Separate speakers with commas', 'selthemes' ),
		'add_or_remove_items'        => __( 'Add or remove speakers', 'selthemes' ),
		'choose_from_most_used'      => __( 'Choose from the most used speaker', 'selthemes' ),
		'popular_items'              => __( 'Popular speakers', 'selthemes' ),
		'search_items'               => __( 'Search speakers', 'selthemes' ),
		'not_found'                  => __( 'Speakers Not Found', 'selthemes' ),
		'no_terms'                   => __( 'No speakers', 'selthemes' ),
		'items_list'                 => __( 'Speakers list', 'selthemes' ),
		'items_list_navigation'      => __( 'Speakers list navigation', 'selthemes' ),
	);
	$rewrite = array(
		'slug'                       => 'sermon-speaker',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'selt_sermon_speaker', array( 'selt_sermon' ), $args );

}
add_action( 'init', 'selthemes_sermon_speaker_taxonomy', 0 );

}
