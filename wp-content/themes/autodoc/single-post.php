 <?php /* Template Name: Single Post */ 

$custom =  get_post_custom($post->ID);
$layout = isset ($custom['pix_page_layout']) ? $custom['pix_page_layout'][0] : '2';
$sidebar = isset ($custom['pix_selected_sidebar'][0]) ? $custom['pix_selected_sidebar'][0] : 'Blog Sidebar';
$pix_options = get_option('pix_general_settings');
?>
<?php get_header();?>

<main class="section" id="main">
  <div class="container">
    <div class="row">
      <?php if ($layout == '3'):?>
   <div class="col-xs-12 col-sm-12 col-md-3">
        <aside class="sidebar">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?>
          <?php   endif;?>
        </aside>
      </div>
      <?php endif?>
      <div class="col-xs-12 <?php if ($layout == '1'):?>  col-sm-12 col-md-12 <?php else: ?> col-sm-12 col-md-9 <?php endif?>">
        <section role="main" class="main-content">
          <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php esc_attr(the_ID());?>"<?php post_class('post format-image clearfix'); ?>>
            <?php			
                    $pixtheme_format  = get_post_format();
                    $pixtheme_format = !in_array($pixtheme_format, array("quote", "gallery", "video")) ? 'standared' : $pixtheme_format;
					$icon = array("standared" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");
                    get_template_part( 'template-parts/post-format-single/blog', $pixtheme_format);
                ?>
                
           	<div class="entry-main">   
              
                <div class="entry-footer">
                  
                  <div class="meta">
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
					if(!empty($pix_options['pix_blog_show_tag']) && $pix_options['pix_blog_show_tag'] == 1){	
						$posttags = get_the_tags($post->ID);
                        if ($posttags) {
                            $output = '<span class="meta-i">'.__('Tags: ', 'PixTheme');
                            foreach($posttags as $tag) {
                                $output .= '<a href="'.esc_url(get_tag_link( $tag->term_id )).'" >'.$tag->name.'</a> ';
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
                  
                  <?php print_r(wp_link_pages());?>
                </div>
              
                <h3 class="entry-title">
                  <?php the_title(); ?>
                </h3>
                
                <div class="entry-content">
                  <?php the_content(); ?>
                </div>
                
            </div>
            
            <?php if(!empty($pix_options['pix_blog_share']) && $pix_options['pix_blog_share'] == 1) echo do_shortcode('[share]'); ?>
            
          </article>
        </section>
    <?php if(!empty($pix_options['pix_blog_show_author']) && $pix_options['pix_blog_show_author'] == 1) : ?>
        <?php 
			$get_avatar = get_avatar(get_the_author_meta('user_email'), 85);
			preg_match("/src='(.*?)'/i", $get_avatar, $matches);
			$src = !empty($matches[1]) ? $matches[1] : '';
		?>
        <section class="about-autor ">
        
        <h3 class="widget-title"><span><i class="fa flaticon-wrench44"></i> <?php _e('About Author', 'PixTheme')?></span></h3>

          <article class="comment img">
            <div class="avatar-placeholder ">
            <img src="<?php echo esc_url($src) ?>)"  alt="avatar"/> </div>
            <header class="comment-header"> <cite class="comment-author">
              <?php the_author_posts_link(); ?>
              </cite>
              <time class="comment-datetime" datetime="2012-10-27"><span class="icon-clock" aria-hidden="true"></span> <?php echo date_i18n( get_option('date_format'), strtotime( get_the_author_meta( 'user_registered') ) ); ?> </time>
            </header>
            <div class="comment-body">
              <?php the_author_meta( 'description'); ?>
            </div>
          </article>
        </section>
    <?php endif; ?>
    <?php if(!empty($pix_options['pix_blog_show_author_posts']) && $pix_options['pix_blog_show_author_posts'] == 1) :?>
        <?php
  	$args = array(
		'author'        =>  get_the_author_meta( 'ID'), 
		'orderby'       =>  'post_date',
		'order'         =>  'ASC',
		'posts_per_page'=> 4 
    );
	$author_posts = get_posts( $args );

	if(!empty($author_posts) && count($author_posts) > 2) :
  ?>
        <section class="about-autor ">
        
           <h3 class="widget-title"><span><i class="fa flaticon-wrench44"></i> <?php _e('author posts  ', 'PixTheme') ?></span></h3>
           

          <div class="padding25">
            <div class="row">
              <?php foreach($author_posts as $apost){ ?>
              <?php $tumbnail = get_the_post_thumbnail( $apost->ID ) != '' ? get_the_post_thumbnail( $apost->ID ) : '<img alt="No image" src="'.esc_url(get_template_directory_uri()).'/images/noimage.jpg">'; ?>
              <div class="  col-lg-3 col-md-3  col-sm-6 col-xs-6   ">
                <div class="box-simple-image">                  
                 <a href="<?php echo esc_url(get_permalink( $apost->ID )); ?>"> <?php echo wp_kses_post($tumbnail); ?>  </a></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </section>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(!empty($pix_options['pix_blog_show_comments']) && $pix_options['pix_blog_show_comments'] == 1) : ?>
        <div class="section-comment ">
          <?php comments_template(); ?>
          <?php $test = false; if ($test) {comment_form(); } ?>
        </div>
    <?php endif; ?>
        <?php endwhile; ?>
      </div>
      <?php if ($layout == '2'):?>
      <div class="col-xs-12 col-sm-12 col-md-3">
        <aside class="sidebar">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?>
          <?php   endif;?>
        </aside>
      </div>
      <?php endif?>
    </div>
  </div>
</main>
<?php get_footer();?>
