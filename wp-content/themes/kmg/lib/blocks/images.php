<?php

/**
 * Block: Images
 */

$layout = get_field('layout') ? get_field('layout') : get_sub_field('layout');
$images = get_field('images') ? get_field('images') : get_sub_field('images');

?>

<?php if ($images) : $i = 0; ?>
    <section class="images images--<?php echo $layout; ?>" data-aos="fade-up">
        <div class="container">
            <div class="row <?php if ($layout === 'split-three-right') : ?>images__row-reverse<?php endif; ?>">
                <?php if ($layout === 'full-width') : ?>
                    <?php foreach ($images as $image) : ?>
                        <div class="col-12 images__col">
                            <div class="images__image">
                                <?php echo wp_get_attachment_image($image, 'post_image'); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php elseif ($layout === 'split') : ?>
                    <?php foreach ($images as $image) : ?>
                        <div class="col-6 images__col">
                            <div class="images__image">
                                <?php echo wp_get_attachment_image($image, 'post_image_landscape'); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php elseif ($layout === 'split-three-left' || $layout === 'split-three-right') : ?>
                    <?php foreach ($images as $image) : ?>
                        <?php if ($i === 0) : ?>
                            <div class="col-5 images__col images__col--offset">
                                <div class="images__image">
                                    <?php echo wp_get_attachment_image($image, 'post_image_portrait'); ?>
                                </div>
                            </div>
                            <div class="col-7 images__col images__col--offset">
                        <?php elseif ($i > 0 && $i < 3) : ?>
                            <div class="images__image">
                                <?php echo wp_get_attachment_image($image, 'post_image_landscape'); ?>
                            </div>
                        <?php else : ?>
                            </div>
                        <?php endif; ?>
                        <?php $i++; endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section><!-- .images -->
<?php endif; ?>
