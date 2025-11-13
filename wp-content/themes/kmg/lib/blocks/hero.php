<?php

/**
 * Block: Hero
 */

?>

<?php if (have_rows('slides')) : ?>
    <section class="hero" data-aos="fade">
        <div class="hero__slides">
            <?php while (have_rows('slides')) : the_row(); ?>
                <?php

                $heading = get_sub_field('heading');
                $image = wp_get_attachment_image_url(get_sub_field('image'), 'full');
                $iframe = get_sub_field('video');

                preg_match('/src="(.+?)"/', $iframe, $matches);
                $src = $matches[1];

                $params = array(
                    'background'  => 1,
                );
                $new_src = add_query_arg($params, $src);
                $iframe = str_replace($src, $new_src, $iframe);

                $attributes = 'frameborder="0"';
                $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


                ?>
                <div class="hero__slide slide">
                    <div class="hero__background"
                         <?php if ($image) : ?>style="background-image: url(<?php echo $image; ?>);"<?php endif; ?>>
                        <?php if ($iframe) : ?>
                            <div class="hero__video">
                                <?php echo $iframe; ?>
                            </div>
                        <?php endif; ?>
                        <div class="container">
                            <div class="hero__content">
                                <?php if ($heading) : ?>
                                    <div class="hero__title">
                                        <h1><?php echo $heading; ?></h1>
                                    </div>
                                <?php endif; ?>
                                <?php get_template_part('lib/components/button'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section><!-- .hero -->
<?php endif; ?>
