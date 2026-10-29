<?php get_header(); ?>

<main class="single-blog-page">
    <?php while (have_posts()) : the_post(); ?>
        <article class="single-blog-post">
            <?php
            $categories = get_the_category();
            $category_name = !empty($categories) ? $categories[0]->name : 'Lumen Nook';
            ?>
            <p class="blog-category"><?php echo esc_html($category_name); ?></p>
            <h1><?php the_title(); ?></h1>
            <p class="blog-meta"><?php echo esc_html(get_the_date()); ?> · <?php echo esc_html(get_the_author()); ?></p>
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large', array('class' => 'single-blog-image')); ?>
            <?php endif; ?>
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

            <a class="single-blog-back" href="<?php echo esc_url(home_url('/blogs/')); ?>">
                ← Back to the blog
            </a>
        </article>

        <?php comments_template(); ?>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
