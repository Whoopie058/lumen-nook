<?php
get_header();
$theme_uri = get_template_directory_uri();
?>

<main class="lumen-sustainability">
    <section class="lumen-sustainability__hero">
        <div class="lumen-sustainability__hero-copy">
            <p class="lumen-sustainability__eyebrow">A more thoughtful way to build</p>
            <h1>Better Tech. Smarter Choices. A Lighter Footprint.</h1>
            <p class="lumen-sustainability__lead">Technology should make life better without creating unnecessary waste. At Lumen Nook, we believe in making smarter choices: choosing reliable equipment, extending the life of existing devices, and being more mindful of the resources behind the technology we use every day.</p>
            <p>Sustainability is not about having the newest technology. It is about making the most of what we already have.</p>
        </div>
        <div class="lumen-sustainability__placeholder lumen-sustainability__placeholder--hero lumen-sustainability__image">
            <img src="<?php echo esc_url($theme_uri . '/img/Sustainable Sunset Tech Workspace.png'); ?>" alt="Sustainable technology workspace glowing at sunset" loading="eager" fetchpriority="high" decoding="async">
        </div>
    </section>

    <section class="lumen-sustainability__section">
        <div class="lumen-sustainability__copy">
            <p class="lumen-sustainability__eyebrow">01 / Buying with purpose</p>
            <h2>Choosing Gear That Makes a Difference</h2>
            <p>Good equipment should earn its place on your desk. We encourage durable, reliable products over cheap, disposable alternatives because a longer useful life can mean fewer replacements and less waste.</p>
            <p>When comparing gear, look for manufacturers that make repairs possible, provide replacement parts, and explain their environmental policies clearly. Recycled materials, responsible packaging, energy efficiency, and a product’s expected lifespan can all be useful signals.</p>
            <p>That does not make one purchase automatically sustainable, and we will not make claims about a company without evidence. It simply gives us better questions to ask. If your current equipment still performs well, avoiding an unnecessary upgrade may be the most responsible choice of all.</p>
        </div>
        <div class="lumen-sustainability__placeholder lumen-sustainability__image">
            <img src="<?php echo esc_url($theme_uri . '/img/Cozy Sustainable PC Repair Workshop.png'); ?>" alt="Cozy sustainable PC repair workshop with components ready for maintenance" loading="lazy" decoding="async">
        </div>
    </section>

    <section class="lumen-sustainability__section lumen-sustainability__section--image-left">
        <div class="lumen-sustainability__placeholder lumen-sustainability__image">
            <img src="<?php echo esc_url($theme_uri . '/img/AI.jpg'); ?>" alt="Abstract blue AI-inspired network of glowing data lines" loading="lazy" decoding="async">
        </div>
        <div class="lumen-sustainability__copy">
            <p class="lumen-sustainability__eyebrow">02 / Using technology thoughtfully</p>
            <h2>Using AI With Intention</h2>
            <p>AI can be genuinely useful, but large-scale AI systems require computing resources, electricity, and often water for cooling. That is why we think it is worth choosing the right tool for the job rather than automatically adding AI to every task.</p>
            <p>Use a simpler tool when it does the job. Avoid repetitive generated content and unnecessary requests. Be conscious that digital services still depend on physical infrastructure, even when they feel instant and invisible. At the same time, AI can help optimise systems, identify inefficiencies, and reduce waste in some applications.</p>
            <blockquote>Not every problem needs artificial intelligence. Sometimes, the smartest solution is also the simplest.</blockquote>
        </div>
    </section>

    <section class="lumen-sustainability__section">
        <div class="lumen-sustainability__copy">
            <p class="lumen-sustainability__eyebrow">03 / Better everyday habits</p>
            <h2>Small Changes. Less Energy. Better Habits.</h2>
            <p>Energy use is only one part of a device’s footprint, but everyday habits still matter. Energy-efficient components can reduce electricity demand, while sensible power settings and sleep modes help avoid running equipment when nobody is using it.</p>
            <ul>
                <li>Turn off monitors, peripherals, and computers when they are not needed.</li>
                <li>Keep hardware clean and well maintained so it can keep working effectively.</li>
                <li>Choose components that suit the task instead of always buying the most powerful option.</li>
                <li>Consider the emissions and resources involved in manufacturing and transporting new electronics.</li>
            </ul>
            <p>These actions do not all have the same impact, and there is no single perfect checklist. Together, they encourage a more considered balance between the energy a setup uses and the impact of producing a replacement.</p>
        </div>
        <div class="lumen-sustainability__placeholder lumen-sustainability__image">
            <img src="<?php echo esc_url($theme_uri . '/img/Sunset Glow Over Industrial Plant.png'); ?>" alt="Industrial energy plant glowing in the warm light of sunset" loading="lazy" decoding="async">
        </div>
    </section>

    <section class="lumen-sustainability__section lumen-sustainability__section--image-left">
        <div class="lumen-sustainability__placeholder lumen-sustainability__image">
            <img src="<?php echo esc_url($theme_uri . '/img/Golden Hour E-Waste Recycling Yard.png'); ?>" alt="E-waste recycling yard glowing in golden-hour light" loading="lazy" decoding="async">
        </div>
        <div class="lumen-sustainability__copy">
            <p class="lumen-sustainability__eyebrow">04 / Keep what works</p>
            <h2>Upgrade What Matters. Keep What Works.</h2>
            <p>A faster computer does not always require a completely new setup. Sometimes, replacing one component, improving cooling, cleaning existing hardware, or upgrading storage can make a noticeable difference.</p>
            <p>Thoughtful upgrades and basic care can extend the useful life of technology while keeping a setup performing well. That fits naturally with what Lumen Nook is here to do: offer practical PC guidance and inspiration that helps you choose the change that actually matters, not simply the newest one.</p>
        </div>
    </section>

    <section class="lumen-sustainability__closing">
        <p class="lumen-sustainability__eyebrow">Our approach</p>
        <h2>Progress, Not Perfection.</h2>
        <p>We know that technology will always require resources. Our goal is not to pretend otherwise, but to encourage more thoughtful decisions.</p>
        <p>Whether it is choosing better equipment, reducing unnecessary energy consumption, or keeping a computer running for another few years, we believe smarter habits can contribute to a more responsible relationship with technology.</p>
    </section>
</main>

<?php get_footer(); ?>
