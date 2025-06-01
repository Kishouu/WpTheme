<?php defined('ABSPATH') || exit;
get_header( 'shop' ); ?>

<main class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="mb-4 text-center"><?php esc_html_e( 'Shop', 'woocommerce' ); ?></h1>
            <?php wc_get_template_part( 'content', 'product' ); ?>
        </div>
    </div>
</main>

<?php
get_footer( 'shop' );
?>
