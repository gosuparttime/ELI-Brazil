<?php
/*
Template Name: Homepage w/o slideshow
*/
?>
<?php get_header(); ?>

<div id="content" class="clearfix row-fluid pad-two-tb">
  <div id="main" class="clearfix" role="main">
    <?php while (have_posts()) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('clearfix pad-one-b main-stuff'); ?> role="div" itemscope itemtype="http://schema.org/BlogPosting">
      <header>
        <hgroup>
          <?php if (function_exists('the_subheading')) : 
				the_subheading('<h1>', '</h1>'); 
          	endif; ?>
        </hgroup>
      </header>
      <!-- end div header -->
      <div class="row-fluid">
      <div class="post_content clearfix span8" itemprop="divBody">
        <?php the_content(); ?>
      </div>
      <!-- end div section -->
      
      <div class="span4 hidden-phone" role="complementary">
      	<div class="myImage">
			<? if ( has_post_thumbnail() ) {
				echo '<div class="pull-right">';
            	the_post_thumbnail('home-slide', array('class' => "thumbnail"));
				echo '</div>';
        	} ?>
		</div>
      </div>
      
      <!-- end div footer --> 
      
    </div>
    <? endwhile; ?>
    <!-- end #main -->
    <div class="clearfix" id="information" role="main">
      <div id="info-<?php the_ID(); ?>" <?php post_class('clearfix pad-one-b main-stuff'); ?> role="div">
        <div class="row-fluid">
          <div class="span8">
            <?php 
			$c = 1; //init counter
			$d = 0;
	$sections = get_terms( 'sections' );
	foreach ( $sections as $section ) {
    $query = new WP_Query( 
	$args = array(
		'posts_per_page' => '-1',
        'sections' => $section->slug,
		'post_type' => 'tabs',
		'order' => 'ASC',
    ) );
	
	$query = new WP_Query($args);
	echo '<h2 class="clearfix section-head" id="'.$section->slug.'">';
	echo $section->name;
	echo '</h2>';
	if ($section->description):
	echo '<p>';
	echo $section->description;
	echo '</p>';
	endif;
	echo '<div class="accordion" id="accordion'.$c.'">';
	echo '<div class="accordion-group">';
	
    while ( $query->have_posts() ) : $query->the_post();
		$d++; //init counter
		echo '<div class="accordion-heading">';
      	echo '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion'.$c.'" href="#collapse'.$d.'">';
		the_title();
		echo '<i class="icon-plus pull-right"></i></a></div>';
		echo '<div id="collapse'.$d.'" class="accordion-body collapse">';
      	echo '<div class="accordion-inner">';
		the_content();
		echo '</div></div>';
	endwhile;
	echo '</div>';
	echo '</div>';
	$c++;
	wp_reset_postdata();
    
	}
	?>
    <div class="clearfix pad-two-b">
  	<?php 
			$modules = get_field("choose_module");
			$my_module = $modules->post_name;
			$my_module = strval($my_module);
			if (!empty($my_module)){
			display_module($my_module, '3', false);
			}
            ?>
	</div>
          </div>
          <section class="span4"><?php get_sidebar('home')?></section>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end #content -->

<?php get_footer(); ?>
