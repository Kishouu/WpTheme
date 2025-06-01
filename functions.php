<?php
// Load additional theme files
require get_template_directory() . '/inc/templateTags.php';
require get_template_directory() . '/inc/customizer.php';

/**
 * Enqueue theme styles and scripts
 */
function my_theme_scripts() {
    // Version based on theme stylesheet modification time (cache busting)
    $theme_version = filemtime(get_template_directory() . '/style.css');

    // Enqueue Bootstrap CSS from CDN
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
        array(),
        null
    );

    // Enqueue main theme stylesheet with dependency on Bootstrap CSS
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri(),
        array('bootstrap-css'),
        $theme_version
    );

    // Enqueue Bootstrap JS bundle with dependency on jQuery
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
        array('jquery'),
        null,
        true
    );

    // Enqueue custom theme JS (update version to cache bust on file change)
    $script_version = filemtime(get_template_directory() . '/assets/js/script.js');
    wp_enqueue_script(
        'theme-js',
        get_template_directory_uri() . '/assets/js/script.js',
        array('jquery'),
        $script_version,
        true
    );
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

/**
 * Theme setup — add support for various WordPress features
 */
function my_theme_setup() {
    add_theme_support('title-tag'); // Manage document title
    add_theme_support('post-thumbnails'); // Enable featured images
    add_theme_support('woocommerce'); // WooCommerce support

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ));

    // Custom logo support with flexible dimensions
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register primary navigation menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'my-custom-theme'),
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

/**
 * Register widget areas
 */
function my_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'my-custom-theme'),
        'id'            => 'sidebar-1',
        'description'   => __('Main Sidebar', 'my-custom-theme'),
        'before_widget' => '<div class="widget mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title mb-2">',
        'after_title'   => '</h5>',
    ));
}
add_action('widgets_init', 'my_widgets_init');


