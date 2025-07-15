<?php
/**
 * The template for displaying the checkout page.
 *
 * This template uses a custom layout based on the design system,
 * replacing the default [woocommerce_checkout] shortcode for a more
 * integrated and styled experience.
 *
 * @package Mellluxe
 */

get_header(); ?>

<div id="primary" class="content-area checkout-page-container">
    <main id="main" class="site-main" role="main">

        <div class="checkout-layout-grid">
            <div class="checkout-main-column">
                <h1 class="checkout-title"><?php esc_html_e( 'Checkout', 'mellluxe' ); ?></h1>
                <p class="checkout-desc"><?php esc_html_e( 'Complete your order below. All fields are required unless marked optional.', 'mellluxe' ); ?></p>

                <div class="checkout-form-wrapper">
                    <?php
                    if ( function_exists( 'woocommerce_checkout_form' ) ) {
                        do_action( 'woocommerce_before_checkout_form' );
                        woocommerce_checkout_form();
                        do_action( 'woocommerce_after_checkout_form' );
                    } else {
                        echo '<p style="color:red;">WooCommerce is not active. Please activate WooCommerce to use the checkout page.</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="checkout-summary-column">
                <div class="summary-card">
                    <h2 class="summary-title"><?php esc_html_e( 'Order Summary', 'mellluxe' ); ?></h2>
                    <div class="order-review-section">
                        <?php if ( function_exists( 'woocommerce_checkout_order_review' ) ) { do_action( 'woocommerce_checkout_order_review' ); } ?>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?> 