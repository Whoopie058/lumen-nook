<?php
get_header();
$theme_uri = get_template_directory_uri();
$product_image_uri = $theme_uri . '/img/Products/optimized/';
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
                    <button class="filter-button" type="button" data-category="GPUs">GPUs</button>
                    <button class="filter-button" type="button" data-category="CPUs">CPUs</button>
                    <button class="filter-button" type="button" data-category="PC cases">PC cases</button>
                    <button class="filter-button" type="button" data-category="Keyboards">Keyboards</button>
                    <button class="filter-button" type="button" data-category="Gaming setups">Gaming setups</button>
                </div>
                <p class="result-count" aria-live="polite"></p>
            </div>
            <div class="product-grid">
                <?php
                $products = array(
                    array('vexora-gx90', 'GPUs', 'Vexora', 'Warden GX90', '7.499', '7499', 'Vexora-Warden-GX90.jpg', 'Vexora Warden GX90 graphics card', 'Bestseller'),
                    array('vexora-doom', 'GPUs', 'Vexora', 'Warden GX90 Doom Edition', '8.299', '8299', 'Vexora-Warden-GX90-Doom-Edition.jpg', 'Vexora Warden GX90 Doom Edition graphics card', 'Limited'),
                    array('syntrix-r7', 'CPUs', 'Syntrix', 'Ryzenova R7 370', '2.199', '2199', 'Syntrix-Ryzenova-R7-370.jpg', 'Syntrix Ryzenova R7 370 processor', ''),
                    array('veltrix-i9', 'CPUs', 'Veltrix', 'CoreMax i9 900', '3.199', '3199', 'Veltrix-CoreMax-i9-900.jpg', 'Veltrix CoreMax i9 900 processor', ''),
                    array('arclume-t4', 'PC cases', 'Arclume', 'Frostline T4', '1.299', '1299', 'Arclume-Frostline-T4.jpg', 'Arclume Frostline T4 PC case', ''),
                    array('nexalis-glacier', 'PC cases', 'Nexalis', 'Glacier X7', '1.699', '1699', 'Nexalis-Glacier-X7.jpg', 'Nexalis Glacier X7 PC case', ''),
                    array('nexalis-halo', 'Gaming setups', 'Nexalis', 'Halo X9', '14.999', '14999', 'Nexalis-Halo-X9.jpg', 'Nexalis Halo X9 gaming setup', 'Ready to play'),
                    array('keyvora-ember', 'Keyboards', 'Keyvora', 'Ember 75', '899', '899', 'Keyvora-Ember-75.jpg', 'Keyvora Ember 75 keyboard', ''),
                    array('keyvora-slate', 'Keyboards', 'Keyvora', 'Slate TKL', '799', '799', 'Keyvora-Slate-TKL.jpg', 'Keyvora Slate TKL keyboard', '')
                );
                foreach ($products as $product) :
                    ?>
                    <article class="product-card" data-category="<?php echo esc_attr($product[1]); ?>" data-name="<?php echo esc_attr($product[2] . ' ' . $product[3]); ?>" data-price="<?php echo esc_attr($product[5]); ?>">
                        <div class="product-image-wrap">
                            <img src="<?php echo esc_url($product_image_uri . $product[6]); ?>" alt="<?php echo esc_attr($product[7]); ?>" class="product-image" loading="lazy" decoding="async">
                            <?php if ($product[8]) : ?><span class="product-badge<?php echo $product[8] === 'Limited' ? ' product-badge-pink' : ''; ?>"><?php echo esc_html($product[8]); ?></span><?php endif; ?>
                        </div>
                        <div class="product-card-content">
                            <p class="product-category"><?php echo esc_html(rtrim($product[1], 's') . ' / ' . $product[2]); ?></p>
                            <h3><?php echo esc_html($product[3]); ?></h3>
                            <div class="product-card-footer">
                                <strong><?php echo esc_html($product[4]); ?> kr.</strong>
                                <button class="add-to-basket" type="button" data-product="<?php echo esc_attr($product[0]); ?>">Add to Basket</button>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            <p class="no-results" hidden>No gear matches that search. Try another category or phrase.</p>
        </div>

        <aside class="basket-panel" id="basket-panel" aria-label="Your basket">
            <div class="basket-heading">
                <div><p class="shop-eyebrow">Your selection</p><h2>Your basket</h2></div>
                <button class="basket-close" type="button" aria-label="Close basket">×</button>
            </div>
            <div class="basket-items"><p class="basket-empty">Your basket is waiting for its first upgrade.</p></div>
            <div class="basket-summary">
                <div><span>Subtotal</span><strong class="basket-total">0 kr.</strong></div>
                <button class="checkout-button" type="button">Checkout <span aria-hidden="true">→</span></button>
                <p class="checkout-note">Fictional shop · no payment required</p>
            </div>
        </aside>
    </section>
</main>

