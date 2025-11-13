<?php

/**
 * Block: Post Content
 */

?>

<div class="post-content block-space divider">
    <div class="container" data-aos="fade">
        <div class="row">
            <?php if (is_singular('post')) : ?>
                <div class="col-md-4 col-lg-3 order-2 order-md-1 post-content__col post-content__col--first">
                    <div class="post-content__sidebar post-content__sidebar--first">

                        <ul class="post-content__details list-unstyled detail-list">
                            <?php

                            $_author = get_field('post_author', get_the_ID());

                            ?>
                            <?php if ($_author) : ?>
                                <li class="post-content__detail detail-list__item">
                                    <h5 class="text-primary"><?php _e('Written By', 'kmg'); ?></h5>
                                    <p><?php echo get_the_title($_author[0]->ID); ?></p>
                                </li>
                            <?php endif; ?>
                            <li class="post-content__detail detail-list__item">
                                <h5 class="text-primary"><?php _e('Date', 'kmg'); ?></h5>
                                <p><?php echo get_the_date('j F, Y'); ?></p>
                            </li>
                            <?php

                            $_categories = get_terms_string(get_the_ID(), 'category', true, true);
                            ?>
                            <?php if ($_categories) : ?>
                                <li class="post-content__detail detail-list__item">
                                    <h5 class="text-primary"><?php _e('Categories', 'kmg'); ?></h5>
                                    <p><?php echo $_categories; ?></p>
                                </li>
                            <?php endif; ?>
                            <?php get_template_part('lib/components/share'); ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-8 col-lg-9 order-1 order-md-2">
                <?php

                /* layout blocks */

                if (have_rows('builder')) :
                    while (have_rows('builder')) : the_row();

                        if (get_row_layout() == 'headings') :
                            get_template_part('lib/components/headings');

                        elseif (get_row_layout() == 'wysiwyg') :
                            get_template_part('lib/blocks/wysiwyg');

                        elseif (get_row_layout() == 'images') :
                            get_template_part('lib/blocks/images');

                        endif;

                    endwhile;

                else :

                    //get_template_part('lib/blocks/post/no-content');

                endif;

                ?>
            </div>
            <?php if (is_singular('project')) : ?>
                <div class="col-md-4 col-lg-3 order-3 order-md-3">
                    <div class="post-content__sidebar">
                        <h5 class="text-primary underlined"><?php _e('Project Details', 'kmg'); ?></h5>

                        <div class="post-content__details">
                            <?php

                            $client = get_field('project_client', get_the_ID());

                            ?>
                            <?php if ($client) : ?>
                                <div class="post-content__detail">
                                    <h5 class=""><?php _e('Client', 'kmg'); ?></h5>
                                    <p><?php echo get_the_title($client[0]->ID); ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="post-content__detail">
                                <h5 class=""><?php _e('Date', 'kmg'); ?></h5>
                                <p><?php echo get_the_date('j F, Y'); ?></p>
                            </div>
                            <?php

                            $_categories = get_terms_string(get_the_ID(), 'project_category', true, true);
                            ?>
                            <?php if ($_categories) : ?>
                                <div class="post-content__detail">
                                    <h5 class=""><?php _e('Categories', 'kmg'); ?></h5>
                                    <p><?php echo $_categories; ?></p>
                                </div>
                            <?php endif; ?>
                            <?php $button = get_field('project_link', get_the_ID()); ?>
                            <?php include(locate_template('lib/components/button.php')); ?>
                            <?php get_template_part('lib/components/share'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div><!-- .post-builder -->
