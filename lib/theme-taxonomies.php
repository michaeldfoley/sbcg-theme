<?php 
/**
 * Register a new taxonomy that applies to attachments
 */
 
function _sbcg_add_image_cat_taxonomy() {
  $labels = array(
    'name'                       => _x( 'Image Categories', 'taxonomy general name', '_sbcgtheme' ),
		'singular_name'              => _x( 'Image Category', 'taxonomy singular name', '_sbcgtheme' ),
		'search_items'               => __( 'Search Image Categories', '_sbcgtheme' ),
		'popular_items'              => __( 'Popular Image Categories', '_sbcgtheme' ),
		'all_items'                  => __( 'All Image Categories', '_sbcgtheme' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Image Category', '_sbcgtheme' ),
		'update_item'                => __( 'Update Image Category', '_sbcgtheme' ),
		'add_new_item'               => __( 'Add New Image Category', '_sbcgtheme' ),
		'new_item_name'              => __( 'New Image Category Name', '_sbcgtheme' ),
		'separate_items_with_commas' => __( 'Separate image categories with commas', '_sbcgtheme' ),
		'add_or_remove_items'        => __( 'Add or remove image categories', '_sbcgtheme' ),
		'choose_from_most_used'      => __( 'Choose from the most used image categories', '_sbcgtheme' ),
		'not_found'                  => __( 'No image categories found.', '_sbcgtheme' ),
		'menu_name'                  => __( 'Image Categories', '_sbcgtheme' ),
  );

  $args = array(
    'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'images' ),
  );

  register_taxonomy( 'image_cat', 'attachment', $args );
}
add_action( 'init', '_sbcg_add_image_cat_taxonomy' );