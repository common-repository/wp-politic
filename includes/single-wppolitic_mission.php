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

                        <div class="col-md-12">
	                        <div class="team-details-all fix">
	                            <div class="team-details-top">
	                                <div class="team-details-text">
	                                    <h1><?php echo the_title(); ?></h1>
	                                    
	                                    <?php the_content(); ?>
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