<?php
/********************* DEFINE MAIN PATHS ********************/
define('PIX_funcPATH', get_template_directory() . '/library/functions/');
$adminPath = get_template_directory() . '/library/admin/';
$funcPath = get_template_directory() . '/library/functions/';
$incPath = get_template_directory() . '/library/includes/';
global $pix_options;
$pix_options = isset($_POST['options']) ? $_POST['options'] : get_option('pix_general_settings');
/************************************************************/

/********************* ADMIN LOGO ********************/
function pix_login_logo(){
	global $pix_options;
	$logo = '';
	
	if(!empty($pix_options['pix_logo']))
        $logo = $pix_options['pix_logo'];
    elseif ( get_header_image() )
        $logo = get_header_image();
    else
		$logo = get_template_directory_uri().'/images/logo.jpg';
    
	echo '
   <style type="text/css">
        #login h1 a { background: url(' . $logo . ') no-repeat center 0 !important; 
        height: 60px;
        width: 310px;
        text-align: center;
	}
    </style>';
}

add_action('login_head', 'pix_login_logo');
add_filter('login_headerurl', create_function('', 'return get_home_url();'));
add_filter('login_headertitle', create_function('', 'return false;'));

/* include rwmb metabox */
if (!defined('RWMB_URL') && !defined('RWMB_DIR'))
	{
	define('RWMB_URL', trailingslashit(get_template_directory_uri() . "/library/functions/meta-box"));
	define('RWMB_DIR', trailingslashit(get_template_directory() . "/library/functions/meta-box"));
	}

require_once RWMB_DIR . "meta-box.php";

/************* LOAD REQUIRED SCRIPTS AND STYLES *************/

