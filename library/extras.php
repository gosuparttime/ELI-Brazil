<?php
add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {

	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() )
		return $output;

	/* Set up the default arguments. */
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	);

	/* Merge the defaults with user input. */
	$attr = shortcode_atts( $defaults, $attr );

	/* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
	if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
		return $content;

	/* Set up the attributes for the caption <div>. */
	$attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
	$attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';
	$attributes .= ' style="width: ' . esc_attr( $attr['width'] ) . 'px"';

	/* Open the caption <div>. */
	$output = '<div' . $attributes .'>';

	/* Allow shortcodes for the content the caption was created for. */
	$output .= do_shortcode( $content );

	/* Append the caption text. */
	$output .= '<p class="wp-caption-text">' . $attr['caption'] . '</p>';

	/* Close the caption </div>. */
	$output .= '</div>';

	/* Return the formatted, clean caption. */
	return $output;
}
//
// Display Components
function display_module($type, $heading, $block, $hide) {
	echo '<div class="clearfix';
	
	echo '" role="complementary">';
    $query = new WP_Query(array( 'post_type' => 'module', 'name' => $type));
    while ( $query->have_posts() ) : $query->the_post();
	if (!$hide){
		echo '<h'.$heading.'>';
		the_title();
		echo '</h'.$heading.'>';
	}
	if (has_post_thumbnail()){
		echo '<div class="thumbnail mar-two-l mar-two-b pull-right mobile-stack">'; 
		the_post_thumbnail('small-feature');
		echo '</div>'; 
	}
	the_content();//$info; 
    endwhile;
	wp_reset_postdata();
	echo '</div>'; 
}


// Module Widget
class ModuleWidget extends WP_Widget
{
  function ModuleWidget()
  {
    $widget_ops = array('classname' => 'ModuleWidget', 'description' => 'Displays information from selected module section within "Homepage Options"' );
    $this->WP_Widget('ModuleWidget', 'Module Widget', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'color' => '', 'available' => '' ) );
	$available = $instance['available'];
	$query = new WP_Query(array( 'post_type' => 'module', 'orderby' => 'ASC', 'posts_per_page' => '-1'));?>
    <p>
  <label for="<?php echo $this->get_field_id('available'); ?>">Choose A Module: </label>
  <select id="<?php echo $this->get_field_id('available'); ?>" name="<?php echo $this->get_field_name('available'); ?>" class="widefat" style="width:100%;">
    <? while ( $query->have_posts() ) : $query->the_post();
  $id = get_the_ID();?>
  <option <?php selected( $instance['available'], $id ); ?> value="<?php echo $id; ?>"><?php echo the_title(); ?></option>
  <? endwhile;
  	wp_reset_postdata(); ?>
  </select>
</p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['color'] = $new_instance['color'];
	$instance['available'] = $new_instance['available'];
    return $instance;
  }
 
    function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
	$color = empty($instance['color']) ? ' ' : apply_filters('widget_title', $instance['color']);
	$available = empty($instance['available']) ? ' ' : apply_filters('widget_title', $instance['available']);
    $query = new WP_Query(array( 'post_type' => 'module', 'page_id' => $available));
    while ( $query->have_posts() ) : $query->the_post();
   
    //$title = the_title();
 	
    //if (!empty($title))
    echo $before_widget;
	echo $before_title;
	echo the_title();
	echo $after_title;
    
    // WIDGET CODE GOES HERE
   
	echo '<div class="content">';
	if (has_post_thumbnail()){
		echo '<div class="thumbnail mar-one-b mobile-stack">';
		the_post_thumbnail('small-feature');
		echo '</div>';
	};
	echo the_content();
	if (get_field('page_link')){
		echo '<p><a href="';
			if( get_field('internal_link')){
				the_field('internal_link');
				echo '"';
			}
			else if(get_field('external_link')){
				the_field('external_link');
				echo '" target="_blank"';
			} else {
				the_permalink();
				echo '"';
			}
		echo 'title="';
		echo the_title();
		echo '">';
		if (get_field('link_label')){
			the_field('link_label');
			echo '</a>';
		} else {
			echo 'Learn More</a></p>';
		};
	};
	echo '</div>';
    echo $after_widget;
	endwhile;
	wp_reset_postdata();
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("ModuleWidget");') );

?>