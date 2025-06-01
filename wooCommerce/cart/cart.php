<?php defined('ABSPATH') || exit; ?>

<div class="container py-5">
  <div class="card shadow-sm p-4">
    <h1 class="mb-4 text-center"><?php esc_html_e('Shopping Cart', 'woocommerce'); ?></h1>
    <?php wc_get_template_part('cart/cart'); ?>
  </div>
</div>
