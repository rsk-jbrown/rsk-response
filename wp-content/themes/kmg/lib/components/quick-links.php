<?php

/**
 * Component: Quick Links
 */

?>

<div class="quick-links">
    <?php foreach ($quick_links as $quick_link) : ?>
        <div class="quick-links__button-wrapper" data-aos="fade-up">
            <?php if (!$select_posts) : ?>
                <a href="<?php echo $quick_link['url']; ?>" <?php echo $quick_link['target'] ? 'target="_blank"' : ''; ?>
                   class="quick-links__button"><h5><?php echo $quick_link['title']; ?></h5></a>
            <?php else : ?>
                <a href="<?php echo get_the_permalink($quick_link->ID); ?>"
                   class="quick-links__button"><h5><?php echo get_the_title($quick_link->ID); ?></h5></a>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
