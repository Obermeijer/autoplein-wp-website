<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
 
add_action( 'init', 'pixtheme_integrateWithVC', 200 );
function pixtheme_integrateWithVC() {

	$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0');
	$categories = get_categories($args);
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->name] = $category->term_id;
	}
	$add_css_animation = array(
		'type' => 'dropdown',
		'heading' => __( 'CSS Animation', 'js_composer' ),
		'param_name' => 'css_animation',
		'admin_label' => true,
		'value' => array(
			__( 'No', 'js_composer' ) => '',
			__( 'Top to bottom', 'js_composer' ) => 'top-to-bottom',
			__( 'Bottom to top', 'js_composer' ) => 'bottom-to-top',
			__( 'Left to right', 'js_composer' ) => 'left-to-right',
			__( 'Right to left', 'js_composer' ) => 'right-to-left',
			__( 'Appear from center', 'js_composer' ) => "appear"
		),
		'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'js_composer' )
	);	
	
	$attributes = array(
		array(
			'type' => 'attach_images',
			'heading' => __( 'Background Slides', 'js_composer' ),
			'param_name' => 'pbgslides',
			'description' => __( 'Background Slides.', 'js_composer' )
		),
		/*
		array(
			'type' => 'dropdown',
			'heading' => "Page Decor",
			'param_name' => 'pdecor',
			'value' => array("None" , "Top", "Bottom", "Both" ),
			'description' => __( "Page Decor Option", "PixShortcode" )
		),
		*/
		array(
			'type' => 'dropdown',
			'heading' => "Text Color",
			'param_name' => 'ptextcolor',
			'value' => array("Default" , "White" , "Black"),
			'description' => __( "Text Color", "PixShortcode" )
		),
		
	);
	vc_add_params( 'vc_row', $attributes );
	
	vc_map(
		array(
			"name" => __( "Simple Title ", "PixShortcode" ),
			"base" => "titlesimple",
			"class" => "pix-theme-icon",
			"category" => __( "PixTheme", "PixShortcode"),
			"params" => array(
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title", "PixShortcode" ),
					"param_name" => "title",
					"value" => __( "I am Title", "PixShortcode" ),
					"description" => __( "Title param.", "PixShortcode" )
				 ),			
				 $add_css_animation,
				 array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content", "PixShortcode" ),
					"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
					"value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "PixShortcode" ),
					"description" => __( "Enter your content.", "PixShortcode" )
				 )
			)
		) 
	);
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Titlesimple extends WPBakeryShortCode {
			
		}
	}
	
	vc_map(
		array(
			"name" => __( "Title Section ", "PixShortcode" ),
			"base" => "titleblock",
			"class" => "pix-theme-icon",
			"category" => __( "PixTheme", "PixShortcode"),
			"params" => array(
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title", "PixShortcode" ),
					"param_name" => "title",
					"value" => __( "I am Title", "PixShortcode" ),
					"description" => __( "Title param.", "PixShortcode" )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon", "PixShortcode" ),
					"param_name" => "icon",
					"value" => __( "flaticon-wrench44", "PixShortcode" ),
					"description" => __( "Add icon <a href='//fortawesome.github.io/Font-Awesome/icons/' target='_blank'>See all icons</a>", "PixShortcode" )
				 ),
			
				 $add_css_animation,
				 array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content", "PixShortcode" ),
					"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
					"value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "PixShortcode" ),
					"description" => __( "Enter your content.", "PixShortcode" )
				 )
			)
		) 
	);
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Titleblock extends WPBakeryShortCode {
			
		}
	}
	/*
	vc_map(
		array(
			"name" => __( "Title IMAGE ", "PixShortcode" ),
			"base" => "title_image",
			"class" => "pix-theme-icon",
			"category" => __( "FreelanceTeam", "PixShortcode"),
			"params" => array(
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title", "PixShortcode" ),
					"param_name" => "title",
					"value" => __( "ABOUT THE CLUB", "PixShortcode" ),
					"description" => __( "Title param.", "PixShortcode" )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Text After", "PixShortcode" ),
					"param_name" => "after",
					"value" => __( "XTREME SPORTS CLUB", "PixShortcode" ),
					"description" => __( "", "PixShortcode" )
				 ),
				  array(
					'type' => 'attach_image',
					'heading' => __( 'Image', 'js_composer' ),
					'param_name' => 'image',
					'value' => '',
					'description' => __( 'Select image from media library.', 'js_composer' )
				),
			
				 $add_css_animation,
				 array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content", "PixShortcode" ),
					"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
					"value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "PixShortcode" ),
					"description" => __( "Enter your content.", "PixShortcode" )
				 )
			)
		) 
	);
	
		
	
	vc_map(
		array(
			"name" => __( "WELCOME TO", "PixShortcode" ),
			"base" => "tblock2",
				"class" => "pix-theme-icon",
			"category" => __( "FreelanceTeam", "PixShortcode"),
			"params" => array(
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title", "PixShortcode" ),
					"param_name" => "title",
					"value" => __( "XTREME SPORTS CLUB ONLINE SHOP", "PixShortcode" ),
					"description" => __( "Title param.", "PixShortcode" )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Text Before", "PixShortcode" ),
					"param_name" => "before",
					"value" => __( "WELCOME TO", "PixShortcode" ),
					"description" => __( "", "PixShortcode" )
				 ),
			
				 $add_css_animation,
				 array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content", "PixShortcode" ),
					"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
					"value" => __( "<p>Aenean urna tellus sodales aliquam egestas quis convallis cursus magna. Fusce sa scelerisque. Proin tempor rci vestibulum adipiscing. Etiam blanditd Vestibulum nis Duis nibh dui porttitor eu rhoncus uted. Fusce lacus alc neque interdum pulvinarl Integer vel ante ut. Pellentesque habitant tristique senectus et netus et malesuada fames ac nunc placerat cursus eros. Donec turpis. Nullam porttitor urabitur</p>", "PixShortcode" ),
					"description" => __( "Enter your content.", "PixShortcode" )
				 )
			)
		) 
	);
	
	
	
	
	vc_map(
		array(
			"name" => __( "Sub Title ", "PixShortcode" ),
			"base" => "subtblock",
			"class" => "pix-theme-title2",
			"category" => __( "FreelanceTeam", "PixShortcode"),
			"params" => array(
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Subtitle", "PixShortcode" ),
					"param_name" => "title",
					"value" => __( "Subtitle", "PixShortcode" ),
					"description" => __( "", "PixShortcode" )
				 ),
				
				 $add_css_animation,
				 array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content", "PixShortcode" ),
					"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
					"value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "PixShortcode" ),
					"description" => __( "Enter your content.", "PixShortcode" )
				 )
			)
		) 
	);
	
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Oblock extends WPBakeryShortCode {
			
		}
	}	
	
	vc_map( 
		array(
			"name" => __( "Featured Box", "PixShortcode" ),
			"base" => "featserv2",
			"class" => "pix-theme-icon",
			"category" => __( "FreelanceTeam", "PixShortcode"),
			"params" => array(
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title", "PixShortcode" ),
					"param_name" => "title",
					"value" => __( "I am title", "PixShortcode" ),
					"description" => __( "Add Title ", "PixShortcode" )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon", "PixShortcode" ),
					"param_name" => "icon",
					"value" => __( "fa-flag", "PixShortcode" ),
					"description" => __( "Add icon <a href='//fortawesome.github.io/Font-Awesome/icons/' target='_blank'>Font-Awesome</a> or Use theme icons (please check documentation)", "PixShortcode" )
				 ),
				 array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content", "PixShortcode" ),
					"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
					"value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "PixShortcode" ),
					"description" => __( "Enter your content.", "PixShortcode" )
				 )
			)
		)
	);
	
	vc_map(
		array(
			"name" => __( "Events", "PixShortcode" ),
			"base" => "eventsblock",
			"class" => "pix-theme-event",
			"category" => __( "FreelanceTeam", "PixShortcode"),
			"params" => array(				
				array(
					'type' => 'dropdown',
					'heading' => __( 'Events Count', 'js_composer' ),
					'param_name' => 'count',
					'value' => array(
						1 => 1,
						2 => 2,
						3 => 3,
						4 => 4,
						5 => 5,
						6 => 6
					),
					'description' => __( 'Select image from media library.', 'js_composer' )
				),
				$add_css_animation,			
			)
		) 
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Eventsblock extends WPBakeryShortCode {
			
		}
	}
	
	
	
	vc_map(
		array(
			"name" => __( "Woocommerce Products", "PixShortcode" ),
			"base" => "woocommerceblock",
			"class" => "pix-theme-woocommerce",
			"category" => __( "FreelanceTeam", "PixShortcode"),
			"params" => array(				
				array(
					'type' => 'dropdown',
					'heading' => __( 'Products Count', 'PixShortcode' ),
					'param_name' => 'count',
					'value' => array(
						1 => 1,
						2 => 2,
						3 => 3,
						4 => 4,
						5 => 5,
						6 => 6
					),
					'description' => __( 'Select image from media library.', 'PixShortcode' )
				),
				$add_css_animation,			
			)
		) 
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Woocommerceblock extends WPBakeryShortCode {
			
		}
	}
	
	vc_map(
		array(
			"name" => __( "Promo Box", "PixShortcode" ),
			"base" => "promo",
			"class" => "pix-theme-icon",
			"category" => __( "FreelanceTeam", "PixShortcode"),
			"params" => array(
			
				 array(
					'type' => 'attach_image',
					'heading' => __( 'Image', 'js_composer' ),
					'param_name' => 'image',
					'value' => '',
					'description' => __( 'Select image from media library.', 'js_composer' )
				),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Link", "PixShortcode" ),
					"param_name" => "link",
					"value" => __( "", "PixShortcode" ),
					"description" => __( ".", "PixShortcode" )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button Text", "PixShortcode" ),
					"param_name" => "text",
					"value" => __( "SHOP NOW", "PixShortcode" ),
					"description" => __( "", "PixShortcode" )
				 ),
				 array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content", "PixShortcode" ),
					"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
					"value" => __( "
					  <h3>WATER SPORTS</h3>
                <h4>COLLECTION</h4>
				", "PixShortcode" ),
					"description" => __( "Enter your content.", "PixShortcode" )
				 )
			)
		) 
	);
	
	
	
	
		vc_map(
		array(
			"name" => __( "Banner Box", "PixShortcode" ),
			"base" => "banner",
			"class" => "pix-theme-banner",
			"category" => __( "FreelanceTeam", "PixShortcode"),
			"params" => array(
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title", "PixShortcode" ),
					"param_name" => "title",
					"value" => __( "GET IN TOUCH", "PixShortcode" ),
					"description" => __( "Button Title", "PixShortcode" )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Link", "PixShortcode" ),
					"param_name" => "link",
					"value" => __( "https:/templines.com", "PixShortcode" ),
					"description" => __( "Button link", "PixShortcode" )
				 ),
				 array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content", "PixShortcode" ),
					"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
					"value" => __( " <h3>GET FREE SHIPPING WHEN YOU SPEND JUST $30 OR MORE!</h3>
        <h5>WE WILL SHIP YOUR ITEM WITHIN 2 DAYS</h5>", "PixShortcode" ),
					"description" => __( "Banner Text", "PixShortcode" )
				 )
			)
		) 
	);
	
	*/
	
	
	
	vc_map(
		array(
			"name" => __( "Amount Box", "PixShortcode" ),
			"base" => "boxamount",
			"class" => "pix-theme-icon",
			"category" => __( "PixTheme", "PixShortcode"),
			"params" => array(
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title", "PixShortcode" ),
					"param_name" => "title",
					"value" => __( "Project", "PixShortcode" ),
					"description" => __( "Title.", "PixShortcode" )
				 ),
				  array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Amount", "PixShortcode" ),
					"param_name" => "amount",
					"value" => __( "999", "PixShortcode" ),
					"description" => __( "Amount.", "PixShortcode" )
				 ),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon", "PixShortcode" ),
					"param_name" => "icon",
					"value" => __( "fa-rocket", "PixShortcode" ),
					"description" => __( "Add icon <a href='//fortawesome.github.io/Font-Awesome/icons/' target='_blank'>See all icons</a>", "PixShortcode" )
				 ),
				
			)
		) 
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Boxamount extends WPBakeryShortCode {
			
		}
	}
	
	vc_map( 
		array(
			"name" => __( "Services Box", "PixShortcode" ),
			"base" => "boxservices",
			"class" => "pix-theme-icon",
			"category" => __( "PixTheme", "PixShortcode"),
			"params" => array(
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title", "PixShortcode" ),
					"param_name" => "title",
					"value" => __( "I am title", "PixShortcode" ),
					"description" => __( "Add Title ", "PixShortcode" )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon", "PixShortcode" ),
					"param_name" => "icon",
					"value" => __( "fa-flag", "PixShortcode" ),
					"description" => __( "Add icon <a href='//fortawesome.github.io/Font-Awesome/icons/' target='_blank'>Font-Awesome</a> or Use theme icons (please check documentation)", "PixShortcode" )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button Text", "PixShortcode" ),
					"param_name" => "button_text",
					"value" => __( "GEt free check", "PixShortcode" ),
					"description" => __( "Button text", "PixShortcode" )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Link", "PixShortcode" ),
					"param_name" => "link",
					"description" => __( "Link to service.", "PixShortcode" )
				 ),
				 array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content", "PixShortcode" ),
					"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
					"value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "PixShortcode" ),
					"description" => __( "Enter your content.", "PixShortcode" )
				 )
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Boxservices extends WPBakeryShortCode {
			
		}
	}	
		
		
	vc_map(
		array(
			"name" => __( "Brands", "PixShortcode" ),
			"base" => "brandblock",
			"class" => "pix-theme-icon",
			"category" => __( "PixTheme", "PixShortcode"),
			"params" => array(				
				 array(
					'type' => 'attach_image',
					'heading' => __( 'Image', 'js_composer' ),
					'param_name' => 'image',
					'value' => '',
					'description' => __( 'Select image from media library.', 'js_composer' )
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "url", "PixShortcode" ),
					"param_name" => "url",
					"value" => __( "https://wordpress.com", "PixShortcode" ), 
					"description" => __( ".", "PixShortcode" )
				)			
			)
		) 
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Brandblock extends WPBakeryShortCode {
			
		}
	}	
	
	vc_map(
		array(
			"name" => __( "Portfolio", "PixShortcode" ),
			"base" => "portfolioblock",
		"class" => "pix-theme-icon",
			"category" => __( "PixTheme", "PixShortcode"),
			"params" => array(				
				array(
					'type' => 'textfield',
					'heading' => __( 'Items Count', 'PixShortcode' ),
					'param_name' => 'count',
					'description' => __( 'Select image from media library.', 'PixShortcode' )
				),
				array(
					'type' => 'checkbox',
					'heading' => __( 'Categories', 'PixShortcode' ),
					'param_name' => 'cats',
					'value' => $cats,
					'description' => __( 'Select categories to show', 'PixShortcode' )
				),
				$add_css_animation,			
			)
		) 
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Portfolioblock extends WPBakeryShortCode {
			
		}
	}
	
		
	vc_map(
		array(
			"name" => __( "Posts Block", "PixShortcode" ),
			"base" => "postsblock",
			"class" => "pix-theme-icon",
			"category" => __( "PixTheme", "PixShortcode"),
			"params" => array(				
				array(
					'type' => 'textfield',
					'heading' => __( 'Posts Count', 'PixShortcode' ),
					'param_name' => 'count',
					'description' => __( 'Number of posts in carousel. Default 6.', 'PixShortcode' )
				),	
				array(
					'type' => 'textfield',
					'heading' => __( 'Max slides', 'PixShortcode' ),
					'param_name' => 'max_slides',
					'description' => __( 'Max slides on page. Default 2.', 'PixShortcode' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Min slides', 'PixShortcode' ),
					'param_name' => 'min_slides',
					'description' => __( 'Min slides on page. Default 1.', 'PixShortcode' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Width slides', 'PixShortcode' ),
					'param_name' => 'width_slides',
					'description' => __( 'Default 370.', 'PixShortcode' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Margin slides', 'PixShortcode' ),
					'param_name' => 'margin_slides',
					'description' => __( 'Default 30.', 'PixShortcode' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Disable Carousel', 'PixShortcode' ),
					'param_name' => 'disable_carousel',
					'description' => __( 'Default 1. Type 0 to disable carousel.', 'PixShortcode' )
				),		
			)
		) 
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Postsblock extends WPBakeryShortCode {
			
		}
	}
	
		
	
	vc_map(
		array(
			"name" => __( "Video Box", "PixShortcode" ),
			"base" => "videobox",
			"class" => "pix-theme-icon",
			"category" => __( "PixTheme", "PixShortcode"),
			"params" => array(
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title", "PixShortcode" ),
					"param_name" => "title",
					"value" => __( "BEHIND THE SCENES", "PixShortcode" ),
					"description" => __( "", "PixShortcode" )
				 ),
				 array(
					'type' => 'attach_image',
					'heading' => __( 'Image', 'js_composer' ),
					'param_name' => 'image',
					'value' => '',
					'description' => __( 'Select image from media library.', 'js_composer' )
				),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Link", "PixShortcode" ),
					"param_name" => "link",
					"value" => __( "https://vimeo.com/88644449", "PixShortcode" ),
					"description" => __( ".", "PixShortcode" )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Button Text", "PixShortcode" ),
					"param_name" => "text",
					"value" => __( "Play Video", "PixShortcode" ),
					"description" => __( "", "PixShortcode" )
				 ),
				 array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content", "PixShortcode" ),
					"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
					"value" => __( "<p class='font-light aligncenter'>PROJECT DEVELOPMENT OF FREELANCE TEAM FROM IDEAS TO
            DEVELOPMENT TO THE PROJECT LAUNCH </p>", "PixShortcode" ),
					"description" => __( "Enter your content.", "PixShortcode" )
				 )
			)
		) 
	);
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Videobox extends WPBakeryShortCode {
			
		}
	}
	
	vc_map(
		array(
			"name" => __( "Contact Section", "PixShortcode" ),
			"base" => "contactbox",
			"class" => "pix-theme-icon",
			"category" => __( "PixTheme", "PixShortcode"),
			"params" => array(
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Title", "PixShortcode" ),
					"param_name" => "title",
					"value" => '',
					"description" => __( "Title", "PixShortcode" )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Text", "PixShortcode" ),
					"param_name" => "text",
					"value" => '',
					"description" => __( "Text before title.", "PixShortcode" )
				 ),
				 array(
					'type' => 'attach_image',
					'heading' => __( 'Image', 'js_composer' ),
					'param_name' => 'image',
					'value' => '',
					'description' => __( 'Select image from media library.', 'js_composer' )
				 ),
				 
				 array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content", "PixShortcode" ),
					"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
					"description" => __( "Enter your content.", "PixShortcode" )
				 )
			)
		) 
	);
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Contactbox extends WPBakeryShortCode {
			
		}
	}
	
		
