<?php //WHITELABEL PLOTT
function theme_add_js() {
	wp_enqueue_script( 'masonry-js', 									get_template_directory_uri() .   '/library/js/masonry.pkgd.min.js', array(), '3.0.0', true );
  wp_enqueue_script( 'imagesLoaded-js', 						get_template_directory_uri() .   '/library/js/imagesloaded.min.js', array(), '3.0.0', true );
	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array(), '3.0.0', true );
	wp_enqueue_script( 'lazy-js', 										get_template_directory_uri() .   '/library/js/lazysizes.min.js', array(), '2.0.6', true );
	wp_enqueue_script( 'column-height-js', 						get_template_directory_uri() .   '/library/js/jquery.matchHeight-min.js', array(), '', true );
	wp_enqueue_script( 'bs-collapse-js', 						get_template_directory_uri() .   '/library/js/bs.collapse.js', array(), '', true );
	wp_enqueue_script( 'jquery-touch', '//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js', array('jquery'), '1.6.4', true );
	wp_enqueue_script( 'fb', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array('jquery'), '1.6.4', true );
}

add_action( 'wp_enqueue_scripts', 'theme_add_js' );

function theme_add_css() {
	wp_enqueue_style( 'font-awesome', 								get_template_directory_uri() . '/library/css/font-awesome.min.css');
	//wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' );
	wp_enqueue_style( 'fb-css', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css' );
}

add_action( 'get_footer', 'theme_add_css' );

function my_register_script_method () {
    wp_deregister_script('jquery');
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
}
add_action( 'wp_enqueue_scripts', 'my_register_script_method' );


function my_admin_theme_style() {
    wp_enqueue_style('my-admin-style', get_template_directory_uri() . '/library/css/admin_section.css');
}
add_action('admin_enqueue_scripts', 'my_admin_theme_style');

?>
