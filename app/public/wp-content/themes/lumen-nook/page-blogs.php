<?php get_header(); ?>

<main class="blogs-page">

    <header class="blogs-header">
        <p class="eyebrow">Lumen Nook community</p>
        <h1>Blogs</h1>
        <p>Share your setup, discover new ideas, and connect with other creators.</p>
    </header>

    <?php if (isset($_GET['blog_status']) && 'submitted' === $_GET['blog_status']) : ?>
        <p class="blog-notice">Your post has been submitted for review.</p>
    <?php elseif (isset($_GET['blog_status']) && 'missing' === $_GET['blog_status']) : ?>
        <p class="blog-notice blog-notice-error">Please add a title and some content.</p>
    <?php elseif (isset($_GET['blog_status']) && 'error' === $_GET['blog_status']) : ?>
        <p class="blog-notice blog-notice-error">Your post could not be submitted. Please try again.</p>
    <?php elseif (isset($_GET['blog_status']) && 'login' === $_GET['blog_status']) : ?>
        <p class="blog-notice blog-notice-error">Please sign in before submitting a post.</p>
    <?php endif; ?>

    <div class="blogs-layout">

        <section class="blog-feed" aria-labelledby="latest-posts-heading">
            <h2 id="latest-posts-heading">Latest posts</h2>

            <?php
            $blog_posts = new WP_Query(
                array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 10,
                    'paged' => max(1, get_query_var('paged'))
                )
            );
            ?>

            <?php if ($blog_posts->have_posts()) : ?>
                <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                    <article class="blog-card">
                        <div class="blog-card-content">
                            <p class="blog-meta">
                                <?php echo esc_html(get_the_date()); ?> · <?php echo esc_html(get_the_author()); ?>
                            </p>
                            <h3>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 30)); ?></p>
                            <div class="blog-card-footer">
                                <a class="text-link" href="<?php the_permalink(); ?>">Read post</a>
                                <span><?php echo esc_html(get_comments_number()); ?> comments</span>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="empty-state">There are no published posts yet. Be the first to share an idea.</p>
            <?php endif; ?>
        </section>

        <aside class="blog-sidebar">
            <?php if (is_user_logged_in()) : ?>
                <section class="post-editor" aria-labelledby="post-editor-heading">
                    <h2 id="post-editor-heading">Write a post</h2>
                    <p>Posts are reviewed before they appear publicly.</p>
                    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <input type="hidden" name="action" value="lumen_nook_submit_post">
                        <?php wp_nonce_field('lumen_nook_submit_post', 'lumen_nook_post_nonce'); ?>
                        <label for="post-title">Title</label>
                        <input id="post-title" name="post_title" type="text" required>
                        <label for="post-content">Your post</label>
                        <textarea id="post-content" name="post_content" rows="8" required></textarea>
                        <button class="hero-button" type="submit">Submit post</button>
                    </form>
                </section>
            <?php else : ?>
                <section class="post-editor">
                    <h2>Join the conversation</h2>
                    <p>Sign in to publish posts, comment, and like your favourite ideas.</p>
                    <a class="hero-button" href="<?php echo esc_url(wp_login_url(get_permalink())); ?>">Sign in</a>
                </section>
            <?php endif; ?>
        </aside>

    </div>

</main>

<?php get_footer(); ?>
