<?php
define ( 'JS_PATH' , get_template_directory_uri().'/library/functions/shortcodes/shortcode.js');

$GLOBALS['icontext_count']=0;
$GLOBALS['icontext_active_count']=0;
$GLOBALS['icontexts']='';
$GLOBALS['vertical_count']=0;
$GLOBALS['vertical_active_count']=0;
$GLOBALS['verticals']='';
$GLOBALS['caurusel_count']=0;
$GLOBALS['caurusel_items']='';
$GLOBALS['review_count']=0;
$GLOBALS['reviews']='';
$GLOBALS['offer_count']=0;
$GLOBALS['offers']='';
$GLOBALS['testimonial_count']=0;
$GLOBALS['testimonial_active_count']=0;
$GLOBALS['testimonials']='';
$GLOBALS['member_count']=0;
$GLOBALS['members']='';
$GLOBALS['social_count']=0;
$GLOBALS['socials']='';

add_action('admin_head','html_quicktags');
function html_quicktags() {

	$output = "<script type='text/javascript'>\n
	/* <![CDATA[ */ \n";
	wp_print_scripts( 'quicktags' );
	
	
	
	$buttons[] = array(
		'name' => 'thin_title',
		'options' => array(
			'display_name' => 'thin_title',
			'open_tag' => '\n[thin_title]',
			'close_tag' => '[/thin_title]\n',
			'key' => ''
	));


	
	$buttons[] = array(
		'name' => 'btn_icon',
		'options' => array(
			'display_name' => 'btn_icon',
			'open_tag' => '\n[btn_icon  link="http://google.com"  type="right"]',
			'close_tag' => '[/btn_icon]\n',
			'key' => ''
	));
	
	
	
	
	$buttons[] = array(
		'name' => 'icon_box',
		'options' => array(
			'display_name' => 'icon_box',
			'open_tag' => '\n[icon_box  icon="fa-flag"  type="fa-2x"]',
			'close_tag' => '[/icon_box]\n',
			'key' => ''
	));
	
	
	
	
	$buttons[] = array(
		'name' => 'marked_list1',
		'options' => array(
			'display_name' => 'marked_list1',
			'open_tag' => '\n[marked_list1]',
			'close_tag' => '[/marked_list1]\n',
			'key' => ''
	));
	
	
	$buttons[] = array(
		'name' => 'marked_list2',
		'options' => array(
			'display_name' => 'marked_list2',
			'open_tag' => '\n[marked_list2]',
			'close_tag' => '[/marked_list2]\n',
			'key' => ''
	));

			
	for ($i=0; $i <= (count($buttons)-1); $i++) {
		$output .= "edButtons[edButtons.length] = new edButton('ed_{$buttons[$i]['name']}'
			,'{$buttons[$i]['options']['display_name']}'
			,'{$buttons[$i]['options']['open_tag']}'
			,'{$buttons[$i]['options']['close_tag']}'
			,'{$buttons[$i]['options']['key']}'
		); \n";
	}
	
	$output .= "\n /* ]]> */ \n
	</script>";
	echo $output;
}

function pixtheme_addbuttons() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;

	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "add_pix_custom_tinymce_plugin");
		add_filter('mce_buttons_3', 'register_pix_custom_button');
	}
}
function register_pix_custom_button($buttons) {
	array_push(
		$buttons,
		"title_block",
		"title_image",
		"thin_title",
	   "banner",
		"content_block",
		"VideoBox",
		"FeatServ",
		"FeatServ2",
		"DealPanel",
		"ReviewsPanel",
		"Progress",
		"AddButton",
		"Dropdown",
		"Tabs",
		"fTabs",
		"AboutTabs",
		"Toggle",
		"Accordion",
		"Testimonial",
		"btn_icon",
		"Banner",
		"Carousel",
		"Contact",
		"Fblock",
		"Tblock",
		"Offerblock",
		"BrandBlock",
		"hexagon",
		"state"
		
		); 
	return $buttons;
} 
function add_pix_custom_tinymce_plugin($plugin_array) {
	$plugin_array['PixThemeShortcodes'] = JS_PATH;
	return $plugin_array;
}
add_action('init', 'pixtheme_addbuttons');


/******************* thin_title *******************/

function alc_thin_title( $atts, $content = null ) {
     extract(shortcode_atts(array(
		"title"=>''
	), $atts));	
	$out = '<h2 class="light-font">'.$content.'</h2>';
   return $out;
}
add_shortcode('thin_title', 'alc_thin_title');



/******************* btn_icon *******************/

function alc_btn_icon( $atts, $content = null ) {
     extract(shortcode_atts(array(
		"link"=>'',
		"type"=>''
	), $atts));	
	$out = '<div class="btn-icon-wrap"><a href="'.$link.'" class="btn  btn-primary btn-icon-'.$type.' ">'.$content.'
          <div class="btn-icon"><i class="fa fa-long-arrow-'.$type.'"></i></div>
          </a></div>';
   return $out;
}
add_shortcode('btn_icon', 'alc_btn_icon');



/******************* icon_box *******************/

function alc_icon_box( $atts, $content = null ) {
     extract(shortcode_atts(array(
		"icon"=>'',
		"type"=>''
	), $atts));	
	$out = '<span class="icon_box_wrap"><i class="fa '.$icon.'  '.$type.'"></i></span>';
   return $out;
}
add_shortcode('icon_box', 'alc_icon_box');


/******************* marked_list1 *******************/

function alc_marked_list1( $atts, $content = null ) {
     extract(shortcode_atts(array(
		"icon"=>'',
		"type"=>''
	), $atts));	
	$out = '<div class="marked_list1">'.$content.'</div>';
   return $out;
}
add_shortcode('marked_list1', 'alc_marked_list1');


/******************* marked_list2 *******************/

function alc_marked_list2( $atts, $content = null ) {
     extract(shortcode_atts(array(
		"icon"=>'',
		"type"=>''
	), $atts));	
	$out = '<div class="marked_list2">'.$content.'</div>';
   return $out;
}
add_shortcode('marked_list2', 'alc_marked_list2');


/********************* TITLE BLOCK**********************/

function pixtheme_title_block( $atts, $content = null ) {
   return '
   <h4 class="title_block"><span>' . do_shortcode($content) . '</span></h4>';
}
add_shortcode('title_block', 'pixtheme_title_block');

function pixtheme_content_block( $atts, $content = null ) {
   return '<div class="content_block">' . do_shortcode($content) . '</div>';
}
add_shortcode('content_block', 'pixtheme_content_block');

 





		  
	
/********************* VC TITLE IMAGE **********************/

