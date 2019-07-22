<?php 
/**
 * The template for displaying full width.
 *
 * @package PixTheme
 * @since 1.0
 *
 * Template Name: Full Width
 */
 
$pix_options = get_option('pix_general_settings');
?>

<?php get_header();?>

<div class="home-section">
        
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>
  
    <?php endwhile; ?>	
  
</div>

<?php get_footer();?>
