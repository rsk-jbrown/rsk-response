<?php

/**
 * Block: Offices
 */

$locations = get_field('locations');

?>

<?php $count = count(get_field('locations')); ?>

<?php if ($locations) : ?>
	<section class="offices block-space divider bg-offwhite <?php if($count <= 4): ?>less-than<?php endif; ?>">
		<div class="container" data-aos="fade">
			<?php get_template_part('lib/components/headings'); ?>
			<div class="offices__carousel <?php if($count > 4): ?>offices__carousel__slider<?php endif; ?>">
				<?php foreach ($locations as $location) : ?>
					<?php

					$address = get_field('office_address', $location->ID);

					?>
					<div class="offices__carousel-item">
						<h5><?php echo get_the_title($location->ID); ?></h5>
						<?php if($address) : ?>
							<p class="copy-medium"><?php echo $address; ?></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section><!-- .offices -->
<?php endif; ?>
