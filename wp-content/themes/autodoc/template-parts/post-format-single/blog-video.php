<?php
/**
 * The template includes blog post format audio.
 *
 * @package Pix-Theme
 * @since 1.0
 */
	// get meta value for audio
	//$pixtheme_url = rwmb_meta('post_video')
$pix_options = get_option('pix_general_settings');
?>

<div class="entry-media">
	<?php if ( get_post_meta( get_the_ID(), 'post_video', true ) !== '' ):?>
	<?php
    $video_embed_code = get_post_meta( get_the_ID(), 'post_video', true );
    $vendor = parse_url($video_embed_code);?>
    
    <div class="entry_image single_image">
    
    <div class="vcontainer">
    <?php if ($vendor['host'] == 'www.youtube.com' || $vendor['host'] == 'youtu.be' || $vendor['host'] == 'www.youtu.be' || $vendor['host'] == 'youtube.com'){ ?>
                
    <?php if ($vendor['host'] == 'www.youtube.com') { parse_str( parse_url( $video_embed_code, PHP_URL_QUERY ), $my_array_of_vars ); ?>
                    <iframe width="885" height="487" src="http://www.youtube.com/embed/<?php echo esc_attr($my_array_of_vars['v']); ?>?modestbranding=1;rel=0;showinfo=0;autoplay=0;autohide=1;yt:stretch=16:9;" frameborder="0" allowfullscreen></iframe>
    <?php } else { ?>
                    <iframe width="885" height="487" src="http://www.youtube.com/embed<?php echo esc_attr(parse_url($video_embed_code, PHP_URL_PATH));?>?modestbranding=1;rel=0;showinfo=0;autoplay=0;autohide=1;yt:stretch=16:9;" frameborder="0" allowfullscreen></iframe>
    <?php } } ?>
        
    <?php if ($vendor['host'] == 'vimeo.com'){ ?>
    <iframe src="http://player.vimeo.com/video<?php echo esc_attr(parse_url($video_embed_code, PHP_URL_PATH));?>?title=1&amp;byline=1&amp;portrait=1" width="885" height="487" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>  
    <?php } ?>        
 
            
    </div>
    </div> 
    <?php else : ?>
		<?php if($pix_options['pix_blog_show_date']): ?>
            <div class="box-date">
                <div class="box-date-transform"> <span><?php echo get_the_time('j'); ?></span> <?php echo get_the_time('M'); ?> </div>
            </div>                     
		<?php endif?>
            <div class="entry-thumbnail">
              <div class="img-overlay "> <a href="<?php esc_url(the_permalink())?>"  class="link-view-more"></a> </div>
              <?php /*?><div class="post-type-media type-image"><i class="<?php echo esc_attr($icon[$pixtheme_format]); ?>"></i> </div><?php */?>
              <?php if ( has_post_thumbnail() ):?>
              <?php the_post_thumbnail('full'); ?>
              <?php else : ?>
              <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/noimage.jpg"  />
              <?php the_post_thumbnail(); ?>
              <?php endif; ?>
            </div>    
    <?php endif; ?>
</div>