<?php

/**
 * Block: Tiles
 */

$layout = seoUrl(get_field('layout'));
$custom = get_field('custom');
$_posts = get_field('posts');
$heading = get_field('heading');


?>

<section class="tiles block-space divider <?php if ($layout) : ?>tiles--<?php echo $layout; ?><?php endif; ?>">

    <?php if($heading): ?>
        <div class="container headings">
        <h2 class="tiles__heading"><?php echo $heading; ?></h2>
            <h3><?php the_field('sub_heading');?></h3>
        </div>
    <?php endif; ?>

	<div class="container tiles--container">
		<?php if ($custom) : ?>
			<?php if (have_rows('blocks')) : ?>
				<div class="tiles__blocks">
					<?php while (have_rows('blocks')) : the_row(); ?>
						<?php

						$image = wp_get_attachment_image_url(get_sub_field('image'), 'tile');
						$heading = get_sub_field('heading');
						$copy = get_sub_field('copy');
						$button = get_sub_field('button');
						$date = '';
						$_terms = '';

						?>
						<div class="tiles__block" data-aos="fade-up">
							<?php include(locate_template('lib/components/tile.php')); ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		<?php else : ?>
			<?php if ($_posts) : ?>
				<div class="tiles__blocks">
					<?php foreach ($_posts as $_post) : ?>
						<?php

						$image = get_the_post_thumbnail_url($_post->ID, 'tile');
						$heading = get_the_title($_post->ID);
						$copy = excerpt(50, $_post->ID);
						$button = ['url' => get_the_permalink($_post->ID), 'target' => '', 'title' => __('More information', 'kmg')];
						$date = '';
						$_terms = '';

						?>
						<div class="tiles__block" data-aos="fade-up">
							<?php include(locate_template('lib/components/tile.php')); ?>
						</div>
					<?php endforeach; ?>
				</div>

            <?php if (is_page('case-studies') || is_tax('project_category')):?>
                    <div class="col-lg-4 tiles__col-right">

                        <?php get_template_part('lib/blocks/archive-sidebar'); ?>

                    </div>
            <?php endif;?>

			<?php else : ?>
				<?php if (is_archive() || is_home() || is_page('case-studies')) : ?>

                    <div class="row">

                        <div class="col-lg-8">

                            <?php if (have_posts()) : ?>

                                <div class="tiles__blocks inf-grid">
                                    <?php while (have_posts()) : the_post(); ?>
                                        <?php

                                        $image = get_the_post_thumbnail_url(get_the_ID(), 'tile');
                                        $heading = get_the_title(get_the_ID());
                                        $copy = excerpt(50, get_the_ID());
                                        $date = '';
                                        $_terms = '';

                                        if ($layout === 'one' || $layout === 'two') {
                                            $copy = excerpt(9, get_the_ID());
                                            $date = get_the_date('F j, Y');
                                            if (is_home() || is_category() || is_tag()) {
                                                $_terms = get_terms_string(get_the_ID(), 'category', true, false);
                                            } else {
                                                $_terms = get_terms_string(get_the_ID(), get_post_type() . '_category', true, false);
                                            }

                                        }

                                        $button = ['url' => get_the_permalink(), 'target' => '', 'title' => __('More information', 'kmg')];

                                        ?>
                                        <div class="tiles__block inf-post" data-aos="fade-up">
                                            <?php include(locate_template('lib/components/tile.php')); ?>
                                        </div>
                                    <?php endwhile; ?>
                                </div>

                                <?php if (get_next_posts_link()) : ?>
                                    <?php include(locate_template('lib/components/pagination.php')); ?>
                                <?php endif; ?>
                            <?php else : ?>
                                <?php get_template_part('lib/components/no-results'); ?>
                            <?php endif; ?>

                        </div> <!--./col-md-8-->

                        <div class="col-lg-4 tiles__col-right">

                            <?php get_template_part('lib/blocks/archive-sidebar'); ?>

                        </div>

                    </div> <!--/.row-->


				<?php endif; ?> <!--end-is-archive-->


			<?php endif; ?>
		<?php endif; ?>
	</div>
</section><!-- .tiles -->



