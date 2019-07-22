<?php
/**
 * The template includes blog post format gallery.
 *
 * @package Pix-Theme
 * @since 1.0
 */
$pix_options = get_option('pix_general_settings');	
	// get the gallery images
	$size = (is_front_page()) && !is_home() ? 'portfolio-3col' : 'blog-post';
	$gallery = rwmb_meta('post_gallery', 'type=image&size='.$size.'');
 
	$argsThumb = array(
		'order'          => 'ASC',
		'post_type'      => 'attachment',
		'post_parent'    => $post->ID,
		'post_mime_type' => 'image',
		'post_status'    => null,
		//'exclude' => get_post_thumbnail_id()
	);
	$attachments = get_posts($argsThumb);
	
	//$pixtheme_format = !in_array($pixtheme_format, array("quote", "gallery", "video")) ? "standared" : $pixtheme_format;
	$icon = array("standared" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");
	
if ($gallery || $attachment){
?>

<?php if(!empty($pix_options['pix_blog_layout']) && $pix_options['pix_blog_layout'] == 1): ?>
<div class="col-xs-12 col-sm-12 col-md-12 ">
<?php else:?>
<div class="col-xs-12 col-sm-12 col-md-4 ">	
<?php endif; ?>
  <div class="entry-media">
	<?php if($pix_options['pix_blog_show_date']): ?>
  		<div class="box-date">
        	<div class="box-date-transform"> <span><?php echo get_the_time('j'); ?></span> <?php echo get_the_time('M'); ?> </div>
      	</div>                     
  	<?php endif?>
    <div class="entry-thumbnail">
      
      <?php /*?><div class="post-type-media type-image"><i class="<?php echo esc_attr($icon[$pixtheme_format]); ?>"></i> </div><?php */?>
      <ul class="carousel-post">
      
        <?php
            if($gallery){
				foreach ($gallery as $slide) {
					echo '<li>';
					echo '<img src="' . esc_url($slide['url']) . '" width="' . esc_attr($slide['width']) . '" height="' . esc_attr($slide['height']) . '" alt="' .esc_attr($slide['alt']).'" title="' .esc_attr($slide['title']). '" />';
					echo '</li>';
				}
			}elseif ($attachments) {
				foreach ($attachments as $attachment) {
					echo '<li><img src="'.esc_url(wp_get_attachment_url($attachment->ID, 'full', false, false)).'" alt="'.esc_attr(get_post_meta($attachment->ID, '_wp_attachment_image_alt', true)).'" title="'.esc_attr(get_post_meta($attachment->ID, '_wp_attachment_image_title', true)).'" /></li>';
				}
			}
			
			?>
      </ul>
    </div>
  </div>
</div>
<?php 
}
else{
?>
<div class="col-xs-12 col-sm-12 col-md-4 ">
  <div class="entry-media"> <a href="<?php esc_url(the_permalink())?>">
    <?php if ( has_post_thumbnail() ):?>
    <?php the_post_thumbnail(); ?>
    <?php else : ?>
    <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/noimage.jpg" alt="No image" />
    <?php the_post_thumbnail(); ?>
    <?php endif; ?>
    </a> </div>
</div>
<?php	
}
?>
