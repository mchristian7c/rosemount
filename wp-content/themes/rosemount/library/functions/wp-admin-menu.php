<?php
// GO FISH - find array[2] values for menu items to hide
// add_action( 'admin_init', 'wpse_136058_debug_admin_menu' );
//
// function wpse_136058_debug_admin_menu() {
//
//     echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';
// }

add_action( 'admin_menu', 'isa_remove_menus', 999 );
function isa_remove_menus() {

    // INSERT MENU ITEMS TO REMOVE FOR EVERYONE
    // remove_menu_page( 'edit-comments.php' );          //Comments
    // remove_menu_page( 'tools.php' );                  //Tools


    /* remove for editor and below, but not administrator */
    if ( ! current_user_can('manage_options') ) {

        // INSERT MENU ITEMS TO REMOVE FOR EDITOR AND BELOW
        remove_menu_page( 'edit.php' );                   //Posts
        remove_menu_page( 'upload.php' );                 //Media

    }

    /* remove only for author and below */
    if ( ! current_user_can('delete_others_posts') ) {

        // INSERT MENU ITEMS TO REMOVE FOR AUTOHR AND BELOW

    }
}

// MENU ITEMS THAT CAN BE REMOVED
// ------------------------------
// remove_menu_page( 'index.php' );                  //Dashboard
// remove_menu_page( 'edit.php' );                   //Posts
// remove_menu_page( 'upload.php' );                 //Media
// remove_menu_page( 'edit.php?post_type=page' );    //Pages
// remove_menu_page( 'edit-comments.php' );          //Comments
// remove_menu_page( 'themes.php' );                 //Appearance
// remove_menu_page( 'plugins.php' );                //Plugins
// remove_menu_page( 'users.php' );                  //Users
// remove_menu_page( 'tools.php' );                  //Tools
// remove_menu_page( 'options-general.php' );        //Settings
// remove_menu_page( 'wp_broadbean_home' );    //wpbb
// remove_menu_page( 'gf_edit_forms', 'gf_edit_forms' );    //gravity forms
// remove_menu_page( 'edit.php?post_type=acf-field-group' );    //custom fields

 ?>
