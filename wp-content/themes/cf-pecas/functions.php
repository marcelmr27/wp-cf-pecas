<?php

function register_my_session()
{
    if (!session_id()) {
        session_start();
    }
}

add_action('init', 'register_my_session');

add_action('after_setup_theme', 'your_theme_features');

function your_theme_features()
{
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1280, 720);
}

add_theme_support('title-tag');

add_theme_support('post-thumbnails');

add_filter('acf/rest_api/key', function ($key, $request, $type) {
    return 'acf_fields';
}, 10, 3);
