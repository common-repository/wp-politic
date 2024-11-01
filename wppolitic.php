<?php
/**
 * Plugin Name: WP Politic
 * Description: Political WordPress Plugin For Political Party, Campaign & Candidate
 * Plugin URI: https://thethemedemo.com/politic/
 * Version: 2.4.5
 * Author: HasThemes
 * Author URI: https://hasthemes.com/
 * License:  GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: wppolitic
*/


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'WPPOLITIC_VERSION', '2.4.5' );
define( 'WPPOLITIC_ADDONS_PL_URL', plugins_url( '/', __FILE__ ) );
define( 'WPPOLITIC_ADDONS_PL_PATH', plugin_dir_path( __FILE__ ) );
define( 'WPPOLITIC_ADDONS_PL_ROOT', __FILE__ );

// Required File
require_once WPPOLITIC_ADDONS_PL_PATH.'includes/helper-function.php';
require_once WPPOLITIC_ADDONS_PL_PATH.'init.php';
require_once WPPOLITIC_ADDONS_PL_PATH.'admin/init.php';

add_filter('single_template', 'wppolitic_single_template_modify');

function wppolitic_single_template_modify($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'wpcampaign' ) {
        if ( file_exists( WPPOLITIC_ADDONS_PL_PATH . 'includes/single-wpcampaign.php' ) ) {
            return WPPOLITIC_ADDONS_PL_PATH . 'includes/single-wpcampaign.php';
        }
    }
    return $single;
}

add_filter('archive_template', 'wppolitic_archive_modify');

function wppolitic_archive_modify($archive) {

    global $post;

    /* Checks for archive template by post type */
    if ( $post->post_type == 'wpcampaign' ) {
        if ( file_exists( WPPOLITIC_ADDONS_PL_PATH . 'includes/archive-wpcampaign.php' ) ) {
            return WPPOLITIC_ADDONS_PL_PATH . 'includes/archive-wpcampaign.php';
        }
    }
    return $archive;
}

// Team Single page
add_filter('single_template', 'wppolitic_single_team_template_modify');

function wppolitic_single_team_template_modify($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'wppolitic_team' ) {
        if ( file_exists( WPPOLITIC_ADDONS_PL_PATH . 'includes/single-wppolitic_team.php' ) ) {
            return WPPOLITIC_ADDONS_PL_PATH . 'includes/single-wppolitic_team.php';
        }
    }
    return $single;
}
// Portfolio Single page
add_filter('single_template', 'wppolitic_single_portfolio_template_modify');

function wppolitic_single_portfolio_template_modify($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'wppolitic_portfolio' ) {
        if ( file_exists( WPPOLITIC_ADDONS_PL_PATH . 'includes/single-wppolitic_portfolio.php' ) ) {
            return WPPOLITIC_ADDONS_PL_PATH . 'includes/single-wppolitic_portfolio.php';
        }
    }
    return $single;
}

// Mission Single page
add_filter('single_template', 'wppolitic_single_mission_template_modify');

function wppolitic_single_mission_template_modify($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'wppolitic_mission' ) {
        if ( file_exists( WPPOLITIC_ADDONS_PL_PATH . 'includes/single-wppolitic_mission.php' ) ) {
            return WPPOLITIC_ADDONS_PL_PATH . 'includes/single-wppolitic_mission.php';
        }
    }
    return $single;
}
// Gallery Single page
add_filter('single_template', 'wppolitic_single_gallery_template_modify');

function wppolitic_single_gallery_template_modify($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'wppolitic_gallery' ) {
        if ( file_exists( WPPOLITIC_ADDONS_PL_PATH . 'includes/single-wppolitic_gallery.php' ) ) {
            return WPPOLITIC_ADDONS_PL_PATH . 'includes/single-wppolitic_gallery.php';
        }
    }
    return $single;
}


/**
 * Get the value of a settings field
 *
 * @param string $option settings field name
 * @param string $section the section name this field belongs to
 * @param string $default default text if it's not found
 *
 * @return mixed
 */
