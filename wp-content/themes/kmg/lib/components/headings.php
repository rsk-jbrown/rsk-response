<?php

/**
 * Component: Headings
 */

if(!isset($heading) || !isset($subheading)) {
    $heading = get_field('heading') ? get_field('heading') : get_sub_field('heading');
    $subheading = get_field('subheading') ? get_field('subheading') : get_sub_field('subheading');
}

?>

<?php if ($heading || $subheading) : ?>
    <div class="headings">
        <?php if ($heading) : ?>
            <h2><?php echo $heading; ?></h2>
        <?php endif; ?>
        <?php if ($subheading) : ?>
            <h3 class="text-primary"><?php echo $subheading; ?></h3>
        <?php endif; ?>
    </div>
<?php endif; ?>
