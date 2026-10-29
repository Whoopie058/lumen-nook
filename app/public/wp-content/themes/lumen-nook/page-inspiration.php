<?php
get_header();
?>

<main class="lumen-inspiration">
    <section class="inspiration-hero" aria-labelledby="inspiration-title">
        <div>
            <p class="inspiration-eyebrow">Find your atmosphere</p>
            <h1 id="inspiration-title">Make space for<br><span>better ideas.</span></h1>
            <p class="inspiration-lead">Explore setups designed for your kind of focus, play, and everyday rituals. Start with a feeling, then make it yours.</p>
        </div>
        <div class="inspiration-hero-orbit" aria-hidden="true"><span></span><span></span><span></span></div>
    </section>

    <section class="inspiration-gallery-section" aria-labelledby="gallery-title">
        <div class="inspiration-section-heading">
            <div>
                <p class="inspiration-eyebrow">Setup inspiration</p>
                <h2 id="gallery-title">A nook with<br><span>your name on it.</span></h2>
            </div>
            <p>These are placeholders for now—a few directions to get your imagination moving.</p>
        </div>

        <div class="inspiration-slider" data-slider>
            <div class="inspiration-slides" aria-live="polite">
                <article class="inspiration-slide is-active" data-slide>
                    <div class="inspiration-placeholder inspiration-placeholder--violet"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/Midnight Violet Setup.jpg'); ?>" alt="Midnight violet gaming setup" loading="eager" fetchpriority="high" decoding="async"></div>
                    <div class="inspiration-slide-copy"><p class="inspiration-eyebrow">01 / Focus after dark</p><h3>Quiet power, soft light.</h3><p>A calm desk for deep work and late-night sessions, with one strong accent colour doing the talking.</p></div>
                </article>
                <article class="inspiration-slide" data-slide hidden>
                    <div class="inspiration-placeholder inspiration-placeholder--cyan"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/Cyan Current Setup.jpg'); ?>" alt="Cyan current gaming desk setup" loading="lazy" decoding="async"></div>
                    <div class="inspiration-slide-copy"><p class="inspiration-eyebrow">02 / Bright ideas</p><h3>Keep the energy moving.</h3><p>Layer a clean silhouette with cool highlights and a few personal objects that make the desk feel lived in.</p></div>
                </article>
                <article class="inspiration-slide" data-slide hidden>
                    <div class="inspiration-placeholder inspiration-placeholder--pink"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/Warm Signal Setup.jpg'); ?>" alt="Warm signal decorated gaming setup" loading="lazy" decoding="async"></div>
                    <div class="inspiration-slide-copy"><p class="inspiration-eyebrow">03 / Make it personal</p><h3>More you, less showroom.</h3><p>Bring in colour, texture, and the objects you reach for every day to turn hardware into a real workspace.</p></div>
                </article>
            </div>
            <div class="inspiration-slider-controls">
                <button class="inspiration-slider-arrow" type="button" data-slide-direction="-1" aria-label="Previous inspiration">←</button>
                <div class="inspiration-dots" role="tablist" aria-label="Choose inspiration slide">
                    <button class="inspiration-dot is-active" type="button" role="tab" aria-label="Show slide 1" aria-selected="true" data-slide-index="0"></button>
                    <button class="inspiration-dot" type="button" role="tab" aria-label="Show slide 2" aria-selected="false" data-slide-index="1"></button>
                    <button class="inspiration-dot" type="button" role="tab" aria-label="Show slide 3" aria-selected="false" data-slide-index="2"></button>
                </div>
                <button class="inspiration-slider-arrow" type="button" data-slide-direction="1" aria-label="Next inspiration">→</button>
            </div>
        </div>
    </section>

    <section class="booking-section" aria-labelledby="booking-title">
        <div class="booking-copy">
            <p class="inspiration-eyebrow">One-to-one guidance</p>
            <h2 id="booking-title">Make your setup<br><span>make sense.</span></h2>
            <p>Not sure where to start? Lumen Nook can help you plan a PC setup, choose equipment that fits your needs, and make your workspace feel better to use.</p>
            <ul>
                <li>Talk through your room, routine, and budget.</li>
                <li>Build a practical gear shortlist without the jargon.</li>
                <li>Find small changes that make a big difference.</li>
            </ul>
            <p class="booking-demo-note"><strong>Demo booking:</strong> this form confirms a request on-screen only. No booking is sent or saved yet.</p>
        </div>
        <div class="booking-card">
            <h3>Book a help session</h3>
            <p class="booking-card-intro">Choose a date and a time that works for you.</p>
            <form class="booking-form" data-booking-form>
                <label for="booking-date">Date</label>
                <input id="booking-date" name="date" type="date" required>
                <fieldset>
                    <legend>Available time</legend>
                    <div class="booking-times">
                        <label><input type="radio" name="time" value="10:00" required><span>10:00</span></label>
                        <label><input type="radio" name="time" value="13:00"><span>13:00</span></label>
                        <label><input type="radio" name="time" value="16:30"><span>16:30</span></label>
                    </div>
                </fieldset>
                <label for="booking-name">Name</label>
                <input id="booking-name" name="name" type="text" autocomplete="name" required>
                <label for="booking-email">Email</label>
                <input id="booking-email" name="email" type="email" autocomplete="email" required>
                <label for="booking-details">What would you like help with?</label>
                <textarea id="booking-details" name="details" rows="4" placeholder="Tell us about your room, setup, or idea..." required></textarea>
                <button class="booking-submit" type="submit">Book a Session <span aria-hidden="true">→</span></button>
                <p class="booking-confirmation" data-booking-confirmation role="status" hidden></p>
            </form>
        </div>
    </section>
</main>

<script>
(() => {
    const slides = [...document.querySelectorAll("[data-slide]")];
    const dots = [...document.querySelectorAll(".inspiration-dot")];
    let activeSlide = 0;
    const showSlide = (index) => {
        activeSlide = (index + slides.length) % slides.length;
        slides.forEach((slide, slideIndex) => {
            const active = slideIndex === activeSlide;
            slide.hidden = !active;
            slide.classList.toggle("is-active", active);
        });
        dots.forEach((dot, dotIndex) => {
            const active = dotIndex === activeSlide;
            dot.classList.toggle("is-active", active);
            dot.setAttribute("aria-selected", active);
        });
    };
    document.querySelectorAll("[data-slide-direction]").forEach((button) => button.addEventListener("click", () => showSlide(activeSlide + Number(button.dataset.slideDirection))));
    dots.forEach((dot) => dot.addEventListener("click", () => showSlide(Number(dot.dataset.slideIndex))));

    const dateInput = document.querySelector("#booking-date");
    const today = new Date();
    dateInput.min = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, "0")}-${String(today.getDate()).padStart(2, "0")}`;
    document.querySelector("[data-booking-form]").addEventListener("submit", (event) => {
        event.preventDefault();
        const form = event.currentTarget;
        const details = new FormData(form);
        const confirmation = document.querySelector("[data-booking-confirmation]");
        const formattedDate = new Intl.DateTimeFormat("en-GB", { dateStyle: "long" }).format(new Date(`${details.get("date")}T12:00:00`));
        confirmation.textContent = `Demo request noted for ${formattedDate} at ${details.get("time")}. Nothing has been sent or saved.`;
        confirmation.hidden = false;
        form.classList.add("is-confirmed");
    });
})();
</script>

<?php get_footer(); ?>
