<?php

/**
 * Block: Features
 */

$theme = seoUrl(get_field('theme'));

?>

<?php if (have_rows('features')) : ?>
    <section class="features <?php if ($theme) : ?>features--<?php echo $theme; ?><?php endif; ?> divider">
        <div class="container">
            <div class="block-space block-space--small" data-aos="fade">
                <div class="features__carousel">
                    <?php while (have_rows('features')) : the_row(); ?>
                        <?php

                        $icon = get_sub_field('icon');
                        $text = get_sub_field('text');

                        ?>
                        <div class="features__carousel-item">
                            <div class="features__item-inner">
                                <?php if ($icon) : ?>
                                    <div class="features__icon">
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if ($text) : ?>
                                    <div class="features__text">
                                        <h5 class="<?php if ($theme === 'light') : ?>text-primary<?php else : ?>text-white<?php endif; ?>"><?php echo $text; ?></h5>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section><!-- .features -->
<?php endif; ?>
