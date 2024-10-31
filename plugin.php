<?php

/**
 * Plugin Name:       Sel Church Sermons
 * Plugin URI:        https://selthemes.com/plugins/sel-sermons
 * Description:		   This plugin created for official church themes from Selthemes.com. This plugin registers a custom post type for sermon items, taxonomy, widgets and metabox (cmb2).
 * Version:           1.0.1
 * Author:            Selthemes
 * Author URI:        https://selthemes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       selthemes
 * Domain Path:       /languages
 */

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
    exit;
}



/**
 * Include Post Type
 *
 * @since 1.0.0
 */

require_once ( plugin_dir_path(__FILE__) . '/inc/tgmpa/required-plugin.php');
require_once ( plugin_dir_path(__FILE__) . '/inc/sermons-post-type.php');
require_once ( plugin_dir_path(__FILE__) . '/inc/sermons-meta.php');
require_once ( plugin_dir_path(__FILE__) . '/inc/sermons-columns.php');
require_once ( plugin_dir_path(__FILE__) . '/inc/sermons-widget.php');



/**
 * Flush the permalinks
 * Load CPTs and Taxonomies
 *
 * @since 1.0.0
 */
function selthemes_sermons_activate() {
	selthemes_church_sermon_post_type();
  selthemes_sermon_series_taxonomy();
  selthemes_sermon_topic_taxonomy();
  selthemes_sermon_tag_taxonomy();
  selthemes_sermon_speaker_taxonomy();

	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'selthemes_sermons_activate' );



/**
 * Register Recent Sermons Widget.
 *
 * @since 1.0.0
 */
add_action( 'widgets_init', function(){
    register_widget( 'Selthemes_Widget_Recent_Sermons' );
} );
