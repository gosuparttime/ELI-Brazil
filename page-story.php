<?php 
//
//	Template Name: Student Stories Main Page
//
get_header(); ?>
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
    <div class="row-fluid pad-two-b" role="complementary">
    <?php 
	$c = 1; //init counter
	$bpr = 2; //boxes per row
	$query = new WP_Query( 
	$args = array(
		'posts_per_page' => '-1',
		'post_type' => 'story',
		'order' => 'ASC',
    ) );

        if ($query-> have_posts()) : while ($query-> have_posts()) : $query-> the_post(); ?>
          <div class="span6">
            <?php get_template_part('column', 'story'); ?>
          </div>
          <!-- end article -->
          <?php if($c == $bpr) : ?>
        </div>
        <div class="row-fluid pad-two-b" role="complementary">
          <?php $c = 0;
		endif; ?>
          <?php
		$c++;

        endwhile; ?>
        </div>
	<? endif ?>
  </div>
  <!-- end #main -->
  
  <?php get_sidebar(); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
