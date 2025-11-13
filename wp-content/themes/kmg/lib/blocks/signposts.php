<?php

/**
 * Block: Signposts
 */

$select_posts = get_field('select_posts');
$quick_links = get_field('posts');

if(!$select_posts) {
    $quick_links = get_field('links');
}

?>

<section class="signposts block-space divider">
    <div class="container" data-aos="fade">
        <?php get_template_part('lib/components/headings'); ?>

        <?php if($quick_links) : ?>
        <?php include(locate_template('lib/components/quick-links.php')); ?>
        <?php endif; ?>

    </div>
</section><!-- .signposts -->
