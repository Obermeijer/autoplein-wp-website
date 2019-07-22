<?php
	// get meta options/values
	$pix_options = get_option('pix_general_settings');
	$pixtheme_content = rwmb_meta('post_quote_content');
	$pixtheme_source = rwmb_meta('post_quote_source');
	
	//$pixtheme_format = !in_array($pixtheme_format, array("quote", "gallery", "video")) ? "standared" : $pixtheme_format;
$icon = array("standared" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");
?>

<div class="col-xs-12 col-sm-12 col-md-4 ">
  <div class="entry-media">
	<?php if($pix_options['pix_blog_show_date']): ?>
  		<div class="box-date">
        	<div class="box-date-transform"> <span><?php echo get_the_time('j'); ?></span> <?php echo get_the_time('M'); ?> </div>
      	</div>                     
  	<?php endif?>
    <div class="entry-thumbnail">
      <?php /*?><div class="post-type-media type-image"><i class="<?php echo esc_attr($icon[$pixtheme_format]); ?>"></i> </div><?php */?>
      <div class="blockquote">
        <p><?php echo wp_kses_post($pixtheme_content); ?></p>
        <span class="blockquote-autor"><?php echo wp_kses_post($pixtheme_source); ?></span> </div>
    </div>
  </div>
</div>
