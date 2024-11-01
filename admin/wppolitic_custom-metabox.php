<?php
/**
* Start Meta fields
*/
add_filter( 'cmb2_init', 'wppolitic_metaboxes' );
function wppolitic_metaboxes() {
	$prefix = '_wppolitic_';
	$timeformate = get_option('time_format');
	$dateformate = get_option('date_format');
	$campaign = new_cmb2_box( array(
		'id'            => $prefix . 'campaign',
		'title'         => esc_html__( 'Campaign Option', 'wppolitic' ),
		'object_types'  => array( 'wpcampaign', ), // Post type
		'priority'   => 'high',
	) );
		$campaign->add_field( array(
			'name'       => esc_html__( 'Short Description', 'wppolitic' ),
			'desc'       => esc_html__( 'Insert Description Here', 'wppolitic' ),
			'id'         => $prefix . 'campaign_short_des',
			'type'       => 'textarea_small',
			'default' 		=> ''
			) );
			$campaign->add_field( array(
				'name'       => esc_html__( 'Location', 'wppolitic' ),
				'desc'       => esc_html__( 'Location label', 'wppolitic' ),
				'id'         => $prefix . 'campaign_wppolitic_organizer',
				'type'       => 'text',
			) );
			$campaign->add_field( array(
				'name'       => esc_html__( 'Campaign Location', 'wppolitic' ),
				'desc'       => esc_html__( 'Insert  Location here', 'wppolitic' ),
				'id'         => $prefix . 'loaction',
				'type'       => 'text',
			) );
			$campaign->add_field( array(
				'name'       => esc_html__( 'Date', 'wppolitic' ),
				'desc'       => esc_html__( 'Date label', 'wppolitic' ),
				'id'         => $prefix . 'campaign_phone',
				'type'       => 'text',
			) );			
			$campaign->add_field( array(
				'name'       => esc_html__( 'Campaign Date', 'wppolitic' ),
				'desc'       => esc_html__( 'Campaign Date', 'wppolitic' ),
				'id'         => $prefix . 'campaign_date',
				'type'       => 'text_date',
                'date_format' => 'Y/m/j'
				//'date_format' => $dateformate,
			) );
			$campaign->add_field( array(
				'name'       => esc_html__( 'Time', 'wppolitic' ),
				'desc'       => esc_html__( 'Time label', 'wppolitic' ),
				'id'         => $prefix . 'campaign_website',
				'type'       => 'text',
			) );			
			$campaign->add_field( array(
				'name'       => esc_html__( 'Time picker', 'wppolitic' ),
				'desc'       => esc_html__( 'Campaign Time', 'wppolitic' ),
				'id'         => $prefix . 'campaign_time',
				'type'       => 'text_time',
				'time_format' => $timeformate,
			) );

			$campaign->add_field( array(
				'name'       => esc_html__( 'Map Api', 'wppolitic' ),
				'desc'       => esc_html__( 'Map Api', 'wppolitic' ),
				'id'         => $prefix . 'campaign_map',
				'type'       => 'text',
			) );
			$campaign->add_field( array(
				'name'       => esc_html__( 'Map lat', 'wppolitic' ),
				'desc'       => esc_html__( 'Map lat', 'wppolitic' ),
				'id'         => $prefix . 'campaign_map_lat',
				'type'       => 'text',
			) );
			$campaign->add_field( array(
				'name'       => esc_html__( 'Map Lng', 'wppolitic' ),
				'desc'       => esc_html__( 'Map Lng', 'wppolitic' ),
				'id'         => $prefix . 'campaign_map_lng',
				'type'       => 'text',
			) );

			$group_field_id = $campaign->add_field( array(
				'id'          => $prefix . 'name_list_campaign',
				'type'        => 'group',
				'description' => esc_html__( 'Add First Entry', 'wppolitic' ),
				'options'     => array(
					'group_title'   => esc_html__( 'Left Item {#}', 'wppolitic' ), 
					'add_button'    => esc_html__( 'Add Another Entry', 'wppolitic' ),
					'remove_button' => esc_html__( 'Remove Entry', 'wppolitic' ),
					'sortable'      => true, // beta
				),
			) );

			$campaign->add_group_field( $group_field_id, array(
				'name'       => esc_html__( 'Enter Title Name', 'wppolitic' ),
				'id'         => 'campaign_name',
				'desc'       => esc_html__( 'insert title here', 'wppolitic' ),
				'type'       => 'text',
			) );				
			$campaign->add_group_field( $group_field_id, array(
				'name'       => esc_html__( 'Enter Address', 'wppolitic' ),
				'id'         => 'campaign_add',
				'desc'       => esc_html__( 'insert Info here', 'wppolitic' ),
				'type'       => 'text',
			) );
			
			$wppolitic_gallery = new_cmb2_box( array(
				'id'            => $prefix . 'wppolitic_gallery',
				'title'         => __( 'Gallery Metaboxes', 'wppolitic' ),
				'object_types'  => array( 'wppolitic_gallery', ), // Post type
				'priority'   => 'high',
			) );
		   $wppolitic_gallery->add_field( array(
			'name'       => esc_html__( 'Popup Video', 'wppolitic' ),
			'desc'       => esc_html__( 'insert video link. ex-https://youtu.be/OJ9ejTy4J98', 'wppolitic' ),
			'id'         => $prefix . 'wppolitic_gallery_video',
			'type'       => 'text_url',
		   ) );





//===================================
//Team Metaboxes
//===================================
		$team = new_cmb2_box( array(
			'id'            => $prefix . 'team',
			'title'         => esc_html__( 'team Option', 'wppolitic' ),
			'object_types'  => array( 'wppolitic_team', ), // Post type
			'priority'   => 'high',
			) );
		$team->add_field( array(
			'name'       => esc_html__( 'Designation', 'wppolitic' ),
			'desc'       => esc_html__( 'insert title here', 'wppolitic' ),
			'id'         => $prefix . 'teamdeg',
			'type'       => 'text',
			) );
// $group_field_id is the field id string, so in this case: $prefix . 'wppolitic'
		$teamgrop = $team->add_field( array(
			'id'          => $prefix . 'teamsicon',
			'type'        => 'group',
			'description' => esc_html__( 'Add Second Icon', 'wppolitic' ),
			'options'     => array(
				'group_title'   => esc_html__( 'Social Icon {#}', 'wppolitic' ), // {#} gets replaced by row number
				'add_button'    => esc_html__( 'Add Another Icon', 'wppolitic' ),
				'remove_button' => esc_html__( 'Remove Icon', 'wppolitic' ),
				'sortable'      => true, // beta
				),
			) );
		$team->add_group_field( $teamgrop, array(
			'name'       => esc_html__( 'Social Icon', 'wppolitic' ),
			'desc'       => esc_html__( 'insert Icon', 'wppolitic' ),
			'id'         => $prefix .'ticon',
			'type'       => 'text',
			) );
		$team->add_group_field( $teamgrop, array(
			'name'       => esc_html__( 'Enter Link', 'wppolitic' ),
			'desc'       => esc_html__( 'insert link here', 'wppolitic' ),
			'id'  => $prefix .'turl',
			'type' => 'text_url',					
			) );
//===================================
//Portfolio Metaboxes
//===================================
		$wppolitic_portfolio = new_cmb2_box( array(
			'id'            => $prefix . 'wppolitic',
			'title'         => __( 'Portfolio Metaboxes', 'wppolitic' ),
			'object_types'  => array( 'wppolitic_portfolio', ), // Post type
			'priority'   => 'high',
		) );
		   $wppolitic_portfolio->add_field( array(
			'name'       => esc_html__( 'Popup Video', 'wppolitic' ),
			'desc'       => esc_html__( 'insert video link. ex-www.youtube.com/watch?v=TLnmb07WQ-s', 'wppolitic' ),
			'id'         => $prefix . 'por_video',
			'type'       => 'text_url',
		   ) );
				$group_field_id = $wppolitic_portfolio->add_field( array(
					'id'          => $prefix . 'name_id',
					'type'        => 'group',
					'description' => esc_html__( 'Add First Entry', 'wppolitic' ),
					'options'     => array(
						'group_title'   => esc_html__( 'Left Item {#}', 'wppolitic' ), 
						'add_button'    => esc_html__( 'Add Another Entry', 'wppolitic' ),
						'remove_button' => esc_html__( 'Remove Entry', 'wppolitic' ),
						'sortable'      => true, // beta
					),
				) );

				$wppolitic_portfolio->add_group_field( $group_field_id, array(
					'name'       => esc_html__( 'Enter Name', 'wppolitic' ),
					'id'         => 'start_name',
					'desc'       => esc_html__( 'insert title here', 'wppolitic' ),
					'type'       => 'text',
				) );				
				$wppolitic_portfolio->add_group_field( $group_field_id, array(
					'name'       => esc_html__( 'Enter Address', 'wppolitic' ),
					'id'         => 'start_add',
					'desc'       => esc_html__( 'insert Info here', 'wppolitic' ),
					'type'       => 'text',
				) );
				
				$group_field_id = $wppolitic_portfolio->add_field( array(
					'id'          => $prefix . 'company_id',
					'type'        => 'group',
					'description' => esc_html__( 'Add First Entry', 'wppolitic' ),
					'options'     => array(
						'group_title'   => esc_html__( 'Right Item {#}', 'wppolitic' ), 
						'add_button'    => esc_html__( 'Add Another Entry', 'wppolitic' ),
						'remove_button' => esc_html__( 'Remove Entry', 'wppolitic' ),
						'sortable'      => true, // beta
					),
				) );

				$wppolitic_portfolio->add_group_field( $group_field_id, array(
					'name'       => esc_html__( 'Enter Name', 'wppolitic' ),
					'id'         => 'start_com',
					'desc'       => esc_html__( 'insert Second here', 'wppolitic' ),
					'type'       => 'text',
				) );				
				$wppolitic_portfolio->add_group_field( $group_field_id, array(
					'name'       => esc_html__( 'Enter Address', 'wppolitic' ),
					'id'         => 'start_com_ad',
					'desc'       => esc_html__( 'insert info here', 'wppolitic' ),
					'type'       => 'text',
				) );
				

				$group_field_id = $wppolitic_portfolio->add_field( array(
					'id'          => $prefix . 'single_team',
					'type'        => 'group',
					'description' => esc_html__( 'Add First Entry', 'wppolitic' ),
					'options'     => array(
						'group_title'   => esc_html__( 'Right Item {#}', 'wppolitic' ), 
						'add_button'    => esc_html__( 'Add Another Entry', 'wppolitic' ),
						'remove_button' => esc_html__( 'Remove Entry', 'wppolitic' ),
						'sortable'      => true, // beta
					),
				) );


//===================================
//Mission Metaboxes
//===================================
	$wppolitic_mission = new_cmb2_box( array(
		'id'            => $prefix . 'mission',
		'title'         => esc_html__( 'Mission Option', 'wppolitic' ),
		'object_types'  => array( 'wppolitic_mission', ), // Post type
		'priority'   => 'high',
	) );
		$wppolitic_mission->add_field( array(
			'name'       => esc_html__( 'Short Description', 'wppolitic' ),
			'desc'       => esc_html__( 'Insert Description Here', 'wppolitic' ),
			'id'         => $prefix . 'mission_short_des',
			'type'       => 'textarea_small',
			'default' 		=> ''
			) );

			$group_field_id = $wppolitic_mission->add_field( array(
				'id'          => $prefix . 'target_list_mission',
				'type'        => 'group',
				'description' => esc_html__( 'Mission Target Content', 'wppolitic' ),
				'options'     => array(
					'group_title'   => esc_html__( 'Mission Caption {#}', 'wppolitic' ), 
					'add_button'    => esc_html__( 'Add Another Entry', 'wppolitic' ),
					'remove_button' => esc_html__( 'Remove Entry', 'wppolitic' ),
					'sortable'      => true, // beta
				),
			) );

			$wppolitic_mission->add_group_field( $group_field_id, array(
				'name'       => esc_html__( 'Enter Title Name', 'wppolitic' ),
				'id'         => 'mission_name',
				'desc'       => esc_html__( 'Insert title here', 'wppolitic' ),
				'type'       => 'text',
			) );				
			$wppolitic_mission->add_group_field( $group_field_id, array(
				'name'       => esc_html__( 'percent', 'wppolitic' ),
				'id'         => 'mission_percent',
				'desc'       => esc_html__( 'insert Info here (60)', 'wppolitic' ),
				'type' => 'text',
					'attributes' => array(
						'type' => 'number',
						'pattern' => '\d*',
					),

			) );			
			$wppolitic_mission->add_group_field( $group_field_id, array(
				'name'       => esc_html__( 'percent color', 'wppolitic' ),
				'id'         => 'mission_color',
				'desc'       => esc_html__( 'Select color', 'wppolitic' ),
				'type' => 'colorpicker',
				'default' =>'#e03927',

			) );

		   $wppolitic_mission->add_field( array(
			'name'       => esc_html__( 'Popup Video', 'wppolitic' ),
			'desc'       => esc_html__( 'insert video link. ex-https://youtu.be/OJ9ejTy4J98', 'wppolitic' ),
			'id'         => $prefix . 'mission_video',
			'type'       => 'text_url',
		   ) );
		   $wppolitic_mission->add_field( array(
			'name'       => esc_html__( 'Video Thumbnail', 'wppolitic' ),
			'desc'       => esc_html__( 'insert video thumbnail', 'wppolitic' ),
			'id'         => $prefix . 'mission_video_thumbnail',
			'type'       => 'file',
		   ) );

}