function pix_title_image( $atts, $content = null ) {
	$out = $image = '';
 extract(shortcode_atts(array(
		"title" => '',
		"image" => $image,
		"after" => ''
	), $atts));	
	
	$img = wp_get_attachment_image_src( $image, 'large' );
		
	$img_output = $img[0];
	
	$out = '
	
	<div class="row">
      <div class="col-lg-12 text-center">
	<div data-animation="bounceInUp" class="heading-wrap animated animation-done bounceInUp">
          <div class="small-logo"><img width="106" height="36" src="'.esc_url($img_output).'" alt="logo"></div>
          <h2 class="section-heading">'.$title.'</h2>
          <h3 class="section-subheading hang">'.$after.'</h3>
        </div>     </div>     </div>
	
	<div class="text-center after-title-info">   '.do_shortcode($content).'  </div>
	   

	
	';
		
    return $out;	
}

add_shortcode('title_image', 'pix_title_image');

/**************************************************/	  

		  
	
/********************* VC PROMO **********************/

function pix_promo( $atts, $content = null ) {
	$out = $image = '';
 extract(shortcode_atts(array(
		"title" => '',
		"image" => $image,
		"link" => '',
		"text" => ''
	), $atts));	
	
	$img = wp_get_attachment_image_src( $image, 'large' );
		
	$img_output = $img[0];
	
	$out = '
	
	
<div class="promo-item">
            <div class="overlay-promo"><a class="btn" href="'.esc_url($link).'" >'.$text.'</a></div>
            <a href="'.esc_url($link).'"><img src="'.esc_url($img_output).'"></a>
            <div class="promo-caption">
              <div class="promo-content">
               '.do_shortcode($content).'
              </div>
            </div>
          </div>
	
	';
		
    return $out;	
}

add_shortcode('promo', 'pix_promo');

/**************************************************/	  


/********************* VC VIDEO BOX **********************

function pix_videobox( $atts, $content = null ) {
	$out = $image = '';
 extract(shortcode_atts(array(
		"title" => '',
		"image" => $image,
		"link" => '',
		"text" => ''
	), $atts));	
	
	$img = wp_get_attachment_image_src( $image, 'large' );
		
	$img_output = $img[0];
	
	$out = '<div class="video-box">
      <div class="video-box-left">
        <h4 class="aligncenter video-box-title">'.$title.'</h4>
        <div class="video-box-info">
          <p class="font-light aligncenter">'.do_shortcode($content).'</p>
          <a href="'.esc_url($link).'" class="btn btn-danger video-popab"><i class="icon-exclamation-sign"></i>'.$text.'</a> </div>
      </div>
      <div class="video-box-right"> <a href="'.esc_url($link).'" class="video-popab"> <img src="'.esc_url($img_output).'" width="800" height="580" alt=""></a></div>
    </div>';
		
    return $out;	
}

add_shortcode('videobox', 'pix_videobox');

/**************************************************/







/********************* VC BANNER BOX **********************/

function pix_banner( $atts, $content = null ) {
	$out = $image = '';
 extract(shortcode_atts(array(
		"title" => '',
		
		"link" => '',
	), $atts));	
	
	$img = wp_get_attachment_image_src( $image, 'large' );
		
	$img_output = $img[0];
	
	$out = '
	
	
	<div class="banner-full-width primary-color" id="banner01">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 text-right">
       '.do_shortcode($content).'
      </div>
      <div class="col-lg-2 text-left"> <a href="'.esc_url($link).'" class="btn btn-default">'.$title.'</a>  </div>
      <div class="col-lg-2 text-right"></div>
    </div>
  </div>
</div>

	


	';
		
    return $out;	
}

add_shortcode('banner', 'pix_banner');

/**************************************************/



/********************* VC FEATURED SERVICES **********************/

function pix_featserv( $atts, $content = null ) {
 extract(shortcode_atts(array(
		"title" => '',
		"icon" => '' 
	), $atts));	
	
	$out = '';
	$finaltitle = ($title == '') ? '': ' <h4 class="service-heading">'.$title.'</h4>';
	$finallicon = ($icon == '') ? '': '<i class="fa '.esc_attr($icon).'"></i>';
	
	$out = '
	
	<div  class="service-item text-center">
          <div class="service-icon"> '.$finallicon.'</div>
         	'.$finaltitle.'

	'.do_shortcode($content).'
	</div>'; 
		
    return $out;	
}

add_shortcode('featserv', 'pix_featserv');

/**************************************************/







/********************* VC FEATURED SERVICES 2 **********************/

function pix_featserv2( $atts, $content = null ) {
 extract(shortcode_atts(array(
		"title" => '',
		"icon" => '' 
	), $atts));	
	
	$out = '';
	$finaltitle = ($title == '') ? '': '<h4 class="sub-title  text-left">'.$title.'</h4>';
	$finallicon = ($icon == '') ? '': '<i class="fa '.esc_attr($icon).'"></i>';
	
	$out = '
	
	<div class="ft-box text-center">
          <div class="ft-icon-box "> '.$finallicon.'</div>
          <hr style="max-width:30px;">
          <h4>'.$finaltitle.'</h4>
	'.do_shortcode($content).'
	   </div>'; 
		
    return $out;	
}

add_shortcode('featserv2', 'pix_featserv2');

/**************************************************/



/********************* DEAl PANEL **********************/

function pix_dealpan( $atts, $content = null ) {
 extract(shortcode_atts(array(
		"title" => '',
		"icon" => '',
		"offers" => '', 
		"href" => '' 
	), $atts));	
	
	$out = '';
	$finaltitle = ($title == '') ? '': ''.$title.'';
	$finallicon = ($icon == '') ? '': '<i class="fa '.esc_attr($icon).'"></i>';
	$finalloffers = ($offers == '') ? '': '    <span class="chart" data-percent="'.esc_attr($offers).'"> <span class="percent"></span> </span>  ';
	$finallhref = ($href == '') ? '#': $href;
	
	
	$out = '<div class="featured-item-simple-icon text-center" >
              <div class="ft-icons-simple"> '.$finallicon.' </div>
			  
			  '.$finalloffers.'
			  
           
              <h6>'.$finaltitle.'  </h6>
            </div> '; 

		
    return $out;	
}

add_shortcode('dealpan', 'pix_dealpan');

/**************************************************/

/********************* REVIEWS PANEL **********************/

