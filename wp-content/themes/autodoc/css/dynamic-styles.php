<?php header("Content-type: text/css; charset: UTF-8"); 
global $woocommerce;
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
$pix_options = get_option('pix_general_settings');
$pix_customize = get_option( 'pix_customize_options' );
$pix_woo = class_exists( 'WooCommerce' ) ? wc_get_image_size( 'shop_catalog' ) : '';


?>

<?php if($pix_customize['bg_color'] != ''):?>
.layout-theme {
    background:<?php echo esc_attr($pix_customize['bg_color'])?>;
}
<?php endif?>
<?php if($pix_customize['bg_image'] != ''):?>
.layout-theme {
    background-image: url(<?php echo esc_url($pix_customize['bg_image'])?>);
}
<?php endif?>
   
   
  <?php if($pix_customize['third_color'] != ''):?>  
     

html .full-width-box {
    background:<?php echo esc_attr($pix_customize['third_color'])?>;
}
.full-width-right .wpcf7 input[type="text"], .full-width-right .wpcf7 input[type="email"], .full-width-right .wpcf7 input[type="tel"], .full-width-right .wpcf7 textarea {
  background: none repeat scroll 0 0 <?php echo esc_attr($pix_customize['third_color'])?> !important;
    border: 1px solid <?php echo esc_attr($pix_customize['third_color'])?>!important;
}
  
   <?php endif?>
   


<?php if($pix_customize['first_color'] != ''):?>

 <!--START FIRST COLOR  -->
 
html .btn-icon-right .btn-icon, html .pre-fot-box .btn-icon, html .contactForm input[type="text"], html .contactForm input[type="email"], html .contactForm input[type="tel"], html .contactForm textarea {
    background-color: <?php echo esc_attr($pix_customize['first_color'])?>;
    }

html .pre-fot-box, html body .carousel-brand .bx-controls-direction a.bx-next {
    border-color: <?php echo esc_attr($pix_customize['first_color'])?>;
}


html .home-section.section-preset2, html .theme-section.section-preset2 {
    background-color: <?php echo esc_attr($pix_customize['first_color'])?>;
}


html .pre-fot-box .btn-icon{
 background-color: <?php echo esc_attr($pix_customize['first_color'])?>;
}
html body input[type='submit'] {
    background-color: <?php echo esc_attr($pix_customize['first_color'])?>;
    border: 1px solid <?php echo esc_attr($pix_customize['first_color'])?>;
}

html .ip-header .ip-loader svg path.ip-loader-circle {
    stroke: <?php echo esc_attr($pix_customize['first_color'])?>;
}

html .ver-tabs .nav > .active, .ver-tabs.horiz-tabs .nav > .active {
    background-color: <?php echo esc_attr($pix_customize['first_color'])?>;
}
html .btn-primary {
    background-color: <?php echo esc_attr($pix_customize['first_color'])?>;
}
html .home-section.section-preset1, html .theme-section.section-preset1 {
    background-color: <?php echo esc_attr($pix_customize['first_color'])?>;
}
html .carousel-testi .bx-wrapper .bx-pager {
    background-color: <?php echo esc_attr($pix_customize['first_color'])?>;
}
html .box-icon-and-button > .html fa, html .box-icon-and-button > .fa::after, html .box-icon-and-button > .fa::before {
    color: <?php echo esc_attr($pix_customize['first_color'])?> !important;
}
html .btn-primary:hover, html .btn-primary:focus, html .btn-primary.focus, html .btn-primary:active, html .btn-primary.active, html .open > .dropdown-toggle.btn-primary {
    background-color: <?php echo esc_attr($pix_customize['first_color'])?>;
}
html .footer-shop {
    background-color: <?php echo esc_attr($pix_customize['first_color'])?>;
}
html .dropdown-menu > li > a:hover, html .dropdown-menu > li > a:focus {
    background-color: <?php echo esc_attr($pix_customize['first_color'])?>;
}

.carousel-testi .bx-wrapper .bx-pager::after {
    border-bottom-color: <?php echo esc_attr($pix_customize['first_color'])?>;
    border-right-color: <?php echo esc_attr($pix_customize['first_color'])?>;
}
html .post .entry-media:hover .box-date {
    background-color: <?php echo esc_attr($pix_customize['first_color'])?>;
}


 
 <!--END FIRST COLOR-->


  <?php endif?>
  
  
  
  <?php if($pix_customize['second_color'] != ''):?>
  
  
   <!--START SECOND COLOR  -->
   
