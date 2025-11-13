<?php

/**
 * Block: Instagram
 */

$_posts = get_posts([
    'post_type' => 'instagram',
    'post_status' => 'publish',
    'numberposts' => 6
]);

$social = get_field('social', 'options');
$insta = $social['instagram'];

?>

<?php if ($_posts) : ?>
    <section class="instagram block-space divider" data-aos="fade-up">
        <div class="container">
            <div class="instagram__posts">
                <?php foreach ($_posts as $_post) : ?>
                    <?php

                    $image = get_the_post_thumbnail($_post->ID, 'post');

                    ?>
                    <?php if ($image) : ?>
                        <div class="instagram__post">
                            <a href="<?php echo $_post->post_content; ?>">
                                <?php echo $image; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if ($insta && $insta['link']) : ?>
                    <div class="instagram__banner">
                        <a href="<?php echo $insta['link']['url']; ?>" <?php echo ($insta['link']['target']) ? 'target="_blank"' : ''; ?>>
                            <span><?php echo $insta['link']['title'];; ?></span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section><!-- .instagram -->
<?php endif; ?>
