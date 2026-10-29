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
        '1.5'
    );

    if (is_page('sustainability-initiatives')) {
        wp_enqueue_style(
            'lumen-nook-sustainability',
            get_template_directory_uri() . '/sustainability.css',
            array('lumen-nook-main'),
            '1.0'
        );
    }

    if (is_page('inspiration')) {
        wp_enqueue_style(
            'lumen-nook-inspiration',
            get_template_directory_uri() . '/inspiration.css',
            array('lumen-nook-main'),
            '1.0'
        );
    }

    if (is_page('about-us')) {
        wp_enqueue_style(
            'lumen-nook-about',
            get_template_directory_uri() . '/about.css',
            array('lumen-nook-main'),
            '1.2'
        );
    }

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

    add_theme_support('post-thumbnails');

}

add_action('after_setup_theme', 'lumen_nook_setup');

function lumen_nook_ensure_blogs_page() {

    if (
        get_option('lumen_nook_blogs_page_created') &&
        get_option('lumen_nook_gear_page_created') &&
        get_option('lumen_nook_login_page_created') &&
        get_option('lumen_nook_inspiration_page_created')
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

    $login_page = get_page_by_path('login');

    if (!$login_page) {
        wp_insert_post(
            array(
                'post_title' => 'Login',
                'post_name' => 'login',
                'post_status' => 'publish',
                'post_type' => 'page'
            )
        );
    }

    update_option('lumen_nook_login_page_created', true);

    $inspiration_page = get_page_by_path('inspiration');

    if (!$inspiration_page) {
        wp_insert_post(
            array(
                'post_title' => 'Inspiration',
                'post_name' => 'inspiration',
                'post_status' => 'publish',
                'post_type' => 'page'
            )
        );
    }

    update_option('lumen_nook_inspiration_page_created', true);
}

add_action('after_setup_theme', 'lumen_nook_ensure_blogs_page');

function lumen_nook_seed_blog_posts() {

    if (get_option('lumen_nook_blog_posts_seeded')) {
        return;
    }

    $posts = array(
        array(
            'title' => 'Halloween Deals Are Here – Spooky Good Savings at Lumen Nook!',
            'slug' => 'halloween-deals-2026',
            'date' => '2026-10-29 09:00:00',
            'category' => 'Campaigns & Offers',
            'excerpt' => 'Our Halloween 2026 event has landed with spooky savings on PC accessories, gaming gear, RGB lighting, and desk upgrades for a limited time.',
            'image' => 'Lumen Nook Halloween Sales Scene.png',
            'alt' => 'Halloween-themed Lumen Nook gaming setup glowing with purple and orange light',
            'content' => '<p>The lights are low, the RGB is glowing, and something very good is lurking in the shop. Our Halloween 2026 campaign is live, bringing seasonal offers to the gear that makes your setup feel unmistakably yours.</p>
<h2>Trick out your setup</h2>
<p>For a limited time, selected PC accessories, gaming gear, RGB lighting, and desk equipment are getting a little more tempting. Think the finishing touches for a haunted battlestation: a new keyboard for late-night quests, a responsive mouse for quick escapes, and ambient lighting that turns an ordinary desk into a mysterious command centre.</p>
<p>Looking for inspiration? Try a Halloween palette of violet, ember orange, and icy cyan. Add a few low-lit light bars behind your monitor, switch your desktop wallpaper to something suitably eerie, and let one accent colour do the dramatic work. The result feels spooky without losing the clean, modern Lumen Nook look.</p>
<h2>Limited-time, setup-approved</h2>
<p>Offer details and availability may vary by product, so this is a good moment to browse before your favourite upgrade vanishes into the fog. Prices and end dates shown in the campaign are editable seasonal examples for this site and can be updated as the promotion changes.</p>
<p>Ready to give your nook a haunting upgrade? <a href="' . esc_url(home_url('/gear/')) . '">Explore the Halloween campaign</a> and find the gear that makes your setup glow a little brighter.</p>'
        ),
        array(
            'title' => 'Upgrade Your Setup This Autumn',
            'slug' => 'upgrade-your-setup-this-autumn',
            'date' => '2026-10-23 09:00:00',
            'category' => 'Setup Inspiration',
            'excerpt' => 'Make your desk warmer, tidier, and more comfortable this autumn with practical lighting, monitor placement, and cable-management ideas.',
            'image' => 'Long Setup Image Index.png',
            'alt' => 'Clean gaming and work setup with a wide monitor and warm atmosphere',
            'content' => '<p>Autumn is made for longer sessions at your desk: a little work, a little gaming, and possibly one more episode before bed. A few thoughtful changes can make that time feel much more comfortable without turning your setup upside down.</p>
<h2>Start with a warmer glow</h2>
<p>Cool white light can feel harsh once the evenings get darker. Add a warm desk lamp or set your monitor backlight to a soft amber tone, then balance it with a subtle purple or cyan accent behind the screen. The mix keeps the atmosphere cosy while preserving the futuristic gaming aesthetic Lumen Nook setups are known for.</p>
<h2>Give your screen and accessories room</h2>
<p>Place your monitor so the top edge sits close to eye level and the screen is about an arm’s length away. You will spend less time looking down and less time leaning forward. Keep your everyday accessories within easy reach, but move rarely used items into a drawer or a small desk organiser to protect your clear working zone.</p>
<h2>Make the cables disappear</h2>
<p>Group power cables separately from your keyboard, mouse, and display leads where possible. A few reusable ties, adhesive clips, and a cable tray can turn a tangle into a clean line. Finish with one small seasonal detail—a dark desk mat, a plant, or a favourite mug—and your autumn nook is ready.</p>
<p><a href="' . esc_url(home_url('/gear/')) . '">Browse the gear collection</a> for the lighting and accessories that can help bring your refreshed setup together.</p>'
        ),
        array(
            'title' => 'What\'s New at Lumen Nook? Fresh Gear for Your Setup',
            'slug' => 'whats-new-fresh-gear',
            'date' => '2026-10-15 09:00:00',
            'category' => 'News & Updates',
            'excerpt' => 'Meet the latest keyboard, mouse, headset, and RGB accessory ideas in the Lumen Nook collection, chosen for workdays and gaming nights.',
            'image' => 'Setup About Us Image 1.png',
            'alt' => 'Modern PC setup with accessories arranged around a monitor',
            'content' => '<p>There is something satisfying about opening a fresh tab, clearing your desk, and imagining what the right piece of gear could change. This month, Lumen Nook is putting the spotlight on practical upgrades that look good and work hard.</p>
<h2>Keys that keep up</h2>
<p>A well-chosen keyboard can make a long writing session feel lighter and a gaming session feel more responsive. Look for a layout that suits your desk, switches that match your preferred typing feel, and easy-to-reach controls for volume or media. A compact board can also free up valuable mouse space.</p>
<h2>Precision without the clutter</h2>
<p>A comfortable mouse is one of those upgrades you notice every day. Consider its shape, weight, and the way you naturally grip it before you worry about a long list of specifications. Pair it with a generous desk mat and your movements will feel more consistent across spreadsheets, creative work, and competitive matches.</p>
<h2>Sound and atmosphere</h2>
<p>A headset helps you focus when the room gets busy, while RGB accessories add atmosphere without demanding a full redesign. A light bar behind the monitor or a small accent lamp can create depth and reduce the flat glow of a single screen.</p>
<p>Productivity and gaming do not need separate desks. <a href="' . esc_url(home_url('/gear/')) . '">Explore the newest gear</a> and find the pieces that make your everyday setup feel more capable.</p>'
        ),
        array(
            'title' => '5 Simple Ways to Improve Your Gaming Setup',
            'slug' => '5-simple-ways-to-improve-your-gaming-setup',
            'date' => '2026-10-07 09:00:00',
            'category' => 'Guides & Tips',
            'excerpt' => 'New to setup upgrades? These five affordable changes improve comfort, focus, and cable control without requiring a whole new desk.',
            'image' => 'Setup About Us Image 2.png',
            'alt' => 'Gaming setup with monitor, keyboard, and organised desk accessories',
            'content' => '<p>You do not need a giant desk or an unlimited budget to make your gaming setup feel better. Start with the small changes you will notice every session, then build from there.</p>
<h2>1. Adjust your ergonomics</h2>
<p>Set your chair so your feet are supported and your elbows rest comfortably near desk height. Keep your shoulders relaxed, especially during longer matches.</p>
<h2>2. Add one layer of lighting</h2>
<p>A soft lamp or monitor light can reduce the contrast between a bright screen and a dark room. Use one colour for a clean look, or blend purple and cyan for a little extra atmosphere.</p>
<h2>3. Clear the action zone</h2>
<p>Move drinks, spare controllers, and unused stationery away from your mouse and keyboard. A small tray or drawer keeps those items close without crowding your play space.</p>
<h2>4. Tame the cables</h2>
<p>Label the important leads, bundle only cables that travel together, and use clips to guide them along the back edge of the desk. A tidy route is easier to change later.</p>
<h2>5. Position your monitor</h2>
<p>Centre the screen in front of you, keep it roughly an arm’s length away, and raise it until you are not constantly tilting your head down. Your eyes and neck will thank you.</p>
<p>Pick one improvement to try today, then <a href="' . esc_url(home_url('/gear/')) . '">find setup essentials</a> when you are ready for the next step.</p>'
        ),
        array(
            'title' => 'Mechanical vs. Membrane Keyboards – Which Should You Choose?',
            'slug' => 'mechanical-vs-membrane-keyboards',
            'date' => '2026-09-25 09:00:00',
            'category' => 'Guides & Tips',
            'excerpt' => 'Compare typing feel, noise, price, and gaming performance to choose the keyboard style that fits your hands, habits, and budget.',
            'image' => 'Setup-From-Customer-1.png',
            'alt' => 'Keyboard and mouse on a personalised gaming desk',
            'content' => '<p>Keyboard shopping can quickly become a maze of switch names and opinions. The useful starting point is simpler: do you prefer a distinct, responsive press, or a quieter and softer key feel?</p>
<h2>Mechanical: feedback you can feel</h2>
<p>Mechanical keyboards use individual switches beneath the keys. They usually offer a more defined press, consistent feedback, and plenty of choice in sound and resistance. Many gamers enjoy the quick reset between presses, while people who write a lot often appreciate the tactile rhythm. The trade-offs are a higher typical price and, depending on the switches and keycaps, more noise.</p>
<h2>Membrane: quiet and uncomplicated</h2>
<p>Membrane keyboards register a press through a shared rubber layer. They are often quieter, lighter on the wallet, and perfectly capable for everyday gaming and work. The feel can be softer and less distinctive, and the key response may become less consistent over time, but a good membrane board remains a sensible choice for a straightforward setup.</p>
<h2>Which one belongs in your nook?</h2>
<p>Choose mechanical if customisation, tactile feedback, and a particular typing sound are part of the fun. Choose membrane if low noise, simplicity, and value matter most. Neither is automatically better; the best keyboard is the one you enjoy using for hours.</p>
<p><a href="' . esc_url(home_url('/gear/')) . '">Explore Lumen Nook keyboards</a> and compare the options with your own desk, hands, and habits in mind.</p>'
        ),
        array(
            'title' => 'Welcome to Lumen Nook – Your Space for Better Setups',
            'slug' => 'welcome-to-lumen-nook',
            'date' => '2026-09-12 09:00:00',
            'category' => 'News & Updates',
            'excerpt' => 'Meet Lumen Nook, a space for PC gear, personalised gaming setups, desk inspiration, and practical ideas that make your nook yours.',
            'image' => 'LumenNookLogo.png',
            'alt' => 'Lumen Nook logo',
            'content' => '<p>Welcome to Lumen Nook—a modern corner for people who believe a setup should do more than sit there looking impressive. It should support the way you work, play, create, and switch off at the end of the day.</p>
<h2>Gear with room for personality</h2>
<p>From keyboards and mice to headsets, desk accessories, and RGB lighting, the right equipment can make everyday routines feel smoother. We are interested in the details that matter: comfortable shapes, useful features, thoughtful layouts, and the small visual choices that make a desk feel like yours.</p>
<h2>Inspiration without the pressure</h2>
<p>Not every setup needs to be a neon command centre. Maybe your ideal nook is calm and minimal. Maybe it is full of colour, collectibles, and carefully arranged chaos. Lumen Nook is here for both, with ideas that can scale to your space and your budget.</p>
<h2>A blog for the next upgrade</h2>
<p>This blog will be home to product news, seasonal promotions, setup inspiration, and practical guides. Expect approachable advice rather than a wall of jargon, whether you are building your first gaming desk or refining a workspace you have had for years.</p>
<p>Take a look around, discover your setup style, and <a href="' . esc_url(home_url('/gear/')) . '">start exploring Lumen Nook gear</a>.</p>'
        )
    );

    $author = get_users(
        array(
            'role' => 'administrator',
            'number' => 1,
            'fields' => 'ID'
        )
    );
    $author_id = !empty($author) ? (int) $author[0] : 1;
    $upload_dir = wp_upload_dir();
    $attachment_ids = array();

    foreach ($posts as $post_data) {
        $category = get_term_by('name', $post_data['category'], 'category');
        if (!$category) {
            $category = wp_insert_term($post_data['category'], 'category');
        }
        $category_id = 0;
        if (!is_wp_error($category)) {
            $category_id = is_object($category) ? (int) $category->term_id : (int) $category['term_id'];
        }
        $post = get_page_by_path($post_data['slug'], OBJECT, 'post');

        if (!$post) {
            $post_id = wp_insert_post(
                array(
                    'post_title' => $post_data['title'],
                    'post_name' => $post_data['slug'],
                    'post_content' => $post_data['content'],
                    'post_excerpt' => $post_data['excerpt'],
                    'post_status' => 'publish',
                    'post_type' => 'post',
                    'post_author' => $author_id,
                    'post_category' => $category_id ? array($category_id) : array(),
                    'post_date' => $post_data['date'],
                    'post_date_gmt' => get_gmt_from_date($post_data['date']),
                )
            );
        } else {
            $post_id = $post->ID;
        }

        if (is_wp_error($post_id) || !$post_id) {
            continue;
        }

        $source = get_template_directory() . '/img/' . $post_data['image'];
        $destination = trailingslashit($upload_dir['path']) . sanitize_file_name($post_data['image']);
        if (!isset($attachment_ids[$post_data['image']]) && file_exists($source)) {
            wp_mkdir_p($upload_dir['path']);
            if (!file_exists($destination)) {
                copy($source, $destination);
            }
            $file_type = wp_check_filetype(basename($destination), null);
            $attachment_id = wp_insert_attachment(
                array(
                    'post_title' => $post_data['title'],
                    'post_status' => 'inherit',
                    'post_mime_type' => $file_type['type'],
                    'post_excerpt' => $post_data['alt'],
                ),
                $destination,
                $post_id
            );
            if (!is_wp_error($attachment_id)) {
                require_once ABSPATH . 'wp-admin/includes/image.php';
                $metadata = wp_generate_attachment_metadata($attachment_id, $destination);
                wp_update_attachment_metadata($attachment_id, $metadata);
                $attachment_ids[$post_data['image']] = $attachment_id;
            }
        }

        if (isset($attachment_ids[$post_data['image']])) {
            set_post_thumbnail($post_id, $attachment_ids[$post_data['image']]);
        }
    }

    update_option('lumen_nook_blog_posts_seeded', true);
}

add_action('init', 'lumen_nook_seed_blog_posts', 20);

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