function pix_review_group( $atts, $content ) {
	
	$GLOBALS['review_count'] = 0;
	
	do_shortcode( $content );
	if( is_array( $GLOBALS['reviews'] ) ){
		$count = 1;
		foreach( $GLOBALS['reviews'] as $review ){
			
			$finalimage = ($review['image'] == '') ? '': '<div class="avatar-review"><img src="'.esc_url($review['image']).'" alt="Avatar"></div>';
			$finalname = ($review['name'] == '') ? '': '<h3 class="heading">'.$review['name'].'</h3>';
			$finaljob = ($review['job'] == '') ? '': '<h4 class="sub-heading">'.$review['job'].'</h4>';
			
			$out = '<li> <div data-animation="fadeIn" class="team-member-item animated  fadeIn ">';
			$out .= 	$finalimage;
			$out .= '	<div class="details-review">';
			$out .= '		<div class="desc-det">'.do_shortcode($review['content']).'</div>';
			$out .= '		<div class="review-autor">'.$finalname.$finaljob.'</div>';
			$out .= '	</div>';
			$out .= '</div> </li>';			
			
			$reviews[] = $out;
			
			$count ++;
		}
                
		$return = ' <div data-animation="bounceInRight" class="animated reviews-frame">
        				<ul class="review-slider" >
							'.implode( "\n", $reviews ).'
						</ul>
					</div>
					 <div class="sly_scrollbar">
      <div class="handle"></div>
    </div>';	
	}
	return $return;
			
}

add_shortcode('reviewgroup', 'pix_review_group');



/*************** TESTIMONIALS ********************/
function pix_testimonial( $atts, $content = null ) {
    extract(shortcode_atts(array(
		"authorname"	=> '', 
		"authorposition"	=> ''
	), $atts));

	$out = '<div class="testimonial-block"><div class="testimonial-content"><p>'.do_shortcode($content).'</p></div><cite>'.$authorname.'</cite><p class="test_author">'.$authorposition.'</p></div>';
    return $out;
}
add_shortcode('testimonial', 'pix_testimonial');

/************************************************/





/***********  VC VIDEOS  ****************/

function pix_video($atts, $content=null) {
	extract(
		shortcode_atts(array(
			'site' => 'youtube',
			'id' => '',
			'width' => '',
			'height' => '',
			'autoplay' => '0'
		), $atts)
	);
	if ( $site == "youtube" ) { $src = 'http://www.youtube.com/embed/'.$id.'?autoplay='.$autoplay; }
	else if ( $site == "vimeo" ) { $src = 'http://player.vimeo.com/video/'.$id.'?autoplay='.$autoplay; }
	else if ( $site == "dailymotion" ) { $src = 'http://www.dailymotion.com/embed/video/'.$id.'?autoplay='.$autoplay; }
	else if ( $site == "veoh" ) { $src = 'http://www.veoh.com/static/swf/veoh/SPL.swf?videoAutoPlay='.$autoplay.'&permalinkId='.$id; }
	else if ( $site == "bliptv" ) { $src = 'http://a.blip.tv/scripts/shoggplayer.html#file=http://blip.tv/rss/flash/'.$id; }
	else if ( $site == "viddler" ) { $src = 'http://www.viddler.com/embed/'.$id.'e/?f=1&offset=0&autoplay='.$autoplay; }
	
	if ( $id != '' ) {
		return '<div class="flex-video"><iframe width="'.esc_attr($width).'" height="'.esc_attr($height).'" src="'.esc_url($src).'" class="vid iframe-'.esc_attr($site).'"></iframe></div>';
	}
}
add_shortcode('video','pix_video');

/************************************************/


add_shortcode( 'icontexttab', 'pix_vertical_tab' );
add_shortcode('icontexttabs', 'pix_vertical_tabs');

// changed by VC dev team
function pix_vertical_tabs( $atts, $content = null ) {
	$output='';
	
	extract(shortcode_atts(array(
	 	"type" => '',
	), $atts));
	
    $GLOBALS['verticals'] = array();
	$GLOBALS['vertical_active_count'] = 1;
	$content_do = do_shortcode($content);	
	$GLOBALS['vertical_count'] = 0;
	if( is_array( $GLOBALS['verticals'] ) && ! empty( $GLOBALS['verticals'] ) ){
		foreach( $GLOBALS['verticals'] as $vertical ){
			$active = $vertical['active'] ? 'active' : '';
			$tabs[] = '<li class="'.esc_attr($active).'">
						<a data-toggle="tab" href="#tab'.esc_attr($vertical['id']).'" data-external-href="'.esc_url($vertical['url']).'">
						<div class="fa-box"><i class="fa '.esc_attr($vertical['icon']).'"></i></div> 
						<div class="fa-content">
							<h4>'.$vertical['title'].'</h4>
							<p>'.$vertical['short_desc'].'</p>
						</div>
						</a>
					   </li>';
					   
		}        
		$output = '	
		<div class="ver-tabs '.($type=='horizontal' ? 'horiz-tabs' : '').'">
		  <div class="row">
			<div class="col-md-'.($type=='horizontal' ? '12' : '5').'">
			  <nav class="nav-sidebar">
				<ul class="nav tabs">'.implode( "\n", $tabs ).'</ul>
			  </nav>
        	</div>
          	<div class="col-md-'.($type=='horizontal' ? '12' : '7').'">          
			  <!-- tab content -->
			  <div class="tab-content">' . $content_do . '</div>		 	
		  	</div>
		  </div>
		</div>
		';		        
	}
	return $output;   
}

// rewritted by vc dev team
function pix_vertical_tab( $atts, $content ){
	
	$out = $image = '';
		
	extract(shortcode_atts(array(
	 	"title" => '',
	 	"icon" => '',
	 	'url' => '',
		"short_desc" => '',
	 	"text" => '',
	), $atts));
	
	//	$img = wp_get_attachment_image_src( $image, 'large' );
		
	//$img_output = $img[0];
	
	$x = isset($GLOBALS['vertical_count'])?$GLOBALS['vertical_count']:0;
    $randomId = mt_rand(0, 100000);
    $count = isset($GLOBALS['vertical_active_count'])?$GLOBALS['vertical_active_count']:0;
	$GLOBALS['verticals'][$x] = array( 'title' => $title, 'url' => $url, 'icon' => $icon, 'short_desc' => $short_desc,  'text' => $text,  'id'=> $randomId, 'active'=>$count===1, 'content' => $content );
	$GLOBALS['vertical_count']++;
    
	$active = $count == 1 ? ' active' : '';
	$cont = '
			<div id="tab'.esc_attr($randomId).'"   class="tab-pane text-style '.esc_attr($active).'">
			  '.do_shortcode($content).'				
			</div>';
	
    $GLOBALS['vertical_active_count']++;
	return $cont;
}


/*************** Carousel Content ****************/

