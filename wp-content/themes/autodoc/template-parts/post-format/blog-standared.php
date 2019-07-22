<?php
/**
 * This template is for displaying part of blog.
 *
 * @package Pix-Theme
 * @since 1.0
 */
$pixtheme_format  = get_post_format();
$pix_options = get_option('pix_general_settings');
$custom =  get_post_custom($post->ID);
$layout = isset ($custom['_page_layout']) ? $custom['_page_layout'][0] : '1';

$pixtheme_format = !in_array($pixtheme_format, array("quote", "gallery", "video")) ? "standared" : $pixtheme_format;
$icon = array("standared" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");
	
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
      <div class="img-overlay "> <a href="<?php esc_url(the_permalink())?>"  class="link-view-more"></a> </div>
      <?php /*?><div class="post-type-media type-image"><i class="<?php echo esc_attr($icon[$pixtheme_format]); ?>"></i> </div><?php */?>
      <?php if ( has_post_thumbnail() ):?>
      <?php the_post_thumbnail(); ?>
      <?php else : ?>
      <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/noimage.jpg"  alt="No image"  />
      <?php the_post_thumbnail(); ?>
      <?php endif; ?>
    </div>
  </div>
</div>
