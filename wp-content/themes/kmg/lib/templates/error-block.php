<?php

$copy = get_field('404_text', 'options');
$button = get_field('404_button_text', 'options');
$background = wp_get_attachment_image_url(get_field('404_background', 'options'), 'full');

?>

<section class="error-block">
    <div class="error-block__background block-space"
         <?php if ($background) : ?>style="background-image: url(<?php echo $background; ?>);"<?php endif; ?>>
        <div class="container">
            <div class="error-block__content">
                <?php if ($copy) : ?>
                    <div class="error-block__copy copy-large weight-extrabold">
                        <p class="text-white"><?php echo $copy; ?></p>
                    </div>
                <?php endif; ?>
                <?php if ($button) : ?>
                    <div class="error-block__button-wrapper">
                        <a href="<?php echo home_url('/'); ?>"
                           class="error-block__button btn btn--white"><?php echo $button; ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
