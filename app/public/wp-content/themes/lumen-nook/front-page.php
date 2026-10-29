<?php get_header(); ?>


<main class="hero">

    <img
        class="hero-design hero-design-left"
        src="<?php echo esc_url(get_template_directory_uri()); ?>/img/Hexagon%20Design%20Left.png"
        alt=""
    >


    <div class="hero-content">

        <h1>
            Lumen Nook
        </h1>

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

            <a
                class="hero-button"
                href="<?php echo esc_url(home_url('/blogs/')); ?>"
            >
                Blog
            </a>

        </div>

    </div>


    <img
        class="hero-design hero-design-right"
        src="<?php echo esc_url(get_template_directory_uri()); ?>/img/Hexagon%20Design%20Right.png"
        alt=""
    >

    <section class="halloween-sale" aria-labelledby="halloween-sale-heading">

        <img
            class="halloween-sale-image"
            src="<?php echo esc_url(get_template_directory_uri()); ?>/img/Lumen%20Nook%20Halloween%20Sales%20Scene.png"
            alt="Halloween-themed Lumen Nook setup"
        >

        <div class="halloween-sale-content">

            <p class="halloween-sale-label">Limited-time Halloween event</p>

            <h2 id="halloween-sale-heading">
                Trick out your setup
            </h2>

            <p>
                Give your gaming space a haunting upgrade. Discover spooky inspiration
                and special Halloween offers on selected gear.
            </p>

            <a
                class="hero-button halloween-sale-button"
                href="<?php echo esc_url(home_url('/gear/')); ?>"
            >
                Explore Halloween Deals <span aria-hidden="true">→</span>
            </a>

        </div>

    </section>


    <img
        class="hero-setup-image"
        src="<?php echo esc_url(get_template_directory_uri()); ?>/img/Long%20Setup%20Image%20Index.png"
        alt="Wide PC gaming and work setup with a mountain view"
    >

    <section class="homepage-cta" aria-labelledby="homepage-cta-heading">

        <span class="homepage-cta-hexagon homepage-cta-hexagon-one" aria-hidden="true"></span>
        <span class="homepage-cta-hexagon homepage-cta-hexagon-two" aria-hidden="true"></span>
        <span class="homepage-cta-hexagon homepage-cta-hexagon-three" aria-hidden="true"></span>
        <span class="homepage-cta-hexagon homepage-cta-hexagon-four" aria-hidden="true"></span>

        <div class="homepage-cta-content">

            <p class="homepage-cta-label">The Lumen Nook Philosophy</p>

            <h2 id="homepage-cta-heading">
                Your space. Your rules.
            </h2>

            <p class="homepage-cta-description">
                Your setup is more than just equipment. It's a reflection of how you
                play, create, and make your space your own.
            </p>

            <span class="homepage-cta-divider" aria-hidden="true"></span>

            <a
                class="homepage-cta-inspiration"
                href="<?php echo esc_url(home_url('/inspiration/')); ?>"
            >
                Explore inspiration
            </a>

        </div>

    </section>

    <section class="homepage-blog-preview" aria-labelledby="homepage-blog-heading">

        <div class="homepage-blog-intro">
            <p class="homepage-blog-label">Tips, guides &amp; ideas</p>
            <h2 id="homepage-blog-heading">From the nook</h2>
            <p>Explore guides, ideas, and little details that make a big difference to your setup.</p>
        </div>

        <div class="homepage-blog-content">
            <div class="homepage-blog-grid">
            <?php
            $hello_world_post = get_page_by_path('hello-world', OBJECT, 'post');
            $homepage_blog_posts = new WP_Query(
                array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'ignore_sticky_posts' => true,
                    'post__not_in' => $hello_world_post ? array($hello_world_post->ID) : array()
                )
            );
            ?>

            <?php if ($homepage_blog_posts->have_posts()) : ?>
                <?php while ($homepage_blog_posts->have_posts()) : $homepage_blog_posts->the_post(); ?>
                    <article class="homepage-blog-card">
                        <a class="homepage-blog-card-link" href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'homepage-blog-image')); ?>
                            <?php else : ?>
                                <span class="homepage-blog-image homepage-blog-image-placeholder" aria-hidden="true">
                                    Lumen Nook
                                </span>
                            <?php endif; ?>
                            <span class="homepage-blog-card-content">
                                <?php
                                $categories = get_the_category();
                                $category_name = !empty($categories) ? $categories[0]->name : 'Lumen Nook';
                                ?>
                                <span class="homepage-blog-category"><?php echo esc_html($category_name); ?></span>
                                <span class="homepage-blog-title"><?php the_title(); ?></span>
                                <span class="homepage-blog-excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24)); ?></span>
                                <span class="homepage-blog-read">Read Article <span aria-hidden="true">→</span></span>
                            </span>
                        </a>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="empty-state">New guides and ideas will appear here soon.</p>
            <?php endif; ?>
            </div>

            <a class="homepage-blog-all" href="<?php echo esc_url(home_url('/blogs/')); ?>">
                View All Articles <span aria-hidden="true">→</span>
            </a>
        </div>

    </section>

</main>


<?php get_footer(); ?>