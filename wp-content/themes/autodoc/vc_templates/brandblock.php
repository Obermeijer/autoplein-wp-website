<?php
$out = $image = '';

extract(shortcode_atts(array(
	'image'=>$image,
	'url'=>'',				
), $atts));

$img = wp_get_attachment_image_src( $image, 'medium' );
	
$img_output = $img[0];

$out .= '<li><img src="'.esc_url($img_output).'"  alt="brand"></li>';
	
echo $out;