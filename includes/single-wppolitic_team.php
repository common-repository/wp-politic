<?php
/**
 * Template Name: Team  Single Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wppolitic
 */

get_header();?>
<div class="page-wrapper clear">
	<?php
		while ( have_posts() ) : the_post();

	?>

            <section class="wppolitic-team-details">
                <div class="container">
                    <div class="row">
                    	<div class=" col-md-5 col-lg-5">
	                        <div class="tab-img2">
	                            <?php 
									if(has_post_thumbnail() ){
									the_post_thumbnail( 'politic_blog_single_image', array( 'class' => 'img-responsive' ) );
									}?>
	                        </div>
                        </div>
                        <div class="col-md-7 col-lg-7">
	                        <div class="team-details-all fix">
	                            <div class="team-details-top">
	                                <div class="team-details-text">
	                                    <h1><?php echo  get_the_title(); ?></h1>
	
                                		<?php  $help_teamdeg  = get_post_meta( get_the_ID(),'_wppolitic_teamdeg', true );

		                                if( !empty($help_teamdeg) ){?>
		                                    <h3>
		                                        <?php echo esc_html( $help_teamdeg ); ?>
		                                    </h3>
		                                <?php } ?>	                                    
	                                    <?php the_content(); ?>
	                                </div>
	                                <div class="team-icon">
	                                    <ul>
				                            <?php   
				                            $help_teamsicon  = get_post_meta( get_the_ID(),'_wppolitic_teamsicon', true );
				                            foreach( (array) $help_teamsicon as $ticonskey => $ticons ){
				                                $ticons1 = $ticons2 ='';
				                                if ( isset( $ticons['_wppolitic_turl'] ) ) {
				                                    $ticons1 =  $ticons['_wppolitic_turl']; 
				                                }
				                                if ( isset( $ticons['_wppolitic_ticon'] ) ) {
				                                    $ticons2 =  $ticons['_wppolitic_ticon'];    
				                                }?>

				                                <li><a href="<?php echo esc_url($ticons1);?>" target="_blank"><i class="<?php echo esc_attr($ticons2);?>"></i></a></li>
				                                <?php } ?>
				                        </ul>  
	                                </div>
	                            </div>
	                        </div>
						</div>
                    </div>
                </div>
            </section>

			<?php
		endwhile; // End of the loop.
	?>
</div><!-- #primary -->
<?php
get_footer();