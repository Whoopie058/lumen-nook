<?php
/*
 * Use the custom catalog only for the WooCommerce Shop archive. Individual
 * products must continue through WooCommerce's single-product template.
 */
if (function_exists('is_shop') && is_shop()) {
    require get_theme_file_path('page-gear.php');
    return;
}

get_header();
?>
<main class="lumen-woocommerce-page lumen-product-page">
    <div class="lumen-woocommerce-shell">
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php
get_footer();