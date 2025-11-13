<?php

/**
 * Block: Team
 */

$team = get_field('team');

if (!$team) {
	$team = get_posts([
		'post_type' => 'team',
		'post_status' => 'publish',
		'numberposts' => -1
	]);
}
?>

<?php $count = count(get_field('team')); ?>

<section class="team block-space divider <?php if($count <= 3): ?>less-than<?php endif; ?>">
	<div class="container" data-aos="fade">
		<?php get_template_part('lib/components/headings'); ?>

		<?php if ($team) : ?>
			<div class="team__carousel">
				<?php foreach ($team as $member) : ?>
					<?php

					$thumbnail = get_the_post_thumbnail_url($member->ID, 'team');
					$job_title = get_field('job_title', $member->ID);

					?>

					<?php if ($thumbnail) : ?>
						<div class="team__carousel-item">
							<a href="<?php echo get_the_permalink($member->ID); ?>">
								<div class="team__thumbnail"
									 style="background-image: url( <?php echo $thumbnail; ?>);"></div>
								<div class="team__content headings text-white">
									<h4><?php echo get_the_title($member->ID); ?></h4>
									<?php if ($job_title) : ?>
										<h5 class="text-white"><?php echo $job_title; ?></h5>
									<?php endif; ?>
								</div>
							</a>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section><!-- .team -->
