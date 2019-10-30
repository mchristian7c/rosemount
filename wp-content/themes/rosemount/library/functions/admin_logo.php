<?
// admin logo
function wpb_custom_logo() {
echo '
<style type="text/css">
  #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
    background-image: url(' . get_bloginfo('stylesheet_directory') . '/library/images/admin-logo.png) !important;
    background-position: 0 0;
    color:rgba(0, 0, 0, 0);
    background-size: 16px auto;
    background-repeat: no-repeat;
  }
  #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
    background-position: 0 0;
  }
</style>
';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');
?>
