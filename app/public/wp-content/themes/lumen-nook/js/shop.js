(() => {
    const config = window.lumenNookShop;
    const basketItems = document.querySelector(".basket-items");
    const basketTotal = document.querySelector(".basket-total");
    const basketCount = document.querySelector(".basket-count");
    const formatter = new Intl.NumberFormat("da-DK", { maximumFractionDigits: 2 });
    let cart = { items: [], count: 0, subtotal: 0 };

    if (!config || !config.ajaxUrl || !basketItems) return;

    const formatPrice = (value) => `${formatter.format(value)} kr.`;
    const request = async (data) => {
        const body = new URLSearchParams({ nonce: config.nonce, ...data });
        const response = await fetch(config.ajaxUrl, { method: "POST", headers: { "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8" }, body });
        const result = await response.json();
        if (!result.success) throw new Error(result.data?.message || "The basket could not be updated.");
        return result.data;
    };
    const renderBasket = () => {
        basketCount.textContent = cart.count;
        basketTotal.textContent = formatPrice(cart.subtotal);
        basketItems.replaceChildren();
        if (!cart.items.length) {
            const empty = document.createElement("p");
            empty.className = "basket-empty";
            empty.textContent = "Your basket is waiting for its first upgrade.";
            basketItems.appendChild(empty);
            return;
        }
        cart.items.forEach((item) => {
            const row = document.createElement("div");
            row.className = "basket-item";
            row.innerHTML = `<div><strong></strong><span></span></div><div class="quantity-control"><button type="button" data-action="decrease" aria-label="Decrease quantity">−</button><span></span><button type="button" data-action="increase" aria-label="Increase quantity">+</button></div><button class="remove-item" type="button" data-action="remove">Remove</button>`;
            row.dataset.key = item.key;
            row.querySelector("strong").textContent = item.name;
            row.querySelector("div > span").textContent = `${formatPrice(item.price)} each`;
            row.querySelector(".quantity-control span").textContent = item.quantity;
            basketItems.appendChild(row);
        });
    };
    const updateCart = async (data, button) => {
        if (button) button.disabled = true;
        try {
            cart = await request(data);
            renderBasket();
            if (button) {
                const original = button.textContent;
                button.textContent = "Added";
                setTimeout(() => { button.textContent = original; button.disabled = false; }, 900);
            }
        } catch (error) {
            if (button) button.disabled = false;
            window.alert(error.message);
        }
    };

    document.querySelectorAll(".add-to-basket").forEach((button) => {
        button.addEventListener("click", () => updateCart({ cart_action: "add", product_id: button.dataset.product }, button));
    });
    basketItems.addEventListener("click", (event) => {
        const button = event.target.closest("button[data-action]");
        if (!button) return;
        const row = button.closest(".basket-item");
        const item = cart.items.find((entry) => entry.key === row.dataset.key);
        if (!item) return;
        if (button.dataset.action === "remove") {
            updateCart({ cart_action: "remove", cart_item_key: item.key });
        } else if (button.dataset.action === "increase" || item.quantity > 1) {
            updateCart({ cart_action: "update", cart_item_key: item.key, quantity: Math.max(1, item.quantity + (button.dataset.action === "increase" ? 1 : -1)) });
        } else {
            updateCart({ cart_action: "remove", cart_item_key: item.key });
        }
    });

    const basketPanel = document.querySelector(".basket-panel");
    const basketToggle = document.querySelector(".basket-toggle");
    basketToggle.addEventListener("click", () => {
        const isOpen = basketPanel.classList.toggle("is-open");
        basketToggle.setAttribute("aria-expanded", isOpen);
    });
    document.querySelector(".basket-close").addEventListener("click", () => {
        basketPanel.classList.remove("is-open");
        basketToggle.setAttribute("aria-expanded", "false");
    });

    const filterButtons = document.querySelectorAll(".filter-button");
    const applyFilters = () => {
        const category = document.querySelector(".filter-button.is-active").dataset.category;
        const search = document.querySelector("#shop-search").value.trim().toLowerCase();
        let visible = 0;
        document.querySelectorAll(".product-card").forEach((card) => {
            const categories = JSON.parse(card.dataset.category || "[]");
            const matches = (category === "all" || categories.includes(category)) && card.dataset.name.toLowerCase().includes(search);
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
    request({ cart_action: "get" }).then((data) => { cart = data; renderBasket(); }).catch(() => renderBasket());
    applyFilters();
})();
