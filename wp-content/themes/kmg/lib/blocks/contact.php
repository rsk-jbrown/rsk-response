<?php

/**
 * Block: Contact
 */

$location = get_field('location');
$copy = get_field('copy');
$form_id = get_field('form_id');
$telephone = get_field('telephone', 'options');
$email = get_field('email', 'options');
$address = get_field('address', 'options');

?>

<section class="contact divider divider--bottom">
    <?php if ($location): ?>
        <div class="acf-map" data-zoom="16" data-aos="fade">
            <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>"
                 data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
        </div>
    <?php endif; ?>
    <div class="container block-space block-space--medium">
        <div class="row">
            <div class="col-md-8">
                <div class="contact__content" data-aos="fade-up">
                    <?php get_template_part('lib/components/headings'); ?>

                    <?php if ($copy) : ?>
                        <div class="contact__copy copy-medium">
                            <?php echo $copy; ?>
                        </div>
                    <?php endif; ?>

                    <ul class="contact__details list-bordered links-reverse">
                        <?php if ($telephone) : ?>
                            <li class="contact__detail"><a
                                        href="<?php echo $telephone['url']; ?>">T: <?php echo $telephone['title']; ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if ($email) : ?>
                            <li class="contact__detail"><a
                                        href="<?php echo $email['url']; ?>">E: <?php echo $email['title']; ?></a></li>
                        <?php endif; ?>
                        <?php if ($address) : ?>
                            <li class="contact__detail"><a
                                        href="<?php echo $address['url']; ?>" <?php echo ($address['target']) ? 'target="_blank"' : ''; ?>>A: <?php echo $address['title']; ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <?php

                $heading = get_field('form_heading');
                $subheading = get_field('form_subheading');

                ?>
                <div class="contact__form">
                    <?php include(locate_template('lib/components/headings.php')); ?>

                    <?php if ($form_id) : ?>
                        <?php gravity_form($form_id, false, false, false, null, true, 15); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- .contact -->
