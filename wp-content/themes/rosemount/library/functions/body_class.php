<?
// add 'praet' body class
add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
    $classes[] = 'plott';
    return $classes;
}
?>
