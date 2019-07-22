<?php
	// get meta options/values
?>

<div class="col-xs-12 col-sm-12 col-md-4 ">
  <div class="entry-media">
    <div class="entry-content">
      <h3 class="entry-title"> <a href="<?php esc_url(the_permalink())?>">
        <?php the_title() ?>
        </a> </h3>
      <div class="media-info">
        <p><?php echo get_the_excerpt() ?></p>
      </div>
    </div>
  </div>
</div>
