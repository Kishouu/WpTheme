<?php

// Include additional theme files
require get_template_directory() . '/inc/templateTags.php';
require get_template_directory() . '/inc/customizer.php';

// Enqueue styles and scripts
function my_theme_scripts() {
    // Get version based on file change time for cache busting during development
    $theme_version = filemtime(get_template_directory() . '/main.css');

    // Styles
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap-css'), $theme_version);

    // Scripts
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('theme-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

// Theme setup
function my_theme_setup() {
    // Document title tag
    add_theme_support('title-tag');

    // Post thumbnails
    add_theme_support('post-thumbnails');

    // WooCommerce support
    add_theme_support('woocommerce');

    // HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ));

    // Custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Navigation menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'my-custom-theme'),
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

// Register widget area
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

// Optional: WooCommerce tweaks - disable default styles
add_filter('woocommerce_enqueue_styles', '__return_false');
