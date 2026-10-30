<?php get_header(); ?>

<main class="lumen-about">
    <section class="lumen-about__hero">
        <div class="lumen-about__hero-copy">
            <p class="lumen-about__eyebrow">Welcome to Lumen Nook</p>
            <h1>Your setup.<br>Your style.<br>Your space.</h1>
            <p class="lumen-about__lead">Lumen Nook helps you create a PC setup that fits your personality, your needs, and your budget.</p>
            <p>From the equipment on your desk to the details that make it feel like yours, we bring gear, ideas, and approachable guidance together in one place.</p>
        </div>
        <div class="lumen-about__placeholder lumen-about__placeholder--hero">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/img/Guy with Setup.jpg'); ?>" alt="A person using a Lumen Nook PC setup" loading="eager" fetchpriority="high" decoding="async">
        </div>
    </section>

    <section class="lumen-about__mission">
        <div class="lumen-about__mission-copy">
            <p class="lumen-about__eyebrow">Why Lumen Nook exists</p>
            <h2>Making your ideal setup feel easier to build.</h2>
            <p>Choosing computer gear can be overwhelming. Lumen Nook is designed to make the process more accessible and enjoyable, whether you are putting together your first desk or refining a setup you already love.</p>
        </div>
        <div class="lumen-about__video">
            <iframe
                src="https://www.youtube-nocookie.com/embed/ocplSWCKBQs"
                title="Making your ideal setup feel easier to build"
                loading="lazy"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
            ></iframe>
        </div>
    </section>

    <section class="lumen-about__services" aria-labelledby="lumen-about-services-heading">
        <div class="lumen-about__section-heading">
            <p class="lumen-about__eyebrow">Find your starting point</p>
            <h2 id="lumen-about-services-heading">What we do</h2>
        </div>

        <div class="lumen-about__service-grid">
            <article class="lumen-about__service">
                <span class="lumen-about__service-number">01</span>
                <div class="lumen-about__service-icon" aria-hidden="true">⌁</div>
                <h3>Shop Gear</h3>
                <p>Discover computer equipment and gaming accessories selected to support the way you play, work, create, and spend time at your desk.</p>
                <a href="<?php echo esc_url(home_url('/gear/')); ?>">Explore gear <span aria-hidden="true">→</span></a>
            </article>

            <article class="lumen-about__service">
                <span class="lumen-about__service-number">02</span>
                <div class="lumen-about__service-icon" aria-hidden="true">✦</div>
                <h3>Decorate Your Space</h3>
                <p>Find lighting, decorations, and desk accessories that turn a functional workstation into a space with atmosphere and personality.</p>
                <a href="<?php echo esc_url(home_url('/inspiration/')); ?>">Find inspiration <span aria-hidden="true">→</span></a>
            </article>

            <article class="lumen-about__service">
                <span class="lumen-about__service-number">03</span>
                <div class="lumen-about__service-icon" aria-hidden="true">+</div>
                <h3>Setup Assistance</h3>
                <p>Use our setup inspiration and guidance to plan a gaming, working, or studying space that makes sense for your room and routine.</p>
                <a href="<?php echo esc_url(home_url('/inspiration/')); ?>">Plan your setup <span aria-hidden="true">→</span></a>
            </article>
        </div>
    </section>

    <section class="lumen-about__story">
        <div class="lumen-about__placeholder">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/img/Workstation.jpg'); ?>" alt="A personalised Lumen Nook workstation" loading="lazy" decoding="async">
        </div>
        <div class="lumen-about__story-copy">
            <p class="lumen-about__eyebrow">Our mission</p>
            <h2>More than a list of specifications.</h2>
            <p>We believe a great setup is personal. It should reflect what you need from it, fit the space you have, and feel comfortable to use every day.</p>
            <p>Our mission is to make building that kind of setup simpler: with useful gear, practical ideas, and inspiration that helps you make confident choices without unnecessary jargon or pressure.</p>
        </div>
    </section>

    <section class="lumen-about__cta">
        <p class="lumen-about__eyebrow">Ready when you are</p>
        <h2>Make room for your best setup.</h2>
        <p>Start with the gear you need, or explore ideas to help shape a space that feels completely yours.</p>
        <div class="lumen-about__actions">
            <a class="hero-button" href="<?php echo esc_url(home_url('/gear/')); ?>">Shop gear <span aria-hidden="true">→</span></a>
            <a class="hero-button lumen-about__button-secondary" href="<?php echo esc_url(home_url('/inspiration/')); ?>">Get setup inspiration <span aria-hidden="true">→</span></a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
