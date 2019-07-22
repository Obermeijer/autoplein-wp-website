<?php
$out = '';

extract(shortcode_atts(array(
	'title'=>'',
	'icon'=>'',
	'button_text'=>'',
	'link'=>'',
), $atts));

$out='
	<div class="box-icon-and-button-wrap">
	  <div class="box-icon-and-button  box-border-left"> <i class="fa '.esc_attr($icon).'"></i>
		<h3>'.wp_kses_post($title).'</h3>
		<div class="content-hover"> <a href="'.esc_url($link).'" class="btn btn-primary btn-lg btn-icon-right">'.wp_kses_post($button_text).'
		  <div class="btn-icon"><i class="fa fa-long-arrow-right"></i></div>
		  </a>
		  <div class="content-hover-i">
			'.do_shortcode($content).'
		  </div>
		</div>
	  </div>
	</div>
	'; 

echo $out;