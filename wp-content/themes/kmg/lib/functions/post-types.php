<?php

/**
 * Create Post Type
 */
function kmg_project_post_type()
{
    $labels = array(
        'name' => __('Projects'),
        'singular_name' => __('Project'),
        'all_items' => __('All Projects'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit'),
        'new_item' => __('New'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' => __('No Projects Found'),
        'not_found_in_trash' => __('No Projects Found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'exclude_from_search' => false,
        'show_in_nav_menus' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'projects', 'with_front' => false),
        'menu_icon' => 'dashicons-clipboard',
        'menu_position' => 21,
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest' => true
    );
    register_post_type('project', $args);
}

add_action('init', 'kmg_project_post_type');

function kmg_service_post_type()
{
    $labels = array(
        'name' => __('Services'),
        'singular_name' => __('Service'),
        'all_items' => __('All Services'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit'),
        'new_item' => __('New'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' => __('No Services Found'),
        'not_found_in_trash' => __('No Services Found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'exclude_from_search' => false,
        'show_in_nav_menus' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'services', 'with_front' => false),
        'menu_icon' => 'dashicons-admin-tools',
        'menu_position' => 21,
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest' => true
    );
    register_post_type('service', $args);
}

add_action('init', 'kmg_service_post_type');

function kmg_team_post_type()
{
    $labels = array(
        'name' => __('Team'),
        'singular_name' => __('Team'),
        'all_items' => __('All Team'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit'),
        'new_item' => __('New'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' => __('No Team Found'),
        'not_found_in_trash' => __('No Team Found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'exclude_from_search' => false,
        'show_in_nav_menus' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'team', 'with_front' => false),
        'menu_icon' => 'dashicons-groups',
        'menu_position' => 21,
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true
    );
    register_post_type('team', $args);
}

add_action('init', 'kmg_team_post_type');

function kmg_clients_post_type()
{
    $labels = array(
        'name' => __('Clients'),
        'singular_name' => __('Client'),
        'all_items' => __('All Clients'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit'),
        'new_item' => __('New'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' => __('No Clients Found'),
        'not_found_in_trash' => __('No Clients Found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'has_archive' => false,
        'rewrite' => false,
        'menu_icon' => 'dashicons-businessman',
        'menu_position' => 21,
        'hierarchical' => false,
        'supports' => array('title', 'thumbnail')
    );
    register_post_type('client', $args);
}

add_action('init', 'kmg_clients_post_type');


function kmg_offices_post_type()
{
    $labels = array(
        'name' => __('Offices'),
        'singular_name' => __('Office'),
        'all_items' => __('All Offices'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit'),
        'new_item' => __('New'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' => __('No Offices Found'),
        'not_found_in_trash' => __('No Offices Found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'has_archive' => false,
        'rewrite' => false,
        'menu_icon' => 'dashicons-building',
        'menu_position' => 21,
        'hierarchical' => false,
        'supports' => array('title')
    );
    register_post_type('office', $args);
}

add_action('init', 'kmg_offices_post_type');

function kmg_accreditations_post_type()
{
    $labels = array(
        'name' => __('Accreditations'),
        'singular_name' => __('Accreditation'),
        'all_items' => __('All Accreditations'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit'),
        'new_item' => __('New'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' => __('No Accreditations Found'),
        'not_found_in_trash' => __('No Accreditations Found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'has_archive' => false,
        'rewrite' => false,
        'menu_icon' => 'dashicons-awards',
        'menu_position' => 21,
        'hierarchical' => false,
        'supports' => array('title', 'thumbnail')
    );
    register_post_type('accreditation', $args);
}

add_action('init', 'kmg_accreditations_post_type');

function kmg_instagram_post_type()
{
    $labels = array(
        'name' => __('Instagram'),
        'singular_name' => __('Instagram'),
        'all_items' => __('All Instagrams'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit'),
        'new_item' => __('New'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' => __('No Instagrams Found'),
        'not_found_in_trash' => __('No Instagrams Found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'has_archive' => false,
        'rewrite' => false,
        'menu_icon' => 'dashicons-instagram',
        'menu_position' => 21,
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('instagram', $args);
}

add_action('init', 'kmg_instagram_post_type');

function kmg_twitter_post_type()
{
    $labels = array(
        'name' => __('Twitter'),
        'singular_name' => __('Twitter'),
        'all_items' => __('All Tweets'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit'),
        'new_item' => __('New'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' => __('No Tweets Found'),
        'not_found_in_trash' => __('No Tweets Found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'has_archive' => false,
        'rewrite' => false,
        'menu_icon' => 'dashicons-twitter',
        'menu_position' => 21,
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('twitter', $args);
}

add_action('init', 'kmg_twitter_post_type');

/**
 * Create Post Taxonomy
 */
function kmg_project_category_taxonomy()
{
    $labels = array(
        'name' => _x('Categories', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add Category'),
        'new_item_name' => __('New Category'),
        'menu_name' => __('Categories'),
    );
    register_taxonomy('project_category', array('project'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'project-category'),
        'query_var' => true,
    ));
}
add_action('init', 'kmg_project_category_taxonomy');

