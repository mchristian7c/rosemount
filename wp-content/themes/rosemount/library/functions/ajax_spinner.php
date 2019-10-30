<?
// cf7 ajax spinner
function my_wpcf7_ajax_loader () {
    return  get_stylesheet_directory_uri() . '/library/images/spinner.png';
}
add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
?>
