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
	<div class="entry-footer">
      <div class="meta clearfix">
      	<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>                  
			  <?php 
                if(!empty($pix_options['pix_blog_show_category']) && $pix_options['pix_blog_show_category'] == 1){
                    $categories = get_the_category($post->ID);
                    if($categories){
                        $output = '<span class="meta-i">'.__('In: ', 'PixTheme');						
                        foreach($categories as $category) {
                            $output .= '<a href="'.esc_url(get_category_link( $category->term_id )).'" >'.$category->cat_name.'</a> ';
                        }
                        $output .= '</span>';
                        echo wp_kses_post($output);						
                    }
                }
              ?>              
        <?php endif; // End if 'post' == get_post_type()?>
        <?php if( 'open' == $post->comment_status && $pix_options['pix_blog_show_comments']) : ?>      	
            <span class="meta-i">              
                <?php _e( 'Comments: ', 'PixTheme' ); ?><?php comments_popup_link( __( '0', 'PixTheme' ), __( '1', 'PixTheme' ), __( '%', 'PixTheme' )); ?>              
            </span>
		<?php endif?>
        
      </div>
	</div>
    <div class="entry-main">
    
        <h3 class="entry-title"> <a href="<?php esc_url(the_permalink())?>">
          <?php the_title() ?>
          </a> </h3>
        <div class="entry-content"> 
		<?php 
			if (get_option('rss_use_excerpt') == 0)
				the_content();
			else 
				echo do_shortcode(get_the_excerpt());
		?>
        </div>
		<div class="grid-post-button"> 
        	<a title="<?php esc_attr(the_title()) ?>" class="btn btn-primary  btn-icon-right" href="<?php esc_url(the_permalink())?>"><?php _e( 'Read More', 'PixTheme' ); ?>
                        <div class="btn-icon">
                        <i class="fa fa-long-arrow-right"></i>
                       	</div>
            </a> 
        </div>
	</div>
</div>
<?php else:?>
<div class="col-xs-12 col-sm-12 col-md-8 ">	
	<div class="entry-main">
    	
        <h3 class="entry-title"> <a href="<?php esc_url(the_permalink())?>">
          <?php the_title() ?>
          </a> </h3>
        <div class="entry-content"> 
		<?php 
			if (get_option('rss_use_excerpt') == 0)
				the_content();
			else 
				echo do_shortcode(get_the_excerpt());
		?> 
        </div>
        
		<div class="entry-footer">
          <div class="meta clearfix">
          	<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>                  
			  <?php 
                if(!empty($pix_options['pix_blog_show_category']) && $pix_options['pix_blog_show_category'] == 1){
                    $categories = get_the_category($post->ID);
                    if($categories){
                        $output = '<span class="meta-i">'.__('In: ', 'PixTheme');						
                        foreach($categories as $category) {
                            $output .= '<a href="'.esc_url(get_category_link( $category->term_id )).'" >'.$category->cat_name.'</a> ';
                        }
                        $output .= '</span>';
                        echo wp_kses_post($output);						
                    }
                }
              ?>              
        	<?php endif; // End if 'post' == get_post_type()?>  
            <?php if( 'open' == $post->comment_status && $pix_options['pix_blog_show_comments']) : ?>      	
            <span class="meta-i">              
                <?php _e( 'Comments: ', 'PixTheme' ); ?><?php comments_popup_link( __( '0', 'PixTheme' ), __( '1', 'PixTheme' ), __( '%', 'PixTheme' )); ?>              
            </span>
			<?php endif?>
            <div class="list-post-button"> 
                <a title="<?php esc_attr(the_title()) ?>" class="btn btn-primary  btn-icon-right" href="<?php esc_url(the_permalink())?>"><?php _e( 'Read More', 'PixTheme' ); ?>
                            <div class="btn-icon">
                            <i class="fa fa-long-arrow-right"></i>
                            </div>
                </a> 
            </div> 
          </div>
		</div>
        
	</div>
</div>
<?php endif; ?>

  

