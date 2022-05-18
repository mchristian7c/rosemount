<?php
/**
 * Dashboard Theme
 *
 * @author Ashley Armstrong <ashley@plottcreative.co.uk>
 * @since  1.0
 */



function custom_dashboard_widget() {
  echo "<div class='dashwrap' style='text-align:center;background-color:#000000;margin-top:-11px;width:calc(100% + 24px);margin-left:-12px;padding-bottom:12px;margin-bottom:-12px;'>";
  echo "<p style='color:white;font-size:18px;font-weight:bold;text-align:center;padding:48px 0 18px 0;margin:0;'>Designed and built by</p>";
  	echo "<img style='display:inline-block;vertical-align:middle;' src='https://www.plott.co.uk/wp-content/themes/plott/plott-dash.svg' height='78px' width='177px'>";
    echo "<p style='color:white;font-size:18px;font-weight:bold;text-align:center;padding:34px 0 22px 0;margin:0;'>We don't just do websites</p>";
    echo "<p style='text-transform:uppercase;color:white;font-size:15px;letter-spacing:1.5px;font-weight:normal;text-align:center;margin:0'>
    branding<span style='margin:0 8px;color:#3CDBDB;'>&#8226;</span>
    marketing<span style='margin:0 8px;color:#3CDBDB;'>&#8226;</span>
    digital<br>
    animation<span style='margin:0 8px;color:#3CDBDB;'>&#8226;</span>
    social<span style='margin:0 8px;color:#3CDBDB;'>&#8226;</span>
    photography<br>
    video<span style='margin:0 8px;color:#3CDBDB;'>&#8226;</span>
    exhibition<span style='margin:0 8px;color:#3CDBDB;'>&#8226;</span>
    web</p>";
    echo "<p style='font-size: 18px;margin:0;color:#3CDBDB;padding:20px 0 48px 0;'><a style='color:#3CDBDB' href='http://www.plott.co.uk/' target='_blank'>www.plott.co.uk</a></p>";
  echo "</div>";
}
function add_custom_dashboard_widget() {
	wp_add_dashboard_widget('custom_dashboard_widget', 'PLOTT', 'custom_dashboard_widget');
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
        remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'normal');//since 3.8

}
add_action( 'admin_init', 'remove_dashboard_meta' );

add_action('wp_dashboard_setup', 'organicweb_dashboard_widgets');

function organicweb_dashboard_widgets() {
// CHANGE 'OrganicWeb News' BELOW TO THE TITLE OF YOUR WIDGET
wp_add_dashboard_widget( 'dashboard_custom_feed', 'PLOTT News', 'organicweb_custom_feed_output' );

function organicweb_custom_feed_output() {
echo '<div class="rss-widget">';
wp_widget_rss_output(array(
// CHANGE THE URL BELOW TO THAT OF YOUR FEED
'url' => 'https://www.plott.co.uk/feed/',
// CHANGE 'OrganicWeb News' BELOW TO THE NAME OF YOUR WIDGET
'title' => 'PLOTT',
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
