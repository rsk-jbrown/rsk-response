<?php

/**
 * Block: Related Posts
 */

$heading = get_field('heading');
$subheading = '';

$_post_type = get_post_type_object(get_post_type());

if (is_single()) {
    if (!$heading) {
        $heading = __('Related ', 'kmg') . $_post_type->label;
    }
}

$_posts = get_field('posts');

if (!$_posts) {
    $args = [
        'post_type' => $_post_type->name,
        'post_status' => 'publish',
        'numberposts' => 15
    ];

    $_taxonomy = $_post_type->name . '_category';

    if (is_singular('post')) {
        $_taxonomy = 'category';
    }

    $_terms = wp_list_pluck(get_the_terms(get_the_ID(), $_taxonomy), 'term_id');

    $args['tax_query'] = [
        [
            'taxonomy' => $_taxonomy,
            'field' => 'term_id',
            'terms' => $_terms
        ]
    ];


    $_posts = get_posts($args);
}

?>

<section class="related-posts block-space divider bg-offwhite">
    <div class="container" data-aos="fade">
        <?php include(locate_template('lib/components/headings.php')); ?>

        <?php if ($_posts) : ?>
            <div class="latest-posts__posts related-posts__posts">
                <?php foreach ($_posts as $_post) : ?>
                    <?php

                    $thumbnail = get_the_post_thumbnail_url($_post->ID, 'post');

                    ?>
                    <div class="latest-posts__post related-posts__post">
                        <a href="<?php echo get_the_permalink($_post->ID); ?>">
                            <div class="latest-posts__thumbnail related-posts__thumbnail"
                                 <?php if ($thumbnail) : ?>style="background-image: url(<?php echo $thumbnail; ?>);"<?php endif; ?>>

                            </div>
                            <div class="latest-posts__content text-white">
                                <h4 class="latest-posts__title"><?php echo wp_trim_words(get_the_title($_post->ID), 5); ?></h4>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section><!-- .related-posts -->
