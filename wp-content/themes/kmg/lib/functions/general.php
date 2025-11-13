<?php

define('THEME_DIRECTORY', get_template_directory());

/*
Disable the theme editor
- stop clients from breaking their website
 */
define('DISALLOW_FILE_EDIT', true);


/*
Thumbnails
- this theme supports thumbnails
 */
add_theme_support('post-thumbnails');
add_image_size('full', 3000, 3000, true);
add_image_size('post', 650, 650, true);
add_image_size('tile', 825, 825, true);
add_image_size('team', 540, 400, true);
add_image_size('post_image', 1250, 620, true);
add_image_size('post_image_landscape', 640, 380, true);
add_image_size('post_image_portrait', 560, 780, true);
add_image_size('logo', 220, 99999, false);

/*
Scripts & Styles
- include the scripts and stylesheets
 */
add_action('wp_enqueue_scripts', function() {
    if (wp_script_is('jquery', 'registered')) {
        wp_deregister_script('jquery');

    }

    //wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '2.2.4', false);
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '3.3.1', false);
    wp_enqueue_script('vendor', get_template_directory_uri() . '/dist/scripts/vendor.min.js', array(), '1.0.0', true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/dist/scripts/main.min.js', array(), '1.0.0', true);
    wp_enqueue_style('style', get_template_directory_uri() . '/dist/styles/style.min.css', false, '1.0.0', 'all');

    wp_localize_script('custom', 'theme_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'), // WordPress AJAX
        'stylesheet_dir' => get_stylesheet_directory_uri(),
    ));
});


/*
Menus
- enable WordPress Menus
 */
if (function_exists('register_nav_menus')) {
    register_nav_menus(['header' => __('Main Nav'), 'header_left' => __('Main Nav Left'), 'header_right' => __('Main Nav Right'), 'footer' => __('Footer Nav')]);
}


/**
 * Yoast breadcrumbs
 */
add_theme_support('yoast-seo-breadcrumbs');



/*
AFC Options
- register the ACF theme options
 */
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

}

add_theme_support( 'editor-styles');
add_editor_style( 'style-editor.css' );









