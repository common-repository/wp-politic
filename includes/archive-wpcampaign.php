<?php
/**
 * Template Name: Campaign Single Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wppolitic
 */

get_header();

?>
<div class="page-wrapper clear wppolitic-details">
	<div class="container">
		<div class="row">
			<?php
				if ( have_posts() ) : 
                    while( have_posts() ):the_post();
                        $short_des = get_post_meta( get_the_ID(),'_wppolitic_campaign_short_des', true ); 

                        $wppolitic_related_campaign_style = wppolitic_get_option( 'wppolitic_related_campaign_style', 'wppolitic_settings' );
                      $wppolitic_readmore_text = wppolitic_get_option( 'wppolitic_readmore_text', 'wppolitic_settings' );
                      $wppolitic_posts_content = (int)wppolitic_get_option( 'wppolitic_posts_content', 'wppolitic_settings' );
                    	?>
                    	<div class="col-lg-6 col-md-12">
	                    	<div class="<?php echo esc_attr( $wppolitic_related_campaign_style ) ?>">
								<div class="wp-campaign-box">
									<div class="wp-campaign-image">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('wppolitic_img550x348');?>
										</a>
									</div>
									<div class="wp-campaign-content">
										<div class="campaign-time">
											<i class="fa fa-clock-o"></i>
											<span class="wppolitic_timer">
												<?php $campaign_date  = get_post_meta( get_the_ID(),'_wppolitic_campaign_date', true );
												$count_date = date( "Y/m/j", strtotime( $campaign_date ) );
												?>
												<span class="count_style_1" data-countdown="<?php echo esc_attr( $count_date); ?>"></span>
											</span>
										</div>
										<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
										<ul class="wp-campaign-meta">
											<?php
											$dateformate = get_option('date_format');
											$campaign_date = strtotime( $campaign_date );

											?>
			                                <li><i class="fa fa-calendar"></i> <?php echo esc_html( date_i18n( $dateformate, $campaign_date ) ); ?></li>
			                                <li><i class="fa fa-user"></i> <?php the_author();?></li>
			                            </ul>
			                            <?php echo '<p>'.wp_trim_words( $short_des, $wppolitic_posts_content, '' ).'</p>';?>

			                            <?php if(!empty($wppolitic_readmore_text)){ ?>
			                            <a class="cmapaign-redmore" href="<?php the_permalink(); ?>"><?php echo $wppolitic_readmore_text; ?></a>
			                        	<?php } ?>
									</div>
								</div>
							</div>
                        </div>
                    <?php endwhile; ?>
                    <!-- Pagination -->
					<div class="col-md-12">
						<div class="wp-campaign-pagination">
							<?php  wppolitic_pagination();?>
						</div>
					</div>
				<?php endif; ?>
        </div>
	</div>
</div>

<?php

get_footer();