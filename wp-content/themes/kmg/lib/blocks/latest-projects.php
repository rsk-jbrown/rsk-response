<?php

/**
 * Block: Latest Projects
 */

$projects = get_field('projects');

if (!$projects) {
    $projects = get_posts([
        'post_type' => 'project',
        'post_status' => 'publish',
        'numberposts' => 6
    ]);
}

?>

<?php if(get_field('green_background')) {
  $bg_colour = 'bg-green';
} ?>

<?php //bg-darkgrey text-white ?>

<section class="latest-projects block-space divider <?php echo $bg_colour; ?>" data-aos="fade">
    <div class="container">
        <?php get_template_part('lib/components/headings'); ?>
    </div>
    <?php if ($projects) : ?>
        <div class="latest-projects__posts">
            <?php foreach ($projects as $project) : ?>
                <?php

                $thumbnail = get_the_post_thumbnail_url($project->ID, 'post');

                ?>
                <?php if ($thumbnail) : ?>
                    <div class="latest-projects__post">
                        <a href="<?php echo get_the_permalink($project->ID); ?>">
                            <div class="latest-projects__thumbnail"
                                 style="background-image: url(<?php echo $thumbnail; ?>);">
                            </div>
                            <h4><?php echo (get_the_title($project->ID)); ?></h4>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section><!-- .latest-projects -->
