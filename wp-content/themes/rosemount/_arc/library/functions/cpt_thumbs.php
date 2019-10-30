<?
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
?>
