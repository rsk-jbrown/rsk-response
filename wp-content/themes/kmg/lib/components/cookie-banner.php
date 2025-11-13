<?php

/**
 * Component: Cookie Banner
 */

?>

<?php if (!isset($_COOKIE['kmg_policy'])) : ?>
    <?php

    $cookie_heading = get_field('cookie_heading', 'options');
    $cookie_text = get_field('cookie_text', 'options');
    $cookie_link = get_field('cookie_link', 'options');

    ?>

    <div class="cookie-banner">
        <div class="container">
            <div class="cookie-banner__wrap text-white">
                <div class="cookie-banner__content">
                    <?php if ($cookie_heading) : ?>
                        <h1><?php echo $cookie_heading; ?></h1>
                    <?php endif; ?>
                    <?php if ($cookie_text) : ?>
                        <div class="cookie-banner__text text-white"><?php echo $cookie_text; ?></div>
                    <?php endif; ?>
                    <div class="cookie-banner__buttons">
                        <div class="cookie-banner__button-wrapper">
                            <a href="#"
                               class="cookie-banner__button btn btn--white"><?php _e('Accept Cookies', 'kmg'); ?></a>
                        </div>
                        <?php if ($cookie_link) : ?>
                            <div class="cookie-banner__button-wrapper">
                                <a href="<?php echo $cookie_link['url']; ?>" <?php echo ($cookie_link['target']) ? 'target="_blank"' : ''; ?>
                                   class="cookie-banner__button link"><?php echo $cookie_link['title']; ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .cookie-banner -->
<?php endif; ?>
