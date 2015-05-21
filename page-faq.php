<?php

// Template Name: FAQ Pages

get_header(); ?>
<div id="content" class="clearfix row-fluid pad-two-b">
  <div id="main" class="span8 clearfix" role="main">
    <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
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
    <?php $args = array(
			'post_type' => 'faq',
			'orderby' => 'title', 
			'order' => 'asc',
			'posts_per_page' => '-1'
		);
		$loop = new WP_Query( $args );
       ?>
        <nav id="faq-menu" class=" faq-nav" role="navigation">
        	<ul>
			<?php while ($loop-> have_posts()) : $loop-> the_post(); ?>
            	<li><a title="<?php the_title(); ?>" href="#faq-<?php the_ID(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
            </ul>
        </nav>
		<?php while ($loop-> have_posts()) : $loop-> the_post(); ?>
    	<article id="faq-<?php the_ID(); ?>" class="clearfix">
        	<header><h4><?php the_title(); ?></h4></header>
            <section><?php the_content(); ?></section>
        </article>
		<?php endwhile; ?>
  </div>
  <!-- end #main -->
  
  <?php get_sidebar(); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
