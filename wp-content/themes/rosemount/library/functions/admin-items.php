<?php
/**
 * Specify which users can see admin menu items based on their email address
 *
 * @author Ashley Armstrong <ashley@plottcreative.co.uk>
 * @since  1.0
 */

function remove_dashboard_menus() {
    $user_data = get_userdata( get_current_user_id() );
    $user_email = isset( $user_data->user_email ) ? $user_data->user_email : '';

    if ( ! strpos( $user_email, '@plottcreative.co.uk' ) ) {
        // Hide Updates under Dashboard menu
        remove_submenu_page( 'index.php', 'update-core.php' );

        // Hide Comments
        remove_menu_page( 'edit-comments.php' );

        // Hide Plugins
        remove_menu_page( 'plugins.php' );

        // Hide Themes, Customizer and Widgets under Appearance menu
        remove_submenu_page( 'themes.php', 'themes.php' );
        remove_submenu_page( 'themes.php', 'customize.php?return=' . urlencode( $_SERVER['REQUEST_URI'] ) );
        remove_submenu_page( 'themes.php', 'widgets.php' );

        // Hide Tools
        remove_menu_page( 'tools.php' );

        // Hide General Settings
        remove_menu_page( 'options-general.php' );

        // Hide ACF Fields
        remove_menu_page( 'edit.php?post_type=acf-field-group' );
    }
}
add_action( 'admin_menu', 'remove_dashboard_menus' );
