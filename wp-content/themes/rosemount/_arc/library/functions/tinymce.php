<?// block TinyMCE formats
function wpa_45815($arr){
    $arr['block_formats'] = 'Paragraph=p;Heading 3=h3;Heading 4=h4';
    return $arr;
  }
add_filter('tiny_mce_before_init', 'wpa_45815');




// add custom dropdown menu to TinyMCE
// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {
	// Define the style_formats array
	$style_formats = array(
		// Each array child is a format with it's own settings

		array(
			'title' => 'Teal Text',
			'inline' => 'span',
			'classes' => 'teal-txt',
			'wrapper' => true,
		),
		array(
			'title' => 'Small Text',
			'inline' => 'span',
			'classes' => 'sml-txt',
			'wrapper' => true,
		),

	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );
?>
