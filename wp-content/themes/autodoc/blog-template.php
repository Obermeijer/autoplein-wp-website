<?php /* Template Name: Blog Template*/ 

//$custom =  get_post_custom(get_queried_object()->ID);

$custom = isset ($wp_query) ? get_post_custom($wp_query->get_queried_object_id()) : '';
$layout = isset ($custom['pix_page_layout']) ? $custom['pix_page_layout'][0] : '2';
$sidebar = isset ($custom['pix_selected_sidebar'][0]) ? $custom['pix_selected_sidebar'][0] : 'Blog Sidebar';
$pix_options = get_option('pix_general_settings');
$posts_per_page = rwmb_meta('blog_post_per_page');
$exclude = rwmb_meta( 'blog_page_categories_not' , 'type=taxonomy&taxonomy=category');
$cat_slug = array();
foreach ($exclude as $cat) {
	array_push($cat_slug, $cat->term_id);
}
?>

<?php get_header();?>

<main class="section" id="main">
  <div class="container">
    <div class="row"> 
    
      <?php if ($layout == '3'):?>
        <div class="col-xs-12 col-sm-12 col-md-3">
        <aside class="sidebar">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?> <?php   endif;?>
        </aside>
      </div>
      <?php endif?>
            
       <div class="col-xs-12 <?php if ($layout == '1'):?>  col-sm-12 col-md-12 <?php else: ?> col-sm-12 col-md-9 <?php endif?>">  
        <section role="main" class="main-content">
        
            <div class="post-list">
                <?php 
                    $temp = $wp_query;
                    $wp_query= null;
                    $wp_query = new WP_Query();
					$args = array(
                        'posts_per_page'  => $posts_per_page,
                        'post_type'       => 'post',
                        'paged'           => $paged,
                        'category__not_in' => $cat_slug
                    );
                    $wp_query->query($args);			
                    get_template_part( 'loop', 'index' );
                ?>   
        	</div>
        
        </section>
       </div>
      
        <?php if ($layout == '2'):?>
           <div class="col-xs-12 col-sm-12 col-md-3">
            <aside class="sidebar">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?> <?php   endif;?>
            </aside>
        </div>
        <?php endif?>
      
    </div>
  </div>
</main>
    
<?php get_footer(); ?>