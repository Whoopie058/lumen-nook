<?php get_header(); ?>
<main class="lumen-woocommerce-page lumen-cart-page">
    <div class="lumen-woocommerce-shell">
        <p class="shop-eyebrow">Lumen Nook / Your selection</p>
        <h1 class="lumen-woocommerce-title">Your cart</h1>
        <?php echo do_shortcode('[woocommerce_cart]'); ?>
    </div>
</main>
<?php get_footer(); ?>