<script>
(() => {
    const products = [...document.querySelectorAll(".product-card")].reduce((map, card) => {
        const button = card.querySelector(".add-to-basket");
        map[button.dataset.product] = { id: button.dataset.product, name: card.dataset.name, price: Number(card.dataset.price) };
        return map;
    }, {});
    let basket = {};
    const formatter = new Intl.NumberFormat("da-DK", { maximumFractionDigits: 0 });
    const formatPrice = (value) => `${formatter.format(value)} kr.`;
    const basketItems = document.querySelector(".basket-items");
    const basketTotal = document.querySelector(".basket-total");
    const basketCount = document.querySelector(".basket-count");
    const renderBasket = () => {
        const entries = Object.values(basket);
        basketCount.textContent = entries.reduce((sum, item) => sum + item.quantity, 0);
        basketTotal.textContent = formatPrice(entries.reduce((sum, item) => sum + item.price * item.quantity, 0));
        basketItems.replaceChildren();
        if (!entries.length) {
            const emptyMessage = document.createElement("p");
            emptyMessage.className = "basket-empty";
            emptyMessage.textContent = "Your basket is waiting for its first upgrade.";
            basketItems.appendChild(emptyMessage);
            return;
        }
        entries.forEach((item) => {
            const basketItem = document.createElement("div");
            basketItem.className = "basket-item";
            const productDetails = document.createElement("div");
            const productName = document.createElement("strong");
            productName.textContent = item.name;
            const productPrice = document.createElement("span");
            productPrice.textContent = `${formatPrice(item.price)} each`;
            productDetails.append(productName, productPrice);
            const quantityControl = document.createElement("div");
            quantityControl.className = "quantity-control";
            const decreaseButton = document.createElement("button");
            decreaseButton.type = "button";
            decreaseButton.dataset.action = "decrease";
            decreaseButton.dataset.product = item.id;
            decreaseButton.setAttribute("aria-label", `Decrease ${item.name} quantity`);
            decreaseButton.textContent = "−";
            const quantity = document.createElement("span");
            quantity.textContent = item.quantity;
            const increaseButton = document.createElement("button");
            increaseButton.type = "button";
            increaseButton.dataset.action = "increase";
            increaseButton.dataset.product = item.id;
            increaseButton.setAttribute("aria-label", `Increase ${item.name} quantity`);
            increaseButton.textContent = "+";
            quantityControl.append(decreaseButton, quantity, increaseButton);
            const removeButton = document.createElement("button");
            removeButton.className = "remove-item";
            removeButton.type = "button";
            removeButton.dataset.action = "remove";
            removeButton.dataset.product = item.id;
            removeButton.textContent = "Remove";
            basketItem.append(productDetails, quantityControl, removeButton);
            basketItems.appendChild(basketItem);
        });
    };
    const saveBasket = () => localStorage.setItem("lumen-nook-basket", JSON.stringify(basket));
    try { basket = JSON.parse(localStorage.getItem("lumen-nook-basket") || "{}"); } catch (error) { basket = {}; }
    Object.keys(basket).forEach((id) => {
        if (!products[id]) {
            delete basket[id];
            return;
        }
        basket[id] = {
            ...products[id],
            quantity: Number.isSafeInteger(basket[id].quantity) && basket[id].quantity > 0 ? basket[id].quantity : 1
        };
    });
    document.querySelectorAll(".add-to-basket").forEach((button) => button.addEventListener("click", () => {
        const product = products[button.dataset.product];
        basket[product.id] = { ...product, quantity: (basket[product.id]?.quantity || 0) + 1 };
        saveBasket();
        renderBasket();
        button.textContent = "Added";
        setTimeout(() => { button.textContent = "Add to Basket"; }, 900);
    }));
    basketItems.addEventListener("click", (event) => {
        const button = event.target.closest("button[data-product]");
        if (!button) return;
        const item = basket[button.dataset.product];
        if (button.dataset.action === "remove" || (button.dataset.action === "decrease" && item.quantity === 1)) delete basket[button.dataset.product];
        else item.quantity += button.dataset.action === "increase" ? 1 : -1;
        saveBasket();
        renderBasket();
    });
    const basketPanel = document.querySelector(".basket-panel");
    const basketToggle = document.querySelector(".basket-toggle");
    basketToggle.addEventListener("click", () => { const isOpen = basketPanel.classList.toggle("is-open"); basketToggle.setAttribute("aria-expanded", isOpen); });
    document.querySelector(".basket-close").addEventListener("click", () => { basketPanel.classList.remove("is-open"); basketToggle.setAttribute("aria-expanded", "false"); });
    document.querySelector(".checkout-button").addEventListener("click", () => alert("This is a fictional shop — checkout is not connected to a payment system."));
    const filterButtons = document.querySelectorAll(".filter-button");
    const applyFilters = () => {
        const category = document.querySelector(".filter-button.is-active").dataset.category;
        const search = document.querySelector("#shop-search").value.trim().toLowerCase();
        let visible = 0;
        document.querySelectorAll(".product-card").forEach((card) => {
            const matches = (category === "all" || card.dataset.category === category) && card.dataset.name.toLowerCase().includes(search);
            card.hidden = !matches;
            if (matches) visible++;
        });
        document.querySelector(".result-count").textContent = `${visible} ${visible === 1 ? "piece" : "pieces"} of gear`;
        document.querySelector(".no-results").hidden = visible !== 0;
    };
    filterButtons.forEach((button) => button.addEventListener("click", () => {
        filterButtons.forEach((item) => item.classList.remove("is-active"));
        button.classList.add("is-active");
        applyFilters();
    }));
    document.querySelector("#shop-search").addEventListener("input", applyFilters);
    renderBasket();
    applyFilters();
})();
</script>

<?php get_footer(); ?>
