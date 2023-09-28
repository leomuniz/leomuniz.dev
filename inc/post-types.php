<?php

function register_portfolio_cpt() {

	$labels = [
		'name'               => 'Portfolio',
		'singular_name'      => 'Portfolio Item',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Portfolio Item',
		'edit_item'          => 'Edit Portfolio Item',
		'new_item'           => 'New Portfolio Item',
		'view_item'          => 'View Portfolio Item',
		'search_items'       => 'Search Portfolio',
		'not_found'          => 'No Portfolio item found',
		'not_found_in_trash' => 'No Portfolio item found in trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Portfolio',
	];

	register_post_type(
		'portfolio',
		[
			'labels'              => $labels,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'query_var'           => true,
			'has_archive'         => true,
			'map_meta_cap'        => true,
			'hierarchical'        => false,
			'menu_position'       => 6,
			'supports'            => [ 'title', 'thumbnail', 'editor', 'excerpt', 'author' ],
			'menu_icon'           => 'dashicons-portfolio',
		]
	);

 
	$tag_labels = [
		'name'                       => _x( 'Tags', 'taxonomy general name' ),
		'singular_name'              => _x( 'Tag', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Tags' ),
		'popular_items'              => __( 'Popular Tags' ),
		'all_items'                  => __( 'All Tags' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Tag' ), 
		'update_item'                => __( 'Update Tag' ),
		'add_new_item'               => __( 'Add New Tag' ),
		'new_item_name'              => __( 'New Tag Name' ),
		'separate_items_with_commas' => __( 'Separate tags with commas' ),
		'add_or_remove_items'        => __( 'Add or remove tags' ),
		'choose_from_most_used'      => __( 'Choose from the most used tags' ),
		'menu_name'                  => __( 'Tags' ),
	];

	register_taxonomy( 'tag','portfolio', [
	 	'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'tag' ),
	]);

}
add_action( 'init', 'register_portfolio_cpt' );

// Forces the blog home to display the portfolio instead posts.
function modify_blog_home_query($query) {

	if ( $query->is_home() && $query->is_main_query() ) {
		$query->set( 'post_type', [ 'portfolio' ] );
	}
}
add_action('pre_get_posts', 'modify_blog_home_query');