<?php
/**
 * Template Name: Portfolio  Single Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wppolitic
 */

get_header();?>
<div class="page-wrapper clear">
		<?php if( have_posts() ) : ?>

			<?php while( have_posts() ) : the_post(); ?>

				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="branding-img">
								<?php 
								if(has_post_thumbnail() ){ 
									the_post_thumbnail( 'politic_portfolio_content_image', array( 'class' => 'img-responsive' ) );
								 }?>
							</div>
						</div> 
						<div class="col-lg-6">
							<div class="banner-info">
								<h4><?php the_title(); ?></h4>
								<?php the_content(); ?>
							   <div class="row">
								<?php $details  = get_post_meta( get_the_ID(),'_wppolitic_project_details', true ); ?>
								<?php $names  = get_post_meta( get_the_ID(),'_wppolitic_name_id', true ); ?>
								<?php $company  = get_post_meta( get_the_ID(),'_wppolitic_company_id', true ); ?>
								<?php $single_team  = get_post_meta( get_the_ID(),'_wppolitic_single_team', true ); ?>
								<?php $project_detailsp  = get_post_meta( get_the_ID(),'_wppolitic_project_detailsp', true ); ?>
								<?php $show_project  = get_post_meta( get_the_ID(),'_wppolitic_show_project', true ); ?>
							   <div class="col-sm-6">
									<ul>
										<?php
										if($names){
											foreach( (array) $names as $name_akey => $name_a ){ 

											$name1=$name2="";

											if(isset($name_a['start_name'])){

											$name1=$name_a['start_name'];
											}

											if(isset($name_a['start_add'])){
											$name2=$name_a['start_add'];
										}
										?>
										<li><span><?php echo esc_html( $name1 ); ?>: </span><?php echo esc_html( $name2 ); ?>
										</li>
									<?php  } } ?>

									</ul>
							   </div>
							   <div class="col-sm-6">
									<ul>

										<?php
										if($company){
										foreach( (array) $company as $com_akey => $com_a ){ 

										$company=$company_address="";

										if(isset($com_a['start_com'])){
										$company=$com_a['start_com'];
										}
										if(isset($com_a['start_com_ad'])){
										$company_address=$com_a['start_com_ad'];
										}

										?>
										<li>
										<span><?php echo esc_html( $company ); ?>: </span><?php echo esc_html( $company_address ); ?>
										</li>
										<?php  } } ?>
									</ul>
							   </div>
							   </div>
							</div>
						</div> 
					</div>

					<div class="related-projects-area">
						<div class="row">
							<?php 
							$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3,'post_type' => 'wppolitic_portfolio', 'post__not_in' => array($post->ID) ) );

							if( $related ){
								$wppolitic_related_porject_title = wppolitic_get_option( 'wppolitic_related_porject_title', 'wppolitic_portfilio_settings','RELATED PROJECT' );
								if( !empty($wppolitic_related_porject_title) ):
								?>
								<div class="col-lg-12 ">
									<h2 class="related-projects-title"><?php esc_html_e( $wppolitic_related_porject_title, 'wppolitic'); ?></h2>
								</div>

								<?php
								endif;

							 foreach( $related as $post ) { setup_postdata($post); ?>
									<article class="col-lg-4 col-md-4">
										<div class="single-related-project">
											<div class="related-project-img">
												<a href="<?php echo esc_url( get_permalink() );?>">
													<?php if ( has_post_thumbnail() ) : 
													
														 the_post_thumbnail('wppolitic_portfolio_content_image');
													 endif; ?>
												</a>
											</div>
											<div class="portfolio-item-info">
												<h3><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?></a></h3>

											<?php $portfolio_categories = get_the_terms(get_the_id(),'wppolitic_portfolio_cat'); ?>
													
												<?php if( $portfolio_categories ){
													foreach( $portfolio_categories as $portfolio_category ) { ?> 
														<span class="portfolio-item-category"> 
															<?php echo esc_html( $portfolio_category->name ); ?>
														</span>
												<?php }} ?>
												
											</div>
										</div>
									</article>
							<?php }  } ?>
						</div>
					</div>
				</div>

			<?php endwhile; // while has_post(); ?>

		<?php endif; // if has_post() ?>
</div><!-- #primary -->
<?php
get_footer();