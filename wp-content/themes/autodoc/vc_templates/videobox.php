<?php
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

<div class="video-box">
    <div class="video-box-left">
      <div class="video-box-info">
        <h4 class="light-font">'.$title.'</h4>
       '.do_shortcode($content).'
	   
	  
			  
			  
      </div>
    </div>
    <div  class="video-box-right "> <a href="'.esc_url($link).'" class="video-popab"> <img src="'.esc_url($img_output).'"  alt="'.$title.'"></a></div>
  </div>
  ';
	
echo $out;