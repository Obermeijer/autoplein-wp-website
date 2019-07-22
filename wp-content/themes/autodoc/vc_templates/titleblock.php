<?php
$out = $css_class = '';

extract(shortcode_atts(array(
	'title'=>'',
	'icon'=>'',
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
	  <div class="col-md-offset-3 col-md-6">
		<header class="section-header animated  animation-done fadeInUp" data-animation="fadeInUp">
		  <div class="icon-line"> <i class="fa '.esc_attr($icon).'"></i></div>
		  <div class="heading-wrap">
			<h2 class="heading"><span>'.wp_kses_post($title).'</span></h2>
		  </div>
		</header>
	  </div>
	</div>
  '.$fullcontent; 
$out .= $css_class != '' ? '</div>' : '';

echo $out;