function wppolitic_get_option( $option, $section, $default = '' ) {

    $options = get_option( $section );

    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }

    return $default;
}

// Check Plugins is Installed or not
function wppolitic_is_plugins_active( $pl_file_path = NULL ){
    $installed_plugins_list = get_plugins();
    return isset( $installed_plugins_list[$pl_file_path] );
}
// This notice for Elementor is not installed or activated or both.
function wppolitic_check_elementor_status(){
    $elementor = 'elementor/elementor.php';
    if( wppolitic_is_plugins_active($elementor) ) {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor );
        $message = __( '<strong>WP Politic Addons for Elementor</strong> Requires Elementor plugin to be active. Please activate Elementor to continue.', 'wppolitic' );
        $button_text = __( 'Activate Elementor', 'wppolitic' );
    } else {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
        $message = sprintf( __( '<strong>wppolitic Addons for Elementor</strong> requires %1$s"Elementor"%2$s plugin to be installed and activated. Please install Elementor to continue.', 'wppolitic' ), '<strong>', '</strong>' );
        $button_text = __( 'Install Elementor', 'wppolitic' );
    }
    $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
    printf( '<div class="error"><p>%1$s</p>%2$s</div>', __( $message ), $button );
}

if( ! did_action( 'elementor/loaded' ) ) {
    add_action( 'admin_init', 'wppolitic_check_elementor_status' );
}
// This notice for Cmb2 is not installed or activated or both.
function wppolitic_check_cmb2_status(){
    $cmb2 = 'cmb2/init.php';

    if( wppolitic_is_plugins_active($cmb2) ) {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $cmb2 . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $cmb2 );
        $message = __( '<strong>WP Politic Plugin</strong> Requires Cmb2 plugin to be active. Please activate Cmb2 to continue.', 'wppolitic' );
        $button_text = __( 'Activate CMB2', 'wppolitic' );
    } else {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=cmb2' ), 'install-plugin_cmb2' );
        $message = sprintf( __( '<strong>wppolitic Addons for Cmb2</strong> requires %1$s"Cmb2"%2$s plugin to be installed and activated. Please install Cmb2 to continue.', 'wppolitic' ), '<strong>', '</strong>' );
        $button_text = __( 'Install Cmb2', 'wppolitic' );
    }
    $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
    printf( '<div class="error"><p>%1$s</p>%2$s</div>', __( $message ), $button );
}


if( ! defined( 'CMB2_LOADED' )) {
    add_action( 'admin_init', 'wppolitic_check_cmb2_status' );
}

/*
 * Display tabs related to Serives in admin when user
 * viewing/editing Campaign/category/tags.
 */
