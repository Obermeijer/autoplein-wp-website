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
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="copy">
          <p><?php if (!empty($pix_options['pix_footer_copy'])) { echo wp_kses_post($pix_options['pix_footer_copy']); }?></p>
        </div>
      </div>
  </div>
</div>






<?php $pix_options = isset($_POST['options']) ? $_POST['options'] : get_option('pix_general_settings');?>
<?php if (isset($pix_options['pix_custom_js'])) echo $pix_options['pix_custom_js']; ?>



</div>
<!--#content-->
</div>
<!--#layout-theme-->


<a class="scroll-top scroll-top-view">
          <i class="fa fa-long-arrow-up">
 </i></a>

<?php
    wp_footer();	
?>
</body></html>