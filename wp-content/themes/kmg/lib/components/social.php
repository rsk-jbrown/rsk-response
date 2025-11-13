<?php

/**
 * Component: Social
 */

$social = get_field('social', 'options');
$tel = get_field('telephone', 'options');

?>

<?php if ($social) : ?>
    <div class="social">

        <ul class="social__list list-unstyled">
            <?php foreach ($social as $item) : ?>
                <?php

                $icon = $item['icon'];
                $link = $item['link'];

                ?>

                <?php if ($icon && $link) : ?>
                    <li class="social__item">
                        <a href="<?php echo $link['url']; ?>" <?php echo ($link['target']) ? 'target="_blank"' : ''; ?>><i class="<?php echo $icon; ?>"></i></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
