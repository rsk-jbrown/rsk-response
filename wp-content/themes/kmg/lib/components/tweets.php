<?php

/**
 * Components: Tweets
 */

$tweets = get_posts([
    'post_type' => 'twitter',
    'post_status' => 'publish',
    'numberposts' => 3
]);

$social = get_field('social', 'options');
$twitter = $social['twitter'];

?>

<?php if ($tweets) : ?>
    <div class="tweets">
        <h5>Latest Tweets</h5>
        <ul class="list-unstyled tweets__list text-white">
            <?php foreach ($tweets as $tweet) : ?>
                <li class="tweets__item">
                    <div class="tweets__content">
                        <?php if ($twitter['link'] && $twitter['icon']) : ?>
                            <a href="<?php echo $twitter['link']['url']; ?>" <?php echo ($twitter['link']['target']) ? 'target="_blank"' : ''; ?>><i
                                        class="<?php echo $twitter['icon']; ?>"></i></a>
                        <?php endif; ?>
                        <div class="last-margin text-break">
                            <?php echo apply_filters('the_content', $tweet->post_content); ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