function pix_caurusel_content( $atts, $content = null ) {
    $output = '';
	extract(shortcode_atts(array(
		'title' => ''
	), $atts));
	
	$GLOBALS['caurusel_items'] = array();
	do_shortcode($content);	 	
	$GLOBALS['caurusel_count'] = 0;
	
	if( is_array( $GLOBALS['caurusel_items'] ) ){
		$count = 1;
		foreach( $GLOBALS['caurusel_items'] as $item ){
			
			$out = '
			<li>
				<div class="x-item  team-item">			
					<div class="portfolio-image"> 
						<img src="'.esc_url($item['avatar']).'" alt="'.esc_attr($item['name']).'" >
                    	<div class="slide-desc">
						<table><tr><td>
                      		<div class="view-more-box"><a data-type="member-'.esc_attr($count).'" href="#0"> <span class="hb hb-sm"> <i class="fa fa-search-plus"></i></span> </a> </div>
							</td></tr></table>
                    	</div>
                  	</div>
					
					<div class="portfolio-product-info">';
			
				if ($item['name']) $out.='<h4>'.$item['name'].'</h4>';
				if ($item['postition']) $out.='<div class="type-poduct">'.$item['postition'].'</div>';
			$out.='				
						<div class="desc-det"> 		
							<p>'.$item['short_desc'].'</p>
						</div>';
			
			if($item['scn1'] || $item['scn2'] || $item['scn3'] || $item['scn4'] || $item['scn5']){
				$out .= '<ul class="social-team">';
					if ($item['scn1']) $out.='<li><a href="'.esc_url($item['scn1']).'" target="_blank"><i class="fa '.esc_attr($item['scn_icon1']).'"></i></a></li>';
					if ($item['scn2']) $out.='<li><a href="'.esc_url($item['scn2']).'" target="_blank"><i class="fa '.esc_attr($item['scn_icon2']).'"></i></a></li>';
					if ($item['scn3']) $out.='<li><a href="'.esc_url($item['scn3']).'" target="_blank"><i class="fa '.esc_attr($item['scn_icon3']).'"></i></a></li>';
					if ($item['scn4']) $out.='<li><a href="'.esc_url($item['scn4']).'" target="_blank"><i class="fa '.esc_attr($item['scn_icon4']).'"></i></a></li>';
					if ($item['scn5']) $out.='<li><a href="'.esc_url($item['scn5']).'" target="_blank"><i class="fa '.esc_attr($item['scn_icon5']).'"></i></a></li>';
				$out .= '</ul>';
			}
			$out.='                
			  		</div>
				</div>
			</li>';
			
			$items[] = $out;
			
			$desc = '
			<div class="cd-member-bio member-'.esc_attr($count).'">
				<div class="cd-member-bio-pict"> <img src="'.esc_url($item['avatar']).'" alt="'.esc_attr($item['name']).'" > </div>
				<div class="cd-bio-content">
          			<h3>'.$item['name'].'</h3>
					'.do_shortcode($item['content']).'
				</div>
			</div>';
			
			$full_desc[] = $desc;
			 
			$count ++;
		}
                
		$output = ' 
					<main id="cd-team">
						<section class="xcarousel-2">					
					 		<div class="x-frame" >
								<ul class="x-slider" >
									'.implode( "\n", $items ).'
								</ul>
							</div> 
							<div class="x-navigation navigation"> 
								<a class="btn slider-direction prev-page" href="javascript:void(0);"><i class="icomoon-arrow-left2"></i></a> 
								<a class="btn  slider-direction next-page disabled" href="javascript:void(0);"><i class="icomoon-arrow-right2"></i></a> 
							</div>
						</section > 
						<div class="cd-overlay"></div> 
					</main>

					'.implode( "\n", $full_desc );
					
	}
	return $output;
	
   
}
add_shortcode('caurusel_content', 'pix_caurusel_content');

///////////////////////////

function pix_caurusel_item( $atts, $content ){
	$image = '';
	extract(shortcode_atts(array(
	 	"avatar" => $image,
	 	"name" => '',
		"postition" => '',

		"scn1" => '',
		"scn_icon1" => '',
		"scn2" => '',
		"scn_icon2" => '',
		"scn3" => '',
		"scn_icon3" => '',
		"scn4" => '',
		"scn_icon4" => '',
		"scn5" => '',
		"scn_icon5" => '',
		"short_desc" =>'',
	), $atts));
	
	$img = wp_get_attachment_image_src( $avatar, 'large' );		
	$img_output = $img[0];
	
	$x = $GLOBALS['caurusel_count'];
	$GLOBALS['caurusel_items'][$x] = array( 'avatar' => $img_output, 'name' => $name, 'postition' => $postition, 'scn1' => $scn1, 'scn_icon1' => $scn_icon1, 'scn2' => $scn2, 'scn_icon2' => $scn_icon2, 'scn3' => $scn3, 'scn_icon3' => $scn_icon3, 'scn4' => $scn4, 'scn_icon4' => $scn_icon4, 'scn5' => $scn5, 'scn_icon5' => $scn_icon5, 'short_desc' => $short_desc, 'content' => $content );
	
	$GLOBALS['caurusel_count']++;
}
add_shortcode( 'caurusel_item', 'pix_caurusel_item' );
/************************************************/


/*************** Carousel Image Info ****************/

