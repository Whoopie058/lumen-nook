<?php get_header(); ?>


<main class="hero">

    <img
        class="hero-design hero-design-left"
        src="<?php echo esc_url(get_template_directory_uri()); ?>/img/Hexagon%20Design%20Left.png"
        alt=""
    >


    <div class="hero-content">

        <h2>
            Lumen Nook
        </h2>

        <h3>
            Your setup made simple
        </h3>


        <div class="hero-actions">

            <a
                class="hero-button"
                href="<?php echo esc_url(home_url('/gear/')); ?>"
            >
                Shop Gear
            </a>

            <a
                class="hero-button"
                href="<?php echo esc_url(home_url('/inspiration/')); ?>"
            >
                Inspiration
            </a>

        </div>

    </div>


    <img
        class="hero-design hero-design-right"
        src="<?php echo esc_url(get_template_directory_uri()); ?>/img/Hexagon%20Design%20Right.png"
        alt=""
    >


    <img
        class="hero-setup-image"
        src="<?php echo esc_url(get_template_directory_uri()); ?>/img/Long%20Setup%20Image%20Index.png"
        alt="Computer setup with a mountain view"
    >

</main>


<?php get_footer(); ?>