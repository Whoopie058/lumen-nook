<!-- Footer -->

<?php
$footer_pages = array(
    array('Home', home_url('/')),
    array('About Lumen Nook', get_permalink(get_page_by_path('about-us'))),
    array('Shop Gear', get_permalink(get_page_by_path('gear'))),
    array('Inspiration', get_permalink(get_page_by_path('inspiration'))),
    array('Blogs', get_permalink(get_page_by_path('blogs'))),
    array('Sustainability Initiatives', get_permalink(get_page_by_path('sustainability-initiatives'))),
    array('Login', get_permalink(get_page_by_path('login')))
);
?>

<footer class="footer">

    <div class="footer-column">

        <h2>
            Explore
        </h2>

        <?php foreach (array_slice($footer_pages, 0, 4) as $footer_page) : ?>
            <?php if (!$footer_page[1]) {
                continue;
            } ?>
            <a href="<?php echo esc_url($footer_page[1]); ?>">
                <?php echo esc_html($footer_page[0]); ?>
            </a>
        <?php endforeach; ?>

    </div>


    <div class="footer-column">

        <h2>
            Lumen Nook
        </h2>

        <?php foreach (array_slice($footer_pages, 4) as $footer_page) : ?>
            <?php if (!$footer_page[1]) {
                continue;
            } ?>
            <a href="<?php echo esc_url($footer_page[1]); ?>">
                <?php echo esc_html($footer_page[0]); ?>
            </a>
        <?php endforeach; ?>

    </div>

</footer>


<?php wp_footer(); ?>

</body>

</html>