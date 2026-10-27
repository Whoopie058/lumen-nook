<?php

function lumen_nook_enqueue_styles() {

    wp_enqueue_style(
        'lumen-nook-space-mono',
        'https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'lumen-nook-main',
        get_template_directory_uri() . '/main.css',
        array('lumen-nook-space-mono'),
        '1.2'
    );

    if (is_page('blogs') || is_singular('post')) {
        wp_enqueue_script(
            'lumen-nook-blog',
            get_template_directory_uri() . '/js/blog.js',
            array(),
            '1.0',
            true
        );

        wp_localize_script(
            'lumen-nook-blog',
            'lumenNookBlog',
            array(
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'likeNonce' => wp_create_nonce('lumen_nook_like')
            )
        );
    }

}

add_action('wp_enqueue_scripts', 'lumen_nook_enqueue_styles');


function lumen_nook_setup() {

    register_nav_menus(
        array(
            'primary-menu' => 'Primary Menu'
        )
    );

}

add_action('after_setup_theme', 'lumen_nook_setup');

function lumen_nook_ensure_blogs_page() {

    if (
        get_option('lumen_nook_blogs_page_created') &&
        get_option('lumen_nook_gear_page_created')
    ) {
        return;
    }

    $blogs_page = get_page_by_path('blogs');

    if (!$blogs_page) {
        wp_insert_post(
            array(
                'post_title' => 'Blogs',
                'post_name' => 'blogs',
                'post_status' => 'publish',
                'post_type' => 'page'
            )
        );
    }

    update_option('lumen_nook_blogs_page_created', true);

    $gear_page = get_page_by_path('gear');

    if (!$gear_page) {
        wp_insert_post(
            array(
                'post_title' => 'Shop Gear',
                'post_name' => 'gear',
                'post_status' => 'publish',
                'post_type' => 'page'
            )
        );
    }

    update_option('lumen_nook_gear_page_created', true);
}

add_action('after_setup_theme', 'lumen_nook_ensure_blogs_page');

function lumen_nook_submit_post() {

    if (!is_user_logged_in()) {
        wp_safe_redirect(home_url('/blogs/?blog_status=login'));
        exit;
    }

    if (
        !isset($_POST['lumen_nook_post_nonce']) ||
        !wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['lumen_nook_post_nonce'])),
            'lumen_nook_submit_post'
        )
    ) {
        wp_die('The post could not be submitted because the security check failed.');
    }

    $title = isset($_POST['post_title'])
        ? sanitize_text_field(wp_unslash($_POST['post_title']))
        : '';
    $content = isset($_POST['post_content'])
        ? wp_kses_post(wp_unslash($_POST['post_content']))
        : '';

    if ('' === $title || '' === trim(wp_strip_all_tags($content))) {
        wp_safe_redirect(home_url('/blogs/?blog_status=missing'));
        exit;
    }

    $post_id = wp_insert_post(
        array(
            'post_title' => $title,
            'post_content' => $content,
            'post_status' => 'pending',
            'post_author' => get_current_user_id(),
            'post_type' => 'post'
        ),
        true
    );

    if (is_wp_error($post_id)) {
        wp_safe_redirect(home_url('/blogs/?blog_status=error'));
        exit;
    }

    wp_safe_redirect(home_url('/blogs/?blog_status=submitted'));
    exit;
}

add_action('admin_post_lumen_nook_submit_post', 'lumen_nook_submit_post');

function lumen_nook_like_post() {

    check_ajax_referer('lumen_nook_like', 'nonce');

    if (!is_user_logged_in()) {
        wp_send_json_error(
            array('message' => 'Please sign in to like posts.'),
            401
        );
    }

    $post_id = isset($_POST['postId']) ? absint($_POST['postId']) : 0;

    if (!$post_id || 'post' !== get_post_type($post_id) || 'publish' !== get_post_status($post_id)) {
        wp_send_json_error(
            array('message' => 'This post cannot be liked.'),
            400
        );
    }

    $user_id = get_current_user_id();
    $liked_posts = get_user_meta($user_id, '_lumen_nook_liked_posts', true);
    $liked_posts = is_array($liked_posts) ? array_map('absint', $liked_posts) : array();

    if (in_array($post_id, $liked_posts, true)) {
        $liked_posts = array_values(array_diff($liked_posts, array($post_id)));
        $likes = max(0, (int) get_post_meta($post_id, '_lumen_nook_likes', true) - 1);
        $liked = false;
    } else {
        $liked_posts[] = $post_id;
        $likes = (int) get_post_meta($post_id, '_lumen_nook_likes', true) + 1;
        $liked = true;
    }

    update_user_meta($user_id, '_lumen_nook_liked_posts', $liked_posts);
    update_post_meta($post_id, '_lumen_nook_likes', $likes);

    wp_send_json_success(
        array(
            'likes' => $likes,
            'liked' => $liked
        )
    );
}

add_action('wp_ajax_lumen_nook_like_post', 'lumen_nook_like_post');