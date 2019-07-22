<?php 
	$pix_options = isset($_POST['options']) ? $_POST['options'] : get_option('pix_general_settings');
	$footerBlockId = pixtheme_get_option('pix_footer_staticblock');
	
?>
<?php if (pixtheme_get_option('pix_prefooter_show','1')):?>
<div class="pre-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="pre-fot-box">
          <div class="btn-icon"><i class="fa <?php echo esc_attr($pix_options['pix_prefooter_icon_left']); ?>"></i></div>
          <p><?php echo wp_kses_post($pix_options['pix_prefooter_title_left']); ?></p>
          <div class="pre-fot-content"><?php echo wp_kses_post($pix_options['pix_prefooter_left']); ?></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pre-fot-box">
          <div class="btn-icon"><i class="fa <?php echo esc_attr($pix_options['pix_prefooter_icon_middle']); ?>"></i></div>
          <p><?php echo wp_kses_post($pix_options['pix_prefooter_title_middle']); ?></p>
          <div class="pre-fot-content"><?php echo wp_kses_post($pix_options['pix_prefooter_middle']); ?></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pre-fot-box">
          <div class="btn-icon"><i class="fa <?php echo esc_attr($pix_options['pix_prefooter_icon_right']); ?>"></i></div>
          <p><?php echo wp_kses_post($pix_options['pix_prefooter_title_right']); ?></p>
          <div class="pre-fot-content"><?php echo wp_kses_post($pix_options['pix_prefooter_right']); ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<?php if ($footerBlockId):?>
<footer class="footer footer-shop">
  <div class="container">
    <div class="row">
       <?php
			$post = get_post($footerBlockId);
			$item_output = do_shortcode($post->post_content);
			echo $item_output;
		?>
    </div>
  </div>
</footer>
<?php endif; ?>

<div class="footer-absolute">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="copy">
          <p><?php if (!empty($pix_options['pix_footer_copy'])) { echo wp_kses_post($pix_options['pix_footer_copy']); }?></p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <p class="text-center"> 
		<?php if(!empty($pix_options['pix_footer_logo'])):?>
      		<img width="148" height="40" src="<?php echo esc_url($pix_options['pix_footer_logo']) ?>" alt="Footer logo" />
        <?php endif; ?>
        </p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="social-box">
          <ul class="social-links">
            <?php if($pix_options['pix_facebook']){ ?>
            <li><a href="<?php echo esc_url($pix_options['pix_facebook']); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <?php } ?>
            <?php if($pix_options['pix_vk']){ ?>
            <li><a href="<?php echo esc_url($pix_options['pix_vk']); ?>" target="_blank"><i class="fa fa-vk"></i></a></li>
            <?php } ?>
            <?php if($pix_options['pix_youtube']){ ?>
            <li><a href="<?php echo esc_url($pix_options['pix_youtube']); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
            <?php } ?>
            <?php if($pix_options['pix_vimeo']){ ?>
            <li><a href="<?php echo esc_url($pix_options['pix_vimeo']); ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
            <?php } ?>
            <?php if($pix_options['pix_twitter']){ ?>
            <li><a href="<?php echo esc_url($pix_options['pix_twitter']); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <?php } ?>
            <?php if($pix_options['pix_google']){ ?>
            <li><a href="<?php echo esc_url($pix_options['pix_google']); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
            <?php } ?>
            <?php if($pix_options['pix_tumblr']){ ?>
            <li><a href="<?php echo esc_url($pix_options['pix_tumblr']); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
            <?php } ?>
            <?php if($pix_options['pix_instagram']){ ?>
            <li><a href="<?php echo esc_url($pix_options['pix_instagram']); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <?php } ?>
            <?php if($pix_options['pix_pinterest']){ ?>
            <li><a href="<?php echo esc_url($pix_options['pix_pinterest']); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
            <?php } ?>
            <?php if(pixtheme_get_option('pix_linkedin', '')){ ?>
            <li><a href="<?php echo esc_url($pix_options['pix_linkedin']); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
            <?php } ?>
            <?php if(pixtheme_get_option('pix_custom1_link', '')){ ?>
            <li><a href="<?php echo esc_url($pix_options['pix_custom1_link']); ?>" target="_blank"><i class="fa <?php echo esc_attr($pix_options['pix_custom1_icon']); ?>"></i></a></li>
            <?php } ?>
            <?php if(pixtheme_get_option('pix_custom2_link', '')){ ?>
            <li><a href="<?php echo esc_url($pix_options['pix_custom2_link']); ?>" target="_blank"><i class="fa <?php echo esc_attr($pix_options['pix_custom2_icon']); ?>"></i></a></li>
            <?php } ?>
            <?php if(pixtheme_get_option('pix_custom3_link', '')){ ?>
            <li><a href="<?php echo esc_url($pix_options['pix_custom3_link']); ?>" target="_blank"><i class="fa <?php echo esc_attr($pix_options['pix_custom3_icon']); ?>"></i></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>






<?php $pix_options = isset($_POST['options']) ? $_POST['options'] : get_option('pix_general_settings');?>
<?php if (isset($pix_options['pix_custom_js'])) echo $pix_options['pix_custom_js']; ?>



</div>
<!--content-->
</div>
<!--layout-theme-->


<a class="scroll-top scroll-top-view">
          <i class="fa fa-long-arrow-up">
 </i></a>

<?php
    wp_footer();	
?>
</body></html>









