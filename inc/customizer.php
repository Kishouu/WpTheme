<?php
/**
 * Theme Customizer enhancements for this theme
 *
 * @package My_Custom_Theme
 */

function my_custom_theme_customize_register($wp_customize) {
    // Add a setting for theme mode toggle
    $wp_customize->add_section('theme_settings', array(
        'title' => __('Theme Settings', 'my-custom-theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('enable_dark_mode', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('enable_dark_mode', array(
        'label' => __('Enable Dark Mode Toggle', 'my-custom-theme'),
        'section' => 'theme_settings',
        'type' => 'checkbox',
    ));
}
add_action('customize_register', 'my_custom_theme_customize_register');
?>
