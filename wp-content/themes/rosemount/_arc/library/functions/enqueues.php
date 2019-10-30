<? //WHITELABEL PLOTT
function theme_add_js() {
	// wp_enqueue_script( 'masonry-js', 							get_template_directory_uri() .   '/library/js/masonry.pkgd.min.js', array(), '3.0.0', true );
  // wp_enqueue_script( 'imagesLoaded-js', 					get_template_directory_uri() .   '/library/js/imagesloaded.min.js', array(), '3.0.0', true );
	wp_enqueue_script( 'bootstrap-js', 								get_template_directory_uri() .   	'/library/js/bootstrap.min.js', array(), '3.0.0', true );
	// wp_enqueue_script( 'lazy-js', 									get_template_directory_uri() .   '/library/js/lazysizes.min.js', array(), '2.0.6', true );
	// wp_enqueue_script( 'jasny_bootstrap-js', 			get_template_directory_uri() .   '/library/js/jasny-bootstrap.min.js', array(), '3.0.0', true );
	wp_enqueue_script( 'waypoint-js', 								get_template_directory_uri() .   '/library/js/waypoints.js', array('jquery'), '3.0.0', true );
	wp_enqueue_script( 'jquery-video-background-js', 	get_template_directory_uri() .   '/library/js/jquery.background-video.min.js', array('jquery'), '3.0.0', true );
	wp_enqueue_script( 'column-height-js', 						get_template_directory_uri() .   '/library/js/jquery.matchHeight-min.js', array(), '', true );
	wp_enqueue_script( 'ken-burns-js', 								get_template_directory_uri() .   '/library/js/kenburns.js', array('jquery'), '3.0.0', true );

	wp_enqueue_style( 'bootstrap-css', 								get_stylesheet_directory_uri() .   '/library/css/bootstrap.css' );
	wp_enqueue_script( 'jquery-touch', '//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js', array('jquery'), '1.6.4', true );
}

add_action( 'wp_enqueue_scripts', 'theme_add_js' );

function theme_add_css() {
	// wp_enqueue_style( 'jasny_bootstrap-css', 			get_template_directory_uri() .   '/library/css/jasny-bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', 								get_stylesheet_directory_uri() . '/library/css/font-awesome.min.css');
	wp_enqueue_style( 'animate-css', 									get_stylesheet_directory_uri() . '/library/css/animate.min.css');
	wp_enqueue_style( 'ken-burns', 										get_stylesheet_directory_uri() . '/library/css/ken-burns.css');
	wp_enqueue_style( 'jquery-video-background-css', 	get_stylesheet_directory_uri() . '/library/css/jquery.background-video.css');
}

add_action( 'get_footer', 'theme_add_css' );

function my_register_script_method () {
    wp_deregister_script('jquery');
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js');
}
add_action( 'wp_enqueue_scripts', 'my_register_script_method' );


function my_admin_theme_style() {
    wp_enqueue_style('my-admin-style', get_template_directory_uri() . '/library/css/admin_section.css');
}
add_action('admin_enqueue_scripts', 'my_admin_theme_style');

?>
