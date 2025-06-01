<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<main id="primary" class="site-main container py-5">
    <?php if ( woocommerce_product_loop() ) : ?>
        <div class="row gx-4 gy-5">
            <?php woocommerce_product_loop_start(); ?>

            <?php if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                    the_post();
                    // Each product CARD
                    ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div <?php wc_product_class( 'card h-100 shadow-sm', $product ); ?>>
                            <a href="<?php the_permalink(); ?>" class="position-relative">
                                <?php woocommerce_show_product_loop_sale_flash(); ?>
                                <?php woocommerce_template_loop_product_thumbnail(); ?>
                            </a>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-3">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none text-reset">
                                        <?php the_title(); ?>
                                    </a>
                                </h5>
                                <div class="mb-3">
                                    <?php woocommerce_template_loop_price(); ?>
                                </div>
                                <?php woocommerce_template_loop_add_to_cart(); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } ?>

            <?php woocommerce_product_loop_end(); ?>
        </div>

        <div class="woocommerce-pagination mt-5">
            <?php do_action( 'woocommerce_after_shop_loop' ); ?>
        </div>
    <?php else : ?>
        <?php do_action( 'woocommerce_no_products_found' ); ?>
    <?php endif; ?>
</main>

<?php
get_footer( 'shop' );
?>
