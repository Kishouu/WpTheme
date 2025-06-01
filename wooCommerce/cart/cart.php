<?php
defined( 'ABSPATH' ) || exit;
?>

<form class="woocommerce-cart-form container my-5" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <?php do_action( 'woocommerce_before_cart_table' ); ?>

    <table class="shop_table shop_table_responsive cart table table-bordered align-middle">
        <thead class="thead-light">
            <tr>
                <th class="product-remove">&nbsp;</th>
                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
                <th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
                <th class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
                <th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php do_action( 'woocommerce_before_cart_contents' ); ?>

            <?php
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product   = $cart_item['data'];
                $product_id = $cart_item['product_id'];

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) {
                    $product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';
                    ?>
                    <tr class="woocommerce-cart-form__cart-item">
                        <td class="product-remove text-center">
                            <?php
                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                    '<a href="%s" class="remove text-danger" aria-label="%s" data-product_id="%s" data-cart_item_key="%s">&times;</a>',
                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                    __( 'Remove this item', 'woocommerce' ),
                                    esc_attr( $product_id ),
                                    esc_attr( $cart_item_key )
                                ), $cart_item_key );
                            ?>
                        </td>

                        <td class="product-thumbnail text-center">
                            <?php
                            $thumbnail = $_product->get_image( 'thumbnail' );
                            if ( ! $product_permalink ) {
                                echo $thumbnail;
                            } else {
                                printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                            }
                            ?>
                        </td>

                        <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                            <?php
                            if ( ! $product_permalink ) {
                                echo wp_kses_post( $_product->get_name() );
                            } else {
                                echo wp_kses_post( sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ) );
                            }
                            ?>
                        </td>

                        <td class="product-price text-center" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                            <?php echo WC()->cart->get_product_price( $_product ); ?>
                        </td>

                        <td class="product-quantity text-center" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                            <?php
                                if ( $_product->is_sold_individually() ) {
                                    $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                } else {
                                    $product_quantity = woocommerce_quantity_input( array(
                                        'input_name'   => "cart[{$cart_item_key}][qty]",
                                        'input_value'  => $cart_item['quantity'],
                                        'max_value'    => $_product->get_max_purchase_quantity(),
                                        'min_value'    => '0',
                                        'product_name' => $_product->get_name(),
                                    ), $_product, false );
                                }
                                echo $product_quantity;
                            ?>
                        </td>

                        <td class="product-subtotal text-center" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
                            <?php echo WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ); ?>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>

            <?php do_action( 'woocommerce_cart_contents' ); ?>

            <tr>
                <td colspan="6" class="actions">
                    <?php if ( wc_coupons_enabled() ) { ?>
                        <div class="coupon mb-3">
                            <label for="coupon_code" class="me-2"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label>
                            <input type="text" name="coupon_code" class="input-text form-control d-inline-block w-auto" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" />
                            <button type="submit" class="btn btn-outline-dark ms-2" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
                        </div>
                    <?php } ?>

                    <button type="submit" class="btn btn-primary me-2" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
                    <?php do_action( 'woocommerce_cart_actions' ); ?>
                    <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                </td>
            </tr>

            <?php do_action( 'woocommerce_after_cart_contents' ); ?>
        </tbody>
    </table>

    <?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>
