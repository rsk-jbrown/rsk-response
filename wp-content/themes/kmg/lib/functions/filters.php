<?php

/*
Remove version info
- makes it that little bit harder for hackers
 */
add_filter('the_generator', function() {
    return '';
});


/*
Admin Bar
- hide the admin bar
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Allow svgs to be uploaded in WordPress
 */
add_filter('upload_mimes', function($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

/*
Body classes
- add more classes to the body to enable more specific targeting if needed
 */
add_filter('body_class', function($classes) {
    $post_name_prefix = 'postname-';
    $page_name_prefix = 'pagename-';
    $single_term_prefix = 'single-';
    $single_parent_prefix = 'parent-';
    $category_parent_prefix = 'parent-category-';
    $term_parent_prefix = 'parent-term-';
    $site_prefix = 'site-';
    global $wp_query;
    if (is_single()) {
        $wp_query->post = $wp_query->posts[0];
        setup_postdata($wp_query->post);
        $classes[] = $post_name_prefix . $wp_query->post->post_name;
        $taxonomies = array_filter(get_post_taxonomies($wp_query->post->ID), "is_taxonomy_hierarchical");
        foreach ($taxonomies as $taxonomy) {
            $tax_name = ($taxonomy != 'category') ? $taxonomy . '-' : '';
            $terms = get_the_terms($wp_query->post->ID, $taxonomy);
            if ($terms) {
                foreach ($terms as $term) {
                    if (!empty($term->slug)) $classes[] = $single_term_prefix . $tax_name . sanitize_html_class($term->slug, $term->term_id);
                    while ($term->parent) {
                        $term = get_term($term->parent, $taxonomy);
                        if (!empty($term->slug)) $classes[] = $single_parent_prefix . $tax_name . sanitize_html_class($term->slug, $term->term_id);
                    }
                }
            }
        }
    } elseif (is_archive()) {
        if (is_category()) {
            $cat = $wp_query->get_queried_object();
            while ($cat->parent) {
                $cat = get_category($cat->parent);
                if (!empty($cat->slug)) $classes[] = $category_parent_prefix . sanitize_html_class($cat->slug, $cat->cat_ID);
            }
        } elseif (is_tax()) {
            $term = $wp_query->get_queried_object();
            while ($term->parent) {
                $term = get_term($term->parent, $term->taxonomy);
                if (!empty($term->slug)) $classes[] = $term_parent_prefix . sanitize_html_class($term->slug, $term->term_id);
            }
        }
    } elseif (is_page()) {
        $wp_query->post = $wp_query->posts[0];
        setup_postdata($wp_query->post);
        $classes[] = $page_name_prefix . $wp_query->post->post_name;
    }
    if (is_multisite()) {
        global $blog_id;
        $classes[] = $site_prefix . $blog_id;
    }
    return $classes;
});


/*
Menu Classes
- add first and last to menu items
*/
add_filter('wp_nav_menu_objects', function($items) {
    $items[1]->classes[] = 'first';
    $items[count($items)]->classes[] = 'last';
    return $items;
});


/**
 * Move Yoast to the bottom of admin area
 *
 * @return string
 */
add_filter( 'wpseo_metabox_prio', function() {
    return 'low';
});

/**
 * Move Gravity Forms scripts to footer
 */
add_filter('gform_init_scripts_footer', function () {
    return true;
});


/**
 * Custom Gravity Forms ajax-spinner
 */
//add_filter('gform_ajax_spinner_url', function($image_src, $form) {
//    return get_stylesheet_directory_uri() . '/dist/img/ajax-spinner.png';
//}, 10, 2);

/**
 * Remove Gravity Forms ajax anchor
 */
//add_filter('gform_confirmation_anchor', '__return_false');

/**
 * Change gravity forms submit input into a button tag
 */
add_filter( 'gform_submit_button', function($button, $form) {
    return "<button class='btn gform_button' id='gform_submit_button_{$form['id']}'>{$form['button']['text']}</button>";
}, 10, 2 );


function filter_next_post_sort($sort) {
    global $post;
    if (get_post_type($post) == 'team') {
        $sort = "ORDER BY p.post_title ASC LIMIT 1";
    }
    else{
        $sort = "ORDER BY p.post_date ASC LIMIT 1";
    }
    return $sort;
}
function filter_next_post_where($where) {
    global $post, $wpdb;
    if (get_post_type($post) == 'team') {
        return $wpdb->prepare("WHERE p.post_title > '%s' AND p.post_type = '". get_post_type($post)."' AND p.post_status = 'publish'",$post->post_title);
    }
    else{
        return $wpdb->prepare( "WHERE p.post_date > '%s' AND p.post_type = '". get_post_type($post)."' AND p.post_status = 'publish'", $post->post_date);
    }
}

function filter_previous_post_sort($sort) {
    global $post;
    if (get_post_type($post) == 'team') {
        $sort = "ORDER BY p.post_title DESC LIMIT 1";
    }
    else{
        $sort = "ORDER BY p.post_date DESC LIMIT 1";
    }
    return $sort;
}
function filter_previous_post_where($where) {
    global $post, $wpdb;
    if (get_post_type($post) == 'team') {
        return $wpdb->prepare("WHERE p.post_title < '%s' AND p.post_type = '". get_post_type($post)."' AND p.post_status = 'publish'",$post->post_title);
    }
    else{
        return $wpdb->prepare( "WHERE p.post_date < '%s' AND p.post_type = '". get_post_type($post)."' AND p.post_status = 'publish'", $post->post_date);
    }
}

add_filter('get_next_post_sort',   'filter_next_post_sort');
add_filter('get_next_post_where',  'filter_next_post_where');

add_filter('get_previous_post_sort',  'filter_previous_post_sort');
add_filter('get_previous_post_where', 'filter_previous_post_where');


add_filter( 'replace_editor', 'enable_gutenberg_editor_for_blog_page', 10, 2 );
/**
 * Simulate non-empty content to enable Gutenberg editor
 *
 * @param bool    $replace Whether to replace the editor.
 * @param WP_Post $post    Post object.
 * @return bool
 */
function enable_gutenberg_editor_for_blog_page( $replace, $post ) {

    if ( ! $replace && absint( get_option( 'page_for_posts' ) ) === $post->ID && empty( $post->post_content ) ) {
        // This comment will be removed by Gutenberg since it won't parse into block.
        $post->post_content = '<!--non-empty-content-->';
    }

    return $replace;

}
