<?php
// Custom Post Types
add_action( 'init', 'create_new_slides' );
function create_new_slides() {
	// Add Student Types
	$labels = array(
		'name' => 'Slides',
		 'singular_name' => 'Slide',
		 'menu_name' => 'Slides',
		 'add_new' => 'Add Slide',
		 'add_new_item' => 'Add New Slide',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Slide',
		 'new_item' => 'New Slide',
		 'view' => 'View Slide',
		 'view_item' => 'View Slide',
		 'search_items' => 'Search Slides',
		 'not_found' => 'No Slides Found',
		 'not_found_in_trash' => 'No Slides Found in Trash',
		 'parent' => 'Parent Slide'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new slides for ELI. These are displayed on the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'slide'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 6,
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title'),
	);
	register_post_type('slide', $args);
};
function set_slide_columns($columns) {
    return array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title'),
        'date' => __('Date'),
        'author' => __('Author'),
		'column_1' => __('Slide Image'),
    );
}
// POPULATE CUSTOM COLUMNS ON CUSTOM POST
add_action('manage_slide_posts_custom_column', 'add_new_slide_cols', 10, 2);
	function add_new_slide_cols($column, $post_id){
	global $post;
	switch ($column){
	case 'column_1':
	$column_1_content = the_field('slide_image');
	echo $column_1_content;
	default:
	break;
	}
}
add_filter('manage_slide_posts_columns' , 'set_slide_columns');

// New Modules For Site
add_action( 'init', 'create_new_modules' );
function create_new_modules() {
	// Add Modules
	$labels = array(
		'name' => 'Modules',
		 'singular_name' => 'Module',
		 'menu_name' => 'Modules',
		 'add_new' => 'Add Module',
		 'add_new_item' => 'Add New Module',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Module',
		 'new_item' => 'New Module',
		 'view' => 'View Module',
		 'view_item' => 'View Module',
		 'search_items' => 'Search Modules',
		 'not_found' => 'No Modules Found',
		 'not_found_in_trash' => 'No Modules Found in Trash',
		 'parent' => 'Parent Module'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new modules for ELI. These can be content blocks for the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'module'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 7,
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('module', $args);
};

// Register Custom Post Type
add_action( 'init', 'create_new_tabs' );
function create_new_tabs() {
	// Add Student Types
	$labels = array(
		'name' => 'Page Tabs',
		 'singular_name' => 'Page Tab',
		 'menu_name' => 'Page Tabs',
		 'add_new' => 'Add Page Tab',
		 'add_new_item' => 'Add New Page Tab',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Page Tab',
		 'new_item' => 'New Page Tab',
		 'view' => 'View Page Tab',
		 'view_item' => 'View Page Tab',
		 'search_items' => 'Search Page Tabs',
		 'not_found' => 'No Page Tabs Found',
		 'not_found_in_trash' => 'No Page Tabs Found in Trash',
		 'parent' => 'Parent Page Tab'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new page tabs for homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'sections'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 5,
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title', 'editor'),
	);
	register_post_type('tabs', $args);
};

// Register Custom Taxonomy
function tab_tax()  {
	$labels = array(
		'name'                       => _x( 'Sections', 'Taxonomy General Name', 'elibrazil' ),
		'singular_name'              => _x( 'Section', 'Taxonomy Singular Name', 'elibrazil' ),
		'menu_name'                  => __( 'Sections', 'elibrazil' ),
		'all_items'                  => __( 'All Sections', 'elibrazil' ),
		'parent_item'                => __( 'Parent Section', 'elibrazil' ),
		'parent_item_colon'          => __( 'Parent Section:', 'elibrazil' ),
		'new_item_name'              => __( 'New Section Name', 'elibrazil' ),
		'add_new_item'               => __( 'Add New Section', 'elibrazil' ),
		'edit_item'                  => __( 'Edit Section', 'elibrazil' ),
		'update_item'                => __( 'Update Section', 'elibrazil' ),
		'separate_items_with_commas' => __( 'Separate sections with commas', 'elibrazil' ),
		'search_items'               => __( 'Search sections', 'elibrazil' ),
		'add_or_remove_items'        => __( 'Add or remove sections', 'elibrazil' ),
		'choose_from_most_used'      => __( 'Choose from the most used sections', 'elibrazil' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy( 'sections', 'tabs', $args );
}
// Hook into the 'init' action
add_action( 'init', 'tab_tax', 0 );

// add CSS Styles
// Define icon styles for the custom post type
/*function casestudy_icons() {
?>
<style type="text/css" media="screen">
        #menu-posts-module .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/library/cpt-icon/fruit-orange.png) no-repeat 6px -32px !important;
        }
        #menu-posts-module:hover .wp-menu-image, #menu-posts-module.wp-has-current-submenu .wp-menu-image {
            background-position:6px 0px !important;
        }
        #icon-edit.icon32-posts-module {background: url(<?php bloginfo('template_url') ?>/images/admin-dashboard/casestudy-32x32.png) no-repeat;}
    </style>

<?php }
add_action( 'admin_head', 'casestudy_icons' );
*/