function pix_caurusel_reviews( $atts, $content = null ) {
    $output = '';
	extract(shortcode_atts(array(
		'max_slides' => '',
		'min_slides' => '',
		'width_slides' => '',
		'margin_slides' => '',
		'auto_slides' => '',
		'move_slides' => '',
		'infinite_slides' => '',
		'disable_carousel' => '',
	), $atts));
	
	$GLOBALS['reviews'] = array();
	do_shortcode($content);	 	
	$GLOBALS['review_count'] = 0;
	
	if( is_array( $GLOBALS['reviews'] ) ){
		$count = 1;
		foreach( $GLOBALS['reviews'] as $item ){
			$class = $count == 1 ? 'class="active"' : '';
			$blank = !empty($item['target']) ? 'target="_blank"' : '';

			$out = '
			<li>
            <div class="tmpl-padding">
                <div class="media">
					<a '.$blank.' href="'.esc_url($item['link']).'"><img src="'.esc_attr($item['image']).'" alt="'.esc_attr($item['title']).'"/></a>
				</div>
				<div class="carousel-item-content">
					<a '.$blank.' class="carousel-title">'.wp_kses_post($item['title']).'</a>
					<div class="carousel-text">
						'.do_shortcode($item['content']).'
							<div class="btn-carousel-1"> 
						 </div><a '.$blank.' href="'.esc_url($item['link']).'" class="btn btn-primary btn-lg btn-icon-right">'.esc_attr($item['button_text']).'
							<div class="btn-icon"><i class="fa fa-long-arrow-right"></i></div>
						</a>
					</div>
                </div>
                 </div>
			</li>';
			
			
			$reviews[] = $out;
			 
			$count ++;
		}
        
		$max_slides = $max_slides == '' ? 3 : $max_slides;
		$min_slides = $min_slides == '' ? 1 : $min_slides;
		$width_slides = $width_slides == '' ? 370 : $width_slides;
		$margin_slides = $margin_slides == '' ? 10 : $margin_slides;
		$auto_slides = $auto_slides != '0' ? 'true' : 'false';
		$move_slides = $move_slides == ''? 3 : $move_slides;
		$infinite_slides = $infinite_slides != '1' ? 'false' : 'true';
		$disable_carousel = $disable_carousel != '0' ? 'bxslider' : 'carousel-disable';
		       
		$output = ' 
				<section class="carousel animated " data-animation="fadeInUp">
					<ul class="carousel-1 '.$disable_carousel.'" 
						data-max-slides="'.$max_slides.'" 
						 data-min-slides="'.$min_slides.'" 
						data-width-slides="'.$width_slides.'" 
						data-margin-slides="'.$margin_slides.'" 
							data-auto-slides="'.$auto_slides.'" 
						data-move-slides="'.$move_slides.'"   
						data-infinite-slides="'.$infinite_slides.'" >
						'.implode( "\n", $reviews ).'
					</ul>
				</section>';
					
	}
	return $output;
	
   
}
add_shortcode('caurusel_reviews', 'pix_caurusel_reviews');

///////////////////////////

function pix_caurusel_review( $atts, $content ){
	$image = '';
	extract(shortcode_atts(array(
	 	'image' => $image,
		'title' => '',
		'button_text' => '',
		'link' => '',
		'target' => '',
	), $atts));
	
	$img = wp_get_attachment_image_src( $image, 'full' );		
	$img_output = $img[0];
	
	$x = $GLOBALS['review_count'];
	$GLOBALS['reviews'][$x] = array( 'image' => $img_output, 'title' => $title, 'button_text' => $button_text, 'link' => $link, 'target' => $target, 'content' => $content );
	
	$GLOBALS['review_count']++;
}
add_shortcode( 'caurusel_review', 'pix_caurusel_review' );
/************************************************/

/*************** Carousel Offers ****************/

function pix_caurusel_offers( $atts, $content = null ) {
    $output = '';
	extract(shortcode_atts(array(
		'max_slides' => '',
		'min_slides' => '',
		'width_slides' => '',
		'margin_slides' => '',
		'auto_slides' => '',
		'move_slides' => '',
		'infinite_slides' => '',
		'disable_carousel' => '',
	), $atts));
	
	$GLOBALS['offers'] = array();
	do_shortcode($content);	 	
	$GLOBALS['review_count'] = 0;
	
	if( is_array( $GLOBALS['offers'] ) ){
		$count = 1;
		foreach( $GLOBALS['offers'] as $item ){
			$class = $count == 1 ? 'class="active"' : '';
			$blank = !empty($item['target']) ? 'target="_blank"' : '';
			$out = '
			<li>
                <div class="media">
					<a '.$blank.' href="'.esc_url($item['link']).'"><img src="'.esc_attr($item['image']).'" alt="'.esc_attr($item['title']).'"/></a>
				</div>
				<div class="carousel-item-content">
					<a '.$blank.' href="'.esc_url($item['link']).'" class="carousel-title">'.wp_kses_post($item['title']).'</a>
					<div class="carousel-text">
						'.do_shortcode($item['content']).' 
					</div>
					<div class="text-right">
						<a '.$blank.' class="btn btn-primary btn-lg btn-icon-right btn-transparent"  href="'.esc_url($item['link']).'">
							<div class="btn-icon">
								<i class="fa fa-long-arrow-right"></i>
							</div>
						</a>
					</div>
                </div>
			</li>';
			
			$offers[] = $out;
			 
			$count ++;
		}
        
		$max_slides = $max_slides == '' ? 4 : $max_slides;
		$min_slides = $min_slides == '' ? 2 : $min_slides;
		$width_slides = $width_slides == '' ? 270 : $width_slides;
		$margin_slides = $margin_slides == '' ? 10 : $margin_slides;
		$auto_slides = $auto_slides != '0' ? 'true' : 'false';
		$move_slides = $move_slides == ''? 3 : $move_slides;
		$infinite_slides = $infinite_slides != '1' ? 'false' : 'true';
		$disable_carousel = $disable_carousel != '0' ? 'bxslider' : 'carousel-disable';
		       
		$output = ' 
				<section class="carousel animated " data-animation="fadeInUp">
					<ul class="carousel-2 '.$disable_carousel.'" 
						data-max-slides="'.$max_slides.'" 
						 data-min-slides="'.$min_slides.'" 
						data-width-slides="'.$width_slides.'" 
						data-margin-slides="'.$margin_slides.'" 
							data-auto-slides="'.$auto_slides.'" 
						data-move-slides="'.$move_slides.'"   
						data-infinite-slides="'.$infinite_slides.'" >
						'.implode( "\n", $offers ).'
					</ul>
				</section>';
					
	}
	return $output;
	
   
}
add_shortcode('caurusel_offers', 'pix_caurusel_offers');

///////////////////////////

function pix_caurusel_offer( $atts, $content ){
	$image = '';
	extract(shortcode_atts(array(
	 	'image' => $image,
		'title' => '',
		'link' => '',
		'target' => '',
	), $atts));
	
	$img = wp_get_attachment_image_src( $image, 'full' );		
	$img_output = $img[0];
	
	$x = $GLOBALS['offer_count'];
	$GLOBALS['offers'][$x] = array( 'image' => $img_output, 'title' => $title, 'link' => $link, 'target' => $target, 'content' => $content );
	
	$GLOBALS['offer_count']++;
}
add_shortcode( 'caurusel_offer', 'pix_caurusel_offer' );
/************************************************/

