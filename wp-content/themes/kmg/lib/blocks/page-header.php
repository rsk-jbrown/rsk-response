<?php

/**
 * Block: Page Header
 */


$heading = get_field('heading');
$copy = get_field('copy');
$image = wp_get_attachment_image_url(get_field('image'), 'full');

?>

<section class="page-header <?php if(!$copy && !get_field('button')) : ?>page-header--alt<?php endif; ?>" data-aos="fade">
    <div class="page-header__background"
         <?php if ($image) : ?>style="background-image: url(<?php echo $image; ?>);"<?php endif; ?>>
        <?php if ($heading || $copy) : ?>
            <div class="container">
                <div class="page-header__content ">
                    <?php if ($heading) : ?>
                        <h1 class="smaller"><?php echo $heading; ?></h1>
                    <?php endif; ?>
                    <?php if ($copy) : ?>
                        <div class="copy-large">
                            <?php echo $copy; ?>
                        </div>
                    <?php endif; ?>
                    <?php get_template_part('lib/components/button'); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section><!-- .page-header -->