//if(empty($_GET['vc_action'])){
	
	//////// Vertical Tabs ////////	
	vc_map( array(
		'name' => __( 'Tabs', 'PixShortcode' ),
		'base' => 'icontexttabs',
			'class' => 'pix-theme-icon', 
		'as_parent' => array('only' => 'icontexttab'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => __( 'PixTheme', 'PixShortcode'),
		'front_enqueue_js' => get_template_directory_uri() . '/library/functions/shortcodes/shortcode.js',
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __( 'Tabs orientation', 'PixShortcode' ),
				'param_name' => 'type',
				'value' => array(
					__( 'Vertical', 'PixShortcode' ) => '',
					__( 'Horizontal', 'PixShortcode' ) => 'horizontal',
				),
				'description' => __( 'Select tabs orientation.', 'PixShortcode' )
			),
		),
		'js_view' => 'VcColumnView', // must be added for all Containers ( or should be extended in js ). VC Dev team
	) );
	vc_map( array(
		'name' => __( 'Tab', 'PixShortcode' ),
		'base' => 'icontexttab',
		'as_child' => array('only' => 'icontexttabs'),
		'content_element' => true,
		'front_enqueue_js' => get_template_directory_uri() . '/library/functions/shortcodes/shortcode.js',
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', 'PixShortcode' ),
				'param_name' => 'title',
				'description' => __( 'Tab title.', 'PixShortcode' )
			),
			/*
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image', 'js_composer' ),
				'param_name' => 'image',
				'value' => '',
				'description' => __( 'Select image from media library.', 'js_composer' )
			),
			*/
			array(
				'type' => 'textfield',
				'heading' => __( 'Icon', 'PixShortcode' ),
				'param_name' => 'icon',
				'description' => __( 'Add icon fa-facebook <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'PixShortcode' )
			),
				array(
				'type' => 'textfield',
				'heading' => __( 'Short Description', 'PixShortcode' ),
				'param_name' => 'short_desc',
				'description' => __( 'short description', 'PixShortcode' )
			),
			array(
				"type" => "textfield",
				"heading" => __( "Tab URL", 'PixShortcode' ),
				"param_name" => "url",
				"value" => '',
				"description" => __( "http://wordpress.com", 'PixShortcode' ),
			),
	
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content", "PixShortcode" ),
				"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "PixShortcode" ),
				"description" => __( "Enter your content.", "PixShortcode" )
			 ),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Icontexttabs extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Icontexttab extends WPBakeryShortCode {
		}
	}
	//////////////////////////////////
	
	
