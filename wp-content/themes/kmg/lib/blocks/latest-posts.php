<?php

/**
 * Block: Latest Posts
 */

$_posts = get_field('posts');

if (!$_posts) {
    $_posts = get_posts([
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => 15
    ]);
}

?>


<section class="latest-posts <?php if(is_singular('post')) : ?>latest-posts--singular bg-offwhite<?php endif; ?> block-space divider">
    <div class="container" data-aos="fade">
        <?php get_template_part('lib/components/headings'); ?>
    </div>
    <?php if ($_posts) : ?>
        <div class="latest-posts__posts" data-aos="fade">
            <?php foreach ($_posts as $_post) : ?>
                <?php

                $thumbnail = get_the_post_thumbnail_url($_post->ID, 'post');
                $categories = get_terms_string($_post->ID, 'category');

                ?>
                <div class="latest-posts__post">
                    <a href="<?php echo get_the_permalink($_post->ID); ?>">
                        <div class="latest-posts__thumbnail"
                             <?php if ($thumbnail) : ?>style="background-image: url(<?php echo $thumbnail; ?>);"<?php endif; ?>>

                        </div>
                        <div class="latest-posts__content text-white">
                            <h4 class="latest-posts__title"><?php echo wp_trim_words(get_the_title($_post->ID), 5); ?></h4>
                            <?php if ($categories) : ?>
                                <p class="copy-small weight-extrabold"><?php echo $categories; ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section><!-- .latest-posts -->