function pixtheme_loadscripts()
	{
	global $post;
	$pix_options = isset($_POST['options']) ? $_POST['options'] : get_option('pix_general_settings');
	if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin())
		{
		/* MAIN CSS */
		wp_enqueue_style('style', get_stylesheet_uri());
		wp_enqueue_style('pixtheme-woocommerce', get_template_directory_uri() . '/woocommerce/assets/css/woocommerce.css');
		wp_enqueue_style('pixtheme-woocommerce-layout', get_template_directory_uri() . '/woocommerce/assets/css/woocommerce-layout.css');
		if (pixtheme_get_option('pix_responsive','1'))
			{
			wp_enqueue_style('pixtheme-responsive', get_template_directory_uri() . '/css/responsive.css');
			}
		  else
			{
			wp_enqueue_style('pixtheme-no-responsive', get_template_directory_uri() . '/css/no-responsive.css');
			}
			
			
		
       
        
			
			
		wp_dequeue_style('js_composer_front');
		wp_deregister_style('js_composer_front');
		wp_enqueue_style('pix_composer-css-min', get_template_directory_uri() . '/css/js_composer.min.css');
			wp_enqueue_style('pix_composer-css', get_template_directory_uri() . '/css/js_composer.css');


		/* PRIMARY CSS */
	
		wp_enqueue_style('pixtheme-bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style('pixtheme-shop', get_template_directory_uri() . '/css/shop.css');
		wp_enqueue_style('pixtheme-theme', get_template_directory_uri() . '/css/theme.css');
		wp_enqueue_style('pixtheme-blog', get_template_directory_uri() . '/css/blog.css');
		wp_enqueue_style('pixtheme-animate', get_template_directory_uri() . '/css/animate.css');
		wp_enqueue_style('pixtheme-debugging', get_template_directory_uri() . '/css/debugging.css');
		
		/* FONTS*/

		wp_enqueue_style('pixtheme-webfontkit', get_template_directory_uri() . '/fonts/webfontkit/stylesheet.css');
		wp_enqueue_style('pixtheme-icomoon', get_template_directory_uri() . '/fonts/simple-icomoon/style.css');
	    wp_enqueue_style('pixtheme-flaticon', get_template_directory_uri() . '/fonts/flaticon/flaticon.css');
	    wp_enqueue_style('pixtheme-fontello', get_template_directory_uri() . '/fonts/autoicon/css/fontello.css');
		wp_enqueue_style('pixtheme-fontawesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css');
		
		
		/* PLUGIN CSS */
		
		
		wp_enqueue_style('pixtheme-bxslider', get_template_directory_uri() . '/assets/bxslider/jquery.bxslider.css');
		wp_enqueue_style('pixtheme-flexslider', get_template_directory_uri() . '/assets/flexslider/flexslider.css');
		wp_enqueue_style('pixtheme-prettyphoto', get_template_directory_uri() . '/assets/prettyphoto/css/prettyPhoto.css');
		wp_enqueue_style('pixtheme-yamm/', get_template_directory_uri() . '/assets/yamm/yamm.css');



		wp_enqueue_style('dynamic-styles', get_template_directory_uri() . '/css/dynamic-styles.php');

		
		if(isset($_GET['get_scheme'])){
			$wp_session['color-scheme'] = $_GET['get_scheme'];
			wp_enqueue_style('color-scheme', get_template_directory_uri() . '/assets/switcher/css/'.$wp_session['color-scheme'].'.css');			
		}
		elseif(!empty($wp_session['color-scheme'])){
			wp_enqueue_style('color-scheme', get_template_directory_uri() . '/assets/switcher/css/'.$wp_session['color-scheme'].'.css');
		}
		elseif (!empty($pix_options['pix_color_scheme']) && !isset($_GET['get_scheme']) && !isset($wp_session['color-scheme'])) {
            wp_enqueue_style('color-scheme', get_template_directory_uri() . '/assets/switcher/css/'.$pix_options['pix_color_scheme'].'.css');
        }


		// jQuery

		wp_enqueue_script('pixtheme-migrate', get_template_directory_uri() . '/js/jquery-migrate-1.2.1.min.js', array() , '3.3', true);
		wp_enqueue_script('pixtheme-jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array() , '3.3', true);

		// Bootstrap Core JavaScript

		wp_enqueue_script('pixtheme-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array() , '3.3', true);
		wp_enqueue_script('pixtheme-modernizr', get_template_directory_uri() . '/js/modernizr.js');

		// User agent

		wp_enqueue_script('pixtheme-cssua', get_template_directory_uri() . '/js/cssua.min.js', array() , '3.3', true);

		// Waypoint

		wp_enqueue_script('pixtheme-waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array() , '3.3', true);
		
		
		// Loader
		
		if( ($pix_options['pix_loader'] == 1 && is_front_page()) || $pix_options['pix_loader'] == 2){
				wp_enqueue_style('pixtheme-isotope', get_template_directory_uri() . '/assets/loader/css/loader.css');
			wp_enqueue_script('pixtheme-classie', get_template_directory_uri() . '/assets/loader/js/classie.js', array() , '3.3', true);
			wp_enqueue_script('pixtheme-pathLoader', get_template_directory_uri() . '/assets/loader/js/pathLoader.js', array() , '3.3', true);
			wp_enqueue_script('pixtheme-main', get_template_directory_uri() . '/assets/loader/js/main.js', array() , '3.3', true);
		}
		
		// Isotope filter

		if ((!empty($post) && has_shortcode($post->post_content, 'portfolioblock')) || is_page_template('template-home.php') || is_page_template('fullwidth.php'))
			{
			wp_enqueue_style('pixtheme-isotope', get_template_directory_uri() . '/assets/isotope/isotope.css');
			wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/isotope/jquery.isotope.min.js', array() , '3.3', true);
			}
			
				wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array() , '3.3', true);
			wp_enqueue_script('easypiechart', get_template_directory_uri() . '/js/jquery.easypiechart.js', array() , '3.3', true);

		wp_enqueue_script('masonry', get_template_directory_uri() . '/assets/events/masonry.pkgd.min.js', array() , '3.3', true);

		// Ios Fix

		wp_enqueue_script('ios-orientationchange-fix', get_template_directory_uri() . '/js/ios-orientationchange-fix.js', array() , '3.3', true);

		// Bx Slider

		wp_enqueue_script('pixtheme-bxslider', get_template_directory_uri() . '/assets/bxslider/jquery.bxslider.min.js', array() , '3.3', true);

		// Flex Slider

		wp_enqueue_script('pixtheme-flexslider', get_template_directory_uri() . '/assets/flexslider/jquery.flexslider-min.js', array() , '3.3', true);

		//  Magnific

		wp_enqueue_script('pixtheme-magnific', get_template_directory_uri() . '/assets/magnific/jquery.magnific-popup.js', array() , '3.3', true);

		// Pretty Photo

		wp_enqueue_script('pixtheme-prettyphoto', get_template_directory_uri() . '/assets/prettyphoto/js/jquery.prettyPhoto.js', array() , '3.3', true);

		// Isotope filter

		if ((!empty($post) && has_shortcode($post->post_content, 'portfolioblock')) || is_page_template('template-home.php') || is_page_template('fullwidth.php'))
			{
			wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/isotope/jquery.isotope.min.js', array() , '3.3', true);
			}

		// Element form Styled

		wp_enqueue_script('pixtheme-selectbox', get_template_directory_uri() . '/assets/selectbox/jquery.selectbox-0.2.js', array() , '0.2', true);

		// Fancybox

		wp_enqueue_script('pixtheme-fancybox', get_template_directory_uri() . '/assets/fancybox/jquery.fancybox.pack.js', array() , '2.1.5', true);

		// Sly Slider

		wp_enqueue_script('pixtheme-sly', get_template_directory_uri() . '/assets/sly/sly.min.js', array() , '3.3', true);


       // Switcher
	
		if (pixtheme_get_option('pix_color_switcher','0')){
        	wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/assets/switcher/js/bootstrap-select.js', array(), '3.3', true);
        	wp_enqueue_script('colorpicker-evol', get_template_directory_uri() . '/assets/switcher/js/evol.colorpicker.min.js', array(), '3.3', true);
        	wp_enqueue_script('dmss-js', get_template_directory_uri() . '/assets/switcher/js/dmss.js', array(), '3.3', true);
        	wp_enqueue_style('css-switcher', get_template_directory_uri() . '/assets/switcher/css/switcher.css');

			
        	wp_enqueue_style('color0', get_template_directory_uri() . '/assets/switcher/css/color0.css');
          	wp_enqueue_style('color1', get_template_directory_uri() . '/assets/switcher/css/color1.css');
        	wp_enqueue_style('color2', get_template_directory_uri() . '/assets/switcher/css/color2.css');
        	wp_enqueue_style('color3', get_template_directory_uri() . '/assets/switcher/css/color3.css');
     

            	        	        	        	        	
			global $wp_styles;
			$wp_styles->add_data( 'color0', 'rel', 'alternate' );
			$wp_styles->add_data( 'color1', 'rel', 'alternate' );			
			$wp_styles->add_data( 'color2', 'rel', 'alternate' );			
			$wp_styles->add_data( 'color3', 'rel', 'alternate' );
			
			
			$wp_styles->add_data( 'color0', 'title', 'color0' );
			$wp_styles->add_data( 'color1', 'title', 'color1' );			
			$wp_styles->add_data( 'color2', 'title', 'color2' );			
			$wp_styles->add_data( 'color3', 'title', 'color3' );			
		}
	
		
		
		// Footer
		
		wp_enqueue_script('footer', get_template_directory_uri() . '/js/scripts.js', array() , '3.3', true);
		
		wp_enqueue_script('doubletaptogo', get_template_directory_uri() . '/js/doubletaptogo.min.js', array() , '1.0', true);
		
		
		
		}
	}

add_action('wp_enqueue_scripts', 'pixtheme_loadscripts'); //Load All Scripts

function pixtheme_fonts(){
	$pix_customize = get_option('pix_customize_options');
	$bodyFont = !empty($pix_customize['font_family']) && $pix_customize['font_family'] != '' ? $pix_customize['font_family'] : '';
	$bodyWeight = !empty($pix_customize['font_weight']) && $pix_customize['font_weight'] != '' ? $pix_customize['font_weight'] : '';
	$titleFont = !empty($pix_customize['font_title_family']) && $pix_customize['font_title_family'] != '' ? $pix_customize['font_title_family'] : '';
	$titleWeight = !empty($pix_customize['font_title_weight']) && $pix_customize['font_title_weight'] != '' ? $pix_customize['font_title_weight'] : '';
	if (($bodyFont != '' || $titleFont != '') && ($bodyFont == $titleFont)){
		$api_font = str_replace(" ", '+', $bodyFont);
		if ($bodyWeight != '' || $titleWeight != ''){
			$api_font.= ':';
			if ($bodyWeight == $titleWeight){
				$api_font.= $bodyWeight;
			}
			elseif ($bodyWeight != '' && $titleWeight != ''){
				$api_font.= $bodyWeight < $titleWeight ? $bodyWeight . ',' . $titleWeight : $titleWeight . ',' . $bodyWeight;
			}
		}

		$font_name = str_replace(" ", '-', $bodyFont);
		wp_enqueue_style('pixtheme-font-' . $font_name, "//fonts.googleapis.com/css?family=" . $api_font);
	}else{
		if ($bodyFont != ''){
			$api_font = str_replace(" ", '+', $bodyFont);
			$api_font.= $bodyWeight != '' ? ':' . $bodyWeight : '';
			$font_name = str_replace(" ", '-', $bodyFont);
			wp_enqueue_style('pixtheme-font-' . $font_name, "//fonts.googleapis.com/css?family=" . $api_font);
		}

		if ($titleFont != ''){
			$api_font = str_replace(" ", '+', $titleFont);
			$api_font.= $titleWeight != '' ? ':' . $titleWeight : '';
			$font_name = str_replace(" ", '-', $titleFont);
			wp_enqueue_style('pixtheme-font-' . $font_name, "//fonts.googleapis.com/css?family=" . $api_font);
		}
		
	}
	
}

add_action('wp_enqueue_scripts', 'pixtheme_fonts');
/************************************************************/
/********************* DEFINE MAIN PATHS ********************/
require_once ($incPath . 'menu_walker.php');

require_once ($funcPath . 'helper.php');

require_once ($incPath . 'OAuth.php');

require_once ($incPath . 'twitteroauth.php');

require_once ($funcPath . 'options.php');

require_once ($incPath . 'portfolio_walker.php');

require_once ($funcPath . 'post-types.php');

require_once ($funcPath . 'widgets.php');

require_once ($funcPath . 'shortcodes/shortcode.php');

require_once ($adminPath . 'custom-fields.php');

require_once ($adminPath . 'scripts.php');

require_once ($adminPath . 'admin-panel/admin-panel.php');

require_once ($adminPath . 'admin-panel/class-tgm-plugin-activation.php');

require_once ($funcPath . 'functions.php');

require_once ($funcPath . 'filters.php');

require_once ($funcPath . 'common.php');

require_once ($funcPath . 'events.php');

// Visual CSS Style Editor Button
if (pixtheme_get_option('pix_live_editor','0')){
    add_site_option( 'YP_PART_OF_THEME', 'true' );
    define("WT_DEMO_MODE","true");
}

// Redirect To Theme Options Page on Activation

if (is_admin() && isset($_GET['activated']))
	{
	wp_redirect(admin_url('admin.php?page=adminpanel'));
	unregister_sidebar('header-sidebar');
	}

add_action('admin_enqueue_scripts', 'pixtheme_load_custom_wp_admin_style');

function pixtheme_load_custom_wp_admin_style()
	{
	wp_register_script('custom_wp_admin_script', get_template_directory_uri() . '/js/custom-admin.js', false, '1.0.0');
	wp_enqueue_script('custom_wp_admin_script');
	}

/************************************************************/
/*************** AFTER THEME SETUP FUNCTIONS ****************/
add_action('after_setup_theme', 'pixtheme_setup');

function pixtheme_setup()
	{
	
	global $pix_options;
	
	// Language support

	load_theme_textdomain('PixTheme', get_template_directory() . '/languages');
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if (is_readable($locale_file))
		{
		require_once ($locale_file);

		}

	// ADD SUPPORT FOR POST THUMBS

	add_theme_support('post-thumbnails');

	// Define various thumbnail sizes

	$width = (!empty($pix_options['pix_portfolio_width'])) ? $pix_options['pix_portfolio_width'] : 340;
	$height = (!empty($pix_options['pix_portfolio_height'])) ? $pix_options['pix_portfolio_height'] : 250;
	add_image_size('portfolio-thumb', $width, $height, true);
	add_image_size('portfolio-thumb-2x', $width * 2, $height, true);
	add_image_size('preview-thumb', 100, 100, true);
	add_image_size('event-thumb', 320, 170, true);
	add_theme_support("title-tag");
	add_theme_support('automatic-feed-links');
	add_theme_support('post-formats', array(
		'gallery',
		'quote',
		'video'
	));

	// ADD SUPPORT FOR WORDPRESS 3 MENUS ************/

	add_theme_support('menus');

	// Register Navigations

	add_action('init', 'pix_custom_menus');
	function pix_custom_menus()
		{
		register_nav_menus(array(
			'primary_nav' => __('Primary Navigation', 'PixTheme') ,
			'top_nav' => __('Top Navigation', 'PixTheme') ,
			'footer_nav' => __('Footer Navigation', 'PixTheme')
		));
		}
	}

$args = array(
	'flex-width' => true,
	'width' => 350,
	'flex-height' => true,
	'height' => 'auto',
	'default-image' => get_template_directory_uri() . '/images/logo.jpg'
);
add_theme_support('custom-header', $args);
$args = array(
	'default-color' => 'FFFFFF'
);
add_theme_support('custom-background', $args);
add_theme_support('woocommerce');
/************************************************************/
/******* TGM Plugin ********/
add_action('tgmpa_register', 'pix_theme_register_required_plugins');

function pix_theme_register_required_plugins()
	{
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
        
        
     array(
			'name' => esc_html__( 'woocommerce', 'farvis'), // The plugin name
			'slug' => 'woocommerce', // The plugin slug (typically the folder name)
			'required' => true, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
		) ,
        
        
	 array(
			'name' => esc_html__( 'Regenerate Thumbnails', 'farvis'), // The plugin name
			'slug' => 'regenerate-thumbnails', // The plugin slug (typically the folder name)
			'required' => true, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
		) ,
        
        array(
			'name' => esc_html__( 'Contact Form 7', 'farvis'), // The plugin name
			'slug' => 'contact-form-7', // The plugin slug (typically the folder name)
			'required' => true, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
		) ,
        
		array(
            'name' => esc_html__( 'Mailchimp', 'farvis'), // The plugin name
            'slug' => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
            'required' => true, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
        ),
        
        
        array(
            'name' => esc_html__( 'YITH Woocommerce Wishlist', 'farvis'), // The plugin name
            'slug' => 'yith-woocommerce-wishlist', // The plugin slug (typically the folder name)
            'required' => true, // If false, the plugin is only 'recommended' instead of required
            'external_url' => ''
        ),
        
        
		array(
			'name' => 'Revolution Slider', // The plugin name
			'slug' => 'revslider', // The plugin slug (typically the folder name)
			'source' => 'http://assets.templines.com/plugins/revslider.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''

			// If set, overrides default API URL and points to an external URL

		) ,
		array(
			'name' => 'WPBakery Visual Composer', // The plugin name
			'slug' => 'js_composer', // The plugin slug (typically the folder name)
			'source' => 'http://assets.templines.com/plugins/js_composer.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''

			// If set, overrides default API URL and points to an external URL

		) ,
			
		array(
			'name' => 'PixthemeCustom', // The plugin name
			'slug' => 'pixtheme-custom', // The plugin slug (typically the folder name)
			'source' => get_stylesheet_directory() . '/library/includes/plugins/pixtheme-custom.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''

			// If set, overrides default API URL and points to an external URL

		) ,
		
        
        
        array(
			'name' => 'Visual CSS Style Editor', // The plugin name
			'slug' => 'waspthemes-yellow-pencil', // The plugin slug (typically the folder name)
			'source' =>  'http://assets.templines.com/plugins/waspthemes-yellow-pencil.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_activation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''

			// If set, overrides default API URL and points to an external URL

		) ,
        
		
	);
	
	
	


	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '', // Default absolute path to pre-packaged plugins.
		'menu' => 'tgmpa-install-plugins', // Menu slug.
		'has_notices' => true, // Show admin notices or not.
		'dismissable' => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false, // Automatically activate plugins after installation or not.
		'message' => '', // Message to output right before the plugins table.
		'strings' => array(
			'page_title' => __('Install Required Plugins', 'tgmpa') ,
			'menu_title' => __('Install Plugins', 'tgmpa') ,
			'installing' => __('Installing Plugin: %s', 'tgmpa') , // %s = plugin name.
			'oops' => __('Something went wrong with the plugin API.', 'tgmpa') ,
			'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa') , // %1$s = plugin name(s).
			'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa') , // %1$s = plugin name(s).
			'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa') , // %1$s = plugin name(s).
			'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa') , // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa') , // %1$s = plugin name(s).
			'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa') , // %1$s = plugin name(s).
			'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa') , // %1$s = plugin name(s).
			'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa') , // %1$s = plugin name(s).
			'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'tgmpa') ,
			'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins', 'tgmpa') ,
			'return' => __('Return to Required Plugins Installer', 'tgmpa') ,
			'plugin_activated' => __('Plugin activated successfully.', 'tgmpa') ,
			'complete' => __('All plugins installed and activated successfully. %s', 'tgmpa') , // %s = dashboard link.
			'nag_type' => 'updated'

			// Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.

		)
	);
	tgmpa($plugins, $config);
	}

