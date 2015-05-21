<?php
if (has_post_thumbnail()) :
	echo '<div class="thumbnail">';
	echo the_post_thumbnail('small-feature');
	echo '</div>';
endif;
echo '<div class="row-fluid">';
echo '<h4 class="clean-bottom">';
echo the_title();
echo '</h4>';
if (function_exists('the_subheading')) : 
	the_subheading('<strong class="subheading">', '</strong>');
endif;
echo the_excerpt();
echo '</div>';
echo '<div class="row-fluid clearfix"><a href="'.get_permalink().'" class="btn btn-blue btn-block">';
echo '<i class="icon-arrow-right"></i>View Story ';	
echo '</a></div>';
?>