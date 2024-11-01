<?php

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit();

if ( !class_exists( 'WPpolitic_Addons_Init' ) ) {
    class WPpolitic_Addons_Init{
        
        public function __construct(){
            
            // Init Widgets
            if ( wppolitic_is_elementor_version( '>=', '3.5.0' ) ) {
                add_action( 'elementor/widgets/register', array( $this, 'wppolitic_includes_widgets' ) );
            }else{
                add_action( 'elementor/widgets/widgets_registered', array( $this, 'wppolitic_includes_widgets' ) );
            }            
        }
            // Include Widgets File
            public function wppolitic_includes_widgets(){
                
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_campaign_addons.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_campaign_addons.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_gallery_addons.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_gallery_addons.php';
                } 
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_gallery_ajax_addons.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_gallery_ajax_addons.php';
                }            
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_slider_addons.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_slider_addons.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_section_title.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_section_title.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_features_box.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_features_box.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_political_timeline.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_political_timeline.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_fun_fact.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_fun_fact.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_team.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_team.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_latest_blog.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_latest_blog.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_progressber_addons.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_progressber_addons.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_video_popup_addons.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_video_popup_addons.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_testimonial.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_testimonial.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_portfolio_addons.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_portfolio_addons.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_google_vector_map.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_google_vector_map.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_mission_addons.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_mission_addons.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/class.wppolitic-icon-manager.php' ) ) {
                    include_once WPPOLITIC_ADDONS_PL_PATH.'includes/class.wppolitic-icon-manager.php';
                }
                if ( file_exists( WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_pageslide.php' ) ) {
                    require_once WPPOLITIC_ADDONS_PL_PATH.'includes/widgets/wppolitic_addons_pageslide.php';
            }

        }
    }
    new WPpolitic_Addons_Init();
}

// enqueue scripts
add_action( 'wp_enqueue_scripts','wppolitic_enqueue_scripts');
function  wppolitic_enqueue_scripts(){
    // enqueue styles
    wp_enqueue_style( 'bootstrap', WPPOLITIC_ADDONS_PL_URL . 'assets/css/bootstrap.min.css');
    wp_enqueue_style( 'font-awesome', WPPOLITIC_ADDONS_PL_URL . 'assets/css/font-awesome.min.css');
    wp_enqueue_style( 'fancybox', WPPOLITIC_ADDONS_PL_URL . 'assets/css/jquery.fancybox.css');
    wp_enqueue_style( 'jqvmap', WPPOLITIC_ADDONS_PL_URL . 'assets/css/jqvmap.min.css');
    wp_enqueue_style( 'magnific-popup', WPPOLITIC_ADDONS_PL_URL . 'assets/css/magnific-popup.css');
    wp_enqueue_style( 'wppolitic-vendors', WPPOLITIC_ADDONS_PL_URL.'assets/css/wppolitic-vendors.css');
    wp_enqueue_style( 'swiper', WPPOLITIC_ADDONS_PL_URL.'assets/css/swiper.css');
    wp_enqueue_style( 'wppolitic-widgets', WPPOLITIC_ADDONS_PL_URL.'assets/css/wppolitic-widgets.css');
   
    // enqueue js
     wp_enqueue_script( 'vmap', WPPOLITIC_ADDONS_PL_URL . 'assets/js/jquery.vmap.min.js', array('jquery'), '1.0.0', false);
     wp_enqueue_script( 'vmap-world', WPPOLITIC_ADDONS_PL_URL . 'assets/js/maps/jquery.vmap.world.js', array('jquery'), '1.0.0', false);
     wp_enqueue_script( 'fancybox', WPPOLITIC_ADDONS_PL_URL . 'assets/js/jquery.fancybox.min.js', array('jquery'), '3.1.20', true);
     wp_enqueue_script( 'waypoints', WPPOLITIC_ADDONS_PL_URL . 'assets/js/waypoints.js', array('jquery'), '4.0.1', true);
     wp_enqueue_script( 'counterup', WPPOLITIC_ADDONS_PL_URL . 'assets/js/jquery.counterup.js', array('jquery'), '3.1.20', true);
     wp_enqueue_script( 'magnific-popup', WPPOLITIC_ADDONS_PL_URL . 'assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', false);
     wp_enqueue_script( 'isotope', WPPOLITIC_ADDONS_PL_URL.'assets/js/isotope.pkgd.min.js', array('jquery'), '3.0.3',false );
     wp_enqueue_script( 'swiper', WPPOLITIC_ADDONS_PL_URL.'assets/js/swiper.min.js', array('jquery'), '8.4.5',false );
     wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'wppolitic-vendors', WPPOLITIC_ADDONS_PL_URL.'assets/js/wppolitic-vendors.js', array('jquery'), '', false);        
     wp_enqueue_script( 'popper', WPPOLITIC_ADDONS_PL_URL . 'assets/js/popper.min.js', array('jquery'), '1.0.0', true);    
     wp_enqueue_script( 'bootstrap', WPPOLITIC_ADDONS_PL_URL . 'assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true);    
     wp_enqueue_script( 'wppolitic-active', WPPOLITIC_ADDONS_PL_URL.'assets/js/wppolitic-jquery-widgets-active.js', array('jquery'), '', true);

    $data = array(
        'wppolitictimezoone' => get_option( 'timezone_string' ),
        'wppoliticlang'      => get_bloginfo( 'language' ),
    );
    wp_localize_script( 'wppolitic-vendors', 'Wppolitic_localize_Data', $data );


    $wppolitic_days_content = wppolitic_get_option( 'wppolitic_days_content', 'wppolitic_settings','days' );
    $wppolitic_hrs_content = wppolitic_get_option( 'wppolitic_hrs_content', 'wppolitic_settings','hrs' );
    $wppolitic_mins_content = wppolitic_get_option( 'wppolitic_mins_content', 'wppolitic_settings','mins' );
    $wppolitic_secs_content = wppolitic_get_option( 'wppolitic_secs_content', 'wppolitic_settings','secs' );

    $data2 = array(
        'wppoliticlang_day' => esc_html__($wppolitic_days_content, 'wppolitic'),
        'wppoliticlang_hrs' => esc_html__($wppolitic_hrs_content, 'wppolitic'),
        'wppoliticlang_min' => esc_html__($wppolitic_mins_content, 'wppolitic'),
        'wppoliticlang_secs' => esc_html__($wppolitic_secs_content, 'wppolitic')
    );
    wp_localize_script( 'wppolitic-active', 'Wppolitic_localize_Data2', $data2 );


}
add_action('init','wppolitic_size');



