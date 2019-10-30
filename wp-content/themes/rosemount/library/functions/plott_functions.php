<?
// admin logo
function wpb_custom_logo() {
echo '
<style type="text/css">
  #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
    background-image: url(' . get_bloginfo('stylesheet_directory') . '/library/images/admin-logo.png) !important;
    background-position: 0 0;
    color:rgba(0, 0, 0, 0);
    background-size: 16px auto;
    background-repeat: no-repeat;
  }
  #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
    background-position: 0 0;
  }
</style>
';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');
// Register custom navigation walker
    require_once('library/bootstrap/wp_bootstrap_navwalker.php');

// add bootstrap
function theme_add_bootstrap() {
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/library/bootstrap/css/bootstrap.css' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/library/bootstrap/js/bootstrap.js', array(), '3.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'theme_add_bootstrap' );

// add masonry to about page
function theme_add_masonry() {

      wp_enqueue_script( 'masonry-js', get_template_directory_uri() . '/library/js/masonry.pkgd.min.js', array(), '3.0.0', true );
      wp_enqueue_script( 'imagesLoaded-js', get_template_directory_uri() . '/library/js/imagesloaded.pkgd.js', array(), '3.0.0', true );

}

add_action( 'wp_enqueue_scripts', 'theme_add_masonry' );

// add lazyload
function theme_add_lazy() {
  wp_register_script( $handle, $src, $deps, $ver, $in_footer );
	wp_enqueue_script( 'lazy-js', get_template_directory_uri() . '/library/js/lazysizes.min.js', array(), '2.0.6', true );
}

add_action( 'wp_enqueue_scripts', 'theme_add_lazy' );

// add jasny bootstrap
function theme_add_jasny_bootstrap() {
	wp_enqueue_style( 'jasny_bootstrap-css', get_template_directory_uri() . '/library/jasny-bootstrap/css/jasny-bootstrap.css' );
	wp_enqueue_script( 'jasny_bootstrap-js', get_template_directory_uri() . '/library/jasny-bootstrap/js/jasny-bootstrap.js', array(), '3.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'theme_add_jasny_bootstrap' );

// add cookie
function theme_add_cookiebar() {
	wp_enqueue_style( 'cookies-css', get_template_directory_uri() . '/library/css/cookiecuttr.css' );
	// wp_enqueue_script( 'cookies-js', get_template_directory_uri() . '/library/js/jquery.cookiebar.js', array(), '3.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_add_cookiebar' );

// add carousel css
function add_carousel() {
	wp_enqueue_style( 'carousel-css', get_template_directory_uri() . '/library/css/carousel.css' );
	// wp_enqueue_script( 'cookies-js', get_template_directory_uri() . '/library/js/jquery.cookiebar.js', array(), '3.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'add_carousel' );

// add swipe js
function theme_add_swipe() {
  wp_register_script( $handle, $src, $deps, $ver, $in_footer );
	wp_enqueue_script( 'swipe-js', get_template_directory_uri() . '/library/js/jquery.mobile.custom.js', array(), '', true );
}

add_action( 'wp_enqueue_scripts', 'theme_add_swipe' );

//enqueues our locally supplied font awesome stylesheet
function enqueue_font_awesome(){
	wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/library/css/font-awesome.css');
}
add_action('wp_enqueue_scripts','enqueue_font_awesome');

// counterup
function theme_add_counterup() {
	wp_enqueue_style( 'counterup-js', get_template_directory_uri() . '/library/js/jquery.counterup.js' );
	wp_enqueue_script( 'waypoint-js', get_template_directory_uri() . '/library/js/waypoints.js' );
}

add_action( 'wp_enqueue_scripts', 'theme_add_counterup' );

/**
 * Enqueue scripts and styles.
 */
 add_filter( 'login_headerurl', 'custom_loginlogo_url' );
 function custom_loginlogo_url($url) {
 	return 'http://www.plottcreative.co.uk';
 }
 // login logo
 function my_login_logo() { ?>
     <style type="text/css">
         body.login div#login h1 a {
             background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/library/images/logo-login.png);
             padding-bottom: 15px;
 			height: 74px;
 			width: auto;
 			background-size: 80% auto;
         }

     </style>
 <?php }
 add_action( 'login_enqueue_scripts', 'my_login_logo' );

// add 'praet' body class
add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
    $classes[] = 'praet';
    return $classes;
}



// thumbnails to wordpress custom post type admin
if (function_exists('add_theme_support'))
{
    add_filter('manage_posts_columns', 'dj_postsColumns', 5);
    add_filter('manage_pages_columns', 'dj_postsColumns', 5);

    add_action('manage_posts_custom_column', 'dj_postsCustomColumn', 5, 2);
    add_action('manage_pages_custom_column', 'dj_postsCustomColumn', 5, 2);
}
function dj_postsColumns($columns)
{
    $columns['dj_post_thumbnail'] = __('Thumbs');
    return ($columns);
}
function dj_postsCustomColumn($column_name, $id)
{
    if ($column_name === 'dj_post_thumbnail')
        echo the_post_thumbnail(array(125, 80));
}

// Excerpt for pages
	add_action('init', 'my_custom_init');

	function my_custom_init() {
		add_post_type_support( 'page', 'excerpt' );
	}

// Improving the excerpt - http://aaronrussell.co.uk/legacy/improving-wordpress-the_excerpt/
function improved_trim_excerpt($text) {
        global $post;
        if ( '' == $text ) {
                $text = get_the_content('');
                $text = apply_filters('the_content', $text);
                $text = str_replace('\]\]\>', ']]&gt;', $text);
                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
                $text = strip_tags($text);
                $excerpt_length = 40;
                $words = explode(' ', $text, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                        array_pop($words);
                        array_push($words, '<a class="readmore" href="'. get_permalink($post->ID) . '">' . '[...]' . '</a>');
                        $text = implode(' ', $words);
                }
        }
        return $text;
}

//$text = strip_tags($text, '<p>');

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');
// end



// remove comments from media attachments
function filter_media_comment_status( $open, $post_id ) {
$post = get_post( $post_id );
if( $post->post_type == 'attachment' ) {
return false;
}
return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );


function _category_dropdown_filter( $cat_args ) {
        $cat_args['show_option_none'] = __('Select Category');
        return $cat_args;
}
add_filter( 'widget_categories_dropdown_args', '_category_dropdown_filter' );

// cf7 ajax spinner
function my_wpcf7_ajax_loader () {
    return  get_stylesheet_directory_uri() . '/library/images/spinner.png';
}
add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');

//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

// show category under blog in archive
function user_the_categories() {
    // get all categories for this post
    global $cats;
    $cats = get_the_category();
    // echo the first category
    echo $cats[0]->cat_name;
    // echo the remaining categories, appending separator
    for ($i = 1; $i < count($cats); $i++) {echo ', ' . $cats[$i]->cat_name ;}
}
?>
