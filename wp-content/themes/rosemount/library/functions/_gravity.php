<?php
// add_filter("gform_submit_button", "form_submit_button", 10, 2);
// function form_submit_button($button, $form){
//     return "<span></span>".$button;
// }

add_filter( 'gform_confirmation_anchor', '__return_true' );

function gf_spinner_replace( $image_src, $form ) {
	return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to your theme images folder
}

add_filter( 'gform_ajax_spinner_url', 'gf_spinner_replace', 10, 2 );

// add_action( 'gform_after_submission_1', 'mysite_gform_after_submission_1', 10, 2 );
// function mysite_gform_after_submission_1 ( $entry, $form ) {
// GFAPI::delete_entry( $entry['id'] );
// }
// add_action( 'gform_after_submission_2', 'mysite_gform_after_submission_2', 10, 2 );
// function mysite_gform_after_submission_2 ( $entry, $form ) {
// GFAPI::delete_entry( $entry['id'] );
// }

?>
