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

        <h1 class="logo-text">

            <a
                class="logo-text-link"
                href="<?php echo esc_url(home_url('/')); ?>"
            >
                Lumen Nook
            </a>

        </h1>

    </div>


    <div class="nav-actions">

        <form
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
            >

        </form>


        <a class="blogs-tab" href="<?php echo esc_url(home_url('/gear/')); ?>">
            Shop gear
        </a>

        <a
            class="profile-tab"
            href="<?php echo esc_url(admin_url('profile.php')); ?>"
            aria-label="Profile"
        >

            <img
                src="<?php echo esc_url(get_template_directory_uri()); ?>/img/Profile.png"
                alt=""
                class="profile-image"
            >

        </a>

        <a class="blogs-tab" href="<?php echo esc_url(home_url('/blogs/')); ?>">
            Blogs
        </a>

        <details class="dropdown-menu">

            <summary>
                Menu
            </summary>

            <div class="dropdown-content">

                <?php

                wp_nav_menu(
                    array(
                        'theme_location' => 'primary-menu',
                        'container' => false
                    )
                );

                ?>

            </div>

        </details>

    </div>

</nav>