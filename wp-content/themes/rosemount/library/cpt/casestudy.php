<?php

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'case_flush_rewrite_rules' );

// Flush your rewrite rules
function case_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function studies() {
	// creating (registering) the custom type
	register_post_type( 'casestudies', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Studies', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Study', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Studies', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New Study', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Study', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit Study', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Study', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Study', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Study', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Studies', 'bonestheme' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Studies', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			// 'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'menu_icon' => 'dashicons-welcome-learn-more', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'case-study', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'case-study', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'revisions')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type( 'category', 'Studies' );
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type( 'post_tag', 'Studies' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'studies');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// now let's add custom categories (these act like categories)
	// register_taxonomy( 'Studies_custom_cat',
	// 	array('Studies'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	// 	array('hierarchical' => true,     /* if this is true, it acts like categories */
	// 		'labels' => array(
	// 			'name' => __( 'Study Categories', 'bonestheme' ), /* name of the custom taxonomy */
	// 			'singular_name' => __( 'Study Category', 'bonestheme' ), /* single taxonomy name */
	// 			'search_items' =>  __( 'Search Study Categories', 'bonestheme' ), /* search title for taxomony */
	// 			'all_items' => __( 'All Study Categories', 'bonestheme' ), /* all title for taxonomies */
	// 			'parent_item' => __( 'Parent Study Category', 'bonestheme' ), /* parent title for taxonomy */
	// 			'parent_item_colon' => __( 'Parent Study Category:', 'bonestheme' ), /* parent taxonomy title */
	// 			'edit_item' => __( 'Edit Study Category', 'bonestheme' ), /* edit custom taxonomy title */
	// 			'update_item' => __( 'Update Study Category', 'bonestheme' ), /* update title for taxonomy */
	// 			'add_new_item' => __( 'Add New Study Category', 'bonestheme' ), /* add new title for taxonomy */
	// 			'new_item_name' => __( 'New Study Category Name', 'bonestheme' ) /* name title for taxonomy */
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true,
	// 		'rewrite' => array( 'slug' => 'Studies' ),
	// 	)
	// );

	// now let's add custom tags (these act like categories)
	// register_taxonomy( 'client_tag',
	// 	array('Studies'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	// 	array('hierarchical' => false,    /* if this is false, it acts like tags */
	// 		'labels' => array(
	// 			'name' => __( 'Study Tags', 'bonestheme' ), /* name of the custom taxonomy */
	// 			'singular_name' => __( 'Study Tag', 'bonestheme' ), /* single taxonomy name */
	// 			'search_items' =>  __( 'Search Study Tags', 'bonestheme' ), /* search title for taxomony */
	// 			'all_items' => __( 'All Study Tags', 'bonestheme' ), /* all title for taxonomies */
	// 			'parent_item' => __( 'Parent Study Tag', 'bonestheme' ), /* parent title for taxonomy */
	// 			'parent_item_colon' => __( 'Parent Study Tag:', 'bonestheme' ), /* parent taxonomy title */
	// 			'edit_item' => __( 'Edit Study Tag', 'bonestheme' ), /* edit custom taxonomy title */
	// 			'update_item' => __( 'Update Study Tag', 'bonestheme' ), /* update title for taxonomy */
	// 			'add_new_item' => __( 'Add New Study Tag', 'bonestheme' ), /* add new title for taxonomy */
	// 			'new_item_name' => __( 'New Study Tag Name', 'bonestheme' ) /* name title for taxonomy */
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
