<?php
// add_filter("gform_submit_button", "form_submit_button", 10, 2);
// function form_submit_button($button, $form){
//     return "<span></span>".$button;
// }

add_filter( 'gform_confirmation_anchor', '__return_true' );

function gf_spinner_replace( $image_src, $form ) {
	return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
}

add_filter( 'gform_ajax_spinner_url', 'gf_spinner_replace', 10, 2 );

add_action( 'gform_after_submission_1', 'mysite_gform_after_submission_1', 10, 2 );
function mysite_gform_after_submission_1 ( $entry, $form ) {
GFAPI::delete_entry( $entry['id'] );
}
add_action( 'gform_after_submission_2', 'mysite_gform_after_submission_2', 10, 2 );
function mysite_gform_after_submission_2 ( $entry, $form ) {
GFAPI::delete_entry( $entry['id'] );
}



function gform_column_splits($content, $field, $value, $lead_id, $form_id) {
if(!is_admin()) { // only perform on the front end
    if($field['type'] == 'section') {
        $form = RGFormsModel::get_form_meta($form_id, true);

        // check for the presence of multi-column form classes
        $form_class = explode(' ', $form['cssClass']);
        $form_class_matches = array_intersect($form_class, array('two-column', 'three-column'));

        // check for the presence of section break column classes
        $field_class = explode(' ', $field['cssClass']);
        $field_class_matches = array_intersect($field_class, array('gform_column'));

        // if field is a column break in a multi-column form, perform the list split
        if(!empty($form_class_matches) && !empty($field_class_matches)) { // make sure to target only multi-column forms

            // retrieve the form's field list classes for consistency
            $form = RGFormsModel::add_default_properties($form);
            $description_class = rgar($form, 'descriptionPlacement') == 'above' ? 'description_above' : 'description_below';

            // close current field's li and ul and begin a new list with the same form field list classes
            return '</li></ul><ul class="gform_fields '.$form['labelPlacement'].' '.$description_class.' '.$field['cssClass'].'"><li class="gfield gsection empty">';

        }
    }
}

return $content;
}

add_filter('gform_field_content', 'gform_column_splits', 100, 5);

?>