a {
    color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
.primary-color {
    color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .demo_changer .demo-icon {
    background-color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .navbar-header i, html .nav > li > a:hover, html.nav > li > a:focus, html .top-cart i, html .top-cart .icon-basket, .section-header .fa, html .ver-tabs .nav-sidebar h4, html .bx-wrapper .bx-controls-direction a, html .meta a, html .ft-icons-simple .fa, html .ft-icons-simple .fa::after, html.ft-icons-simple .fa::before, html .fot-contact i {
    color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
.ft-icons-simple .fa, .ft-icons-simple .fa::after, .ft-icons-simple .fa::before {
    color: <?php echo esc_attr($pix_customize['second_color'])?> !important;
}
html .btn-icon, html .carousel-1 li:hover .carousel-item-content, html .bx-wrapper .bx-pager.bx-default-pager a:hover, html .bx-wrapper .bx-pager.bx-default-pager a.active, html body .carousel-brand .bx-controls-direction a.bx-next, html .full-width-box::after, html .carousel-team li:hover .btn, html .pre-footer {
    background-color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .iview-prevNav {
    background-color: <?php echo esc_attr($pix_customize['second_color'])?> !important;
}

html .active .fa-box {
    background-color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .widget-title span::after, html .widget-title::after, html .product-info .nav-tabs > li span::after, html .product-info .nav-tabs > li::after {
    border-bottom: 1px solid <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .widget-title .fa {
    color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .list-style-check li::before, html .page-header .breadcrumb a, html .person-text h4, html .person-name h5, html .product-info .nav-tabs > li span::after {
    color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .product-mini-list .price-box span, html .product-right .price-box, html .category-list .amount-cat {
    color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html blockquote, html .blockquote-reverse, blockquote.pull-right {
    background-color: #f7f7f7;
    border-color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .comment-datetime span[class*="icon-"] {
    color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .carousel-team li:hover .btn-icon {
    background-color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .full-width-box::after {
    background-color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .pre-fot-box:hover .btn-icon i, html .category-list .amount-cat {
    color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .nav .open > a, html .nav .open > a:hover, html .nav .open > a:focus {
    color: <?php echo esc_attr($pix_customize['second_color'])?> !important;
}
.pagination-wrap .active a {
    color: <?php echo esc_attr($pix_customize['second_color'])?> !important;
}
html .box-date {
    background-color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .post-grid .box-date .fa {
    color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html body .full-width-box::after {
    background-color: <?php echo esc_attr($pix_customize['second_color'])?> !important;
}
.contactForm .btn-icon-right .btn-icon {
    background: none repeat scroll 0 0 <?php echo esc_attr($pix_customize['second_color'])?> !important;
}

html .btn-icon-right .btn-icon, html .pre-fot-box .btn-icon, html .contactForm input[type="text"], html .contactForm input[type="email"], html .contactForm input[type="tel"], html .contactForm textarea {
    border-color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .footer-absolute .social-box li:hover a {
    background-color: <?php echo esc_attr($pix_customize['second_color'])?> !important;
}


html .footer-absolute {

    background-color: <?php echo esc_attr($pix_customize['second_color'])?>;
}
html .fot-box .btn-primary {
    background: <?php echo esc_attr($pix_customize['second_color'])?> !important;
}

.info-top li.fa:after, .info-top li.fa:before {
  color: <?php echo esc_attr($pix_customize['second_color'])?> !important;

}

.list-style-check li:before, .marked_list1 li:before, .marked_list2 li:before {
  color: <?php echo esc_attr($pix_customize['second_color'])?> !important;
}
   
    <!--END SECOND COLOR-->
    

  <?php endif?> 
  
  
  
   
   
   
    
  <?php if($pix_customize['font_family'] != ''):?>
html body , html .yamm .nav > li > a , html .info-top li a {
    font-family: '<?php echo esc_attr($pix_customize['font_family'])?>';
    font-weight: <?php echo esc_attr($pix_customize['font_weight'])?>;    
}
    <?php endif?>
    <?php if($pix_customize['font_title_family'] != ''):?>
html h1, html  h2, html  h3,  html  h4, html  h5, html  h6 , html .section-header .heading , html .carousel-item-content .carousel-title , html .carousel-3 .carousel-item-content .carousel-title , html .carousel-1 .carousel-item-content .carousel-title , html .featured-item-simple-icon h6 ,html  .footer-shop h6,html  .footer-shop h5, html .footer-shop h4, html  .footer-shop h3, html  .footer-shop h2, html  .footer-shop h1 , html .widget-title span , html .product-category h3 , html .product-bottom .product-name , html .product-right .product_title.entry-title{
    font-family: '<?php echo esc_attr($pix_customize['font_title_family'])?>';
    font-weight:<?php echo esc_attr($pix_customize['font_title_weight'])?>;
}
    <?php endif?>
    <?php if($pix_woo['width']):?>
    <?php /*?>#pix-shop .isotope-frame .x-item {
    width: <?php echo esc_attr($pix_woo['width'])?>px; 
}<?php */?>
    <?php endif?>
    <?php if($pix_woo['height']):?>
#pix-shop  .portfolio-image {
<?php /*?> height: <?php echo esc_attr($pix_woo['height'])?>px;<?php */?>
}
<?php endif?>
<?php if($pix_options['pix_portfolio_width']):?>
#pix-portfolio .isotope-frame .x-item  {
<?php /*?>    width: <?php echo esc_attr($pix_options['pix_portfolio_width'])?>px;<?php */?>
<?php /*?>   height: <?php echo esc_attr($pix_options['pix_portfolio_height'])?>px;<?php */?>
}
<?php endif?>
<?php if($pix_options['pix_portfolio_height']):?>
#pix-portfolio  .portfolio-image , #pix-portfolio .isotope-frame .x-item {
<?php /*?>  height: <?php echo esc_attr($pix_options['pix_portfolio_height'])?>px ;<?php */?>
}
<?php endif?>
<?php if($pix_options['pix_custom_css']):?>
<?php echo $pix_options['pix_custom_css'] ?>
<?php endif?>
