<?php
$out = '';

extract(shortcode_atts(array(
	'title'=>'',
	'icon'=>'',
	'amount'=>'',
), $atts));

$out='
	<div class="featured-item-simple-icon-wrap">
	  <div class="featured-item-simple-icon animated text-center animation-done fadeInUp" data-animation="fadeInUp">
		<div class="ft-icons-simple"><i class="fa '.esc_attr($icon).'"></i> </div>
		<span class="chart" data-percent="'.esc_attr($amount).'"> <span class="percent">'.wp_kses_post($amount).'</span> <canvas height="0" width="0"></canvas></span>
		<h6>'.wp_kses_post($title).'</h6>
	  </div>
	</div>
	'; 

echo $out;