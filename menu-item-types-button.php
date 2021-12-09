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
 * Run plugin - test
 * @since 1.0
 */

function mitypes_button_run(){

	if( ! mitypes_button_is_mitypes_loaded() ){
		add_action('admin_notices', 'mitypes_button_notice_plugin_required');
	}

	
}

add_action( 'plugins_loaded', 'mitypes_button_run' );



/**
 * Add custom nav menu item
 */
function mitypes_button_add_item_types( $types ){
    $types[] = array(
        'slug'        => "button",
        'icon'        => plugin_dir_url( __FILE__ ) . 'img/mitypes-button.svg',
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

add_filter( 'mitypes_nav_menu_link_attributes', 'mitypes_button_attributes_skiper', 11, 5 );




/**
 * Test if Menu Items Types is loaded
 *
 * @since 1.0
 */
function mitypes_button_is_mitypes_loaded(){

    /**
     * Load ACF & configure it
     */
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    
    if ( ! is_plugin_active( 'menu-item-types/menu-item-types.php'     ) ){
        return false ;
    }

    return true ;
}


/**
 * 
 * MITYPES notice
 * 
 * @since 1.0
 */
function mitypes_button_notice_plugin_required(){
    
	//print the message
    $mitypes_search_url = 'plugin-install.php?s=menu-item-types&tab=search&type=term';
    $mitypes_link = get_admin_url() . $mitypes_search_url ;

    echo '<div id="message" class="error notice is-dismissible">
        <p>'. __( 'Please install and activate', 'menu-item-types') . ' ' . '<a href="'.$mitypes_link.'">Menu Item Types</a>'. ' ' . __('for using Menu Item Types — Button plugin.' , 'mitypes-button').'</p>
    </div>';

    
    //make sure to remove notice after its displayed so its only displayed when needed.
    remove_action('admin_notices', 'mitypes_button_notice_plugin_required');

    // shutdown
    deactivate_plugins( 'menu-item-types-button/menu-item-types-button.php' );
}