add_action('vc_before_init', 'pixtheme_vcSetAsTheme');

function pixtheme_vcSetAsTheme(){
	vc_set_as_theme();
	require_once (PIX_funcPATH . 'shortcodes/vc_shortcode.php');
}


function filter_plugin_updates( $update ) {    
    $DISUPDATE = array( 'js_composer', 'revslider');
    if( !is_array($DISUPDATE) || count($DISUPDATE) == 0 ){  return $update;  }
	if(is_object($update))
    foreach( $update->response as $name => $val ){
        foreach( $DISUPDATE as $plugin ){
            if( stripos($name,$plugin) !== false ){
                unset( $update->response[ $name ] );
            }
        }
    }
    return $update;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

/*****WOOCOMERCE**********/
add_theme_support('woocommerce');
add_filter('woocommerce_enqueue_styles', '__return_false');
/*

// Remove each style one by one

function wp_enqueue_woocommerce_style(){
wp_register_style( 'mytheme-woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );

if ( class_exists( 'woocommerce' ) ) {
wp_enqueue_style( 'mytheme-woocommerce' );
}
}

add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );
*/
/******* FIX THE PORTFOLIO CATEGORY PAGINATION ISSUE ********/
$option_posts_per_page = get_option('posts_per_page');
add_action('init', 'pix_modify_posts_per_page', 0);

function pix_modify_posts_per_page()
	{
	add_filter('option_posts_per_page', 'pix_option_posts_per_page');
	}

function pix_option_posts_per_page($value)
	{
	global $option_posts_per_page;
	if (is_tax('portfolio_category'))
		{
		$pageId = pixtheme_get_page_ID_by_page_template('portfolio-template3.php');
		if ($pageId)
			{
			$custom = get_post_custom($pageId);
			$items_per_page = isset($custom['_page_portfolio_num_items_page']) ? $custom['_page_portfolio_num_items_page'][0] : '777';
			return $items_per_page;
			}
		  else
			{
			return 4;
			}
		}
	  else
		{
		return $option_posts_per_page;
		}
	}

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
add_action('woocommerce_before_shop_loop_tool', 'woocommerce_result_count', 20);
add_action('woocommerce_before_shop_loop_tool', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
/*
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 20);
*/

function pixtheme_override_page_title()
	{
	return false;
	}

add_filter('woocommerce_show_page_title', 'pixtheme_override_page_title');

function pixtheme_woocommerce_breadcrumbs()
	{
	return array(
		'delimiter' => '',
		'wrap_before' => '<div class="page-header">  <div class="container"><ol class="breadcrumb ">',
		'wrap_after' => '</ol></div></div>',
		'before' => '<li>',
		'after' => '</li>',
		'home' => _x('Home', 'breadcrumb', 'woocommerce')
	);
	}

add_filter('woocommerce_breadcrumb_defaults', 'pixtheme_woocommerce_breadcrumbs');
add_filter('woocommerce_output_related_products_args', 'pix_related_products_args');

function pix_related_products_args($args)
	{
	global $pix_options;
	$args['posts_per_page'] = $pix_options['pix_pelated_products']; // 4 related products
	return $args;
	}

//add_filter('wp_title', 'pixtheme_filter_pagetitle', 10, 2 );
function pixtheme_filter_pagetitle($title, $sep){
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	//$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		//$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'PixTheme' ), max( $paged, $page ) );

	return $title;
	/*/ check if its a blog post

	if (!is_single() && !is_shop() && !is_product_category() && !is_product_tag()) return $title;

	// if you get here then its a blog post so change the title

	global $wp_query;
	if (isset($wp_query->post->post_title))
		{
		return get_bloginfo('name') . ' &#8212; ' . $wp_query->post->post_title;
		}

	// if wordpress can't find the title return the default

	return get_bloginfo('name') . ' &#8212; ' . $title;
	
	
	if(is_single() && ! is_attachment() && isset($wp_query->post->post_title)): 		
		return get_bloginfo('name') . ' &#8212; ' . $wp_query->post->post_title; 		
    elseif( is_shop() || is_product_category() || is_product_tag() ): 
        return  get_bloginfo('name') . ' &#8212; ' . woocommerce_page_title(false);   
    elseif( is_home() || is_archive() ): 
        return  get_bloginfo('name') . ' &#8212; ' . $title;  
    elseif( is_search() ): 
        return get_bloginfo('name') . ' &#8212; ' . get_search_query(); 
    elseif( is_category() ): 
        return get_bloginfo('name') . ' &#8212; ' . single_cat_title(); 
    elseif( is_tag() ): 
        return get_bloginfo('name') . ' &#8212; ' . single_tag_title(); 
    else: 
        return $title;   
    endif;*/
}

/********************* Customize *********************/
add_action('customize_register', 'pix_remove_customize_sections');

function pix_remove_customize_sections($wp_customize)
	{
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('nav');
	$wp_customize->remove_panel('widgets');

	// / Global Colors ///

	$wp_customize->add_section('pix_colors', array(
		'title' => __('Global Colors', 'PixCustomize') ,
		'priority' => 20
	));
	$wp_customize->add_setting('pix_customize_options[first_color]', array(
		'default' => '',
		'transport' => 'postMessage',
		'type' => 'option',

		//'sanitize_callback' => 'sanitize_hex_color',

	));
	$wp_customize->add_setting('pix_customize_options[second_color]', array(
		'default' => '',
		'transport' => 'postMessage',
		'type' => 'option',

		//'sanitize_callback' => 'sanitize_hex_color',

	));
	$wp_customize->add_setting('pix_customize_options[third_color]', array(
		'default' => '',
		'transport' => 'postMessage',
		'type' => 'option',

		//'sanitize_callback' => 'sanitize_hex_color',

	));
	$wp_customize->add_setting('pix_customize_options[bg_color]', array(
		'default' => '',
		'transport' => 'postMessage',
		'type' => 'option',

		//'sanitize_callback' => 'sanitize_hex_color',

	));
	$wp_customize->add_setting('pix_customize_options[bg_image]', array(
		'default' => '',
		'transport' => 'postMessage',
		'type' => 'option',

		//'sanitize_callback' => 'sanitize_hex_color',

	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'first_color', array(
		'label' => __('First Color', 'PixCustomize') ,
		'section' => 'pix_colors',
		'settings' => 'pix_customize_options[first_color]'
	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'second_color', array(
		'label' => __('Second Color', 'PixCustomize') ,
		'section' => 'pix_colors',
		'settings' => 'pix_customize_options[second_color]'
	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'third_color', array(
		'label' => __('Third Color', 'PixCustomize') ,
		'section' => 'pix_colors',
		'settings' => 'pix_customize_options[third_color]'
	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bg_color', array(
		'label' => __('Background Color', 'PixCustomize') ,
		'section' => 'pix_colors',
		'settings' => 'pix_customize_options[bg_color]'
	)));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bg_image', array(
		'label' => __('Background Image', 'PixCustomize') ,
		'section' => 'pix_colors',
		'settings' => 'pix_customize_options[bg_image]'
	)));

	// ////////////////////////////////////////////////////////
	// / Global Font ///

	$wp_customize->add_section('pix_font', array(
		'title' => __('Global Font', 'PixCustomize') ,
		'priority' => 25,
		'description' => 'Add new <a href="//www.google.com/fonts/" target="_blank">Google Web Fonts</a>'
	));
	$wp_customize->add_setting('pix_customize_options[font_family]', array(
		'default' => '',
		'transport' => 'postMessage',
		'type' => 'option',

		//'sanitize_callback' => 'sanitize_font',

	));
	$wp_customize->add_setting('pix_customize_options[font_weight]', array(
		'default' => '',
		'transport' => 'postMessage',
		'type' => 'option',

		//'sanitize_callback' => 'sanitize_font_weight',

	));
	$wp_customize->add_control('pix_font_family_control', array(
		'label' => __('Font Family', 'PixCustomize') ,
		'section' => 'pix_font',
		'settings' => 'pix_customize_options[font_family]',
		'description' => 'Example: Oswald'
	));
	$wp_customize->add_control('pix_font_weight_control', array(
		'label' => __('Font Weight', 'PixCustomize') ,
		'section' => 'pix_font',
		'settings' => 'pix_customize_options[font_weight]',
		'description' => 'Example: 300'
	));

	// ////////////////////////////////////////////////////////
	// / Title Font ///

	$wp_customize->add_section('pix_font_title', array(
		'title' => __('Title Font', 'PixCustomize') ,
		'priority' => 30,
		'description' => 'Add new <a href="//www.google.com/fonts/" target="_blank">Google Web Fonts</a>'
	));
	$wp_customize->add_setting('pix_customize_options[font_title_family]', array(
		'default' => '',
		'transport' => 'postMessage',
		'type' => 'option',

		//'sanitize_callback' => 'sanitize_font',

	));
	$wp_customize->add_setting('pix_customize_options[font_title_weight]', array(
		'default' => '',
		'transport' => 'postMessage',
		'type' => 'option',

		//'sanitize_callback' => 'sanitize_font_weight',

	));
	$wp_customize->add_control('pix_font_title_family_control', array(
		'label' => __('Font Family', 'PixCustomize') ,
		'section' => 'pix_font_title',
		'settings' => 'pix_customize_options[font_title_family]',
		'description' => 'Example: Oswald'
	));
	$wp_customize->add_control('pix_font_title_weight_control', array(
		'label' => __('Font Weight', 'PixCustomize') ,
		'section' => 'pix_font_title',
		'settings' => 'pix_customize_options[font_title_weight]',
		'description' => 'Example: 700'
	));

	// ////////////////////////////////////////////////////////

	}

?>