function wppolitic_tabs($views) {
    if ( ! is_admin() ) {
        return;
    }
    $admin_tabs = apply_filters(
        'wppolitic_tabs_info',
        array(

            10 => array(
                "link" => "edit.php?post_type=wpcampaign",
                "name" => __( "Campaigns", "wppolitic" ),
                "id"   => "edit-wpcampaign",
            ),

            20 => array(
                "link" => "edit-tags.php?taxonomy=campaign_category&post_type=wpcampaign",
                "name" => __( "Categories", "wppolitic" ),
                "id"   => "edit-campaign_category",
            ),

        )
    );
    ksort( $admin_tabs );
    $tabs = array();
    foreach ( $admin_tabs as $key => $value ) {
        array_push( $tabs, $key );
    }
    $pages = apply_filters(
        'wppolitic_admin_tabs_on_pages',
        array( 'edit-wpcampaign', 'edit-campaign_category', 'wpcampaign' )
    );
    $admin_tabs_on_page = array();
    foreach ( $pages as $page ) {
        $admin_tabs_on_page[ $page ] = $tabs;
    }

    $current_page_id = get_current_screen()->id;
    $current_user    = wp_get_current_user();
    if ( ! in_array( 'administrator', $current_user->roles ) ) {
        return;
    }

        if( ! empty( $admin_tabs_on_page[ $current_page_id ] ) && count( $admin_tabs_on_page[ $current_page_id ] )){
        echo '<h2 style="margin-bottom:15px;" class="nav-tab-wrapper lp-nav-tab-wrapper">';
        foreach ( $admin_tabs_on_page[ $current_page_id ] as $admin_tab_id ) {

            $class = ( $admin_tabs[ $admin_tab_id ]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
            echo '<a href="' . admin_url( $admin_tabs[ $admin_tab_id ]["link"] ) . '" class="' . $class . ' nav-tab-' . $admin_tabs[ $admin_tab_id ]["id"] . '">' . $admin_tabs[ $admin_tab_id ]["name"] . '</a>';
        }
        echo '</h2>';
    }
    return $views;
}

add_filter( 'views_edit-wpcampaign', 'wppolitic_tabs' );
add_action('wpcampaign_cat_pre_add_form','wppolitic_tabs');

/*
 * Display tabs related to gallery in admin when user
 * viewing/editing gallery/category.
 */
function wppolitic_gallery_tabs($views) {
    if ( ! is_admin() ) {
        return;
    }
    $admin_tabs = apply_filters(
        'wppolitic_gallery_tabs_info',
        array(

            10 => array(
                "link" => "edit.php?post_type=wppolitic_gallery",
                "name" => __( "Gallery", "wppolitic" ),
                "id"   => "edit-wppolitic_gallery",
            ),

            20 => array(
                "link" => "edit-tags.php?taxonomy=wppolitic_gallery_cat&post_type=wppolitic_gallery",
                "name" => __( "Categories", "wppolitic" ),
                "id"   => "edit-wppolitic_gallery_cat",
            ),

        )
    );
    ksort( $admin_tabs );
    $tabs = array();
    foreach ( $admin_tabs as $key => $value ) {
        array_push( $tabs, $key );
    }
    $pages = apply_filters(
        'wppolitic_gallery_admin_tabs_on_pages',
        array( 'edit-wppolitic_gallery', 'edit-wppolitic_gallery_cat', 'edit-gallery_tag', 'wppolitic_gallery' )
    );
    $admin_tabs_on_page = array();
    foreach ( $pages as $page ) {
        $admin_tabs_on_page[ $page ] = $tabs;
    }
    $current_page_id = get_current_screen()->id;
    $current_user    = wp_get_current_user();
    if ( ! in_array( 'administrator', $current_user->roles ) ) {
        return;
    }
    if ( ! empty( $admin_tabs_on_page[ $current_page_id ] ) && count( $admin_tabs_on_page[ $current_page_id ] ) ) {
        echo '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper" style="margin-bottom:15px;">';
        foreach ( $admin_tabs_on_page[ $current_page_id ] as $admin_tab_id ) {

            $class = ( $admin_tabs[ $admin_tab_id ]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
            echo '<a href="' . admin_url( $admin_tabs[ $admin_tab_id ]["link"] ) . '" class="' . $class . ' nav-tab-' . $admin_tabs[ $admin_tab_id ]["id"] . '">' . $admin_tabs[ $admin_tab_id ]["name"] . '</a>';
        }
        echo '</h2>';
    }
    return $views;
}

add_filter( 'views_edit-wppolitic_gallery', 'wppolitic_gallery_tabs' );
add_action('wppolitic_gallery_cat_pre_add_form','wppolitic_gallery_tabs');

/*
 * Display tabs related to Team in admin when user
 * viewing/editing Team/category.
 */
function wppolitic_team_tabs( $views ) {
    if ( ! is_admin() ) {
        return;
    }
    $admin_tabs = apply_filters(
        'wppolitic_team_tabs_info',
        array(

            10 => array(
                "link" => "edit.php?post_type=wppolitic_team",
                "name" => __( "Team", "wppolitic" ),
                "id"   => "edit-wppolitic_team",
            ),

            20 => array(
                "link" => "edit-tags.php?taxonomy=wppolitic_team_cat&post_type=wppolitic_team",
                "name" => __( "Categories", "wppolitic" ),
                "id"   => "edit-wppolitic_team_cat",
            ),

        )
    );
    ksort( $admin_tabs );
    $tabs = array();
    foreach ( $admin_tabs as $key => $value ) {
        array_push( $tabs, $key );
    }
    $pages = apply_filters(
        'wppolitic_team_admin_tabs_on_pages',
        array( 'edit-wppolitic_team', 'edit-wppolitic_team_cat', 'edit-team_tag', 'wppolitic_team' )
    );
    $admin_tabs_on_page = array();
    foreach ( $pages as $page ) {
        $admin_tabs_on_page[ $page ] = $tabs;
    }

    $current_page_id = get_current_screen()->id;
    $current_user    = wp_get_current_user();
    if ( ! in_array( 'administrator', $current_user->roles ) ) {
        return;
    }
    if ( ! empty( $admin_tabs_on_page[ $current_page_id ] ) && count( $admin_tabs_on_page[ $current_page_id ] ) ) {
        echo '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper" style="margin-bottom:15px;">';
        foreach ( $admin_tabs_on_page[ $current_page_id ] as $admin_tab_id ) {

            $class = ( $admin_tabs[ $admin_tab_id ]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
            echo '<a href="' . admin_url( $admin_tabs[ $admin_tab_id ]["link"] ) . '" class="' . $class . ' nav-tab-' . $admin_tabs[ $admin_tab_id ]["id"] . '">' . $admin_tabs[ $admin_tab_id ]["name"] . '</a>';
        }
        echo '</h2>';
    }
    return $views;
}

add_filter( 'views_edit-wppolitic_team', 'wppolitic_team_tabs' );
add_action('wppolitic_team_cat_pre_add_form','wppolitic_team_tabs');

add_action( 'wsa_form_bottom_wppolitic_pro_themes', 'wppolitic_pro_tab_advertise' );

/*
 * Display tabs related to Portfolio in admin when user
 * viewing/editing Portfolio/category.
 */
function wppolitic_portfolio_tabs( $views ) {
    if ( ! is_admin() ) {
        return;
    }
    $admin_tabs = apply_filters(
        'wppolitic_portfolio_tabs_info',
        array(

            10 => array(
                "link" => "edit.php?post_type=wppolitic_portfolio",
                "name" => __( "Portfolio", "wppolitic" ),
                "id"   => "edit-wppolitic_portfolio",
            ),

            20 => array(
                "link" => "edit-tags.php?taxonomy=wppolitic_portfolio_cat&post_type=wppolitic_portfolio",
                "name" => __( "Categories", "wppolitic" ),
                "id"   => "edit-wppolitic_portfolio_cat",
            ),

        )
    );
    ksort( $admin_tabs );
    $tabs = array();
    foreach ( $admin_tabs as $key => $value ) {
        array_push( $tabs, $key );
    }
    $pages = apply_filters(
        'wppolitic_portfolio_admin_tabs_on_pages',
        array( 'edit-wppolitic_portfolio', 'edit-wppolitic_portfolio_cat', 'edit-portfolio_tag', 'wppolitic_portfolio' )
    );
    $admin_tabs_on_page = array();
    foreach ( $pages as $page ) {
        $admin_tabs_on_page[ $page ] = $tabs;
    }

    $current_page_id = get_current_screen()->id;
    $current_user    = wp_get_current_user();
    if ( ! in_array( 'administrator', $current_user->roles ) ) {
        return;
    }
    if ( ! empty( $admin_tabs_on_page[ $current_page_id ] ) && count( $admin_tabs_on_page[ $current_page_id ] ) ) {
        echo '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper" style="margin-bottom:15px;">';
        foreach ( $admin_tabs_on_page[ $current_page_id ] as $admin_tab_id ) {

            $class = ( $admin_tabs[ $admin_tab_id ]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
            echo '<a href="' . admin_url( $admin_tabs[ $admin_tab_id ]["link"] ) . '" class="' . $class . ' nav-tab-' . $admin_tabs[ $admin_tab_id ]["id"] . '">' . $admin_tabs[ $admin_tab_id ]["name"] . '</a>';
        }
        echo '</h2>';
    }
    return $views;
}

add_filter( 'views_edit-wppolitic_portfolio', 'wppolitic_portfolio_tabs' );
add_action('wppolitic_portfolio_cat_pre_add_form','wppolitic_portfolio_tabs');


/*
 * Display tabs Mission in admin when user
 * viewing/editing Portfolio/category.
 */
function wppolitic_mission_tabs($views) {
    if ( ! is_admin() ) {
        return;
    }
    $admin_tabs = apply_filters(
        'wppolitic_mission_tabs_info',
        array(

            10 => array(
                "link" => "edit.php?post_type=wppolitic_mission",
                "name" => __( "Mission", "wppolitic" ),
                "id"   => "edit-wppolitic_mission",
            ),

            20 => array(
                "link" => "edit-tags.php?taxonomy=wppolitic_mission_cat&post_type=wppolitic_mission",
                "name" => __( "Categories", "wppolitic" ),
                "id"   => "edit-wppolitic_mission_cat",
            ),

        )
    );
    ksort( $admin_tabs );
    $tabs = array();
    foreach ( $admin_tabs as $key => $value ) {
        array_push( $tabs, $key );
    }
    $pages = apply_filters(
        'wppolitic_mission_admin_tabs_on_pages',
        array( 'edit-wppolitic_mission', 'edit-wppolitic_mission_cat', 'edit-wppolitic_mission_tag', 'wppolitic_mission' )
    );
    $admin_tabs_on_page = array();
    foreach ( $pages as $page ) {
        $admin_tabs_on_page[ $page ] = $tabs;
    }

    $current_page_id = get_current_screen()->id;
    $current_user    = wp_get_current_user();
    if ( ! in_array( 'administrator', $current_user->roles ) ) {
        return;
    }
    if ( ! empty( $admin_tabs_on_page[ $current_page_id ] ) && count( $admin_tabs_on_page[ $current_page_id ] ) ) {
        echo '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper" style="margin-bottom:15px;">';
        foreach ( $admin_tabs_on_page[ $current_page_id ] as $admin_tab_id ) {

            $class = ( $admin_tabs[ $admin_tab_id ]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
            echo '<a href="' . admin_url( $admin_tabs[ $admin_tab_id ]["link"] ) . '" class="' . $class . ' nav-tab-' . $admin_tabs[ $admin_tab_id ]["id"] . '">' . $admin_tabs[ $admin_tab_id ]["name"] . '</a>';
        }
        echo '</h2>';
    }
    return $views;
}

add_filter( 'views_edit-wppolitic_mission', 'wppolitic_mission_tabs' );
add_action('wppolitic_mission_cat_pre_add_form','wppolitic_mission_tabs');

add_action( 'wsa_form_bottom_wppolitic_pro_themes', 'wppolitic_pro_tab_advertise' );

function wppolitic_pro_tab_advertise(){

        echo '<h3> <a target="_blank" href="https://demo.hasthemes.com/wp/politic-preview/index.html">
        Politic – Political WordPress Theme</a><h3/> <a target="_blank" href="https://demo.hasthemes.com/wp/politic-preview/index.html"><img alt="Political WordPress Theme" src="https://themeforest.img.customer.envatousercontent.com/files/268316586/politic-preview-v311.__large_preview.jpg?auto=compress%2Cformat&q=80&fit=crop&crop=top&max-h=8000&max-w=590&s=28acdfbff0890ac5092ee8a08199c5eb"></a>';
}

/**
* Elementor Version check
* Return boolean value
*/
function wppolitic_is_elementor_version( $operator = '<', $version = '2.6.0' ) {
    return defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, $version, $operator );
}

// Compatibility with elementor version 3.6.1
function wppolitic_widget_register_manager($widget_class){
    $widgets_manager = \Elementor\Plugin::instance()->widgets_manager;
    
    if ( wppolitic_is_elementor_version( '>=', '3.5.0' ) ){
        $widgets_manager->register( $widget_class );
    }else{
        $widgets_manager->register_widget_type( $widget_class );
    }
}
