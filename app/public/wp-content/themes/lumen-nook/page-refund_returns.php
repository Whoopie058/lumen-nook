<?php get_header(); ?>
<main class="lumen-woocommerce-page lumen-policy-page">
    <div class="lumen-woocommerce-shell">
        <p class="shop-eyebrow">Lumen Nook / Customer care</p>
        <h1 class="lumen-woocommerce-title"><?php the_title(); ?></h1>
        <article class="lumen-policy-content">
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
            ?>
        </article>
    </div>
</main>
<?php get_footer(); ?>
