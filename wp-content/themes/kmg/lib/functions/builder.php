<?php

add_filter('block_categories', function ($categories, $post) {
    return array_merge(
        $categories,
        [
            [
                'slug' => 'page-blocks',
                'title' => __('Page Blocks', 'theme-blocks'),
            ],

        ]
    );
}, 10, 2);

add_action('acf/init', function () {

    if (function_exists('acf_register_block')) {

        acf_register_block([
            'name' => 'hero',
            'title' => __('Hero'),
            'description' => __('Title, background image and CTA\'s.'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Hero'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'heading_copy',
            'title' => __('Heading & Copy'),
            'description' => __('Heading & Copy'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Heading', 'Copy'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'signposts',
            'title' => __('Signposts'),
            'description' => __('Signposts'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Signposts'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'latest_projects',
            'title' => __('Latest Projects'),
            'description' => __('Latest Projects'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Projects'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'latest_posts',
            'title' => __('Latest Posts'),
            'description' => __('Latest Posts'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Posts'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'logos',
            'title' => __('Logos'),
            'description' => __('Logos'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Logos'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'rsk_group',
            'title' => __('RSK Group'),
            'description' => __('RSK Group'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['RSK', 'CTA'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'page_header',
            'title' => __('Page Header'),
            'description' => __('RSK Group'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['RSK', 'CTA'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'team',
            'title' => __('Team'),
            'description' => __('Team'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Team'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'contact',
            'title' => __('Contact'),
            'description' => __('Contact'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Contact'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'offices',
            'title' => __('Offices'),
            'description' => __('Offices'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Offices'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'instagram',
            'title' => __('Instagram'),
            'description' => __('Instagram'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Instagram'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'wysiwyg',
            'title' => __('WYSIWYG'),
            'description' => __('WYSIWYG'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['WYSIWYG'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'steps',
            'title' => __('Steps'),
            'description' => __('Steps'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Steps'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'video',
            'title' => __('Video'),
            'description' => __('Video'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Video'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'features',
            'title' => __('Features'),
            'description' => __('Features'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Features'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'tiles',
            'title' => __('Tiles'),
            'description' => __('Tiles'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Tiles'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'linked_header',
            'title' => __('Linked Header'),
            'description' => __('Linked Header'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Header'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'post_content',
            'title' => __('Post Content'),
            'description' => __('Post Content'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Post Content'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'related_posts',
            'title' => __('Related Posts'),
            'description' => __('Related Posts'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Posts'],
            'mode' => 'edit'
        ]);

        acf_register_block([
            'name' => 'copy_details',
            'title' => __('Copy & Details'),
            'description' => __('Copy & Details'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'page-blocks',
            'keywords' => ['Copy'],
            'mode' => 'edit'
        ]);
    }

});


function theme_block_render_callback($block)
{

    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if (file_exists(get_theme_file_path("/lib/blocks/{$slug}.php"))) {
        include(get_theme_file_path("/lib/blocks/{$slug}.php"));
    }
}
