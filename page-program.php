<?php

// Template Name: Program Pages

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
      <?php if(get_field('show_info')):
	  	echo '<div class="row-fluid"><div class="span5 offset1 pull-right well-blue mar-two-b">';
		echo '<h4>'.get_field('program_term').' Session</h4>';
		echo '<p class="small-mar"><strong>';
		$s_date = DateTime::createFromFormat('Ymd', get_field('program_start'));
		echo $s_date->format('F j, Y');
		echo '-';
		$e_date = DateTime::createFromFormat('Ymd', get_field('program_end'));
		echo $e_date->format('F j, Y');
		echo '</strong></p><p class="small-mar">';
		echo '<strong>Level: </strong>'.get_field('program_level');
		echo '</p><p class="small-mar">';
		echo get_field('program_time').' hours per week</p>';
		if(get_field('program_apply')):
			echo '<a class="btn-orange btn-block" href="/apply-to-eli/eli-application-form/"><i class="icon-arrow-right"></i>Apply Now</a>';
		endif;
		echo '</div>';
	  	endif; ?>
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
     <?php $add_cols = get_field('add_columns');
	if ($add_cols): ?>
    <div class="row-fluid clearfix pad-two-tb page-columns">
      <div class="span6" id="left_column"><div class="my-col">
        <?php while(has_sub_field("left_column")):
                get_template_part('column', 'two');
            endwhile; ?></div>
      </div>
      <div class="span6" id="right_column"><div class="my-col">
        <?php while(has_sub_field("right_column")):
                get_template_part('column', 'two');
            endwhile; ?></div>
      </div>
    </div>
    <? endif; ?>
  </div>
  <!-- end #main -->
  
  <?php get_sidebar(); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
