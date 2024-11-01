<?php
/**
 * Template Name: Gallery  Single Page
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
	                <?php the_content(); ?>
            </section>

			<?php
		endwhile; // End of the loop.
	?>
</div><!-- #primary -->
<?php
get_footer();