/*	//////// Carousel Content ////////
	vc_map( array(
		'name' => __( 'Service', 'PixShortcode' ),
		'base' => 'caurusel_content', 
		"class" => "pix-theme-icon",
		'as_parent' => array('only' => 'caurusel_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element' => true,
		'show_settings_on_create' => false,
		'category' => __( 'PixTheme', 'PixShortcode'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Carousel title', 'PixShortcode' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as caurusel title. Leave blank if no title is needed.', 'PixShortcode' )
			)
		),
		'js_view' => 'VcColumnView',
		
	) );
	vc_map( array(
		'name' => __( 'Carousel Item', 'PixShortcode' ),
		'base' => 'caurusel_item',
		'as_child' => array('only' => 'caurusel_content'),
		'content_element' => true,
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image', 'js_composer' ),
				'param_name' => 'image',
				'description' => __( 'Select image', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', 'js_composer' ),
				'param_name' => 'title'
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Short Description', 'PixShortcode' ),
				'param_name' => 'short_desc',
				'description' => __( 'short description', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Button Text', 'js_composer' ),
				'param_name' => 'button',
				'description' => __( 'https://www.facebook.com/', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Social Network Icon 1', 'js_composer' ),
				'param_name' => 'scn_icon1',
				'description' => __( 'Add icon fa-facebook <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Social Link 2', 'js_composer' ),
				'param_name' => 'scn2',
				'description' => __( 'https://twitter.com/', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Social Network Icon 2', 'js_composer' ),
				'param_name' => 'scn_icon2',
				'description' => __( 'Add icon fa-twitter <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Social Link 3', 'js_composer' ),
				'param_name' => 'scn3',
				'description' => __( 'https://plus.google.com/', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Social Network Icon 3', 'js_composer' ),
				'param_name' => 'scn_icon3',
				'description' => __( 'Add icon fa-google-plus <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Social Link 4', 'js_composer' ),
				'param_name' => 'scn4',
				'description' => __( '//www.w3.org/TR/html5/', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Social Network Icon 4', 'js_composer' ),
				'param_name' => 'scn_icon4',
				'description' => __( 'Add icon fa-html5 <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Social Link 5', 'js_composer' ),
				'param_name' => 'scn5',
				'description' => __( 'https://github.com/', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Social Network Icon 5', 'js_composer' ),
				'param_name' => 'scn_icon5',
				'description' => __( 'Add icon fa-github <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'js_composer' )
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Short description", "PixShortcode" ),
				"param_name" => "short_desc", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __( "I am test text block. Click edit button to change this text.", "PixShortcode" ),
				"description" => __( "Enter your content.", "PixShortcode" )
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Full Description", "PixShortcode" ),
				"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "PixShortcode" ),
				"description" => __( "Enter your full description.", "PixShortcode" )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Caurusel_Content extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Caurusel_Item extends WPBakeryShortCode {
		}
	}*/
	/////////////////////////////////
	
	//////// Carousel Service ////////
	vc_map( array(
		'name' => __( 'Service carousel', 'PixShortcode' ),
		'base' => 'caurusel_reviews',
		'class' => 'pix-theme-icon', 
		'as_parent' => array('only' => 'caurusel_review'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => __( 'PixTheme', 'PixShortcode'), 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Max slides', 'PixShortcode' ),
				'param_name' => 'max_slides',
				'description' => __( 'Max slides on page. Default 3.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Min slides', 'PixShortcode' ),
				'param_name' => 'min_slides',
				'description' => __( 'Min slides on page. Default 1.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Width slides', 'PixShortcode' ),
				'param_name' => 'width_slides',
				'description' => __( 'Default 370.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Margin slides', 'PixShortcode' ),
				'param_name' => 'margin_slides',
				'description' => __( 'Default 10.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Auto slides', 'PixShortcode' ),
				'param_name' => 'auto_slides',
				'description' => __( 'Default 1. Type 0 to disable auto slides.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Move slides', 'PixShortcode' ),
				'param_name' => 'move_slides',
				'description' => __( 'Number of changing slides. Default 3.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Infinite slides', 'PixShortcode' ),
				'param_name' => 'infinite_slides',
				'description' => __( 'Default 0. Type 1 to infinite slides.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Disable Carousel', 'PixShortcode' ),
				'param_name' => 'disable_carousel',
				'description' => __( 'Default 1. Type 0 to disable carousel.', 'PixShortcode' )
			),
		),
		'js_view' => 'VcColumnView',
		
	) );
	vc_map( array(
		'name' => __( 'Service', 'PixShortcode' ),
		'base' => 'caurusel_review',
		'class' => 'pix-theme-icon', 
		'as_child' => array('only' => 'caurusel_reviews'),
		'content_element' => true,
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image', 'js_composer' ),
				'param_name' => 'image',
				'description' => __( 'Select image.', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Title Service.', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Button text', 'js_composer' ),
				'param_name' => 'button_text',
				'description' => __( 'Button  text.', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Link', 'js_composer' ),
				'param_name' => 'link',
				'description' => __( 'Service link.', 'js_composer' )
			),
			array(
				'type' => 'checkbox',
				'heading' => __( 'Open link in a new window/tab', 'js_composer' ),
				'param_name' => 'target',
				'value' => '',
				'description' => '',
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Service", "PixShortcode" ),
				"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "PixShortcode" ),
				"description" => __( "Enter information.", "PixShortcode" )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Caurusel_Reviews extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Caurusel_Review extends WPBakeryShortCode {
		}
	}
	/////////////////////////////////
	
	//////// Carousel Offers ////////
	vc_map( array(
		'name' => __( 'Offers carousel', 'PixShortcode' ),
		'base' => 'caurusel_offers',
		'class' => 'pix-theme-icon', 
		'as_parent' => array('only' => 'caurusel_offer'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => __( 'PixTheme', 'PixShortcode'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Max slides', 'PixShortcode' ),
				'param_name' => 'max_slides',
				'description' => __( 'Max slides on page. Default 4.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Min slides', 'PixShortcode' ),
				'param_name' => 'min_slides',
				'description' => __( 'Min slides on page. Default 2.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Width slides', 'PixShortcode' ),
				'param_name' => 'width_slides',
				'description' => __( 'Default 270.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Margin slides', 'PixShortcode' ),
				'param_name' => 'margin_slides',
				'description' => __( 'Default 10.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Auto slides', 'PixShortcode' ),
				'param_name' => 'auto_slides',
				'description' => __( 'Default 1. Type 0 to disable auto slides.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Move slides', 'PixShortcode' ),
				'param_name' => 'move_slides',
				'description' => __( 'Number of changing slides. Default 3.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Infinite slides', 'PixShortcode' ),
				'param_name' => 'infinite_slides',
				'description' => __( 'Default 0. Type 1 to infinite slides.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Disable Carousel', 'PixShortcode' ),
				'param_name' => 'disable_carousel',
				'description' => __( 'Default 1. Type 0 to disable carousel.', 'PixShortcode' )
			),
		),
		'js_view' => 'VcColumnView',
		
	) );
	vc_map( array(
		'name' => __( 'Offer Info', 'PixShortcode' ),
		'base' => 'caurusel_offer',
		'class' => 'pix-theme-icon', 
		'as_child' => array('only' => 'caurusel_offers'),
		'content_element' => true,
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image', 'js_composer' ),
				'param_name' => 'image',
				'description' => __( 'Select image.', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Offer title.', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Link', 'js_composer' ),
				'param_name' => 'link',
				'description' => __( 'Offer link.', 'js_composer' )
			),
			array(
				'type' => 'checkbox',
				'heading' => __( 'Open link in a new window/tab', 'js_composer' ),
				'param_name' => 'target',
				'value' => '',
				'description' => '',
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Info", "PixShortcode" ),
				"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "PixShortcode" ),
				"description" => __( "Enter information.", "PixShortcode" )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Caurusel_Offers extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Caurusel_Offer extends WPBakeryShortCode {
		}
	}
	
	//////// Carousel Testimonials ////////
	vc_map( array(
		'name' => __( 'Testimonials carousel', 'PixShortcode' ),
		'base' => 'caurusel_testimonials',
		'class' => 'pix-theme-icon', 
		'as_parent' => array('only' => 'caurusel_testimonial'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => __( 'PixTheme', 'PixShortcode'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Max slides', 'PixShortcode' ),
				'param_name' => 'max_slides',
				'description' => __( 'Max slides on page. Default 1.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Min slides', 'PixShortcode' ),
				'param_name' => 'min_slides',
				'description' => __( 'Min slides on page. Default 1.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Width slides', 'PixShortcode' ),
				'param_name' => 'width_slides',
				'description' => __( 'Default 370.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Margin slides', 'PixShortcode' ),
				'param_name' => 'margin_slides',
				'description' => __( 'Default 10.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Auto slides', 'PixShortcode' ),
				'param_name' => 'auto_slides',
				'description' => __( 'Default 1. Type 0 to disable auto slides.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Move slides', 'PixShortcode' ),
				'param_name' => 'move_slides',
				'description' => __( 'Number of changing slides. Default 1.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Infinite slides', 'PixShortcode' ),
				'param_name' => 'infinite_slides',
				'description' => __( 'Default 0. Type 1 to infinite slides.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Disable Carousel', 'PixShortcode' ),
				'param_name' => 'disable_carousel',
				'description' => __( 'Default 1. Type 0 to disable carousel.', 'PixShortcode' )
			),
		),
		'js_view' => 'VcColumnView',
		
	) );
	vc_map( array(
		'name' => __( 'Testimonial', 'PixShortcode' ),
		'base' => 'caurusel_testimonial',
		'class' => 'pix-theme-icon', 
		'as_child' => array('only' => 'caurusel_testimonials'),
		'content_element' => true,
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Name', 'PixShortcode' ),
				'param_name' => 'name',
				'description' => __( 'Person name.', 'PixShortcode' )
			),
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image', 'PixShortcode' ),
				'param_name' => 'image',
				'description' => __( 'Select image.', 'PixShortcode' )
			),			
			array(
				'type' => 'textfield',
				'heading' => __( 'Info', 'PixShortcode' ),
				'param_name' => 'info',
				'description' => __( 'Person info.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', 'PixShortcode' ),
				'param_name' => 'title',
				'description' => __( 'Testimonial title.', 'PixShortcode' )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Rating', 'PixShortcode' ),
				'param_name' => 'rating',
				'value' => array(
					5 => 5,
					4 => 4,
					3 => 3,
					2 => 2,
					1 => 1
				),
				'description' => __( 'Rating 5 - 1.', 'PixShortcode' )
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content", "PixShortcode" ),
				"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "PixShortcode" ),
				"description" => __( "Testimonial content.", "PixShortcode" )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Caurusel_Testimonials extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Caurusel_Testimonial extends WPBakeryShortCode {
		}
	}
	/////////////////////////////////
	
	//////// Our Team ////////
	vc_map( array(
		'name' => __( 'Team carousel', 'PixShortcode' ),
		'base' => 'ourteam',
		'class' => 'pix-theme-icon', 
		'as_parent' => array('only' => 'teammember'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => __( 'PixTheme', 'PixShortcode'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Max slides', 'PixShortcode' ),
				'param_name' => 'max_slides',
				'description' => __( 'Max slides on page. Default 4.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Min slides', 'PixShortcode' ),
				'param_name' => 'min_slides',
				'description' => __( 'Min slides on page. Default 2.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Width slides', 'PixShortcode' ),
				'param_name' => 'width_slides',
				'description' => __( 'Default 270.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Margin slides', 'PixShortcode' ),
				'param_name' => 'margin_slides',
				'description' => __( 'Default 10.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Auto slides', 'PixShortcode' ),
				'param_name' => 'auto_slides',
				'description' => __( 'Default 1. Type 0 to disable auto slides.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Move slides', 'PixShortcode' ),
				'param_name' => 'move_slides',
				'description' => __( 'Number of changing slides. Default 3.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Infinite slides', 'PixShortcode' ),
				'param_name' => 'infinite_slides',
				'description' => __( 'Default 0. Type 1 to infinite slides.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Disable Carousel', 'PixShortcode' ),
				'param_name' => 'disable_carousel',
				'description' => __( 'Default 1. Type 0 to disable carousel.', 'PixShortcode' )
			),
		),
		'js_view' => 'VcColumnView',
		
	) );
	vc_map( array(
		'name' => __( 'Team Member', 'PixShortcode' ),
		'base' => 'teammember',
		'class' => 'pix-theme-icon', 
		'as_child' => array('only' => 'ourteam'),
		'content_element' => true,
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image', 'PixShortcode' ),
				'param_name' => 'image',
				'description' => __( 'Select image.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Name', 'PixShortcode' ),
				'param_name' => 'name',
				'description' => __( 'Team member name.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Button Text', 'PixShortcode' ),
				'param_name' => 'text',
				'description' => __( 'Button Text.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Link', 'PixShortcode' ),
				'param_name' => 'link',
				'description' => __( 'Team member link.', 'PixShortcode' )
			),
			array(
				'type' => 'checkbox',
				'heading' => __( 'Open link in a new window/tab', 'js_composer' ),
				'param_name' => 'target',
				'value' => '',
				'description' => '',
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Info", "PixShortcode" ),
				"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "PixShortcode" ),
				"description" => __( "Enter information.", "PixShortcode" )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Ourteam extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Teammember extends WPBakeryShortCode {
		}
	}
	////////////////////////
	
	//////// Social Buttons ////////
	vc_map( array(
		'name' => __( 'Social Buttons', 'PixShortcode' ),
		'base' => 'socialbuts',
		'class' => 'pix-theme-icon', 
		'as_parent' => array('only' => 'socialbut'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element' => true,
		'show_settings_on_create' => false,
		'category' => __( 'PixTheme', 'PixShortcode'),
		'js_view' => 'VcColumnView',
		
	) );
	vc_map( array(
		'name' => __( 'Social Button', 'PixShortcode' ),
		'base' => 'socialbut',
		'class' => 'pix-theme-icon', 
		'as_child' => array('only' => 'socialbuts'),
		'content_element' => true,
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', 'PixShortcode' ),
				'param_name' => 'title',
				'description' => __( 'Social title.', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Icon', 'PixShortcode' ),
				'param_name' => 'icon',
				'description' => __( 'Add social icon fa-facebook <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'PixShortcode' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Link', 'PixShortcode' ),
				'param_name' => 'link',
				'description' => __( 'Social link.', 'PixShortcode' )
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Color", "PixShortcode" ),
				"param_name" => "color", 
				"description" => __( "Select bg color.", "PixShortcode" )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Socialbuts extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Socialbut extends WPBakeryShortCode {
		}
	}
	
//} ////// <= End vc_inline
	
}

