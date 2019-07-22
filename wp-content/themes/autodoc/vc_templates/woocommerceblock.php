<?php
global $post;
$out = $css_class = '';

extract(shortcode_atts(array(
	'count'=>'',
	'css_animation' => '',				
), $atts));

$css_class .= $this->getCSSAnimation($css_animation);

$out  = '<div id="shop-catalog-view" class="' . $css_class . '">';
$out .= '	
       
		
			<div class="container">
				<div class="row text-center ">			
					<ul id="filter" class="clearfix non-paginated">
						<li><a href="#" class="active " data-filter="*">'.__('All Sport', 'PixTheme').'</a></li>';																		
							$cats = get_post_meta($post->ID, "_page_portfolio_cat", $single = true); 
							$args = array( 'taxonomy' => 'product_cat', 'hide_empty' => '1', 'title_li'=> '', 'show_count' => '0', 'echo' => 0);
							$categories = wp_list_categories ($args);
$out .= '
						'.$categories.'
					</ul>
				</div>
		  
			
			
			    
        
			  <div class="isotope-frame animated" data-animation="bounceInUp">
      <ul class="isotope-filter product-grid  product-grid">';
$args = array(
			'post_type' => 'product', 
			'orderby' => 'menu_order',			 
			'order' => 'ASC', 
			'showposts' => $count
		);
$wp_query = new WP_Query( $args );
			 					
	if ($wp_query->have_posts()): 
		while ($wp_query->have_posts()) : 							
						$wp_query->the_post();
						$custom = get_post_custom($post->ID);
						$woo_product = new WC_Product($post->ID);					
						$demo_link = get_post_meta($woo_product->id, 'demo_link', true);
						$review = !empty($demo_link) ? '<a href="'.esc_url($demo_link).'" rel="nofollow" class="btn btn-link"><i class="fa fa-search-plus"></i>'.__('Preview', 'PixTheme').'</a>' : '';
						$cats = wp_get_object_terms($post->ID, 'product_cat');											   
												
						if ($cats){
							$cat_slugs = '';
							$cat_names = '';
							foreach( $cats as $cat ){
								$cat_slugs .= $cat->slug . " ";
								$cat_names .= $cat->name . ", ";
							}
							$cat_names = substr($cat_names, 0, -2);
						}
						
						$link = ''; 
						$thumbnail = get_the_post_thumbnail($post->ID, 'shop_catalog', array('class' => 'cover'));
						
$out .= '
            		
            		<li class="isotope-item  '.esc_attr($cat_slugs).' " > 
					<div class="product-container label-hot-active">
            <div class="product-image"> <span class="label-best">BESTSELLER</span> 
			
			
			<span class="label-star">
              <div id="stars-existing" class="starrr" data-rating="4"></div>
              </span>
			  
			  
              <div class="btn-action-item"> <a class="btn-cart  x-hover" > <i class="fa fa-shopping-cart"></i></a> <a > <i class="icomoon-heart"></i></a> <a data-target="#quick-view-id47" data-toggle="modal" href="include/product-only-content.html"> <i class="icomoon-search"></i></a> <a class="magnific" href="media/item/8/1.jpg"> <i class="icomoon-eye-open"></i></a> </div>
             '.$thumbnail.' <img  class=" slider_img"  
         src="http://pix-theme.com/dev/xsport/wp-content/uploads/2015/03/21-300x300.jpg"  alt="'.get_the_title($woo_product->id).'"/> </div>
            <div class="product-bottom">
              <h3 class="product-name x-hover"><span class="x-hover-text">'.get_the_title($woo_product->id).'</span></h3>
              <div class="price-box"> <span class="price-regular">$820.00</span> <span class="price-reduction">70%</span> </div>
              <div class="only-list-view">
                <div class="product-desc">
                  <p>Quod satis pecuniae sempiternum. Ut sciat oportet motum. Nunquam invenies eum. Hic de tabula. Ego vivere, ut debui, et nunc fiant. Istuc quod opus non est. Lorem ipsum occurrebat pragmaticam semper ut, si quis ita velim tibi bene recognoscere. Quorum duo te mihi videtur. </p>
                </div>
                <div class="btn-group">
                  <button class="btn btn-danger" type="button"> Add to cart </button>
                </div>
                <div class="btn-group"> <a href="#product.html" class="btn ">View more</a> </div>
              </div>
            </div>
          </div>
		                         
                     
					</li>';	
	
		 endwhile;
		 endif;
	 
$out .= '            
            	</div>	<!--end-->
			</ul>
		</div>
 
	';
$out .= '</div>';	
echo $out;