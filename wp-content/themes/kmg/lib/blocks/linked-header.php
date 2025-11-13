<?php

/**
 * Block: Linked Header
 */

$image = wp_get_attachment_image_url(get_field('image'), 'full');
$copy = get_field('copy');

if (is_singular('team')) {
	$heading = get_the_title();
	$subheading = get_field('job_title', get_the_ID());
	$copy = get_field('team_excerpt', get_the_ID());


}

?>

<section class="linked-header" data-aos="fade">
	<?php if ($image) : ?>
		<div class="linked-header__image" style="background-image: url(<?php echo $image; ?>);"></div>
	<?php endif; ?>
	<div class="container">

		<?php /* if (get_previous_post_link()) : ?>
			<div class="linked-header__link linked-header__link--previous">
				<?php echo get_previous_post_link('%link'); ?>
			</div>
		<?php endif; */ ?>

		<div class="linked-header__content">
			<?php include(locate_template('lib/components/headings.php')); ?>
			<?php if ($copy) : ?>
				<div class="linked-header__copy copy-large">
					<?php echo $copy; ?>
				</div>
			<?php endif; ?>
			<?php get_template_part('lib/components/button'); ?>
		</div>

		<?php /* if (get_next_post_link()) : ?>
			<div class="linked-header__link linked-header__link--next">
				<?php echo get_next_post_link('%link'); ?>
			</div>
		<?php endif; */ ?>
	</div>
</section><!-- .linked-header -->
