<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div class="container"></div>

<!-- Navigation -->

<nav class="navigation fixed">

    <div class="menu-container">

        <a
            class="logo-link"
            href="<?php echo esc_url(home_url('/')); ?>"
        >

            <img
                src="<?php echo esc_url(get_template_directory_uri()); ?>/img/LumenNookLogo.png"
                alt="Lumen Nook Logo"
                class="logo"
            >

        </a>

        <div class="logo-text">

            <a
                class="logo-text-link"
                href="<?php echo esc_url(home_url('/')); ?>"
            >
                Lumen Nook
            </a>

        </div>

    </div>


    <div class="nav-actions">

        <?php $is_shop_page = is_page('gear') || (function_exists('is_shop') && is_shop()); ?>

        <form
            class="nav-search"
            role="search"
            method="get"
            action="<?php echo esc_url(home_url('/')); ?>"
        >

            <input
                class="search-bar"
                type="search"
                name="s"
                placeholder="Search"
                aria-label="Search"
                <?php if ($is_shop_page) : ?>id="shop-search"<?php endif; ?>
            >

        </form>

        <?php if ($is_shop_page) : ?>
            <button class="basket-toggle" type="button" aria-controls="basket-panel" aria-expanded="false">
                <span class="basket-icon" aria-hidden="true">⌑</span>
                <span>Basket</span>
                <span class="basket-count" aria-live="polite">0</span>
            </button>
        <?php endif; ?>

        <details class="dropdown-menu">

            <summary>
                <span class="menu-label">Menu</span>
                <span class="menu-icon" aria-hidden="true"><span></span><span></span><span></span></span>
            </summary>

            <div class="dropdown-content">
                <?php
                $navigation_pages = array(
                    array('Home', home_url('/'), is_front_page()),
                    array('About Us', get_permalink(get_page_by_path('about-us')), is_page('about-us')),
                    array('Blogs', get_permalink(get_page_by_path('blogs')), is_page('blogs') || is_singular('post')),
                    array('Shop Gear', get_permalink(get_page_by_path('gear')), is_page('gear')),
                    array('Inspiration', get_permalink(get_page_by_path('inspiration')), is_page('inspiration')),
                    array('Sustainability Initiatives', get_permalink(get_page_by_path('sustainability-initiatives')), is_page('sustainability-initiatives')),
                    array('Login', get_permalink(get_page_by_path('login')), is_page('login'))
                );
                foreach ($navigation_pages as $navigation_page) :
                    if (!$navigation_page[1]) {
                        continue;
                    }
                    ?>
                    <a class="dropdown-link<?php echo $navigation_page[2] ? ' is-active' : ''; ?>" href="<?php echo esc_url($navigation_page[1]); ?>"<?php echo $navigation_page[2] ? ' aria-current="page"' : ''; ?>>
                        <span><?php echo esc_html($navigation_page[0]); ?></span>
                        <span class="dropdown-arrow" aria-hidden="true">→</span>
                    </a>
                <?php endforeach; ?>

            </div>

        </details>

    </div>

</nav>