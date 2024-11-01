<?php

namespace Elementor;

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit();

/**
 * Elementor category
 */
function wppolitic_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'wppolitic',
        [
            'title'  => 'WP Politic',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\wppolitic_elementor_init');

// Campaign Category
function wppolitic_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'campaign_category',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}
// Gallery Category

function wppolitic_gallery_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'wppolitic_gallery_cat',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}

// Team Category
function wppolitic_team_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'wppolitic_team_cat',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}
// Portfolio Category
function wppolitic_portfolio_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'wppolitic_portfolio_cat',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}
/*Post Veiw count*/
if(!function_exists('wppolitic_getPostViews')){

    function wppolitic_getPostViews($post_ID) {

        $count_key = 'post_views_count'; 

        $count = get_post_meta($post_ID, $count_key, true); 

        if($count == ''){

            $count = 0; 

            delete_post_meta($post_ID, $count_key);        

            add_post_meta($post_ID, $count_key, '0');

            return $count;   

        }

        else{

            $count++; 

            update_post_meta($post_ID, $count_key, $count);

           if($count == '1'){

            return $count ;

            }
            else {

            return $count;

            }

        }

    }

}

// Blog Category
function wppolitic_blog_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'category',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}
// Mission Category
function wppolitic_mission_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'wppolitic_mission_cat',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}


/*
 * Elementor Templates List
 * return array
 */
if( !function_exists('wppolitic_elementor_template') ){
    function wppolitic_elementor_template() {
        $templates = \Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
        $types = array();
        if ( empty( $templates ) ) {
            $template_lists = [ '0' => __( 'Do not Saved Templates.', 'wppolitic' ) ];
        } else {
            $template_lists = [ '0' => __( 'Select Template', 'wppolitic' ) ];
            foreach ( $templates as $template ) {
                $template_lists[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
            }
        }
        return $template_lists;
    }
}