function wppolitic_size(){
    add_image_size('politic_event_img_size',815,425,true);
    add_image_size('wppolitic_img1170x600',1170,600,true);
    add_image_size('wppolitic_img580x436',580,436,true);
    add_image_size('wppolitic_img370x410',370,410,true);
    add_image_size('wppolitic_img162x100',162,100,true);
}

add_action('wp_ajax_myfilter', 'wppolitic_filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'wppolitic_filter_function');// without login 
 
function wppolitic_filter_function(){

    check_ajax_referer('wp_politic_nonce', 'nonce');

    // for taxonomies / categories
    if( isset( $_POST['categoryid']) && sanitize_text_field($_POST['categoryid']) !='all'  ){
        $args['tax_query'] = array(
            array(
                'post_type' => 'wppolitic_gallery',
                'taxonomy' => 'wppolitic_gallery_cat',
                'field' => 'id',
                'terms' => sanitize_text_field($_POST['categoryid']),
                'posts_per_page' => -1,
                
            )
        );
    }else{
    $args = array(
                'post_type' => 'wppolitic_gallery',
                'taxonomy' => 'wppolitic_gallery_cat',
                'posts_per_page' => -1,
            );
    }
 
    $query = new WP_Query( $args );
    $testarray =[];

    if( $query->have_posts() ) :
        while( $query->have_posts() ): $query->the_post();

    $testarray[] = ['title' => $query->post->post_title, 'img'=> wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()),'full',true),'popup_video' => get_post_meta( get_the_ID(),'_wppolitic_wppolitic_gallery_video', true ),'permalink'=> get_the_permalink(),];
       
        endwhile;
     echo json_encode($testarray);
        wp_reset_postdata();
    else :
        echo esc_html( 'No Gallery found', 'wppolitic');
    endif;
 
    die();
}
// Text Domain load
add_action( 'init', 'wppolitic_load_textdomain' );
function wppolitic_load_textdomain() {
  load_plugin_textdomain( 'wppolitic', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
?>