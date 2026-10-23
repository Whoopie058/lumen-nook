<?php

function lumen_nook_enqueue_styles() {

    wp_enqueue_style(
        'lumen-nook-main',
        get_template_directory_uri() . '/main.css',
        array(),
        '1.0'
    );

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

/* <?php

function lumen_nook_enqueue_styles() {

    wp_enqueue_style(
        'lumen-nook-main',
        get_template_directory_uri() . '/main.css',
        array(),
        '1.0'
    );

}

add_action('wp_enqueue_scripts', 'lumen_nook_enqueue_styles'); */