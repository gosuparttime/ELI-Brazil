<?php get_header(); ?>
<div id="content" class="clearfix row-fluid">
  <div id="main" class="span8 clearfix" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix pad-one-b main-stuff'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      <header>
        <hgroup>
          <h1 class="page-title clean-bottom" itemprop="headline">
            <?php the_title(); ?>
          </h1>
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
      
      <!-- end article header -->
      <hr />
      <section class="post_content clearfix" itemprop="articleBody">
        <?php the_content(); ?>
      </section>
      <!-- end article section -->
      
      <footer>
        <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","eli-theme") . ':</span> ', ' ', '</p>'); ?>
      </footer>
      <!-- end article footer --> 
      
    </article>
    <!-- end article -->
    
    <?php comments_template(); ?>
    <?php endwhile; ?>
    <?php else : ?>
    <article id="post-not-found">
      <header>
        <h1>Not Found</h1>
      </header>
      <section class="post_content">
        <p>Sorry, but the requested resource was not found on this site.</p>
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
