<?php

/**
 * Component: Button
 */

if (!isset($button)) {
    $button = get_field('button') ? get_field('button') : get_sub_field('button');
}

?>

<?php if ($button) : ?>
    <div class="button">
        <a href="<?php echo $button['url']; ?>" <?php echo ($button['target']) ? 'target="_blank"' : '' ?>
           class="button__link btn"><?php echo $button['title']; ?></a>
    </div>
<?php endif; ?>
