<?
// example custom dashboard widget
function custom_dashboard_widget() {
  echo "<div style='text-align:center;'>";
  	echo "<img style='display:inline-block;vertical-align:middle;' src='https://www.plottcreative.co.uk/wp-content/themes/plott-creative/images/ap_logo.png' height='100px' width='177px'>";
  	// echo "<img style='display:inline-block;vertical-align:middle;' src='https://www.internationalmovingexpert.co.uk/wp-content/themes/ime/images/logo.svg' height='100px' width='177px'>";
  	//echo "<img style='display:inline-block;vertical-align:middle;' src='http://localhost/whitelabel/wp-content/themes/whitelabel/library/images/logo.png' height='100px' width='100px'>";
    //echo "<h1 style='display:inline-block;vertical-align:middle;margin:0 0 0 20px;font-family:Rosario;font-size: 30px;'>Whitelabel Website</h1>";
    echo "<h1 style='font-family:Rosario;font-size: 30px;margin:30px 0 20px 0;padding:0;'>PLOTT</h1>";
    echo "<h2 style='font-size: 14px;margin:0 0 10px 0;padding:0;'>by PLOTT Creative</h2>";
    echo "<p style='font-size: 12px;margin:0;'>Courtyard 3, Coleshill Manor, Coleshill, B46 1DL</p>";
    echo "<p style='font-size: 12px;margin:0;'>01675 434583</p>";
  echo "</div>";
}
function add_custom_dashboard_widget() {
	wp_add_dashboard_widget('custom_dashboard_widget', 'Plott Creative', 'custom_dashboard_widget');
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');

function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
        remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'normal');//since 3.8

}
add_action( 'admin_init', 'remove_dashboard_meta' );

add_action('wp_dashboard_setup', 'organicweb_dashboard_widgets');

function organicweb_dashboard_widgets() {
// CHANGE 'OrganicWeb News' BELOW TO THE TITLE OF YOUR WIDGET
wp_add_dashboard_widget( 'dashboard_custom_feed', 'Plott Creative Blog', 'organicweb_custom_feed_output' );

function organicweb_custom_feed_output() {
echo '<div class="rss-widget">';
wp_widget_rss_output(array(
// CHANGE THE URL BELOW TO THAT OF YOUR FEED
'url' => 'https://www.plottcreative.co.uk/feed/',
// CHANGE 'OrganicWeb News' BELOW TO THE NAME OF YOUR WIDGET
'title' => 'Plott Creative',
// CHANGE '2' TO THE NUMBER OF FEED ITEMS YOU WANT SHOWING
'items' => 4,
// CHANGE TO '0' IF YOU ONLY WANT THE TITLE TO SHOW
'show_summary' => 1,
// CHANGE TO '1' TO SHOW THE AUTHOR NAME
'show_author' => 0,
// CHANGE TO '1' TO SHOW THE PUBLISH DATE
'show_date' => 1
));
echo "</div>";
}
}
?>