/*************** Carousel Testimonials ****************/
function pix_caurusel_testimonials( $atts, $content = null ) {
    $output = '';
	extract(shortcode_atts(array(
		'max_slides' => '',
		'min_slides' => '',
		'width_slides' => '',
		'margin_slides' => '',
		'auto_slides' => '',
		'move_slides' => '',
		'infinite_slides' => '',
		'disable_carousel' => '',
	), $atts));
	
	$GLOBALS['testimonials'] = array();	
	do_shortcode($content);	 	
	$GLOBALS['testimonial_count'] = 0;
	
	if( is_array( $GLOBALS['testimonials'] ) ){
		$count = 1;
		foreach( $GLOBALS['testimonials'] as $item ){
			$class = $count == 1 ? 'class="active"' : '';
			
			$rat5 = $item['rating'] == 5 ? ' gold' : '-o';
			$rat4 = $item['rating'] >= 4 ? ' gold' : '-o';
			$rat3 = $item['rating'] >= 3 ? ' gold' : '-o';
			$rat2 = $item['rating'] >= 2 ? ' gold' : '-o';
			$rat1 = $item['rating'] >= 1 ? ' gold' : '-o';
			
			$out = '
			<li>
				<div class="testi-box">
				  <div class="person-text"> <i class="icomoon-quote-left"></i>
					<div class="testi-title">
					  <h4>'.wp_kses_post($item['title']).'</h4>
					  <div class="product-rating"> 
					  	<i class="fa fa-star'.$rat1.'"></i> 
						<i class="fa fa-star'.$rat2.'"></i> 
						<i class="fa fa-star'.$rat3.'"></i> 
						<i class="fa fa-star'.$rat4.'"></i> 
						<i class="fa fa-star'.$rat5.'"></i>
					  </div>
					</div>
					'.do_shortcode($item['content']).'
				  </div>
				  <div class="person-info">
					<div class="person-avatar"> <img src="'.esc_attr($item['image']).'" width="50" height="55" alt="'.esc_attr($item['name']).'"/> </div>
					<div class="person-name">
					  <h5>'.wp_kses_post($item['name']).'</h5>
					  <p>'.wp_kses_post($item['info']).'</p>
					</div>
				  </div>
				</div>
			</li>
			';
			
			$testimonials[] = $out;
			 
			$count ++;
		}
        
		$max_slides = $max_slides == '' ? 1 : $max_slides;
		$min_slides = $min_slides == '' ? 1 : $min_slides;
		$width_slides = $width_slides == '' ? 370 : $width_slides;
		$margin_slides = $margin_slides == '' ? 10 : $margin_slides;
		$auto_slides = $auto_slides != '0' ? 'true' : 'false';
		$move_slides = $move_slides == ''? 1 : $move_slides;
		$infinite_slides = $infinite_slides != '1' ? 'false' : 'true';
		$disable_carousel = $disable_carousel != '0' ? 'bxslider' : 'carousel-disable';
		       
		$output = ' 
				<div class="carousel-testi">
					<ul class="carousel-4 '.$disable_carousel.'" 
						data-max-slides="'.$max_slides.'" 
						 data-min-slides="'.$min_slides.'" 
						data-width-slides="'.$width_slides.'" 
						data-margin-slides="'.$margin_slides.'" 
							data-auto-slides="'.$auto_slides.'" 
						data-move-slides="'.$move_slides.'"   
						data-infinite-slides="'.$infinite_slides.'" >
						'.implode( "\n", $testimonials ).'
					</ul>
				</div>';
					
	}
	return $output;
	
   
}
add_shortcode('caurusel_testimonials', 'pix_caurusel_testimonials');

///////////////////////////

function pix_caurusel_testimonial( $atts, $content ){
	$image = '';
	extract(shortcode_atts(array(
		'name' => '',
	 	'image' => $image,
		'info' => '',
		'title' => '',
		'rating' => '',
	), $atts));
	
	$img = wp_get_attachment_image_src( $image, 'preview-thumb' );		
	$img_output = $img[0];
	
	$x = $GLOBALS['testimonial_count'];
	$GLOBALS['testimonials'][$x] = array( 'name' => $name, 'image' => $img_output, 'info' => $info, 'title' => $title, 'rating' => $rating, 'content' => $content );
	
	$GLOBALS['testimonial_count']++;
}
add_shortcode( 'caurusel_testimonial', 'pix_caurusel_testimonial' );
/************************************************/

/*************** Our Team ****************/
function pix_ourteam( $atts, $content = null ) {
    $output = '';
	extract(shortcode_atts(array(
		'max_slides' => '',
		'min_slides' => '',
		'width_slides' => '',
		'margin_slides' => '',
		'auto_slides' => '',
		'move_slides' => '',
		'infinite_slides' => '',
		'disable_carousel' => '',
	), $atts));
	
	$GLOBALS['members'] = array();
	do_shortcode($content);	 	
	$GLOBALS['member_count'] = 0;
	
	if( is_array( $GLOBALS['members'] ) ){
		$count = 1;
		foreach( $GLOBALS['members'] as $item ){
			$class = $count == 1 ? 'class="active"' : '';
			$blank = !empty($item['target']) ? 'target="_blank"' : '';

			$out = '
			<li>
                <div class="media">
					<a href="'.esc_url($item['image']).'"><img src="'.esc_url($item['image']).'" alt="'.esc_attr($item['name']).'"/></a>
				</div>
				<div class="carousel-item-content">
					<a '.$blank.' href="'.esc_url($item['link']).'" class="carousel-title">'.wp_kses_post($item['name']).'</a>
					<div class="carousel-text">
						'.do_shortcode($item['content']).'						
						<div class="button-team">					
							<a '.$blank.' class="btn btn-primary  btn-icon-right" href="'.esc_url($item['link']).'">'.wp_kses_post($item['text']).'
								<div class="btn-icon">
									<i class="fa fa-long-arrow-right"></i>
								</div>
							</a>
						</div>
					</div>
                </div>
			</li>';
			
			$members[] = $out;
			 
			$count ++;
		}
        
		$max_slides = $max_slides == '' ? 4 : $max_slides;
		$min_slides = $min_slides == '' ? 2 : $min_slides;
		$width_slides = $width_slides == '' ? 270 : $width_slides;
		$margin_slides = $margin_slides == '' ? 10 : $margin_slides;
		$auto_slides = $auto_slides != '0' ? 'true' : 'false';
		$move_slides = $move_slides == ''? 3 : $move_slides;
		$infinite_slides = $infinite_slides != '1' ? 'false' : 'true';
		$disable_carousel = $disable_carousel != '0' ? 'bxslider' : 'carousel-disable';
		       
		$output = ' 
				<section class="carousel animated " data-animation="fadeInUp">
					<ul class="carousel-team '.$disable_carousel.'" 
						data-max-slides="'.$max_slides.'" 
						 data-min-slides="'.$min_slides.'" 
						data-width-slides="'.$width_slides.'" 
						data-margin-slides="'.$margin_slides.'" 
							data-auto-slides="'.$auto_slides.'" 
						data-move-slides="'.$move_slides.'"   
						data-infinite-slides="'.$infinite_slides.'" >
						'.implode( "\n", $members ).'
					</ul>
				</section>';
					
	}
	return $output;	
   
}
add_shortcode('ourteam', 'pix_ourteam');

