<?php 
/**** THEME SETTINGS ***/
	
$args = array(
	'post_type'        => 'staticblocks',
	'post_status'      => 'publish',
);
$staticBlocks = array();
$staticBlocksData = get_posts( $args );
foreach($staticBlocksData as $_block){
	$staticBlocks[] = array( "value" => $_block->ID, "text" => $_block->post_title);
}	

$shortname = 'pix';	
$options = array(
	
	array(
		'type' => 'open',
		'tab_name' => 'General settings',
		'tab_id' => 'general-settings'
	) ,
	
	array(
		'name' => 'Logo image',
		'id' => $shortname . '_logo',
		'type' => 'upload',
		'img_w' => '400',
		'img_h' => '250',
		'std' => '',
		'desc' => 'Upload a logo from your hard drive or specify an existing url (Recommended size: 290x88)'
	),	

	array(
		'name' => 'Logo Text',
		'id' => $shortname . '_logotext',
		'type' => 'text',
		'std' => '',
		'desc' => 'Logo Image alt text'
	) ,
	
	array(
		'name' => 'Favicon',
		'id' => $shortname . '_favicon',
		'type' => 'upload',
		'img_w' => '400',
		'img_h' => '250',
		'std' => '',
		'desc' => 'Upload a favicon.'
	),
			
	array(
		'name' => 'Header image',
		'id' => $shortname . '_header_img',
		'type' => 'upload',
		'img_w' => '1600',
		'img_h' => '140',
		'std' => '',
		'desc' => 'Upload an image from your hard drive or specify an existing url (Recommended size: 1600x140)'
	),	
	
	array(
		'name' => 'Loader',
		'id' => $shortname . '_loader',
		'type' => 'select',
		'desc' => 'Choose loader use',
		'options' => array(
			array( "value" => "0", "text" => "Off"),
			array( "value" => "1", "text" => "Use on main"),
			array( "value" => "2", "text" => "Use on all pages")		
		)		
	) ,
	
	array(
		'name' => 'Responsive',
		'id' => $shortname . '_responsive',
		'type' => 'select',
		'desc' => 'Choose responsive use',
		'options' => array(
			array( "value" => "1", "text" => "On"),	
			array( "value" => "0", "text" => "Off")			
		)		
	) ,

	array(
        'name' => 'Show Front Editor Button',
        'id' => $shortname . '_live_editor',
        'type' => 'select',
        'desc' => 'Show button for Visual CSS Style Editor',
        'options' => array(
            array( "value" => "0", "text" => "Off"),
            array( "value" => "1", "text" => "On")
        )
    ) ,
	
	array(
		'type' => 'close'
	) ,
	
	/*************** Portfolio ***************/
	array(
		'type' => 'open',
		'tab_name' => 'Portfolio Settings',
		'tab_id' => 'portfolio-settings'
	) ,
    
	array(
		'name' => 'Tumbnails Width',
		'id' => $shortname . '_portfolio_width',
		'type' => 'text',
		'std' => '366',
		'desc' => 'Recomended 366px'
	) ,
	
	array(
		'name' => 'Tumbnails Height',
		'id' => $shortname . '_portfolio_height',
		'type' => 'text',
		'std' => '186',
		'desc' => 'Recomended 186px'
	) ,
	
	array(
		'type' => 'close'
	) ,
    
    /*****************************************/
	
	/*************** Woocommerce ***************/
	array(
		'type' => 'open',
		'tab_name' => 'Woocommerce',
		'tab_id' => 'woocommerce-settings'
	) ,    
	
	array(
		'name' => 'Related Products',
		'id' => $shortname . '_pelated_products',
		'type' => 'text',
		'std' => '6',
		'desc' => 'Related products per page'
	) ,
	
	array(
		'type' => 'close'
	) ,
    
    /*****************************************/
	
	/*************** Customer ***************
	array(
		'type' => 'open',
		'tab_name' => 'Seller Settings',
		'tab_id' => 'seller-settings'
	) ,
			
	array(
		'name' => 'Envato Username',
		'id' => $shortname . '_envato_id',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	
	array(
		'name' => 'Envato Profile URL',
		'id' => $shortname . '_envato_url',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	
	array(
		'name' => 'Envato API Key',
		'id' => $shortname . '_envato_api',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	
	array(
		'name' => 'Select Envato Marketplaces from where you want to show your products in all products page',
		'id' => $shortname . '_seller_networks',
		'type' => 'toggle',
		'std' => '',
		'desc' => ''
	) ,
	
	array(
		'name' => 'Themeforest',
		'id' => $shortname . '_envato_themeforest',
		'type' => 'checkbox',
		'std' => '',
		'desc' => ''
	) ,
	
	array(
		'name' => 'Codecanyon',
		'id' => $shortname . '_envato_codecanyon',
		'type' => 'checkbox',
		'std' => '',
		'desc' => ''
	) ,
	
	array(
		'name' => 'Graphicriver',
		'id' => $shortname . '_envato_graphicriver',
		'type' => 'checkbox',
		'std' => '',
		'desc' => ''
	) ,
	
	array(
		'name' => 'ActiveDen',
		'id' => $shortname . '_envato_activeden',
		'type' => 'checkbox',
		'std' => '',
		'desc' => ''
	) ,
	
	array(
		'name' => 'VideoHive',
		'id' => $shortname . '_envato_videohive',
		'type' => 'checkbox',
		'std' => '',
		'desc' => ''
	) ,
	
	array(
		'name' => 'AudioJungle',
		'id' => $shortname . '_envato_audiojungle',
		'type' => 'checkbox',
		'std' => '',
		'desc' => ''
	) ,
    
	array(
		'name' => 'Tumbnails Width',
		'id' => $shortname . '_envato_width',
		'type' => 'text',
		'std' => '366',
		'desc' => 'Recomended 366px'
	) ,
	
	array(
		'name' => 'Tumbnails Height',
		'id' => $shortname . '_envato_height',
		'type' => 'text',
		'std' => '186',
		'desc' => 'Recomended 186px'
	) ,
	
	array(
		'type' => 'close'
	) ,
    
  
    
    
    /*****************************************/
    
    
    /*************** HEADER ***************/
	array(
		'type' => 'open',
		'tab_name' => 'Header',
		'tab_id' => 'header-section'
	) ,
	
	array(
		'name' => 'Header Type',
		'id' => $shortname . '_header_type',
		'type' => 'select',
		'desc' => 'Type of header',
		'options' => array(
			array( "value" => "pix-header1", "text" => "Header 1"),	
			array( "value" => "pix-header2", "text" => "Header 2")			
		),
		'std' => 'pix-header1',
	) ,
	
	array(
		'name' => 'Header Type 2 Image',
		'id' => $shortname . '_logo2',
		'type' => 'upload',
		'img_w' => '400',
		'img_h' => '250',
		'std' => '',
		'desc' => 'Upload a logo from your hard drive or specify an existing url (Recommended size: 290x88)'
	),	
	
	array(
		'name' => 'Heder Info',
		'id' => $shortname . '_header_info',
		'type' => 'textarea',
		'std' => '<i class="fa fa-phone"></i> 24/7 SUPPORT &nbsp; &nbsp; <a href="#">0800 123 4567</a>',
		'height' => '100',
		'desc' => 'information on the header left of site'
	) ,	
	
	array(
		'name' => 'Show minicart Icon',
		'id' => $shortname . '_header_minicart',
		'type' => 'select',
		'desc' => 'On/off header cart',
		'options' => array(
			array( "value" => "1", "text" => "On"),	
			array( "value" => "0", "text" => "Off")			
		)
	) ,	
	    	
	array(
		'type' => 'close'
	) ,
    /*****************************************/
    
    
		
	/*************** FOOTER ***************/
	array(
		'type' => 'open',
		'tab_name' => 'Footer',
		'tab_id' => 'footer-section'
	) ,
	
	array(
		'name' => 'StaticBlock',
		'id' => $shortname . '_footer_staticblock',
		'type' => 'select',
		'desc' => 'Choose staticblock to use',
		'options' => $staticBlocks		
			
	) ,
	
	array(
		'name' => 'Footer Copyright',
		'id' => $shortname . '_footer_copy',
		'type' => 'textarea',
		'std' => 'Copyrights &copy; 2015 AUTODOC  |  All rights reserved.',
		'height' => '40',
		'desc' => 'site copyright'
	) ,
	
	array(
		'name' => 'Footer Logo image',
		'id' => $shortname . '_footer_logo',
		'type' => 'upload',
		'img_w' => '150',
		'img_h' => '40',
		'std' => '',
		'desc' => 'Upload a logo from your hard drive or specify an existing url (Recommended size: 150x40)'
	),	
	
	array(
		'name' => 'Show prefooter',
		'id' => $shortname . '_prefooter_show',
		'type' => 'select',
		'desc' => 'On/off prefooter',
		'options' => array(
			array( "value" => "1", "text" => "On"),	
			array( "value" => "0", "text" => "Off")			
		)
	) ,
	
	array(
		'name' => 'Prefooter Title Left',
		'id' => $shortname . '_prefooter_title_left',
		'type' => 'text',
		'std' => '24/7 SUPPORT
            0800 123 4567',
		'desc' => 'Prefooter title'
	) ,
	
	array(
		'name' => 'Prefooter Icon Left',
		'id' => $shortname . '_prefooter_icon_left',
		'type' => 'text',
		'std' => 'fa-phone',
		'desc' => 'Prefooter icon'
	) ,
	
	array(
		'name' => 'Prefooter Left',
		'id' => $shortname . '_prefooter_left',
		'type' => 'textarea',
		'std' => '0800 123 4567',
		'height' => '100',
		'desc' => 'information on the prefooter left of site'
	) ,	
	
	array(
		'name' => 'Prefooter Title Middle',
		'id' => $shortname . '_prefooter_title_middle',
		'type' => 'text',
		'std' => 'EMAIL ADDRESS',
		'desc' => 'Prefooter title'
	) ,
	
	array(
		'name' => 'Prefooter Icon Middle',
		'id' => $shortname . '_prefooter_icon_middle',
		'type' => 'text',
		'std' => 'fa-envelope',
		'desc' => 'Prefooter icon'
	) ,
		
	array(
		'name' => 'Prefooter Middle',
		'id' => $shortname . '_prefooter_middle',
		'type' => 'textarea',
		'std' => '<a href="mailto:info@autodoc.com">info@autodoc.com</a>',
		'height' => '100',
		'desc' => 'information on the prefooter middle of site'
	) ,
	
	array(
		'name' => 'Prefooter Title Right',
		'id' => $shortname . '_prefooter_title_right',
		'type' => 'text',
		'std' => 'OPENING HOURS',
		'desc' => 'Prefooter title'
	) ,
	
	array(
		'name' => 'Prefooter Icon Right',
		'id' => $shortname . '_prefooter_icon_right',
		'type' => 'text',
		'std' => 'fa-clock-o',
		'desc' => 'Prefooter icon'
	) ,
	
	array(
		'name' => 'Prefooter Right',
		'id' => $shortname . '_prefooter_right',
		'type' => 'textarea',
		'std' => 'Mon - Fri  8am to 6pm',
		'height' => '100',
		'desc' => 'information on the prefooter right of site'
	) ,
			
	array(
		'type' => 'close'
	) ,
    /*****************************************/
	
	
	
	/*******************  BLOG  ******************/
	array(
		'type' => 'open',
		'tab_name' => 'Blog',
		'tab_id' => 'blog'
	) ,
	
	array( 
		"name" => "Blog Layout",
		"desc" => "Show list or grid posts page.",
		"id" => $shortname."_blog_layout",
		"type" => "select",
		'options' => array(
			array( "value" => "0", "text" => "List"),
			array( "value" => "1", "text" => "Grid")
		)
	),
	
	array( 
		"name" => "Show date",
		"desc" => "Date on blog posts listing page.",
		"id" => $shortname."_blog_show_date",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),	
	
	array( 
		"name" => "Show share buttons",
		"desc" => "Show share buttons on single post.",
		"id" => $shortname."_blog_share",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),	
	
	array( 
		"name" => "Show About Author",
		"desc" => "Show About Author block on single post.",
		"id" => $shortname."_blog_show_author",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),
	
	array( 
		"name" => "Show Author Posts",
		"desc" => "Show Author Posts block on single post.",
		"id" => $shortname."_blog_show_author_posts",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),
	
	array( 
		"name" => "Show comments",
		"desc" => "Show comments on single post.",
		"id" => $shortname."_blog_show_comments",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),
	
	array( 
		"name" => "Show Categories",
		"desc" => "Show Categories list.",
		"id" => $shortname."_blog_show_category",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),
	
	array( 
		"name" => "Show Tags",
		"desc" => "Show Tags list.",
		"id" => $shortname."_blog_show_tag",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),
	
	
	array( "type" => "close"),
	/*********************************************/
		
	/**************  SOCIAL  ***************/
	array(
		'type' => 'open',
		'tab_name' => 'Social',
		'tab_id' => 'social'
	) ,
	
	array(
		'name' => 'Facebook',
		'id' => $shortname . '_facebook',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'VK',
		'id' => $shortname . '_vk',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Youtube',
		'id' => $shortname . '_youtube',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Vimeo',
		'id' => $shortname . '_vimeo',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Twitter',
		'id' => $shortname . '_twitter',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Google+',
		'id' => $shortname . '_google',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Tumblr',
		'id' => $shortname . '_tumblr',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Wordpress',
		'id' => $shortname . '_wordpress',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Instagram',
		'id' => $shortname . '_instagram',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Pinterest',
		'id' => $shortname . '_pinterest',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Linkedin',
		'id' => $shortname . '_linkedin',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Custom 1 link',
		'id' => $shortname . '_custom1_link',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Custom 1 icon',
		'id' => $shortname . '_custom1_icon',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Custom 2 link',
		'id' => $shortname . '_custom2_link',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Custom 2 icon',
		'id' => $shortname . '_custom2_icon',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Custom 3 link',
		'id' => $shortname . '_custom3_link',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Custom 3 icon',
		'id' => $shortname . '_custom3_icon',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	
	
	array(
		'type' => 'close'
	) ,
	/*****************************************************/	
	
	/****** Styles ****/
	array(
		'type' => 'open',
		'tab_name' => 'Styles',
		'tab_id' => 'styles'
	) ,
		
		array(
			'name' => 'Page Layout',
			'id' => $shortname . '_page_layout',
			'type' => 'select',
			'desc' => 'Wide or boxed',
			'options' => array(
				array( "value" => "wide", "text" => "Wide"),	
				array( "value" => "boxed", "text" => "Boxed"),								
			)
		) ,	
		
		array(
			'name' 	=> 'Color scheme',
			'id' 	=> $shortname.'_color_scheme',
			'type' 	=> 'select',
			'desc' 	=> '<a href="'.get_site_url(null, '/wp-admin/customize.php?theme=autodoc').'">Customization Real time here</a>',
			'options' => array(				
				array( "value" => "scheme1", "text" => "Scheme 1"),
				array( "value" => "scheme2", "text" => "Scheme 2"),
				array( "value" => "scheme3", "text" => "Scheme 3"),
				array( "value" => "scheme4", "text" => "Scheme 4"),
			)
		),	
		
		array(
			'name' => 'Show Color Scheme Switcher',
			'id' => $shortname . '_color_switcher',
			'type' => 'select',
			'desc' => 'Switch color scheme',
			'options' => array(
				array( "value" => "0", "text" => "Off"),
				array( "value" => "1", "text" => "On")						
			)
		) ,		
	
	array(
		'type' => 'close'
	) ,
	
	/*****************************************************/	
	
	/**************  Miscellaneous  ***************/
	array(
		'type' => 'open',
		'tab_name' => 'Custom CSS / JS',
		'tab_id' => 'misc'
	) ,
		array(
			'name' => 'Custom CSS',
			'id' => $shortname.'_custom_css',
			'type' => 'textarea',
			'std' => '',
			'desc' => 'Add any custom css here. It will override the default values and will not be overwritten when the theme is updated. <br /> e.g.; .region1wrap{background:#000}'
		),
		
		array(
			'name' => 'Custom JS',
			'id' => $shortname.'_custom_js',
			'type' => 'textarea',
			'std' => '',
			'desc' => 'Add any custom javascript code, like Google Analytics, here.'
		),

	array(
		'type' => 'close'
	) ,
	/*****************************************************/	
);

add_action( 'init', 'pix_theme_options', 1 );

function pix_theme_options($return = false) {
	
	global $options;
	
	/**
	* Get a copy of the saved settings array. 
	*/
	$saved_settings = get_option( 'pix_general_settings' );
	$options_array = array();
	foreach($options as $value) {
		if (isset($value['id']) && isset($value['std'])) {
			$options_array[$value['id']] = stripslashes($value['std']);		
		}
		elseif(isset($value['id']))
			$options_array[$value['id']] = '';	
	}
	//update_option('pix_general_settings', $options_array);

	
	//print_r($saved_settings);
	//echo "<br>";
	//print_r($options_array);
	
	if(empty($saved_settings)) {
	   update_option( 'pix_general_settings', $options_array );
	}

}


?>