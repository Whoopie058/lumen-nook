<?php get_header(); ?>
<main class="lumen-woocommerce-page lumen-checkout-page">
    <div class="lumen-woocommerce-shell">
        <p class="shop-eyebrow">Lumen Nook / Secure checkout</p>
        <h1 class="lumen-woocommerce-title">Complete your order</h1>
        <?php echo do_shortcode('[woocommerce_checkout]'); ?>
    </div>
</main>
<?php get_footer(); ?>