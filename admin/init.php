<?php
    require_once WPPOLITIC_ADDONS_PL_PATH.'admin/admin-init.php';
    require_once WPPOLITIC_ADDONS_PL_PATH.'admin/wppolitic_custom-post-type.php';
    require_once WPPOLITIC_ADDONS_PL_PATH.'admin/wppolitic_custom-metabox.php';
    require_once WPPOLITIC_ADDONS_PL_PATH.'admin/Recommended_Plugins.php';
    require_once WPPOLITIC_ADDONS_PL_PATH.'admin/class.settings-api.php';
	require_once WPPOLITIC_ADDONS_PL_PATH.'admin/plugin-options.php';
    

/*
CHANGE SLUGS OF CUSTOM POST TYPES
*/
function wppoliticpost_types_slug( $args, $post_type ) {

    // Campaign Post type 
   if ( 'wpcampaign' === $post_type ) {
        $wppolitic_custom_post_campaign = wppolitic_get_option( 'wppolitic_custom_post_campaign', 'wppolitic_post_types_settings', 'Campaign' );
        if( isset( $wppolitic_custom_post_campaign ) && !empty( $wppolitic_custom_post_campaign ) ){
           
            $wppolitic_custom_post_campaign_name = $wppolitic_custom_post_campaign;
            $wppolitic_custom_post_campaign = strtolower( str_replace( ' ', '-', $wppolitic_custom_post_campaign ) );

            /*Item post type slug*/
            array(
                $args['labels']['name'] = _x( $wppolitic_custom_post_campaign_name, 'Post Type General Name', 'wppolitic' ),
                $args['rewrite']['slug'] = $wppolitic_custom_post_campaign,
            );
        }
        
   }

    // Portfolio Post type 
    if ( 'wppolitic_portfolio' === $post_type ) {
        $wppolitic_custom_post_portfolio = wppolitic_get_option( 'wppolitic_custom_post_portfolio', 'wppolitic_post_types_settings', 'Portfolio' );

        if( isset( $wppolitic_custom_post_portfolio ) && !empty( $wppolitic_custom_post_portfolio ) ){

            $wppolitic_custom_post_portfolio_name = $wppolitic_custom_post_portfolio;
            $wppolitic_custom_post_portfolio = strtolower( str_replace( ' ', '-', $wppolitic_custom_post_portfolio ) );

            /*Item post type slug*/
            array(
                $args['labels']['name'] = _x( $wppolitic_custom_post_portfolio_name, 'Post Type General Name', 'wppolitic' ),
                $args['rewrite']['slug'] = $wppolitic_custom_post_portfolio,
            );        
        }

   }

    // Mission Post type 
    if ( 'wppolitic_mission' === $post_type ) {
        $wppolitic_custom_post_mission = wppolitic_get_option( 'wppolitic_custom_post_mission', 'wppolitic_post_types_settings', 'Mission' );

        if( isset( $wppolitic_custom_post_mission ) && !empty( $wppolitic_custom_post_mission ) ){

            $wppolitic_custom_post_mission_name = $wppolitic_custom_post_mission;
            $wppolitic_custom_post_mission = strtolower( str_replace( ' ', '-', $wppolitic_custom_post_mission ) );

            /*Item post type slug*/
            array(
                $args['labels']['name'] = _x( $wppolitic_custom_post_mission_name, 'Post Type General Name', 'wppolitic' ),
                $args['rewrite']['slug'] = $wppolitic_custom_post_mission,
            );
        }

   }

    // Team Post type 
    if ( 'wppolitic_team' === $post_type ) {
        $wppolitic_custom_post_team = wppolitic_get_option( 'wppolitic_custom_post_team', 'wppolitic_post_types_settings', 'Team' );

        if( isset( $wppolitic_custom_post_team ) && !empty( $wppolitic_custom_post_team ) ){

            $wppolitic_custom_post_team_name = $wppolitic_custom_post_team;
            $wppolitic_custom_post_team = strtolower( str_replace( ' ', '-', $wppolitic_custom_post_team ) );

            /*Item post type slug*/
            array(
                $args['labels']['name'] = _x( $wppolitic_custom_post_team_name, 'Post Type General Name', 'wppolitic' ),
                $args['rewrite']['slug'] = $wppolitic_custom_post_team,
            );
        }

   }

    // Gallery Post type 
    if ( 'wppolitic_gallery' === $post_type ) {
        $wppolitic_custom_post_gallery = wppolitic_get_option( 'wppolitic_custom_post_gallery', 'wppolitic_post_types_settings', 'Gallery' );
        
        if( isset( $wppolitic_custom_post_gallery ) && !empty( $wppolitic_custom_post_gallery ) ){

            $wppolitic_custom_post_gallery_name = $wppolitic_custom_post_gallery;
            $wppolitic_custom_post_gallery = strtolower( str_replace( ' ', '-', $wppolitic_custom_post_gallery ) );

            /*Item post type slug*/
            array(
                $args['labels']['name'] = _x( $wppolitic_custom_post_gallery_name, 'Post Type General Name', 'wppolitic' ),
                $args['rewrite']['slug'] = $wppolitic_custom_post_gallery,
            );
        }
   }
   
   return $args;
}

add_filter( 'register_post_type_args', 'wppoliticpost_types_slug', 10, 2 );

// Flush permalink after save custom post type name
if ( ( isset( $_REQUEST['page'] ) &&  $_REQUEST['page'] == 'wppolitic_options' ) &&  isset( $_REQUEST['settings-updated'] ) ){
    add_action('init',function(){
        flush_rewrite_rules();
    });
}

?>