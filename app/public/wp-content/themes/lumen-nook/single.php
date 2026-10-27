<?php get_header(); ?>

<main class="single-blog-page">
    <?php while (have_posts()) : the_post(); ?>
        <article class="single-blog-post">
            <p class="blog-meta"><?php echo esc_html(get_the_date()); ?> · <?php echo esc_html(get_the_author()); ?></p>
            <h1><?php the_title(); ?></h1>
            <div class="single-blog-content"><?php the_content(); ?></div>

            <?php
            $liked_posts = is_user_logged_in()
                ? get_user_meta(get_current_user_id(), '_lumen_nook_liked_posts', true)
                : array();
            $liked_posts = is_array($liked_posts) ? array_map('absint', $liked_posts) : array();
            $is_liked = in_array(get_the_ID(), $liked_posts, true);
            ?>
            <?php if (is_user_logged_in()) : ?>
                <button
                    class="like-button<?php echo $is_liked ? ' is-liked' : ''; ?>"
                    type="button"
                    data-post-id="<?php echo esc_attr(get_the_ID()); ?>"
                    aria-pressed="<?php echo $is_liked ? 'true' : 'false'; ?>"
                >
                    <span aria-hidden="true">♥</span>
                    <span class="like-label"><?php echo $is_liked ? 'Liked' : 'Like'; ?></span>
                    <span class="like-count"><?php echo esc_html((int) get_post_meta(get_the_ID(), '_lumen_nook_likes', true)); ?></span>
                </button>
            <?php else : ?>
                <a class="like-button" href="<?php echo esc_url(wp_login_url(get_permalink())); ?>">
                    Sign in to like · <?php echo esc_html((int) get_post_meta(get_the_ID(), '_lumen_nook_likes', true)); ?>
                </a>
            <?php endif; ?>
        </article>

        <?php comments_template(); ?>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
