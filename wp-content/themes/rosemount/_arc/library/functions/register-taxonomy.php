<?
// register a taxonomy called 'Video Category'
function vid_register_taxonomy() {
    register_taxonomy( 'video_cat', array( 'video', 'post' ),
        array(
            'labels' => array(
                'name'              => 'Video Categories',
                'singular_name'     => 'Video Category',
                'search_items'      => 'Search Video Categories',
                'all_items'         => 'All Video Categories',
                'edit_item'         => 'Edit Video Categories',
                'update_item'       => 'Update Video Category',
                'add_new_item'      => 'Add New Video Category',
                'new_item_name'     => 'New Video Category',
                'menu_name'         => 'Video Category',
            ),
            'hierarchical' => true,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'rewrite' => array( 'slug' => 'video-category' ),
            'show_admin_column' => false
        )
    );
}
add_action( 'init', 'vid_register_taxonomy' );
?>
