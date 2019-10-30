<?php

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'vimeos_flush_rewrite_rules' );

// Flush your rewrite rules
function vimeos_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function vimeos() {
	// creating (registering) the custom type
	register_post_type( 'vimeo-posts', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Vimeo Posts', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Vimeo', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Vimeos', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New Vimeo', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Vimeo', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit Vimeo', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Vimeo', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Vimeo', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Vimeo', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Vimeos', 'bonestheme' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'vimeos', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			// 'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'menu_icon' => 'dashicons-video-alt3', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'vimeo', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'vimeos', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type( 'category', 'vimeos' );
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type( 'post_tag', 'vimeos' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'vimeos');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'vimeos_categories',
		array('vimeo-posts'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Vimeo Categories', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Vimeo Category', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Vimeo Categories', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Vimeo Categories', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Vimeo Category', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Vimeo Category:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Vimeo Category', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Vimeo Category', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Vimeo Category', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Vimeo Category Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'vimeos' ),
		)
	);

	// now let's add custom tags (these act like categories)
	// register_taxonomy( 'client_tag',
	// 	array('vimeos'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	// 	array('hierarchical' => false,    /* if this is false, it acts like tags */
	// 		'labels' => array(
	// 			'name' => __( 'Vimeo Tags', 'bonestheme' ), /* name of the custom taxonomy */
	// 			'singular_name' => __( 'Vimeo Tag', 'bonestheme' ), /* single taxonomy name */
	// 			'search_items' =>  __( 'Search Vimeo Tags', 'bonestheme' ), /* search title for taxomony */
	// 			'all_items' => __( 'All Vimeo Tags', 'bonestheme' ), /* all title for taxonomies */
	// 			'parent_item' => __( 'Parent Vimeo Tag', 'bonestheme' ), /* parent title for taxonomy */
	// 			'parent_item_colon' => __( 'Parent Vimeo Tag:', 'bonestheme' ), /* parent taxonomy title */
	// 			'edit_item' => __( 'Edit Vimeo Tag', 'bonestheme' ), /* edit custom taxonomy title */
	// 			'update_item' => __( 'Update Vimeo Tag', 'bonestheme' ), /* update title for taxonomy */
	// 			'add_new_item' => __( 'Add New Vimeo Tag', 'bonestheme' ), /* add new title for taxonomy */
	// 			'new_item_name' => __( 'New Vimeo Tag Name', 'bonestheme' ) /* name title for taxonomy */
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true,
	// 	)
	// );

	/*
		looking for custom meta boxes?
		check out this fantastic tool:
		https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
	*/


?>
