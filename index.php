<?php get_header(); ?>

<div id="content" class="clearfix row-fluid">
  <div id="main" class="span8 clearfix" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix pad-one-b main-stuff'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      <?php if(has_post_thumbnail() ) {
	  	echo '<div class="pad-two-b">';
		the_post_thumbnail('featured');
		echo '</div>';
      }?>
      <header>
        <hgroup>
          <h2 class="page-title clean-bottom" itemprop="headline">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
          </h2>
          <?php if (function_exists('the_subheading')) : 
									the_subheading('<h4 class="subheading">', '</h4>'); 
                                 endif; ?>
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
      
      <section class="post_content clearfix">
        <?php the_excerpt( __("Read more &raquo;","eli-theme") ); ?>
      </section>
      <!-- end article section -->
      
      <footer>
        <p class="tags">
          <?php the_tags('<span class="tags-title">' . __("Tags","eli-theme") . ':</span> ', ' ', ''); ?>
        </p>
      </footer>
      <!-- end article footer --> 
      
    </article>
    <!-- end article -->
    
    <?php endwhile; ?>
    <?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
    <?php page_navi(); // use the page navi function ?>
    <?php } else { // if it is disabled, display regular wp prev & next links ?>
    <nav class="wp-prev-next">
      <ul class="clearfix">
        <li class="prev-link">
          <?php next_posts_link(_e('&laquo; Older Entries', "eli-theme")) ?>
        </li>
        <li class="next-link">
          <?php previous_posts_link(_e('Newer Entries &raquo;', "eli-theme")) ?>
        </li>
      </ul>
    </nav>
    <?php } ?>
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
  
  <?php get_sidebar('events'); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
