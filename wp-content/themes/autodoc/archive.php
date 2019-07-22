<?php 
$custom = isset ($wp_query) ? get_post_custom($wp_query->get_queried_object_id()) : '';
$layout = isset ($custom['pix_page_layout']) ? $custom['pix_page_layout'][0] : '2';
$sidebar = isset ($custom['pix_selected_sidebar'][0]) ? $custom['pix_selected_sidebar'][0] : 'Blog Sidebar';
?>

 <?php get_header();?>
 

<main class="section" id="main">
  <div class="container">
    <div class="row"> 
    
    
    
     <?php if ($layout == '3'):?>
     <div class="col-xs-12 col-sm-3 col-md-3">
        <aside class="sidebar">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?> <?php   endif;?>
        </aside></div>
      <?php endif?>
      
      
    
       <div class="col-xs-12 col-sm-9 col-md-9  <?php if ($layout == '3'):?>  col2-left  <?php endif?>   <?php if ($layout == '2'):?>  col2-right  <?php endif?>">  
        <section role="main" class="main-content">
        
   
            <?php
				if ( have_posts() ) 
					the_post();
				rewind_posts();       
				get_template_part( 'loop', 'archive' );
            ?>
    
        
        </section></div>
        
        
        
        	 
      
      
        <?php if ($layout == '2'):?>
	   <div class="col-xs-12 col-sm-3 col-md-3">
        <aside class="sidebar">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?> <?php   endif;?>
        </aside></div>
	  <?php endif?>
      
      
      
      
    
    </div>
    </div>
    </main>
    
    
 

<?php get_footer(); ?>