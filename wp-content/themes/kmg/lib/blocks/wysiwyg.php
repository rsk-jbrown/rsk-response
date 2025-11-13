<?php

/**
 * Block: WYSIWYG
 */

$heading = get_field('heading');
$subheading = get_field('subheading');
$intro = get_field('intro') ? get_field('intro') : get_sub_field('intro');
$copy = get_field('copy') ? get_field('copy') : get_sub_field('copy');

?>

<section class="wysiwyg divider divider--bottom">
    <?php if ($heading || $subheading) : ?>
        <div class="wysiwyg__header" data-aos="fade">
            <div class="container">
                <?php get_template_part('lib/components/headings'); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="container<?php /* if (is_page(507)): ?> cookie-clear cookie-settings<?php endif; */ ?>">
        <div class="wysiwyg__content<?php /* if (is_page(507)): ?> cookie-container<?php endif; */ ?>" data-aos="fade">
            <?php if ($intro) : ?>
                <div class="wysiwyg__copy copy-medium-large">
                    <?php echo $intro; ?>
                </div>
            <?php endif; ?>
            <?php if ($copy) : ?>
                <div class="wysiwyg__copy last-margin">
                    <?php echo $copy; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <?php /* if (is_page(507)): ?>
        
        <div class="cookie-settings__col cookie-settings__col--last">
                <h5>Manage my cookies</h5>
                <form id="cookieSettingsForm" class="cookie-settings__form" method="post">
                    <div class="cookie-settings__form-field">
                        <p>Google Analytics</p>

                        <label for="cookieAnalyticsOn">On</label>
                        <input id="cookieAnalyticsOn" type="radio" name="analytics" value="on" <?php if (isset($_COOKIE['rskc-analytics']) && $_COOKIE['rskc-analytics'] === 'on') : ?>checked<?php endif; ?>>

                        <label for="cookieAnalyticsOff">Off</label>
                        <input id="cookieAnalyticsOff" type="radio" name="analytics" value="off" <?php if (isset($_COOKIE['rskc-analytics']) && $_COOKIE['rskc-analytics'] === 'off') : ?>checked<?php endif; ?>>
                    </div>
                    <div class="cookie-settings__form-field">
                        <p>Social Media</p>

                        <label for="cookieSocialOn">On</label>
                        <input id="cookieSocialsOn" type="radio" name="social" value="on" <?php if (isset($_COOKIE['rskc-social']) && $_COOKIE['rskc-social'] === 'on') : ?>checked<?php endif; ?>>

                        <label for="cookieSocialOff">Off</label>
                        <input id="cookieSocialOff" type="radio" name="social" value="off" <?php if (isset($_COOKIE['rskc-social']) && $_COOKIE['rskc-social'] === 'off') : ?>checked<?php endif; ?>>
                    </div>
                    <div class="cookie-settings__form-field">
                        <p>Embedded Videos</p>

                        <label for="cookieVideosOn">On</label>
                        <input id="cookieVideosOn" type="radio" name="videos" value="on" <?php if (isset($_COOKIE['rskc-videos']) && $_COOKIE['rskc-videos'] === 'on') : ?>checked<?php endif; ?>>

                        <label for="cookieVideosOff">Off</label>
                        <input id="cookieVideosOff" type="radio" name="videos" value="off" <?php if (isset($_COOKIE['rskc-videos']) && $_COOKIE['rskc-videos'] === 'off') : ?>checked<?php endif; ?>>
                    </div>
                    <div class="cookie-settings__form-footer">
                        <button class="btn" type="submit">Submit</button>
                    </div>
                </form>

            </div>
            
            <?php endif; */ ?>
        
        
    </div>
</section><!-- .wysiwyg -->
