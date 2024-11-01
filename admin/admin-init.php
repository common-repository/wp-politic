<?php
    // WPpolitic options menu
    if ( ! function_exists( 'wppolitic_add_adminbar_menu' ) ) {
        function wppolitic_add_adminbar_menu() {
            $menu = 'add_menu_' . 'page';
            $menu( 
                'wppolitic_panel', 
                esc_html__( 'WP Politic', 'wppolitic' ), 
                'manage_options', 
                'wppolitic_menu', 
                NULL, 
                'dashicons-megaphone', 
                40 
            );
        }
    }
    add_action( 'admin_menu', 'wppolitic_add_adminbar_menu' );

if(!function_exists('wppolitic_pagination')){
    function wppolitic_pagination(){
        ?>
        <div class="wppolitic-pagination"> <?php
            the_posts_pagination(array(
                'prev_text'          => '<i class="fa fa-angle-left"></i>',
                'next_text'          => '<i class="fa fa-angle-right"></i>',
                'type'               => 'list'
            )); ?>
        </div>
        <?php
    }
}

if( !function_exists('wppolitic_post_count_on_archive') ){
    function wppolitic_post_count_on_archive( $query ) {
         if(!is_admin() && is_archive()){
            $per_pages = (int)wppolitic_get_option( 'wppolitic_posts_per_page', 'wppolitic_settings' );

            if ( $query->is_archive( 'wppolitic' ) ) {
                $query->set( 'posts_per_page', $per_pages); /*set this your preferred count*/
            }
        }
    }
    add_action( 'pre_get_posts', 'wppolitic_post_count_on_archive' );
}