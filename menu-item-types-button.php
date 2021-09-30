<?php
/*
Plugin Name:  Menu Item Types — Button
Plugin URI:   #
Description:  —
Version:      1.0
Author:       @maxpertici
Author URI:   https://maxpertici.fr
Contributors:
License:      GPLv2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  mitypes-button
Domain Path:  /languages
*/

defined( 'ABSPATH' ) or	die();


/**
 * Add custom nav menu item
 */
function mitypes_button_add_item_types( $types ){
    $types[] = array(
        'slug'        => "button",
        'label'       => __( 'Button', 'mitypes-button' ),
        'field-group' => plugin_dir_path( __DIR__ ) . 'menu-item-types-button/acf/button-field-group.php',
		'render'      => plugin_dir_path( __DIR__ ) . 'menu-item-types-button/render/button.php',
    );
    return $types;
}

add_filter( 'mitypes_item_types', 'mitypes_button_add_item_types' );




/**
 * Enqueue css on nav-menu screen
 */

function mitypes_button_enqueue_nav_item_styles( $hook ) {

	if ( 'nav-menus.php' != $hook ) {
        return;
    }

	wp_register_style( 'mitypes-button', plugin_dir_url( __FILE__ ) . 'css/mitypes-button.css', array( 'mitypes_nav_menu_style' ), '1.0' );
	wp_enqueue_style( 'mitypes-button' );

}

add_action( 'admin_enqueue_scripts', 'mitypes_button_enqueue_nav_item_styles' );



/**
 * Handle attributes : skip href
 */

function mitypes_button_attributes_skiper( $atts, $item, $args, $depth, $custom_item_type ){
	if( ( 'button' === $custom_item_type ) ){ unset( $atts['href'] ); }
	return $atts ;
}

// add_filter( 'mitypes_nav_menu_link_attributes', 'mitypes_button_attributes_skiper', 11, 5 );