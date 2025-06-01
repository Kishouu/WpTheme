<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="light">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header" class="site-header sticky-top shadow-sm py-3 border-bottom">
  <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">
    
    <!-- Site Branding -->
    <div class="site-branding">
      <?php
      if (has_custom_logo()) {
          the_custom_logo();
      } else {
          echo '<a class="navbar-brand site-title fw-bold text-decoration-none me-4" href="' . esc_url(home_url('/')) . '">';
          bloginfo('name');
          echo '</a>';
      }
      ?>
    </div>

    <!-- Navigation Menu -->
    <nav class="main-navigation">
      <?php
      wp_nav_menu(array(
          'theme_location' => 'primary',
          'menu_class'     => 'navbar-nav d-flex flex-row gap-4 mb-0 list-unstyled main-menu',
          'container'      => false,
      ));
      ?>
    </nav>

    <!-- Search Form (inline) -->
    <div class="site-search">
      <?php get_search_form(); ?>
    </div>

<div class="form-check form-switch ms-3 d-flex align-items-center">
  <input class="form-check-input me-2" type="checkbox" id="theme-switch" aria-label="Toggle dark mode">
  <label class="form-check-label" for="theme-switch">DarkMode</label>
</div>

</header>

<main id="main" class="site-main py-4">
