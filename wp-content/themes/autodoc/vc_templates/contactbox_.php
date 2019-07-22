<?php
$out = $image = '';

extract(shortcode_atts(array(
	"title" => '',
	"text" => '',
	"image" => $image,	
), $atts));	

$img = wp_get_attachment_image_src( $image, 'large' );
	
$img_output = $img[0];

$out = '
<div class="full-width-box">
    <div class="row">
      <div class="col-md-6">
        <div class="full-width-left"> <img width="800" height="580" alt="'.esc_url($title).'" src="'.esc_url($img_output).'" class="responsive-img"> </div>
      </div>
      <div class="col-md-6">
        <div data-animation="fadeInRight" class="full-width-right animated  animation-done fadeInRight">
            <h3 class="light-font">'.wp_kses_post($text).'</h3>
            <h2>'.wp_kses_post($title).'</h2>
 			'.do_shortcode($content).'
        </div>
      </div>
    </div>
</div>
';
	
echo $out;