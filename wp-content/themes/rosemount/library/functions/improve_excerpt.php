<?
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

// DEFTAULT CONTENT IN EXCERPT - ALSO WORKS FOR 'default_title' & 'default_content'
// add_filter( 'default_excerpt', 't5_preset_editor_excerpt', 10, 2 );

/**
 * Fills the default content for post type 'post' if it is not empty.
 *
 * @param string $content
 * @param object $post
 * @return string
 */


// function t5_preset_editor_excerpt( $content, $post )
// {
//     if ( '' !== $content or 'post' !== $post->post_type )
//     {
//         return $content;
//     }
//
//     return 'visit Christian Vision www.cv.org.uk';
// }
?>
