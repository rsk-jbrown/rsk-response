<?php

/**
 * Block: Heading & Copy
 */

$copy = get_field('copy');

?>

<section class="heading-copy block-space bg-offwhite divider">
    <div class="container" data-aos="fade-up">
        <?php get_template_part('lib/components/headings'); ?>
        <?php if($copy) : ?>
            <div class="last-margin copy-large heading-copy__copy">
                <?php echo $copy; ?>
            </div>
        <?php endif; ?>
    </div>
</section><!-- .heading-copy -->
