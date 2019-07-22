<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */
?>



<div class="toolbar-wrap">
	<?php
        /**
         * woocommerce_before_shop_loop hook
         *
         * @hooked woocommerce_result_count - 20
         * @hooked woocommerce_catalog_ordering - 30
         */
        do_action( 'woocommerce_before_shop_loop_tool' );
    ?>
</div>         
          
          

<div class="catalog-grid">
            <ul class=" product-grid">
            
