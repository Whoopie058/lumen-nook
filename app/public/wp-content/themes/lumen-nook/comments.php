<?php if (post_password_required()) : ?>
    <p class="comments-area">This post is password protected.</p>
    <?php return; ?>
<?php endif; ?>

<section class="comments-area" aria-labelledby="comments-heading">
    <h2 id="comments-heading"><?php echo esc_html(get_comments_number()); ?> comments</h2>

    <?php if (have_comments()) : ?>
        <ol class="comment-list">
            <?php wp_list_comments(array('style' => 'ol', 'short_ping' => true)); ?>
        </ol>
    <?php endif; ?>

    <?php
    comment_form(
        array(
            'title_reply' => is_user_logged_in() ? 'Leave a comment' : 'Sign in to comment',
            'must_log_in' => '<p class="must-log-in">Please <a href="' . esc_url(wp_login_url(get_permalink())) . '">sign in</a> to leave a comment.</p>',
            'logged_in_as' => ''
        )
    );
    ?>
</section>
