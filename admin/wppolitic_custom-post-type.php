<?php
    
    if( !function_exists('wppolitic_custom_post_register') ){

        function wppolitic_custom_post_register(){

            // Register Campaign Post Type
            $labels = array(
                'name'                  => _x( 'Campaigns', 'Post Type General Name', 'wppolitic' ),
                'archives'              => __( 'Campaign Archives', 'wppolitic' ),
                'menu_name'             => __( 'Campaigns', 'wppolitic' ),
                'parent_item_colon'     => __( 'Parent Campaign:', 'wppolitic' ),
                'add_new_item'          => __( 'Add New Campaign', 'wppolitic' ),
                'add_new'               => __( 'Add New', 'wppolitic' ),
                'new_item'              => __( 'New Campaign', 'wppolitic' ),
                'edit_item'             => __( 'Edit Campaign', 'wppolitic' ),
                'update_item'           => __( 'Update Campaign', 'wppolitic' ),
                'view_item'             => __( 'View Campaign', 'wppolitic' ),
                'search_items'          => __( 'Search Campaign', 'wppolitic' ),
                'not_found'             => __( 'Not found', 'wppolitic' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'wppolitic' ),
                'featured_image'        => __( 'Featured Image', 'wppolitic' ),
                'set_featured_image'    => __( 'Set featured image', 'wppolitic' ),
                'remove_featured_image' => __( 'Remove featured image', 'wppolitic' ),
                'use_featured_image'    => __( 'Use as featured image', 'wppolitic' ),
                'insert_into_item'      => __( 'Insert into item', 'wppolitic' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'wppolitic' ),
                'items_list'            => __( 'Campaigns list', 'wppolitic' ),
                'items_list_navigation' => __( 'Campaigns list navigation', 'wppolitic' ),
                'filter_items_list'     => __( 'Filter items list', 'wppolitic' ),
            );
            $args = array(
                'labels'                => $labels,
                'supports'              => array( 'title','editor', 'thumbnail','tag','author' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => 'wppolitic_menu',
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-archive',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,        
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );
            register_post_type( 'wpcampaign', $args );

           // Campaign Category
           $labels = array(
            'name'              => _x( 'Campaigns Categories', 'wppolitic' ),
            'singular_name'     => _x( 'Campaigns Category', 'wppolitic' ),
            'search_items'      => esc_html__( 'Search Category' ),
            'all_items'         => esc_html__( 'All Category' ),
            'parent_item'       => esc_html__( 'Parent Category' ),
            'parent_item_colon' => esc_html__( 'Parent Category:' ),
            'edit_item'         => esc_html__( 'Edit Category' ),
            'update_item'       => esc_html__( 'Update Category' ),
            'add_new_item'      => esc_html__( 'Add New Category' ),
            'new_item_name'     => esc_html__( 'New Category Name' ),
            'menu_name'         => esc_html__( 'Campaigns Category' ),
           );

           $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'campaign_category' ),
           );

           register_taxonomy('campaign_category','wpcampaign',$args);

            // Register Gallery Post Type
            $labels = array(
                'name'                  => _x( 'Gallery', 'Post Type General Name', 'wppolitic' ),
                'singular_name'         => _x( 'Gallery', 'Post Type Singular Name', 'wppolitic' ),
                'menu_name'             => __( 'Gallery', 'wppolitic' ),
                'name_admin_bar'        => __( 'Gallery', 'wppolitic' ),
                'archives'              => __( 'Gallery Archives', 'wppolitic' ),
                'parent_item_colon'     => __( 'Parent Gallery:', 'wppolitic' ),
                'add_new_item'          => __( 'Add New Gallery', 'wppolitic' ),
                'add_new'               => __( 'Add New', 'wppolitic' ),
                'new_item'              => __( 'New Gallery', 'wppolitic' ),
                'edit_item'             => __( 'Edit Gallery', 'wppolitic' ),
                'update_item'           => __( 'Update Gallery', 'wppolitic' ),
                'view_item'             => __( 'View Gallery', 'wppolitic' ),
                'search_items'          => __( 'Search Gallery', 'wppolitic' ),
                'not_found'             => __( 'Not found', 'wppolitic' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'wppolitic' ),
                'featured_image'        => __( 'Featured Image', 'wppolitic' ),
                'set_featured_image'    => __( 'Set featured image', 'wppolitic' ),
                'remove_featured_image' => __( 'Remove featured image', 'wppolitic' ),
                'use_featured_image'    => __( 'Use as featured image', 'wppolitic' ),
                'insert_into_item'      => __( 'Insert into item', 'wppolitic' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'wppolitic' ),
                'items_list'            => __( 'Gallery list', 'wppolitic' ),
                'items_list_navigation' => __( 'Gallery list navigation', 'wppolitic' ),
                'filter_items_list'     => __( 'Filter items list', 'wppolitic' ),
            );
            $args = array(
                'labels'                => $labels,
                'supports'              => array( 'title','editor','thumbnail','elementor',),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => 'wppolitic_menu',
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-archive',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,        
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );
            register_post_type( 'wppolitic_gallery', $args );

           $labels = array(
            'name'              => _x( 'Gallery Categories', 'wppolitic' ),
            'singular_name'     => _x( 'Gallery Category', 'wppolitic' ),
            'search_items'      => esc_html__( 'Search Category' ),
            'all_items'         => esc_html__( 'All Category' ),
            'parent_item'       => esc_html__( 'Parent Category' ),
            'parent_item_colon' => esc_html__( 'Parent Category:' ),
            'edit_item'         => esc_html__( 'Edit Category' ),
            'update_item'       => esc_html__( 'Update Category' ),
            'add_new_item'      => esc_html__( 'Add New Category' ),
            'new_item_name'     => esc_html__( 'New Category Name' ),
            'menu_name'         => esc_html__( 'Gallery Category' ),
           );

           $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'wppolitic_gallery_cat' ),
           );

           register_taxonomy('wppolitic_gallery_cat','wppolitic_gallery',$args);


