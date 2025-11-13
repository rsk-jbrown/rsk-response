<?php

/**
 * Block: Steps
 */

?>

<?php if (have_rows('steps')) : $i = 1; ?>
    <section class="steps block-space divider">
        <div class="steps__row flex" data-aos="fade">
            <?php while (have_rows('steps')) : the_row(); ?>
                <?php

                $text = get_sub_field('text');
                $copy = get_sub_field('copy');

                ?>

                <?php if ($text) : ?>
                    <div class="steps__col">
                        <div class="flip-block">
                            <div class="flip-block__inner">
                                <div class="flip-block__front last-margin">
                                    <div class="headings">
                                        <h2 class="flip-block__number"><?php echo $i; ?></h2>
                                        <p class="copy-large"><?php echo $text; ?></p>
                                    </div>
                                </div>
                                <div class="flip-block__back">
                                    <div class="last-margin">
                                        <h5><?php echo $text; ?></h5>
                                        <?php if ($copy) : ?>
                                            <?php echo $copy; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++; endif; ?>
            <?php endwhile; ?>
        </div>
    </section><!-- .steps -->
<?php endif; ?>
