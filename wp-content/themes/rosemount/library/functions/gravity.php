<?php


add_filter( 'gform_confirmation_anchor', '__return_true' );

function gf_spinner_replace( $image_src, $form ) {
	return  ''; // relative to you theme images folder
}

add_filter( 'gform_ajax_spinner_url', 'gf_spinner_replace', 10, 2 );

//Remove GF Spinner
add_filter( 'gform_submit_button', '__return_false' );