// Team Post Type
        $labels = array(
            'name' => _x('Team', 'wppolitic'),
            'singular_name' => _x('Team', 'wppolitic'),
            'menu_name' => __('Team', 'wppolitic'),
            'name_admin_bar' => __('Team', 'wppolitic'),
            'add_new' => _x('Add New', 'wppolitic'),
            'add_new_item' => esc_html__('Team Member Name', 'wppolitic'),
            'new_item' => esc_html__('New Team', 'wppolitic'),
            'edit_item' => esc_html__('Edit Team', 'wppolitic'),
            'view_item' => esc_html__('View Team', 'wppolitic'),
            'search_items' => esc_html__('Search Team', 'wppolitic'),
            'parent_item_colon' => esc_html__('Parent Team:', 'wppolitic'),
            'not_found' => esc_html__('No Team found.', 'wppolitic'),
            'not_found_in_trash' => esc_html__('No Team found in Trash.', 'wppolitic'),
            'featured_image'        => __( 'Team Image', 'wppolitic' ),           
            );
        $args   = array(
            'labels' => $labels,
            'description' => esc_html__('Description.', 'wppolitic'),
            'public' => true,
            'menu_icon' => 'dashicons-groups',
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => 'wppolitic_menu',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'teams'
                ),
            'capability_type' => 'post',
            'has_archive' => false,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'custom-fields'
                )
            );
        register_post_type('wppolitic_team', $args);

    //Taxonomy Team
        $labels = array(
            'name' => _x('Team Categories', 'wppolitic'),
            'singular_name' => _x('Team Category', 'wppolitic'),
            'search_items' => esc_html__('Search Category'),
            'all_items' => esc_html__('All Category'),
            'parent_item' => esc_html__('Parent Category'),
            'parent_item_colon' => esc_html__('Parent Category:'),
            'edit_item' => esc_html__('Edit Category'),
            'update_item' => esc_html__('Update Category'),
            'add_new_item' => esc_html__('Add New Category'),
            'new_item_name' => esc_html__('New Category Name'),
            'menu_name' => esc_html__('Team Category')
            );
        $args   = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'wppolitic_team_cat'
                )
            );
        // Taxonomy Team
        register_taxonomy('wppolitic_team_cat', 'wppolitic_team', $args);

            // Register Mission Post Type
            $labels = array(
                'name'                  => _x( 'Mission', 'Post Type General Name', 'wppolitic' ),
                'archives'              => __( 'Mission Archives', 'wppolitic' ),
                'menu_name'             => __( 'Mission', 'wppolitic' ),
                'parent_item_colon'     => __( 'Parent Mission:', 'wppolitic' ),
                'add_new_item'          => __( 'Add New Mission', 'wppolitic' ),
                'add_new'               => __( 'Add New', 'wppolitic' ),
                'new_item'              => __( 'New Mission', 'wppolitic' ),
                'edit_item'             => __( 'Edit Mission', 'wppolitic' ),
                'update_item'           => __( 'Update Mission', 'wppolitic' ),
                'view_item'             => __( 'View Mission', 'wppolitic' ),
                'search_items'          => __( 'Search Mission', 'wppolitic' ),
                'not_found'             => __( 'Not found', 'wppolitic' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'wppolitic' ),
                'featured_image'        => __( 'Featured Image', 'wppolitic' ),
                'set_featured_image'    => __( 'Set featured image', 'wppolitic' ),
                'remove_featured_image' => __( 'Remove featured image', 'wppolitic' ),
                'use_featured_image'    => __( 'Use as featured image', 'wppolitic' ),
                'insert_into_item'      => __( 'Insert into item', 'wppolitic' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'wppolitic' ),
                'items_list'            => __( 'Campaigns list', 'wppolitic' ),
                'items_list_navigation' => __( 'Campaigns list navigation', 'wppolitic' ),
                'filter_items_list'     => __( 'Filter items list', 'wppolitic' ),
            );
            $args = array(
                'labels'                => $labels,
                'supports'              => array( 'title','editor', 'thumbnail','author' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => 'wppolitic_menu',
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-archive',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => false,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );
            register_post_type( 'wppolitic_mission', $args );

           // Mission Category
           $labels = array(
            'name'              => _x( 'Mission Categories', 'wppolitic' ),
            'singular_name'     => _x( 'Mission Category', 'wppolitic' ),
            'search_items'      => esc_html__( 'Search Category' ),
            'all_items'         => esc_html__( 'All Category' ),
            'parent_item'       => esc_html__( 'Parent Category' ),
            'parent_item_colon' => esc_html__( 'Parent Category:' ),
            'edit_item'         => esc_html__( 'Edit Category' ),
            'update_item'       => esc_html__( 'Update Category' ),
            'add_new_item'      => esc_html__( 'Add New Category' ),
            'new_item_name'     => esc_html__( 'New Category Name' ),
            'menu_name'         => esc_html__( 'Mission Category' ),
           );

           $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'wppolitic_mission_category' ),
           );

           register_taxonomy('wppolitic_mission_cat','wppolitic_mission',$args);


        // Portfolio
        $labels = array(
            'name'                  => _x( 'Portfolio', 'Post Type General Name', 'wppolitic' ),
            'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'wppolitic' ),
            'menu_name'             => __( 'Portfolio', 'wppolitic' ),
            'name_admin_bar'        => __( 'Portfolio', 'wppolitic' ),
            'archives'              => __( 'Item Archives', 'wppolitic' ),
            'parent_item_colon'     => __( 'Parent Item:', 'wppolitic' ),
            'add_new_item'          => __( 'Add New Item', 'wppolitic' ),
            'add_new'               => __( 'Add New', 'wppolitic' ),
            'new_item'              => __( 'New Item', 'wppolitic' ),
            'edit_item'             => __( 'Edit Item', 'wppolitic' ),
            'update_item'           => __( 'Update Item', 'wppolitic' ),
            'view_item'             => __( 'View Item', 'wppolitic' ),
            'search_items'          => __( 'Search Item', 'wppolitic' ),
            'not_found'             => __( 'Not found', 'wppolitic' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'wppolitic' ),
            'featured_image'        => __( 'Portfolio Image', 'wppolitic' ),
            'set_featured_image'    => __( 'Set featured image', 'wppolitic' ),
            'remove_featured_image' => __( 'Remove featured image', 'wppolitic' ),
            'use_featured_image'    => __( 'Use as featured image', 'wppolitic' ),
            'insert_into_item'      => __( 'Insert into item', 'wppolitic' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'wppolitic' ),
            'items_list'            => __( 'Items list', 'wppolitic' ),
            'items_list_navigation' => __( 'Items list navigation', 'wppolitic' ),
            'filter_items_list'     => __( 'Filter items list', 'wppolitic' ),
        );
        $args = array(
            'labels'                => $labels,
            'supports'              => array('title','editor','thumbnail','author' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => 'wppolitic_menu',
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-format-gallery',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,       
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        );
        register_post_type( 'wppolitic_portfolio', $args );

        $labels = array(
            'name'                       => _x( 'Categories', 'Taxonomy General Name', 'wppolitic' ),
            'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'wppolitic' ),
            'menu_name'                  => __( 'Categories', 'wppolitic' ),
            'all_items'                  => __( 'All Items', 'wppolitic' ),
            'parent_item'                => __( 'Parent Item', 'wppolitic' ),
            'parent_item_colon'          => __( 'Parent Item:', 'wppolitic' ),
            'new_item_name'              => __( 'New Item Name', 'wppolitic' ),
            'add_new_item'               => __( 'Add New Item', 'wppolitic' ),
            'edit_item'                  => __( 'Edit Item', 'wppolitic' ),
            'update_item'                => __( 'Update Item', 'wppolitic' ),
            'view_item'                  => __( 'View Item', 'wppolitic' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'wppolitic' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'wppolitic' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'wppolitic' ),
            'popular_items'              => __( 'Popular Items', 'wppolitic' ),
            'search_items'               => __( 'Search Items', 'wppolitic' ),
            'not_found'                  => __( 'Not Found', 'wppolitic' ),
            'no_terms'                   => __( 'No items', 'wppolitic' ),
            'items_list'                 => __( 'Items list', 'wppolitic' ),
            'items_list_navigation'      => __( 'Items list navigation', 'wppolitic' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy( 'wppolitic_portfolio_cat', array( 'wppolitic_portfolio' ), $args );
       }
         add_action( 'init', 'wppolitic_custom_post_register');

    }
?>