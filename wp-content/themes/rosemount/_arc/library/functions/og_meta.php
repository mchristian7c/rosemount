<?php function fb_opengraph() {
    global $post;

        if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_url(get_post_thumbnail_id( $post->ID ), 'full');
        } else {
            // $img_src = get_stylesheet_directory_uri() . '/img/opengraph_image.jpg';
        }
        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
        ?>

    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src; ?>"/>

    <meta property="twitter:title" content="<?php echo the_title(); ?>"/>
    <meta property="twitter:description" content="<?php echo $excerpt; ?>"/>
    <meta property="twitter:type" content="article"/>
    <meta property="twitter:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="twitter:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="twitter:image" content="<?php echo $img_src; ?>"/>
    <meta name="twitter:card" content="summary_large_image">
    <!--  Non-Essential, But Recommended -->
		<meta name="twitter:image:alt" content="home image">

<?php

}
add_action('wp_head', 'fb_opengraph', 5);

?>
