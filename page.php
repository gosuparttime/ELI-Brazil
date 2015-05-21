<?php get_header(); ?>
<div id="content" class="clearfix row-fluid">
  <div id="main" class="span8 clearfix" role="main">
    <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix pad-one-b main-stuff'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      <?php if(has_post_thumbnail() ) {
	  	echo '<div class="pad-two-b">';
		the_post_thumbnail('featured');
		echo '</div>';
      }?>
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
      <!-- end article header -->
      
      <section class="post_content clearfix" itemprop="articleBody">
        <?php the_content(); ?>
      </section>
      <!-- end article section -->
      
      <footer>
        <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","eli-theme") . ':</span> ', ', ', '</p>'); ?>
      </footer>
      <!-- end article footer --> 
      
    </article>
    <!-- end article -->
    
    <?php endwhile; ?>
    
  </div>
  <!-- end #main -->
  <?php get_sidebar('sidebar2'); // sidebar 1 ?>


<?php get_footer(); ?>
