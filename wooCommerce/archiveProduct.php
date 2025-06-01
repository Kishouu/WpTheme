<?php
defined('ABSPATH') || exit;

get_header('shop'); ?>

<main class="site-main container py-5">
  <h1 class="text-center mb-5"><?php woocommerce_page_title(); ?></h1>

  <?php if (woocommerce_product_loop()) : ?>
    <div class="row g-4">
      <?php woocommerce_product_loop_start(); ?>

      <?php while (have_posts()) : the_post();
        wc_get_template_part('content', 'product');
      endwhile; ?>

      <?php woocommerce_product_loop_end(); ?>
    </div>

    <div class="mt-4 text-center">
      <?php do_action('woocommerce_after_shop_loop'); ?>
    </div>

  <?php else : ?>
    <?php do_action('woocommerce_no_products_found'); ?>
  <?php endif; ?>
</main>

<?php get_footer('shop'); ?>