///////////////////////////

function pix_teammember( $atts, $content ){
	$image = '';
	extract(shortcode_atts(array(
	 	'image' => $image,
		'name' => '',
		'text' => '',
		'link' => '',
		'target' => '',
	), $atts));
	
	$img = wp_get_attachment_image_src( $image, 'full' );		
	$img_output = $img[0];
	
	$x = $GLOBALS['member_count'];
	$GLOBALS['members'][$x] = array( 'image' => $img_output, 'name' => $name, 'text' => $text, 'link' => $link, 'target' => $target, 'content' => $content );
	
	$GLOBALS['member_count']++;
}
add_shortcode( 'teammember', 'pix_teammember' );
/************************************************/


/*************** Social Buttons ****************/
function pix_social_buts( $atts, $content = null ) {
    $output = '';
	
	$GLOBALS['socials'] = array();
	do_shortcode($content);	 	
	$GLOBALS['social_count'] = 0;
	
	if( is_array( $GLOBALS['socials'] ) ){
		$count = 1;
		foreach( $GLOBALS['socials'] as $item ){
			$class = $count == 1 ? 'class="active"' : '';
			
			$out = '
			<li style="background-color:'.esc_attr($item['color']).'">
				<a href="'.esc_url($item['link']).'" target="_blank">
					<i class="fa '.esc_attr($item['icon']).'"></i>'.wp_kses_post($item['title']).'
				</a>
			</li>
			';
			
			$socials[] = $out;
			 
			$count ++;
		}
		       
		$output = ' 
				<div class="footer-panel social-divider">
    				<div class="social-box">
      					<ul class="social-links">
						'.implode( "\n", $socials ).'
						</ul>
					</div>
				</div>
				';
					
	}
	return $output;	
   
}
add_shortcode('socialbuts', 'pix_social_buts');

///////////////////////////

function pix_social_but( $atts, $content ){
	$image = '';
	extract(shortcode_atts(array(
		'title' => '',
		'icon' => '',
		'link' => '',
		'color' => '',
	), $atts));
		
	$x = $GLOBALS['social_count'];
	$GLOBALS['socials'][$x] = array( 'title' => $title, 'icon' => $icon, 'link' => $link, 'color' => $color );
	
	$GLOBALS['social_count']++;
}
add_shortcode( 'socialbut', 'pix_social_but' );
/************************************************/

/**************************VC FEATURED BLOCK****************/
function pix_fblock($atts, $content=NULL){
    extract(shortcode_atts(array(
		'icon'=>'', 
        'link'=>''
    ), $atts));
    
   
    $out='<div class="offers"><figure>';
    $out.='<a href="'.esc_url($link).'"><img src="'.esc_url($icon).'" alt="" /></a>';
    $out.='<div class="overlay">'.do_shortcode($content).'</div>';
    $out.='</figure></div>';
    return $out;
}
add_shortcode('fblock', 'pix_fblock');


/*********************************************************/


/*************** VC TITLE BLOCK 2 ***************************/
function pix_tblock2($atts, $content=NULL){
    extract(shortcode_atts(array(
        'title'=>'',
		'before'=>'',
		'css_animation' => '',
    ), $atts));
	
	//$css_class = getCSSAnimation($css_animation);
	
	$fullcontent = ($content == "") ? "" : '<div class="text-center after-title-info">'.do_shortcode($content).'  </div>';
    $out='
	
	
	
	<div class="col-lg-12 text-center">
        <div class="heading-wrap  heading-wrap-style-2   '.esc_attr($css_animation).' " >
          <div class="small-logo">'.$before.'</div>
          <h2 class="section-heading">'.$title.'</h2>
     '.$fullcontent.'
        </div>
      </div>
	  
	 
	   <hr class="double-line">  
	
	'; 
    
    return $out;
}

add_shortcode('tblock2', 'pix_tblock2');

/******************************************************/






/*************** VC  SUBTITLE BLOCK***************************/
function pix_subtblock($atts, $content=NULL){
    extract(shortcode_atts(array(
        'title'=>'',
		'css_animation' => '',
    ), $atts));
	
	//$css_class = getCSSAnimation($css_animation);
	
	$fullcontent = ($content == "") ? "" : '<div class="title-content"><div class="info-box">'.do_shortcode($content).' </div> </div>';
    $out='
	
	<h4 class="sub-title primary-color text-center '.esc_attr($css_animation).' ">'.$title.'</h4>

		'.$fullcontent; 
    
    return $out;
}

add_shortcode('subtblock', 'pix_subtblock');

/******************************************************/




/***********VC HEXAGON *************/

function pix_hexagon($atts, $content=NULL){
    extract(shortcode_atts(array(
        'title'=>'',
		'link'=>'',
		'icon'=>'',
    ), $atts));
	
	$fullcontent = ($content == "") ? "" : '<div class="hb-footer-content">'.do_shortcode($content).'  </div>';
    $out='
	 
	
		<div class="hb-wrap hb-icon-box"> <a href="'.esc_url($link).'"><span class="hb hb-md"></span> <span class="hb2 hb hb-sm"> <span class="hb-content"> <span class="hb-icon"><i class="fa '.esc_attr($icon).'"></i></span> <span class="hb-title"> '.$title.' </span> </span> </span> </a></div>

		'.$fullcontent; 
    
    return $out;
}

add_shortcode('hexagon', 'pix_hexagon');

/******************************************************/





/***********VC STATE *************/

function pix_state($atts, $content=NULL){
    extract(shortcode_atts(array(
        'title'=>'',
		'amount'=>'',
		'icon'=>'',
    ), $atts));
	
	$fullcontent = ($content == "") ? "" : '<div class="hb-footer-content">'.do_shortcode($content).'  </div>';
    $out='
	
		<div  class="featured-item-simple-icon  text-center ">
              <div class="ft-icons-simple"><i class="fa '.esc_attr($icon).' "></i> </div>
              <span data-percent="'.esc_attr($amount).' " class="chart"> <span class="percent">'.$amount.' </span> <canvas height="0" width="0"></canvas></span>
              <h6>'.$title.' </h6>
            </div>

		'.$fullcontent; 
    
    return $out;
}

add_shortcode('state', 'pix_state');

