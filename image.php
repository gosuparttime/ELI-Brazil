<?php
/**
 * The WordPress template hierarchy first checks for any
 * MIME-types and then looks for the attachment.php file.
 *
 * @link codex.wordpress.org/Template_Hierarchy#Attachment_display 
 */ 

get_header(); ?>
<div id="content" class="clearfix row-fluid">
  <div id="main" class="clearfix" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix pad-one-b main-stuff'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      <header>
        <hgroup>
          <h1 class="page-title clean-bottom" itemprop="headline"><?php the_title(); ?></h1>
          <h2 class="subheading"><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><i class="icon-arrow-left"></i> <?php echo get_the_title($post->post_parent); ?></a></h2>
          <h5 class="meta">
        <?php _e("Posted", "eli-theme"); ?>
        <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
          <?php the_date(); ?>
        </time>
        <?php _e("by", "eli-theme"); ?>
        <?php the_author_posts_link(); ?>
        <span class="amp">&</span>
        <?php _e("filed under", "eli-theme"); ?>
        <?php the_category(', '); ?>
        .</h5>
        </hgroup>
      </header>
      <hr />
      <!-- end article header -->
      <div class="row-fluid">
      
      <section class="post_content clearfix span8" itemprop="articleBody"> 
        
        <!-- To display current image in the photo gallery -->
        <div class="thumbnail"> <a href="<?php echo wp_get_attachment_url($post->ID); ?>">
          <?php 
							      	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
							       
								      if ($image) : ?>
          <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
          <?php endif; ?>
          </a> </div>
        
        <!-- To display thumbnail of previous and next image in the photo gallery -->
        
      </section>
      <!-- end article section -->
      
      <footer class="span4">
      <?
	  if (the_content()):
	  	echo '<div class="row-fluid pad-one-b">';
		echo the_content();
		echo '</div>';
	  endif;
	  ?>
      <div class="row-fluid">
      <ul id="gallery-nav" class="clearfix unstyled">
          <li class="previous span6">
            <?php 
			previous_image_link('thumbnail', $prev_image);
			echo '<p class="text-center"><i class="icon-arrow-left"></i> Previous Image</p>';?>
          </li>
          <li class="next span6">
            <?php 
			next_image_link('thumbnail');
			echo '<p class="text-center">Next Image <i class="icon-arrow-right"></i></p>';?>
          </li>
          
        </ul>
        </div>
        <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","eli-theme") . ':</span> ', ' ', '</p>'); ?>
      </footer>
      <!-- end article footer --> 
     </div> 
    </article>
    <!-- end article -->
    
    <?php comments_template(); ?>
    <?php endwhile; ?>
    <?php else : ?>
    <article id="post-not-found">
      <header>
        <h1>
          <?php _e("Not Found", "eli-theme"); ?>
        </h1>
      </header>
      <section class="post_content">
        <p>
          <?php _e("Sorry, but the requested resource was not found on this site.", "eli-theme"); ?>
        </p>
      </section>
      <footer> </footer>
    </article>
    <?php endif; ?>
  </div>
  <!-- end #main -->
  
  
</div>
<!-- end #content -->

<?php get_footer(); ?>
