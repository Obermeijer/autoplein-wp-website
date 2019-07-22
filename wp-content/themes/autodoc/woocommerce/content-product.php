<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>

<li <?php post_class( $classes ); ?>>
  <div class="product-container">
    <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
    <div class="product-image">
      <a href="<?php the_permalink(); ?>">
      <?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
      </a>
      <?php
	  	$attach_ids = $product->get_gallery_image_ids();
		$attachment_count = count( $product->get_gallery_image_ids() );
		if($attachment_count > 0){
			$image_link = wp_get_attachment_url( $attach_ids[0] ); 
			$image = wp_get_attachment_image( $attach_ids[0], 'shop_catalog');
			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a class="slider_img" href="%s">%s</a>', get_the_permalink(), $image ), $product->get_id() );
		}
	  ?>
    </div>
   <div class="product-bottom"> 
  <a href="<?php the_permalink(); ?>" class="product-name"><?php the_title(); ?></a>
        
    
      <div class="price-box">
        <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
      </div>
      
      <div class="product-desc">
          <p><?php echo pixtheme_limit_words(apply_filters( 'woocommerce_short_description', $post->post_excerpt ), 15) ?></p>
      </div>
      <?php if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) :?> 
      <div class="product-rating">
        <?php if ( $rating_html = wc_get_rating_html($product->get_average_rating()) ) : ?>
			<?php echo wp_kses_post($rating_html); ?>
        <?php endif; ?>
      </div>
      <?php endif; ?>
        
   	  <div class="btn-group">
      <?php 
   		echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="btn btn-primary btn-icon-right %s product_type_%s"><i class="fa fa-spinner fa-spin"></i>%s<div class="btn-icon"><i class="fa fa-long-arrow-right"></i>  </div></a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( $product->get_id() ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		esc_attr( $product->get_type() ),
		esc_html( $product->add_to_cart_text() )
	),
$product );
   	  ?>
    
                      
   </div>
                      
            <?php //do_action( 'woocommerce_after_shop_loop_item' ); ?>
       
    </div>
  </div>
</li>