/******************************************************



class WPBakeryShortCode_Oblock extends WPBakeryShortCode {

    protected function content($atts, $content = null) {
		$out = $css_class = "";
        extract(shortcode_atts(array(
			'title'=>'',
			'before'=>'',
			'after'=>'',
			'css_animation' => '',				
		), $atts));
		
        $css_class .= $this->getCSSAnimation($css_animation);
		
		$out  = '<div class="' . $css_class . '">';
		$fullcontent = ($content == "") ? "" : '<div class="container"><div class="info-box">'.do_shortcode($content).' </div> </div>'; 
		$out .= '
			<div class="heading-wrap header-type2 ">
			  <div class="heading-wrap-line" style="margin-left: -130px;"></div>
			  <h4 class="sub-title  text-center">'.$before.'</h4>
			  <h2 class="section-heading">'.$title.'</h2>
			  <div class="sub-heading">
				<h4>'.$after.'</h4>
			  </div>			  
			</div>
			'.$fullcontent;
		$out .= '</div>';	
		return $out;
    }
}
//add_shortcode('oblock', 'pix_oblock');


/*************** VC TITLE BLOCK SIMPLE***************************
function pix_oblock($atts, $content=NULL){
    extract(shortcode_atts(array(
        'title'=>'',
		'before'=>'',
		'after'=>'',
		'css_animation' => '',				
    ), $atts));
	
	
	$fullcontent = ($content == "") ? "" : '<div class="container"><div class="info-box">'.do_shortcode($content).' </div> </div>'; 
	$out='
		<div class="heading-wrap header-type2 '.$css_animation.'">
		  <div class="heading-wrap-line" style="margin-left: -130px;"></div>
		  <h4 class="sub-title  text-center">'.$before.'</h4>
		  <h2 class="section-heading">'.$title.'</h2>
		  <div class="sub-heading">
			<h4>'.$after.'</h4>
		  </div>			  
		</div>
		'.$fullcontent;
	    
    return $out;
}

add_shortcode('oblock', 'pix_oblock');

/*******************************************************/





/***************BRAND BLOCK***************************/
function pix_brandblock($atts, $content=NULL){
	
		$out = $image = '';
		
		
    extract(shortcode_atts(array(
        'url'=>'',
		'image'=>'',
    ), $atts));
	
	
	
		$img = wp_get_attachment_image_src( $image, 'large' );
		
		
		$img_output = $img[0];
    
    $out='<div class="logo-box"> <a href="'.esc_url($url).'"><img src="'.esc_url($img_output).'" alt="brand" ></a></div>';
    
    return $out;
}

add_shortcode('brandblock', 'pix_brandblock');






/******************************************************/




/******************* COLUMNS ********************/

function PixTheme_one_whole( $atts, $content = null ) {
   return '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_whole', 'PixTheme_one_whole');

function PixTheme_one_half( $atts, $content = null ) {
   return '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'PixTheme_one_half');

function PixTheme_one_third( $atts, $content = null ) {
   return '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'PixTheme_one_third');

function PixTheme_two_third( $atts, $content = null ) {
   return '<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'PixTheme_two_third');

function PixTheme_one_fourth( $atts, $content = null ) {
   return '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'PixTheme_one_fourth');

function PixTheme_three_fourth( $atts, $content = null ) {
   return '<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'PixTheme_three_fourth');

function PixTheme_one_sixth( $atts, $content = null ) {
   return '<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'PixTheme_one_sixth');

function PixTheme_five_twelveth( $atts, $content = null ) {
   return '<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_twelveth', 'PixTheme_five_twelveth');

function PixTheme_seven_twelveth( $atts, $content = null ) {
   return '<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">' . do_shortcode($content) . '</div>';
}
add_shortcode('seven_twelveth', 'PixTheme_seven_twelveth');


function PixTheme_one_twelveth( $atts, $content = null ) {
   return '<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_twelveth', 'PixTheme_one_twelveth');

function PixTheme_eleven_twelveth( $atts, $content = null ) {
   return '<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">' . do_shortcode($content) . '</div>';
}
add_shortcode('eleven_twelveth', 'PixTheme_eleven_twelveth');

function PixTheme_five_sixth( $atts, $content = null ) {
   return '<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'PixTheme_five_sixth');

function PixTheme_row( $atts, $content = null ) {
   return '<div class="row">' . do_shortcode($content) . '</div>';
}
add_shortcode('row', 'PixTheme_row');

function PixTheme_div_carousel( $atts, $content = null ) {
   return '<div class="width-carousel">' . do_shortcode($content) . '</div>';
}
add_shortcode('div_carousel', 'PixTheme_div_carousel');


/************************************************/



/***************** CLEAR ************************/

function alc_clear($atts, $content = null) {	
	return '<div class="clear"></div>';
}
add_shortcode('clear', 'alc_clear');


/******** SHORTCODE SUPPORT FOR WIDGETS *********/

if (function_exists ('shortcode_unautop')) {
	add_filter ('widget_text', 'shortcode_unautop');
}
add_filter ('widget_text', 'do_shortcode');

/************************************************/

function pix_share_buttons($atts, $content=NULL){
   
	global $post;
	if(!isset($post->ID)) return;
	$permalink = get_permalink($post->ID);	
	$image =  wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'preview-thumb' );
	
	$post_title = rawurlencode(get_the_title($post->ID)); 
	
    $out='		
			<div class="footer-panel">
              <div class="social-box">
                <h4>Share This Post</h4>
                <ul class="social-links">
                  <li class="social-facebook"><a href="http://www.facebook.com/sharer.php?u='.$permalink.'&amp;images='.$image[0].'" title="'.__('Facebook', 'PixShortcode').'" target="_blank"><i class="fa fa-facebook-square"></i>'.__('Facebook', 'PixShortcode').'</a></li>
                  <li class="social-twitter"><a href="https://twitter.com/share?url='.$permalink.'&text='.$post_title.'" title="'.__('Twitter', 'PixShortcode').'" target="_blank"><i class="fa fa-twitter-square"></i>'.__('Twitter', 'PixShortcode').'</a></li>
                  <li class="social-google"><a href="http://plus.google.com/share?url='.$permalink.'&title='.$post_title.'" title="'.__('Google +', 'PixShortcode').'" target="_blank"><i class="fa fa-google-plus"></i>'.__('Google +', 'PixShortcode').'</a></li>
                  <li class="social-pinterest li-last"><a href="http://pinterest.com/pin/create/button/?url='.$permalink.'&amp;media='.$image[0].'&amp;description='.$post_title.'" title="'.__('Pinterest', 'PixShortcode').'" target="_blank"><i class="fa fa-pinterest-square"></i>'.__('Pinterest', 'PixShortcode').'</a></li>
                </ul>
              </div>
            </div>	
			'; 
    
    return $out;
}

add_shortcode('share', 'pix_share_buttons');


?>