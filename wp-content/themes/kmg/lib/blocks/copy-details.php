<?php

/**
 * Block: Copy & Details
 */

$heading = get_field('heading');
$copy = get_field('copy');
$details_heading = get_field('details_heading');

?>

<section class="copy-details block-space divider">
	<div class="container">
		<div class="row">
			<div class="col-md-9" data-aos="fade-up">
				<?php if ($heading) : ?>
					<h4 class="copy-details__heading"><?php echo $heading; ?></h4>
				<?php endif; ?>
				<?php if ($copy) : ?>
					<div class="last-margin">
						<?php echo $copy; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-md-3" data-aos="fade-up">
				<?php if (have_rows('details')) : ?>
					<div class="copy-details__details">
						<?php if($details_heading) : ?>
<!--                            <h5 class="text-primary underlined uppercase"><?php echo $details_heading; ?></h5><h5 class="text-primary underlined"><?php echo $details_heading; ?></h5>-->
							<h5 class="text-primary underlined"><?php echo $details_heading; ?></h5>
						<?php endif; ?>
						<ul class="detail-list list-unstyled">
							<?php while (have_rows('details')) : the_row(); ?>
								<?php

								$has_link = get_sub_field('has_link');
								$link = get_sub_field('link');
								$text = get_sub_field('text');

								?>
								<li class="detail-list__item">
									<?php if ($has_link && $link) : ?>
										<a href="<?php echo $link['url']; ?>" <?php echo ($link['target']) ? 'target="_blank"' : ''; ?>><?php echo $link['title']; ?></a>
									<?php else : ?>
										<?php if ($text) : ?>
											<span><?php echo $text; ?></span>
										<?php endif; ?>
									<?php endif; ?>
								</li>
							<?php endwhile; ?>
						</ul>
						<?php get_template_part('lib/components/button'); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section><!-- .copy-details -->
