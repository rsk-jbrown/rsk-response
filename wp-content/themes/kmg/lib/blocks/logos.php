<?php

/**
 * Block: Logos
 */

$logos = get_field('logos');
$copy = get_field('copy');

?>

<?php $num = count(get_field('logos'));

if($num > 5) {
    $sliderName = 'logos__carousel--active';
}
?>

<section class="logos block-space divider">
    <div class="container" data-aos="fade">
        <?php get_template_part('lib/components/headings'); ?>
        <?php if($copy) : ?>
            <div class="logos__copy content-width copy-large">
                <?php echo $copy; ?>
            </div>
        <?php endif; ?>
        <?php if ($logos) : ?>
            <div class="logos__carousel <?php echo $sliderName; ?>">
                <?php foreach ($logos as $logo) : ?>
                    <?php

                    $thumbnail = get_the_post_thumbnail($logo->ID, 'logo');

                    ?>
                    <?php if ($thumbnail) : ?>
                        <div class="logos__carousel-item">
                            <?php echo $thumbnail; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section><!-- .logos -->
