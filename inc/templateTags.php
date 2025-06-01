<?php
/**
 * Custom template tags for this theme
 *
 * @package My_Custom_Theme
 */

// Display post date and author
function my_custom_theme_posted_on() {
    echo '<span class="posted-on">Posted on ' . get_the_date() . '</span>';
    echo '<span class="byline"> by ' . get_the_author() . '</span>';
}

// Display post categories and tags
function my_custom_theme_entry_footer() {
    if ('post' === get_post_type()) {
        $categories_list = get_the_category_list(', ');
        if ($categories_list) {
            echo '<span class="cat-links">Posted in ' . $categories_list . '</span>';
        }

        $tags_list = get_the_tag_list('', ', ');
        if ($tags_list) {
            echo '<span class="tags-links">Tagged ' . $tags_list . '</span>';
        }
    }
}
?>
