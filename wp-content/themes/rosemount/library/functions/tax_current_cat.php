<?php

function tax_cat_active($output, $args) {
    if (is_single()) {
        global $post;
        $terms = get_the_terms($post->ID, 'category');
        if (!empty($terms)) {
            foreach( $terms as $term )
                if ( preg_match( '#cat-item-' . $term ->term_id . '#', $output ) )
                    $output = str_replace('cat-item-'.$term ->term_id, 'cat-item-'.$term ->term_id . ' current-cat', $output);
        }
    }
    return $output;
}
add_filter('wp_list_categories', 'tax_cat_active', 10, 2);