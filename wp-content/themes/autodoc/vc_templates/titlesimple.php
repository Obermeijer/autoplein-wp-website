<?php
$out = $css_class = '';

extract(shortcode_atts(array(
	'title'=>'',
	'css_animation' => '',
), $atts));

$css_class = $this->getCSSAnimation($css_animation);

$fullcontent = ($content == "") ? "" : '
<div class="text-center after-title-info">
	<div class="row">
	  <div class="col-md-3"></div>
	  <div class="col-md-6">
		'.do_shortcode($content).'
	  </div>
	  <div class="col-md-3"></div>
	</div>	  
</div>';

$out = $css_class != '' ? '<div class="' . esc_attr($css_class) . '">' : '';
$out .='
	<div class="row">
	  <div class="col-md-12">
		<header class="section-header section-simple animated  animation-done fadeInUp" data-animation="fadeInUp">
		  <div class="icon-line"> 
		  	<h3>'.wp_kses_post($title).'</h3>
		  </div>
		</header>
	  </div>
	</div>
  '.$fullcontent; 
$out .= $css_class != '' ? '</div>' : '';

echo $out;