<?php get_header(); ?>

<div id="content" class="clearfix row-fluid">
  <div id="main" class="span8 clearfix" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix pad-one-b'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      <?php the_post_thumbnail( 'wpbs-featured' ); ?>
      <header>
        <hgroup>
          <?php 
			
				$head_class = "page-title clean-bottom"; 
            ?>
          <h1 class="<? echo $head_class ?>" itemprop="headline">
            <?php the_title(); ?>
          </h1>
          <?php if (function_exists('the_subheading')) : 
									the_subheading('<h2 class="subheading">', '</h2>'); 
                                 endif; ?>
                                 <h5 class="meta"><?php _e("Posted", "eli-theme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php _e("by", "eli-theme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "eli-theme"); ?> <?php the_category(', '); ?>.</h5><hr />
        </hgroup>
      </header>
      <!-- end article header -->
      
      <section class="post_content clearfix pad-two-tb" itemprop="articleBody">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
      </section>
      <!-- end article section -->
      
      <footer>
        <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","eli-theme") . ':</span> ', ' ', '</p>'); ?>
        <div class="fb-social-plugin fb-like fb_edge_widget_with_comment fb_iframe_widget" data-ref="below-post" data-send="true" data-show-faces="false" data-width="500" data-layout="button-count" fb-xfbml-state="rendered" data-href="<?php the_permalink();?>"></div>
      </footer>
      <!-- end article footer --> 
      
    </article>
    <!-- end article -->
    
    <?php comments_template('',true); ?>
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
  
  <?php get_sidebar(); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
