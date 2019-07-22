<?php /*** The loop that displays posts.***/ ?>

<?php 

$custom = get_option('page_for_posts') != '' ? get_post_custom(get_option('page_for_posts')) : '';
$layout = isset ($custom['pix_page_layout']) && $custom['pix_page_layout'][0] == '1' ? 3 : 2;
$pix_options = get_option('pix_general_settings');
$grid_list = !empty($pix_options['pix_blog_layout']) && $pix_options['pix_blog_layout'] == 1 ? "grid" : "list";
$grid_list_md = isset ($custom['pix_page_layout']) && $custom['pix_page_layout'][0] == '1' ? '4' : '6';
$i=0;
?>

<?php if ( ! have_posts() ) : ?>
	<div  class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'PixTheme' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'PixTheme' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?> 

<?php while ( have_posts() ) : the_post(); ?>
        
    <?php if(!empty($pix_options['pix_blog_layout']) && $pix_options['pix_blog_layout'] == 1): ?>
    <?php 
	if( ($i % $layout) == 0 ){ 
		if($i > 0)	
			echo '</div>';
		echo '<div class="row">';
	}	
	?>
    <div class="col-xs-12 col-sm-12 col-md-<?php echo esc_attr($grid_list_md);?> ">
    <?php endif; ?>
      
    	<article id="post-<?php esc_attr(the_ID());?>" <?php post_class('clearfix post-'.$grid_list); ?> >
        	
        <?php			
			$pixtheme_format  = get_post_format();
			$pixtheme_format = !in_array($pixtheme_format, array("quote", "gallery", "video")) ? 'standared' : $pixtheme_format;		
            get_template_part( 'template-parts/post-format/blog', $pixtheme_format);
            get_template_part( 'template-parts/blog-template/blog', 'template');
		?> 
         		
    	</article>
    <?php if(!empty($pix_options['pix_blog_layout']) && $pix_options['pix_blog_layout'] == 1): ?>
     </div>
    <?php endif; ?>
    
    

<?php $i++;  endwhile;?>

<div class="pagination clearfix">
    <?php 
        if ( $wp_query->max_num_pages > 1 ) :
	include(PIX_funcPATH. 'wp-pagenavi.php' );
	if(function_exists('wp_pagenavi')) { wp_pagenavi();}
	endif; 
    ?>
</div>
