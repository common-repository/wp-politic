<?php
/**
 * Template Name: Campaign Single Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wppolitic
 */

get_header();?>
<div class="page-wrapper clear">
	<?php
		while ( have_posts() ) : the_post();
			$relatedtitle = wppolitic_get_option( 'wppolitic_readmore_text', 'settings' );
			$campaign_location_label  = get_post_meta( get_the_ID(),'_wppolitic_campaign_wppolitic_organizer', true );
			$campaign_date_label  = get_post_meta( get_the_ID(),'_wppolitic_campaign_phone', true );
			$campaign_time_label = get_post_meta( get_the_ID(),'_wppolitic_campaign_website', true );
			$campaign_date  = get_post_meta( get_the_ID(),'_wppolitic_campaign_date', true );
			$campaign_location  = get_post_meta( get_the_ID(),'_wppolitic_loaction', true );
			$campaign_time  = get_post_meta( get_the_ID(),'_wppolitic_campaign_time', true );
			$campaign_map  = get_post_meta( get_the_ID(),'_wppolitic_campaign_map', true );		
			$campaign_map_lat  = get_post_meta( get_the_ID(),'_wppolitic_campaign_map_lat', true );	
			$campaign_map_lng  = get_post_meta( get_the_ID(),'_wppolitic_campaign_map_lng', true );		
			$names  = get_post_meta( get_the_ID(),'_wppolitic_name_list_campaign', true );	

	?>
            <section class="events-details-ara ptb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
							<?php if(!empty($campaign_map)){?>
							<div class="wppolitic_map_wrapper">
								<div id="wppolitic_googleMap"></div>
							</div>
							<?php }?>
							<div class="wppolitic_campaign_content">
								<h3><?php echo  get_the_title(); ?></h3>					
								<?php the_content(); ?>
							</div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="event-details-sidebar">
                                <div class="enother-event-details">
                                    <div class="wppolitic_timer wppolitic_timer-details">
										<?php 
										$count_date = date( "Y/m/j", strtotime( $campaign_date ) );
										?>
                                        <div data-countdown="<?php echo esc_attr( $count_date ); ?>"></div>
                                    </div>
                                    <div class="wppolitic_event-list">
                                        <ul>

										<?php if(!empty($campaign_location)){?>
											<li><span><?php echo esc_html( $campaign_location_label ); ?></span> 
											<?php echo esc_html( $campaign_location ); ?></li>

										<?php }?>
										<?php if(!empty($campaign_date)){
											
											$dateformate = get_option('date_format');
											$campaign_date = strtotime( $campaign_date );

											?>
											<li><span><?php echo esc_html( $campaign_date_label ); ?></span> <?php echo esc_html( date_i18n( $dateformate, $campaign_date ) ); ?></li>
	
										<?php } ?>
										<?php if(!empty($campaign_time)){ 
											
											$timeformate = get_option('time_format');
											$campaign_time = strtotime( $campaign_time );
											
											?>
											<li><span><?php echo esc_html( $campaign_time_label ); ?> </span><?php echo esc_html( date_i18n( $timeformate, $campaign_time ) ); ?></li>
										<?php }?>
										<?php if(is_array( $names )){
											foreach( $names as $name_a ){ ?>
												<li><span><?php echo esc_html($name_a['campaign_name']); ?> </span> 
												<?php echo esc_html($name_a['campaign_add']); ?></li>
											<?php  }
										}?>
                                        </ul>
                                    </div>
								</div>
								<div class="event-details-slider">
									<div class="campaign_img">
										<?php 
											if(has_post_thumbnail() ){
												the_post_thumbnail( 'politic_blog_single_image', array( 'class' => 'img-responsive' ) );
											}?>
									</div>
								</div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php if (!empty($campaign_map)) { ?>


		<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo esc_attr( $campaign_map ); ?>"></script>
		<script>
			// When the window has finished loading create our google map below
			google.maps.event.addDomListener(window, 'load', init);

			function init() {
				// Basic options for a simple Google Map
				// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
				var mapOptions = {
					// How zoomed in you want the map to start at (always required)
					zoom: 11,

					scrollwheel: false,

					// The latitude and longitude to center the map (always required)
					center: new google.maps.LatLng(<?php echo esc_html( $campaign_map_lat ); ?>, <?php echo esc_html( $campaign_map_lng ); ?>), // New York

					// How you would like to style the map. 
					// This is where you would paste any style found on Snazzy Maps.
					styles: [
								{
									"featureType": "administrative",
									"elementType": "labels.text.fill",
									"stylers": [
										{
											"color": "#444444"
										}
									]
							    },
							    {
							        "featureType": "administrative.country",
							        "elementType": "geometry.fill",
							        "stylers": [
							            {
							                "hue": "#ff0000"
							            },
							            {
							                "saturation": "-10"
							            },
							            {
							                "visibility": "simplified"
							            }
							        ]
							    },
							    {
							        "featureType": "landscape",
							        "elementType": "all",
							        "stylers": [
							            {
							                "color": "#f2f2f2"
							            }
							        ]
							    },
							    {
							        "featureType": "poi",
							        "elementType": "all",
							        "stylers": [
							            {
							                "visibility": "off"
							            }
							        ]
							    },
							    {
							        "featureType": "road",
							        "elementType": "all",
							        "stylers": [
							            {
							                "saturation": -100
							            },
							            {
							                "lightness": 45
							            }
							        ]
							    },
							    {
							        "featureType": "road.highway",
							        "elementType": "all",
							        "stylers": [
							            {
							                "visibility": "simplified"
							            }
							        ]
							    },
							    {
							        "featureType": "road.arterial",
							        "elementType": "labels.icon",
							        "stylers": [
							            {
							                "visibility": "off"
							            }
							        ]
							    },
							    {
									"featureType": "transit",
									"elementType": "all",
									"stylers": [
										{
											"visibility": "off"
										}
									]
								},
								{
									"featureType": "water",
									"elementType": "all",
									"stylers": [
										{
										"color": "#ec464b"
										},
										{
											"visibility": "on"
										}
									]
								}
							]
				};

				// Get the HTML DOM element that will contain your map 
				// We are using a div with id="map" seen below in the <body>
				var mapElement = document.getElementById('wppolitic_googleMap');

				// Create the Google Map using our element and options defined above
				var map = new google.maps.Map(mapElement, mapOptions);

				// Let's also add a marker while we're at it
				var marker = new google.maps.Marker({
				position: new google.maps.LatLng(<?php echo esc_html( $campaign_map_lat ); ?>, <?php echo esc_html( $campaign_map_lng ); ?>),
				map: map,
				title: 'Politic!'
			});
		}
		</script>

		<?php } ?>
			<?php
		endwhile; // End of the loop.
	?>
</div><!-- #primary -->
<?php
get_footer();