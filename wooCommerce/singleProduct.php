<?php
defined('ABSPATH') || exit;
get_header(); ?>

<main class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <?php
      while (have_posts()) :
        the_post();
        wc_get_template_part('content', 'single-product');
      endwhile;
      ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
