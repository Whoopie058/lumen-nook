<?php
get_header();

$category_labels = array(
    'GPUs' => 'gpus',
    'CPUs' => 'cpus',
    'PC cases' => 'pc-cases',
    'Keyboards' => 'keyboards',
    'Gaming setups' => 'gaming-setups',
);
$products = function_exists('wc_get_products') ? wc_get_products(array(
    'status' => 'publish',
    'limit' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
)) : array();
$zero_price = function_exists('wc_price') ? wc_price(0) : '0 kr.';
$checkout_url = function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : home_url('/checkout/');
?>

<main class="gear-main">
    <section class="shop-intro" aria-labelledby="shop-title">
        <p class="shop-eyebrow">Lumen Nook / Curated hardware</p>
        <h1 id="shop-title">Build your<br><span>perfect nook.</span></h1>
        <p>Thoughtful components and complete setups for late-night ideas, bright wins, and everything in between.</p>
    </section>

    <section class="shop-layout" aria-label="Gear shop">
        <div class="shop-catalog">
            <div class="shop-toolbar">
                <div class="category-filters" role="group" aria-label="Filter by category">
                    <button class="filter-button is-active" type="button" data-category="all">All gear</button>
                    <?php foreach ($category_labels as $label => $fallback_slug) :
                        $term = get_term_by('name', $label, 'product_cat');
                        $slug = $term ? $term->slug : $fallback_slug;
                        ?>
                        <button class="filter-button" type="button" data-category="<?php echo esc_attr($slug); ?>"><?php echo esc_html($label); ?></button>
                    <?php endforeach; ?>
                </div>
                <p class="result-count" aria-live="polite"></p>
            </div>

            <div class="product-grid">
                <?php foreach ($products as $product) :
                    $categories = get_the_terms($product->get_id(), 'product_cat');
                    $category_slugs = array();
                    $category_label = 'Gear';
                    if ($categories && !is_wp_error($categories)) {
                        $category_slugs = wp_list_pluck($categories, 'slug');
                        $category_label = $categories[0]->name;
                    }
                    $brand = $product->get_attribute('brand');
                    $brand = $brand ? $brand : $category_label;
                    $badge = $product->is_on_sale() ? 'Limited' : ($product->is_featured() ? 'Bestseller' : '');
                    $image = wp_get_attachment_image_url($product->get_image_id(), 'woocommerce_thumbnail');
                    ?>
                    <article class="product-card" data-category="<?php echo esc_attr(wp_json_encode($category_slugs)); ?>" data-name="<?php echo esc_attr($product->get_name()); ?>">
                        <div class="product-image-wrap">
                            <?php if ($image) : ?>
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($product->get_image_id() ? get_post_meta($product->get_image_id(), '_wp_attachment_image_alt', true) : $product->get_name()); ?>" class="product-image" loading="lazy" decoding="async">
                            <?php else : ?>
                                <div class="product-image-placeholder" aria-hidden="true">Lumen Nook</div>
                            <?php endif; ?>
                            <?php if ($badge) : ?><span class="product-badge<?php echo 'Limited' === $badge ? ' product-badge-pink' : ''; ?>"><?php echo esc_html($badge); ?></span><?php endif; ?>
                        </div>
                        <div class="product-card-content">
                            <p class="product-category"><?php echo esc_html($category_label . ' / ' . $brand); ?></p>
                            <h3><?php echo esc_html($product->get_name()); ?></h3>
                            <div class="product-card-footer">
                                <strong><?php echo wp_kses_post(wc_price($product->get_price())); ?></strong>
                                <?php if ($product->is_purchasable() && $product->is_in_stock()) : ?>
                                    <button class="add-to-basket" type="button" data-product="<?php echo esc_attr($product->get_id()); ?>">Add to Basket</button>
                                <?php else : ?>
                                    <span class="product-unavailable"><?php echo esc_html($product->is_in_stock() ? 'Unavailable' : 'Out of stock'); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            <p class="no-results"<?php echo $products ? ' hidden' : ''; ?>>No gear matches that search. Try another category or phrase.</p>
        </div>

        <aside class="basket-panel" id="basket-panel" aria-label="Your basket">
            <div class="basket-heading">
                <div><p class="shop-eyebrow">Your selection</p><h2>Your basket</h2></div>
                <button class="basket-close" type="button" aria-label="Close basket">×</button>
            </div>
            <div class="basket-items"><p class="basket-empty">Your basket is waiting for its first upgrade.</p></div>
            <div class="basket-summary">
                <div><span>Subtotal</span><strong class="basket-total"><?php echo wp_kses_post($zero_price); ?></strong></div>
                <a class="checkout-button" href="<?php echo esc_url($checkout_url); ?>">Checkout <span aria-hidden="true">→</span></a>
                <p class="checkout-note">Secure checkout powered by WooCommerce.</p>
            </div>
        </aside>
    </section>
</main>

<?php get_footer(); ?>
