<?php

/**
 * Block: Video
 */

$copy = get_field('copy');
$image = wp_get_attachment_image_url(get_field('image'), 'full');
$video_url = get_field('video_url');

?>


<?php if ($video_url) : ?>
    <section class="video divider">
        <div class="video__background block-space"
             <?php if ($image) : ?>style="background-image: url(<?php echo $image; ?>);"<?php endif; ?> data-aos="fade">
            <a href="<?php echo $video_url ?>" data-fancybox>
                <div class="container">
                    <div class="video__content text-white">
                        <?php get_template_part('lib/components/headings'); ?>
                        <?php if ($copy) : ?>
                            <div class="last-margin copy-large"><?php echo $copy; ?></div>
                        <?php endif; ?>
                    </div>
                    <span class="play"></span>
                </div>
            </a>
        </div>
    </section><!-- .video -->
<?php endif; ?>
