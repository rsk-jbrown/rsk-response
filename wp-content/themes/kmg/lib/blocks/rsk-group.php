<?php

/**
 * Block: RSK Group
 */

$heading = get_field('heading') ? get_field('heading') : get_field('rsk_group_heading', 'options');
$subheading = get_field('subheading') ? get_field('subheading') : get_field('rsk_group_subheading', 'options');
$images = get_field('images') ? get_field('images') : get_field('rsk_group_images', 'options');
$copy = get_field('copy') ? get_field('copy') : get_field('rsk_group_copy', 'options');
$logo = get_field('logo') ? get_field('logo') : get_field('rsk_group_logo', 'options');
$button = get_field('button') ? get_field('button') : get_field('rsk_group_button', 'options');


?>

<section class="rsk-group block-space divider" data-aos="fade">
    <div class="container">

    </div>
    <?php if ($images) : ?>
        <div class="rsk-group__images">
            <?php foreach ($images as $image) : ?>
                <div class="rsk-group__image">
                    <?php echo wp_get_attachment_image($image, 'post'); ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="container">
        <?php include(locate_template('lib/components/headings.php')); ?>
        <div class="row">
            <div class="col-md-9 col-lg-10">
                <?php if ($copy) : ?>
                    <div class="rsk-group__copy copy-large">
                        <?php echo $copy; ?>
                    </div>
                <?php endif; ?>
                <?php include(locate_template('lib/components/button.php')); ?>
            </div>
            <div class="col-md-3 col-lg-2">
                <?php if ($logo) : ?>
                    <div class="rsk-group__logo">
                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section><!-- .rsk-group -->
