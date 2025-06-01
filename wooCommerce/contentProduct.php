<li <?php wc_product_class('col-md-4 col-sm-6 mb-4', $product); ?>>
  <div class="card h-100 shadow-sm border-0">
    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
      <?php woocommerce_show_product_loop_sale_flash(); ?>
      <?php woocommerce_template_loop_product_thumbnail(); ?>
    </a>
    <div class="card-body d-flex flex-column justify-content-between">
      <h5 class="card-title text-center"><?php the_title(); ?></h5>
      <div class="price text-center mb-3"><?php woocommerce_template_loop_price(); ?></div>
      <div class="text-center">
        <?php woocommerce_template_loop_add_to_cart(); ?>
      </div>
    </div>
  </div>
</li>
