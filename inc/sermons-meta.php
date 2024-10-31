<?php
/**
* Create Church Sermon custom metabox.
*
* @since 1.0.0
* @package Selthemes
* @subpackage Sermons by Selthemes
*/

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
 exit;
}


add_action( 'cmb2_admin_init', 'selthemes_church_sermon_meta' );
/**
 * Define the metabox and field configurations.
 */
function selthemes_church_sermon_meta() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_selthemes_sermons_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'selthemes_sermons_meta',
		'title'         => esc_html__( 'Sermon Media', 'selthemes' ),
		'object_types'  => array( 'selt_sermon', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

    $cmb->add_field( array(
    	'name' => 'Video',
    	'desc' => 'Enter a youtube, vimeo, or other supported services listed at <a href="http://codex.wordpress.org/Embeds" target="_blank">http://codex.wordpress.org/Embeds</a>.',
    	'id'   => $prefix . 'video',
    	'type' => 'oembed',
		'column' => array(
			'position' => 1,
			'name'     => 'Video',
		),
    ) );

    $cmb->add_field( array(
    	'name' => 'Soundcloud',
    	'desc' => 'Enter a soundcloud URL.',
    	'id'   => $prefix . 'soundcloud',
    	'type' => 'oembed',
    ) );

    $cmb->add_field( array(
    	'name'    => 'Audio',
    	'desc'    => 'Upload an audio file or enter an URL of audio file.',
    	'id'      => $prefix .'audio',
    	'type'    => 'file',
    	// Optional:
    	'options' => array(
    		'url' => true, // Hide the text input for the url
    	),
    	'text'    => array(
    		'add_upload_file_text' => 'Add an Audio File' // Change upload button text. Default: "Add or Upload File"
    	),
    	// query_args are passed to wp.media's library query.
    	'query_args' => array(
    		'type' => 'audio', // Make library only display PDFs.
    	),
    ) );

    $cmb->add_field( array(
    	'name'    => 'Sermon Note PDF',
    	'desc'    => 'Upload an PDF or enter an PDF URL.',
    	'id'      => $prefix . 'pdf',
    	'type'    => 'file',
    	// Optional:
    	'options' => array(
    		'url' => true, // Hide the text input for the url
    	),
    	'text'    => array(
    		'add_upload_file_text' => 'Add a PDF File' // Change upload button text. Default: "Add or Upload File"
    	),
    	// query_args are passed to wp.media's library query.
    	'query_args' => array(
    		'type' => 'application/pdf', // Make library only display PDFs.
    	),
    ) );



}

?>
