<?
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
 return 'http://www.plottcreative.co.uk';
}
// login logo
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
          background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/library/images/login-logo.png);
          padding-bottom: 15px;
          height: 150px;
          width: auto;
          background-size: auto 100%;;
          margin: 0;
        }

        .login form {
          margin-top: 0 !important;
        }

    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/library/css/login-styles.css" />';
}
add_action('login_head', 'my_custom_login');
?>
