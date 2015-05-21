<?php 
// 
// Template Name: ELI Student Announcement Page
//
get_header(); ?>

<div id="content" class="clearfix row-fluid">
  <div id="main" class="span8 clearfix" role="main">
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix pad-one-b main-stuff'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      <header>
        <hgroup>
          <?php 
			$subhead =  get_the_subheading();
	 	  	if ($subhead) : 
				$head_class = "page-title clean-bottom"; 
            else: 
			 	$head_class = "page-title"; 
			endif; ?>
          <h1 class="<? echo $head_class ?>" itemprop="headline">
            <?php the_title(); ?>
          </h1>
          <?php if (function_exists('the_subheading')) : 
									the_subheading('<h2 class="subheading">', '</h2>'); 
                                 endif; ?>
        </hgroup>
      </header>
      <section class="post_content clearfix">
      	<?php the_content();?>
      </section>
    </article>
    <?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		  	$args=array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'category_name' => 'announcements',
				'paged' => $paged,
				'posts_per_page' => 5,
				'caller_get_posts'=> 1
		  	);
			$temp = $wp_query;  // assign original query to temp variable for later use
			$wp_query = null;
			$wp_query = new WP_Query();
			$wp_query->query($args);
 			if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix pad-one-b main-stuff'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      <?php if(has_post_thumbnail() ) {
	  	echo '<div class="pad-two-b">';
		the_post_thumbnail('featured');
		echo '</div>';
      }?>
      <header>
        <hgroup>
          <h2 class="page-title clean-bottom" itemprop="headline"> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
            </a> </h2>
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
    <?php wp_reset_query(); ?>
  </div>
  <!-- end #main -->
  
  <?php get_sidebar('events'); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
