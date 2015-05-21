<?php

// Template Name: Employment Page

get_header(); ?>
<div id="content" class="clearfix row-fluid">
  <div id="main" class="span8 clearfix" role="main">
    <?php while (have_posts()) : the_post(); ?>
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
    
    <?php if (get_field('open_position')):
	echo '<div class="well"><h3>Current Positions</h3>';
	echo '<div class="clearfix">';
  	 
			while (has_sub_field('open_position')) :
				echo '<h4>';
				echo the_sub_field('job_title');
				echo '</h4>';
				echo '<div class="row-fluid" id=job-';
				echo the_ID();
				echo '"><div class="span4">';
				echo '<a href="'.get_sub_field('job_link').'" title="'.get_sub_field('job_title').'" target="_blank">';
				echo 'View Details <i class="icon-external-link"></i>';
				echo '</a>';
				echo '</div><div class="span7 offset1">';
				echo the_sub_field('job_description');
				echo '</div></div><hr />';
			endwhile;
	echo '</div></div>';
	else:
	echo '<p class="alert">Currently, there are no positions available at ELI</p>';
    endif; ?>
	<?php endwhile; ?>
  </div>
  <!-- end #main -->
  
  <?php get_sidebar(); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
