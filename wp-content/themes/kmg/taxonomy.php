<?php


get_header();

$_post_type = get_post_type_object(get_post_type());
$term = get_queried_object();
if(is_home() || is_category() || is_tag()) {
    $_post_type->label = 'News';
}

?>
    <section class="hero" data-aos="fade">
        <div class="hero__slides">

                <?php

                $heading = $term->name;
                $image = 'https://rskresponse.co.uk/wp-content/uploads/2021/03/RSK-Response-Case-Studies.jpg'

                ?>
                <div class="hero__slide slide">
                    <div class="hero__background"
                         <?php if ($image) : ?>style="background-image: url(<?php echo $image; ?>);"<?php endif; ?>>
                        <div class="container">
                            <div class="hero__content">
                                <?php if ($heading) : ?>
                                    <div class="hero__title">
                                        <h1><?php echo $heading; ?></h1>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section><!-- .hero -->



<?php //if ($archive_query->have_posts()) : ?>
<!--    --><?php //while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
<!--        --><?php ////the_content(); ?>
<!--    --><?php //endwhile; ?>
<?php //endif; ?>




    <section class="tiles block-space divider tiles--two">

        <div class="container tiles--container">
                    <div class="tiles__blocks">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php
                            global $post;
                            $image = get_the_post_thumbnail_url($post->ID, 'tile');
                            $heading = get_the_title($post->ID);
                            $copy = excerpt(50, $post->ID);
                            $button = ['url' => get_the_permalink($post->ID), 'target' => '', 'title' => __('More information', 'kmg')];
                            $date = '';
                            $_terms = '';

                            ?>
                            <div class="tiles__block" data-aos="fade-up">
                                <?php include(locate_template('lib/components/tile.php')); ?>
                            </div>
                        <?php endwhile; ?>
                        <?php endif;?>
                    </div>

                    <?php if (is_page('case-studies') || is_tax('project_category')):?>
                        <div class="col-lg-4 tiles__col-right">

                            <?php get_template_part('lib/blocks/archive-sidebar'); ?>

                        </div>
                    <?php endif;?>
        </div>
    </section><!-- .tiles -->






<?php get_footer();

